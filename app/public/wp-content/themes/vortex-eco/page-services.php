<?php
/**
 * Template Name: Services Page
 * The template for displaying services page
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section with Background Image -->
    <section class="services-hero" style="
        height: 60vh;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.8), rgba(11, 77, 125, 0.8)),
            url('<?php echo get_theme_mod('services_hero_bg', get_template_directory_uri() . '/assets/images/services-hero.jpg'); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
    ">
        <div class="container">
            <div class="hero-content" style="text-align: center; max-width: 800px; margin: 0 auto;">
                <h1 style="
                    font-size: clamp(2.5rem, 5vw, 4rem);
                    margin-bottom: 1.5rem;
                    color: white;
                "><?php esc_html_e('Our Consulting Services', 'vortex-eco'); ?></h1>
                <p style="
                    font-size: 1.3rem;
                    color: rgba(255,255,255,0.9);
                    margin-bottom: 2rem;
                ">
                    <?php esc_html_e('Comprehensive wind energy consulting solutions from concept to operation', 'vortex-eco'); ?>
                </p>
                <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                    <a href="#materials" class="btn btn-white btn-sm"><?php esc_html_e('Materials', 'vortex-eco'); ?></a>
                    <a href="#turbine" class="btn btn-white btn-sm"><?php esc_html_e('Turbine Performance', 'vortex-eco'); ?></a>
                    <a href="#development" class="btn btn-white btn-sm"><?php esc_html_e('Development', 'vortex-eco'); ?></a>
                    <a href="#maintenance" class="btn btn-white btn-sm"><?php esc_html_e('O&M', 'vortex-eco'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories Overview -->
    <section class="services-overview" style="padding: 4rem 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Service Categories', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Specialized expertise across every aspect of wind energy development', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                
                <!-- Development & Planning -->
                <div class="service-category" style="
                    background: linear-gradient(135deg, #00A8E6 0%, #1263A0 100%);
                    color: white;
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                    transition: var(--transition);
                ">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏗️</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Development & Planning', 'vortex-eco'); ?></h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 1.5rem;">
                        <?php esc_html_e('From site assessment to project planning', 'vortex-eco'); ?>
                    </p>
                    <a href="#development" style="color: white; text-decoration: underline;">
                        <?php esc_html_e('Learn More →', 'vortex-eco'); ?>
                    </a>
                </div>

                <!-- Engineering & Technology -->
                <div class="service-category" style="
                    background: linear-gradient(135deg, #1263A0 0%, #0B4D7D 100%);
                    color: white;
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                    transition: var(--transition);
                ">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">⚡</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Engineering & Technology', 'vortex-eco'); ?></h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 1.5rem;">
                        <?php esc_html_e('Advanced turbine and electrical systems', 'vortex-eco'); ?>
                    </p>
                    <a href="#turbine" style="color: white; text-decoration: underline;">
                        <?php esc_html_e('Learn More →', 'vortex-eco'); ?>
                    </a>
                </div>

                <!-- Operations & Maintenance -->
                <div class="service-category" style="
                    background: linear-gradient(135deg, #0B4D7D 0%, #27AE60 100%);
                    color: white;
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                    transition: var(--transition);
                ">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔄</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Operations & Maintenance', 'vortex-eco'); ?></h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 1.5rem;">
                        <?php esc_html_e('Long-term operational excellence', 'vortex-eco'); ?>
                    </p>
                    <a href="#maintenance" style="color: white; text-decoration: underline;">
                        <?php esc_html_e('Learn More →', 'vortex-eco'); ?>
                    </a>
                </div>

                <!-- Sustainability & Compliance -->
                <div class="service-category" style="
                    background: linear-gradient(135deg, #27AE60 0%, #00A8E6 100%);
                    color: white;
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                    transition: var(--transition);
                ">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌱</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Sustainability & Compliance', 'vortex-eco'); ?></h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 1.5rem;">
                        <?php esc_html_e('ESG and regulatory excellence', 'vortex-eco'); ?>
                    </p>
                    <a href="#sustainability" style="color: white; text-decoration: underline;">
                        <?php esc_html_e('Learn More →', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Services -->
    
    <!-- Materials Consulting -->
    <section id="materials" class="service-section" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.9), rgba(248, 249, 250, 0.9)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/materials-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col">
                    <div style="
                        background: rgba(255,255,255,0.95);
                        padding: 3rem;
                        border-radius: var(--border-radius-lg);
                        backdrop-filter: blur(10px);
                    ">
                        <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">
                            🔧 <?php esc_html_e('Wind Energy Materials Consulting', 'vortex-eco'); ?>
                        </h2>
                        <p style="font-size: 1.1rem; color: var(--text-medium); margin-bottom: 2rem;">
                            <?php esc_html_e('Expert knowledge in structural materials, protective coatings, weather-resistant components, and construction consumables. Our materials consulting ensures optimal performance and longevity of your wind energy infrastructure.', 'vortex-eco'); ?>
                        </p>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                            <div style="padding: 1.5rem; background: var(--bg-light); border-radius: var(--border-radius);">
                                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Material Selection</h4>
                                <p style="margin: 0; color: var(--text-medium);">
                                    <?php esc_html_e('Recommendations compliant with international standards and local regulations', 'vortex-eco'); ?>
                                </p>
                            </div>
                            <div style="padding: 1.5rem; background: var(--bg-light); border-radius: var(--border-radius);">
                                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Supply Chain Optimization</h4>
                                <p style="margin: 0; color: var(--text-medium);">
                                    <?php esc_html_e('Reduce costs and delay risks through strategic sourcing', 'vortex-eco'); ?>
                                </p>
                            </div>
                        </div>

                        <a href="#contact" class="btn btn-primary"><?php esc_html_e('Request Consultation', 'vortex-eco'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Turbine Performance -->
    <section id="turbine" class="service-section" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/turbine-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col">
                    <div style="
                        background: rgba(18, 99, 160, 0.95);
                        color: white;
                        padding: 3rem;
                        border-radius: var(--border-radius-lg);
                        backdrop-filter: blur(10px);
                    ">
                        <h2 style="color: white; margin-bottom: 1.5rem;">
                            ⚡ <?php esc_html_e('Turbine Performance & Structural Consulting', 'vortex-eco'); ?>
                        </h2>
                        <p style="font-size: 1.1rem; color: rgba(255,255,255,0.9); margin-bottom: 2rem;">
                            <?php esc_html_e('Comprehensive analysis of turbine operational efficiency and reliability assessment. We help you maximize energy output while ensuring structural integrity and safety.', 'vortex-eco'); ?>
                        </p>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                            <div style="padding: 1.5rem; background: rgba(255,255,255,0.1); border-radius: var(--border-radius); border: 1px solid rgba(255,255,255,0.2);">
                                <h4 style="color: white; margin-bottom: 1rem;">Performance Analysis</h4>
                                <p style="margin: 0; color: rgba(255,255,255,0.8);">
                                    <?php esc_html_e('Detailed operational efficiency and output optimization studies', 'vortex-eco'); ?>
                                </p>
                            </div>
                            <div style="padding: 1.5rem; background: rgba(255,255,255,0.1); border-radius: var(--border-radius); border: 1px solid rgba(255,255,255,0.2);">
                                <h4 style="color: white; margin-bottom: 1rem;">Structural Safety</h4>
                                <p style="margin: 0; color: rgba(255,255,255,0.8);">
                                    <?php esc_html_e('Durability evaluation and safety assessments for long-term reliability', 'vortex-eco'); ?>
                                </p>
                            </div>
                        </div>

                        <a href="#contact" class="btn btn-white"><?php esc_html_e('Get Performance Assessment', 'vortex-eco'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wind Farm Development -->
    <section id="development" class="service-section" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.9), rgba(248, 249, 250, 0.9)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/development-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2>🌊 <?php esc_html_e('Wind Farm Development Consulting', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('End-to-end development support from site selection to commissioning', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                
                <!-- Site Assessment -->
                <div style="
                    background: rgba(255,255,255,0.95);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    backdrop-filter: blur(10px);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; text-align: center;">📍</div>
                    <h3 style="text-align: center; margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Site Assessment', 'vortex-eco'); ?>
                    </h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Wind resource analysis', 'vortex-eco'); ?>
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Environmental impact studies', 'vortex-eco'); ?>
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Geotechnical surveys', 'vortex-eco'); ?>
                        </li>
                    </ul>
                </div>

                <!-- Project Planning -->
                <div style="
                    background: rgba(255,255,255,0.95);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    backdrop-filter: blur(10px);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; text-align: center;">📋</div>
                    <h3 style="text-align: center; margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Project Planning', 'vortex-eco'); ?>
                    </h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Feasibility studies', 'vortex-eco'); ?>
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Layout optimization', 'vortex-eco'); ?>
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Financial modeling', 'vortex-eco'); ?>
                        </li>
                    </ul>
                </div>

                <!-- Regulatory Support -->
                <div style="
                    background: rgba(255,255,255,0.95);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    backdrop-filter: blur(10px);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; text-align: center;">⚖️</div>
                    <h3 style="text-align: center; margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Regulatory Support', 'vortex-eco'); ?>
                    </h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Permit applications', 'vortex-eco'); ?>
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Stakeholder engagement', 'vortex-eco'); ?>
                        </li>
                        <li style="padding: 0.5rem 0; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Compliance monitoring', 'vortex-eco'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Operations & Maintenance -->
    <section id="maintenance" class="service-section" style="
        padding: 4rem 0;
        background-image: 
            var(--gradient-overlay),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/maintenance-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2 style="color: white;">🔄 <?php esc_html_e('Operations & Maintenance Excellence', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">
                    <?php esc_html_e('Maximize asset performance and extend operational life through strategic O&M planning', 'vortex-eco'); ?>
                </p>
            </div>

            <div class="row">
                <div class="col">
                    <div style="
                        background: rgba(255,255,255,0.1);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255,255,255,0.2);
                        padding: 2rem;
                        border-radius: var(--border-radius-lg);
                        margin-bottom: 2rem;
                    ">
                        <h3 style="color: white; margin-bottom: 1.5rem;"><?php esc_html_e('Predictive Maintenance', 'vortex-eco'); ?></h3>
                        <p style="color: rgba(255,255,255,0.9); margin-bottom: 1rem;">
                            <?php esc_html_e('Advanced monitoring and predictive analytics to prevent failures and optimize maintenance schedules.', 'vortex-eco'); ?>
                        </p>
                        <ul style="list-style: none; padding: 0;">
                            <li style="padding: 0.25rem 0; color: rgba(255,255,255,0.8);">• <?php esc_html_e('Condition monitoring systems', 'vortex-eco'); ?></li>
                            <li style="padding: 0.25rem 0; color: rgba(255,255,255,0.8);">• <?php esc_html_e('Data analytics and AI integration', 'vortex-eco'); ?></li>
                            <li style="padding: 0.25rem 0; color: rgba(255,255,255,0.8);">• <?php esc_html_e('Maintenance optimization strategies', 'vortex-eco'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div style="
                        background: rgba(255,255,255,0.1);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255,255,255,0.2);
                        padding: 2rem;
                        border-radius: var(--border-radius-lg);
                        margin-bottom: 2rem;
                    ">
                        <h3 style="color: white; margin-bottom: 1.5rem;"><?php esc_html_e('Asset Management', 'vortex-eco'); ?></h3>
                        <p style="color: rgba(255,255,255,0.9); margin-bottom: 1rem;">
                            <?php esc_html_e('Comprehensive asset lifecycle management to maximize return on investment.', 'vortex-eco'); ?>
                        </p>
                        <ul style="list-style: none; padding: 0;">
                            <li style="padding: 0.25rem 0; color: rgba(255,255,255,0.8);">• <?php esc_html_e('Performance monitoring', 'vortex-eco'); ?></li>
                            <li style="padding: 0.25rem 0; color: rgba(255,255,255,0.8);">• <?php esc_html_e('Life extension strategies', 'vortex-eco'); ?></li>
                            <li style="padding: 0.25rem 0; color: rgba(255,255,255,0.8);">• <?php esc_html_e('End-of-life planning', 'vortex-eco'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="#contact" class="btn btn-white btn-lg"><?php esc_html_e('Optimize Your Operations', 'vortex-eco'); ?></a>
            </div>
        </div>
    </section>

    <!-- Process Overview -->
    <section class="process-section" style="padding: 4rem 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Our Consulting Process', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('A proven methodology delivering successful outcomes', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
                
                <div style="text-align: center; position: relative;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                        color: white;
                        font-size: 1.5rem;
                        font-weight: bold;
                    ">1</div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);"><?php esc_html_e('Assessment', 'vortex-eco'); ?></h4>
                    <p style="color: var(--text-medium); margin: 0;"><?php esc_html_e('Initial project evaluation and requirement analysis', 'vortex-eco'); ?></p>
                </div>

                <div style="text-align: center; position: relative;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                        color: white;
                        font-size: 1.5rem;
                        font-weight: bold;
                    ">2</div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);"><?php esc_html_e('Strategy', 'vortex-eco'); ?></h4>
                    <p style="color: var(--text-medium); margin: 0;"><?php esc_html_e('Customized solution development and planning', 'vortex-eco'); ?></p>
                </div>

                <div style="text-align: center; position: relative;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                        color: white;
                        font-size: 1.5rem;
                        font-weight: bold;
                    ">3</div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);"><?php esc_html_e('Implementation', 'vortex-eco'); ?></h4>
                    <p style="color: var(--text-medium); margin: 0;"><?php esc_html_e('Expert guidance through project execution', 'vortex-eco'); ?></p>
                </div>

                <div style="text-align: center; position: relative;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1rem;
                        color: white;
                        font-size: 1.5rem;
                        font-weight: bold;
                    ">4</div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);"><?php esc_html_e('Optimization', 'vortex-eco'); ?></h4>
                    <p style="color: var(--text-medium); margin: 0;"><?php esc_html_e('Continuous monitoring and performance improvement', 'vortex-eco'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="
        padding: 4rem 0;
        background-image: 
            var(--gradient-overlay),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/cta-services-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        text-align: center;
    ">
        <div class="container">
            <h2 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Ready to Start Your Project?', 'vortex-eco'); ?></h2>
            <p style="font-size: 1.3rem; color: rgba(255,255,255,0.9); margin-bottom: 2rem;">
                <?php esc_html_e('Get expert consultation tailored to your wind energy needs', 'vortex-eco'); ?>
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="#contact" class="btn btn-white btn-lg"><?php esc_html_e('Request Consultation', 'vortex-eco'); ?></a>
                <a href="tel:+1-555-123-4567" class="btn btn-outline btn-lg" style="border-color: white; color: white;">
                    <?php esc_html_e('Call Expert Team', 'vortex-eco'); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<style>
.service-category:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.service-section {
    position: relative;
}

@media (max-width: 768px) {
    .services-hero {
        height: 50vh !important;
    }
    
    .service-section {
        padding: 2rem 0 !important;
    }
    
    .hero-content .btn {
        display: block;
        margin: 0.5rem auto;
        max-width: 200px;
    }
}
</style>

<?php get_footer(); ?>