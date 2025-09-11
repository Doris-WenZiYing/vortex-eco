<?php
/**
 * The front page template file with enhanced background image support
 *
 * @package VortexEco
 */

get_header(); ?>

<!-- Hero Section with Dynamic Background -->
<section id="hero" class="hero-section" style="
    background-image: 
        var(--gradient-overlay),
        url('<?php echo get_theme_mod('hero_background_image', get_template_directory_uri() . '/assets/images/wind-farm-hero.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
">
    <div class="container">
        <div class="hero-content fade-in">
            <h1 class="hero-title">
                <?php echo esc_html(get_theme_mod('hero_title', 'Professional Wind Energy Consulting, Comprehensive Offshore Wind Solutions')); ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('hero_subtitle', 'VORTEX ECO brings together wind industry experts, from material supply and engineering to operations and maintenance, providing comprehensive consulting services to help you reduce risks, improve efficiency, and move toward a sustainable future.')); ?>
            </p>
            <div class="hero-cta">
                <a href="<?php echo esc_url(get_theme_mod('hero_cta_url', '#services')); ?>" class="btn btn-primary btn-lg">
                    <?php echo esc_html(get_theme_mod('hero_cta_text', 'Explore Our Services')); ?>
                </a>
                <a href="#about" class="btn btn-white btn-lg">
                    <?php esc_html_e('Learn More', 'vortex-eco'); ?>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Animated wind turbine icon -->
    <div class="hero-decoration" style="
        position: absolute;
        bottom: 10%;
        right: 5%;
        font-size: 6rem;
        opacity: 0.3;
        color: white;
        animation: rotate 10s linear infinite;
    ">🌪️</div>
</section>

