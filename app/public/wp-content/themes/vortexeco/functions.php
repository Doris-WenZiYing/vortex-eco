<?php
/**
 * Functions and definitions for VortexEco theme
 *
 * @package VortexEco
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function vortexeco_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for custom backgrounds
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vortex-eco'),
        'footer'  => __('Footer Menu', 'vortex-eco'),
    ));
}
add_action('after_setup_theme', 'vortexeco_setup');

/**
 * Enqueue scripts and styles
 */
function vortexeco_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style('vortexeco-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('vortexeco-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    
    // Enqueue theme JavaScript
    wp_enqueue_script('vortexeco-scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Add localization for JavaScript
    wp_localize_script('vortexeco-scripts', 'vortexeco_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('vortexeco_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'vortexeco_scripts');

/**
 * Remove WordPress default margins and padding
 */
function vortexeco_remove_wp_margins() {
    echo '<style>
        body.wp-admin-bar-front #wpadminbar { display: none !important; }
        html { margin-top: 0 !important; }
        * { margin: 0; padding: 0; }
        .container, .wp-container { max-width: none !important; padding: 0 !important; margin: 0 !important; }
        .site-content { margin: 0 !important; padding: 0 !important; }
        .content-area { margin: 0 !important; padding: 0 !important; }
        #primary { margin: 0 !important; padding: 0 !important; }
        #main { margin: 0 !important; padding: 0 !important; }
        .site-main { margin: 0 !important; padding: 0 !important; }
        .entry-content { margin: 0 !important; padding: 0 !important; }
        .alignfull { margin: 0 !important; width: 100vw !important; max-width: 100vw !important; }
    </style>';
}
add_action('wp_head', 'vortexeco_remove_wp_margins');

/**
 * Remove WordPress admin bar for front-end
 */
function vortexeco_remove_admin_bar() {
    if (!is_admin()) {
        show_admin_bar(false);
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('after_setup_theme', 'vortexeco_remove_admin_bar');

/**
 * Remove admin bar for all users
 */
add_action('init', function() {
    remove_action('wp_head', '_admin_bar_bump_cb');
});

/**
 * Remove WordPress default margins and force centering
 */
function vortexeco_force_layout() {
    echo '<style>
        /* Remove all admin bars and notifications */
        #wpadminbar, .admin-bar, .wp-toolbar, #wp-toolbar, .notice, .update-nag, .error, .updated { 
            display: none !important; 
            visibility: hidden !important;
            height: 0 !important;
        }
        
        /* Remove top margin that admin bar creates */
        html { margin-top: 0 !important; }
        html.wp-toolbar { padding-top: 0 !important; }
        body.admin-bar { margin-top: 0 !important; padding-top: 0 !important; }
        
        /* Force full width layout */
        body, html { 
            width: 100% !important; 
            overflow-x: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        
        /* Remove all container constraints */
        * { margin: 0; padding: 0; }
        .wp-container, .wp-block-group { 
            max-width: none !important; 
            padding: 0 !important; 
            margin: 0 !important; 
            width: 100% !important;
        }
        
        /* 只針對特定頁面的容器樣式 */
        .page-template-page-market-insights .container,
        .page-template-page-contact-us .container {
            max-width: 1400px !important;
            margin: 0 auto !important;
            padding: 0 2rem !important;
        }
        
        /* 針對特定頁面的響應式padding */
        @media (min-width: 1440px) {
            .page-template-page-market-insights .container,
            .page-template-page-contact-us .container {
                padding: 0 max(2rem, calc((100vw - 1400px) / 2 + 2rem)) !important;
            }
        }
        
        @media (max-width: 768px) {
            .page-template-page-market-insights .container,
            .page-template-page-contact-us .container {
                padding: 0 1.5rem !important;
            }
        }
        
        @media (max-width: 480px) {
            .page-template-page-market-insights .container,
            .page-template-page-contact-us .container {
                padding: 0 1rem !important;
            }
        }
        
        /* Force hero section to be perfectly centered (只影響首頁) */
        #hero { 
            display: flex !important; 
            align-items: center !important; 
            justify-content: center !important;
            text-align: center !important;
            width: 100vw !important;
            position: relative !important;
        }
        
        #hero > div {
            text-align: center !important;
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
        }
        
        #hero h1 {
            text-align: center !important;
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
            display: block !important;
        }
        
        #hero p {
            text-align: center !important;
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
        }
        
        /* Remove WordPress imposed layouts */
        .site-content, .content-area, #primary, #main, .site-main, .entry-content { 
            margin: 0 !important; 
            padding: 0 !important; 
        }
        
        /* Ensure header doesn\'t interfere */
        .site-header { 
            position: fixed !important;
            top: 0 !important;
            width: 100vw !important;
            z-index: 9999 !important;
        }
    </style>';
}
add_action('wp_head', 'vortexeco_force_layout', 999);

/**
 * Custom excerpt length
 */
function vortexeco_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'vortexeco_excerpt_length');

/**
 * Custom excerpt more string
 */
function vortexeco_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'vortexeco_excerpt_more');

/**
 * Register widget areas
 */
function vortexeco_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'vortex-eco'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'vortex-eco'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'vortex-eco'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in your footer.', 'vortex-eco'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'vortexeco_widgets_init');

/**
 * Add custom post types for services and projects
 */
