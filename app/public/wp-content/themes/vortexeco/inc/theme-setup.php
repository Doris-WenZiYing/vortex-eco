<?php
/**
 * Theme Setup
 * 主題基本設置和支持
 */

if (!defined('ABSPATH')) exit;

/**
 * 設置主題功能
 */
function vortexeco_setup() {
    // 支持動態標題
    add_theme_support('title-tag');
    
    // 支持特色圖片
    add_theme_support('post-thumbnails');
    
    // 支持 HTML5 標記
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ));
    
    // 支持自定義背景
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // 支持自定義 Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // 註冊導航選單
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vortex-eco'),
        'footer'  => __('Footer Menu', 'vortex-eco'),
    ));
}
add_action('after_setup_theme', 'vortexeco_setup');

/**
 * 移除管理員工具列
 */
function vortexeco_remove_admin_bar() {
    if (!is_admin()) {
        show_admin_bar(false);
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('after_setup_theme', 'vortexeco_remove_admin_bar');

/**
 * 移除 WordPress 預設間距
 */
function vortexeco_force_layout() {
    echo '<style>
        #wpadminbar, .admin-bar, .wp-toolbar { display: none !important; }
        html { margin-top: 0 !important; }
        html.wp-toolbar { padding-top: 0 !important; }
        body.admin-bar { margin-top: 0 !important; padding-top: 0 !important; }
        body, html { width: 100% !important; overflow-x: hidden !important; margin: 0 !important; padding: 0 !important; }
        
        /* 針對特定頁面的容器樣式 */
        .page-template-page-market-insights .container,
        .page-template-page-contact-us .container {
            max-width: 1400px !important;
            margin: 0 auto !important;
            padding: 0 2rem !important;
        }
        
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
 * 自定義摘要長度
 */
function vortexeco_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'vortexeco_excerpt_length');

/**
 * 自定義摘要結尾
 */
function vortexeco_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'vortexeco_excerpt_more');

/**
 * 停用區塊編輯器（如需使用經典編輯器）
 */
function vortexeco_disable_block_editor($use_block_editor, $post) {
    return false;
}
// 如果需要停用區塊編輯器，取消下面這行的註解
// add_filter('use_block_editor_for_post', 'vortexeco_disable_block_editor', 10, 2);

/**
 * 移除預設 WordPress 樣式
 */
function vortexeco_dequeue_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
}
add_action('wp_enqueue_scripts', 'vortexeco_dequeue_styles', 100);

/**
 * 支持全寬和寬對齊
 */
function vortexeco_add_theme_support() {
    add_theme_support('align-wide');
    add_theme_support('align-full');
}
add_action('after_setup_theme', 'vortexeco_add_theme_support');