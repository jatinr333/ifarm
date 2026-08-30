/**
 * Indian Farmer - Main JavaScript
 * Modern, accessible interactions
 */

(function() {
    'use strict';

    // ============================================
    // Mobile Navigation
    // ============================================
    const navToggle = document.querySelector('.nav__toggle');
    const nav = document.querySelector('.nav');

    if (navToggle && nav) {
        navToggle.addEventListener('click', function() {
            const isOpen = nav.classList.contains('nav--open');
            nav.classList.toggle('nav--open');
            navToggle.setAttribute('aria-expanded', !isOpen);
            
            // Update icon
            const icon = navToggle.querySelector('svg');
            if (icon) {
                icon.innerHTML = isOpen 
                    ? '<path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>'
                    : '<path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>';
            }
        });

        // Close on outside click
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target) && !navToggle.contains(e.target)) {
                nav.classList.remove('nav--open');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Close on escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && nav.classList.contains('nav--open')) {
                nav.classList.remove('nav--open');
                navToggle.setAttribute('aria-expanded', 'false');
                navToggle.focus();
            }
        });
    }

    // ============================================
    // Smooth Scroll for Anchor Links
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ============================================
    // File Upload Preview
    // ============================================
    const fileInputs = document.querySelectorAll('.form__file-input');
    
    fileInputs.forEach(input => {
        const label = input.closest('.form__file');
        const labelText = label?.querySelector('.form__file-name');
        
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
                
                if (labelText) {
                    labelText.textContent = `${file.name} (${sizeMB} MB)`;
                }
                
                // Validate file size
                const maxSize = parseInt(this.dataset.maxSize || '52428800'); // 50MB default
                if (file.size > maxSize) {
                    showAlert('File size exceeds maximum limit', 'error');
                    this.value = '';
                    if (labelText) {
                        labelText.textContent = 'Choose file or drag here';
                    }
                }
            }
        });

        // Drag and drop
        if (label) {
            ['dragenter', 'dragover'].forEach(eventName => {
                label.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.classList.add('form__file--active');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                label.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.classList.remove('form__file--active');
                });
            });

            label.addEventListener('drop', function(e) {
                const files = e.dataTransfer.files;
                if (files.length) {
                    input.files = files;
                    input.dispatchEvent(new Event('change'));
                }
            });
        }
    });

    // ============================================
    // Alert System
    // ============================================
    function showAlert(message, type = 'info', duration = 5000) {
        const alertContainer = document.getElementById('alert-container') || createAlertContainer();
        
        const alert = document.createElement('div');
        alert.className = `alert alert--${type} animate-fade-in`;
        alert.setAttribute('role', 'alert');
        
        const icons = {
            success: '<svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>',
            error: '<svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>',
            warning: '<svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>',
            info: '<svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>'
        };
        
        alert.innerHTML = `
            ${icons[type] || icons.info}
            <span>${message}</span>
            <button type="button" class="alert__close" aria-label="Close">&times;</button>
        `;
        
        alertContainer.appendChild(alert);
        
        // Close button
        const closeBtn = alert.querySelector('.alert__close');
        closeBtn.addEventListener('click', () => {
            alert.remove();
        });
        
        // Auto remove
        if (duration > 0) {
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => alert.remove(), 300);
                }
            }, duration);
        }
    }

    function createAlertContainer() {
        const container = document.createElement('div');
        container.id = 'alert-container';
        container.style.cssText = 'position:fixed;top:80px;right:20px;z-index:9999;max-width:400px;';
        document.body.appendChild(container);
        return container;
    }

    // ============================================
    // Form Validation
    // ============================================
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Clear previous errors
            this.querySelectorAll('.form__error').forEach(el => el.remove());
            this.querySelectorAll('.form__input--error').forEach(el => {
                el.classList.remove('form__input--error');
            });
            
            // Validate required fields
            this.querySelectorAll('[required]').forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    showFieldError(field, 'This field is required');
                }
            });
            
            // Validate email fields
            this.querySelectorAll('[type="email"]').forEach(field => {
                if (field.value && !isValidEmail(field.value)) {
                    isValid = false;
                    showFieldError(field, 'Please enter a valid email address');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Focus first error
                const firstError = this.querySelector('.form__input--error');
                if (firstError) firstError.focus();
            }
        });
    });

    function showFieldError(field, message) {
        field.classList.add('form__input--error');
        const error = document.createElement('span');
        error.className = 'form__error';
        error.textContent = message;
        field.parentNode.appendChild(error);
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // ============================================
    // Intersection Observer for Animations
    // ============================================
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card, .editorial-card, .about__stat').forEach(el => {
        el.style.opacity = '0';
        observer.observe(el);
    });

    // ============================================
    // Back to Top Button
    // ============================================
    const backToTop = document.getElementById('back-to-top');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ============================================
    // Print Article
    // ============================================
    window.printArticle = function() {
        window.print();
    };

    // ============================================
    // Share Article
    // ============================================
    window.shareArticle = function(title, url) {
        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            }).catch(console.error);
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(url).then(() => {
                showAlert('Link copied to clipboard!', 'success');
            }).catch(() => {
                showAlert('Unable to copy link', 'error');
            });
        }
    };

})();
