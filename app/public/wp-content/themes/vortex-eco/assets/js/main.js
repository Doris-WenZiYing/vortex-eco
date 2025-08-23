/**
 * VORTEX-ECO Theme JavaScript
 * Professional Wind Energy Consulting Theme
 */

(function($) {
    'use strict';

    // Theme object
    const VortexEco = {
        init: function() {
            this.bindEvents();
            this.initializeComponents();
            this.handleScrollEffects();
            this.initializeAnimations();
        },

        bindEvents: function() {
            $(document).ready(this.onDocumentReady.bind(this));
            $(window).on('load', this.onWindowLoad.bind(this));
            $(window).on('scroll', this.debounce(this.onWindowScroll.bind(this), 16));
            $(window).on('resize', this.debounce(this.onWindowResize.bind(this), 250));
        },

        onDocumentReady: function() {
            this.initMobileMenu();
            this.initSmoothScroll();
            this.initBackToTop();
            this.initContactForms();
            this.initNewsletterForm();
            this.handleNavigation();
        },

        onWindowLoad: function() {
            this.initCounters();
            this.initHeroParallax();
            this.optimizeImages();
            $('body').addClass('loaded');
        },

        onWindowScroll: function() {
            this.updateHeaderOnScroll();
            this.updateActiveNavItems();
            this.handleScrollAnimations();
            this.updateBackToTop();
        },

        onWindowResize: function() {
            this.handleMobileMenuOnResize();
            this.recalculateAnimations();
        },

        initializeComponents: function() {
            this.initServiceCards();
            this.initValueCards();
            this.initStatCards();
            this.initTestimonialSlider();
        },

        // Mobile Menu
        initMobileMenu: function() {
            const $toggle = $('.mobile-menu-toggle');
            const $nav = $('.main-navigation');
            const $menu = $('.main-navigation ul');
            
            $toggle.on('click', function(e) {
                e.preventDefault();
                const isActive = $nav.hasClass('active');
                
                $nav.toggleClass('active', !isActive);
                $toggle.toggleClass('active', !isActive);
                $toggle.attr('aria-expanded', !isActive);
                
                // Prevent body scroll when menu is open
                $('body').toggleClass('menu-open', !isActive);
                
                // Animate menu items
                if (!isActive) {
                    $menu.find('li').each(function(index) {
                        $(this).css('animation-delay', (index * 100) + 'ms');
                    });
                }
            });

            // Close menu when clicking on overlay
            $(document).on('click', function(e) {
                if (!$nav.is(e.target) && !$nav.has(e.target).length && !$toggle.is(e.target) && !$toggle.has(e.target).length) {
                    $nav.removeClass('active');
                    $toggle.removeClass('active').attr('aria-expanded', false);
                    $('body').removeClass('menu-open');
                }
            });

            // Close menu when clicking on nav links
            $menu.find('a').on('click', function() {
                if (window.innerWidth <= 768) {
                    $nav.removeClass('active');
                    $toggle.removeClass('active').attr('aria-expanded', false);
                    $('body').removeClass('menu-open');
                }
            });
        },

        handleMobileMenuOnResize: function() {
            if (window.innerWidth > 768) {
                $('.main-navigation').removeClass('active');
                $('.mobile-menu-toggle').removeClass('active').attr('aria-expanded', false);
                $('body').removeClass('menu-open');
            }
        },

        // Smooth Scrolling
        initSmoothScroll: function() {
            $('a[href^="#"]').on('click', function(e) {
                const href = $(this).attr('href');
                const $target = $(href);
                
                if ($target.length) {
                    e.preventDefault();
                    const headerHeight = $('.site-header').outerHeight() || 0;
                    const targetPosition = $target.offset().top - headerHeight - 20;
                    
                    $('html, body').animate({
                        scrollTop: targetPosition
                    }, 800, 'easeInOutCubic');
                }
            });
        },

        // Header Scroll Effects
        updateHeaderOnScroll: function() {
            const $header = $('.site-header');
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 100) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
            
            // Hide/show header on scroll
            if (scrollTop > this.lastScrollTop && scrollTop > 200) {
                $header.addClass('header-hidden');
            } else {
                $header.removeClass('header-hidden');
            }
            this.lastScrollTop = scrollTop;
        },

        // Navigation Active States
        updateActiveNavItems: function() {
            const scrollPos = $(window).scrollTop();
            const headerHeight = $('.site-header').outerHeight();
            
            $('.main-navigation a[href^="#"]').each(function() {
                const $link = $(this);
                const sectionId = $link.attr('href');
                const $section = $(sectionId);
                
                if ($section.length) {
                    const sectionTop = $section.offset().top - headerHeight - 100;
                    const sectionBottom = sectionTop + $section.outerHeight();
                    
                    if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                        $('.main-navigation a').removeClass('active');
                        $link.addClass('active');
                    }
                }
            });
        },

        handleNavigation: function() {
            // Add smooth hover effects to nav items
            $('.main-navigation a').hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
        },

        // Back to Top Button
        initBackToTop: function() {
            const $backToTop = $('#back-to-top');
            
            $backToTop.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 600);
            });
        },

        updateBackToTop: function() {
            const $backToTop = $('#back-to-top');
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 300) {
                $backToTop.css({
                    'opacity': '1',
                    'visibility': 'visible'
                });
            } else {
                $backToTop.css({
                    'opacity': '0',
                    'visibility': 'hidden'
                });
            }
        },

        // Service Cards
        initServiceCards: function() {
            $('.service-card').hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
        },

        // Value Cards
        initValueCards: function() {
            $('.value-card').each(function(index) {
                $(this).css('animation-delay', (index * 0.1) + 's');
            });
        },

        // Stat Cards & Counters
        initStatCards: function() {
            $('.stat-card').hover(
                function() {
                    $(this).css('transform', 'translateY(-5px)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                }
            );
        },

        initCounters: function() {
            $('.stat-number[data-count]').each(function() {
                const $counter = $(this);
                const target = parseInt($counter.data('count'));
                const suffix = $counter.text().replace(/[0-9]/g, '');
                
                // Check if element is in viewport
                if (this.getBoundingClientRect().top < window.innerHeight) {
                    $({ countNum: 0 }).animate({
                        countNum: target
                    }, {
                        duration: 2500,
                        easing: 'easeOutQuart',
                        step: function() {
                            $counter.text(Math.floor(this.countNum) + suffix);
                        },
                        complete: function() {
                            $counter.text(target + suffix);
                        }
                    });
                }
            });
        },

        // Animations
        initializeAnimations: function() {
            // Initialize Intersection Observer
            if ('IntersectionObserver' in window) {
                this.observeElements();
            } else {
                // Fallback for older browsers
                $('.fade-in, .slide-up').addClass('visible');
            }
        },

        observeElements: function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.fade-in, .slide-up').forEach(el => {
                observer.observe(el);
            });
        },

        handleScrollAnimations: function() {
            // Parallax effect for hero section
            const scrolled = $(window).scrollTop();
            const parallax = scrolled * 0.5;
            
            $('.hero-section').css('transform', `translateY(${parallax}px)`);
        },

        recalculateAnimations: function() {
            // Recalculate animations on resize if needed
            if (window.innerWidth <= 768) {
                $('.hero-section').css('transform', 'none');
            }
        },

        // Hero Parallax
        initHeroParallax: function() {
            if (window.innerWidth > 768) {
                $(window).on('scroll', this.debounce(function() {
                    const scrollTop = $(window).scrollTop();
                    const windowHeight = $(window).height();
                    const heroHeight = $('.hero-section').outerHeight();
                    
                    if (scrollTop < heroHeight) {
                        const yPos = -(scrollTop / 2);
                        $('.hero-section').css('transform', `translateY(${yPos}px)`);
                    }
                }, 16));
            }
        },

        // Contact Forms
        initContactForms: function() {
            $('form[action="#"]').on('submit', function(e) {
                e.preventDefault();
                
                const $form = $(this);
                const $submitBtn = $form.find('button[type="submit"], input[type="submit"]');
                const originalText = $submitBtn.val() || $submitBtn.text();
                
                // Show loading state
                $submitBtn.prop('disabled', true);
                if ($submitBtn.is('button')) {
                    $submitBtn.text('Sending...');
                } else {
                    $submitBtn.val('Sending...');
                }
                
                // Simulate form submission
                setTimeout(() => {
                    this.showNotification('Thank you for your message! We will get back to you soon.', 'success');
                    $form[0].reset();
                    
                    // Reset button
                    $submitBtn.prop('disabled', false);
                    if ($submitBtn.is('button')) {
                        $submitBtn.text(originalText);
                    } else {
                        $submitBtn.val(originalText);
                    }
                }, 2000);
            });
        },

        // Newsletter Form
        initNewsletterForm: function() {
            $('.newsletter-form').on('submit', function(e) {
                e.preventDefault();
                
                const email = $(this).find('input[type="email"]').val();
                if (email) {
                    VortexEco.showNotification('Thank you for subscribing to our newsletter!', 'success');
                    $(this)[0].reset();
                }
            });
        },

        // Notification System
        showNotification: function(message, type = 'info') {
            const $notification = $(`
                <div class="vortex-notification vortex-notification-${type}">
                    <div class="notification-content">
                        <span class="notification-message">${message}</span>
                        <button class="notification-close">&times;</button>
                    </div>
                </div>
            `);
            
            $('body').append($notification);
            
            setTimeout(() => {
                $notification.addClass('show');
            }, 100);
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                this.hideNotification($notification);
            }, 5000);
            
            // Close button
            $notification.find('.notification-close').on('click', () => {
                this.hideNotification($notification);
            });
        },

        hideNotification: function($notification) {
            $notification.removeClass('show');
            setTimeout(() => {
                $notification.remove();
            }, 300);
        },

        // Image Optimization
        optimizeImages: function() {
            // Add loading="lazy" to images
            $('img').each(function() {
                if (!$(this).attr('loading')) {
                    $(this).attr('loading', 'lazy');
                }
            });
        },

        // Testimonial Slider (if added)
        initTestimonialSlider: function() {
            if ($('.testimonial-slider').length) {
                // Initialize slider here if needed
            }
        },

        // Utility Functions
        debounce: function(func, wait, immediate) {
            let timeout;
            return function() {
                const context = this;
                const args = arguments;
                const later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                const callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        },

        // Accessibility enhancements
        enhanceAccessibility: function() {
            // Add focus styles for keyboard navigation
            $('a, button, input, textarea, select').on('focus', function() {
                $(this).addClass('focused');
            }).on('blur', function() {
                $(this).removeClass('focused');
            });
            
            // Skip link functionality
            $('.skip-link').on('click', function(e) {
                const target = $(this).attr('href');
                const $target = $(target);
                if ($target.length) {
                    e.preventDefault();
                    $target.attr('tabindex', '-1').focus();
                    window.scrollTo(0, $target.offset().top - 80);
                }
            });
        }
    };

    // Custom easing function
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

    $.easing.easeOutQuart = function(x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b;
    };

    // Additional CSS for notifications
    const notificationCSS = `
        <style>
            .vortex-notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 20px rgba(0,0,0,0.15);
                padding: 0;
                max-width: 400px;
                z-index: 10000;
                transform: translateX(450px);
                opacity: 0;
                transition: all 0.3s ease;
            }
            
            .vortex-notification.show {
                transform: translateX(0);
                opacity: 1;
            }
            
            .vortex-notification-success {
                border-left: 4px solid #27AE60;
            }
            
            .vortex-notification-error {
                border-left: 4px solid #E74C3C;
            }
            
            .vortex-notification-info {
                border-left: 4px solid #3498DB;
            }
            
            .notification-content {
                padding: 16px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .notification-message {
                color: #2C3E50;
                font-size: 14px;
                line-height: 1.4;
            }
            
            .notification-close {
                background: none;
                border: none;
                font-size: 18px;
                cursor: pointer;
                color: #7F8C8D;
                margin-left: 12px;
                padding: 0;
                transition: color 0.2s ease;
            }
            
            .notification-close:hover {
                color: #E74C3C;
            }
            
            .menu-open {
                overflow: hidden;
            }
            
            .focused {
                outline: 2px solid #00A8E6 !important;
                outline-offset: 2px;
            }
            
            @media (max-width: 480px) {
                .vortex-notification {
                    left: 20px;
                    right: 20px;
                    max-width: none;
                    transform: translateY(-100px);
                }
                
                .vortex-notification.show {
                    transform: translateY(0);
                }
            }
        </style>
    `;
    
    $('head').append(notificationCSS);

    // Initialize theme
    VortexEco.init();
    
    // Make VortexEco object available globally
    window.VortexEco = VortexEco;

})(jQuery);

// Vanilla JS for performance-critical operations
document.addEventListener('DOMContentLoaded', function() {
    
    // Preload critical resources
    const criticalResources = [
        // Add critical resource URLs here
    ];
    
    criticalResources.forEach(resource => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = resource;
        link.as = 'image';
        document.head.appendChild(link);
    });
    
    // Performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', function() {
            setTimeout(function() {
                const perfData = performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                
                if (pageLoadTime > 3000) {
                    console.log('Page load time:', pageLoadTime + 'ms - Consider optimizing');
                }
            }, 0);
        });
    }
    
    // Service Worker registration (optional)
    if ('serviceWorker' in navigator) {
        // Uncomment to enable service worker
        // navigator.serviceWorker.register('/sw.js');
    }
});