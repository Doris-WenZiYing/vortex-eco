<?php
/**
 * Insights Custom Post Type
 * 市场洞察文章类型
 */

if (!defined('ABSPATH')) exit;

/**
 * 注册市场洞察文章类型
 */
function create_insight_articles_cpt() {
    register_post_type('insight_articles', array(
        'labels' => array(
            'name'               => __('市场洞察', 'vortex-eco'),
            'singular_name'      => __('洞察文章', 'vortex-eco'),
            'add_new'            => __('新增文章', 'vortex-eco'),
            'add_new_item'       => __('新增洞察文章', 'vortex-eco'),
            'edit_item'          => __('编辑文章', 'vortex-eco'),
            'view_item'          => __('查看文章', 'vortex-eco'),
            'search_items'       => __('搜寻文章', 'vortex-eco'),
            'not_found'          => __('找不到文章', 'vortex-eco'),
        ),
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'),
        'menu_icon'          => 'dashicons-analytics',
        'show_in_rest'       => true,
        'rewrite'            => array('slug' => 'insights'),
        'menu_position'      => 6,
        'show_in_admin_bar'  => true,
    ));
    
    // 文章分类
    register_taxonomy('insight_category', 'insight_articles', array(
        'labels' => array(
            'name'          => __('文章分类', 'vortex-eco'),
            'singular_name' => __('分类', 'vortex-eco'),
            'all_items'     => __('所有分类', 'vortex-eco'),
            'edit_item'     => __('编辑分类', 'vortex-eco'),
            'add_new_item'  => __('新增分类', 'vortex-eco'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'insight-category'),
    ));
}
add_action('init', 'create_insight_articles_cpt');

/**
 * 创建预设文章分类
 */
function create_default_insight_categories() {
    $categories = array(
        'market-analysis' => '市场分析',
        'technology'      => '技术创新',
        'policy'          => '政策法规',
        'industry-news'   => '产业新闻'
    );
    
    foreach ($categories as $slug => $name) {
        if (!term_exists($name, 'insight_category')) {
            wp_insert_term($name, 'insight_category', array('slug' => $slug));
        }
    }
}
add_action('after_switch_theme', 'create_default_insight_categories');