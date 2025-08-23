<?php
/**
 * The template for displaying the footer
 *
 * @package VortexEco
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
                <div class="footer-content">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <!-- Default footer content when no widgets are active -->
                <div class="footer-content">
                    <div class="footer-widget-area">
                        <div class="footer-widget">
                            <h4><?php bloginfo('name'); ?></h4>
                            <p><?php esc_html_e('Professional Wind Energy Consulting firm specializing in comprehensive offshore wind solutions across the Asia-Pacific region.', 'vortex-eco'); ?></p>
                            
                            <div style="margin-top: 1.5rem;">
                                <p><strong><?php esc_html_e('Phone:', 'vortex-eco'); ?></strong> <a href="tel:+1-555-123-4567">+1 (555) 123-4567</a></p>
                                <p><strong><?php esc_html_e('Email:', 'vortex-eco'); ?></strong> <a href="mailto:info@vortexeco.com">info@vortexeco.com</a></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="footer-widget-area">
                        <div class="footer-widget">
                            <h4><?php esc_html_e('Our Services', 'vortex-eco'); ?></h4>
                            <ul>
                                <li><a href="#services"><?php esc_html_e('Materials Consulting', 'vortex-eco'); ?></a></li>
                                <li><a href="#services"><?php esc_html_e('Turbine Performance', 'vortex-eco'); ?></a></li>
                                <li><a href="#services"><?php esc_html_e('Installation Planning', 'vortex-eco'); ?></a></li>
                                <li><a href="#services"><?php esc_html_e('O&M Consulting', 'vortex-eco'); ?></a></li>
                                <li><a href="#services"><?php esc_html_e('Regulatory Support', 'vortex-eco'); ?></a></li>
                                <li><a href="#services"><?php esc_html_e('ESG Solutions', 'vortex-eco'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="footer-widget-area">
                        <div class="footer-widget">
                            <h4><?php esc_html_e('Company', 'vortex-eco'); ?></h4>
                            <ul>
                                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'vortex-eco'); ?></a></li>
                                <li><a href="#about"><?php esc_html_e('About Us', 'vortex-eco'); ?></a></li>
                                <li><a href="#values"><?php esc_html_e('Our Values', 'vortex-eco'); ?></a></li>
                                <?php if (get_option('page_for_posts')) : ?>
                                    <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php esc_html_e('News & Insights', 'vortex-eco'); ?></a></li>
                                <?php endif; ?>
                                <li><a href="#contact"><?php esc_html_e('Contact', 'vortex-eco'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="footer-widget-area">
                        <div class="footer-widget">
                            <h4><?php esc_html_e('Connect With Us', 'vortex-eco'); ?></h4>
                            
                            <?php
                            // Social menu
                            if (has_nav_menu('social')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'social',
                                    'container'      => 'div',
                                    'container_class'=> 'social-links',
                                    'menu_class'     => 'social-menu',
                                    'link_before'    => '<span class="sr-only">',
                                    'link_after'     => '</span>',
                                    'depth'          => 1,
                                ));
                            } else {
                                // Default social links
                                echo '<div class="social-links">';
                                echo '<ul class="social-menu">';
                                echo '<li><a href="#" aria-label="Facebook">📘</a></li>';
                                echo '<li><a href="#" aria-label="Twitter">🐦</a></li>';
                                echo '<li><a href="#" aria-label="LinkedIn">💼</a></li>';
                                echo '<li><a href="#" aria-label="YouTube">📺</a></li>';
                                echo '</ul>';
                                echo '</div>';
                            }
                            ?>
                            
                            <div style="margin-top: 1.5rem;">
                                <h5><?php esc_html_e('Newsletter', 'vortex-eco'); ?></h5>
                                <p style="font-size: 0.9rem; margin-bottom: 1rem;"><?php esc_html_e('Stay updated with the latest wind energy insights and industry developments.', 'vortex-eco'); ?></p>
                                
                                <!-- Newsletter signup form -->
                                <form class="newsletter-form" action="#" method="post" style="display: flex; gap: 0.5rem;">
                                    <input type="email" name="email" placeholder="<?php esc_attr_e('Your email address', 'vortex-eco'); ?>" required style="
                                        flex: 1;
                                        padding: 0.5rem;
                                        border: 1px solid #34495E;
                                        border-radius: var(--border-radius);
                                        background: #34495E;
                                        color: white;
                                        font-size: 0.9rem;
                                    ">
                                    <button type="submit" style="
                                        background: var(--accent-color);
                                        color: white;
                                        border: none;
                                        padding: 0.5rem 1rem;
                                        border-radius: var(--border-radius);
                                        font-size: 0.9rem;
                                        cursor: pointer;
                                    "><?php esc_html_e('Subscribe', 'vortex-eco'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Site Info -->
            <div class="site-info">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'vortex-eco'); ?></p>
                        <p style="font-size: 0.8rem; margin: 0.5rem 0 0;"><?php esc_html_e('Professional Wind Energy Consulting | Comprehensive Offshore Solutions', 'vortex-eco'); ?></p>
                    </div>
                    
                    <div>
                        <?php
                        // Footer menu
                        if (has_nav_menu('footer')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'container'      => false,
                                'menu_class'     => 'footer-menu',
                                'depth'          => 1,
                            ));
                        } else {
                            echo '<ul class="footer-menu" style="display: flex; gap: 1rem; list-style: none; margin: 0; padding: 0; font-size: 0.9rem;">';
                            echo '<li><a href="#" style="color: #95A5A6;">' . esc_html__('Privacy Policy', 'vortex-eco') . '</a></li>';
                            echo '<li><a href="#" style="color: #95A5A6;">' . esc_html__('Terms of Service', 'vortex-eco') . '</a></li>';
                            echo '<li><a href="#" style="color: #95A5A6;">' . esc_html__('Site Map', 'vortex-eco') . '</a></li>';
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Back to Top Button -->
            <button id="back-to-top" class="back-to-top" style="
                position: fixed;
                bottom: 2rem;
                right: 2rem;
                background: var(--gradient-primary);
                color: white;
                border: none;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                cursor: pointer;
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
                box-shadow: var(--shadow-md);
                z-index: 999;
                font-size: 1.2rem;
            " aria-label="<?php esc_attr_e('Back to top', 'vortex-eco'); ?>">
                ↑
            </button>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Custom inline scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Back to top functionality
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.style.opacity = '1';
            backToTopButton.style.visibility = 'visible';
        } else {
            backToTopButton.style.opacity = '0';
            backToTopButton.style.visibility = 'hidden';
        }
    });
    
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Newsletter form handling
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[name="email"]').value;
            // Add your newsletter signup logic here
            alert('<?php echo esc_js(__("Thank you for subscribing to our newsletter!", "vortex-eco")); ?>');
            this.reset();
        });
    }
    
    // Social links styling
    const socialLinks = document.querySelectorAll('.social-menu a');
    socialLinks.forEach(link => {
        link.style.cssText = `
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            color: #BDC3C7;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-right: 0.5rem;
            font-size: 1.2rem;
        `;
        
        link.addEventListener('mouseenter', function() {
            this.style.background = 'var(--accent-color)';
            this.style.color = 'white';
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.background = 'rgba(255,255,255,0.1)';
            this.style.color = '#BDC3C7';
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

</body>
</html>