<?php
/**
 * Template Name: Contact Us Page
 * The template for displaying contact page
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="contact-hero" style="
        height: 60vh;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.85), rgba(11, 77, 125, 0.85)),
            url('<?php echo get_theme_mod('contact_hero_bg', get_template_directory_uri() . '/assets/images/contact-hero.jpg'); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
    ">
        <div class="container">
            <div class="hero-content" style="max-width: 800px; text-align: center; margin: 0 auto;">
                <h1 style="
                    font-size: clamp(2.5rem, 5vw, 4rem);
                    margin-bottom: 1.5rem;
                    color: white;
                "><?php esc_html_e('Get In Touch', 'vortex-eco'); ?></h1>
                <p style="
                    font-size: 1.3rem;
                    color: rgba(255,255,255,0.9);
                    margin-bottom: 2rem;
                    line-height: 1.6;
                ">
                    <?php esc_html_e('Ready to start your wind energy project? Our expert team is here to help you every step of the way. Contact us today for a consultation.', 'vortex-eco'); ?>
                </p>
                <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                    <a href="tel:+1-555-123-4567" class="btn btn-white">
                        📞 <?php esc_html_e('Call Now', 'vortex-eco'); ?>
                    </a>
                    <a href="mailto:info@vortexeco.com" class="btn btn-outline" style="border-color: white; color: white;">
                        📧 <?php esc_html_e('Email Us', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info-section" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/contact-info-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Multiple Ways to Reach Us', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Choose the most convenient way to connect with our wind energy experts', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                
                <!-- Phone Contact -->
                <div class="contact-card" style="
                    background: rgba(255,255,255,0.95);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-md);
                    text-align: center;
                    transition: var(--transition);
                    backdrop-filter: blur(10px);
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        font-size: 2rem;
                        color: white;
                    ">📞</div>
                    <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Call Our Experts', 'vortex-eco'); ?>
                    </h3>
                    <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                        <?php esc_html_e('Speak directly with our wind energy consultants for immediate assistance.', 'vortex-eco'); ?>
                    </p>
                    <div style="margin-bottom: 1.5rem;">
                        <strong style="display: block; font-size: 1.2rem; color: var(--primary-color); margin-bottom: 0.5rem;">
                            <a href="tel:+1-555-123-4567">+1 (555) 123-4567</a>
                        </strong>
                        <small style="color: var(--text-light);">
                            <?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM (EST)', 'vortex-eco'); ?>
                        </small>
                    </div>
                    <a href="tel:+1-555-123-4567" class="btn btn-primary btn-sm">
                        <?php esc_html_e('Call Now', 'vortex-eco'); ?>
                    </a>
                </div>

                <!-- Email Contact -->
                <div class="contact-card" style="
                    background: rgba(255,255,255,0.95);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-md);
                    text-align: center;
                    transition: var(--transition);
                    backdrop-filter: blur(10px);
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        font-size: 2rem;
                        color: white;
                    ">📧</div>
                    <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Email Us', 'vortex-eco'); ?>
                    </h3>
                    <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                        <?php esc_html_e('Send us your project details and we\'ll respond within 24 hours.', 'vortex-eco'); ?>
                    </p>
                    <div style="margin-bottom: 1.5rem;">
                        <strong style="display: block; margin-bottom: 0.5rem;">
                            <a href="mailto:info@vortexeco.com" style="color: var(--primary-color);">info@vortexeco.com</a>
                        </strong>
                        <strong style="display: block; margin-bottom: 0.5rem;">
                            <a href="mailto:projects@vortexeco.com" style="color: var(--primary-color);">projects@vortexeco.com</a>
                        </strong>
                        <small style="color: var(--text-light);">
                            <?php esc_html_e('Response within 24 hours', 'vortex-eco'); ?>
                        </small>
                    </div>
                    <a href="mailto:info@vortexeco.com" class="btn btn-primary btn-sm">
                        <?php esc_html_e('Send Email', 'vortex-eco'); ?>
                    </a>
                </div>

                <!-- Office Location -->
                <div class="contact-card" style="
                    background: rgba(255,255,255,0.95);
                    padding: 2.5rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-md);
                    text-align: center;
                    transition: var(--transition);
                    backdrop-filter: blur(10px);
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: var(--gradient-primary);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        font-size: 2rem;
                        color: white;
                    ">📍</div>
                    <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Visit Our Office', 'vortex-eco'); ?>
                    </h3>
                    <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                        <?php esc_html_e('Schedule a meeting at our headquarters for in-depth project discussions.', 'vortex-eco'); ?>
                    </p>
                    <div style="margin-bottom: 1.5rem;">
                        <address style="font-style: normal; color: var(--text-dark); line-height: 1.6;">
                            <strong>VORTEX ECO Headquarters</strong><br>
                            123 Wind Energy Plaza<br>
                            Renewable City, RC 12345<br>
                            Taiwan
                        </address>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm">
                        <?php esc_html_e('Get Directions', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div style="
                background: rgba(231, 76, 60, 0.95);
                color: white;
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                text-align: center;
                backdrop-filter: blur(10px);
            ">
                <h3 style="color: white; margin-bottom: 1rem;">
                    🚨 <?php esc_html_e('Emergency Support', 'vortex-eco'); ?>
                </h3>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: 1rem;">
                    <?php esc_html_e('For urgent technical issues with operational wind farms under our maintenance contracts.', 'vortex-eco'); ?>
                </p>
                <strong style="font-size: 1.3rem;">
                    <a href="tel:+1-555-911-WIND" style="color: white;">+1 (555) 911-WIND</a>
                </strong><br>
                <small style="color: rgba(255,255,255,0.8);">
                    <?php esc_html_e('24/7 Emergency Response Team', 'vortex-eco'); ?>
                </small>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section" style="
        padding: 4rem 0;
        background: var(--bg-white);
    ">
        <div class="container">
            <div class="row" style="align-items: flex-start;">
                
                <!-- Contact Form -->
                <div class="col" style="flex: 2;">
                    <div style="
                        background: var(--bg-white);
                        padding: 3rem;
                        border-radius: var(--border-radius-lg);
                        box-shadow: var(--shadow-md);
                    ">
                        <h2 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <?php esc_html_e('Send Us a Message', 'vortex-eco'); ?>
                        </h2>
                        <p style="color: var(--text-medium); margin-bottom: 2rem;">
                            <?php esc_html_e('Fill out the form below and our team will get back to you within 24 hours. Please provide as much detail as possible about your project.', 'vortex-eco'); ?>
                        </p>

                        <?php
                        // Check if Contact Form 7 is active
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]');
                        } else {
                            // Enhanced fallback contact form
                            ?>
                            <form class="enhanced-contact-form" action="#" method="post" style="display: grid; gap: 1.5rem;">
                                
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <div>
                                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                            <?php esc_html_e('First Name *', 'vortex-eco'); ?>
                                        </label>
                                        <input type="text" name="first_name" required style="
                                            width: 100%;
                                            padding: 1rem;
                                            border: 2px solid var(--bg-grey);
                                            border-radius: var(--border-radius);
                                            font-size: 1rem;
                                            transition: var(--transition);
                                        " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                    </div>
                                    <div>
                                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                            <?php esc_html_e('Last Name *', 'vortex-eco'); ?>
                                        </label>
                                        <input type="text" name="last_name" required style="
                                            width: 100%;
                                            padding: 1rem;
                                            border: 2px solid var(--bg-grey);
                                            border-radius: var(--border-radius);
                                            font-size: 1rem;
                                            transition: var(--transition);
                                        " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                    </div>
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <div>
                                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                            <?php esc_html_e('Email Address *', 'vortex-eco'); ?>
                                        </label>
                                        <input type="email" name="email" required style="
                                            width: 100%;
                                            padding: 1rem;
                                            border: 2px solid var(--bg-grey);
                                            border-radius: var(--border-radius);
                                            font-size: 1rem;
                                            transition: var(--transition);
                                        " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                    </div>
                                    <div>
                                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                            <?php esc_html_e('Phone Number', 'vortex-eco'); ?>
                                        </label>
                                        <input type="tel" name="phone" style="
                                            width: 100%;
                                            padding: 1rem;
                                            border: 2px solid var(--bg-grey);
                                            border-radius: var(--border-radius);
                                            font-size: 1rem;
                                            transition: var(--transition);
                                        " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                    </div>
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <div>
                                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                            <?php esc_html_e('Company/Organization', 'vortex-eco'); ?>
                                        </label>
                                        <input type="text" name="company" style="
                                            width: 100%;
                                            padding: 1rem;
                                            border: 2px solid var(--bg-grey);
                                            border-radius: var(--border-radius);
                                            font-size: 1rem;
                                            transition: var(--transition);
                                        " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                    </div>
                                    <div>
                                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                            <?php esc_html_e('Country/Region', 'vortex-eco'); ?>
                                        </label>
                                        <select name="country" style="
                                            width: 100%;
                                            padding: 1rem;
                                            border: 2px solid var(--bg-grey);
                                            border-radius: var(--border-radius);
                                            font-size: 1rem;
                                            background: white;
                                            transition: var(--transition);
                                        " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                            <option value=""><?php esc_html_e('Select Country', 'vortex-eco'); ?></option>
                                            <option value="taiwan"><?php esc_html_e('Taiwan', 'vortex-eco'); ?></option>
                                            <option value="japan"><?php esc_html_e('Japan', 'vortex-eco'); ?></option>
                                            <option value="south-korea"><?php esc_html_e('South Korea', 'vortex-eco'); ?></option>
                                            <option value="philippines"><?php esc_html_e('Philippines', 'vortex-eco'); ?></option>
                                            <option value="vietnam"><?php esc_html_e('Vietnam', 'vortex-eco'); ?></option>
                                            <option value="thailand"><?php esc_html_e('Thailand', 'vortex-eco'); ?></option>
                                            <option value="indonesia"><?php esc_html_e('Indonesia', 'vortex-eco'); ?></option>
                                            <option value="australia"><?php esc_html_e('Australia', 'vortex-eco'); ?></option>
                                            <option value="other"><?php esc_html_e('Other', 'vortex-eco'); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                        <?php esc_html_e('Service Interest *', 'vortex-eco'); ?>
                                    </label>
                                    <select name="service" required style="
                                        width: 100%;
                                        padding: 1rem;
                                        border: 2px solid var(--bg-grey);
                                        border-radius: var(--border-radius);
                                        font-size: 1rem;
                                        background: white;
                                        transition: var(--transition);
                                    " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'">
                                        <option value=""><?php esc_html_e('Select Service Type', 'vortex-eco'); ?></option>
                                        <option value="materials"><?php esc_html_e('Wind Energy Materials Consulting', 'vortex-eco'); ?></option>
                                        <option value="turbine"><?php esc_html_e('Turbine Performance & Structural Consulting', 'vortex-eco'); ?></option>
                                        <option value="installation"><?php esc_html_e('Pre-assembly & Installation Consulting', 'vortex-eco'); ?></option>
                                        <option value="development"><?php esc_html_e('Wind Farm Development Consulting', 'vortex-eco'); ?></option>
                                        <option value="electrical"><?php esc_html_e('Turbine Electrical Systems Consulting', 'vortex-eco'); ?></option>
                                        <option value="maintenance"><?php esc_html_e('Operations & Maintenance Consulting', 'vortex-eco'); ?></option>
                                        <option value="regulatory"><?php esc_html_e('Regulatory & Certification Consulting', 'vortex-eco'); ?></option>
                                        <option value="sustainability"><?php esc_html_e('Sustainability & ESG Consulting', 'vortex-eco'); ?></option>
                                        <option value="multiple"><?php esc_html_e('Multiple Services', 'vortex-eco'); ?></option>
                                        <option value="other"><?php esc_html_e('Other/Not Sure', 'vortex-eco'); ?></option>
                                    </select>
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">
                                        <?php esc_html_e('Project Details *', 'vortex-eco'); ?>
                                    </label>
                                    <textarea name="message" rows="6" required placeholder="<?php esc_attr_e('Please describe your project, timeline, capacity, location, and any specific requirements...', 'vortex-eco'); ?>" style="
                                        width: 100%;
                                        padding: 1rem;
                                        border: 2px solid var(--bg-grey);
                                        border-radius: var(--border-radius);
                                        font-size: 1rem;
                                        resize: vertical;
                                        transition: var(--transition);
                                        font-family: inherit;
                                    " onfocus="this.style.borderColor='var(--accent-color)'" onblur="this.style.borderColor='var(--bg-grey)'"></textarea>
                                </div>

                                <div style="
                                    background: var(--bg-light);
                                    padding: 1rem;
                                    border-radius: var(--border-radius);
                                    font-size: 0.9rem;
                                    color: var(--text-medium);
                                ">
                                    <label style="display: flex; align-items: flex-start; gap: 0.5rem;">
                                        <input type="checkbox" name="newsletter" style="margin-top: 0.2rem;">
                                        <span><?php esc_html_e('I would like to receive updates about wind energy industry trends and VORTEX ECO news.', 'vortex-eco'); ?></span>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg" style="justify-self: center; min-width: 200px;">
                                    <?php esc_html_e('Send Message', 'vortex-eco'); ?>
                                </button>

                                <p style="font-size: 0.85rem; color: var(--text-light); text-align: center; margin: 0;">
                                    <?php esc_html_e('By submitting this form, you agree to our privacy policy. We will never share your information with third parties.', 'vortex-eco'); ?>
                                </p>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <!-- Sidebar Information -->
                <div class="col" style="flex: 1; margin-left: 2rem;">
                    
                    <!-- Quick Facts -->
                    <div style="
                        background: var(--gradient-primary);
                        color: white;
                        padding: 2rem;
                        border-radius: var(--border-radius-lg);
                        margin-bottom: 2rem;
                    ">
                        <h3 style="color: white; margin-bottom: 1.5rem;">
                            ⚡ <?php esc_html_e('Quick Facts', 'vortex-eco'); ?>
                        </h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                <span style="background: rgba(255,255,255,0.2); padding: 0.25rem; border-radius: 50%; font-size: 0.8rem;">✓</span>
                                <?php esc_html_e('24-hour response guarantee', 'vortex-eco'); ?>
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                <span style="background: rgba(255,255,255,0.2); padding: 0.25rem; border-radius: 50%; font-size: 0.8rem;">✓</span>
                                <?php esc_html_e('Free initial consultation', 'vortex-eco'); ?>
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                <span style="background: rgba(255,255,255,0.2); padding: 0.25rem; border-radius: 50%; font-size: 0.8rem;">✓</span>
                                <?php esc_html_e('Multi-language support', 'vortex-eco'); ?>
                            </li>
                            <li style="display: flex; align-items: center; gap: 0.5rem;">
                                <span style="background: rgba(255,255,255,0.2); padding: 0.25rem; border-radius: 50%; font-size: 0.8rem;">✓</span>
                                <?php esc_html_e('Confidential project discussion', 'vortex-eco'); ?>
                            </li>
                        </ul>
                    </div>

                    <!-- Office Hours -->
                    <div style="
                        background: var(--bg-light);
                        padding: 2rem;
                        border-radius: var(--border-radius-lg);
                        margin-bottom: 2rem;
                    ">
                        <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                            🕒 <?php esc_html_e('Office Hours', 'vortex-eco'); ?>
                        </h4>
                        <div style="font-size: 0.9rem; color: var(--text-medium);">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <span><?php esc_html_e('Monday - Friday:', 'vortex-eco'); ?></span>
                                <span><?php esc_html_e('9:00 AM - 6:00 PM', 'vortex-eco'); ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <span><?php esc_html_e('Saturday:', 'vortex-eco'); ?></span>
                                <span><?php esc_html_e('10:00 AM - 4:00 PM', 'vortex-eco'); ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span><?php esc_html_e('Sunday:', 'vortex-eco'); ?></span>
                                <span><?php esc_html_e('Closed', 'vortex-eco'); ?></span>
                            </div>
                            <hr style="margin: 1rem 0; border: none; border-top: 1px solid var(--bg-grey);">
                            <small style="color: var(--text-light);">
                                <?php esc_html_e('All times are Taiwan Standard Time (UTC+8)', 'vortex-eco'); ?>
                            </small>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="
                        background: var(--bg-white);
                        padding: 2rem;
                        border-radius: var(--border-radius-lg);
                        box-shadow: var(--shadow-sm);
                    ">
                        <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                            🌐 <?php esc_html_e('Follow Us', 'vortex-eco'); ?>
                        </h4>
                        <p style="color: var(--text-medium); margin-bottom: 1rem; font-size: 0.9rem;">
                            <?php esc_html_e('Stay updated with the latest wind energy insights and industry developments.', 'vortex-eco'); ?>
                        </p>
                        <div style="display: flex; gap: 1rem;">
                            <a href="#" style="
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 40px;
                                height: 40px;
                                background: var(--primary-color);
                                color: white;
                                border-radius: 50%;
                                font-size: 1.2rem;
                                transition: var(--transition);
                            " onmouseover="this.style.background='var(--accent-color)'" onmouseout="this.style.background='var(--primary-color)'">📘</a>
                            <a href="#" style="
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 40px;
                                height: 40px;
                                background: var(--primary-color);
                                color: white;
                                border-radius: 50%;
                                font-size: 1.2rem;
                                transition: var(--transition);
                            " onmouseover="this.style.background='var(--accent-color)'" onmouseout="this.style.background='var(--primary-color)'">🐦</a>
                            <a href="#" style="
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 40px;
                                height: 40px;
                                background: var(--primary-color);
                                color: white;
                                border-radius: 50%;
                                font-size: 1.2rem;
                                transition: var(--transition);
                            " onmouseover="this.style.background='var(--accent-color)'" onmouseout="this.style.background='var(--primary-color)'">💼</a>
                            <a href="#" style="
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 40px;
                                height: 40px;
                                background: var(--primary-color);
                                color: white;
                                border-radius: 50%;
                                font-size: 1.2rem;
                                transition: var(--transition);
                            " onmouseover="this.style.background='var(--accent-color)'" onmouseout="this.style.background='var(--primary-color)'">📺</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Placeholder) -->
    <section class="map-section" style="
        padding: 0;
        background: var(--bg-grey);
        height: 400px;
        position: relative;
    ">
        <div style="
            height: 100%;
            background: var(--bg-grey);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-medium);
        ">
            <div style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🗺️</div>
                <h3><?php esc_html_e('Interactive Map', 'vortex-eco'); ?></h3>
                <p><?php esc_html_e('Google Maps integration would be implemented here showing our office location.', 'vortex-eco'); ?></p>
            </div>
        </div>
        
        <!-- Map overlay with contact info -->
        <div style="
            position: absolute;
            top: 2rem;
            left: 2rem;
            background: rgba(255,255,255,0.95);
            padding: 1.5rem;
            border-radius: var(--border-radius-lg);
            backdrop-filter: blur(10px);
            max-width: 300px;
        ">
            <h4 style="margin-bottom: 1rem; color: var(--primary-color);">
                📍 <?php esc_html_e('VORTEX ECO HQ', 'vortex-eco'); ?>
            </h4>
            <address style="font-style: normal; color: var(--text-medium); line-height: 1.6; margin: 0;">
                123 Wind Energy Plaza<br>
                Renewable City, RC 12345<br>
                Taiwan<br><br>
                <a href="tel:+1-555-123-4567" style="color: var(--primary-color);">+1 (555) 123-4567</a>
            </address>
        </div>
    </section>

</main>

<style>
.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.enhanced-contact-form input:focus,
.enhanced-contact-form textarea:focus,
.enhanced-contact-form select:focus {
    outline: none;
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(0, 168, 230, 0.1);
}

@media (max-width: 768px) {
    .contact-hero {
        height: 50vh !important;
    }
    
    .contact-form-section .col:last-child {
        margin-left: 0 !important;
        margin-top: 2rem;
    }
    
    .enhanced-contact-form > div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
    }
    
    .contact-info-section {
        padding: 2rem 0 !important;
    }
    
    .map-section > div:first-child {
        padding: 1rem;
    }
}
</style>

<?php get_footer(); ?>