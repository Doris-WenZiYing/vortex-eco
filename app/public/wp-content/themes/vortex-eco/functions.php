<?php
/**
 * VORTEX-ECO Theme Functions
 * Professional Wind Energy Consulting WordPress Theme
 * 
 * @package VortexEco
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme constants
define('VORTEXECO_VERSION', '1.0.0');
define('VORTEXECO_THEME_DIR', get_template_directory());
define('VORTEXECO_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function vortexeco_setup() {
    // Make theme available for translation
    load_theme_textdomain('vortex-eco', get_template_directory() . '/languages');
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Custom image sizes
    add_image_size('vortex-hero', 1920, 1080, true);
    add_image_size('vortex-service', 400, 300, true);
    add_image_size('vortex-blog', 600, 400, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vortex-eco'),
        'footer'  => __('Footer Menu', 'vortex-eco'),
        'social'  => __('Social Menu', 'vortex-eco'),
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Custom background support
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Gutenberg support
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // Custom header support
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '1263A0',
        'width'              => 1920,
        'height'             => 1080,
        'flex-height'        => true,
        'wp-head-callback'   => 'vortexeco_header_style',
    ));
}
add_action('after_setup_theme', 'vortexeco_setup');

/**
 * Set content width
 */
function vortexeco_content_width() {
    $GLOBALS['content_width'] = apply_filters('vortexeco_content_width', 800);
}
add_action('after_setup_theme', 'vortexeco_content_width', 0);

/**
 * Register widget areas
 */
function vortexeco_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'vortex-eco'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your primary sidebar.', 'vortex-eco'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'vortex-eco'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'vortex-eco'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'vortex-eco'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'vortex-eco'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'vortex-eco'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'vortex-eco'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 4', 'vortex-eco'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in the fourth footer column.', 'vortex-eco'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'vortexeco_widgets_init');

/**
 * Enqueue scripts and styles
 */
function vortexeco_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'vortexeco-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'vortexeco-style',
        get_stylesheet_uri(),
        array(),
        VORTEXECO_VERSION
    );
    
    // Add RTL support
    wp_style_add_data('vortexeco-style', 'rtl', 'replace');
    
    // Components CSS
    wp_enqueue_style(
        'vortexeco-components',
        get_template_directory_uri() . '/assets/css/components.css',
        array('vortexeco-style'),
        VORTEXECO_VERSION
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'vortexeco-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        VORTEXECO_VERSION,
        true
    );
    
    // Animations JavaScript
    wp_enqueue_script(
        'vortexeco-animations',
        get_template_directory_uri() . '/assets/js/animations.js',
        array('jquery', 'vortexeco-main'),
        VORTEXECO_VERSION,
        true
    );
    
    // Localize script
    wp_localize_script('vortexeco-main', 'vortexeco_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('vortexeco_nonce'),
        'theme_uri' => get_template_directory_uri(),
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Add custom CSS from customizer
    $custom_css = vortexeco_get_custom_css();
    if ($custom_css) {
        wp_add_inline_style('vortexeco-style', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'vortexeco_scripts');

/**
 * Admin styles and scripts
 */
function vortexeco_admin_scripts($hook) {
    wp_enqueue_style(
        'vortexeco-admin',
        get_template_directory_uri() . '/assets/css/admin-style.css',
        array(),
        VORTEXECO_VERSION
    );
    
    wp_enqueue_script(
        'vortexeco-admin',
        get_template_directory_uri() . '/assets/js/admin.js',
        array('jquery'),
        VORTEXECO_VERSION,
        true
    );
}
add_action('admin_enqueue_scripts', 'vortexeco_admin_scripts');

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom header implementation
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Generate custom CSS from customizer options
 */
function vortexeco_get_custom_css() {
    $primary_color = get_theme_mod('primary_color', '#1263A0');
    $secondary_color = get_theme_mod('secondary_color', '#0B4D7D');
    $accent_color = get_theme_mod('accent_color', '#00A8E6');
    
    $hero_bg_image = get_theme_mod('hero_background_image');
    $hero_overlay_opacity = get_theme_mod('hero_overlay_opacity', 0.9);
    
    $css = ":root {
        --primary-color: {$primary_color};
        --secondary-color: {$secondary_color};
        --accent-color: {$accent_color};
        --gradient-primary: linear-gradient(135deg, {$primary_color} 0%, {$secondary_color} 100%);
        --gradient-accent: linear-gradient(135deg, {$accent_color} 0%, {$primary_color} 100%);
    }";
    
    if ($hero_bg_image) {
        $css .= ".hero-section {
            background-image: linear-gradient(rgba(18, 99, 160, {$hero_overlay_opacity}), rgba(11, 77, 125, {$hero_overlay_opacity})), url({$hero_bg_image});
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }";
    }
    
    return $css;
}

