<?php
/**
 * The template for displaying search results pages
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        
        <!-- Search Results Header -->
        <header class="search-header" style="
            text-align: center;
            padding: 3rem 0;
            margin-bottom: 3rem;
            background: var(--bg-white);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
        ">
            <?php if (have_posts()) : ?>
                <h1 class="search-title" style="
                    font-size: clamp(2rem, 4vw, 3rem);
                    margin-bottom: 1rem;
                    color: var(--primary-color);
                ">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'vortex-eco'),
                        '<span style="color: var(--accent-color);">"' . get_search_query() . '"</span>'
                    );
                    ?>
                </h1>
                
                <p style="
                    font-size: 1.1rem;
                    color: var(--text-medium);
                    margin-bottom: 2rem;
                ">
                    <?php
                    global $wp_query;
                    $total_results = $wp_query->found_posts;
                    printf(
                        esc_html(_n('Found %d result', 'Found %d results', $total_results, 'vortex-eco')),
                        $total_results
                    );
                    ?>
                </p>
                
            <?php else : ?>
                <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.6;">🔍</div>
                <h1 class="search-title" style="
                    font-size: clamp(2rem, 4vw, 3rem);
                    margin-bottom: 1rem;
                    color: var(--primary-color);
                ">
                    <?php esc_html_e('No Results Found', 'vortex-eco'); ?>
                </h1>
                
                <p style="
                    font-size: 1.2rem;
                    color: var(--text-medium);
                    margin-bottom: 2rem;
                ">
                    <?php
                    printf(
                        esc_html__('Sorry, no results were found for "%s"', 'vortex-eco'),
                        '<strong>' . get_search_query() . '</strong>'
                    );
                    ?>
                </p>
            <?php endif; ?>
            
            <!-- Search Form -->
            <div class="search-form-container" style="max-width: 500px; margin: 0 auto;">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="
                    display: flex;
                    gap: 1rem;
                ">
                    <input type="search" 
                           name="s" 
                           placeholder="<?php esc_attr_e('Search for wind energy solutions...', 'vortex-eco'); ?>" 
                           value="<?php echo get_search_query(); ?>"
                           style="
                               flex: 1;
                               padding: 1rem 1.5rem;
                               border: 2px solid var(--bg-grey);
                               border-radius: var(--border-radius);
                               font-size: 1rem;
                               transition: var(--transition);
                           "
                           onfocus="this.style.borderColor='var(--accent-color)'"
                           onblur="this.style.borderColor='var(--bg-grey)'"
                    />
                    <button type="submit" class="btn btn-primary">
                        <?php esc_html_e('Search', 'vortex-eco'); ?>
                    </button>
                </form>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            
            <!-- Search Filters (Optional) -->
            <div class="search-filters" style="
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
                    <span><?php esc_html_e('Filter by:', 'vortex-eco'); ?></span>
                    <a href="<?php echo esc_url(add_query_arg('post_type', 'post', get_search_link())); ?>" 
                       style="padding: 0.5rem 1rem; background: var(--bg-white); border-radius: var(--border-radius); text-decoration: none; transition: var(--transition);">
                        <?php esc_html_e('Posts', 'vortex-eco'); ?>
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('post_type', 'page', get_search_link())); ?>" 
                       style="padding: 0.5rem 1rem; background: var(--bg-white); border-radius: var(--border-radius); text-decoration: none; transition: var(--transition);">
                        <?php esc_html_e('Pages', 'vortex-eco'); ?>
                    </a>
                </div>
                
                <div style="font-size: 0.9rem; color: var(--text-light);">
                    <?php
                    printf(
                        esc_html__('Showing %1$d-%2$d of %3$d results', 'vortex-eco'),
                        (get_query_var('paged') ? (get_query_var('paged') - 1) * get_option('posts_per_page') + 1 : 1),
                        min(get_query_var('paged') ? get_query_var('paged') * get_option('posts_per_page') : get_option('posts_per_page'), $wp_query->found_posts),
                        $wp_query->found_posts
                    );
                    ?>
                </div>
            </div>

            <!-- Search Results -->
            <div class="search-results">
                <div class="posts-grid" style="display: grid; gap: 2rem;">
                    
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?> style="
                            background: var(--bg-white);
                            border-radius: var(--border-radius-lg);
                            box-shadow: var(--shadow-sm);
                            overflow: hidden;
                            transition: var(--transition);
                            display: grid;
                            grid-template-columns: auto 1fr;
                            gap: 2rem;
                            align-items: center;
                        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                            
                            <!-- Post Thumbnail -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="search-result-thumbnail" style="
                                    width: 150px;
                                    height: 120px;
                                    overflow: hidden;
                                    border-radius: var(--border-radius);
                                    margin: 2rem 0 2rem 2rem;
                                    flex-shrink: 0;
                                ">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array(
                                            'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                            'onmouseover' => 'this.style.transform="scale(1.05)"',
                                            'onmouseout' => 'this.style.transform="scale(1)"'
                                        )); ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="search-result-icon" style="
                                    width: 150px;
                                    height: 120px;
                                    background: var(--gradient-primary);
                                    border-radius: var(--border-radius);
                                    margin: 2rem 0 2rem 2rem;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 3rem;
                                    color: white;
                                ">
                                    <?php echo (get_post_type() === 'page') ? '📄' : '📝'; ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Post Content -->
                            <div class="search-result-content" style="
                                padding: 2rem 2rem 2rem 0;
                                flex: 1;
                                min-width: 0;
                            ">
                                
                                <!-- Post Type & Meta -->
                                <div class="search-result-meta" style="
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 1rem;
                                    align-items: center;
                                    margin-bottom: 1rem;
                                    font-size: 0.85rem;
                                    color: var(--text-light);
                                ">
                                    <span style="
                                        background: var(--accent-color);
                                        color: white;
                                        padding: 0.25rem 0.75rem;
                                        border-radius: var(--border-radius);
                                        font-size: 0.8rem;
                                        font-weight: 500;
                                        text-transform: uppercase;
                                    ">
                                        <?php echo get_post_type() === 'page' ? esc_html__('Page', 'vortex-eco') : esc_html__('Post', 'vortex-eco'); ?>
                                    </span>
                                    
                                    <?php if (get_post_type() === 'post') : ?>
                                        <span><?php echo get_the_date(); ?></span>
                                        <?php if (get_the_author()) : ?>
                                            <span><?php esc_html_e('by', 'vortex-eco'); ?> <?php the_author(); ?></span>
                                        <?php endif; ?>
                                        <?php if (has_category()) : ?>
                                            <span><?php esc_html_e('in', 'vortex-eco'); ?> <?php the_category(', '); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Post Title -->
                                <h2 class="search-result-title" style="
                                    margin-bottom: 1rem;
                                    font-size: 1.5rem;
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
                                <div class="search-result-excerpt" style="
                                    color: var(--text-medium);
                                    line-height: 1.6;
                                    margin-bottom: 1.5rem;
                                ">
                                    <?php
                                    $excerpt = get_the_excerpt();
                                    $search_query = get_search_query();
                                    
                                    // Highlight search terms in excerpt
                                    if ($search_query) {
                                        $highlighted_excerpt = preg_replace(
                                            '/(' . preg_quote($search_query, '/') . ')/i',
                                            '<mark style="background: var(--accent-color); color: white; padding: 0.1em 0.3em; border-radius: 3px;">$1</mark>',
                                            $excerpt
                                        );
                                        echo $highlighted_excerpt;
                                    } else {
                                        echo $excerpt;
                                    }
                                    ?>
                                </div>
                                
                                <!-- Read More & URL -->
                                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                        <?php esc_html_e('Read More', 'vortex-eco'); ?> →
                                    </a>
                                    
                                    <div style="font-size: 0.8rem; color: var(--text-light); font-family: monospace;">
                                        <?php echo esc_url(get_permalink()); ?>
                                    </div>
                                </div>
                            </div>
                        </article>

                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <nav class="search-pagination" style="margin-top: 3rem;">
                    <?php vortexeco_pagination(); ?>
                </nav>
            </div>

        <?php else : ?>
            
            <!-- No Results Content -->
            <div class="no-search-results" style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                margin-top: 2rem;
            ">
                
                <!-- Search Suggestions -->
                <div class="search-suggestions" style="
                    background: var(--bg-white);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                ">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color); display: flex; align-items: center; gap: 0.5rem;">
                        💡 <?php esc_html_e('Search Suggestions', 'vortex-eco'); ?>
                    </h3>
                    
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 1rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Check your spelling and try again', 'vortex-eco'); ?>
                        </li>
                        <li style="margin-bottom: 1rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Try using fewer or different keywords', 'vortex-eco'); ?>
                        </li>
                        <li style="margin-bottom: 1rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Search for general terms instead of specific ones', 'vortex-eco'); ?>
                        </li>
                        <li style="margin-bottom: 0; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--accent-color);">•</span>
                            <?php esc_html_e('Browse our services or contact us directly', 'vortex-eco'); ?>
                        </li>
                    </ul>
                </div>
                
                <!-- Popular Searches -->
                <div class="popular-searches" style="
                    background: var(--bg-white);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                ">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-color); display: flex; align-items: center; gap: 0.5rem;">
                        🔍 <?php esc_html_e('Popular Searches', 'vortex-eco'); ?>
                    </h3>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                        <?php
                        $popular_terms = array(
                            'wind energy consulting',
                            'offshore wind',
                            'turbine performance',
                            'wind farm development',
                            'renewable energy',
                            'sustainability',
                            'ESG solutions',
                            'regulatory compliance'
                        );
                        
                        foreach ($popular_terms as $term) :
                        ?>
                            <a href="<?php echo esc_url(home_url('/?s=' . urlencode($term))); ?>" style="
                                display: inline-block;
                                background: var(--bg-light);
                                color: var(--text-medium);
                                padding: 0.5rem 1rem;
                                border-radius: var(--border-radius);
                                font-size: 0.9rem;
                                text-decoration: none;
                                transition: var(--transition);
                            " onmouseover="this.style.background='var(--accent-color)'; this.style.color='white'" onmouseout="this.style.background='var(--bg-light)'; this.style.color='var(--text-medium)'">
                                <?php echo esc_html($term); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="search-contact" style="
                    background: var(--gradient-primary);
                    color: white;
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    text-align: center;
                ">
                    <h3 style="margin-bottom: 1rem; color: white;">
                        <?php esc_html_e('Need Personal Assistance?', 'vortex-eco'); ?>
                    </h3>
                    <p style="margin-bottom: 2rem; color: rgba(255,255,255,0.9);">
                        <?php esc_html_e("Can't find what you're looking for? Our wind energy experts are here to help.", 'vortex-eco'); ?>
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="mailto:info@vortexeco.com" class="btn btn-white btn-sm">
                            <?php esc_html_e('Email Us', 'vortex-eco'); ?>
                        </a>
                        <a href="tel:+1-555-123-4567" class="btn btn-white btn-sm" style="border: 2px solid white; background: transparent; color: white;">
                            <?php esc_html_e('Call Now', 'vortex-eco'); ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</main>

<!-- Search Page Specific Styles -->
<style>
@media (max-width: 768px) {
    .search-results article {
        grid-template-columns: 1fr !important;
        text-align: center;
    }
    
    .search-result-thumbnail,
    .search-result-icon {
        margin: 1rem auto !important;
        width: 120px !important;
        height: 100px !important;
    }
    
    .search-result-content {
        padding: 1rem !important;
    }
    
    .search-filters {
        flex-direction: column !important;
        align-items: stretch !important;
        text-align: center;
    }
    
    .search-form-container form {
        flex-direction: column !important;
    }
}

/* Highlight animation */
mark {
    animation: highlight 2s ease-in-out;
}

@keyframes highlight {
    0% { background-color: var(--accent-color); }
    50% { background-color: #FFE135; }
    100% { background-color: var(--accent-color); }
}
</style>

<?php
get_footer();
?>