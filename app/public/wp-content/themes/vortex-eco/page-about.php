<?php
/**
 * Template Name: About Us Page
 * The template for displaying about us page
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="about-hero" style="
        height: 70vh;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.85), rgba(11, 77, 125, 0.85)),
            url('<?php echo get_theme_mod('about_hero_bg', get_template_directory_uri() . '/assets/images/about-hero.jpg'); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
    ">
        <div class="container">
            <div class="hero-content" style="max-width: 800px;">
                <h1 style="
                    font-size: clamp(2.5rem, 5vw, 4rem);
                    margin-bottom: 1.5rem;
                    color: white;
                "><?php esc_html_e('About VORTEX ECO', 'vortex-eco'); ?></h1>
                <p style="
                    font-size: 1.3rem;
                    color: rgba(255,255,255,0.9);
                    margin-bottom: 2rem;
                    line-height: 1.6;
                ">
                    <?php esc_html_e('Leading the transformation of Asia-Pacific wind energy landscape through expert consulting, innovative solutions, and sustainable development practices.', 'vortex-eco'); ?>
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="#mission" class="btn btn-white"><?php esc_html_e('Our Mission', 'vortex-eco'); ?></a>
                    <a href="#team" class="btn btn-outline" style="border-color: white; color: white;">
                        <?php esc_html_e('Meet Our Team', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating elements -->
        <div style="
            position: absolute;
            top: 20%;
            right: 10%;
            font-size: 4rem;
            opacity: 0.2;
            color: white;
            animation: float 6s ease-in-out infinite;
        ">🌊</div>
        <div style="
            position: absolute;
            bottom: 20%;
            right: 15%;
            font-size: 3rem;
            opacity: 0.3;
            color: white;
            animation: float 4s ease-in-out infinite reverse;
        ">⚡</div>
    </section>

    <!-- Company Story -->
    <section class="company-story" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/company-story-bg.jpg');
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
                        box-shadow: var(--shadow-md);
                    ">
                        <h2 style="color: var(--primary-color); margin-bottom: 2rem;">
                            <?php esc_html_e('Our Story', 'vortex-eco'); ?>
                        </h2>
                        <p style="font-size: 1.1rem; color: var(--text-medium); margin-bottom: 1.5rem; line-height: 1.7;">
                            <?php esc_html_e('Founded in 2009, VORTEX ECO emerged from a vision to accelerate renewable energy adoption across the Asia-Pacific region. Our founders, veteran engineers from leading wind energy companies, recognized the need for specialized consulting services that could bridge technical expertise with local market knowledge.', 'vortex-eco'); ?>
                        </p>
                        <p style="font-size: 1.1rem; color: var(--text-medium); margin-bottom: 1.5rem; line-height: 1.7;">
                            <?php esc_html_e('What started as a small team of 5 experts has grown into a comprehensive consulting firm with over 20 specialists covering every aspect of wind energy development. From materials engineering to regulatory compliance, from offshore foundations to smart grid integration, we provide end-to-end expertise.', 'vortex-eco'); ?>
                        </p>
                        <p style="font-size: 1.1rem; color: var(--text-medium); margin-bottom: 2rem; line-height: 1.7;">
                            <?php esc_html_e('Today, we have contributed to over 50 wind energy projects across 8 countries, helping generate more than 2GW of clean energy capacity and avoiding 2.8 million tons of CO₂ emissions annually.', 'vortex-eco'); ?>
                        </p>
                        
                        <!-- Timeline -->
                        <div class="timeline" style="position: relative; margin-top: 2rem;">
                            <div style="
                                position: absolute;
                                left: 0;
                                top: 0;
                                bottom: 0;
                                width: 3px;
                                background: var(--gradient-primary);
                                border-radius: 2px;
                            "></div>
                            
                            <div style="position: relative; padding-left: 2rem; margin-bottom: 1.5rem;">
                                <div style="
                                    position: absolute;
                                    left: -6px;
                                    top: 0;
                                    width: 15px;
                                    height: 15px;
                                    background: var(--primary-color);
                                    border-radius: 50%;
                                "></div>
                                <strong style="color: var(--primary-color);">2009</strong> - Company founded in Taiwan
                            </div>
                            
                            <div style="position: relative; padding-left: 2rem; margin-bottom: 1.5rem;">
                                <div style="
                                    position: absolute;
                                    left: -6px;
                                    top: 0;
                                    width: 15px;
                                    height: 15px;
                                    background: var(--primary-color);
                                    border-radius: 50%;
                                "></div>
                                <strong style="color: var(--primary-color);">2012</strong> - First major offshore project in Japan
                            </div>
                            
                            <div style="position: relative; padding-left: 2rem; margin-bottom: 1.5rem;">
                                <div style="
                                    position: absolute;
                                    left: -6px;
                                    top: 0;
                                    width: 15px;
                                    height: 15px;
                                    background: var(--primary-color);
                                    border-radius: 50%;
                                "></div>
                                <strong style="color: var(--primary-color);">2018</strong> - Expansion across Southeast Asia
                            </div>
                            
                            <div style="position: relative; padding-left: 2rem;">
                                <div style="
                                    position: absolute;
                                    left: -6px;
                                    top: 0;
                                    width: 15px;
                                    height: 15px;
                                    background: var(--accent-color);
                                    border-radius: 50%;
                                "></div>
                                <strong style="color: var(--accent-color);">2024</strong> - 50+ projects completed, 2GW+ capacity
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="
                        position: relative;
                        border-radius: var(--border-radius-lg);
                        overflow: hidden;
                        box-shadow: var(--shadow-lg);
                    ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/company-history.jpg" 
                             alt="Company History" 
                             style="width: 100%; height: 500px; object-fit: cover;" />
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            background: linear-gradient(transparent, rgba(0,0,0,0.8));
                            color: white;
                            padding: 2rem;
                        ">
                            <p style="margin: 0; color: rgba(255,255,255,0.9); font-style: italic;">
                                <?php esc_html_e('"Our journey from a startup to regional leader in wind energy consulting"', 'vortex-eco'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section id="mission" class="mission-section" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.95), rgba(11, 77, 125, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/mission-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2 style="color: white;"><?php esc_html_e('Our Purpose & Values', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">
                    <?php esc_html_e('Guided by our commitment to sustainable energy and technical excellence', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                
                <!-- Mission -->
                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: rgba(255,255,255,0.2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        font-size: 2rem;
                    ">🎯</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Our Mission', 'vortex-eco'); ?></h3>
                    <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">
                        <?php esc_html_e('To accelerate the transition to renewable energy across Asia-Pacific by providing world-class wind energy consulting services that reduce risks, optimize performance, and ensure sustainable development.', 'vortex-eco'); ?>
                    </p>
                </div>

                <!-- Vision -->
                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: rgba(255,255,255,0.2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        font-size: 2rem;
                    ">🔮</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Our Vision', 'vortex-eco'); ?></h3>
                    <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">
                        <?php esc_html_e('To be the leading wind energy consulting firm in Asia-Pacific, recognized for innovation, technical excellence, and contribution to a carbon-neutral future by 2050.', 'vortex-eco'); ?>
                    </p>
                </div>

                <!-- Values -->
                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: rgba(255,255,255,0.2);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        font-size: 2rem;
                    ">💎</div>
                    <h3 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Our Values', 'vortex-eco'); ?></h3>
                    <ul style="color: rgba(255,255,255,0.9); text-align: left; list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Technical Excellence', 'vortex-eco'); ?>
                        </li>
                        <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Environmental Stewardship', 'vortex-eco'); ?>
                        </li>
                        <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Client Partnership', 'vortex-eco'); ?>
                        </li>
                        <li style="position: relative; padding-left: 1.5rem;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Innovation & Integrity', 'vortex-eco'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <section id="team" class="team-section" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/team-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Leadership Team', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Meet the experts driving innovation in wind energy consulting', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                
                <!-- CEO -->
                <div class="team-card" style="
                    background: rgba(255,255,255,0.95);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-md);
                    text-align: center;
                    transition: var(--transition);
                    backdrop-filter: blur(10px);
                ">
                    <div style="
                        width: 120px;
                        height: 120px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        margin: 0 auto 1.5rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 3rem;
                        color: white;
                        position: relative;
                        overflow: hidden;
                    ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ceo-photo.jpg" 
                             alt="CEO" 
                             style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;" 
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <span style="font-size: 3rem;">👨‍💼</span>
                    </div>
                    <h3 style="margin-bottom: 0.5rem; color: var(--primary-color);">Dr. James Chen</h3>
                    <p style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">CEO & Founder</p>
                    <p style="color: var(--text-medium); font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        <?php esc_html_e('25+ years in renewable energy. Former VP of Engineering at Vestas Asia-Pacific. PhD in Mechanical Engineering from MIT.', 'vortex-eco'); ?>
                    </p>
                    <div style="display: flex; justify-content: center; gap: 0.5rem;">
                        <a href="#" style="color: var(--primary-color); font-size: 1.2rem;">💼</a>
                        <a href="#" style="color: var(--primary-color); font-size: 1.2rem;">📧</a>
                    </div>
                </div>

                <!-- CTO -->
                <div class="team-card" style="
                    background: rgba(255,255,255,0.95);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-md);
                    text-align: center;
                    transition: var(--transition);
                    backdrop-filter: blur(10px);
                ">
                    <div style="
                        width: 120px;
                        height: 120px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        margin: 0 auto 1.5rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 3rem;
                        color: white;
                        position: relative;
                        overflow: hidden;
                    ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cto-photo.jpg" 
                             alt="CTO" 
                             style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;" 
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <span style="font-size: 3rem;">👩‍🔬</span>
                    </div>
                    <h3 style="margin-bottom: 0.5rem; color: var(--primary-color);">Dr. Sarah Kim</h3>
                    <p style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">CTO & Co-Founder</p>
                    <p style="color: var(--text-medium); font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        <?php esc_html_e('Expert in offshore wind technology and turbine optimization. Former Senior Engineer at GE Renewable Energy. PhD in Ocean Engineering.', 'vortex-eco'); ?>
                    </p>
                    <div style="display: flex; justify-content: center; gap: 0.5rem;">
                        <a href="#" style="color: var(--primary-color); font-size: 1.2rem;">💼</a>
                        <a href="#" style="color: var(--primary-color); font-size: 1.2rem;">📧</a>
                    </div>
                </div>

                <!-- Head of Operations -->
                <div class="team-card" style="
                    background: rgba(255,255,255,0.95);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-md);
                    text-align: center;
                    transition: var(--transition);
                    backdrop-filter: blur(10px);
                ">
                    <div style="
                        width: 120px;
                        height: 120px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        margin: 0 auto 1.5rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 3rem;
                        color: white;
                        position: relative;
                        overflow: hidden;
                    ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/operations-head-photo.jpg" 
                             alt="Head of Operations" 
                             style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;" 
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <span style="font-size: 3rem;">👨‍⚖️</span>
                    </div>
                    <h3 style="margin-bottom: 0.5rem; color: var(--primary-color);">Michael Rodriguez</h3>
                    <p style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">Head of Operations</p>
                    <p style="color: var(--text-medium); font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        <?php esc_html_e('Specialist in project management and regulatory compliance. 15+ years in renewable energy development across Asia-Pacific.', 'vortex-eco'); ?>
                    </p>
                    <div style="display: flex; justify-content: center; gap: 0.5rem;">
                        <a href="#" style="color: var(--primary-color); font-size: 1.2rem;">💼</a>
                        <a href="#" style="color: var(--primary-color); font-size: 1.2rem;">📧</a>
                    </div>
                </div>
            </div>

            <!-- Team Stats -->
            <div style="
                background: rgba(255,255,255,0.95);
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                backdrop-filter: blur(10px);
                box-shadow: var(--shadow-sm);
            ">
                <h3 style="text-align: center; margin-bottom: 2rem; color: var(--primary-color);">
                    <?php esc_html_e('Our Team by Numbers', 'vortex-eco'); ?>
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 2rem; text-align: center;">
                    <div>
                        <strong style="font-size: 2rem; color: var(--primary-color); display: block;">20+</strong>
                        <span style="color: var(--text-medium);"><?php esc_html_e('Expert Consultants', 'vortex-eco'); ?></span>
                    </div>
                    <div>
                        <strong style="font-size: 2rem; color: var(--primary-color); display: block;">5</strong>
                        <span style="color: var(--text-medium);"><?php esc_html_e('PhD Holders', 'vortex-eco'); ?></span>
                    </div>
                    <div>
                        <strong style="font-size: 2rem; color: var(--primary-color); display: block;">150+</strong>
                        <span style="color: var(--text-medium);"><?php esc_html_e('Years Combined Experience', 'vortex-eco'); ?></span>
                    </div>
                    <div>
                        <strong style="font-size: 2rem; color: var(--primary-color); display: block;">8</strong>
                        <span style="color: var(--text-medium);"><?php esc_html_e('Languages Spoken', 'vortex-eco'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications & Partnerships -->
    <section class="certifications-section" style="padding: 4rem 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Certifications & Partnerships', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Recognized expertise and strategic alliances driving industry standards', 'vortex-eco'); ?>
                </p>
            </div>

            <div class="row">
                <div class="col">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);">
                        <?php esc_html_e('Industry Certifications', 'vortex-eco'); ?>
                    </h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div style="padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius); text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem;">🏆</div>
                            <strong><?php esc_html_e('ISO 9001:2015', 'vortex-eco'); ?></strong><br>
                            <small style="color: var(--text-light);"><?php esc_html_e('Quality Management', 'vortex-eco'); ?></small>
                        </div>
                        <div style="padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius); text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem;">🌱</div>
                            <strong><?php esc_html_e('ISO 14001:2015', 'vortex-eco'); ?></strong><br>
                            <small style="color: var(--text-light);"><?php esc_html_e('Environmental Management', 'vortex-eco'); ?></small>
                        </div>
                        <div style="padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius); text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem;">⚡</div>
                            <strong><?php esc_html_e('IEC 61400', 'vortex-eco'); ?></strong><br>
                            <small style="color: var(--text-light);"><?php esc_html_e('Wind Turbine Standards', 'vortex-eco'); ?></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color);">
                        <?php esc_html_e('Strategic Partners', 'vortex-eco'); ?>
                    </h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div style="padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius); text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem;">🏢</div>
                            <strong><?php esc_html_e('GWEC Member', 'vortex-eco'); ?></strong><br>
                            <small style="color: var(--text-light);"><?php esc_html_e('Global Wind Energy Council', 'vortex-eco'); ?></small>
                        </div>
                        <div style="padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius); text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem;">🌊</div>
                            <strong><?php esc_html_e('WWEA Partner', 'vortex-eco'); ?></strong><br>
                            <small style="color: var(--text-light);"><?php esc_html_e('World Wind Energy Association', 'vortex-eco'); ?></small>
                        </div>
                        <div style="padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius); text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem;">🎓</div>
                            <strong><?php esc_html_e('University Alliance', 'vortex-eco'); ?></strong><br>
                            <small style="color: var(--text-light);"><?php esc_html_e('Research Partnerships', 'vortex-eco'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="
        padding: 4rem 0;
        background-image: 
            var(--gradient-overlay),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/about-cta-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        text-align: center;
    ">
        <div class="container">
            <h2 style="color: white; margin-bottom: 1rem;"><?php esc_html_e('Ready to Work Together?', 'vortex-eco'); ?></h2>
            <p style="font-size: 1.3rem; color: rgba(255,255,255,0.9); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                <?php esc_html_e('Join our growing list of satisfied clients. Let our experienced team help you achieve your wind energy goals.', 'vortex-eco'); ?>
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="#contact" class="btn btn-white btn-lg"><?php esc_html_e('Start Your Project', 'vortex-eco'); ?></a>
                <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-outline btn-lg" style="border-color: white; color: white;">
                    <?php esc_html_e('Our Services', 'vortex-eco'); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

.team-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.timeline-item {
    position: relative;
}

@media (max-width: 768px) {
    .about-hero {
        height: 50vh !important;
    }
    
    .hero-content {
        text-align: center;
    }
    
    .company-story .row {
        flex-direction: column-reverse;
    }
    
    .team-section .col {
        margin-bottom: 2rem;
    }
    
    .certifications-section .row {
        flex-direction: column;
        gap: 2rem;
    }
}
</style>

<?php get_footer(); ?>