/**
 * Custom excerpt length
 */
function vortexeco_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'vortexeco_excerpt_length');

/**
 * Custom excerpt more
 */
function vortexeco_excerpt_more($more) {
    if (!is_admin()) {
        return '...';
    }
    return $more;
}
add_filter('excerpt_more', 'vortexeco_excerpt_more');

/**
 * Add custom body classes
 */
function vortexeco_body_classes($classes) {
    // Add class if we're viewing the Customizer for easier styling
    if (is_customize_preview()) {
        $classes[] = 'customizer-preview';
    }
    
    // Add class for homepage
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    // Add has-sidebar class
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }
    
    return $classes;
}
add_filter('body_class', 'vortexeco_body_classes');

/**
 * Custom logo setup
 */
function vortexeco_custom_logo_setup() {
    $defaults = array(
        'height'               => 60,
        'width'                => 200,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'vortexeco_custom_logo_setup');

/**
 * Add custom header style
 */
function vortexeco_header_style() {
    $header_text_color = get_header_textcolor();
    
    if ('blank' === $header_text_color) {
        echo '<style type="text/css">
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
        </style>';
        return;
    }
    
    echo '<style type="text/css">
    .site-title a,
    .site-description {
        color: #' . esc_attr($header_text_color) . ';
    }
    </style>';
}

/**
 * Pagination function
 */
function vortexeco_pagination() {
    global $wp_query;
    
    $big = 999999999;
    
    $paginate_links = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => __('« Previous', 'vortex-eco'),
        'next_text' => __('Next »', 'vortex-eco'),
        'type'      => 'list',
        'end_size'  => 1,
        'mid_size'  => 2,
    ));
    
    if ($paginate_links) {
        echo '<nav class="pagination" aria-label="' . esc_attr__('Posts pagination', 'vortex-eco') . '">';
        echo $paginate_links;
        echo '</nav>';
    }
}

/**
 * Related posts function
 */
function vortexeco_related_posts($post_id = null, $number_posts = 3) {
    if (!$post_id) {
        global $post;
        $post_id = $post->ID;
    }
    
    $categories = get_the_category($post_id);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $category) {
            $category_ids[] = $category->term_id;
        }
        
        $args = array(
            'category__in'        => $category_ids,
            'post__not_in'        => array($post_id),
            'posts_per_page'      => $number_posts,
            'ignore_sticky_posts' => true,
            'orderby'             => 'rand',
        );
        
        $related_posts = new WP_Query($args);
        
        if ($related_posts->have_posts()) {
            echo '<div class="related-posts">';
            echo '<h3 class="related-posts-title">' . esc_html__('Related Articles', 'vortex-eco') . '</h3>';
            echo '<div class="related-posts-grid">';
            
            while ($related_posts->have_posts()) {
                $related_posts->the_post();
                echo '<article class="related-post">';
                
                if (has_post_thumbnail()) {
                    echo '<div class="related-post-thumbnail">';
                    echo '<a href="' . esc_url(get_permalink()) . '">';
                    the_post_thumbnail('vortex-blog');
                    echo '</a>';
                    echo '</div>';
                }
                
                echo '<div class="related-post-content">';
                echo '<h4><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h4>';
                echo '<div class="related-post-meta">';
                echo '<span class="post-date">' . get_the_date() . '</span>';
                echo '</div>';
                echo '</div>';
                echo '</article>';
            }
            
            echo '</div>';
            echo '</div>';
            
            wp_reset_postdata();
        }
    }
}

