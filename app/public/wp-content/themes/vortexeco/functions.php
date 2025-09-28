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
