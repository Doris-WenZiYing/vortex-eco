<?php
/**
 * The template for displaying the footer
 *
 * @package VortexEco
 */
?>

<!-- Footer -->
<footer class="site-footer" style="
    background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
    color: white;
    padding: 4rem 0 1rem;
    position: relative;
    overflow: hidden;
">
    <!-- Background Pattern -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(0, 168, 230, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(18, 99, 160, 0.1) 0%, transparent 50%);
        opacity: 0.6;
    "></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <!-- Main Footer Content -->
        <div class="footer-content" style="
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        ">
            
            <!-- Company Info -->
            <div class="footer-section">
                <!-- Logo and Company Name -->
                <div style="
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                    margin-bottom: 2rem;
                ">
                    <div style="
                        width: 45px;
                        height: 45px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    ">
                        <?php if ( get_theme_mod('mytheme_header_logo') ) : ?>
                            <img src="<?php echo esc_url( get_theme_mod('mytheme_header_logo') ); ?>" 
                                alt="Footer Logo"
                                style="width: 45px; height: 45px; object-fit: contain;" />
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <h3 style="
                            color: #00A8E6;
                            margin: 0 0 0.25rem 0;
                            font-size: 1.3rem;
                            font-weight: 800;
                            letter-spacing: -0.5px;
                        ">VORTEXECO</h3>
                        <p style="
                            color: #9CA3AF;
                            font-size: 0.85rem;
                            margin: 0;
                            font-weight: 500;
                        ">SOLUTIONS PTE. LTD.</p>
                    </div>
                </div>
                
                <p style="
                    color: #D1D5DB;
                    margin-bottom: 2rem;
                    line-height: 1.6;
                    font-size: 0.95rem;
                ">
                    <?php _e('Leading wind energy consulting firm providing comprehensive services across materials, engineering, operations, and maintenance to advance sustainable offshore wind development in Asia-Pacific.', 'vortex-eco'); ?>
                </p>
                
                <!-- Contact Info -->
                <div style="space-y: 0.75rem;">
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                        margin-bottom: 0.75rem;
                    ">
                        <div style="
                            width: 35px;
                            height: 35px;
                            background: rgba(0, 168, 230, 0.1);
                            border-radius: 8px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #00A8E6;
                        ">📧</div>
                        <div>
                            <p style="margin: 0; color: #9CA3AF; font-size: 0.8rem; font-weight: 500;">Email</p>
                            <a href="mailto:TSD@vortexeco.com" style="
                                color: #D1D5DB;
                                text-decoration: none;
                                font-size: 0.9rem;
                                transition: color 0.3s ease;
                            ">TSD@vortexeco.com</a>
                        </div>
                    </div>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                        margin-bottom: 0.75rem;
                    ">
                        <div style="
                            width: 35px;
                            height: 35px;
                            background: rgba(0, 168, 230, 0.1);
                            border-radius: 8px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #00A8E6;
                        ">📞</div>
                        <div>
                            <p style="margin: 0; color: #9CA3AF; font-size: 0.8rem; font-weight: 500;">Phone</p>
                            <a href="tel:+6531258302" style="
                                color: #D1D5DB;
                                text-decoration: none;
                                font-size: 0.9rem;
                                transition: color 0.3s ease;
                            ">+65 (3) 1258302</a>
                        </div>
                    </div>
                    
                    <div style="
                        display: flex;
                        align-items: flex-start;
                        gap: 0.75rem;
                        margin-bottom: 0.75rem;
                    ">
                        <div style="
                            width: 35px;
                            height: 35px;
                            background: rgba(0, 168, 230, 0.1);
                            border-radius: 8px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #00A8E6;
                            margin-top: 0.1rem;
                        ">📍</div>
                        <div>
                            <p style="margin: 0; color: #9CA3AF; font-size: 0.8rem; font-weight: 500;">Address</p>
                            <address style="
                                color: #D1D5DB;
                                font-style: normal;
                                font-size: 0.9rem;
                                line-height: 1.4;
                                margin: 0;
                            ">
                                51 GOLDHILL PLAZA #20-07<br>
                                SINGAPORE (308900)
                            </address>
                        </div>
                    </div>

                    <!-- Social Links -->
            <div style="
                display: flex;
                align-items: center;
                gap: 1rem;
            ">
                
                <a href="#" style="
                    width: 35px;
                    height: 35px;
                    background: rgba(0, 168, 230, 0.1);
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #00A8E6;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    font-size: 1.1rem;
                " title="LinkedIn">
                    <svg style="width: 18px; height: 18px;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
                
                <a href="#" style="
                    width: 35px;
                    height: 35px;
                    background: rgba(0, 168, 230, 0.1);
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #00A8E6;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    font-size: 1.1rem;
                " title="YouTube">
                    <svg style="width: 18px; height: 18px;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                
                <a href="mailto:TSD@vortexeco.com" style="
                    width: 35px;
                    height: 35px;
                    background: rgba(0, 168, 230, 0.1);
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #00A8E6;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    font-size: 1.1rem;
                " title="Email">
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </a>
            </div>
                </div>
            </div>
            
            <!-- Services -->
            <div class="footer-section">
                <h3 style="
                    color: #00A8E6;
                    margin-bottom: 1.5rem;
                    font-size: 1.1rem;
                    font-weight: 700;
                ">
                    <?php _e('Our Services', 'vortex-eco'); ?>
                </h3>
                
                <ul style="
                    list-style: none;
                    margin: 0;
                    padding: 0;
                ">
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#services" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Wind Energy Materials', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#services" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Turbine Performance', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#services" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Installation Services', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#services" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Wind Farm Development', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#services" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Operations & Maintenance', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#services" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Sustainability & ESG', 'vortex-eco'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-section">
                <h3 style="
                    color: #00A8E6;
                    margin-bottom: 1.5rem;
                    font-size: 1.1rem;
                    font-weight: 700;
                ">
                    <?php _e('Quick Links', 'vortex-eco'); ?>
                </h3>
                
                <ul style="
                    list-style: none;
                    margin: 0;
                    padding: 0;
                ">
                    <li style="margin-bottom: 0.75rem;">
                        <a href="<?php echo home_url('/'); ?>" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Home', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#about" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('About Us', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Market Insights', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#contact" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Contact Us', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Privacy Policy', 'vortex-eco'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem;">
                        <a href="#" style="
                            color: #D1D5DB;
                            text-decoration: none;
                            font-size: 0.9rem;
                            transition: color 0.3s ease;
                            display: block;
                        ">
                            <?php _e('Terms of Service', 'vortex-eco'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Certifications -->
            <div class="footer-section">
                <h3 style="
                    color: #00A8E6;
                    margin-bottom: 1.5rem;
                    font-size: 1.1rem;
                    font-weight: 700;
                ">
                    <?php _e('Certifications', 'vortex-eco'); ?>
                </h3>
                
                <div style="
                    display: flex;
                    flex-direction: column;
                    gap: 0.75rem;
                ">
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                        font-size: 0.9rem;
                        color: #D1D5DB;
                        margin-bottom: 0.75rem;
                    ">
                        <span style="color: #00A8E6; font-size: 1.2rem;">✓</span>
                        <?php _e('ISO 9001:2015 Quality Management', 'vortex-eco'); ?>
                    </div>
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                        font-size: 0.9rem;
                        color: #D1D5DB;
                        margin-bottom: 0.75rem;
                    ">
                        <span style="color: #00A8E6; font-size: 1.2rem;">✓</span>
                        <?php _e('IEC 61400 Wind Turbine Standards', 'vortex-eco'); ?>
                    </div>
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                        font-size: 0.9rem;
                        color: #D1D5DB;
                        margin-bottom: 0.75rem;
                    ">
                        <span style="color: #00A8E6; font-size: 1.2rem;">✓</span>
                        <?php _e('Singapore BCA Certified Consultant', 'vortex-eco'); ?>
                    </div>
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.75rem;
                        font-size: 0.9rem;
                        color: #D1D5DB;
                    ">
                        <span style="color: #00A8E6; font-size: 1.2rem;">✓</span>
                        <?php _e('Offshore Wind Safety Certified', 'vortex-eco'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom" style="
            border-top: 1px solid #374151;
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        ">
            <div style="
                color: #9CA3AF;
                font-size: 0.9rem;
            ">
                <p style="margin: 0;">
                    <?php printf(
                        __('© %s VORTEXECO SOLUTIONS PTE. LTD. All rights reserved.', 'vortex-eco'),
                        date('Y')
                    ); ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Interactions Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Footer link hover effects
    document.querySelectorAll('.footer-section a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.color = '#00A8E6';
            this.style.transform = 'translateX(3px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.color = '#D1D5DB';
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Social links hover effects
    document.querySelectorAll('.footer-bottom a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.background = 'rgba(0, 168, 230, 0.2)';
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.background = 'rgba(0, 168, 230, 0.1)';
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Contact links click tracking (for analytics)
    document.querySelectorAll('a[href^="mailto:"], a[href^="tel:"]').forEach(link => {
        link.addEventListener('click', function() {
            // You can add analytics tracking here
            console.log('Contact link clicked:', this.href);
        });
    });
});
</script>

<!-- Footer Responsive Styles -->
<style>
/* Footer responsive design */
@media (max-width: 1024px) {
    .footer-content {
        grid-template-columns: 2fr 1fr 1fr !important;
        gap: 2rem !important;
    }
    
    .footer-section:last-child {
        grid-column: 1 / -1 !important;
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 2rem !important;
    }
}

@media (max-width: 768px) {
    .site-footer {
        padding: 3rem 0 1rem !important;
    }
    
    .footer-content {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    .footer-section:last-child {
        grid-column: auto !important;
        display: block !important;
    }
    
    .footer-bottom {
        flex-direction: column !important;
        text-align: center !important;
        gap: 1.5rem !important;
    }
    
    .footer-bottom > div:first-child {
        order: 2 !important;
    }
    
    .footer-bottom > div:last-child {
        order: 1 !important;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 1rem !important;
    }
    
    .footer-content {
        gap: 1.5rem !important;
    }
    
    .footer-section h3 {
        font-size: 1rem !important;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html>