<?php
/**
 * Insight Article Helper Functions
 * 市场洞察文章查询和处理辅助函数
 */

if (!defined('ABSPATH')) exit;

/**
 * 获取所有洞察文章
 * 
 * @param array $args 查询参数
 * @return array 文章数据数组
 */
function get_insight_articles($args = array()) {
    $default_args = array(
        'post_type'      => 'insight_articles',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    
    $args = wp_parse_args($args, $default_args);
    $articles = get_posts($args);
    $article_data = array();
    
    foreach ($articles as $article) {
        $article_data[] = vortexeco_format_insight_data($article);
    }
    
    return $article_data;
}

/**
 * 获取单一文章
 * 
 * @param int $article_id 文章ID
 * @return array|false 文章数据或 false
 */
function get_insight_article($article_id) {
    $article = get_post($article_id);
    
    if (!$article || $article->post_type !== 'insight_articles') {
        return false;
    }
    
    return vortexeco_format_insight_data($article);
}

/**
 * 格式化文章数据
 * 
 * @param WP_Post $article 文章对象
 * @return array 格式化的文章数据
 */
function vortexeco_format_insight_data($article) {
    $categories = get_the_terms($article->ID, 'insight_category');
    $read_time = get_post_meta($article->ID, '_read_time', true);
    $author_name = get_post_meta($article->ID, '_author_name', true);
    $featured = get_post_meta($article->ID, '_featured_article', true);
    
    return array(
        'id'             => $article->ID,
        'title'          => $article->post_title,
        'excerpt'        => $article->post_excerpt ?: wp_trim_words($article->post_content, 30),
        'content'        => $article->post_content,
        'permalink'      => get_permalink($article->ID),
        'thumbnail'      => get_the_post_thumbnail_url($article->ID, 'large'),
        'thumbnail_full' => get_the_post_thumbnail_url($article->ID, 'full'),
        'date'           => get_the_date('F j, Y', $article->ID),
        'date_cn'        => get_the_date('Y年n月j日', $article->ID),
        'categories'     => $categories ? wp_list_pluck($categories, 'slug') : array(),
        'category_names' => $categories ? wp_list_pluck($categories, 'name') : array(),
        'read_time'      => $read_time ?: 5,
        'author'         => $author_name ?: 'VortexEco 团队',
        'featured'       => $featured == '1',
    );
}

/**
 * 按分类获取文章
 * 
 * @param string|int $category 分类 slug 或 ID
 * @return array 文章数据数组
 */
function get_insights_by_category($category) {
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'insight_category',
                'field'    => is_numeric($category) ? 'term_id' : 'slug',
                'terms'    => $category,
            ),
        ),
    );
    
    return get_insight_articles($args);
}

/**
 * 获取精选文章
 * 
 * @param int $limit 返回数量
 * @return array 精选文章数据数组
 */
function get_featured_insights($limit = 3) {
    $args = array(
        'posts_per_page' => $limit,
        'meta_query'     => array(
            array(
                'key'   => '_featured_article',
                'value' => '1',
            ),
        ),
    );
    
    return get_insight_articles($args);
}

/**
 * 获取最新文章
 * 
 * @param int $limit 返回数量
 * @return array 最新文章数据数组
 */
function get_latest_insights($limit = 5) {
    $args = array(
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    
    return get_insight_articles($args);
}

/**
 * 获取所有文章分类
 * 
 * @return array 分类数组
 */
function get_all_insight_categories() {
    return get_terms(array(
        'taxonomy'   => 'insight_category',
        'hide_empty' => false,
    ));
}

/**
 * 搜索文章
 * 
 * @param string $keyword 搜索关键词
 * @return array 文章数据数组
 */
function search_insight_articles($keyword) {
    $args = array(
        's'              => $keyword,
        'posts_per_page' => 20,
    );
    
    return get_insight_articles($args);
}

/**
 * 获取相关文章
 * 
 * @param int $article_id 当前文章ID
 * @param int $limit 返回数量
 * @return array 相关文章数据数组
 */
function get_related_insights($article_id, $limit = 3) {
    $article = get_post($article_id);
    if (!$article) return array();
    
    // 获取当前文章的分类
    $categories = wp_get_post_terms($article_id, 'insight_category', array('fields' => 'ids'));
    
    if (empty($categories)) {
        // 如果没有分类，返回最新的文章
        return get_latest_insights($limit);
    }
    
    $args = array(
        'posts_per_page' => $limit,
        'post__not_in'   => array($article_id),
        'tax_query'      => array(
            array(
                'taxonomy' => 'insight_category',
                'field'    => 'term_id',
                'terms'    => $categories,
            ),
        ),
    );
    
    return get_insight_articles($args);
}

/**
 * 获取文章统计信息
 * 
 * @return array 统计数据
 */
function get_insight_statistics() {
    $total = wp_count_posts('insight_articles')->publish;
    $categories = get_terms(array(
        'taxonomy' => 'insight_category',
        'hide_empty' => false,
    ));
    
    $stats = array(
        'total_articles' => $total,
        'total_categories' => count($categories),
        'featured_count' => 0,
    );
    
    // 计算精选文章数量
    $featured_query = new WP_Query(array(
        'post_type' => 'insight_articles',
        'meta_query' => array(
            array(
                'key' => '_featured_article',
                'value' => '1',
            ),
        ),
        'fields' => 'ids',
    ));
    $stats['featured_count'] = $featured_query->found_posts;
    
    return $stats;
}