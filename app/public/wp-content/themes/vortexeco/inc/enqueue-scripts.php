<?php
/**
 * Enqueue Scripts and Styles
 * CSS 和 JavaScript 文件载入
 */

if (!defined('ABSPATH')) exit;

/**
 * 载入前台样式和脚本
 */
function vortexeco_scripts() {
    // 主题样式表
    wp_enqueue_style(
        'vortexeco-style', 
        get_stylesheet_uri(), 
        array(), 
        '2.0.0'
    );
    
    // Google Fonts - Inter
    wp_enqueue_style(
        'vortexeco-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', 
        array(), 
        null
    );
    
    // 主题 JavaScript（如果存在）
    if (file_exists(get_template_directory() . '/assets/js/main.js')) {
        wp_enqueue_script(
            'vortexeco-scripts', 
            get_template_directory_uri() . '/assets/js/main.js', 
            array('jquery'), 
            '2.0.0', 
            true
        );
        
        // 传递数据到 JavaScript
        wp_localize_script('vortexeco-scripts', 'vortexeco_ajax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('vortexeco_nonce'),
        ));
    }
    
    // 如果需要载入其他 CSS/JS，在此添加
}
add_action('wp_enqueue_scripts', 'vortexeco_scripts');

/**
 * 载入编辑器样式（可选）
 */
function vortexeco_editor_styles() {
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'vortexeco_editor_styles');

/**
 * 载入后台管理样式（可选）
 */
function vortexeco_admin_styles() {
    wp_enqueue_style(
        'vortexeco-admin', 
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        '2.0.0'
    );
}
add_action('admin_enqueue_scripts', 'vortexeco_admin_styles');
