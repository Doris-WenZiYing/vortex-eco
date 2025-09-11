<?php
/**
 * Template Name: Projects & Case Studies
 * The template for displaying projects and case studies
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="projects-hero" style="
        height: 70vh;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.8), rgba(11, 77, 125, 0.8)),
            url('<?php echo get_theme_mod('projects_hero_bg', get_template_directory_uri() . '/assets/images/projects-hero.jpg'); ?>');
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
                "><?php esc_html_e('Our Project Portfolio', 'vortex-eco'); ?></h1>
                <p style="
                    font-size: 1.3rem;
                    color: rgba(255,255,255,0.9);
                    margin-bottom: 2rem;
                    line-height: 1.6;
                ">
                    <?php esc_html_e('Explore our successful wind energy projects across Asia-Pacific. From offshore wind farms to innovative turbine solutions, see how we deliver results.', 'vortex-eco'); ?>
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <div style="
                        background: rgba(255,255,255,0.2);
                        padding: 1rem 1.5rem;
                        border-radius: var(--border-radius);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255,255,255,0.3);
                    ">
                        <strong style="color: white; font-size: 1.5rem;">50+</strong><br>
                        <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Projects Delivered', 'vortex-eco'); ?></span>
                    </div>
                    <div style="
                        background: rgba(255,255,255,0.2);
                        padding: 1rem 1.5rem;
                        border-radius: var(--border-radius);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255,255,255,0.3);
                    ">
                        <strong style="color: white; font-size: 1.5rem;">2GW+</strong><br>
                        <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Total Capacity', 'vortex-eco'); ?></span>
                    </div>
                    <div style="
                        background: rgba(255,255,255,0.2);
                        padding: 1rem 1.5rem;
                        border-radius: var(--border-radius);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255,255,255,0.3);
                    ">
                        <strong style="color: white; font-size: 1.5rem;">8</strong><br>
                        <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Countries Served', 'vortex-eco'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Filters -->
    <section class="project-filters" style="
        padding: 2rem 0;
        background: var(--bg-white);
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: var(--header-height);
        z-index: 100;
    ">
        <div class="container">
            <div style="
                display: flex;
                justify-content: center;
                gap: 1rem;
                flex-wrap: wrap;
                align-items: center;
            ">
                <span style="color: var(--text-medium); font-weight: 500; margin-right: 1rem;">
                    <?php esc_html_e('Filter Projects:', 'vortex-eco'); ?>
                </span>
                <button class="filter-btn active" data-filter="all" style="
                    background: var(--primary-color);
                    color: white;
                    border: none;
                    padding: 0.75rem 1.5rem;
                    border-radius: var(--border-radius);
                    cursor: pointer;
                    transition: var(--transition);
                "><?php esc_html_e('All Projects', 'vortex-eco'); ?></button>
                <button class="filter-btn" data-filter="offshore" style="
                    background: transparent;
                    color: var(--primary-color);
                    border: 2px solid var(--primary-color);
                    padding: 0.75rem 1.5rem;
                    border-radius: var(--border-radius);
                    cursor: pointer;
                    transition: var(--transition);
                "><?php esc_html_e('Offshore', 'vortex-eco'); ?></button>
                <button class="filter-btn" data-filter="onshore" style="
                    background: transparent;
                    color: var(--primary-color);
                    border: 2px solid var(--primary-color);
                    padding: 0.75rem 1.5rem;
                    border-radius: var(--border-radius);
                    cursor: pointer;
                    transition: var(--transition);
                "><?php esc_html_e('Onshore', 'vortex-eco'); ?></button>
                <button class="filter-btn" data-filter="consulting" style="
                    background: transparent;
                    color: var(--primary-color);
                    border: 2px solid var(--primary-color);
                    padding: 0.75rem 1.5rem;
                    border-radius: var(--border-radius);
                    cursor: pointer;
                    transition: var(--transition);
                "><?php esc_html_e('Consulting', 'vortex-eco'); ?></button>
                <button class="filter-btn" data-filter="maintenance" style="
                    background: transparent;
                    color: var(--primary-color);
                    border: 2px solid var(--primary-color);
                    padding: 0.75rem 1.5rem;
                    border-radius: var(--border-radius);
                    cursor: pointer;
                    transition: var(--transition);
                "><?php esc_html_e('O&M', 'vortex-eco'); ?></button>
            </div>
        </div>
    </section>

    <!-- Featured Project -->
    <section class="featured-project" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/featured-project-bg.jpg');
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
                        <div style="
                            background: var(--accent-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            display: inline-block;
                            font-size: 0.9rem;
                            font-weight: 500;
                            margin-bottom: 1rem;
                        "><?php esc_html_e('FEATURED PROJECT', 'vortex-eco'); ?></div>
                        
                        <h2 style="color: var(--primary-color); margin-bottom: 1rem;">
                            <?php esc_html_e('Taiwan Offshore Wind Farm Development', 'vortex-eco'); ?>
                        </h2>
                        
                        <p style="font-size: 1.1rem; color: var(--text-medium); margin-bottom: 2rem;">
                            <?php esc_html_e('Leading the development of a 500MW offshore wind farm off the coast of Taiwan, providing comprehensive consulting services from site assessment to commissioning. This project represents one of the largest renewable energy investments in the Asia-Pacific region.', 'vortex-eco'); ?>
                        </p>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                            <div style="text-align: center; padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius);">
                                <strong style="color: var(--primary-color); font-size: 1.5rem; display: block;">500MW</strong>
                                <span style="color: var(--text-light); font-size: 0.9rem;"><?php esc_html_e('Capacity', 'vortex-eco'); ?></span>
                            </div>
                            <div style="text-align: center; padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius);">
                                <strong style="color: var(--primary-color); font-size: 1.5rem; display: block;">80</strong>
                                <span style="color: var(--text-light); font-size: 0.9rem;"><?php esc_html_e('Turbines', 'vortex-eco'); ?></span>
                            </div>
                            <div style="text-align: center; padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius);">
                                <strong style="color: var(--primary-color); font-size: 1.5rem; display: block;">2024</strong>
                                <span style="color: var(--text-light); font-size: 0.9rem;"><?php esc_html_e('Completion', 'vortex-eco'); ?></span>
                            </div>
                            <div style="text-align: center; padding: 1rem; background: var(--bg-light); border-radius: var(--border-radius);">
                                <strong style="color: var(--primary-color); font-size: 1.5rem; display: block;">300k</strong>
                                <span style="color: var(--text-light); font-size: 0.9rem;"><?php esc_html_e('Homes Powered', 'vortex-eco'); ?></span>
                            </div>
                        </div>

                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <a href="#" class="btn btn-primary"><?php esc_html_e('View Case Study', 'vortex-eco'); ?></a>
                            <a href="#contact" class="btn btn-outline"><?php esc_html_e('Discuss Your Project', 'vortex-eco'); ?></a>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/taiwan-offshore-project.jpg" 
                             alt="Taiwan Offshore Wind Farm" 
                             style="width: 100%; height: 400px; object-fit: cover;" />
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            background: linear-gradient(transparent, rgba(0,0,0,0.8));
                            color: white;
                            padding: 2rem;
                        ">
                            <p style="margin: 0; color: rgba(255,255,255,0.9);">
                                <?php esc_html_e('Aerial view of turbine installation phase', 'vortex-eco'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="projects-grid-section" style="padding: 4rem 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Our Project Portfolio', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Delivering excellence across diverse wind energy projects', 'vortex-eco'); ?>
                </p>
            </div>

            <div class="projects-grid" style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 2rem;
            ">
                
                <!-- Project 1: Offshore -->
                <article class="project-card offshore" data-category="offshore" style="
                    background: var(--bg-white);
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                    transition: var(--transition);
                ">
                    <div style="
                        height: 250px;
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/project-offshore-1.jpg');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            left: 1rem;
                            background: var(--accent-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            font-size: 0.8rem;
                            font-weight: 500;
                        "><?php esc_html_e('OFFSHORE', 'vortex-eco'); ?></div>
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Japan Fukushima Wind Project', 'vortex-eco'); ?>
                        </h3>
                        <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                            <?php esc_html_e('Consulting services for 200MW floating offshore wind farm, including environmental impact assessment and turbine selection optimization.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <span style="font-weight: 500; color: var(--text-dark);">200MW</span>
                            <span style="color: var(--text-light); font-size: 0.9rem;">2023</span>
                        </div>
                        <a href="#" style="color: var(--primary-color); font-weight: 500;">
                            <?php esc_html_e('View Details →', 'vortex-eco'); ?>
                        </a>
                    </div>
                </article>

                <!-- Project 2: Onshore -->
                <article class="project-card onshore" data-category="onshore" style="
                    background: var(--bg-white);
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                    transition: var(--transition);
                ">
                    <div style="
                        height: 250px;
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/project-onshore-1.jpg');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            left: 1rem;
                            background: var(--success-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            font-size: 0.8rem;
                            font-weight: 500;
                        "><?php esc_html_e('ONSHORE', 'vortex-eco'); ?></div>
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Philippines Luzon Wind Farm', 'vortex-eco'); ?>
                        </h3>
                        <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                            <?php esc_html_e('Complete development consulting for 150MW onshore wind farm, from site selection to grid connection and commissioning.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <span style="font-weight: 500; color: var(--text-dark);">150MW</span>
                            <span style="color: var(--text-light); font-size: 0.9rem;">2022</span>
                        </div>
                        <a href="#" style="color: var(--primary-color); font-weight: 500;">
                            <?php esc_html_e('View Details →', 'vortex-eco'); ?>
                        </a>
                    </div>
                </article>

                <!-- Project 3: Consulting -->
                <article class="project-card consulting" data-category="consulting" style="
                    background: var(--bg-white);
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                    transition: var(--transition);
                ">
                    <div style="
                        height: 250px;
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/project-consulting-1.jpg');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            left: 1rem;
                            background: var(--primary-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            font-size: 0.8rem;
                            font-weight: 500;
                        "><?php esc_html_e('CONSULTING', 'vortex-eco'); ?></div>
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Korea Offshore Wind Strategy', 'vortex-eco'); ?>
                        </h3>
                        <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                            <?php esc_html_e('Strategic consulting for government offshore wind development framework, including policy recommendations and technical standards.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <span style="font-weight: 500; color: var(--text-dark);">Policy Framework</span>
                            <span style="color: var(--text-light); font-size: 0.9rem;">2023</span>
                        </div>
                        <a href="#" style="color: var(--primary-color); font-weight: 500;">
                            <?php esc_html_e('View Details →', 'vortex-eco'); ?>
                        </a>
                    </div>
                </article>

                <!-- Project 4: Maintenance -->
                <article class="project-card maintenance" data-category="maintenance" style="
                    background: var(--bg-white);
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                    transition: var(--transition);
                ">
                    <div style="
                        height: 250px;
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/project-maintenance-1.jpg');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            left: 1rem;
                            background: var(--warning-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            font-size: 0.8rem;
                            font-weight: 500;
                        "><?php esc_html_e('O&M', 'vortex-eco'); ?></div>
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Vietnam Wind Farm Optimization', 'vortex-eco'); ?>
                        </h3>
                        <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                            <?php esc_html_e('Performance optimization and maintenance strategy implementation for 100MW wind farm, achieving 15% efficiency improvement.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <span style="font-weight: 500; color: var(--text-dark);">+15% Efficiency</span>
                            <span style="color: var(--text-light); font-size: 0.9rem;">2023</span>
                        </div>
                        <a href="#" style="color: var(--primary-color); font-weight: 500;">
                            <?php esc_html_e('View Details →', 'vortex-eco'); ?>
                        </a>
                    </div>
                </article>

                <!-- Project 5: Offshore -->
                <article class="project-card offshore" data-category="offshore" style="
                    background: var(--bg-white);
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                    transition: var(--transition);
                ">
                    <div style="
                        height: 250px;
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/project-offshore-2.jpg');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            left: 1rem;
                            background: var(--accent-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            font-size: 0.8rem;
                            font-weight: 500;
                        "><?php esc_html_e('OFFSHORE', 'vortex-eco'); ?></div>
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Australia Bass Strait Project', 'vortex-eco'); ?>
                        </h3>
                        <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                            <?php esc_html_e('Technical advisory for 300MW offshore wind development, providing specialized consultation on foundation design and installation.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <span style="font-weight: 500; color: var(--text-dark);">300MW</span>
                            <span style="color: var(--text-light); font-size: 0.9rem;">2024</span>
                        </div>
                        <a href="#" style="color: var(--primary-color); font-weight: 500;">
                            <?php esc_html_e('View Details →', 'vortex-eco'); ?>
                        </a>
                    </div>
                </article>

                <!-- Project 6: Consulting -->
                <article class="project-card consulting" data-category="consulting" style="
                    background: var(--bg-white);
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                    transition: var(--transition);
                ">
                    <div style="
                        height: 250px;
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/project-consulting-2.jpg');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 1rem;
                            left: 1rem;
                            background: var(--primary-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: var(--border-radius);
                            font-size: 0.8rem;
                            font-weight: 500;
                        "><?php esc_html_e('CONSULTING', 'vortex-eco'); ?></div>
                    </div>
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Indonesia Renewable Energy Plan', 'vortex-eco'); ?>
                        </h3>
                        <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                            <?php esc_html_e('Comprehensive wind resource assessment and development roadmap for national renewable energy targets across multiple islands.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <span style="font-weight: 500; color: var(--text-dark);">National Strategy</span>
                            <span style="color: var(--text-light); font-size: 0.9rem;">2022</span>
                        </div>
                        <a href="#" style="color: var(--primary-color); font-weight: 500;">
                            <?php esc_html_e('View Details →', 'vortex-eco'); ?>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Global Impact Section -->
    <section class="global-impact" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.9), rgba(11, 77, 125, 0.9)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/global-impact-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2 style="color: white;"><?php esc_html_e('Global Impact', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">
                    <?php esc_html_e('Our projects contribute to a sustainable future across the Asia-Pacific region', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🌍</div>
                    <strong style="font-size: 2rem; display: block; margin-bottom: 0.5rem;">8</strong>
                    <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Countries Served', 'vortex-eco'); ?></span>
                </div>

                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🏠</div>
                    <strong style="font-size: 2rem; display: block; margin-bottom: 0.5rem;">1.5M</strong>
                    <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Homes Powered', 'vortex-eco'); ?></span>
                </div>

                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🌱</div>
                    <strong style="font-size: 2rem; display: block; margin-bottom: 0.5rem;">2.8M</strong>
                    <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Tons CO₂ Avoided', 'vortex-eco'); ?></span>
                </div>

                <div style="
                    background: rgba(255,255,255,0.1);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.2);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                ">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">💼</div>
                    <strong style="font-size: 2rem; display: block; margin-bottom: 0.5rem;">5,000+</strong>
                    <span style="color: rgba(255,255,255,0.9);"><?php esc_html_e('Jobs Created', 'vortex-eco'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="
        padding: 4rem 0;
        background: var(--bg-white);
        text-align: center;
    ">
        <div class="container">
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e('Start Your Next Wind Energy Project', 'vortex-eco'); ?></h2>
            <p style="font-size: 1.3rem; color: var(--text-medium); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                <?php esc_html_e('Join the growing list of successful projects. Let our experts guide your wind energy development from concept to completion.', 'vortex-eco'); ?>
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="#contact" class="btn btn-primary btn-lg"><?php esc_html_e('Discuss Your Project', 'vortex-eco'); ?></a>
                <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-outline btn-lg"><?php esc_html_e('Our Services', 'vortex-eco'); ?></a>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Project filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = 'transparent';
                btn.style.color = 'var(--primary-color)';
            });

            // Add active class to clicked button
            this.classList.add('active');
            this.style.background = 'var(--primary-color)';
            this.style.color = 'white';

            const filter = this.getAttribute('data-filter');

            // Show/hide project cards
            projectCards.forEach(card => {
                if (filter === 'all' || card.classList.contains(filter)) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Project card hover effects
    projectCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = 'var(--shadow-lg)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow-sm)';
        });
    });
});
</script>

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.filter-btn:hover {
    background: var(--primary-color) !important;
    color: white !important;
}

@media (max-width: 768px) {
    .projects-hero {
        height: 50vh !important;
    }
    
    .hero-content > div {
        flex-direction: column !important;
        gap: 0.5rem !important;
    }
    
    .projects-grid {
        grid-template-columns: 1fr !important;
    }
    
    .project-filters > div {
        flex-direction: column !important;
        gap: 0.5rem !important;
    }
    
    .filter-btn {
        width: 100% !important;
        max-width: 200px !important;
    }
}
</style>

<?php get_footer(); ?>