function vortexeco_custom_post_types() {
    // Services post type
    register_post_type('services', array(
        'labels' => array(
            'name'               => __('Services', 'vortex-eco'),
            'singular_name'      => __('Service', 'vortex-eco'),
            'add_new'            => __('Add New Service', 'vortex-eco'),
            'add_new_item'       => __('Add New Service', 'vortex-eco'),
            'edit_item'          => __('Edit Service', 'vortex-eco'),
            'new_item'           => __('New Service', 'vortex-eco'),
            'view_item'          => __('View Service', 'vortex-eco'),
            'search_items'       => __('Search Services', 'vortex-eco'),
            'not_found'          => __('No services found', 'vortex-eco'),
            'not_found_in_trash' => __('No services found in trash', 'vortex-eco'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'    => 'dashicons-admin-tools',
        'rewrite'      => array('slug' => 'services'),
    ));
    
    // Projects post type
    register_post_type('projects', array(
        'labels' => array(
            'name'               => __('Projects', 'vortex-eco'),
            'singular_name'      => __('Project', 'vortex-eco'),
            'add_new'            => __('Add New Project', 'vortex-eco'),
            'add_new_item'       => __('Add New Project', 'vortex-eco'),
            'edit_item'          => __('Edit Project', 'vortex-eco'),
            'new_item'           => __('New Project', 'vortex-eco'),
            'view_item'          => __('View Project', 'vortex-eco'),
            'search_items'       => __('Search Projects', 'vortex-eco'),
            'not_found'          => __('No projects found', 'vortex-eco'),
            'not_found_in_trash' => __('No projects found in trash', 'vortex-eco'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'    => 'dashicons-portfolio',
        'rewrite'      => array('slug' => 'projects'),
    ));
}
add_action('init', 'vortexeco_custom_post_types');

/**
 * Add custom fields support
 */
function vortexeco_add_meta_boxes() {
    add_meta_box(
        'service_details',
        __('Service Details', 'vortex-eco'),
        'vortexeco_service_details_callback',
        'services'
    );
    
    add_meta_box(
        'project_details',
        __('Project Details', 'vortex-eco'),
        'vortexeco_project_details_callback',
        'projects'
    );
}
add_action('add_meta_boxes', 'vortexeco_add_meta_boxes');

/**
 * Service details meta box callback
 */
function vortexeco_service_details_callback($post) {
    wp_nonce_field('vortexeco_save_service_details', 'vortexeco_service_nonce');
    
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="service_icon">' . __('Service Icon', 'vortex-eco') . '</label></th>';
    echo '<td><input type="text" id="service_icon" name="service_icon" value="' . esc_attr($icon) . '" class="regular-text" placeholder="🔧" /></td></tr>';
    echo '<tr><th><label for="service_features">' . __('Key Features', 'vortex-eco') . '</label></th>';
    echo '<td><textarea id="service_features" name="service_features" rows="5" class="large-text">' . esc_textarea($features) . '</textarea>';
    echo '<p class="description">' . __('Enter each feature on a new line.', 'vortex-eco') . '</p></td></tr>';
    echo '</table>';
}

/**
 * Project details meta box callback
 */
function vortexeco_project_details_callback($post) {
    wp_nonce_field('vortexeco_save_project_details', 'vortexeco_project_nonce');
    
    $client = get_post_meta($post->ID, '_project_client', true);
    $location = get_post_meta($post->ID, '_project_location', true);
    $capacity = get_post_meta($post->ID, '_project_capacity', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="project_client">' . __('Client', 'vortex-eco') . '</label></th>';
    echo '<td><input type="text" id="project_client" name="project_client" value="' . esc_attr($client) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="project_location">' . __('Location', 'vortex-eco') . '</label></th>';
    echo '<td><input type="text" id="project_location" name="project_location" value="' . esc_attr($location) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="project_capacity">' . __('Capacity', 'vortex-eco') . '</label></th>';
    echo '<td><input type="text" id="project_capacity" name="project_capacity" value="' . esc_attr($capacity) . '" class="regular-text" placeholder="500MW" /></td></tr>';
    echo '<tr><th><label for="project_year">' . __('Year', 'vortex-eco') . '</label></th>';
    echo '<td><input type="number" id="project_year" name="project_year" value="' . esc_attr($year) . '" class="regular-text" min="2000" max="2030" /></td></tr>';
    echo '</table>';
}

/**
 * Save custom fields
 */
function vortexeco_save_custom_fields($post_id) {
    // Services
    if (isset($_POST['vortexeco_service_nonce']) && wp_verify_nonce($_POST['vortexeco_service_nonce'], 'vortexeco_save_service_details')) {
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        }
        if (isset($_POST['service_features'])) {
            update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
        }
    }
    
    // Projects
    if (isset($_POST['vortexeco_project_nonce']) && wp_verify_nonce($_POST['vortexeco_project_nonce'], 'vortexeco_save_project_details')) {
        if (isset($_POST['project_client'])) {
            update_post_meta($post_id, '_project_client', sanitize_text_field($_POST['project_client']));
        }
        if (isset($_POST['project_location'])) {
            update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
        }
        if (isset($_POST['project_capacity'])) {
            update_post_meta($post_id, '_project_capacity', sanitize_text_field($_POST['project_capacity']));
        }
        if (isset($_POST['project_year'])) {
            update_post_meta($post_id, '_project_year', intval($_POST['project_year']));
        }
    }
}
add_action('save_post', 'vortexeco_save_custom_fields');

/**
 * Add customizer settings
 */
function vortexeco_customize_register($wp_customize) {
    // Hero section
    $wp_customize->add_section('vortexeco_hero', array(
        'title'    => __('Hero Section', 'vortex-eco'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'    => __('Hero Background Image', 'vortex-eco'),
        'section'  => 'vortexeco_hero',
        'settings' => 'hero_background_image',
    )));
    
    // Company info
    $wp_customize->add_section('vortexeco_company', array(
        'title'    => __('Company Information', 'vortex-eco'),
        'priority' => 31,
    ));
    
    $wp_customize->add_setting('company_phone', array(
        'default'           => '+65 (3) 1258302',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('company_phone', array(
        'label'   => __('Phone Number', 'vortex-eco'),
        'section' => 'vortexeco_company',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('company_email', array(
        'default'           => 'TSD@vortexeco.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('company_email', array(
        'label'   => __('Email Address', 'vortex-eco'),
        'section' => 'vortexeco_company',
        'type'    => 'email',
    ));
    
    $wp_customize->add_setting('company_address', array(
        'default'           => '51 GOLDHILL PLAZA #20-07 SINGAPORE (308900)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('company_address', array(
        'label'   => __('Address', 'vortex-eco'),
        'section' => 'vortexeco_company',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'vortexeco_customize_register');

/**
 * Contact form processing
 */
function vortexeco_process_contact_form() {
    if (isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['first_name'] . ' ' . $_POST['last_name']);
        $email = sanitize_email($_POST['email']);
        $company = sanitize_text_field($_POST['company']);
        $service = sanitize_text_field($_POST['service_interest']);
        $message = sanitize_textarea_field($_POST['message']);
        
        $to = get_theme_mod('company_email', 'TSD@vortexeco.com');
        $subject = 'New Contact Form Submission from ' . $name;
        $body = "Name: $name\nEmail: $email\nCompany: $company\nService Interest: $service\n\nMessage:\n$message";
        $headers = array('Content-Type: text/plain; charset=UTF-8', 'From: ' . $email);
        
        if (wp_mail($to, $subject, $body, $headers)) {
            wp_redirect(add_query_arg('contact', 'success', home_url()));
            exit;
        } else {
            wp_redirect(add_query_arg('contact', 'error', home_url()));
            exit;
        }
    }
}
add_action('init', 'vortexeco_process_contact_form');

/**
 * Disable WordPress block editor for theme compatibility
 */
function vortexeco_disable_block_editor($use_block_editor, $post) {
    return false;
}
add_filter('use_block_editor_for_post', 'vortexeco_disable_block_editor', 10, 2);

/**
 * Remove default WordPress styles that might interfere
 */
function vortexeco_dequeue_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
}
add_action('wp_enqueue_scripts', 'vortexeco_dequeue_styles', 100);

/**
 * Add theme support for wide and full alignments
 */
function vortexeco_add_theme_support() {
    add_theme_support('align-wide');
    add_theme_support('align-full');
}
add_action('after_setup_theme', 'vortexeco_add_theme_support');

// 添加自定義 rewrite rules
function add_product_detail_rewrite_rules() {
    add_rewrite_rule('^product-detail/?$', 'index.php?pagename=product-detail', 'top');
    add_rewrite_rule('^service-detail/?$', 'index.php?pagename=service-detail', 'top');
}
add_action('init', 'add_product_detail_rewrite_rules');

// 刷新 rewrite rules
function flush_rewrite_rules_on_activation() {
    add_product_detail_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_on_activation');

// 手動刷新規則的函數
function vortexeco_flush_rules() {
    if (get_option('vortexeco_flush_rewrite_rules') !== 'done') {
        flush_rewrite_rules();
        update_option('vortexeco_flush_rewrite_rules', 'done');
    }
}
add_action('wp_loaded', 'vortexeco_flush_rules');

/**
 * Force flush rewrite rules (run this once)
 */
function vortexeco_force_flush_rewrite_rules() {
    add_product_detail_rewrite_rules();
    flush_rewrite_rules();
}
// Uncomment the line below, load any page on your site, then comment it back
add_action('wp_loaded', 'vortexeco_force_flush_rewrite_rules');

function mytheme_customize_register( $wp_customize ) {
    // 新增一個區塊 (例如 Header 設定)
    $wp_customize->add_section('mytheme_header_section', array(
        'title'    => __('Header Settings', 'mytheme'),
        'priority' => 30,
    ));

    // 新增 Logo 圖片設定
    $wp_customize->add_setting('mytheme_header_logo');

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mytheme_header_logo',
            array(
                'label'    => __('Header Logo', 'mytheme'),
                'section'  => 'mytheme_header_section',
                'settings' => 'mytheme_header_logo',
            )
        )
    );

    // 新增 Footer Logo 圖片設定
    $wp_customize->add_setting('mytheme_footer_logo');

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mytheme_footer_logo',
            array(
                'label'    => __('Footer Logo', 'mytheme'),
                'section'  => 'mytheme_header_section',
                'settings' => 'mytheme_footer_logo',
            )
        )
    );

    $wp_customize->add_setting('mytheme_other_logo');

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mytheme_other_logo',
            array(
                'label'    => __('Other Logo', 'mytheme'),
                'section'  => 'mytheme_header_section',
                'settings' => 'mytheme_other_logo',
            )
        )
    );
}
add_action('customize_register', 'mytheme_customize_register');

/**
 * Enhanced Customizer for VortexEco Theme
 * Add this to functions.php
 */

function vortexeco_enhanced_customizer($wp_customize) {
    
    // ===== HEADER CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_header_custom', array(
        'title'    => __('Header Customization', 'vortex-eco'),
        'priority' => 30,
    ));
    
    // Header Background Color
    $wp_customize->add_setting('header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header Background Color', 'vortex-eco'),
        'section'  => 'vortexeco_header_custom',
    )));
    
    // Header Text Color
    $wp_customize->add_setting('header_text_color', array(
        'default'           => '#1263A0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label'    => __('Header Text Color', 'vortex-eco'),
        'section'  => 'vortexeco_header_custom',
    )));
    
    // Company Name
    $wp_customize->add_setting('company_name', array(
        'default'           => 'VORTEXECO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_name', array(
        'label'   => __('Company Name', 'vortex-eco'),
        'section' => 'vortexeco_header_custom',
        'type'    => 'text',
    ));
    
    // ===== HERO SECTION CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_hero_custom', array(
        'title'    => __('Hero Section Customization', 'vortex-eco'),
        'priority' => 31,
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image', array(
        'label'    => __('Hero Background Image', 'vortex-eco'),
        'section'  => 'vortexeco_hero_custom',
    )));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Professional Wind Energy Consulting Solutions',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'vortex-eco'),
        'section' => 'vortexeco_hero_custom',
        'type'    => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'VORTEXECO SOLUTIONS brings together wind industry experts...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'vortex-eco'),
        'section' => 'vortexeco_hero_custom',
        'type'    => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_text', array(
        'label'   => __('Hero Button Text', 'vortex-eco'),
        'section' => 'vortexeco_hero_custom',
        'type'    => 'text',
    ));
    
    // ===== COLOR SCHEME CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_colors', array(
        'title'    => __('Color Scheme', 'vortex-eco'),
        'priority' => 32,
    ));
    
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#1263A0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'vortex-eco'),
        'section'  => 'vortexeco_colors',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#00A8E6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'vortex-eco'),
        'section'  => 'vortexeco_colors',
    )));
    
    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#059669',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Accent Color', 'vortex-eco'),
        'section'  => 'vortexeco_colors',
    )));
    
    // ===== LAYOUT CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_layout', array(
        'title'    => __('Layout Options', 'vortex-eco'),
        'priority' => 33,
    ));
    
    // Container Width
    $wp_customize->add_setting('container_width', array(
        'default'           => '1200',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('container_width', array(
        'label'       => __('Container Max Width (px)', 'vortex-eco'),
        'section'     => 'vortexeco_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1920,
            'step' => 20,
        ),
    ));
    
    // Section Padding
    $wp_customize->add_setting('section_padding', array(
        'default'           => '4',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('section_padding', array(
        'label'       => __('Section Padding (rem)', 'vortex-eco'),
        'section'     => 'vortexeco_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 2,
            'max'  => 8,
            'step' => 0.5,
        ),
    ));
    
    // ===== ABOUT SECTION CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_about_custom', array(
        'title'    => __('About Section', 'vortex-eco'),
        'priority' => 34,
    ));
    
    // About Title
    $wp_customize->add_setting('about_title', array(
        'default'           => 'Comprehensive Wind Energy Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label'   => __('About Section Title', 'vortex-eco'),
        'section' => 'vortexeco_about_custom',
        'type'    => 'text',
    ));
    
    // About Subtitle
    $wp_customize->add_setting('about_subtitle', array(
        'default'           => 'Focused on Every Detail',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_subtitle', array(
        'label'   => __('About Section Subtitle', 'vortex-eco'),
        'section' => 'vortexeco_about_custom',
        'type'    => 'text',
    ));
    
    // About Description
    $wp_customize->add_setting('about_description', array(
        'default'           => 'Want to make your project faster, more stable, and more sustainably competitive?',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_description', array(
        'label'   => __('About Description', 'vortex-eco'),
        'section' => 'vortexeco_about_custom',
        'type'    => 'textarea',
    ));
    
    // About Image
    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'    => __('About Section Image', 'vortex-eco'),
        'section'  => 'vortexeco_about_custom',
    )));
    
    // ===== SERVICES SECTION CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_services_custom', array(
        'title'    => __('Services Section', 'vortex-eco'),
        'priority' => 35,
    ));
    
    // Services Title
    $wp_customize->add_setting('services_title', array(
        'default'           => '8 Major Consulting Specializations',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label'   => __('Services Section Title', 'vortex-eco'),
        'section' => 'vortexeco_services_custom',
        'type'    => 'text',
    ));
    
    // Services Description
    $wp_customize->add_setting('services_description', array(
        'default'           => 'Comprehensive expertise across every aspect of wind energy development and operations',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('services_description', array(
        'label'   => __('Services Description', 'vortex-eco'),
        'section' => 'vortexeco_services_custom',
        'type'    => 'textarea',
    ));
    
    // ===== CONTACT SECTION CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_contact_custom', array(
        'title'    => __('Contact Section', 'vortex-eco'),
        'priority' => 36,
    ));
    
    // Contact Title
    $wp_customize->add_setting('contact_title', array(
        'default'           => 'Ready to Power Your Wind Energy Project?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_title', array(
        'label'   => __('Contact Section Title', 'vortex-eco'),
        'section' => 'vortexeco_contact_custom',
        'type'    => 'text',
    ));
    
    // Contact Description
    $wp_customize->add_setting('contact_description', array(
        'default'           => 'Let our expert team guide you through every phase of your offshore wind development journey.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_description', array(
        'label'   => __('Contact Description', 'vortex-eco'),
        'section' => 'vortexeco_contact_custom',
        'type'    => 'textarea',
    ));
    
    // ===== FOOTER CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_footer_custom', array(
        'title'    => __('Footer Customization', 'vortex-eco'),
        'priority' => 37,
    ));
    
    // Footer Background Color
    $wp_customize->add_setting('footer_bg_color', array(
        'default'           => '#1F2937',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'    => __('Footer Background Color', 'vortex-eco'),
        'section'  => 'vortexeco_footer_custom',
    )));
    
    // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default'           => 'Leading wind energy consulting firm providing comprehensive services...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_description', array(
        'label'   => __('Footer Description', 'vortex-eco'),
        'section' => 'vortexeco_footer_custom',
        'type'    => 'textarea',
    ));
    
    // ===== TYPOGRAPHY CUSTOMIZATION =====
    $wp_customize->add_section('vortexeco_typography', array(
        'title'    => __('Typography', 'vortex-eco'),
        'priority' => 38,
    ));
    
    // Font Family
    $wp_customize->add_setting('body_font_family', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('body_font_family', array(
        'label'   => __('Body Font Family', 'vortex-eco'),
        'section' => 'vortexeco_typography',
        'type'    => 'select',
        'choices' => array(
            'Inter'       => 'Inter',
            'Roboto'      => 'Roboto',
            'Open Sans'   => 'Open Sans',
            'Lato'        => 'Lato',
            'Montserrat'  => 'Montserrat',
            'Poppins'     => 'Poppins',
        ),
    ));
    
    // Heading Font Family
    $wp_customize->add_setting('heading_font_family', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('heading_font_family', array(
        'label'   => __('Heading Font Family', 'vortex-eco'),
        'section' => 'vortexeco_typography',
        'type'    => 'select',
        'choices' => array(
            'Inter'       => 'Inter',
            'Roboto'      => 'Roboto',
            'Open Sans'   => 'Open Sans',
            'Lato'        => 'Lato',
            'Montserrat'  => 'Montserrat',
            'Poppins'     => 'Poppins',
        ),
    ));
    
    // Base Font Size
    $wp_customize->add_setting('base_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('base_font_size', array(
        'label'       => __('Base Font Size (px)', 'vortex-eco'),
        'section'     => 'vortexeco_typography',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 14,
            'max'  => 20,
            'step' => 1,
        ),
    ));
}
add_action('customize_register', 'vortexeco_enhanced_customizer');