/**
 * Social share buttons
 */
function vortexeco_social_share() {
    global $post;
    
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());
    
    echo '<div class="social-share">';
    echo '<h4>' . esc_html__('Share this article:', 'vortex-eco') . '</h4>';
    echo '<div class="social-share-buttons">';
    
    // Facebook
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank" rel="noopener" class="social-btn facebook">';
    echo '<i class="fab fa-facebook-f"></i> Facebook';
    echo '</a>';
    
    // Twitter
    echo '<a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '" target="_blank" rel="noopener" class="social-btn twitter">';
    echo '<i class="fab fa-twitter"></i> Twitter';
    echo '</a>';
    
    // LinkedIn
    echo '<a href="https://www.linkedin.com/sharing/share-offsite/?url=' . $url . '" target="_blank" rel="noopener" class="social-btn linkedin">';
    echo '<i class="fab fa-linkedin-in"></i> LinkedIn';
    echo '</a>';
    
    echo '</div>';
    echo '</div>';
}

/**
 * Comment form customization
 */
function vortexeco_comment_form($args) {
    $args['class_form'] = 'comment-form';
    $args['class_submit'] = 'btn btn-primary';
    $args['title_reply'] = __('Leave a Comment', 'vortex-eco');
    $args['comment_notes_before'] = '';
    $args['comment_notes_after'] = '';
    
    return $args;
}
add_filter('comment_form_defaults', 'vortexeco_comment_form');

/**
 * Responsive images function
 */
function vortexeco_responsive_image($attachment_id, $size = 'full', $classes = '') {
    $image_data = wp_get_attachment_image_src($attachment_id, $size);
    if (!$image_data) return;
    
    $image_url = $image_data[0];
    $image_width = $image_data[1];
    $image_height = $image_data[2];
    
    $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
    $title = get_the_title($attachment_id);
    
    echo '<img src="' . esc_url($image_url) . '"';
    echo ' width="' . esc_attr($image_width) . '"';
    echo ' height="' . esc_attr($image_height) . '"';
    echo ' alt="' . esc_attr($alt_text) . '"';
    echo ' title="' . esc_attr($title) . '"';
    if ($classes) echo ' class="' . esc_attr($classes) . '"';
    echo ' loading="lazy">';
}

/**
 * Security enhancements
 */
// Remove version info from head and feeds
function vortexeco_remove_version() {
    return '';
}
add_filter('the_generator', 'vortexeco_remove_version');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove unnecessary head links
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/**
 * Performance optimizations
 */
// Remove emoji scripts
function vortexeco_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'vortexeco_disable_emojis');

// Remove query strings from static resources
function vortexeco_remove_query_strings($src) {
    $parts = explode('?ver', $src);
    return $parts[0];
}
add_filter('style_loader_src', 'vortexeco_remove_query_strings', 10, 1);
add_filter('script_loader_src', 'vortexeco_remove_query_strings', 10, 1);

/**
 * Custom post types (if needed)
 */
function vortexeco_register_post_types() {
    // Services post type
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Services', 'vortex-eco'),
            'singular_name' => __('Service', 'vortex-eco'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-tools',
    ));
    
    // Team members post type
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team Members', 'vortex-eco'),
            'singular_name' => __('Team Member', 'vortex-eco'),
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
    ));
}
// Uncomment if you want custom post types
// add_action('init', 'vortexeco_register_post_types');

/**
 * Theme activation hook
 */
function vortexeco_after_theme_activation() {
    // Set default customizer values
    set_theme_mod('primary_color', '#1263A0');
    set_theme_mod('secondary_color', '#0B4D7D');
    set_theme_mod('accent_color', '#00A8E6');
    
    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'vortexeco_after_theme_activation');
?>