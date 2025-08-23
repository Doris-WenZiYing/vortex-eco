/**
 * VORTEX-ECO Animations
 * Advanced animation effects for the theme
 */

(function() {
    'use strict';

    // Animation configuration
    const ANIMATION_CONFIG = {
        duration: 800,
        easing: 'cubic-bezier(0.4, 0, 0.2, 1)',
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px',
        staggerDelay: 100
    };

    // Animation classes and their properties
    const ANIMATIONS = {
        'fade-in': {
            from: { opacity: 0, transform: 'translateY(30px)' },
            to: { opacity: 1, transform: 'translateY(0)' }
        },
        'slide-in-left': {
            from: { opacity: 0, transform: 'translateX(-50px)' },
            to: { opacity: 1, transform: 'translateX(0)' }
        },
        'slide-in-right': {
            from: { opacity: 0, transform: 'translateX(50px)' },
            to: { opacity: 1, transform: 'translateX(0)' }
        },
        'slide-up': {
            from: { opacity: 0, transform: 'translateY(50px)' },
            to: { opacity: 1, transform: 'translateY(0)' }
        },
        'scale-in': {
            from: { opacity: 0, transform: 'scale(0.8)' },
            to: { opacity: 1, transform: 'scale(1)' }
        },
        'rotate-in': {
            from: { opacity: 0, transform: 'rotate(-10deg) scale(0.8)' },
            to: { opacity: 1, transform: 'rotate(0deg) scale(1)' }
        }
    };

    class VortexEcoAnimations {
        constructor() {
            this.observer = null;
            this.animatedElements = new Set();
            this.init();
        }

        init() {
            document.addEventListener('DOMContentLoaded', () => {
                this.setupIntersectionObserver();
                this.initializeAnimations();
                this.setupSpecialAnimations();
                this.addAnimationStyles();
            });
        }

        setupIntersectionObserver() {
            if (!('IntersectionObserver' in window)) {
                // Fallback for older browsers
                this.fallbackAnimation();
                return;
            }

            this.observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.animatedElements.has(entry.target)) {
                        this.animateElement(entry.target);
                        this.animatedElements.add(entry.target);
                        this.observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: ANIMATION_CONFIG.threshold,
                rootMargin: ANIMATION_CONFIG.rootMargin
            });
        }

        initializeAnimations() {
            // Find all elements with animation classes
            const animationClasses = Object.keys(ANIMATIONS);
            const selector = animationClasses.map(cls => `.${cls}`).join(', ');
            const elements = document.querySelectorAll(selector);

            elements.forEach(element => {
                this.prepareElement(element);
                if (this.observer) {
                    this.observer.observe(element);
                }
            });

            // Handle staggered animations
            this.setupStaggeredAnimations();
        }

        prepareElement(element) {
            const animationClass = this.getAnimationClass(element);
            if (animationClass && ANIMATIONS[animationClass]) {
                const { from } = ANIMATIONS[animationClass];
                
                // Apply initial state
                Object.entries(from).forEach(([property, value]) => {
                    element.style[property] = value;
                });

                element.style.transition = `all ${ANIMATION_CONFIG.duration}ms ${ANIMATION_CONFIG.easing}`;
            }
        }

        animateElement(element) {
            const animationClass = this.getAnimationClass(element);
            if (animationClass && ANIMATIONS[animationClass]) {
                const { to } = ANIMATIONS[animationClass];
                
                requestAnimationFrame(() => {
                    Object.entries(to).forEach(([property, value]) => {
                        element.style[property] = value;
                    });
                    
                    element.classList.add('animated');
                    this.dispatchAnimationEvent(element, 'vortex-animated');
                });
            }
        }

        getAnimationClass(element) {
            return Object.keys(ANIMATIONS).find(cls => element.classList.contains(cls));
        }

        setupStaggeredAnimations() {
            // Service cards staggered animation
            const serviceCards = document.querySelectorAll('.service-card');
            this.setupStagger(serviceCards, ANIMATION_CONFIG.staggerDelay);

            // Value cards staggered animation
            const valueCards = document.querySelectorAll('.value-card');
            this.setupStagger(valueCards, ANIMATION_CONFIG.staggerDelay);

            // Stats cards staggered animation
            const statCards = document.querySelectorAll('.stat-card');
            this.setupStagger(statCards, ANIMATION_CONFIG.staggerDelay * 0.5);
        }

        setupStagger(elements, delay) {
            elements.forEach((element, index) => {
                element.style.transitionDelay = `${index * delay}ms`;
            });
        }

        setupSpecialAnimations() {
            this.setupCounterAnimation();
            this.setupParallaxEffects();
            this.setupHoverAnimations();
            this.setupScrollAnimations();
        }

        setupCounterAnimation() {
            const counters = document.querySelectorAll('.stat-number[data-count]');
            
            counters.forEach(counter => {
                const target = parseInt(counter.dataset.count);
                const suffix = counter.textContent.replace(/[0-9]/g, '');
                
                if (this.observer) {
                    const counterObserver = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                this.animateCounter(entry.target, target, suffix);
                                counterObserver.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.5 });
                    
                    counterObserver.observe(counter);
                }
            });
        }

        animateCounter(element, target, suffix = '') {
            let current = 0;
            const increment = target / (ANIMATION_CONFIG.duration / 16);
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + suffix;
            }, 16);
        }

        setupParallaxEffects() {
            const parallaxElements = document.querySelectorAll('.parallax-element');
            
            if (parallaxElements.length && window.innerWidth > 768) {
                window.addEventListener('scroll', this.throttle(() => {
                    const scrolled = window.pageYOffset;
                    
                    parallaxElements.forEach(element => {
                        const rate = parseFloat(element.dataset.rate) || 0.5;
                        const yPos = -(scrolled * rate);
                        element.style.transform = `translateY(${yPos}px)`;
                    });
                }, 16));
            }
        }

        setupHoverAnimations() {
            // Card hover effects
            const cards = document.querySelectorAll('.service-card, .value-card, .stat-card, .post-card');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-8px)';
                    card.style.boxShadow = 'var(--shadow-lg)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                    card.style.boxShadow = 'var(--shadow-sm)';
                });
            });

            // Button hover effects
            const buttons = document.querySelectorAll('.btn');
            
            buttons.forEach(button => {
                button.addEventListener('mouseenter', () => {
                    button.style.transform = 'translateY(-2px)';
                });
                
                button.addEventListener('mouseleave', () => {
                    button.style.transform = 'translateY(0)';
                });
            });
        }

        setupScrollAnimations() {
            // Header scroll effect
            const header = document.querySelector('.site-header');
            let lastScrollTop = 0;
            
            window.addEventListener('scroll', this.throttle(() => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (header) {
                    if (scrollTop > 100) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                    
                    // Hide/show header
                    if (scrollTop > lastScrollTop && scrollTop > 200) {
                        header.classList.add('header-hidden');
                    } else {
                        header.classList.remove('header-hidden');
                    }
                }
                
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            }, 16));

            // Progress bar animation
            this.setupProgressBar();
        }

        setupProgressBar() {
            const progressBar = document.createElement('div');
            progressBar.className = 'reading-progress';
            progressBar.innerHTML = '<div class="progress-fill"></div>';
            
            const progressStyle = document.createElement('style');
            progressStyle.textContent = `
                .reading-progress {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 3px;
                    background: rgba(18, 99, 160, 0.1);
                    z-index: 9999;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                }
                
                .reading-progress.visible {
                    opacity: 1;
                }
                
                .progress-fill {
                    height: 100%;
                    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
                    width: 0%;
                    transition: width 0.1s ease;
                }
            `;
            
            if (document.body.classList.contains('single-post') || document.body.classList.contains('single-page')) {
                document.head.appendChild(progressStyle);
                document.body.appendChild(progressBar);
                
                const progressFill = progressBar.querySelector('.progress-fill');
                
                window.addEventListener('scroll', this.throttle(() => {
                    const scrollTop = window.pageYOffset;
                    const documentHeight = document.documentElement.scrollHeight - window.innerHeight;
                    const scrollPercent = (scrollTop / documentHeight) * 100;
                    
                    progressFill.style.width = scrollPercent + '%';
                    
                    if (scrollPercent > 5) {
                        progressBar.classList.add('visible');
                    } else {
                        progressBar.classList.remove('visible');
                    }
                }, 16));
            }
        }

        addAnimationStyles() {
            const styles = document.createElement('style');
            styles.textContent = `
                /* Animation base styles */
                .fade-in,
                .slide-in-left,
                .slide-in-right,
                .slide-up,
                .scale-in,
                .rotate-in {
                    will-change: opacity, transform;
                }
                
                /* Header animations */
                .site-header {
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }
                
                .site-header.header-hidden {
                    transform: translateY(-100%);
                }
                
                /* Card animations */
                .service-card,
                .value-card,
                .stat-card,
                .post-card {
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }
                
                /* Button animations */
                .btn {
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                    overflow: hidden;
                }
                
                .btn::before {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 0;
                    height: 0;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    transition: all 0.6s ease;
                    transform: translate(-50%, -50%);
                }
                
                .btn:active::before {
                    width: 300px;
                    height: 300px;
                }
                
                /* Loading animations */
                @keyframes pulse {
                    0%, 100% { opacity: 1; }
                    50% { opacity: 0.5; }
                }
                
                @keyframes spin {
                    to { transform: rotate(360deg); }
                }
                
                @keyframes bounce {
                    0%, 100% { transform: translateY(0); }
                    50% { transform: translateY(-10px); }
                }
                
                /* Utility animations */
                .pulse { animation: pulse 2s infinite; }
                .spin { animation: spin 1s linear infinite; }
                .bounce { animation: bounce 2s infinite; }
                
                /* Reduce motion for accessibility */
                @media (prefers-reduced-motion: reduce) {
                    .fade-in,
                    .slide-in-left,
                    .slide-in-right,
                    .slide-up,
                    .scale-in,
                    .rotate-in {
                        animation: none !important;
                        transition: none !important;
                        opacity: 1 !important;
                        transform: none !important;
                    }
                    
                    .site-header,
                    .service-card,
                    .value-card,
                    .stat-card,
                    .post-card,
                    .btn {
                        transition: none !important;
                    }
                    
                    .pulse,
                    .spin,
                    .bounce {
                        animation: none !important;
                    }
                }
            `;
            
            document.head.appendChild(styles);
        }

        fallbackAnimation() {
            // Simple fallback for browsers without IntersectionObserver
            const elements = document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right, .slide-up, .scale-in, .rotate-in');
            
            setTimeout(() => {
                elements.forEach(element => {
                    element.style.opacity = '1';
                    element.style.transform = 'none';
                });
            }, 500);
        }

        dispatchAnimationEvent(element, eventName) {
            const event = new CustomEvent(eventName, {
                detail: { element: element },
                bubbles: true
            });
            element.dispatchEvent(event);
        }

        throttle(func, delay) {
            let timeoutId;
            let lastExecTime = 0;
            return function (...args) {
                const currentTime = Date.now();
                
                if (currentTime - lastExecTime > delay) {
                    func.apply(this, args);
                    lastExecTime = currentTime;
                } else {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(() => {
                        func.apply(this, args);
                        lastExecTime = Date.now();
                    }, delay - (currentTime - lastExecTime));
                }
            };
        }

        // Public methods for external use
        animateElementById(elementId, animationType = 'fade-in') {
            const element = document.getElementById(elementId);
            if (element && ANIMATIONS[animationType]) {
                element.classList.add(animationType);
                this.prepareElement(element);
                setTimeout(() => this.animateElement(element), 50);
            }
        }

        addCustomAnimation(name, fromState, toState) {
            ANIMATIONS[name] = {
                from: fromState,
                to: toState
            };
        }

        refreshAnimations() {
            this.animatedElements.clear();
            this.initializeAnimations();
        }
    }

    // Page transition animations
    class PageTransitions {
        constructor() {
            this.isTransitioning = false;
            this.init();
        }

        init() {
            document.addEventListener('DOMContentLoaded', () => {
                this.setupPageTransitions();
                this.addTransitionStyles();
            });
        }

        setupPageTransitions() {
            // Only enable for modern browsers
            if (!('history' in window) || !('pushState' in history)) {
                return;
            }

            const links = document.querySelectorAll('a[href^="' + window.location.origin + '"]');
            
            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    if (this.shouldTransition(link, e)) {
                        e.preventDefault();
                        this.navigateWithTransition(link.href);
                    }
                });
            });

            // Handle browser back/forward
            window.addEventListener('popstate', () => {
                this.navigateWithTransition(window.location.href, false);
            });
        }

        shouldTransition(link, event) {
            // Skip if modifier keys are pressed
            if (event.ctrlKey || event.metaKey || event.shiftKey) {
                return false;
            }

            // Skip if target is blank
            if (link.target === '_blank') {
                return false;
            }

            // Skip if it's a download link
            if (link.hasAttribute('download')) {
                return false;
            }

            // Skip if already transitioning
            if (this.isTransitioning) {
                return false;
            }

            return true;
        }

        navigateWithTransition(url, updateHistory = true) {
            if (this.isTransitioning) {
                return;
            }

            this.isTransitioning = true;
            document.body.classList.add('page-transitioning');

            // Animate out
            this.animateOut().then(() => {
                if (updateHistory) {
                    history.pushState(null, '', url);
                }
                
                // Load new content
                this.loadPage(url).then(() => {
                    this.animateIn().then(() => {
                        this.isTransitioning = false;
                        document.body.classList.remove('page-transitioning');
                    });
                });
            });
        }

        animateOut() {
            return new Promise(resolve => {
                const content = document.querySelector('.site-content');
                content.style.opacity = '0';
                content.style.transform = 'translateY(20px)';
                
                setTimeout(resolve, 300);
            });
        }

        animateIn() {
            return new Promise(resolve => {
                const content = document.querySelector('.site-content');
                content.style.opacity = '1';
                content.style.transform = 'translateY(0)';
                
                setTimeout(resolve, 300);
            });
        }

        loadPage(url) {
            return fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    // Update content
                    const newContent = doc.querySelector('.site-content');
                    const currentContent = document.querySelector('.site-content');
                    currentContent.innerHTML = newContent.innerHTML;
                    
                    // Update title
                    document.title = doc.title;
                    
                    // Reinitialize animations
                    if (window.VortexEcoAnimationsInstance) {
                        window.VortexEcoAnimationsInstance.refreshAnimations();
                    }
                })
                .catch(error => {
                    console.error('Page transition failed:', error);
                    window.location.href = url;
                });
        }

        addTransitionStyles() {
            const styles = document.createElement('style');
            styles.textContent = `
                .site-content {
                    transition: opacity 0.3s ease, transform 0.3s ease;
                }
                
                .page-transitioning {
                    pointer-events: none;
                }
                
                .page-transitioning .site-content {
                    opacity: 0;
                    transform: translateY(20px);
                }
            `;
            
            document.head.appendChild(styles);
        }
    }

    // Initialize animations
    window.VortexEcoAnimationsInstance = new VortexEcoAnimations();
    new PageTransitions();

    // Export for external use
    window.VortexEcoAnimations = VortexEcoAnimations;

})();