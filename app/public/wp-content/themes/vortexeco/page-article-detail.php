<?php
/**
 * Template Name: Article Detail
 * 
 * @package VortexEco
 */

get_header(); 

// 從 URL 獲取文章 ID
$article_id = isset($_GET['article']) ? intval($_GET['article']) : 0;

if (!$article_id) {
    echo '<div style="padding: 4rem 2rem; text-align: center; margin-top: 80px;">';
    echo '<h1>找不到文章</h1>';
    echo '<p>很抱歉，您查找的文章不存在。</p>';
    echo '<a href="' . home_url('/market-insights/') . '" style="color: #1263A0;">返回文章列表</a>';
    echo '</div>';
    get_footer();
    exit;
}

// 從資料庫獲取文章
$article = get_post($article_id);

if (!$article || $article->post_type !== 'insight_articles') {
    echo '<div style="padding: 4rem 2rem; text-align: center; margin-top: 80px;">';
    echo '<h1>找不到文章</h1>';
    echo '<p>很抱歉，您查找的文章不存在。</p>';
    echo '<a href="' . home_url('/market-insights/') . '" style="color: #1263A0;">返回文章列表</a>';
    echo '</div>';
    get_footer();
    exit;
}

// 獲取文章資料
$categories = get_the_terms($article->ID, 'insight_category');
$read_time = get_post_meta($article->ID, '_read_time', true) ?: 5;
$author_name = get_post_meta($article->ID, '_author_name', true) ?: 'VortexEco Team';
$category_name = !empty($categories) ? $categories[0]->name : 'Industry News';
$category_slug = !empty($categories) ? $categories[0]->slug : 'industry-news';

// 分類顏色
$category_colors = array(
    'market-analysis' => array('primary' => '#059669', 'secondary' => '#10B981'),
    'technology' => array('primary' => '#7C3AED', 'secondary' => '#A855F7'),
    'policy' => array('primary' => '#DC2626', 'secondary' => '#EF4444'),
    'industry-news' => array('primary' => '#F59E0B', 'secondary' => '#FBBF24'),
);
$colors = isset($category_colors[$category_slug]) ? $category_colors[$category_slug] : $category_colors['industry-news'];
?>

<!-- Article Header -->
<section style="padding: 6rem 0 2rem; background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>); color: white; position: relative; overflow: hidden; margin-top: 80px;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 25% 75%, rgba(0, 168, 230, 0.3) 0%, transparent 50%); opacity: 0.6;"></div>
    
    <div class="container" style="position: relative; z-index: 2; max-width: 900px; margin: 0 auto; padding: 0 2rem;">
        <nav style="margin-bottom: 2rem;">
            <ol style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; list-style: none; margin: 0; padding: 0;">
                <li><a href="<?php echo home_url('/'); ?>" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">首頁</a></li>
                <li>/</li>
                <li><a href="<?php echo home_url('/market-insights/'); ?>" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">市場洞察</a></li>
                <li>/</li>
                <li><span style="color: white; font-weight: 500;">文章詳情</span></li>
            </ol>
        </nav>
        
        <div style="text-align: center;">
            <span style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; display: inline-block; margin-bottom: 1.5rem;">
                <?php echo esc_html($category_name); ?>
            </span>
            
            <h1 style="font-size: clamp(2rem, 4vw, 2.5rem); font-weight: 800; margin-bottom: 1.5rem; line-height: 1.3;">
                <?php echo esc_html($article->post_title); ?>
            </h1>
            
            <div style="display: flex; align-items: center; justify-content: center; gap: 1.5rem; font-size: 0.95rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem;">
                <span><?php echo get_the_date('Y年m月d日', $article->ID); ?></span>
                <span>•</span>
                <span><?php echo esc_html($author_name); ?></span>
                <span>•</span>
                <span><?php echo $read_time; ?> 分鐘閱讀</span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section style="padding: 4rem 0; background: #F8FAFB;">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 2rem;">
        <article style="background: #FFFFFF; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 3rem; border: 1px solid #E5E7EB;">
            
            <?php if (has_post_thumbnail($article->ID)): ?>
            <div style="margin-bottom: 2rem; border-radius: 12px; overflow: hidden;">
                <?php echo get_the_post_thumbnail($article->ID, 'large', array('style' => 'width: 100%; height: auto;')); ?>
            </div>
            <?php endif; ?>
            
            <div style="color: #4B5563; line-height: 1.8; font-size: 1.1rem;">
                <?php echo wpautop($article->post_content); ?>
            </div>
            
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid #E5E7EB;">
                <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                    <span style="color: #6B7280; font-weight: 600;">分享文章：</span>
                    <button onclick="shareArticle('facebook')" style="background: #1877F2; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer;">
                        Facebook
                    </button>
                    <button onclick="shareArticle('twitter')" style="background: #1DA1F2; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer;">
                        Twitter
                    </button>
                    <button onclick="shareArticle('linkedin')" style="background: #0A66C2; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer;">
                        LinkedIn
                    </button>
                </div>
            </div>
        </article>
        
        <!-- Related Articles -->
        <div style="margin-top: 3rem;">
            <h2 style="font-size: 1.8rem; font-weight: 700; color: #1F2937; margin-bottom: 1.5rem; text-align: center;">
                相關文章
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                <?php
                // 獲取相關文章
                $related_args = array(
                    'post_type' => 'insight_articles',
                    'posts_per_page' => 3,
                    'post__not_in' => array($article->ID),
                    'orderby' => 'rand',
                );
                
                if (!empty($categories)) {
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'insight_category',
                            'field' => 'term_id',
                            'terms' => $categories[0]->term_id,
                        )
                    );
                }
                
                $related_articles = new WP_Query($related_args);
                
                if ($related_articles->have_posts()):
                    while ($related_articles->have_posts()): $related_articles->the_post();
                        $related_read_time = get_post_meta(get_the_ID(), '_read_time', true) ?: 5;
                        ?>
                        <a href="<?php echo home_url('/article-detail/?article=' . get_the_ID()); ?>" style="display: block; background: #FFFFFF; border-radius: 12px; padding: 1.5rem; border: 1px solid #E5E7EB; text-decoration: none; transition: all 0.3s ease;">
                            <h3 style="font-size: 1.1rem; font-weight: 600; color: #1F2937; margin-bottom: 0.5rem; line-height: 1.4;">
                                <?php the_title(); ?>
                            </h3>
                            <p style="color: #6B7280; font-size: 0.9rem; margin-bottom: 0.75rem; line-height: 1.5;">
                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                            </p>
                            <span style="color: #9CA3AF; font-size: 0.85rem;">
                                <?php echo $related_read_time; ?> 分鐘閱讀
                            </span>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?php echo home_url('/market-insights/'); ?>" style="display: inline-block; background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>); color: white; padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">
                瀏覽更多文章
            </a>
        </div>
    </div>
</section>

<script>
function shareArticle(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    
    let shareUrl = '';
    switch(platform) {
        case 'facebook':
            shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
            break;
        case 'twitter':
            shareUrl = 'https://twitter.com/intent/tweet?url=' + url + '&text=' + title;
            break;
        case 'linkedin':
            shareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' + url;
            break;
    }
    
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}
</script>

<style>
article a:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transform: translateY(-4px);
}
</style>

<?php get_footer(); ?>