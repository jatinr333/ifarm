# Journal Portfolio

A static HTML / CSS / JavaScript portfolio that displays daily journal entries.
No build step and no database — entries live in `data/journals.json`.

```
portfolio/
├── index.html          # Page markup
├── css/portfolio.css   # Styles (light + dark theme)
├── js/portfolio.js     # Loads JSON, renders cards, search, filters, modal, timeline
├── data/journals.json  # ← the entries (update daily)
└── add-entry.py        # Helper to append today's entry
```

## Running

Any static server works. From the repository root:

```bash
python3 -m http.server 8000      # then open http://localhost:8000/portfolio/
```

When the main PHP site is deployed, the portfolio is also reachable at `/portfolio`.

## Publishing a new entry each day

**Option A – helper script**

```bash
cd portfolio
python3 add-entry.py                       # interactive
python3 add-entry.py --title "..." --category "Fisheries" --summary "..." --content "..." --tags biofloc,tilapia
```

**Option B – edit the JSON by hand.** Add an object to the top of `entries`:

```json
{
  "id": "2026-09-22-my-slug",
  "date": "2026-09-22",
  "title": "Entry title",
  "category": "Horticulture",
  "tags": ["mango", "ipm"],
  "summary": "Short teaser shown on cards.",
  "content": "Full text. Separate paragraphs with a blank line.",
  "readingTime": 4,
  "featured": false,
  "pdf": ""
}
```

Commit and deploy the JSON file — the page:

- shows the newest entry as the hero "Today's Entry" (with a `NEW` badge on the card when it's dated today),
- recalculates the total / day-streak / category stats,
- re-fetches the JSON every 5 minutes, so an open tab picks up new entries without a reload.

Entry pages are deep-linkable via `#entry/<id>`.
