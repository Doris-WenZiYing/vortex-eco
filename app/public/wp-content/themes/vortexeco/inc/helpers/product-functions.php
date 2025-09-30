<?php
/**
 * Product Helper Functions
 * 产品查询和处理辅助函数
 */

if (!defined('ABSPATH')) exit;

/**
 * 获取所有产品
 * 
 * @param array $args 查询参数
 * @return array 产品数据数组
 */
function get_vortexeco_products($args = array()) {
    $default_args = array(
        'post_type'      => 'vortex_products',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => array(),
        'tax_query'      => array(),
    );
    
    $args = wp_parse_args($args, $default_args);
    $products = get_posts($args);
    $product_data = array();
    
    foreach ($products as $product) {
        $product_data[] = vortexeco_format_product_data($product);
    }
    
    return $product_data;
}

/**
 * 获取单一产品
 * 
 * @param int $product_id 产品ID
 * @return array|false 产品数据或 false
 */
function get_vortexeco_product($product_id) {
    $product = get_post($product_id);
    
    if (!$product || $product->post_type !== 'vortex_products') {
        return false;
    }
    
    return vortexeco_format_product_data($product);
}

/**
 * 格式化产品数据
 * 
 * @param WP_Post $product 产品文章对象
 * @return array 格式化的产品数据
 */
function vortexeco_format_product_data($product) {
    $categories = get_the_terms($product->ID, 'product_category');
    $brands = get_the_terms($product->ID, 'product_brand');
    $features = get_post_meta($product->ID, '_product_features', true);
    
    return array(
        'id'                => $product->ID,
        'title'             => $product->post_title,
        'description'       => $product->post_content,
        'excerpt'           => $product->post_excerpt ?: wp_trim_words($product->post_content, 30),
        'permalink'         => get_permalink($product->ID),
        'thumbnail'         => get_the_post_thumbnail_url($product->ID, 'medium'),
        'thumbnail_large'   => get_the_post_thumbnail_url($product->ID, 'large'),
        'categories'        => $categories ? wp_list_pluck($categories, 'slug') : array(),
        'category_names'    => $categories ? wp_list_pluck($categories, 'name') : array(),
        'brands'            => $brands ? wp_list_pluck($brands, 'slug') : array(),
        'brand_names'       => $brands ? wp_list_pluck($brands, 'name') : array(),
        'features'          => $features ? array_filter(explode("\n", $features)) : array(),
        'specifications'    => get_post_meta($product->ID, '_product_specifications', true),
        'price'             => get_post_meta($product->ID, '_product_price', true),
        'icon'              => get_post_meta($product->ID, '_product_icon', true),
        'color_primary'     => get_post_meta($product->ID, '_product_color_primary', true),
        'color_secondary'   => get_post_meta($product->ID, '_product_color_secondary', true),
        'warranty'          => get_post_meta($product->ID, '_product_warranty', true),
        'delivery_time'     => get_post_meta($product->ID, '_product_delivery_time', true),
        'certification'     => get_post_meta($product->ID, '_product_certification', true),
    );
}

/**
 * 按分类获取产品
 * 
 * @param string|int $category 分类 slug 或 ID
 * @return array 产品数据数组
 */
function get_products_by_category($category) {
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'product_category',
                'field'    => is_numeric($category) ? 'term_id' : 'slug',
                'terms'    => $category,
            ),
        ),
    );
    
    return get_vortexeco_products($args);
}

/**
 * 按品牌获取产品
 * 
 * @param string|int $brand 品牌 slug 或 ID
 * @return array 产品数据数组
 */
function get_products_by_brand($brand) {
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'product_brand',
                'field'    => is_numeric($brand) ? 'term_id' : 'slug',
                'terms'    => $brand,
            ),
        ),
    );
    
    return get_vortexeco_products($args);
}

/**
 * 获取所有产品分类
 * 
 * @return array 分类数组
 */
function get_all_product_categories() {
    return get_terms(array(
        'taxonomy'   => 'product_category',
        'hide_empty' => false,
    ));
}

/**
 * 获取所有产品品牌
 * 
 * @return array 品牌数组
 */
function get_all_product_brands() {
    return get_terms(array(
        'taxonomy'   => 'product_brand',
        'hide_empty' => false,
    ));
}

/**
 * 搜索产品
 * 
 * @param string $keyword 搜索关键词
 * @return array 产品数据数组
 */
function search_vortexeco_products($keyword) {
    $args = array(
        's' => $keyword,
        'posts_per_page' => 20,
    );
    
    return get_vortexeco_products($args);
}

/**
 * 获取相关产品
 * 
 * @param int $product_id 当前产品ID
 * @param int $limit 返回数量
 * @return array 相关产品数据数组
 */
function get_related_products($product_id, $limit = 4) {
    $product = get_post($product_id);
    if (!$product) return array();
    
    // 获取当前产品的分类
    $categories = wp_get_post_terms($product_id, 'product_category', array('fields' => 'ids'));
    
    if (empty($categories)) return array();
    
    $args = array(
        'posts_per_page' => $limit,
        'post__not_in'   => array($product_id),
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_category',
                'field'    => 'term_id',
                'terms'    => $categories,
            ),
        ),
    );
    
    return get_vortexeco_products($args);
}