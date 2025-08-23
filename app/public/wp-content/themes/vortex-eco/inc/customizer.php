<?php
/**
 * VORTEX-ECO Theme Customizer
 *
 * @package VortexEco
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vortexeco_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'vortexeco_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'vortexeco_customize_partial_blogdescription',
            )
        );
    }

    // ===== HERO SECTION =====
    $wp_customize->add_section('vortexeco_hero_section', array(
        'title'       => __('Hero Section', 'vortex-eco'),
        'description' => __('Customize your homepage hero section', 'vortex-eco'),
        'priority'    => 30,
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'       => __('Hero Background Image', 'vortex-eco'),
        'description' => __('Upload a background image for the hero section (recommended: 1920x1080px)', 'vortex-eco'),
        'section'     => 'vortexeco_hero_section',
        'settings'    => 'hero_background_image',
    )));

    // Hero Overlay Opacity
    $wp_customize->add_setting('hero_overlay_opacity', array(
        'default'           => 0.9,
        'sanitize_callback' => 'vortexeco_sanitize_float',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('hero_overlay_opacity', array(
        'label'       => __('Hero Overlay Opacity', 'vortex-eco'),
        'description' => __('Control the opacity of the blue overlay on the hero image (0 = transparent, 1 = opaque)', 'vortex-eco'),
        'section'     => 'vortexeco_hero_section',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.1,
        ),
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Professional Wind Energy Consulting, Comprehensive Offshore Wind Solutions',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'vortex-eco'),
        'section' => 'vortexeco_hero_section',
        'type'    => 'textarea',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'VORTEXECO brings together wind industry experts, from material supply and engineering to operations and maintenance, providing comprehensive consulting services to help you reduce risks, improve efficiency, and move toward a sustainable future.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'vortex-eco'),
        'section' => 'vortexeco_hero_section',
        'type'    => 'textarea',
    ));

    // Hero CTA Text
    $wp_customize->add_setting('hero_cta_text', array(
        'default'           => 'Explore Our Services',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('hero_cta_text', array(
        'label'   => __('Hero CTA Button Text', 'vortex-eco'),
        'section' => 'vortexeco_hero_section',
        'type'    => 'text',
    ));

    // Hero CTA URL
    $wp_customize->add_setting('hero_cta_url', array(
        'default'           => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_cta_url', array(
        'label'   => __('Hero CTA Button URL', 'vortex-eco'),
        'section' => 'vortexeco_hero_section',
        'type'    => 'url',
    ));

    // ===== ABOUT SECTION =====
    $wp_customize->add_section('vortexeco_about_section', array(
        'title'       => __('About Section', 'vortex-eco'),
        'description' => __('Customize your about section content', 'vortex-eco'),
        'priority'    => 31,
    ));

    // About Title
    $wp_customize->add_setting('about_title', array(
        'default'           => 'Comprehensive Consulting Team, Focused on Every Detail',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('about_title', array(
        'label'   => __('About Section Title', 'vortex-eco'),
        'section' => 'vortexeco_about_section',
        'type'    => 'text',
    ));

    // About Subtitle
    $wp_customize->add_setting('about_subtitle', array(
        'default'           => 'Want to make your project faster, more stable, and more sustainably competitive? Let the VORTEXECO consulting team provide you with the most suitable solutions.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('about_subtitle', array(
        'label'   => __('About Section Subtitle', 'vortex-eco'),
        'section' => 'vortexeco_about_section',
        'type'    => 'textarea',
    ));

    // ===== VALUES SECTION =====
    $wp_customize->add_section('vortexeco_values_section', array(
        'title'       => __('Values Section', 'vortex-eco'),
        'description' => __('Customize your company values section', 'vortex-eco'),
        'priority'    => 32,
    ));

    // Values Title
    $wp_customize->add_setting('values_title', array(
        'default'           => 'VORTEX Values',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('values_title', array(
        'label'   => __('Values Section Title', 'vortex-eco'),
        'section' => 'vortexeco_values_section',
        'type'    => 'text',
    ));

    // Values Subtitle
    $wp_customize->add_setting('values_subtitle', array(
        'default'           => 'We are not just consultants, we are your long-term partners for project success.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('values_subtitle', array(
        'label'   => __('Values Section Subtitle', 'vortex-eco'),
        'section' => 'vortexeco_values_section',
        'type'    => 'textarea',
    ));

    // ===== THEME COLORS =====
    $wp_customize->add_section('vortexeco_colors', array(
        'title'       => __('Theme Colors', 'vortex-eco'),
        'description' => __('Customize your theme colors', 'vortex-eco'),
        'priority'    => 40,
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#1263A0',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'       => __('Primary Color', 'vortex-eco'),
        'description' => __('This color will be used for headings, buttons, and main branding elements.', 'vortex-eco'),
        'section'     => 'vortexeco_colors',
        'settings'    => 'primary_color',
    )));

    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#0B4D7D',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'       => __('Secondary Color', 'vortex-eco'),
        'description' => __('A darker shade used for gradients and hover states.', 'vortex-eco'),
        'section'     => 'vortexeco_colors',
        'settings'    => 'secondary_color',
    )));

    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#00A8E6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'       => __('Accent Color', 'vortex-eco'),
        'description' => __('Used for highlights, links, and call-to-action elements.', 'vortex-eco'),
        'section'     => 'vortexeco_colors',
        'settings'    => 'accent_color',
    )));

    // ===== TYPOGRAPHY =====
    $wp_customize->add_section('vortexeco_typography', array(
        'title'       => __('Typography', 'vortex-eco'),
        'description' => __('Customize fonts and text sizes', 'vortex-eco'),
        'priority'    => 41,
    ));

    // Font Family Choice
    $wp_customize->add_setting('font_family', array(
        'default'           => 'inter',
        'sanitize_callback' => 'vortexeco_sanitize_select',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('font_family', array(
        'label'   => __('Font Family', 'vortex-eco'),
        'section' => 'vortexeco_typography',
        'type'    => 'select',
        'choices' => array(
            'inter'     => 'Inter (Default)',
            'roboto'    => 'Roboto',
            'opensans'  => 'Open Sans',
            'lato'      => 'Lato',
            'poppins'   => 'Poppins',
            'system'    => 'System Fonts',
        ),
    ));

    // Base Font Size
    $wp_customize->add_setting('base_font_size', array(
        'default'           => 16,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('base_font_size', array(
        'label'       => __('Base Font Size (px)', 'vortex-eco'),
        'section'     => 'vortexeco_typography',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 14,
            'max'  => 20,
            'step' => 1,
        ),
    ));

    // ===== LAYOUT =====
    $wp_customize->add_section('vortexeco_layout', array(
        'title'       => __('Layout Options', 'vortex-eco'),
        'description' => __('Customize layout and spacing', 'vortex-eco'),
        'priority'    => 42,
    ));

    // Container Width
    $wp_customize->add_setting('container_width', array(
        'default'           => 1200,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('container_width', array(
        'label'       => __('Container Max Width (px)', 'vortex-eco'),
        'section'     => 'vortexeco_layout',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 1000,
            'max'  => 1600,
            'step' => 50,
        ),
    ));

    // Header Height
    $wp_customize->add_setting('header_height', array(
        'default'           => 80,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('header_height', array(
        'label'       => __('Header Height (px)', 'vortex-eco'),
        'section'     => 'vortexeco_layout',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 60,
            'max'  => 120,
            'step' => 5,
        ),
    ));

    // Enable Sticky Header
    $wp_customize->add_setting('sticky_header', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('sticky_header', array(
        'label'   => __('Enable Sticky Header', 'vortex-eco'),
        'section' => 'vortexeco_layout',
        'type'    => 'checkbox',
    ));

    // ===== FOOTER =====
    $wp_customize->add_section('vortexeco_footer', array(
        'title'       => __('Footer Options', 'vortex-eco'),
        'description' => __('Customize footer content and appearance', 'vortex-eco'),
        'priority'    => 43,
    ));

    // Footer Copyright Text
    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'       => __('Footer Copyright Text', 'vortex-eco'),
        'description' => __('Leave empty to use default copyright text', 'vortex-eco'),
        'section'     => 'vortexeco_footer',
        'type'        => 'textarea',
    ));

    // Show Back to Top Button
    $wp_customize->add_setting('show_back_to_top', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('show_back_to_top', array(
        'label'   => __('Show Back to Top Button', 'vortex-eco'),
        'section' => 'vortexeco_footer',
        'type'    => 'checkbox',
    ));

    // ===== BLOG =====
    $wp_customize->add_section('vortexeco_blog', array(
        'title'       => __('Blog Options', 'vortex-eco'),
        'description' => __('Customize blog layout and features', 'vortex-eco'),
        'priority'    => 44,
    ));

    // Blog Layout
    $wp_customize->add_setting('blog_layout', array(
        'default'           => 'grid',
        'sanitize_callback' => 'vortexeco_sanitize_select',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('blog_layout', array(
        'label'   => __('Blog Layout', 'vortex-eco'),
        'section' => 'vortexeco_blog',
        'type'    => 'select',
        'choices' => array(
            'list' => __('List View', 'vortex-eco'),
            'grid' => __('Grid View', 'vortex-eco'),
        ),
    ));

    // Show Excerpt or Full Content
    $wp_customize->add_setting('blog_content', array(
        'default'           => 'excerpt',
        'sanitize_callback' => 'vortexeco_sanitize_select',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('blog_content', array(
        'label'   => __('Blog Content Display', 'vortex-eco'),
        'section' => 'vortexeco_blog',
        'type'    => 'select',
        'choices' => array(
            'excerpt' => __('Show Excerpt', 'vortex-eco'),
            'content' => __('Show Full Content', 'vortex-eco'),
        ),
    ));

    // Show Author Meta
    $wp_customize->add_setting('show_author_meta', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('show_author_meta', array(
        'label'   => __('Show Author Information', 'vortex-eco'),
        'section' => 'vortexeco_blog',
        'type'    => 'checkbox',
    ));

    // Show Date Meta
    $wp_customize->add_setting('show_date_meta', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('show_date_meta', array(
        'label'   => __('Show Publication Date', 'vortex-eco'),
        'section' => 'vortexeco_blog',
        'type'    => 'checkbox',
    ));

    // ===== SOCIAL MEDIA =====
    $wp_customize->add_section('vortexeco_social', array(
        'title'       => __('Social Media', 'vortex-eco'),
        'description' => __('Add your social media links', 'vortex-eco'),
        'priority'    => 45,
    ));

    // Social Media Links
    $social_sites = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter', 
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
        'instagram' => 'Instagram',
    );

    foreach ($social_sites as $key => $label) {
        $wp_customize->add_setting("social_{$key}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control("social_{$key}", array(
            'label'   => $label . ' ' . __('URL', 'vortex-eco'),
            'section' => 'vortexeco_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'vortexeco_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function vortexeco_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function vortexeco_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vortexeco_customize_preview_js() {
    wp_enqueue_script('vortexeco-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), VORTEXECO_VERSION, true);
}
add_action('customize_preview_init', 'vortexeco_customize_preview_js');

/**
 * Sanitization functions
 */
function vortexeco_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return array_key_exists($input, $choices) ? $input : $setting->default;
}

function vortexeco_sanitize_float($input) {
    return filter_var($input, FILTER_VALIDATE_FLOAT);
}

function vortexeco_sanitize_checkbox($checked) {
    return ((isset($checked) && true === $checked) ? true : false);
}
?>