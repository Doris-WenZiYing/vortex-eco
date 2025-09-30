<?php
/**
 * Products Custom Post Type
 * 產品自定義文章類型
 */

if (!defined('ABSPATH')) exit;

/**
 * 註冊產品自定義文章類型
 */
function create_vortexeco_product_cpt() {
    register_post_type('vortex_products', array(
        'labels' => array(
            'name'               => __('風電產品', 'vortex-eco'),
            'singular_name'      => __('產品', 'vortex-eco'),
            'add_new'            => __('新增產品', 'vortex-eco'),
            'add_new_item'       => __('新增產品', 'vortex-eco'),
            'edit_item'          => __('編輯產品', 'vortex-eco'),
            'view_item'          => __('查看產品', 'vortex-eco'),
            'search_items'       => __('搜尋產品', 'vortex-eco'),
            'not_found'          => __('找不到產品', 'vortex-eco'),
        ),
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-admin-tools',
        'show_in_rest'       => true,
        'rewrite'            => array('slug' => 'wind-products'),
        'show_in_admin_bar'  => true,
        'menu_position'      => 5,
    ));
    
    // 產品分類（階層式，類似文章分類）
    register_taxonomy('product_category', 'vortex_products', array(
        'labels' => array(
            'name'          => __('產品分類', 'vortex-eco'),
            'singular_name' => __('分類', 'vortex-eco'),
            'all_items'     => __('所有分類', 'vortex-eco'),
            'edit_item'     => __('編輯分類', 'vortex-eco'),
            'add_new_item'  => __('新增分類', 'vortex-eco'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'meta_box_cb'       => 'post_categories_meta_box',
        'rewrite'           => array('slug' => 'product-category'),
    ));
    
    // 產品品牌（非階層式，類似標籤）
    register_taxonomy('product_brand', 'vortex_products', array(
        'labels' => array(
            'name'          => __('品牌', 'vortex-eco'),
            'singular_name' => __('品牌', 'vortex-eco'),
            'all_items'     => __('所有品牌', 'vortex-eco'),
            'edit_item'     => __('編輯品牌', 'vortex-eco'),
            'add_new_item'  => __('新增品牌', 'vortex-eco'),
        ),
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'meta_box_cb'       => 'post_tags_meta_box',
        'rewrite'           => array('slug' => 'brand'),
    ));
}
add_action('init', 'create_vortexeco_product_cpt', 5);

/**
 * 創建預設產品分類和品牌
 */
function vortexeco_create_default_product_terms() {
    // 預設產品分類
    $default_categories = array(
        'turbine-parts'    => '渦輪機組件',
        'ppe'              => '安全防護裝備', 
        'blade-materials'  => '葉片材料',
        'tp-section'       => '塗料系統',
        'turbine-trading'  => '風機交易'
    );
    
    foreach ($default_categories as $slug => $name) {
        if (!term_exists($name, 'product_category')) {
            wp_insert_term($name, 'product_category', array('slug' => $slug));
        }
    }
    
    // 預設品牌
    $default_brands = array('Vestas', 'Siemens', 'GE', 'Goldwind', 'Others');
    
    foreach ($default_brands as $brand) {
        if (!term_exists($brand, 'product_brand')) {
            wp_insert_term($brand, 'product_brand');
        }
    }
}
add_action('after_switch_theme', 'vortexeco_create_default_product_terms');

/**
 * 修正分類 Meta Box 顯示
 */
function vortexeco_fix_product_taxonomy_metabox() {
    remove_meta_box('product_categorydiv', 'vortex_products', 'side');
    remove_meta_box('tagsdiv-product_brand', 'vortex_products', 'side');
    
    add_meta_box(
        'product_categorydiv',
        '產品分類',
        'post_categories_meta_box',
        'vortex_products',
        'side',
        'default',
        array('taxonomy' => 'product_category')
    );
    
    add_meta_box(
        'tagsdiv-product_brand',
        '品牌',
        'post_tags_meta_box',
        'vortex_products',
        'side',
        'default',
        array('taxonomy' => 'product_brand')
    );
}
add_action('add_meta_boxes', 'vortexeco_fix_product_taxonomy_metabox', 99);

/**
 * 隱藏自定義欄位 Meta Box（已有專用 Meta Box）
 */
function vortexeco_hide_custom_fields_metabox() {
    remove_meta_box('postcustom', 'vortex_products', 'normal');
}
add_action('admin_menu', 'vortexeco_hide_custom_fields_metabox');

/**
 * 刷新 Rewrite Rules
 */
function vortexeco_flush_product_rewrite_rules() {
    create_vortexeco_product_cpt();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'vortexeco_flush_product_rewrite_rules');