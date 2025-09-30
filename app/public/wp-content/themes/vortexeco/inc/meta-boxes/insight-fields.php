
<?php
/**
 * Insight Article Custom Fields
 * 市场洞察文章自定义栏位
 */

if (!defined('ABSPATH')) exit;

/**
 * 添加文章详细资料 Meta Box
 */
function insight_article_meta_boxes() {
    add_meta_box(
        'insight_details',
        '文章详细资料',
        'insight_details_callback',
        'insight_articles',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'insight_article_meta_boxes');

/**
 * 渲染文章栏位
 */
function insight_details_callback($post) {
    wp_nonce_field('save_insight_details', 'insight_nonce');
    
    $read_time = get_post_meta($post->ID, '_read_time', true);
    $featured = get_post_meta($post->ID, '_featured_article', true);
    $author_name = get_post_meta($post->ID, '_author_name', true);
    
    ?>
    <style>
        .insight-field { margin-bottom: 15px; }
        .insight-field label { 
            display: block; 
            font-weight: 600; 
            margin-bottom: 5px; 
        }
        .insight-field input[type="number"],
        .insight-field input[type="text"] { 
            width: 100%; 
        }
        .insight-field .description { 
            color: #666; 
            font-size: 12px; 
            margin-top: 3px; 
        }
        .featured-badge {
            display: inline-block;
            background: #ffd700;
            color: #000;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: 600;
            margin-left: 5px;
        }
    </style>
    
    <div class="insight-field">
        <label for="read_time">阅读时间（分钟）</label>
        <input type="number" 
               id="read_time" 
               name="read_time" 
               value="<?php echo esc_attr($read_time ?: '5'); ?>" 
               min="1" 
               max="60" />
        <p class="description">预估阅读所需时间</p>
    </div>
    
    <div class="insight-field">
        <label for="author_name">作者名称</label>
        <input type="text" 
               id="author_name" 
               name="author_name" 
               value="<?php echo esc_attr($author_name ?: 'VortexEco 团队'); ?>" />
        <p class="description">显示的作者名称</p>
    </div>
    
    <div class="insight-field">
        <label>
            <input type="checkbox" 
                   id="featured_article" 
                   name="featured_article" 
                   value="1" 
                   <?php checked($featured, '1'); ?> />
            <strong>精选文章</strong>
            <?php if ($featured == '1'): ?>
                <span class="featured-badge">⭐ 精选</span>
            <?php endif; ?>
        </label>
        <p class="description">勾选后会在洞察页面置顶显示</p>
    </div>
    
    <div class="insight-field" style="border-top: 1px solid #ddd; padding-top: 15px; margin-top: 15px;">
        <p style="margin: 0; color: #666; font-size: 12px;">
            <strong>💡 提示：</strong><br>
            • 特色图片会作为文章缩图<br>
            • 建议尺寸 1200x675px<br>
            • 摘要会显示在列表页
        </p>
    </div>
    <?php
}

/**
 * 储存文章 Meta 资料
 */
function save_insight_details($post_id) {
    // 安全检查
    if (!isset($_POST['insight_nonce']) || 
        !wp_verify_nonce($_POST['insight_nonce'], 'save_insight_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // 储存阅读时间
    if (isset($_POST['read_time'])) {
        update_post_meta($post_id, '_read_time', intval($_POST['read_time']));
    }
    
    // 储存作者名称
    if (isset($_POST['author_name'])) {
        update_post_meta($post_id, '_author_name', sanitize_text_field($_POST['author_name']));
    }
    
    // 储存精选状态
    if (isset($_POST['featured_article'])) {
        update_post_meta($post_id, '_featured_article', '1');
    } else {
        delete_post_meta($post_id, '_featured_article');
    }
}
add_action('save_post', 'save_insight_details');

/**
 * 在文章列表显示额外栏位
 */
function insight_custom_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['featured'] = '精选';
            $new_columns['read_time'] = '阅读时间';
        }
    }
    return $new_columns;
}
add_filter('manage_insight_articles_posts_columns', 'insight_custom_columns');

/**
 * 显示自定义栏位内容
 */
function insight_custom_column_content($column, $post_id) {
    switch ($column) {
        case 'featured':
            $featured = get_post_meta($post_id, '_featured_article', true);
            if ($featured == '1') {
                echo '<span style="background: #ffd700; padding: 2px 8px; border-radius: 3px; font-size: 11px; font-weight: 600;">⭐ 精选</span>';
            } else {
                echo '—';
            }
            break;
        case 'read_time':
            $read_time = get_post_meta($post_id, '_read_time', true);
            echo $read_time ? $read_time . ' 分钟' : '—';
            break;
    }
}
add_action('manage_insight_articles_posts_custom_column', 'insight_custom_column_content', 10, 2);