<!-- About Section with Background Image -->
<section id="about" class="section section-with-bg" style="
    background-image: 
        linear-gradient(rgba(248, 249, 250, 0.9), rgba(248, 249, 250, 0.9)),
        url('<?php echo get_theme_mod('about_background_image', get_template_directory_uri() . '/assets/images/offshore-wind-bg.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html(get_theme_mod('about_title', 'Comprehensive Consulting Team, Focused on Every Detail')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('about_subtitle', 'Want to make your project faster, more stable, and more sustainably competitive? Let the VORTEXECO consulting team provide you with the most suitable solutions.')); ?></p>
        </div>
        
        <div class="row">
            <div class="col slide-up">
                <div class="content-card" style="
                    background: linear-gradient(135deg, rgba(18, 99, 160, 0.95), rgba(11, 77, 125, 0.95));
                    color: white; 
                    padding: 3rem; 
                    border-radius: var(--border-radius-lg); 
                    height: 100%;
                    backdrop-filter: blur(10px);
                ">
                    <h3 style="color: white; margin-bottom: 1.5rem;">Leading Wind Energy Innovation</h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem;">With decades of combined experience in the wind energy sector, our team of experts provides unparalleled consulting services across all aspects of offshore wind development and operations.</p>
                    <p style="color: rgba(255,255,255,0.9);">From initial feasibility studies to long-term maintenance strategies, we ensure your projects meet the highest standards of efficiency, safety, and environmental responsibility.</p>
                </div>
            </div>
            <div class="col slide-up">
                <div class="content-card" style="
                    background: rgba(255, 255, 255, 0.95); 
                    padding: 3rem; 
                    border-radius: var(--border-radius-lg); 
                    box-shadow: var(--shadow-md); 
                    height: 100%;
                    backdrop-filter: blur(10px);
                ">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);">Our Expertise</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--bg-light); position: relative; padding-left: 2rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color); font-weight: bold;">✓</span>
                            Material Supply & Engineering
                        </li>
                        <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--bg-light); position: relative; padding-left: 2rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color); font-weight: bold;">✓</span>
                            Installation & Maintenance
                        </li>
                        <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--bg-light); position: relative; padding-left: 2rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color); font-weight: bold;">✓</span>
                            Regulatory Compliance
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 2rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color); font-weight: bold;">✓</span>
                            Sustainability & ESG
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section" style="
    background-image: 
        linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95)),
        url('<?php echo get_theme_mod('services_background_image', get_template_directory_uri() . '/assets/images/wind-turbines-bg.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
">
    <div class="container">
        <div class="section-title">
            <h2><?php esc_html_e('Our Consulting Expertise', 'vortex-eco'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('8 Major Consulting Specializations', 'vortex-eco'); ?></p>
        </div>
        
        <div class="services-grid">
            <!-- Service 1: Wind Energy Materials -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">🔧</div>
                <h3><?php esc_html_e('Wind Energy Materials Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Expert knowledge in structural materials, protective coatings, weather-resistant components, and construction consumables.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Material selection recommendations compliant with international standards and local regulations', 'vortex-eco'); ?></li>
                    <li><?php esc_html_e('Supply chain optimization to reduce costs and delay risks', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 2: Turbine Performance -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">⚡</div>
                <h3><?php esc_html_e('Turbine Performance & Structural Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Analysis of turbine operational efficiency and reliability assessment.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Structural safety and durability evaluation', 'vortex-eco'); ?></li>
                    <li><?php esc_html_e('Assistance in selecting the most suitable turbine models and brands', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 3: Pre-assembly -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">🏗️</div>
                <h3><?php esc_html_e('Pre-assembly & Installation Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Planning turbine pre-assembly processes and optimized installation solutions.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Optimized installation solutions to reduce construction time', 'vortex-eco'); ?></li>
                    <li><?php esc_html_e('Compliance with international construction safety standards', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 4: Wind Farm Development -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">🌊</div>
                <h3><?php esc_html_e('Wind Farm Development Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Assistance with wind farm site selection, environmental assessment, and feasibility analysis.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Project planning and wind resource assessment', 'vortex-eco'); ?></li>
                    <li><?php esc_html_e('Government and stakeholder coordination to ensure compliance', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 5: Electrical Systems -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">⚡</div>
                <h3><?php esc_html_e('Turbine Electrical Systems Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Electrical system design, wiring, and grounding recommendations.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Optimize power transmission efficiency and reduce losses', 'vortex-eco'); ?></li>
                    <li><?php esc_html_e('Compliance with international electrical safety and smart grid integration', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 6: Operations & Maintenance -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">🔄</div>
                <h3><?php esc_html_e('Operations & Maintenance Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Developing wind farm operation and maintenance strategies.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Extend equipment lifespan and reduce maintenance costs', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 7: Regulatory & Certification -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">📋</div>
                <h3><?php esc_html_e('Regulatory & Certification Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Assistance in obtaining international and local certifications.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Ensure project compliance and legality', 'vortex-eco'); ?></li>
                </ul>
            </div>

            <!-- Service 8: Sustainability & ESG -->
            <div class="service-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <div class="service-icon">🌱</div>
                <h3><?php esc_html_e('Sustainability & ESG Consulting', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Carbon footprint management and sustainability assessment.', 'vortex-eco'); ?></p>
                <ul class="service-features">
                    <li><?php esc_html_e('Design localization and ESG integration solutions', 'vortex-eco'); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Values Section with Video Background Option -->
<section id="values" class="values-section section" style="
    background-image: 
        var(--gradient-overlay),
        url('<?php echo get_theme_mod('values_background_image', get_template_directory_uri() . '/assets/images/sunset-wind-farm.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;"><?php echo esc_html(get_theme_mod('values_title', 'VORTEX Values')); ?></h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);"><?php echo esc_html(get_theme_mod('values_subtitle', 'We are not just consultants, we are your long-term partners for project success.')); ?></p>
        </div>
        
        <div class="values-grid">
            <div class="value-card fade-in">
                <span class="value-icon">🎯</span>
                <h3><?php esc_html_e('Risk Mitigation', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Helping reduce project risks through expert analysis and comprehensive strategies.', 'vortex-eco'); ?></p>
            </div>
            
            <div class="value-card fade-in">
                <span class="value-icon">📈</span>
                <h3><?php esc_html_e('Investment Efficiency', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Enhance investment returns and long-term operational value through optimized planning.', 'vortex-eco'); ?></p>
            </div>
            
            <div class="value-card fade-in">
                <span class="value-icon">🌏</span>
                <h3><?php esc_html_e('Asia-Pacific Hub', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Important hub for Asia-Pacific offshore wind and green energy development.', 'vortex-eco'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section section" style="
    background-image: 
        linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
        url('<?php echo get_theme_mod('stats_background_image', get_template_directory_uri() . '/assets/images/wind-energy-stats.jpg'); ?>');
    background-size: cover;
    background-position: center;
">
    <div class="container">
        <div class="section-title">
            <h2><?php esc_html_e('Our Impact', 'vortex-eco'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Delivering measurable results across the wind energy sector', 'vortex-eco'); ?></p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <span class="stat-number" data-count="50">0</span>
                <div class="stat-label"><?php esc_html_e('Projects Completed', 'vortex-eco'); ?></div>
            </div>
            
            <div class="stat-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <span class="stat-number" data-count="2">0</span>
                <div class="stat-label"><?php esc_html_e('GW+ Total Capacity', 'vortex-eco'); ?></div>
            </div>
            
            <div class="stat-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <span class="stat-number" data-count="15">0</span>
                <div class="stat-label"><?php esc_html_e('Years Experience', 'vortex-eco'); ?></div>
            </div>
            
            <div class="stat-card fade-in" style="
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            ">
                <span class="stat-number" data-count="20">0</span>
                <div class="stat-label"><?php esc_html_e('Expert Consultants', 'vortex-eco'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section" style="
    background-image: 
        var(--gradient-overlay),
        url('<?php echo get_theme_mod('cta_background_image', get_template_directory_uri() . '/assets/images/wind-turbine-close.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: var(--text-white);
">
    <div class="container">
        <div class="section-title" style="text-align: center;">
            <h2 style="color: var(--text-white);"><?php esc_html_e('Ready to Power Your Wind Energy Project?', 'vortex-eco'); ?></h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9); font-size: 1.3rem;">
                <?php esc_html_e('Let our expert team guide you through every phase of your offshore wind development.', 'vortex-eco'); ?>
            </p>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="#contact" class="btn btn-white btn-lg" style="margin-right: 1rem;">
                <?php esc_html_e('Start Your Project', 'vortex-eco'); ?>
            </a>
            <a href="tel:+1-555-123-4567" class="btn btn-outline btn-lg" style="border-color: white; color: white;">
                <?php esc_html_e('Call Us Today', 'vortex-eco'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section" style="
    background-image: 
        linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
        url('<?php echo get_theme_mod('contact_background_image', get_template_directory_uri() . '/assets/images/office-bg.jpg'); ?>');
    background-size: cover;
    background-position: center;
">
    <div class="container">
        <div class="section-title">
            <h2><?php esc_html_e('Get In Touch', 'vortex-eco'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Ready to start your wind energy project? Contact our expert team today.', 'vortex-eco'); ?></p>
        </div>
        
        <div class="row">
            <div class="col">
                <div style="
                    background: rgba(255, 255, 255, 0.95); 
                    padding: 2rem; 
                    border-radius: var(--border-radius-lg); 
                    box-shadow: var(--shadow-sm);
                    backdrop-filter: blur(10px);
                ">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);"><?php esc_html_e('Contact Information', 'vortex-eco'); ?></h3>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">📧 <?php esc_html_e('Email', 'vortex-eco'); ?></h4>
                        <p style="margin: 0; color: var(--text-medium);">
                            <a href="mailto:info@vortexeco.com">info@vortexeco.com</a>
                        </p>
                    </div>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">📞 <?php esc_html_e('Phone', 'vortex-eco'); ?></h4>
                        <p style="margin: 0; color: var(--text-medium);">
                            <a href="tel:+1-555-123-4567">+1 (555) 123-4567</a>
                        </p>
                    </div>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">📍 <?php esc_html_e('Office', 'vortex-eco'); ?></h4>
                        <p style="margin: 0; color: var(--text-medium);">
                            123 Wind Energy Plaza<br>
                            Renewable City, RC 12345
                        </p>
                    </div>
                    
                    <div>
                        <h4 style="margin-bottom: 1rem; color: var(--text-dark);">🔗 <?php esc_html_e('Follow Us', 'vortex-eco'); ?></h4>
                        <div style="display: flex; gap: 1rem;">
                            <a href="#" style="color: var(--primary-color); font-size: 1.5rem;">📘</a>
                            <a href="#" style="color: var(--primary-color); font-size: 1.5rem;">🐦</a>
                            <a href="#" style="color: var(--primary-color); font-size: 1.5rem;">💼</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div style="
                    background: rgba(255, 255, 255, 0.95); 
                    padding: 2rem; 
                    border-radius: var(--border-radius-lg); 
                    box-shadow: var(--shadow-sm);
                    backdrop-filter: blur(10px);
                ">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);"><?php esc_html_e('Send Us a Message', 'vortex-eco'); ?></h3>
                    
                    <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]'); ?>
                    
                    <!-- Fallback contact form if Contact Form 7 is not available -->
                    <noscript>
                        <form action="#" method="post" style="display: grid; gap: 1rem;">
                            <input type="text" name="name" placeholder="<?php esc_attr_e('Your Name', 'vortex-eco'); ?>" required style="padding: 1rem; border: 1px solid var(--bg-grey); border-radius: var(--border-radius); font-size: 1rem;">
                            <input type="email" name="email" placeholder="<?php esc_attr_e('Your Email', 'vortex-eco'); ?>" required style="padding: 1rem; border: 1px solid var(--bg-grey); border-radius: var(--border-radius); font-size: 1rem;">
                            <input type="text" name="subject" placeholder="<?php esc_attr_e('Subject', 'vortex-eco'); ?>" style="padding: 1rem; border: 1px solid var(--bg-grey); border-radius: var(--border-radius); font-size: 1rem;">
                            <textarea name="message" rows="5" placeholder="<?php esc_attr_e('Your Message', 'vortex-eco'); ?>" required style="padding: 1rem; border: 1px solid var(--bg-grey); border-radius: var(--border-radius); font-size: 1rem; resize: vertical;"></textarea>
                            <button type="submit" class="btn btn-primary"><?php esc_html_e('Send Message', 'vortex-eco'); ?></button>
                        </form>
                    </noscript>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.content-card {
    transition: var(--transition);
}

.content-card:hover {
    transform: translateY(-5px);
}

.section-with-bg {
    position: relative;
}

.section-with-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: inherit;
    z-index: -1;
}
</style>

<?php get_footer(); ?>