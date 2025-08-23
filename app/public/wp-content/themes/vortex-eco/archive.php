<?php
/**
 * The template for displaying archive pages
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        
        <!-- Archive Header -->
        <header class="archive-header" style="
            text-align: center;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            background: var(--gradient-primary);
            color: white;
            border-radius: var(--border-radius-lg);
            position: relative;
            overflow: hidden;
        ">
            
            <!-- Background Pattern -->
            <div style="
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
                                  radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
                opacity: 0.3;
            "></div>
            
            <div style="position: relative; z-index: 2;">
                
                <!-- Archive Icon -->
                <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.9;">
                    <?php
                    if (is_category()) {
                        echo '📁';
                    } elseif (is_tag()) {
                        echo '🏷️';
                    } elseif (is_author()) {
                        echo '👤';
                    } elseif (is_date()) {
                        echo '📅';
                    } else {
                        echo '📚';
                    }
                    ?>
                </div>
                
                <!-- Archive Title -->
                <h1 class="archive-title" style="
                    font-size: clamp(2rem, 5vw, 3.5rem);
                    margin-bottom: 1rem;
                    color: white;
                    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
                ">
                    <?php
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_author()) {
                        printf(esc_html__('Posts by %s', 'vortex-eco'), get_the_author());
                    } elseif (is_year()) {
                        printf(esc_html__('Posts from %s', 'vortex-eco'), get_the_date(_x('Y', 'yearly archives date format', 'vortex-eco')));
                    } elseif (is_month()) {
                        printf(esc_html__('Posts from %s', 'vortex-eco'), get_the_date(_x('F Y', 'monthly archives date format', 'vortex-eco')));
                    } elseif (is_day()) {
                        printf(esc_html__('Posts from %s', 'vortex-eco'), get_the_date(_x('F j, Y', 'daily archives date format', 'vortex-eco')));
                    } else {
                        the_archive_title();
                    }
                    ?>
                </h1>
                
                <!-- Archive Description -->
                <?php
                $archive_description = get_the_archive_description();
                if ($archive_description || is_author()) :
                ?>
                    <div class="archive-description" style="
                        font-size: 1.2rem;
                        color: rgba(255,255,255,0.9);
                        max-width: 600px;
                        margin: 0 auto 2rem;
                        line-height: 1.6;
                    ">
                        <?php
                        if (is_author()) {
                            $author_bio = get_the_author_meta('description');
                            if ($author_bio) {
                                echo '<p>' . esc_html($author_bio) . '</p>';
                            }
                            echo '<p>' . sprintf(
                                esc_html__('Browse all posts by %s', 'vortex-eco'),
                                get_the_author()
                            ) . '</p>';
                        } else {
                            echo $archive_description;
                        }
                        ?>
                    </div>
                <?php endif; ?>
                
                <!-- Post Count -->
                <?php
                global $wp_query;
                $total_posts = $wp_query->found_posts;
                ?>
                <div style="
                    font-size: 1rem;
                    color: rgba(255,255,255,0.8);
                    margin-bottom: 1rem;
                ">
                    <?php
                    printf(
                        esc_html(_n('%d article found', '%d articles found', $total_posts, 'vortex-eco')),
                        $total_posts
                    );
                    ?>
                </div>
                
                <!-- Archive Meta -->
                <?php if (is_category() && function_exists('get_category_parents')) : ?>
                    <div class="category-hierarchy" style="
                        font-size: 0.9rem;
                        color: rgba(255,255,255,0.7);
                    ">
                        <?php
                        $category = get_queried_object();
                        if ($category->parent) {
                            $parents = get_category_parents($category->term_id, true, ' › ');
                            echo '<span>' . esc_html__('Category:', 'vortex-eco') . '</span> ' . $parents;
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            
            <!-- Archive Filters/Sorting -->
            <div class="archive-controls" style="
                background: var(--bg-light);
                padding: 1.5rem 2rem;
                border-radius: var(--border-radius-lg);
                margin-bottom: 2rem;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
                gap: 1rem;
            ">
                <div style="display: flex; align-items: center; gap: 1rem; font-size: 0.95rem; color: var(--text-medium);">
                    <span><?php esc_html_e('View:', 'vortex-eco'); ?></span>
                    <button onclick="toggleView('grid')" id="grid-view" class="view-toggle active" style="
                        background: none;
                        border: 1px solid var(--bg-grey);
                        padding: 0.5rem;
                        border-radius: var(--border-radius);
                        cursor: pointer;
                        transition: var(--transition);
                    ">📱</button>
                    <button onclick="toggleView('list')" id="list-view" class="view-toggle" style="
                        background: none;
                        border: 1px solid var(--bg-grey);
                        padding: 0.5rem;
                        border-radius: var(--border-radius);
                        cursor: pointer;
                        transition: var(--transition);
                    ">📋</button>
                </div>
                
                <div style="font-size: 0.9rem; color: var(--text-light);">
                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $posts_per_page = get_option('posts_per_page');
                    printf(
                        esc_html__('Showing %1$d-%2$d of %3$d posts', 'vortex-eco'),
                        (($paged - 1) * $posts_per_page + 1),
                        min($paged * $posts_per_page, $total_posts),
                        $total_posts
                    );
                    ?>
                </div>
            </div>

            <!-- Archive Content -->
            <div class="archive-posts" id="archive-posts" style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 2rem;
            ">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-item'); ?> style="
                        background: var(--bg-white);
                        border-radius: var(--border-radius-lg);
                        box-shadow: var(--shadow-sm);
                        overflow: hidden;
                        transition: var(--transition);
                        position: relative;
                    " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                        
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail" style="
                                height: 200px;
                                overflow: hidden;
                                position: relative;
                            ">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('vortex-blog', array(
                                        'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                        'onmouseover' => 'this.style.transform="scale(1.05)"',
                                        'onmouseout' => 'this.style.transform="scale(1)"'
                                    )); ?>
                                </a>
                                
                                <!-- Category Badge -->
                                <?php if (has_category()) : ?>
                                    <div style="
                                        position: absolute;
                                        top: 1rem;
                                        left: 1rem;
                                        background: var(--accent-color);
                                        color: white;
                                        padding: 0.5rem 1rem;
                                        border-radius: var(--border-radius);
                                        font-size: 0.8rem;
                                        font-weight: 500;
                                        text-transform: uppercase;
                                    ">
                                        <?php the_category(' '); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php else : ?>
                            <div class="post-placeholder" style="
                                height: 200px;
                                background: var(--gradient-primary);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 3rem;
                                color: white;
                                position: relative;
                            ">
                                📝
                                
                                <?php if (has_category()) : ?>
                                    <div style="
                                        position: absolute;
                                        top: 1rem;
                                        left: 1rem;
                                        background: rgba(255,255,255,0.2);
                                        color: white;
                                        padding: 0.5rem 1rem;
                                        border-radius: var(--border-radius);
                                        font-size: 0.8rem;
                                        font-weight: 500;
                                        text-transform: uppercase;
                                    ">
                                        <?php the_category(' '); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Post Content -->
                        <div class="post-content" style="padding: 2rem;">
                            
                            <!-- Post Meta -->
                            <div class="post-meta" style="
                                display: flex;
                                flex-wrap: wrap;
                                gap: 1rem;
                                align-items: center;
                                margin-bottom: 1rem;
                                font-size: 0.85rem;
                                color: var(--text-light);
                            ">
                                <span style="display: flex; align-items: center; gap: 0.3rem;">
                                    📅 <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                </span>
                                
                                <?php if (get_the_author()) : ?>
                                    <span style="display: flex; align-items: center; gap: 0.3rem;">
                                        👤 <?php the_author(); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if (comments_open() || get_comments_number()) : ?>
                                    <span style="display: flex; align-items: center; gap: 0.3rem;">
                                        💬 <a href="<?php comments_link(); ?>"><?php comments_number('0', '1', '%'); ?></a>
                                    </span>
                                <?php endif; ?>
                                
                                <span style="display: flex; align-items: center; gap: 0.3rem;">
                                    ⏱️ <?php echo vortexeco_reading_time(); ?>
                                </span>
                            </div>
                            
                            <!-- Post Title -->
                            <h2 class="post-title" style="
                                margin-bottom: 1rem;
                                font-size: 1.4rem;
                                line-height: 1.3;
                            ">
                                <a href="<?php the_permalink(); ?>" style="
                                    color: var(--text-dark);
                                    text-decoration: none;
                                    transition: var(--transition);
                                " onmouseover="this.style.color='var(--primary-color)'" onmouseout="this.style.color='var(--text-dark)'">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <!-- Post Excerpt -->
                            <div class="post-excerpt" style="
                                color: var(--text-medium);
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                            ">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            
                            <!-- Post Footer -->
                            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                    <?php esc_html_e('Read More', 'vortex-eco'); ?> →
                                </a>
                                
                                <?php if (has_tag()) : ?>
                                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                        <?php
                                        $tags = get_the_tags();
                                        if ($tags) {
                                            $tag_count = 0;
                                            foreach ($tags as $tag) {
                                                if ($tag_count >= 2) break; // Show max 2 tags
                                                echo '<span style="
                                                    background: var(--bg-light);
                                                    color: var(--text-light);
                                                    padding: 0.25rem 0.5rem;
                                                    border-radius: var(--border-radius);
                                                    font-size: 0.75rem;
                                                ">' . $tag->name . '</span>';
                                                $tag_count++;
                                            }
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <nav class="archive-pagination" style="margin-top: 3rem;">
                <?php vortexeco_pagination(); ?>
            </nav>

        <?php else : ?>
            
            <!-- No Posts Found -->
            <div class="no-posts-found" style="
                text-align: center;
                padding: 4rem 2rem;
                background: var(--bg-white);
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
            ">
                <div style="font-size: 4rem; margin-bottom: 2rem; opacity: 0.6;">📭</div>
                <h2 style="margin-bottom: 1rem; color: var(--primary-color); font-size: 2rem;">
                    <?php esc_html_e('No Posts Found', 'vortex-eco'); ?>
                </h2>
                <p style="color: var(--text-medium); margin-bottom: 2rem; font-size: 1.1rem;">
                    <?php esc_html_e('There are no posts in this archive yet. Check back soon for new content!', 'vortex-eco'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    <?php esc_html_e('Back to Home', 'vortex-eco'); ?>
                </a>
            </div>

        <?php endif; ?>
        
        <!-- Related Categories/Tags (for category/tag archives) -->
        <?php if (is_category() || is_tag()) : ?>
            <aside class="related-terms" style="
                background: var(--bg-light);
                padding: 3rem 2rem;
                border-radius: var(--border-radius-lg);
                margin-top: 3rem;
                text-align: center;
            ">
                <h3 style="margin-bottom: 2rem; color: var(--primary-color); font-size: 1.5rem;">
                    <?php echo is_category() ? esc_html__('Related Categories', 'vortex-eco') : esc_html__('Related Tags', 'vortex-eco'); ?>
                </h3>
                
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
                    <?php
                    if (is_category()) {
                        $related_terms = get_categories(array(
                            'exclude' => get_queried_object_id(),
                            'number' => 6,
                            'orderby' => 'count',
                            'order' => 'DESC'
                        ));
                    } else {
                        $related_terms = get_tags(array(
                            'exclude' => get_queried_object_id(),
                            'number' => 8,
                            'orderby' => 'count',
                            'order' => 'DESC'
                        ));
                    }
                    
                    if ($related_terms) {
                        foreach ($related_terms as $term) {
                            $term_link = is_category() ? get_category_link($term->term_id) : get_tag_link($term->term_id);
                            echo '<a href="' . esc_url($term_link) . '" style="
                                display: inline-block;
                                background: var(--bg-white);
                                color: var(--text-medium);
                                padding: 0.75rem 1.5rem;
                                border-radius: var(--border-radius);
                                text-decoration: none;
                                transition: var(--transition);
                                font-size: 0.9rem;
                                border: 1px solid transparent;
                            " onmouseover="
                                this.style.background=\'var(--primary-color)\';
                                this.style.color=\'white\';
                                this.style.borderColor=\'var(--primary-color)\';
                                this.style.transform=\'translateY(-2px)\';
                            " onmouseout="
                                this.style.background=\'var(--bg-white)\';
                                this.style.color=\'var(--text-medium)\';
                                this.style.borderColor=\'transparent\';
                                this.style.transform=\'translateY(0)\';
                            ">' . esc_html($term->name) . ' (' . $term->count . ')</a>';
                        }
                    }
                    ?>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</main>

<!-- Archive Page Specific Scripts -->
<script>
function toggleView(view) {
    const archivePosts = document.getElementById('archive-posts');
    const gridBtn = document.getElementById('grid-view');
    const listBtn = document.getElementById('list-view');
    
    if (view === 'list') {
        archivePosts.style.gridTemplateColumns = '1fr';
        archivePosts.style.gap = '1rem';
        
        // Update button states
        listBtn.classList.add('active');
        gridBtn.classList.remove('active');
        
        // Update post layout
        const posts = archivePosts.querySelectorAll('.archive-post-item');
        posts.forEach(post => {
            post.style.display = 'grid';
            post.style.gridTemplateColumns = 'auto 1fr';
            post.style.alignItems = 'center';
            
            const thumbnail = post.querySelector('.post-thumbnail, .post-placeholder');
            const content = post.querySelector('.post-content');
            
            if (thumbnail) {
                thumbnail.style.width = '200px';
                thumbnail.style.height = '150px';
                thumbnail.style.margin = '1rem';
            }
            
            if (content) {
                content.style.padding = '1rem 2rem 1rem 0';
            }
        });
        
    } else {
        archivePosts.style.gridTemplateColumns = 'repeat(auto-fit, minmax(350px, 1fr))';
        archivePosts.style.gap = '2rem';
        
        // Update button states
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
        
        // Reset post layout
        const posts = archivePosts.querySelectorAll('.archive-post-item');
        posts.forEach(post => {
            post.style.display = 'block';
            post.style.gridTemplateColumns = 'initial';
            
            const thumbnail = post.querySelector('.post-thumbnail, .post-placeholder');
            const content = post.querySelector('.post-content');
            
            if (thumbnail) {
                thumbnail.style.width = '100%';
                thumbnail.style.height = '200px';
                thumbnail.style.margin = '0';
            }
            
            if (content) {
                content.style.padding = '2rem';
            }
        });
    }
}

// View toggle button styles
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.view-toggle');
    toggleButtons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.borderColor = 'var(--accent-color)';
                this.style.color = 'var(--accent-color)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.borderColor = 'var(--bg-grey)';
                this.style.color = 'var(--text-medium)';
            }
        });
    });
});
</script>

<style>
.view-toggle.active {
    background: var(--primary-color) !important;
    color: white !important;
    border-color: var(--primary-color) !important;
}

@media (max-width: 768px) {
    .archive-posts {
        grid-template-columns: 1fr !important;
    }
    
    .archive-controls {
        flex-direction: column;
        align-items: stretch !important;
        text-align: center;
    }
    
    .archive-post-item {
        display: block !important;
        grid-template-columns: initial !important;
    }
    
    .archive-post-item .post-thumbnail,
    .archive-post-item .post-placeholder {
        width: 100% !important;
        height: 200px !important;
        margin: 0 !important;
    }
    
    .archive-post-item .post-content {
        padding: 2rem !important;
    }
}

/* Reading time function */
<?php
function vortexeco_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    return sprintf(
        _n('%d min', '%d min', $reading_time, 'vortex-eco'),
        $reading_time
    );
}
?>
</style>

<?php get_footer(); ?>