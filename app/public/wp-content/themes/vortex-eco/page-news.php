<?php
/**
 * Template Name: News & Insights Page
 * The template for displaying news and blog posts
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="news-hero" style="
        height: 60vh;
        background-image: 
            linear-gradient(rgba(18, 99, 160, 0.8), rgba(11, 77, 125, 0.8)),
            url('<?php echo get_theme_mod('news_hero_bg', get_template_directory_uri() . '/assets/images/news-hero.jpg'); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
    ">
        <div class="container">
            <div class="hero-content" style="max-width: 800px; text-align: center; margin: 0 auto;">
                <h1 style="
                    font-size: clamp(2.5rem, 5vw, 4rem);
                    margin-bottom: 1.5rem;
                    color: white;
                "><?php esc_html_e('Wind Energy News & Insights', 'vortex-eco'); ?></h1>
                <p style="
                    font-size: 1.3rem;
                    color: rgba(255,255,255,0.9);
                    margin-bottom: 2rem;
                    line-height: 1.6;
                ">
                    <?php esc_html_e('Stay informed with the latest developments in wind energy technology, industry trends, and expert insights from our consulting team.', 'vortex-eco'); ?>
                </p>
                <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                    <a href="#featured" class="btn btn-white">
                        <?php esc_html_e('Featured Articles', 'vortex-eco'); ?>
                    </a>
                    <a href="#categories" class="btn btn-outline" style="border-color: white; color: white;">
                        <?php esc_html_e('Browse Topics', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    <section id="featured" class="featured-articles" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/featured-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Featured Articles', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Top stories and expert insights from the wind energy industry', 'vortex-eco'); ?>
                </p>
            </div>

            <?php
            $featured_posts = get_posts(array(
                'numberposts' => 3,
                'meta_key' => 'featured_post',
                'meta_value' => 'yes',
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if (empty($featured_posts)) {
                $featured_posts = get_posts(array(
                    'numberposts' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
            }

            if ($featured_posts) : ?>
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-bottom: 3rem;">
                    
                    <!-- Main Featured Article -->
                    <?php $main_post = $featured_posts[0]; ?>
                    <article class="main-featured" style="
                        background: rgba(255,255,255,0.95);
                        border-radius: var(--border-radius-lg);
                        overflow: hidden;
                        box-shadow: var(--shadow-lg);
                        backdrop-filter: blur(10px);
                    ">
                        <?php if (has_post_thumbnail($main_post->ID)) : ?>
                            <div style="height: 300px; overflow: hidden;">
                                <a href="<?php echo get_permalink($main_post->ID); ?>">
                                    <?php echo get_the_post_thumbnail($main_post->ID, 'large', array(
                                        'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                        'onmouseover' => 'this.style.transform="scale(1.05)"',
                                        'onmouseout' => 'this.style.transform="scale(1)"'
                                    )); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div style="padding: 2rem;">
                            <div style="
                                background: var(--accent-color);
                                color: white;
                                padding: 0.5rem 1rem;
                                border-radius: var(--border-radius);
                                display: inline-block;
                                font-size: 0.8rem;
                                font-weight: 500;
                                margin-bottom: 1rem;
                                text-transform: uppercase;
                            "><?php esc_html_e('Featured', 'vortex-eco'); ?></div>
                            
                            <h3 style="margin-bottom: 1rem; font-size: 1.8rem; line-height: 1.3;">
                                <a href="<?php echo get_permalink($main_post->ID); ?>" style="color: var(--text-dark);">
                                    <?php echo get_the_title($main_post->ID); ?>
                                </a>
                            </h3>
                            
                            <div style="margin-bottom: 1rem; font-size: 0.9rem; color: var(--text-light);">
                                <?php echo get_the_date('', $main_post->ID); ?> • 
                                <?php echo get_the_author_meta('display_name', $main_post->post_author); ?>
                            </div>
                            
                            <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                                <?php echo wp_trim_words(get_the_excerpt($main_post->ID), 30); ?>
                            </p>
                            
                            <a href="<?php echo get_permalink($main_post->ID); ?>" class="btn btn-primary">
                                <?php esc_html_e('Read Full Article', 'vortex-eco'); ?>
                            </a>
                        </div>
                    </article>

                    <!-- Side Featured Articles -->
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <?php for ($i = 1; $i < count($featured_posts) && $i < 3; $i++) : 
                            $side_post = $featured_posts[$i]; ?>
                            <article style="
                                background: rgba(255,255,255,0.95);
                                padding: 1.5rem;
                                border-radius: var(--border-radius-lg);
                                box-shadow: var(--shadow-sm);
                                backdrop-filter: blur(10px);
                                transition: var(--transition);
                            " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                                <h4 style="margin-bottom: 0.5rem; font-size: 1.1rem; line-height: 1.4;">
                                    <a href="<?php echo get_permalink($side_post->ID); ?>" style="color: var(--text-dark);">
                                        <?php echo get_the_title($side_post->ID); ?>
                                    </a>
                                </h4>
                                <div style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 0.5rem;">
                                    <?php echo get_the_date('', $side_post->ID); ?>
                                </div>
                                <p style="color: var(--text-medium); font-size: 0.9rem; margin: 0;">
                                    <?php echo wp_trim_words(get_the_excerpt($side_post->ID), 15); ?>
                                </p>
                            </article>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Article Categories -->
    <section id="categories" class="categories-section" style="padding: 4rem 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Explore by Topic', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Find articles on specific areas of wind energy', 'vortex-eco'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                
                <?php
                $categories = get_categories(array(
                    'hide_empty' => true,
                    'number' => 6,
                    'orderby' => 'count',
                    'order' => 'DESC'
                ));

                $category_icons = array(
                    'offshore-wind' => '🌊',
                    'technology' => '⚡',
                    'sustainability' => '🌱',
                    'policy' => '📋',
                    'market-analysis' => '📈',
                    'case-studies' => '📁'
                );

                foreach ($categories as $category) :
                    $icon = isset($category_icons[$category->slug]) ? $category_icons[$category->slug] : '📝';
                    $recent_posts = get_posts(array(
                        'category' => $category->term_id,
                        'numberposts' => 1,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                ?>
                    <div class="category-card" style="
                        background: var(--bg-white);
                        padding: 2rem;
                        border-radius: var(--border-radius-lg);
                        box-shadow: var(--shadow-sm);
                        border: 2px solid transparent;
                        transition: var(--transition);
                        text-align: center;
                    " onmouseover="this.style.borderColor='var(--accent-color)'; this.style.transform='translateY(-5px)'" onmouseout="this.style.borderColor='transparent'; this.style.transform='translateY(0)'">
                        
                        <div style="font-size: 3rem; margin-bottom: 1rem;"><?php echo $icon; ?></div>
                        
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">
                            <a href="<?php echo get_category_link($category->term_id); ?>" style="color: var(--primary-color);">
                                <?php echo $category->name; ?>
                            </a>
                        </h3>
                        
                        <p style="color: var(--text-medium); margin-bottom: 1rem; font-size: 0.9rem;">
                            <?php echo $category->description ?: sprintf(__('Latest insights and developments in %s', 'vortex-eco'), strtolower($category->name)); ?>
                        </p>
                        
                        <div style="
                            background: var(--bg-light);
                            padding: 1rem;
                            border-radius: var(--border-radius);
                            margin-bottom: 1.5rem;
                            font-size: 0.9rem;
                        ">
                            <strong><?php echo $category->count; ?></strong> 
                            <?php echo _n('article', 'articles', $category->count, 'vortex-eco'); ?>
                            <?php if (!empty($recent_posts)) : ?>
                                <br><small style="color: var(--text-light);">
                                    <?php printf(__('Latest: %s', 'vortex-eco'), get_the_date('M j', $recent_posts[0]->ID)); ?>
                                </small>
                            <?php endif; ?>
                        </div>
                        
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="btn btn-outline btn-sm">
                            <?php esc_html_e('Browse Articles', 'vortex-eco'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Latest Articles -->
    <section class="latest-articles" style="
        padding: 4rem 0;
        background-image: 
            linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/latest-articles-bg.jpg');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">
            <div class="section-title" style="text-align: center; margin-bottom: 3rem;">
                <h2><?php esc_html_e('Latest Articles', 'vortex-eco'); ?></h2>
                <p style="font-size: 1.2rem; color: var(--text-medium);">
                    <?php esc_html_e('Recent insights from our wind energy experts', 'vortex-eco'); ?>
                </p>
            </div>

            <?php
            $latest_posts = get_posts(array(
                'numberposts' => 6,
                'orderby' => 'date',
                'order' => 'DESC',
                'post__not_in' => array_map(function($post) { return $post->ID; }, $featured_posts ?: array())
            ));

            if ($latest_posts) : ?>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                    
                    <?php foreach ($latest_posts as $post) : ?>
                        <article class="article-card" style="
                            background: rgba(255,255,255,0.95);
                            border-radius: var(--border-radius-lg);
                            overflow: hidden;
                            box-shadow: var(--shadow-sm);
                            transition: var(--transition);
                            backdrop-filter: blur(10px);
                        " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                            
                            <?php if (has_post_thumbnail($post->ID)) : ?>
                                <div style="height: 200px; overflow: hidden;">
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <?php echo get_the_post_thumbnail($post->ID, 'medium', array(
                                            'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                            'onmouseover' => 'this.style.transform="scale(1.05)"',
                                            'onmouseout' => 'this.style.transform="scale(1)"'
                                        )); ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div style="
                                    height: 200px;
                                    background: var(--gradient-primary);
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-size: 3rem;
                                ">📝</div>
                            <?php endif; ?>
                            
                            <div style="padding: 2rem;">
                                
                                <!-- Categories -->
                                <?php 
                                $post_categories = get_the_category($post->ID);
                                if ($post_categories) : ?>
                                    <div style="margin-bottom: 1rem;">
                                        <?php foreach (array_slice($post_categories, 0, 2) as $cat) : ?>
                                            <span style="
                                                background: var(--accent-color);
                                                color: white;
                                                padding: 0.25rem 0.75rem;
                                                border-radius: var(--border-radius);
                                                font-size: 0.75rem;
                                                font-weight: 500;
                                                margin-right: 0.5rem;
                                                text-transform: uppercase;
                                            "><?php echo $cat->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Title -->
                                <h3 style="margin-bottom: 1rem; font-size: 1.3rem; line-height: 1.4;">
                                    <a href="<?php echo get_permalink($post->ID); ?>" style="color: var(--text-dark);">
                                        <?php echo get_the_title($post->ID); ?>
                                    </a>
                                </h3>
                                
                                <!-- Meta -->
                                <div style="
                                    display: flex;
                                    align-items: center;
                                    gap: 1rem;
                                    margin-bottom: 1rem;
                                    font-size: 0.85rem;
                                    color: var(--text-light);
                                ">
                                    <span><?php echo get_the_date('', $post->ID); ?></span>
                                    <span>•</span>
                                    <span><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                                    <span>•</span>
                                    <span><?php echo vortexeco_reading_time($post->ID); ?></span>
                                </div>
                                
                                <!-- Excerpt -->
                                <p style="color: var(--text-medium); margin-bottom: 1.5rem; line-height: 1.6;">
                                    <?php echo wp_trim_words(get_the_excerpt($post->ID), 20); ?>
                                </p>
                                
                                <!-- Read More -->
                                <a href="<?php echo get_permalink($post->ID); ?>" style="
                                    color: var(--primary-color);
                                    font-weight: 500;
                                    text-decoration: none;
                                    transition: var(--transition);
                                " onmouseover="this.style.color='var(--accent-color)'" onmouseout="this.style.color='var(--primary-color)'">
                                    <?php esc_html_e('Read More', 'vortex-eco'); ?> →
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <!-- View All Articles Button -->
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')) ?: home_url('/blog'); ?>" class="btn btn-primary btn-lg">
                        <?php esc_html_e('View All Articles', 'vortex-eco'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="newsletter-section" style="
        padding: 4rem 0;
        background-image: 
            var(--gradient-overlay),
            url('<?php echo get_template_directory_uri(); ?>/assets/images/newsletter-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        text-align: center;
    ">
        <div class="container">
            <div style="max-width: 600px; margin: 0 auto;">
                <h2 style="color: white; margin-bottom: 1rem; font-size: 2.5rem;">
                    📬 <?php esc_html_e('Stay Informed', 'vortex-eco'); ?>
                </h2>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem; font-size: 1.2rem;">
                    <?php esc_html_e('Get the latest wind energy insights, industry trends, and expert analysis delivered to your inbox.', 'vortex-eco'); ?>
                </p>
                
                <form class="newsletter-form" style="
                    display: flex;
                    gap: 1rem;
                    max-width: 400px;
                    margin: 0 auto 2rem;
                " action="#" method="post">
                    <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Your email address', 'vortex-eco'); ?>" required style="
                        flex: 1;
                        padding: 1rem 1.5rem;
                        border: none;
                        border-radius: var(--border-radius);
                        font-size: 1rem;
                        background: rgba(255,255,255,0.9);
                        color: var(--text-dark);
                    ">
                    <button type="submit" class="btn btn-white">
                        <?php esc_html_e('Subscribe', 'vortex-eco'); ?>
                    </button>
                </form>
                
                <p style="color: rgba(255,255,255,0.7); font-size: 0.9rem;">
                    <?php esc_html_e('Join 5,000+ industry professionals. Unsubscribe anytime.', 'vortex-eco'); ?>
                </p>
            </div>
        </div>
    </section>

</main>

<style>
@media (max-width: 768px) {
    .news-hero {
        height: 50vh !important;
    }
    
    .featured-articles > .container > div:first-of-type {
        grid-template-columns: 1fr !important;
    }
    
    .categories-section > .container > div:last-of-type {
        grid-template-columns: 1fr !important;
    }
    
    .latest-articles > .container > div:last-of-type {
        grid-template-columns: 1fr !important;
    }
    
    .newsletter-form {
        flex-direction: column !important;
    }
}

.category-card {
    cursor: pointer;
}

.article-card {
    cursor: pointer;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[name="newsletter_email"]').value;
            // Add your newsletter signup logic here
            alert('<?php echo esc_js(__("Thank you for subscribing! You'll receive our latest insights soon.", "vortex-eco")); ?>');
            this.reset();
        });
    }
});
</script>

<?php
// Helper function for reading time
function vortexeco_reading_time($post_id = null) {
    if (!$post_id) {
        global $post;
        $post_id = $post->ID;
    }
    
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    return sprintf(
        _n('%d min read', '%d min read', $reading_time, 'vortex-eco'),
        $reading_time
    );
}
?>

<?php get_footer(); ?>