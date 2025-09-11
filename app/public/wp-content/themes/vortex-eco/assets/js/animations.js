/**
 * VORTEX-ECO Theme Animations
 * Handles scroll animations, hover effects, and interactive elements
 */

(function($) {
    'use strict';

    class VortexEcoAnimations {
        constructor() {
            this.init();
        }

        init() {
            this.setupScrollAnimations();
            this.setupCounterAnimations();
            this.setupParallax();
            this.setupSmoothScroll();
            this.setupHoverEffects();
            this.setupLoadingAnimations();
        }

        // Intersection Observer for scroll animations
        setupScrollAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        
                        // Trigger counter animation if element has data-count
                        if (entry.target.hasAttribute('data-count')) {
                            this.animateCounter(entry.target);
                        }
                    }
                });
            }, observerOptions);

            // Observe elements with animation classes
            document.querySelectorAll('.fade-in, .slide-up, .stat-number').forEach(el => {
                observer.observe(el);
            });
        }

        // Counter animations for statistics
        animateCounter(element) {
            const target = parseInt(element.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const start = parseInt(element.textContent) || 0;
            const increment = target / (duration / 16); // 60 FPS
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }

        // Parallax scrolling effects
        setupParallax() {
            const parallaxElements = document.querySelectorAll('[style*="background-attachment: fixed"]');
            
            if (window.innerWidth > 768) { // Only on desktop
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * -0.5;

                    parallaxElements.forEach(element => {
                        element.style.transform = `translateY(${rate}px)`;
                    });
                });
            }
        }

        // Smooth scrolling for anchor links
        setupSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;

                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        const headerHeight = document.querySelector('.site-header').offsetHeight;
                        const targetPosition = target.offsetTop - headerHeight - 20;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        }

        // Enhanced hover effects
        setupHoverEffects() {
            // Service cards hover effect
            document.querySelectorAll('.service-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) rotateX(5deg)';
                    this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.15)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) rotateX(0)';
                    this.style.boxShadow = 'var(--shadow-sm)';
                });
            });

            // Button hover effects with ripple
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');

                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Image hover zoom effect
            document.querySelectorAll('img').forEach(img => {
                if (img.closest('.service-card, .project-card, .article-card')) {
                    img.addEventListener('mouseenter', function() {
                        this.style.transform = 'scale(1.1)';
                    });

                    img.addEventListener('mouseleave', function() {
                        this.style.transform = 'scale(1)';
                    });
                }
            });
        }

        // Loading animations
        setupLoadingAnimations() {
            // Stagger animations for grid items
            const animateGridItems = (selector, delay = 100) => {
                const items = document.querySelectorAll(selector);
                items.forEach((item, index) => {
                    item.style.animationDelay = `${index * delay}ms`;
                });
            };

            animateGridItems('.service-card', 150);
            animateGridItems('.project-card', 100);
            animateGridItems('.value-card', 200);

            // Text typing effect for hero titles
            this.setupTypingEffect();
        }

        // Typing effect for hero titles
        setupTypingEffect() {
            const heroTitle = document.querySelector('.hero-title');
            if (!heroTitle || heroTitle.classList.contains('typed')) return;

            const text = heroTitle.textContent;
            heroTitle.textContent = '';
            heroTitle.classList.add('typed');

            let index = 0;
            const typeWriter = () => {
                if (index < text.length) {
                    heroTitle.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 50);
                } else {
                    // Add blinking cursor
                    heroTitle.style.borderRight = '3px solid var(--accent-color)';
                    heroTitle.style.animation = 'blink 1s infinite';
                }
            };

            // Start typing after a short delay
            setTimeout(typeWriter, 500);
        }

        // Mobile menu animations
        setupMobileMenu() {
            const menuToggle = document.querySelector('.mobile-menu-toggle');
            const navigation = document.querySelector('.main-navigation');

            if (menuToggle && navigation) {
                menuToggle.addEventListener('click', function() {
                    const isOpen = navigation.classList.contains('active');
                    
                    if (isOpen) {
                        navigation.style.animation = 'slideUp 0.3s ease-out forwards';
                        setTimeout(() => {
                            navigation.classList.remove('active');
                        }, 300);
                    } else {
                        navigation.classList.add('active');
                        navigation.style.animation = 'slideDown 0.3s ease-out forwards';
                    }

                    // Animate hamburger icon
                    this.classList.toggle('active');
                });
            }
        }

        // Scroll progress indicator
        setupScrollProgress() {
            const progressBar = document.createElement('div');
            progressBar.className = 'scroll-progress';
            progressBar.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 0%;
                height: 3px;
                background: var(--gradient-accent);
                z-index: 9999;
                transition: width 0.1s ease;
            `;
            document.body.appendChild(progressBar);

            window.addEventListener('scroll', () => {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                progressBar.style.width = scrolled + '%';
            });
        }

        // Floating elements animation
        setupFloatingElements() {
            const floatingElements = document.querySelectorAll('.floating-element');
            
            floatingElements.forEach((element, index) => {
                const amplitude = 10 + (index * 5);
                const period = 3000 + (index * 500);
                
                setInterval(() => {
                    const offset = Math.sin(Date.now() / period) * amplitude;
                    element.style.transform = `translateY(${offset}px)`;
                }, 16);
            });
        }

        // Particles background effect
        setupParticles() {
            const heroSection = document.querySelector('.hero-section');
            if (!heroSection) return;

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                opacity: 0.1;
            `;
            heroSection.appendChild(canvas);

            const particles = [];
            const particleCount = 50;

            function resizeCanvas() {
                canvas.width = heroSection.offsetWidth;
                canvas.height = heroSection.offsetHeight;
            }

            function createParticle() {
                return {
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    vx: (Math.random() - 0.5) * 0.5,
                    vy: (Math.random() - 0.5) * 0.5,
                    radius: Math.random() * 2 + 1
                };
            }

            function initParticles() {
                for (let i = 0; i < particleCount; i++) {
                    particles.push(createParticle());
                }
            }

            function animateParticles() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                particles.forEach(particle => {
                    particle.x += particle.vx;
                    particle.y += particle.vy;

                    if (particle.x < 0 || particle.x > canvas.width) particle.vx *= -1;
                    if (particle.y < 0 || particle.y > canvas.height) particle.vy *= -1;

                    ctx.beginPath();
                    ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
                    ctx.fillStyle = '#ffffff';
                    ctx.fill();
                });

                requestAnimationFrame(animateParticles);
            }

            resizeCanvas();
            initParticles();
            animateParticles();

            window.addEventListener('resize', resizeCanvas);
        }
    }

    // Initialize animations when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        new VortexEcoAnimations();
    });

    // CSS animations and keyframes
    const animationStyles = `
        <style>
            .fade-in {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .fade-in.visible {
                opacity: 1;
                transform: translateY(0);
            }

            .slide-up {
                opacity: 0;
                transform: translateY(50px);
                transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .slide-up.visible {
                opacity: 1;
                transform: translateY(0);
            }

            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s ease-out;
                pointer-events: none;
            }

            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideUp {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }
                to {
                    opacity: 0;
                    transform: translateY(-20px);
                }
            }

            @keyframes blink {
                0%, 50% { border-color: var(--accent-color); }
                51%, 100% { border-color: transparent; }
            }

            .mobile-menu-toggle.active span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .mobile-menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            .mobile-menu-toggle.active span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -6px);
            }

            .mobile-menu-toggle span {
                display: block;
                width: 25px;
                height: 3px;
                background: var(--primary-color);
                margin: 5px 0;
                transition: 0.3s ease;
                transform-origin: center;
            }

            /* Service card enhanced hover */
            .service-card {
                perspective: 1000px;
                transform-style: preserve-3d;
            }

            /* Floating animation */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-15px); }
            }

            .floating-element {
                animation: float 3s ease-in-out infinite;
            }

            /* Stagger animation delays */
            .service-card:nth-child(1) { animation-delay: 0ms; }
            .service-card:nth-child(2) { animation-delay: 150ms; }
            .service-card:nth-child(3) { animation-delay: 300ms; }
            .service-card:nth-child(4) { animation-delay: 450ms; }
            .service-card:nth-child(5) { animation-delay: 600ms; }
            .service-card:nth-child(6) { animation-delay: 750ms; }
            .service-card:nth-child(7) { animation-delay: 900ms; }
            .service-card:nth-child(8) { animation-delay: 1050ms; }

            /* Reduced motion for accessibility */
            @media (prefers-reduced-motion: reduce) {
                .fade-in, .slide-up, .service-card {
                    animation: none;
                    transition: none;
                }
                
                .fade-in, .slide-up {
                    opacity: 1;
                    transform: none;
                }
            }

            /* Mobile optimizations */
            @media (max-width: 768px) {
                .fade-in, .slide-up {
                    transition-duration: 0.4s;
                }
                
                .service-card:hover {
                    transform: none;
                }
            }
        </style>
    `;

    // Inject animation styles
    document.head.insertAdjacentHTML('beforeend', animationStyles);

})(jQuery);