/**
 * Journal Portfolio
 * Loads entries from data/journals.json and renders the page.
 * To publish a new daily entry, append an object to the "entries" array.
 */
(function () {
    'use strict';

    const DATA_URL = 'data/journals.json';
    const REFRESH_MS = 5 * 60 * 1000; // re-check for new entries every 5 minutes

    const $ = (sel, root = document) => root.querySelector(sel);
    const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

    const state = {
        entries: [],
        query: '',
        category: 'all',
        sort: 'newest',
        view: localStorage.getItem('portfolio-view') || 'grid',
        lastDataHash: ''
    };

    /* ---------- Helpers ---------- */
    const escapeHtml = (str = '') => String(str)
        .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;').replace(/'/g, '&#39;');

    const parseDate = (iso) => {
        const [y, m, d] = iso.split('-').map(Number);
        return new Date(y, m - 1, d);
    };

    const fmt = {
        long: (iso) => parseDate(iso).toLocaleDateString('en-IN', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }),
        short: (iso) => parseDate(iso).toLocaleDateString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' }),
        day: (iso) => parseDate(iso).getDate(),
        month: (iso) => parseDate(iso).toLocaleDateString('en-IN', { month: 'short' }),
        monthYear: (iso) => parseDate(iso).toLocaleDateString('en-IN', { month: 'long', year: 'numeric' }),
        weekday: (iso) => parseDate(iso).toLocaleDateString('en-IN', { weekday: 'long' })
    };

    const todayISO = () => {
        const d = new Date();
        return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
    };

    const daysBetween = (a, b) => Math.round((parseDate(a) - parseDate(b)) / 86400000);

    const relative = (iso) => {
        const diff = daysBetween(todayISO(), iso);
        if (diff === 0) return 'Today';
        if (diff === 1) return 'Yesterday';
        if (diff < 7) return `${diff} days ago`;
        return fmt.short(iso);
    };

    /* ---------- Data ---------- */
    async function loadData() {
        const res = await fetch(`${DATA_URL}?t=${Date.now()}`, { cache: 'no-store' });
        if (!res.ok) throw new Error(`Could not load ${DATA_URL} (${res.status})`);
        const text = await res.text();
        const hash = `${text.length}:${text.slice(0, 200)}`;
        const changed = hash !== state.lastDataHash;
        state.lastDataHash = hash;
        return { data: JSON.parse(text), changed };
    }

    function computeStreak(entries) {
        const dates = new Set(entries.map(e => e.date));
        let streak = 0;
        let cursor = todayISO();
        // Allow the streak to start from yesterday if today's entry isn't up yet
        if (!dates.has(cursor)) {
            const d = parseDate(cursor); d.setDate(d.getDate() - 1);
            cursor = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }
        while (dates.has(cursor)) {
            streak++;
            const d = parseDate(cursor); d.setDate(d.getDate() - 1);
            cursor = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }
        return streak;
    }

    /* ---------- Rendering ---------- */
    function renderSite(site) {
        if (!site) return;
        $('#site-title').textContent = site.title || 'Journal Portfolio';
        $('#site-tagline').textContent = site.tagline || '';
        document.title = `${site.title || 'Journal Portfolio'} — Indian Farmer`;
    }

    function renderStats(entries) {
        const latest = entries[0];
        $('#stat-total').textContent = entries.length;
        $('#stat-streak').textContent = computeStreak(entries);
        $('#stat-categories').textContent = new Set(entries.map(e => e.category)).size;
        $('#stat-updated').textContent = latest ? relative(latest.date) : '–';
    }

    function tagsHtml(tags = []) {
        return tags.length ? `<div class="tags">${tags.map(t => `<span class="tag">#${escapeHtml(t)}</span>`).join('')}</div>` : '';
    }

    function renderFeatured(entries) {
        const el = $('#featured-entry');
        const entry = entries[0];
        if (!entry) { el.innerHTML = '<p class="muted">No entries yet.</p>'; return; }
        $('#latest-eyebrow').textContent = entry.date === todayISO() ? "Today's Entry" : `Latest · ${relative(entry.date)}`;
        el.innerHTML = `
            <div class="featured__date">
                <div>
                    <div class="featured__day">${fmt.day(entry.date)}</div>
                    <div class="featured__month">${fmt.month(entry.date)} ${parseDate(entry.date).getFullYear()}</div>
                    <div class="featured__weekday">${fmt.weekday(entry.date)}</div>
                </div>
            </div>
            <div class="featured__body">
                <span class="badge">${escapeHtml(entry.category)}</span>
                <h3>${escapeHtml(entry.title)}</h3>
                <p>${escapeHtml(entry.summary)}</p>
                ${tagsHtml(entry.tags)}
                <div class="featured__footer">
                    <span class="muted">${entry.readingTime || 3} min read</span>
                    <button class="btn btn--primary" data-open="${escapeHtml(entry.id)}">Read entry →</button>
                </div>
            </div>`;
    }

    function renderFilters(entries) {
        const counts = entries.reduce((acc, e) => { acc[e.category] = (acc[e.category] || 0) + 1; return acc; }, {});
        const cats = Object.keys(counts).sort();
        $('#category-filters').innerHTML = [
            `<button class="chip ${state.category === 'all' ? 'is-active' : ''}" data-category="all">All <span class="chip__count">${entries.length}</span></button>`,
            ...cats.map(c => `<button class="chip ${state.category === c ? 'is-active' : ''}" data-category="${escapeHtml(c)}">${escapeHtml(c)} <span class="chip__count">${counts[c]}</span></button>`)
        ].join('');
    }

    function filteredEntries() {
        const q = state.query.trim().toLowerCase();
        let list = state.entries.filter(e => {
            if (state.category !== 'all' && e.category !== state.category) return false;
            if (!q) return true;
            const hay = [e.title, e.summary, e.category, ...(e.tags || [])].join(' ').toLowerCase();
            return hay.includes(q);
        });
        if (state.sort === 'oldest') list = list.slice().sort((a, b) => a.date.localeCompare(b.date));
        else if (state.sort === 'title') list = list.slice().sort((a, b) => a.title.localeCompare(b.title));
        return list;
    }

    function renderGrid() {
        const list = filteredEntries();
        const grid = $('#journal-grid');
        grid.classList.toggle('is-list', state.view === 'list');
        $('#empty-state').hidden = list.length > 0;
        $('#results-count').textContent = `${list.length} of ${state.entries.length} entries`;
        const today = todayISO();

        grid.innerHTML = list.map((e, i) => `
            <article class="card" data-open="${escapeHtml(e.id)}" style="animation-delay:${Math.min(i, 8) * 50}ms" tabindex="0" role="button" aria-label="Open ${escapeHtml(e.title)}">
                ${e.date === today ? '<span class="card__new">NEW</span>' : ''}
                <div class="card__meta">
                    <span class="card__date">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        ${fmt.short(e.date)}
                    </span>
                    <span class="card__category">${escapeHtml(e.category)}</span>
                </div>
                <div class="card__body">
                    <h3>${escapeHtml(e.title)}</h3>
                    <p class="card__summary">${escapeHtml(e.summary)}</p>
                </div>
                ${tagsHtml(e.tags)}
                <div class="card__footer">
                    <span>${e.readingTime || 3} min read</span>
                    <span>${relative(e.date)}</span>
                </div>
            </article>`).join('');
    }

    function renderTimeline(entries) {
        const groups = entries.reduce((acc, e) => {
            const key = fmt.monthYear(e.date);
            (acc[key] = acc[key] || []).push(e);
            return acc;
        }, {});
        $('#timeline-list').innerHTML = Object.entries(groups).map(([month, items]) => `
            <li class="timeline__month"><h3>${escapeHtml(month)}</h3>
                <ul style="list-style:none;padding:0;margin:0">
                    ${items.map(e => `
                        <li class="timeline__item">
                            <span class="timeline__date">${fmt.short(e.date).replace(/ \d{4}$/, '')}</span>
                            <span>
                                <span class="timeline__title" data-open="${escapeHtml(e.id)}">${escapeHtml(e.title)}</span>
                                <span class="timeline__cat"> · ${escapeHtml(e.category)}</span>
                            </span>
                        </li>`).join('')}
                </ul>
            </li>`).join('');
    }

    /* ---------- Modal ---------- */
    function openEntry(id, pushHash = true) {
        const idx = state.entries.findIndex(e => e.id === id);
        if (idx === -1) return;
        const e = state.entries[idx];
        const prev = state.entries[idx + 1]; // older
        const next = state.entries[idx - 1]; // newer

        const paragraphs = String(e.content || e.summary || '').split(/\n{2,}/).map(p => `<p>${escapeHtml(p).replace(/\n/g, '<br>')}</p>`).join('');

        $('#modal-content').innerHTML = `
            <span class="badge">${escapeHtml(e.category)}</span>
            <h2 id="modal-title">${escapeHtml(e.title)}</h2>
            <div class="modal__meta">
                <span>📅 ${fmt.long(e.date)}</span>
                <span>⏱ ${e.readingTime || 3} min read</span>
                ${e.pdf ? `<a href="${escapeHtml(e.pdf)}" target="_blank" rel="noopener" style="color:var(--primary-light);font-weight:600">📄 Download PDF</a>` : ''}
            </div>
            <div class="modal__body">${paragraphs}</div>
            ${tagsHtml(e.tags)}
            <div class="modal__nav">
                ${prev ? `<button data-open="${escapeHtml(prev.id)}"><small>← Older</small>${escapeHtml(prev.title)}</button>` : '<span></span>'}
                ${next ? `<button data-open="${escapeHtml(next.id)}" style="text-align:right"><small>Newer →</small>${escapeHtml(next.title)}</button>` : '<span></span>'}
            </div>`;

        $('#modal').hidden = false;
        document.body.classList.add('modal-open');
        $('.modal__panel').scrollTop = 0;
        if (pushHash) history.replaceState(null, '', `#entry/${encodeURIComponent(id)}`);
    }

    function closeModal() {
        $('#modal').hidden = true;
        document.body.classList.remove('modal-open');
        if (location.hash.startsWith('#entry/')) history.replaceState(null, '', location.pathname);
    }

    /* ---------- Theme ---------- */
    function initTheme() {
        const saved = localStorage.getItem('portfolio-theme');
        const prefersDark = !!(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches);
        if (saved === 'dark' || (!saved && prefersDark)) document.documentElement.dataset.theme = 'dark';
        $('#theme-toggle').addEventListener('click', () => {
            const dark = document.documentElement.dataset.theme === 'dark';
            document.documentElement.dataset.theme = dark ? '' : 'dark';
            localStorage.setItem('portfolio-theme', dark ? 'light' : 'dark');
        });
    }

    /* ---------- Events ---------- */
    function bindEvents() {
        $('#search').addEventListener('input', (ev) => { state.query = ev.target.value; renderGrid(); });
        $('#sort').addEventListener('change', (ev) => { state.sort = ev.target.value; renderGrid(); });

        $('#category-filters').addEventListener('click', (ev) => {
            const chip = ev.target.closest('[data-category]');
            if (!chip) return;
            state.category = chip.dataset.category;
            $$('.chip').forEach(c => c.classList.toggle('is-active', c === chip));
            renderGrid();
        });

        $$('.view-toggle button').forEach(btn => {
            btn.classList.toggle('is-active', btn.dataset.view === state.view);
            btn.addEventListener('click', () => {
                state.view = btn.dataset.view;
                localStorage.setItem('portfolio-view', state.view);
                $$('.view-toggle button').forEach(b => b.classList.toggle('is-active', b === btn));
                renderGrid();
            });
        });

        $('#clear-filters').addEventListener('click', () => {
            state.query = ''; state.category = 'all';
            $('#search').value = '';
            renderFilters(state.entries); renderGrid();
        });

        // Open entries (cards, featured button, timeline, modal nav)
        document.addEventListener('click', (ev) => {
            const opener = ev.target.closest('[data-open]');
            if (opener) { openEntry(opener.dataset.open); return; }
            if (ev.target.closest('[data-close]')) closeModal();
        });
        document.addEventListener('keydown', (ev) => {
            if (ev.key === 'Escape' && !$('#modal').hidden) closeModal();
            if (ev.key === 'Enter' && ev.target.matches('.card')) openEntry(ev.target.dataset.open);
        });

        const toTop = $('#back-to-top');
        window.addEventListener('scroll', () => toTop.classList.toggle('is-visible', window.scrollY > 600), { passive: true });
        toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        $('#year').textContent = new Date().getFullYear();
    }

    /* ---------- Init ---------- */
    function renderAll(data) {
        state.entries = (data.entries || []).slice().sort((a, b) => b.date.localeCompare(a.date));
        renderSite(data.site);
        renderStats(state.entries);
        renderFeatured(state.entries);
        renderFilters(state.entries);
        renderGrid();
        renderTimeline(state.entries);
    }

    async function init() {
        initTheme();
        bindEvents();
        try {
            const { data } = await loadData();
            renderAll(data);
            if (location.hash.startsWith('#entry/')) openEntry(decodeURIComponent(location.hash.slice(7)), false);
        } catch (err) {
            console.error(err);
            $('#featured-entry').innerHTML = `<div class="error-box"><strong>Couldn't load journal entries.</strong><br>${escapeHtml(err.message)}<br><small>If you opened this file directly, serve it over HTTP (e.g. <code>php -S localhost:8000</code>).</small></div>`;
        }

        // Poll for daily updates without a reload
        setInterval(async () => {
            try {
                const { data, changed } = await loadData();
                if (changed) renderAll(data);
            } catch (_) { /* ignore transient errors */ }
        }, REFRESH_MS);
    }

    document.addEventListener('DOMContentLoaded', init);
})();
