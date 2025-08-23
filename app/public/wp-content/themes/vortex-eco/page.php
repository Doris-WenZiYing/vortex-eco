<?php
/**
 * The template for displaying all pages
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="page-<?php the_ID(); ?>" <?php post_class('single-page'); ?>>
                
                <?php if (has_post_thumbnail() && !is_front_page()) : ?>
                    <div class="page-hero-image" style="
                        height: 300px;
                        background-image: linear-gradient(var(--gradient-overlay)), url('<?php the_post_thumbnail_url('large'); ?>');
                        background-size: cover;
                        background-position: center;
                        border-radius: var(--border-radius-lg);
                        margin-bottom: 3rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                        color: white;
                    ">
                        <div>
                            <h1 class="page-title" style="
                                font-size: clamp(2rem, 5vw, 4rem);
                                margin: 0;
                                text-shadow: 0 2px 10px rgba(0,0,0,0.5);
                                color: white;
                            ">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                    </div>
                <?php elseif (!is_front_page()) : ?>
                    <header class="page-header" style="text-align: center; margin-bottom: 3rem; padding: 2rem 0;">
                        <h1 class="page-title" style="
                            font-size: clamp(2.5rem, 5vw, 4rem);
                            margin: 0;
                            color: var(--primary-color);
                        ">
                            <?php the_title(); ?>
                        </h1>
                        
                        <?php if (get_the_excerpt()) : ?>
                            <p class="page-subtitle" style="
                                font-size: 1.3rem;
                                color: var(--text-medium);
                                margin-top: 1rem;
                                max-width: 700px;
                                margin-left: auto;
                                margin-right: auto;
                            ">
                                <?php the_excerpt(); ?>
                            </p>
                        <?php endif; ?>
                    </header>
                <?php endif; ?>

                <!-- Page Content -->
                <div class="entry-content" style="
                    background: var(--bg-white);
                    padding: 3rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    color: var(--text-medium);
                    line-height: 1.8;
                    font-size: 1.1rem;
                ">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links" style="
                            margin-top: 3rem;
                            padding-top: 2rem;
                            border-top: 1px solid var(--bg-grey);
                            text-align: center;
                        "><h4>' . esc_html__('Pages:', 'vortex-eco') . '</h4>',
                        'after'  => '</div>',
                        'link_before' => '<span class="page-number" style="
                            display: inline-block;
                            background: var(--primary-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            margin: 0.25rem;
                            border-radius: var(--border-radius);
                            text-decoration: none;
                        ">',
                        'link_after'  => '</span>',
                    ));
                    ?>
                </div>

                <!-- Page Meta (if needed) -->
                <?php if (get_edit_post_link()) : ?>
                    <footer class="entry-footer" style="margin-top: 2rem; text-align: center;">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Edit <span class="sr-only">%s</span>', 'vortex-eco'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post(get_the_title())
                            ),
                            '<span class="edit-link" style="color: var(--text-light); font-size: 0.9rem;">',
                            '</span>'
                        );
                        ?>
                    </footer>
                <?php endif; ?>
            </article>

            <!-- Contact Form for Contact Page -->
            <?php if (is_page('contact') || is_page('contact-us')) : ?>
                <div class="contact-page-content" style="margin-top: 3rem;">
                    
                    <!-- Contact Information -->
                    <div class="contact-info-grid" style="
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                        gap: 2rem;
                        margin-bottom: 3rem;
                    ">
                        <div class="contact-card" style="
                            background: var(--bg-white);
                            padding: 2rem;
                            border-radius: var(--border-radius-lg);
                            box-shadow: var(--shadow-sm);
                            text-align: center;
                        ">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">📧</div>
                            <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                                <?php esc_html_e('Email Us', 'vortex-eco'); ?>
                            </h3>
                            <p style="margin: 0; color: var(--text-medium);">
                                <a href="mailto:info@vortexeco.com">info@vortexeco.com</a><br>
                                <a href="mailto:support@vortexeco.com">support@vortexeco.com</a>
                            </p>
                        </div>
                        
                        <div class="contact-card" style="
                            background: var(--bg-white);
                            padding: 2rem;
                            border-radius: var(--border-radius-lg);
                            box-shadow: var(--shadow-sm);
                            text-align: center;
                        ">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">📞</div>
                            <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                                <?php esc_html_e('Call Us', 'vortex-eco'); ?>
                            </h3>
                            <p style="margin: 0; color: var(--text-medium);">
                                <a href="tel:+1-555-123-4567">+1 (555) 123-4567</a><br>
                                <span style="font-size: 0.9rem; color: var(--text-light);">
                                    <?php esc_html_e('Mon-Fri 9AM-6PM EST', 'vortex-eco'); ?>
                                </span>
                            </p>
                        </div>
                        
                        <div class="contact-card" style="
                            background: var(--bg-white);
                            padding: 2rem;
                            border-radius: var(--border-radius-lg);
                            box-shadow: var(--shadow-sm);
                            text-align: center;
                        ">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">📍</div>
                            <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                                <?php esc_html_e('Visit Us', 'vortex-eco'); ?>
                            </h3>
                            <p style="margin: 0; color: var(--text-medium);">
                                123 Wind Energy Plaza<br>
                                Renewable City, RC 12345<br>
                                United States
                            </p>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="contact-form-section" style="
                        background: var(--bg-white);
                        padding: 3rem;
                        border-radius: var(--border-radius-lg);
                        box-shadow: var(--shadow-sm);
                    ">
                        <h3 style="text-align: center; margin-bottom: 2rem; color: var(--primary-color); font-size: 2rem;">
                            <?php esc_html_e('Send Us a Message', 'vortex-eco'); ?>
                        </h3>
                        
                        <?php
                        // Check if Contact Form 7 is active
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]');
                        } else {
                            // Fallback contact form
                            ?>
                            <form class="contact-form" action="#" method="post" style="
                                display: grid;
                                gap: 1.5rem;
                                max-width: 600px;
                                margin: 0 auto;
                            ">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <input type="text" name="first_name" placeholder="<?php esc_attr_e('First Name *', 'vortex-eco'); ?>" required style="
                                        padding: 1rem;
                                        border: 1px solid var(--bg-grey);
                                        border-radius: var(--border-radius);
                                        font-size: 1rem;
                                        transition: var(--transition);
                                    ">
                                    <input type="text" name="last_name" placeholder="<?php esc_attr_e('Last Name *', 'vortex-eco'); ?>" required style="
                                        padding: 1rem;
                                        border: 1px solid var(--bg-grey);
                                        border-radius: var(--border-radius);
                                        font-size: 1rem;
                                        transition: var(--transition);
                                    ">
                                </div>
                                
                                <input type="email" name="email" placeholder="<?php esc_attr_e('Email Address *', 'vortex-eco'); ?>" required style="
                                    padding: 1rem;
                                    border: 1px solid var(--bg-grey);
                                    border-radius: var(--border-radius);
                                    font-size: 1rem;
                                    transition: var(--transition);
                                ">
                                
                                <input type="tel" name="phone" placeholder="<?php esc_attr_e('Phone Number', 'vortex-eco'); ?>" style="
                                    padding: 1rem;
                                    border: 1px solid var(--bg-grey);
                                    border-radius: var(--border-radius);
                                    font-size: 1rem;
                                    transition: var(--transition);
                                ">
                                
                                <select name="service" style="
                                    padding: 1rem;
                                    border: 1px solid var(--bg-grey);
                                    border-radius: var(--border-radius);
                                    font-size: 1rem;
                                    background: white;
                                    transition: var(--transition);
                                ">
                                    <option value=""><?php esc_html_e('Select a Service', 'vortex-eco'); ?></option>
                                    <option value="materials"><?php esc_html_e('Materials Consulting', 'vortex-eco'); ?></option>
                                    <option value="turbine"><?php esc_html_e('Turbine Performance', 'vortex-eco'); ?></option>
                                    <option value="installation"><?php esc_html_e('Installation Planning', 'vortex-eco'); ?></option>
                                    <option value="development"><?php esc_html_e('Wind Farm Development', 'vortex-eco'); ?></option>
                                    <option value="electrical"><?php esc_html_e('Electrical Systems', 'vortex-eco'); ?></option>
                                    <option value="maintenance"><?php esc_html_e('O&M Consulting', 'vortex-eco'); ?></option>
                                    <option value="regulatory"><?php esc_html_e('Regulatory Support', 'vortex-eco'); ?></option>
                                    <option value="sustainability"><?php esc_html_e('ESG Solutions', 'vortex-eco'); ?></option>
                                    <option value="other"><?php esc_html_e('Other', 'vortex-eco'); ?></option>
                                </select>
                                
                                <input type="text" name="subject" placeholder="<?php esc_attr_e('Subject', 'vortex-eco'); ?>" style="
                                    padding: 1rem;
                                    border: 1px solid var(--bg-grey);
                                    border-radius: var(--border-radius);
                                    font-size: 1rem;
                                    transition: var(--transition);
                                ">
                                
                                <textarea name="message" rows="6" placeholder="<?php esc_attr_e('Tell us about your project...', 'vortex-eco'); ?>" required style="
                                    padding: 1rem;
                                    border: 1px solid var(--bg-grey);
                                    border-radius: var(--border-radius);
                                    font-size: 1rem;
                                    resize: vertical;
                                    transition: var(--transition);
                                    font-family: inherit;
                                "></textarea>
                                
                                <button type="submit" class="btn btn-primary btn-lg" style="justify-self: center;">
                                    <?php esc_html_e('Send Message', 'vortex-eco'); ?>
                                </button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- About Page Content -->
            <?php if (is_page('about') || is_page('about-us')) : ?>
                <div class="about-page-content" style="margin-top: 3rem;">
                    
                    <!-- Team Section -->
                    <section class="team-section" style="
                        background: var(--bg-light);
                        padding: 3rem 2rem;
                        border-radius: var(--border-radius-lg);
                        margin-bottom: 3rem;
                    ">
                        <h2 style="text-align: center; margin-bottom: 3rem; color: var(--primary-color);">
                            <?php esc_html_e('Our Expert Team', 'vortex-eco'); ?>
                        </h2>
                        
                        <div style="
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                            gap: 2rem;
                            max-width: 1000px;
                            margin: 0 auto;
                        ">
                            <!-- Team Member 1 -->
                            <div class="team-card" style="
                                background: var(--bg-white);
                                padding: 2rem;
                                border-radius: var(--border-radius-lg);
                                box-shadow: var(--shadow-sm);
                                text-align: center;
                                transition: var(--transition);
                            ">
                                <div style="
                                    width: 100px;
                                    height: 100px;
                                    background: var(--gradient-primary);
                                    border-radius: 50%;
                                    margin: 0 auto 1.5rem;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 2rem;
                                    color: white;
                                ">👨‍💼</div>
                                <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);">John Smith</h4>
                                <p style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">CEO & Founder</p>
                                <p style="color: var(--text-medium); font-size: 0.9rem; margin: 0;">
                                    <?php esc_html_e('20+ years in renewable energy consulting with expertise in offshore wind development.', 'vortex-eco'); ?>
                                </p>
                            </div>
                            
                            <!-- Team Member 2 -->
                            <div class="team-card" style="
                                background: var(--bg-white);
                                padding: 2rem;
                                border-radius: var(--border-radius-lg);
                                box-shadow: var(--shadow-sm);
                                text-align: center;
                                transition: var(--transition);
                            ">
                                <div style="
                                    width: 100px;
                                    height: 100px;
                                    background: var(--gradient-primary);
                                    border-radius: 50%;
                                    margin: 0 auto 1.5rem;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 2rem;
                                    color: white;
                                ">👩‍🔬</div>
                                <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);">Dr. Sarah Chen</h4>
                                <p style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">CTO</p>
                                <p style="color: var(--text-medium); font-size: 0.9rem; margin: 0;">
                                    <?php esc_html_e('Leading expert in turbine performance optimization and structural engineering.', 'vortex-eco'); ?>
                                </p>
                            </div>
                            
                            <!-- Team Member 3 -->
                            <div class="team-card" style="
                                background: var(--bg-white);
                                padding: 2rem;
                                border-radius: var(--border-radius-lg);
                                box-shadow: var(--shadow-sm);
                                text-align: center;
                                transition: var(--transition);
                            ">
                                <div style="
                                    width: 100px;
                                    height: 100px;
                                    background: var(--gradient-primary);
                                    border-radius: 50%;
                                    margin: 0 auto 1.5rem;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 2rem;
                                    color: white;
                                ">👨‍⚖️</div>
                                <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);">Michael Rodriguez</h4>
                                <p style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">Head of Regulatory Affairs</p>
                                <p style="color: var(--text-medium); font-size: 0.9rem; margin: 0;">
                                    <?php esc_html_e('Specialist in international compliance and certification processes.', 'vortex-eco'); ?>
                                </p>
                            </div>
                        </div>
                    </section>
                    
                    <!-- Company Stats -->
                    <section class="stats-section" style="
                        background: var(--bg-white);
                        padding: 3rem 2rem;
                        border-radius: var(--border-radius-lg);
                        box-shadow: var(--shadow-sm);
                    ">
                        <div style="
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                            gap: 2rem;
                            text-align: center;
                        ">
                            <div>
                                <div style="font-size: 3rem; color: var(--primary-color); font-weight: 700; margin-bottom: 0.5rem;">50+</div>
                                <div style="color: var(--text-medium);"><?php esc_html_e('Projects Completed', 'vortex-eco'); ?></div>
                            </div>
                            <div>
                                <div style="font-size: 3rem; color: var(--primary-color); font-weight: 700; margin-bottom: 0.5rem;">2GW+</div>
                                <div style="color: var(--text-medium);"><?php esc_html_e('Total Capacity', 'vortex-eco'); ?></div>
                            </div>
                            <div>
                                <div style="font-size: 3rem; color: var(--primary-color); font-weight: 700; margin-bottom: 0.5rem;">15+</div>
                                <div style="color: var(--text-medium);"><?php esc_html_e('Years Experience', 'vortex-eco'); ?></div>
                            </div>
                            <div>
                                <div style="font-size: 3rem; color: var(--primary-color); font-weight: 700; margin-bottom: 0.5rem;">20+</div>
                                <div style="color: var(--text-medium);"><?php esc_html_e('Expert Consultants', 'vortex-eco'); ?></div>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endif; ?>

            <!-- Comments (if enabled for pages) -->
            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="page-comments" style="margin-top: 3rem;">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>