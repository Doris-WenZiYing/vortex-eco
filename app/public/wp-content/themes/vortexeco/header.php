<?php
/**
 * The header for VORTEXECO theme
 *
 * @package VortexEco
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Preload Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="site-header" style="
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(229, 231, 235, 0.8);
    transition: all 0.3s ease;
    width: 100vw;
">
    <div class="header-container" style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 2rem;
        max-width: 1400px;
        margin: 0 auto;
    ">
        <!-- Logo and Company Name -->
        <div class="site-branding" style="
            display: flex;
            align-items: center;
            gap: 1rem;
        ">
            <a href="<?php echo home_url('/'); ?>" style="
                display: flex;
                align-items: center;
                gap: 1rem;
                text-decoration: none;
                color: #1263A0;
            ">
                <!-- Logo -->
                <div style="
                    width: 45px;
                    height: 45px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                ">
                    <?php if ( get_theme_mod('mytheme_header_logo') ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod('mytheme_header_logo') ); ?>" 
                            alt="Header Logo"
                            style="width: 45px; height: 45px; object-fit: contain;" />
                    <?php endif; ?>
                </div>
                
                <!-- Company Name -->
                <div style="
                    font-size: 1.4rem;
                    font-weight: 800;
                    color: #1263A0;
                    letter-spacing: -0.5px;
                ">
                    VORTEXECO
                </div>
            </a>
        </div>
        
        <!-- Navigation and Search -->
        <div style="
            display: flex;
            align-items: center;
            gap: 2rem;
        ">
            <!-- Main Navigation -->
            <nav class="main-navigation" style="
                display: flex;
                align-items: center;
            ">
                <ul style="
                    display: flex;
                    list-style: none;
                    gap: 2rem;
                    margin: 0;
                    padding: 0;
                    align-items: center;
                ">
                    <li>
                        <a href="<?php echo home_url(''); ?>" style="
                            color: #4B5563;
                            font-weight: 500;
                            padding: 0.75rem 0;
                            transition: color 0.3s ease;
                            position: relative;
                            text-decoration: none;
                            font-size: 0.95rem;
                        ">
                            <?php _e('About Us', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/products/'); ?>" style="
                            color: #4B5563;
                            font-weight: 500;
                            padding: 0.75rem 0;
                            transition: color 0.3s ease;
                            position: relative;
                            text-decoration: none;
                            font-size: 0.95rem;
                        ">
                             <?php _e('Products', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/services/'); ?>" style="
                            color: #4B5563;
                            font-weight: 500;
                            padding: 0.75rem 0;
                            transition: color 0.3s ease;
                            position: relative;
                            text-decoration: none;
                            font-size: 0.95rem;
                        ">
                            <?php _e('Services', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/market-insights/'); ?>" style="
                            color: #4B5563;
                            font-weight: 500;
                            padding: 0.75rem 0;
                            transition: color 0.3s ease;
                            position: relative;
                            text-decoration: none;
                            font-size: 0.95rem;
                        ">
                            <?php _e('Market Insights', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/contact-us/'); ?>" style="
                            color: #4B5563;
                            font-weight: 500;
                            padding: 0.75rem 0;
                            transition: color 0.3s ease;
                            position: relative;
                            text-decoration: none;
                            font-size: 0.95rem;
                        ">
                            <?php _e('Contact Us', 'vortex-eco'); ?>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Search Form -->
            <div class="header-search" style="
                display: flex;
                align-items: center;
            ">
                <form class="header-search-form" style="
                    display: flex;
                    align-items: center;
                    background: #F9FAFB;
                    border: 1px solid #E5E7EB;
                    border-radius: 50px;
                    padding: 0.5rem 1rem;
                    transition: all 0.3s ease;
                    min-width: 250px;
                ">
                    <svg style="width: 18px; height: 18px; color: #9CA3AF; margin-right: 0.5rem;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                    </svg>
                    <input type="search" name="search_query" placeholder="<?php _e('Search products & services...', 'vortex-eco'); ?>" style="
                        border: none;
                        background: none;
                        outline: none;
                        padding: 0.25rem 0;
                        font-size: 0.9rem;
                        flex: 1;
                        color: #374151;
                    " />
                    <button type="submit" style="
                        background: #1263A0;
                        color: white;
                        border: none;
                        padding: 0.5rem 1rem;
                        border-radius: 25px;
                        cursor: pointer;
                        font-size: 0.85rem;
                        font-weight: 500;
                        transition: all 0.3s ease;
                        margin-left: 0.5rem;
                    ">
                        <?php _e('Search', 'vortex-eco'); ?>
                    </button>
                </form>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" style="
                display: none;
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: #1263A0;
                padding: 0.5rem;
            ">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Navigation -->
    <div class="mobile-navigation" style="
        display: none;
        background: white;
        border-top: 1px solid #E5E7EB;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    ">
        <ul style="
            list-style: none;
            margin: 0;
            padding: 1rem;
        ">
            <li style="border-bottom: 1px solid #F3F4F6;">
                 <a href="<?php echo home_url(''); ?>" style="
                    display: block;
                    padding: 1rem 0;
                    color: #4B5563;
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.3s ease;
                ">
                    <?php _e('About Us', 'vortex-eco'); ?>
                </a>
            </li>
            <li style="border-bottom: 1px solid #F3F4F6;">
                <a href="<?php echo home_url('/products-services/'); ?>" style="
                    display: block;
                    padding: 1rem 0;
                    color: #4B5563;
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.3s ease;
                ">
                    <?php _e('Products & Services', 'vortex-eco'); ?>
                </a>
            </li>
            <li style="border-bottom: 1px solid #F3F4F6;">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" style="
                    display: block;
                    padding: 1rem 0;
                    color: #4B5563;
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.3s ease;
                ">
                    <?php _e('Market Insights', 'vortex-eco'); ?>
                </a>
            </li>
            <li>
                <a href="#contact" style="
                    display: block;
                    padding: 1rem 0;
                    color: #4B5563;
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.3s ease;
                ">
                    <?php _e('Contact Us', 'vortex-eco'); ?>
                </a>
            </li>
        </ul>
        
        <!-- Mobile Search -->
        <div style="padding: 1rem; border-top: 1px solid #F3F4F6;">
            <form class="mobile-search-form" style="
                display: flex;
                gap: 0.5rem;
            ">
                <input type="search" name="search_query" placeholder="<?php _e('Search products & services...', 'vortex-eco'); ?>" style="
                    flex: 1;
                    padding: 0.75rem;
                    border: 1px solid #D1D5DB;
                    border-radius: 8px;
                    font-size: 1rem;
                " />
                <button type="submit" style="
                    background: #1263A0;
                    color: white;
                    border: none;
                    padding: 0.75rem 1rem;
                    border-radius: 8px;
                    font-weight: 500;
                    cursor: pointer;
                ">
                    <?php _e('Search', 'vortex-eco'); ?>
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Header Interactions Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.site-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.mobile-navigation');
    const searchForms = document.querySelectorAll('form[action*="products-services"]');
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.style.background = 'rgba(255, 255, 255, 0.98)';
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        } else {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
            header.style.boxShadow = 'none';
        }
    });
    
    // Mobile menu toggle
    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', function() {
            const isOpen = mobileNav.style.display === 'block';
            mobileNav.style.display = isOpen ? 'none' : 'block';
            
            // Animate menu icon
            const icon = menuToggle.querySelector('svg');
            if (icon) {
                icon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(90deg)';
            }
        });
    }
    
    // Navigation hover effects
    document.querySelectorAll('.main-navigation a, .mobile-navigation a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.color = '#1263A0';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.color = '#4B5563';
        });
    });
    
    // Search form enhancements
    searchForms.forEach(form => {
        const searchInput = form.querySelector('input[name="s"]');
        const searchButton = form.querySelector('button[type="submit"]');
        
        form.addEventListener('focusin', function() {
            this.style.borderColor = '#00A8E6';
            this.style.boxShadow = '0 0 0 3px rgba(0, 168, 230, 0.1)';
        });
        
        form.addEventListener('focusout', function() {
            this.style.borderColor = '#E5E7EB';
            this.style.boxShadow = 'none';
        });
        
        if (searchButton) {
            searchButton.addEventListener('mouseenter', function() {
                this.style.background = '#00A8E6';
                this.style.transform = 'translateY(-1px)';
            });
            
            searchButton.addEventListener('mouseleave', function() {
                this.style.background = '#1263A0';
                this.style.transform = 'translateY(0)';
            });
        }
        
        // Add search feedback on submit
        form.addEventListener('submit', function() {
            if (searchInput && searchInput.value.trim()) {
                if (searchButton) {
                    searchButton.style.background = '#0F5287';
                    searchButton.textContent = '搜尋中...';
                }
            }
        });
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = header.offsetHeight;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (mobileNav && mobileNav.style.display === 'block') {
                    mobileNav.style.display = 'none';
                }
            }
        });
    });
});
</script>

<!-- Header Styles -->
<style>
/* Navigation hover effects */
.main-navigation a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: #00A8E6;
    transition: width 0.3s ease;
}

.main-navigation a:hover::after {
    width: 100%;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .header-container {
        padding: 1rem 1.5rem !important;
    }
    
    .header-search form {
        min-width: 200px !important;
    }
}

@media (max-width: 768px) {
    .header-container {
        padding: 1rem !important;
    }
    
    .main-navigation,
    .header-search {
        display: none !important;
    }
    
    .menu-toggle {
        display: block !important;
    }
    
    .site-branding a {
        gap: 0.75rem !important;
    }
    
    .site-branding div:last-child {
        font-size: 1.2rem !important;
    }
}

@media (max-width: 480px) {
    .site-branding div:first-child {
        width: 40px !important;
        height: 40px !important;
        font-size: 1rem !important;
    }
    
    .site-branding div:last-child {
        font-size: 1.1rem !important;
    }
}

/* Search form focus states */
.header-search form:focus-within {
    border-color: #00A8E6 !important;
    box-shadow: 0 0 0 3px rgba(0, 168, 230, 0.1) !important;
}

/* Mobile search styling */
.mobile-navigation form input:focus {
    outline: none;
    border-color: #00A8E6;
    box-shadow: 0 0 0 3px rgba(0, 168, 230, 0.1);
}
</style>