/**
 * Output customizer CSS
 */
function vortexeco_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#1263A0');
    $secondary_color = get_theme_mod('secondary_color', '#00A8E6');
    $accent_color = get_theme_mod('accent_color', '#059669');
    $header_bg_color = get_theme_mod('header_bg_color', '#ffffff');
    $header_text_color = get_theme_mod('header_text_color', '#1263A0');
    $footer_bg_color = get_theme_mod('footer_bg_color', '#1F2937');
    $container_width = get_theme_mod('container_width', '1200');
    $section_padding = get_theme_mod('section_padding', '4');
    $body_font = get_theme_mod('body_font_family', 'Inter');
    $heading_font = get_theme_mod('heading_font_family', 'Inter');
    $base_font_size = get_theme_mod('base_font_size', '16');
    
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --container-width: <?php echo esc_attr($container_width); ?>px;
            --section-padding: <?php echo esc_attr($section_padding); ?>rem;
            --base-font-size: <?php echo esc_attr($base_font_size); ?>px;
        }
        
        body {
            font-family: '<?php echo esc_attr($body_font); ?>', sans-serif;
            font-size: var(--base-font-size);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: '<?php echo esc_attr($heading_font); ?>', sans-serif;
        }
        
        .site-header {
            background-color: <?php echo esc_attr($header_bg_color); ?>;
        }
        
        .site-branding div:last-child {
            color: <?php echo esc_attr($header_text_color); ?>;
        }
        
        .container {
            max-width: var(--container-width);
        }
        
        .section {
            padding: var(--section-padding) 0;
        }
        
        .site-footer {
            background: <?php echo esc_attr($footer_bg_color); ?>;
        }
        
        /* Primary color applications */
        .btn-primary,
        .filter-btn.active,
        .service-filter-btn.active,
        .main-category-btn.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        /* Text color applications */
        .site-branding a,
        .main-navigation a:hover,
        .post-title a:hover,
        .read-more {
            color: var(--primary-color);
        }
        
        /* Border and accent color applications */
        .card:hover,
        .service-card:hover,
        .product-card:hover {
            border-color: var(--secondary-color);
        }
        
        /* Custom gradient backgrounds */
        .page-header,
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
    </style>
    <?php
}
add_action('wp_head', 'vortexeco_customizer_css');

