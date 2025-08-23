<?php
/**
 * The template for displaying all single posts
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?> style="
                background: var(--bg-white);
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
                overflow: hidden;
                margin-bottom: 3rem;
            ">
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-hero-image" style="
                        height: 400px;
                        background-image: url('<?php the_post_thumbnail_url('large'); ?>');
                        background-size: cover;
                        background-position: center;
                        position: relative;
                        display: flex;
                        align-items: flex-end;
                    ">
                        <div style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: linear-gradient(transparent 40%, rgba(0,0,0,0.7));
                        "></div>
                        
                        <div class="post-hero-content" style="
                            position: relative;
                            z-index: 2;
                            padding: 2rem;
                            color: white;
                            width: 100%;
                        ">
                            <div style="margin-bottom: 1rem;">
                                <?php the_category(' | '); ?>
                            </div>
                            
                            <h1 class="entry-title" style="
                                font-size: clamp(1.8rem, 4vw, 3rem);
                                line-height: 1.2;
                                margin: 0;
                                color: white;
                                text-shadow: 0 2px 10px rgba(0,0,0,0.5);
                            ">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                    </div>
                <?php else : ?>
                    <header class="entry-header" style="padding: 3rem 3rem 1rem;">
                        <div style="margin-bottom: 1rem; font-size: 0.9rem;">
                            <?php the_category(' | '); ?>
                        </div>
                        
                        <h1 class="entry-title" style="
                            font-size: clamp(2rem, 5vw, 3.5rem);
                            line-height: 1.2;
                            margin: 0;
                            color: var(--primary-color);
                        ">
                            <?php the_title(); ?>
                        </h1>
                    </header>
                <?php endif; ?>
                
                <!-- Post Meta -->
                <div class="entry-meta" style="
                    padding: 0 3rem;
                    margin: 2rem 0;
                    padding-bottom: 2rem;
                    border-bottom: 1px solid var(--bg-grey);
                    display: flex;
                    flex-wrap: wrap;
                    gap: 2rem;
                    align-items: center;
                    font-size: 0.95rem;
                    color: var(--text-light);
                ">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: var(--accent-color);">👤</span>
                        <span><?php esc_html_e('By', 'vortex-eco'); ?> <?php the_author(); ?></span>
                    </div>
                    
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: var(--accent-color);">📅</span>
                        <time datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                    </div>
                    
                    <?php if (function_exists('the_views')) : ?>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="color: var(--accent-color);">👁️</span>
                            <?php the_views(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: var(--accent-color);">⏱️</span>
                        <?php echo vortexeco_reading_time(); ?>
                    </div>
                    
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="color: var(--accent-color);">💬</span>
                            <a href="#comments"><?php comments_number('0', '1', '%'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Post Content -->
                <div class="entry-content" style="
                    padding: 0 3rem 3rem;
                    color: var(--text-medium);
                    line-height: 1.8;
                    font-size: 1.1rem;
                ">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links" style="
                            margin-top: 3rem;
                            padding-top: 2rem;
                            border-top: 1px solid var(--bg-grey);
                            text-align: center;
                        "><h4>' . esc_html__('Pages:', 'vortex-eco') . '</h4>',
                        'after'  => '</div>',
                        'link_before' => '<span class="page-number" style="
                            display: inline-block;
                            background: var(--primary-color);
                            color: white;
                            padding: 0.5rem 1rem;
                            margin: 0.25rem;
                            border-radius: var(--border-radius);
                            text-decoration: none;
                        ">',
                        'link_after'  => '</span>',
                    ));
                    ?>
                </div>

                <!-- Tags -->
                <?php if (has_tag()) : ?>
                    <footer class="entry-footer" style="
                        padding: 2rem 3rem 3rem;
                        border-top: 1px solid var(--bg-grey);
                    ">
                        <div class="post-tags">
                            <h4 style="margin-bottom: 1rem; color: var(--text-dark); font-size: 1.1rem;">
                                <?php esc_html_e('Related Topics:', 'vortex-eco'); ?>
                            </h4>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<a href="' . get_tag_link($tag->term_id) . '" style="
                                            display: inline-block;
                                            background: var(--bg-light);
                                            color: var(--text-medium);
                                            padding: 0.5rem 1rem;
                                            border-radius: var(--border-radius);
                                            font-size: 0.9rem;
                                            text-decoration: none;
                                            transition: var(--transition);
                                            border: 1px solid transparent;
                                        " onmouseover="
                                            this.style.background=\'var(--accent-color)\';
                                            this.style.color=\'white\';
                                            this.style.borderColor=\'var(--accent-color)\';
                                        " onmouseout="
                                            this.style.background=\'var(--bg-light)\';
                                            this.style.color=\'var(--text-medium)\';
                                            this.style.borderColor=\'transparent\';
                                        ">' . $tag->name . '</a> ';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </footer>
                <?php endif; ?>
            </article>

            <!-- Social Share -->
            <div class="social-share-section" style="
                background: var(--bg-light);
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                text-align: center;
                margin-bottom: 3rem;
            ">
                <?php vortexeco_social_share(); ?>
            </div>

            <!-- Author Bio -->
            <?php
            $author_bio = get_the_author_meta('description');
            if ($author_bio) :
            ?>
                <div class="author-bio-section" style="
                    background: var(--bg-white);
                    padding: 3rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    margin-bottom: 3rem;
                ">
                    <div style="display: flex; gap: 2rem; align-items: flex-start;">
                        <div class="author-avatar" style="flex-shrink: 0;">
                            <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', array(
                                'class' => 'avatar',
                                'style' => 'border-radius: 50%; width: 100px; height: 100px;'
                            )); ?>
                        </div>
                        <div class="author-info" style="flex: 1;">
                            <h3 style="margin-bottom: 0.5rem; color: var(--primary-color); font-size: 1.5rem;">
                                <?php esc_html_e('About', 'vortex-eco'); ?> <?php the_author(); ?>
                            </h3>
                            <p style="margin-bottom: 1rem; color: var(--text-medium); line-height: 1.7;">
                                <?php echo $author_bio; ?>
                            </p>
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="btn btn-outline btn-sm">
                                    <?php esc_html_e('View All Posts', 'vortex-eco'); ?>
                                </a>
                                
                                <?php if (get_the_author_meta('user_url')) : ?>
                                    <a href="<?php the_author_meta('user_url'); ?>" target="_blank" rel="noopener" style="color: var(--accent-color);">
                                        <?php esc_html_e('Website', 'vortex-eco'); ?> ↗
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Related Posts -->
            <div class="related-posts-section">
                <?php vortexeco_related_posts(get_the_ID(), 3); ?>
            </div>

        <?php endwhile; ?>

        <!-- Comments -->
        <?php if (comments_open() || get_comments_number()) : ?>
            <div class="comments-section" style="
                background: var(--bg-white);
                padding: 3rem;
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
                margin-top: 3rem;
            ">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

// Add reading time function
function vortexeco_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute
    
    return sprintf(
        _n('%d min read', '%d min read', $reading_time, 'vortex-eco'),
        $reading_time
    );
}
?>