<?php
/**
 * The main template file
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            
            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header" style="text-align: center; margin-bottom: 3rem; padding: 2rem 0;">
                    <h1 class="page-title" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <?php single_post_title(); ?>
                    </h1>
                    <p style="font-size: 1.2rem; color: var(--text-medium);">
                        <?php esc_html_e('Stay updated with the latest insights in wind energy and sustainable solutions.', 'vortex-eco'); ?>
                    </p>
                </header>
            <?php endif; ?>

            <div class="posts-container" style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: start;">
                
                <!-- Main Content Area -->
                <div class="main-content">
                    <div class="posts-grid" style="display: grid; gap: 2rem;">
                        
                        <?php
                        $post_count = 0;
                        while (have_posts()) : the_post();
                        $post_count++;
                        ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card fade-in'); ?> style="
                            background: var(--bg-white);
                            border-radius: var(--border-radius-lg);
                            box-shadow: var(--shadow-sm);
                            overflow: hidden;
                            transition: var(--transition);
                            <?php echo ($post_count === 1 && is_home()) ? 'grid-column: 1 / -1;' : ''; ?>
                        ">
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail" style="
                                    <?php echo ($post_count === 1 && is_home()) ? 'height: 400px;' : 'height: 250px;'; ?>
                                    overflow: hidden;
                                ">
                                    <a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 100%;">
                                        <?php 
                                        $thumbnail_size = ($post_count === 1 && is_home()) ? 'vortex-hero' : 'vortex-blog';
                                        the_post_thumbnail($thumbnail_size, array(
                                            'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                            'onmouseover' => 'this.style.transform="scale(1.05)"',
                                            'onmouseout' => 'this.style.transform="scale(1)"'
                                        )); 
                                        ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content" style="padding: <?php echo ($post_count === 1 && is_home()) ? '2.5rem' : '2rem'; ?>;">
                                
                                <header class="entry-header" style="margin-bottom: 1.5rem;">
                                    
                                    <!-- Post Meta -->
                                    <?php if ('post' === get_post_type()) : ?>
                                        <div class="entry-meta" style="
                                            font-size: 0.9rem;
                                            color: var(--text-light);
                                            margin-bottom: 1rem;
                                            display: flex;
                                            flex-wrap: wrap;
                                            gap: 1rem;
                                            align-items: center;
                                        ">
                                            <span class="post-date" style="display: flex; align-items: center; gap: 0.5rem;">
                                                <span style="color: var(--accent-color);">📅</span>
                                                <time datetime="<?php echo get_the_date('c'); ?>">
                                                    <?php echo get_the_date(); ?>
                                                </time>
                                            </span>
                                            
                                            <?php if (get_the_author()) : ?>
                                                <span class="post-author" style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <span style="color: var(--accent-color);">👤</span>
                                                    <?php the_author(); ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if (has_category()) : ?>
                                                <span class="post-categories" style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <span style="color: var(--accent-color);">📁</span>
                                                    <?php the_category(', '); ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if (comments_open() || get_comments_number()) : ?>
                                                <span class="post-comments" style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <span style="color: var(--accent-color);">💬</span>
                                                    <a href="<?php comments_link(); ?>">
                                                        <?php comments_number('0', '1', '%'); ?>
                                                    </a>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Post Title -->
                                    <?php
                                    if (is_singular()) :
                                        the_title('<h1 class="entry-title" style="color: var(--primary-color); font-size: ' . (($post_count === 1 && is_home()) ? '2.5rem' : '1.8rem') . '; line-height: 1.3; margin: 0;">', '</h1>');
                                    else :
                                        the_title('<h2 class="entry-title" style="margin: 0;"><a href="' . esc_url(get_permalink()) . '" style="color: var(--primary-color); font-size: ' . (($post_count === 1 && is_home()) ? '2.5rem' : '1.8rem') . '; line-height: 1.3; text-decoration: none; transition: var(--transition);" onmouseover="this.style.color=\'var(--accent-color)\'" onmouseout="this.style.color=\'var(--primary-color)\'">', '</a></h2>');
                                    endif;
                                    ?>
                                </header>

                                <!-- Post Excerpt/Content -->
                                <div class="entry-content" style="color: var(--text-medium); line-height: 1.7; margin-bottom: 1.5rem;">
                                    <?php
                                    if (is_singular()) :
                                        the_content();
                                        
                                        wp_link_pages(array(
                                            'before' => '<div class="page-links" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--bg-grey);">',
                                            'after'  => '</div>',
                                            'link_before' => '<span class="page-number">',
                                            'link_after'  => '</span>',
                                        ));
                                    else :
                                        // Show excerpt for featured post, shorter for others
                                        $excerpt_length = ($post_count === 1 && is_home()) ? 200 : 120;
                                        echo '<p>' . wp_trim_words(get_the_excerpt(), $excerpt_length) . '</p>';
                                    endif;
                                    ?>
                                </div>

                                <!-- Read More / Tags -->
                                <footer class="entry-footer">
                                    <?php if (!is_singular()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm" style="margin-bottom: 1rem;">
                                            <?php esc_html_e('Read More', 'vortex-eco'); ?> →
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if (is_singular() && has_tag()) : ?>
                                        <div class="post-tags" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--bg-grey);">
                                            <strong style="color: var(--text-dark); margin-right: 0.5rem;"><?php esc_html_e('Tags:', 'vortex-eco'); ?></strong>
                                            <?php
                                            $tags = get_the_tags();
                                            if ($tags) {
                                                foreach ($tags as $tag) {
                                                    echo '<a href="' . get_tag_link($tag->term_id) . '" style="
                                                        display: inline-block;
                                                        background: var(--bg-light);
                                                        color: var(--text-medium);
                                                        padding: 0.25rem 0.75rem;
                                                        border-radius: var(--border-radius);
                                                        font-size: 0.85rem;
                                                        margin: 0.25rem 0.25rem 0.25rem 0;
                                                        transition: var(--transition);
                                                    " onmouseover="this.style.background=\'var(--accent-color)\'; this.style.color=\'white\'" onmouseout="this.style.background=\'var(--bg-light)\'; this.style.color=\'var(--text-medium)\'">' . $tag->name . '</a>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </footer>
                            </div>
                        </article>

                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <nav class="pagination" style="margin-top: 3rem;">
                        <?php vortexeco_pagination(); ?>
                    </nav>
                </div>

                <!-- Sidebar -->
                <?php if (is_active_sidebar('sidebar-1') && !is_singular()) : ?>
                    <aside id="secondary" class="primary-sidebar" style="position: sticky; top: calc(var(--header-height) + 2rem);">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                        
                        <!-- Default sidebar content if no widgets -->
                        <?php if (!is_active_sidebar('sidebar-1')) : ?>
                            <!-- Search Widget -->
                            <div class="widget widget-search" style="background: var(--bg-white); padding: 2rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-sm); margin-bottom: 2rem;">
                                <h3 class="widget-title"><?php esc_html_e('Search', 'vortex-eco'); ?></h3>
                                <?php get_search_form(); ?>
                            </div>
                            
                            <!-- Recent Posts Widget -->
                            <div class="widget widget-recent-posts" style="background: var(--bg-white); padding: 2rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-sm); margin-bottom: 2rem;">
                                <h3 class="widget-title"><?php esc_html_e('Recent Posts', 'vortex-eco'); ?></h3>
                                <ul style="list-style: none; padding: 0;">
                                    <?php
                                    $recent_posts = wp_get_recent_posts(array(
                                        'numberposts' => 5,
                                        'post_status' => 'publish'
                                    ));
                                    foreach ($recent_posts as $post_item) :
                                    ?>
                                        <li style="margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid var(--bg-grey);">
                                            <a href="<?php echo get_permalink($post_item['ID']); ?>" style="color: var(--text-dark); font-weight: 500; line-height: 1.4;">
                                                <?php echo $post_item['post_title']; ?>
                                            </a>
                                            <div style="font-size: 0.85rem; color: var(--text-light); margin-top: 0.25rem;">
                                                <?php echo get_the_date('', $post_item['ID']); ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            
                            <!-- Categories Widget -->
                            <div class="widget widget-categories" style="background: var(--bg-white); padding: 2rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-sm);">
                                <h3 class="widget-title"><?php esc_html_e('Categories', 'vortex-eco'); ?></h3>
                                <ul style="list-style: none; padding: 0;">
                                    <?php
                                    $categories = get_categories(array('hide_empty' => true));
                                    foreach ($categories as $category) :
                                    ?>
                                        <li style="margin-bottom: 0.5rem;">
                                            <a href="<?php echo get_category_link($category->term_id); ?>" style="
                                                color: var(--text-medium);
                                                display: flex;
                                                justify-content: space-between;
                                                padding: 0.5rem 0;
                                                border-bottom: 1px solid var(--bg-light);
                                            ">
                                                <span><?php echo $category->name; ?></span>
                                                <span style="color: var(--text-light); font-size: 0.9rem;">(<?php echo $category->count; ?>)</span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </aside>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <section class="no-results not-found" style="
                text-align: center;
                padding: 4rem 2rem;
                background: var(--bg-white);
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
                max-width: 600px;
                margin: 2rem auto;
            ">
                <header class="page-header">
                    <h1 class="page-title" style="color: var(--primary-color); margin-bottom: 1rem; font-size: 2rem;">
                        <?php esc_html_e('Nothing here', 'vortex-eco'); ?>
                    </h1>
                </header>

                <div class="page-content">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p><?php esc_html_e('Ready to publish your first post?', 'vortex-eco'); ?></p>
                        <a href="<?php echo esc_url(admin_url('post-new.php')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Get started here', 'vortex-eco'); ?>
                        </a>

                    <?php elseif (is_search()) : ?>
                        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vortex-eco'); ?></p>
                        <div style="max-width: 400px; margin: 2rem auto;">
                            <?php get_search_form(); ?>
                        </div>

                    <?php else : ?>
                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vortex-eco'); ?></p>
                        <div style="max-width: 400px; margin: 2rem auto;">
                            <?php get_search_form(); ?>
                        </div>

                    <?php endif; ?>
                </div>
            </section>

        <?php endif; ?>
    </div>
</main>

<?php
// Single post additions
if (is_singular('post')) :
?>
    <div class="container" style="margin-top: 3rem;">
        
        <!-- Social Share -->
        <div style="text-align: center; margin-bottom: 3rem; padding: 2rem; background: var(--bg-light); border-radius: var(--border-radius-lg);">
            <?php vortexeco_social_share(); ?>
        </div>
        
        <!-- Author Bio -->
        <?php
        $author_bio = get_the_author_meta('description');
        if ($author_bio) :
        ?>
            <div class="author-bio" style="
                background: var(--bg-white);
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
                margin-bottom: 3rem;
                display: flex;
                gap: 2rem;
                align-items: center;
            ">
                <div class="author-avatar">
                    <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'avatar', 'style' => 'border-radius: 50%;')); ?>
                </div>
                <div class="author-info">
                    <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);">
                        <?php the_author(); ?>
                    </h4>
                    <p style="margin: 0; color: var(--text-medium);">
                        <?php echo $author_bio; ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Related Posts -->
        <?php vortexeco_related_posts(get_the_ID(), 3); ?>
    </div>
    
    <!-- Comments -->
    <?php
    if (comments_open() || get_comments_number()) :
        echo '<div class="container" style="margin-top: 3rem;">';
        comments_template();
        echo '</div>';
    endif;
    ?>

<?php endif; ?>

<?php
get_footer();
?>