/**
 * Advanced Page Builder for Each Page
 */
function vortexeco_page_builder_meta_box() {
    add_meta_box(
        'vortexeco_page_builder',
        __('Page Builder', 'vortex-eco'),
        'vortexeco_page_builder_callback',
        'page'
    );
}
add_action('add_meta_boxes', 'vortexeco_page_builder_meta_box');

function vortexeco_page_builder_callback($post) {
    wp_nonce_field('vortexeco_save_page_builder', 'vortexeco_page_builder_nonce');
    
    $sections = get_post_meta($post->ID, '_page_sections', true);
    if (!$sections) {
        $sections = array();
    }
    
    ?>
    <div id="vortexeco-page-builder">
        <div id="sections-container">
            <?php foreach ($sections as $index => $section): ?>
                <div class="section-item" data-index="<?php echo $index; ?>">
                    <h4>Section <?php echo $index + 1; ?></h4>
                    
                    <label>Section Type:</label>
                    <select name="sections[<?php echo $index; ?>][type]">
                        <option value="hero" <?php selected($section['type'], 'hero'); ?>>Hero</option>
                        <option value="about" <?php selected($section['type'], 'about'); ?>>About</option>
                        <option value="services" <?php selected($section['type'], 'services'); ?>>Services</option>
                        <option value="contact" <?php selected($section['type'], 'contact'); ?>>Contact</option>
                        <option value="custom" <?php selected($section['type'], 'custom'); ?>>Custom HTML</option>
                    </select>
                    
                    <label>Title:</label>
                    <input type="text" name="sections[<?php echo $index; ?>][title]" value="<?php echo esc_attr($section['title']); ?>" />
                    
                    <label>Content:</label>
                    <textarea name="sections[<?php echo $index; ?>][content]" rows="5"><?php echo esc_textarea($section['content']); ?></textarea>
                    
                    <label>Background Color:</label>
                    <input type="color" name="sections[<?php echo $index; ?>][bg_color]" value="<?php echo esc_attr($section['bg_color']); ?>" />
                    
                    <button type="button" class="remove-section">Remove Section</button>
                </div>
            <?php endforeach; ?>
        </div>
        
        <button type="button" id="add-section">Add Section</button>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let sectionIndex = <?php echo count($sections); ?>;
        
        document.getElementById('add-section').addEventListener('click', function() {
            const container = document.getElementById('sections-container');
            const sectionHTML = `
                <div class="section-item" data-index="${sectionIndex}">
                    <h4>Section ${sectionIndex + 1}</h4>
                    
                    <label>Section Type:</label>
                    <select name="sections[${sectionIndex}][type]">
                        <option value="hero">Hero</option>
                        <option value="about">About</option>
                        <option value="services">Services</option>
                        <option value="contact">Contact</option>
                        <option value="custom">Custom HTML</option>
                    </select>
                    
                    <label>Title:</label>
                    <input type="text" name="sections[${sectionIndex}][title]" />
                    
                    <label>Content:</label>
                    <textarea name="sections[${sectionIndex}][content]" rows="5"></textarea>
                    
                    <label>Background Color:</label>
                    <input type="color" name="sections[${sectionIndex}][bg_color]" value="#ffffff" />
                    
                    <button type="button" class="remove-section">Remove Section</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', sectionHTML);
            sectionIndex++;
        });
        
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-section')) {
                e.target.parentElement.remove();
            }
        });
    });
    </script>
    
    <style>
    #vortexeco-page-builder {
        padding: 20px;
    }
    
    .section-item {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        background: #f9f9f9;
    }
    
    .section-item label {
        display: block;
        margin: 10px 0 5px 0;
        font-weight: bold;
    }
    
    .section-item input,
    .section-item select,
    .section-item textarea {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .remove-section {
        background: #dc3232;
        color: white;
        border: none;
        padding: 8px 15px;
        cursor: pointer;
    }
    
    #add-section {
        background: #0073aa;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
    </style>
    <?php
}

function vortexeco_save_page_builder($post_id) {
    if (!isset($_POST['vortexeco_page_builder_nonce']) || 
        !wp_verify_nonce($_POST['vortexeco_page_builder_nonce'], 'vortexeco_save_page_builder')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['sections'])) {
        update_post_meta($post_id, '_page_sections', $_POST['sections']);
    }
}
add_action('save_post', 'vortexeco_save_page_builder');


// 1. 建立產品自定義文章類型
function create_vortexeco_product_cpt() {
    register_post_type('vortex_products', array(
        'labels' => array(
            'name' => __('Wind Products', 'vortex-eco'),
            'singular_name' => __('Product', 'vortex-eco'),
            'add_new' => __('Add New Product', 'vortex-eco'),
            'add_new_item' => __('Add New Product', 'vortex-eco'),
            'edit_item' => __('Edit Product', 'vortex-eco'),
            'view_item' => __('View Product', 'vortex-eco'),
            'search_items' => __('Search Products', 'vortex-eco'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon' => 'dashicons-admin-tools',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'wind-products'),
    ));
    
    // 產品分類
    register_taxonomy('product_category', 'vortex_products', array(
        'labels' => array(
            'name' => __('Product Categories', 'vortex-eco'),
            'singular_name' => __('Category', 'vortex-eco'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'product-category'),
    ));
    
    // 產品品牌
    register_taxonomy('product_brand', 'vortex_products', array(
        'labels' => array(
            'name' => __('Brands', 'vortex-eco'),
            'singular_name' => __('Brand', 'vortex-eco'),
        ),
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'brand'),
    ));
}
add_action('init', 'create_vortexeco_product_cpt');

// 2. 產品查詢函數
function get_vortexeco_products($args = array()) {
    $default_args = array(
        'post_type' => 'vortex_products',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => array(),
        'tax_query' => array(),
    );
    
    $args = wp_parse_args($args, $default_args);
    
    $products = get_posts($args);
    $product_data = array();
    
    foreach ($products as $product) {
        $categories = get_the_terms($product->ID, 'product_category');
        $brands = get_the_terms($product->ID, 'product_brand');
        $features = get_post_meta($product->ID, '_product_features', true);
        
        $product_data[] = array(
            'id' => $product->ID,
            'title' => $product->post_title,
            'description' => $product->post_excerpt ?: substr(strip_tags($product->post_content), 0, 150) . '...',
            'permalink' => get_permalink($product->ID),
            'thumbnail' => get_the_post_thumbnail_url($product->ID, 'medium'),
            'categories' => $categories ? wp_list_pluck($categories, 'slug') : array(),
            'category_names' => $categories ? wp_list_pluck($categories, 'name') : array(),
            'brands' => $brands ? wp_list_pluck($brands, 'slug') : array(),
            'brand_names' => $brands ? wp_list_pluck($brands, 'name') : array(),
            'features' => $features ? array_filter(explode("\n", $features)) : array(),
            'price' => get_post_meta($product->ID, '_product_price', true),
            'icon' => get_post_meta($product->ID, '_product_icon', true),
            'color_primary' => get_post_meta($product->ID, '_product_color_primary', true),
            'color_secondary' => get_post_meta($product->ID, '_product_color_secondary', true),
            'warranty' => get_post_meta($product->ID, '_product_warranty', true),
            'delivery_time' => get_post_meta($product->ID, '_product_delivery_time', true),
            'certification' => get_post_meta($product->ID, '_product_certification', true),
        );
    }
    
    return $product_data;
}

// 3. 產品自定義欄位
function vortexeco_product_meta_boxes() {
    add_meta_box(
        'product_details',
        'Product Details',
        'vortexeco_product_details_callback',
        'vortex_products'
    );
}
add_action('add_meta_boxes', 'vortexeco_product_meta_boxes');

function vortexeco_product_details_callback($post) {
    wp_nonce_field('vortexeco_save_product', 'product_nonce');
    
    $price = get_post_meta($post->ID, '_product_price', true);
    $features = get_post_meta($post->ID, '_product_features', true);
    $specifications = get_post_meta($post->ID, '_product_specifications', true);
    $icon = get_post_meta($post->ID, '_product_icon', true);
    $color_primary = get_post_meta($post->ID, '_product_color_primary', true);
    $color_secondary = get_post_meta($post->ID, '_product_color_secondary', true);
    $warranty = get_post_meta($post->ID, '_product_warranty', true);
    $delivery_time = get_post_meta($post->ID, '_product_delivery_time', true);
    $certification = get_post_meta($post->ID, '_product_certification', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="product_price">Price (Optional)</label></th>
            <td><input type="text" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" placeholder="Contact for pricing" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_features">Key Features (one per line)</label></th>
            <td><textarea id="product_features" name="product_features" rows="5" style="width: 100%;"><?php echo esc_textarea($features); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="product_specifications">Technical Specifications</label></th>
            <td><textarea id="product_specifications" name="product_specifications" rows="5" style="width: 100%;"><?php echo esc_textarea($specifications); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="product_icon">Product Icon</label></th>
            <td><input type="text" id="product_icon" name="product_icon" value="<?php echo esc_attr($icon); ?>" placeholder="🔧 or text" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_color_primary">Primary Color</label></th>
            <td><input type="color" id="product_color_primary" name="product_color_primary" value="<?php echo esc_attr($color_primary ?: '#1263A0'); ?>" /></td>
        </tr>
        <tr>
            <th><label for="product_color_secondary">Secondary Color</label></th>
            <td><input type="color" id="product_color_secondary" name="product_color_secondary" value="<?php echo esc_attr($color_secondary ?: '#00A8E6'); ?>" /></td>
        </tr>
        <tr>
            <th><label for="product_warranty">Warranty Period</label></th>
            <td><input type="text" id="product_warranty" name="product_warranty" value="<?php echo esc_attr($warranty ?: '24 months'); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_delivery_time">Delivery Time</label></th>
            <td><input type="text" id="product_delivery_time" name="product_delivery_time" value="<?php echo esc_attr($delivery_time ?: '2-4 weeks'); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_certification">Certification</label></th>
            <td><input type="text" id="product_certification" name="product_certification" value="<?php echo esc_attr($certification ?: 'CE/ISO'); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

function vortexeco_save_product_meta($post_id) {
    if (!isset($_POST['product_nonce']) || !wp_verify_nonce($_POST['product_nonce'], 'vortexeco_save_product')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    $fields = array(
        'product_price', 'product_features', 'product_specifications', 
        'product_icon', 'product_color_primary', 'product_color_secondary',
        'product_warranty', 'product_delivery_time', 'product_certification'
    );
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            if (strpos($field, 'color') !== false) {
                update_post_meta($post_id, '_' . $field, sanitize_hex_color($_POST[$field]));
            } elseif ($field === 'product_features' || $field === 'product_specifications') {
                update_post_meta($post_id, '_' . $field, sanitize_textarea_field($_POST[$field]));
            } else {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'vortexeco_save_product_meta');

// 4. 管理員界面
function vortexeco_admin_menu() {
    add_menu_page(
        'VortexEco Manager',
        'VortexEco',
        'manage_options',
        'vortexeco-manager',
        'vortexeco_admin_page',
        'dashicons-admin-tools',
        3
    );
    
    add_submenu_page(
        'vortexeco-manager',
        'Quick Add Product',
        'Quick Add Product',
        'manage_options',
        'vortexeco-quick-add',
        'vortexeco_quick_add_page'
    );
}
add_action('admin_menu', 'vortexeco_admin_menu');

function vortexeco_admin_page() {
    ?>
    <div class="wrap">
        <h1>VortexEco Content Manager</h1>
        
        <div class="card" style="max-width: 800px;">
            <h2>Content Statistics</h2>
            
            <?php
            $product_count = wp_count_posts('vortex_products')->publish;
            $article_count = wp_count_posts('post')->publish;
            $page_count = wp_count_posts('page')->publish;
            ?>
            
            <table class="widefat">
                <tr>
                    <td><strong>Products:</strong></td>
                    <td><?php echo $product_count; ?></td>
                    <td><a href="<?php echo admin_url('edit.php?post_type=vortex_products'); ?>" class="button">Manage</a></td>
                </tr>
                <tr>
                    <td><strong>Articles:</strong></td>
                    <td><?php echo $article_count; ?></td>
                    <td><a href="<?php echo admin_url('edit.php'); ?>" class="button">Manage</a></td>
                </tr>
                <tr>
                    <td><strong>Pages:</strong></td>
                    <td><?php echo $page_count; ?></td>
                    <td><a href="<?php echo admin_url('edit.php?post_type=page'); ?>" class="button">Manage</a></td>
                </tr>
            </table>
        </div>
        
        <div class="card" style="max-width: 800px; margin-top: 20px;">
            <h2>Quick Actions</h2>
            <p>
                <a href="<?php echo admin_url('post-new.php?post_type=vortex_products'); ?>" class="button button-primary">Add New Product</a>
                <a href="<?php echo admin_url('post-new.php'); ?>" class="button button-primary">Add New Article</a>
                <a href="<?php echo admin_url('customize.php'); ?>" class="button">Customize Theme</a>
            </p>
        </div>
    </div>
    <?php
}

function vortexeco_quick_add_page() {
    if (isset($_POST['submit'])) {
        $product_data = array(
            'post_title' => sanitize_text_field($_POST['product_title']),
            'post_content' => wp_kses_post($_POST['product_description']),
            'post_excerpt' => sanitize_text_field($_POST['product_excerpt']),
            'post_status' => 'publish',
            'post_type' => 'vortex_products'
        );
        
        $product_id = wp_insert_post($product_data);
        
        if ($product_id) {
            // 儲存自定義欄位
            update_post_meta($product_id, '_product_price', sanitize_text_field($_POST['product_price']));
            update_post_meta($product_id, '_product_features', sanitize_textarea_field($_POST['product_features']));
            update_post_meta($product_id, '_product_icon', sanitize_text_field($_POST['product_icon']));
            update_post_meta($product_id, '_product_color_primary', sanitize_hex_color($_POST['product_color_primary']));
            
            // 設定分類
            if (!empty($_POST['product_category'])) {
                wp_set_object_terms($product_id, intval($_POST['product_category']), 'product_category');
            }
            
            // 設定品牌
            if (!empty($_POST['product_brand'])) {
                wp_set_object_terms($product_id, intval($_POST['product_brand']), 'product_brand');
            }
            
            echo '<div class="notice notice-success"><p>Product added successfully! <a href="' . get_edit_post_link($product_id) . '">Edit Product</a></p></div>';
        }
    }
    
    $categories = get_terms(array('taxonomy' => 'product_category', 'hide_empty' => false));
    $brands = get_terms(array('taxonomy' => 'product_brand', 'hide_empty' => false));
    ?>
    
    <div class="wrap">
        <h1>Quick Add Product</h1>
        
        <form method="post" style="max-width: 800px;">
            <table class="form-table">
                <tr>
                    <th><label for="product_title">Product Name *</label></th>
                    <td><input type="text" id="product_title" name="product_title" required class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="product_excerpt">Short Description</label></th>
                    <td><input type="text" id="product_excerpt" name="product_excerpt" class="large-text" /></td>
                </tr>
                <tr>
                    <th><label for="product_description">Full Description</label></th>
                    <td><textarea id="product_description" name="product_description" rows="5" class="large-text"></textarea></td>
                </tr>
                <tr>
                    <th><label for="product_category">Category</label></th>
                    <td>
                        <select id="product_category" name="product_category">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="product_brand">Brand</label></th>
                    <td>
                        <select id="product_brand" name="product_brand">
                            <option value="">Select Brand</option>
                            <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand->term_id; ?>"><?php echo $brand->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="product_features">Key Features (one per line)</label></th>
                    <td><textarea id="product_features" name="product_features" rows="4" class="large-text"></textarea></td>
                </tr>
                <tr>
                    <th><label for="product_icon">Product Icon</label></th>
                    <td><input type="text" id="product_icon" name="product_icon" placeholder="🔧" /></td>
                </tr>
                <tr>
                    <th><label for="product_color_primary">Primary Color</label></th>
                    <td><input type="color" id="product_color_primary" name="product_color_primary" value="#1263A0" /></td>
                </tr>
                <tr>
                    <th><label for="product_price">Price (optional)</label></th>
                    <td><input type="text" id="product_price" name="product_price" placeholder="Contact for pricing" /></td>
                </tr>
            </table>
            
            <?php submit_button('Add Product'); ?>
        </form>
    </div>
    <?php
}

// 5. 初始化預設分類和品牌
function vortexeco_create_default_terms() {
    // 創建預設產品分類
    $default_categories = array(
        'turbine-parts' => 'Turbine Components',
        'ppe' => 'Safety Equipment', 
        'blade-materials' => 'Blade Materials',
        'tp-section' => 'Coatings',
        'turbine-trading' => 'Turbine Trading'
    );
    
    foreach ($default_categories as $slug => $name) {
        if (!term_exists($name, 'product_category')) {
            wp_insert_term($name, 'product_category', array('slug' => $slug));
        }
    }
    
    // 創建預設品牌
    $default_brands = array('Vestas', 'Siemens', 'GE', 'Others');
    
    foreach ($default_brands as $brand) {
        if (!term_exists($brand, 'product_brand')) {
            wp_insert_term($brand, 'product_brand');
        }
    }
}
add_action('after_switch_theme', 'vortexeco_create_default_terms');

// 6. 刷新重寫規則
function vortexeco_flush_rewrite_rules() {
    create_vortexeco_product_cpt();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'vortexeco_flush_rewrite_rules');
?>