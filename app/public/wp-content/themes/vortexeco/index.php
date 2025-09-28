<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package VortexEco
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header" style="
    padding: 8rem 0 4rem;
    background: linear-gradient(135deg, #1263A0 0%, #0F5287 100%);
    color: white;
    position: relative;
    overflow: hidden;
    margin-top: 80px;
">
    <!-- Background Pattern -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 25% 75%, rgba(0, 168, 230, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 75% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        opacity: 0.6;
    "></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <?php if (is_home() && !is_front_page()): ?>
                <h1 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                ">
                    <?php echo get_the_title(get_option('page_for_posts')); ?>
                </h1>
            <?php elseif (is_category()): ?>
                <div style="
                    display: inline-block;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 0.5rem 1.5rem;
                    border-radius: 30px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    margin-bottom: 2rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    border: 1px solid rgba(255, 255, 255, 0.2);
                ">Category</div>
                <h1 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                ">
                    <?php single_cat_title(); ?>
                </h1>
                <?php if (category_description()): ?>
                <p style="
                    font-size: 1.2rem;
                    color: rgba(255, 255, 255, 0.9);
                    margin: 0;
                    line-height: 1.6;
                ">
                    <?php echo category_description(); ?>
                </p>
                <?php endif; ?>
            <?php elseif (is_tag()): ?>
                <div style="
                    display: inline-block;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 0.5rem 1.5rem;
                    border-radius: 30px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    margin-bottom: 2rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    border: 1px solid rgba(255, 255, 255, 0.2);
                ">Tag</div>
                <h1 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                ">
                    <?php single_tag_title(); ?>
                </h1>
            <?php elseif (is_search()): ?>
                <div style="
                    display: inline-block;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 0.5rem 1.5rem;
                    border-radius: 30px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    margin-bottom: 2rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    border: 1px solid rgba(255, 255, 255, 0.2);
                ">Search Results</div>
                <h1 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                ">
                    <?php printf(__('Results for: %s', 'vortex-eco'), '<span style="color: #00A8E6;">' . get_search_query() . '</span>'); ?>
                </h1>
            <?php elseif (is_archive()): ?>
                <div style="
                    display: inline-block;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 0.5rem 1.5rem;
                    border-radius: 30px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    margin-bottom: 2rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    border: 1px solid rgba(255, 255, 255, 0.2);
                ">Archive</div>
                <h1 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                ">
                    <?php the_archive_title(); ?>
                </h1>
                <?php if (get_the_archive_description()): ?>
                <p style="
                    font-size: 1.2rem;
                    color: rgba(255, 255, 255, 0.9);
                    margin: 0;
                    line-height: 1.6;
                ">
                    <?php the_archive_description(); ?>
                </p>
                <?php endif; ?>
            <?php else: ?>
                <h1 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                ">
                    <?php _e('Latest Updates', 'vortex-eco'); ?>
                </h1>
                <p style="
                    font-size: 1.2rem;
                    color: rgba(255, 255, 255, 0.9);
                    margin: 0;
                    line-height: 1.6;
                ">
                    <?php _e('Stay informed with the latest news and insights from the wind energy industry', 'vortex-eco'); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="main-content" style="
    padding: 6rem 0;
    background: linear-gradient(180deg, #F8FAFB 0%, #FFFFFF 100%);
">
    <div class="container">
        <div style="
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
        ">
            <!-- Posts Column -->
            <main class="posts-container">
                <?php if (have_posts()): ?>
                    
                    <!-- Posts Grid -->
                    <div class="posts-grid" style="
                        display: grid;
                        gap: 2rem;
                        margin-bottom: 3rem;
                    ">
                        <?php while (have_posts()): the_post(); ?>
                            
                            <!-- Post Card -->
                            <article class="post" style="
                                background: #FFFFFF;
                                border-radius: 20px;
                                overflow: hidden;
                                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                                transition: all 0.4s ease;
                                border: 1px solid #E5E7EB;
                            ">
                                <?php if (has_post_thumbnail()): ?>
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail" style="
                                    width: 100%;
                                    height: 250px;
                                    background: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>') center/cover;
                                    position: relative;
                                ">
                                    <!-- Category Badge -->
                                    <?php $categories = get_the_category(); ?>
                                    <?php if (!empty($categories)): ?>
                                    <div style="
                                        position: absolute;
                                        top: 1rem;
                                        left: 1rem;
                                        background: linear-gradient(135deg, #1263A0, #00A8E6);
                                        color: white;
                                        padding: 0.5rem 1rem;
                                        border-radius: 20px;
                                        font-size: 0.8rem;
                                        font-weight: 600;
                                        text-transform: uppercase;
                                        letter-spacing: 0.5px;
                                    ">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <!-- Read More Overlay -->
                                    <div style="
                                        position: absolute;
                                        bottom: 0;
                                        left: 0;
                                        right: 0;
                                        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
                                        padding: 2rem 1rem 1rem;
                                        opacity: 0;
                                        transition: opacity 0.3s ease;
                                    " class="post-overlay">
                                        <a href="<?php the_permalink(); ?>" style="
                                            color: white;
                                            font-weight: 600;
                                            text-decoration: none;
                                            display: inline-flex;
                                            align-items: center;
                                            gap: 0.5rem;
                                        ">
                                            <?php _e('Read More', 'vortex-eco'); ?>
                                            <span>→</span>
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <!-- Post Content -->
                                <div class="post-content" style="padding: 2rem;">
                                    <!-- Post Meta -->
                                    <div class="post-meta" style="
                                        display: flex;
                                        align-items: center;
                                        gap: 1rem;
                                        margin-bottom: 1rem;
                                        font-size: 0.9rem;
                                        color: #6B7280;
                                    ">
                                        <span style="
                                            display: flex;
                                            align-items: center;
                                            gap: 0.5rem;
                                        ">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                            </svg>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        
                                        <span style="
                                            display: flex;
                                            align-items: center;
                                            gap: 0.5rem;
                                        ">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                            <?php the_author(); ?>
                                        </span>
                                        
                                        <?php if (get_comments_number() > 0): ?>
                                        <span style="
                                            display: flex;
                                            align-items: center;
                                            gap: 0.5rem;
                                        ">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                                            </svg>
                                            <?php comments_number('0', '1', '%'); ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Post Title -->
                                    <h2 class="post-title" style="
                                        font-size: 1.5rem;
                                        font-weight: 700;
                                        color: #1F2937;
                                        margin-bottom: 1rem;
                                        line-height: 1.3;
                                    ">
                                        <a href="<?php the_permalink(); ?>" style="
                                            color: inherit;
                                            text-decoration: none;
                                            transition: color 0.3s ease;
                                        ">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <!-- Post Excerpt -->
                                    <div class="post-excerpt" style="
                                        color: #6B7280;
                                        line-height: 1.6;
                                        margin-bottom: 1.5rem;
                                    ">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <!-- Read More Button -->
                                    <a href="<?php the_permalink(); ?>" class="read-more" style="
                                        color: #1263A0;
                                        font-weight: 600;
                                        display: inline-flex;
                                        align-items: center;
                                        gap: 0.5rem;
                                        text-decoration: none;
                                        transition: all 0.3s ease;
                                        font-size: 0.95rem;
                                    ">
                                        <?php _e('Read Full Article', 'vortex-eco'); ?>
                                        <span style="transition: transform 0.3s ease;">→</span>
                                    </a>
                                </div>
                            </article>
                            
                        <?php endwhile; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if (get_next_posts_link() || get_previous_posts_link()): ?>
                    <nav class="pagination" style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 1rem;
                        margin-top: 3rem;
                    ">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '<span style="display: flex; align-items: center; gap: 0.5rem;">← ' . __('Previous', 'vortex-eco') . '</span>',
                            'next_text' => '<span style="display: flex; align-items: center; gap: 0.5rem;">' . __('Next', 'vortex-eco') . ' →</span>',
                            'before_page_number' => '<span style="padding: 0.75rem 1rem; border: 1px solid #E5E7EB; border-radius: 8px; color: #4B5563; text-decoration: none; transition: all 0.3s ease; background: white;">',
                            'after_page_number' => '</span>',
                        ));
                        ?>
                    </nav>
                    <?php endif; ?>
                    
                <?php else: ?>
                    
                    <!-- No Posts Found -->
                    <div style="
                        text-align: center;
                        padding: 4rem 2rem;
                        background: #FFFFFF;
                        border-radius: 20px;
                        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                    ">
                        <div style="
                            width: 80px;
                            height: 80px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin: 0 auto 2rem;
                            font-size: 2rem;
                            color: white;
                        ">📝</div>
                        
                        <h2 style="
                            font-size: 1.8rem;
                            font-weight: 700;
                            color: #1F2937;
                            margin-bottom: 1rem;
                        ">
                            <?php if (is_search()): ?>
                                <?php _e('No results found', 'vortex-eco'); ?>
                            <?php else: ?>
                                <?php _e('No posts found', 'vortex-eco'); ?>
                            <?php endif; ?>
                        </h2>
                        
                        <p style="
                            color: #6B7280;
                            margin-bottom: 2rem;
                            font-size: 1.1rem;
                            line-height: 1.6;
                        ">
                            <?php if (is_search()): ?>
                                <?php _e('Sorry, no content matched your search criteria. Please try different keywords.', 'vortex-eco'); ?>
                            <?php else: ?>
                                <?php _e('It looks like nothing was found at this location. Maybe try searching for something else?', 'vortex-eco'); ?>
                            <?php endif; ?>
                        </p>
                        
                        <!-- Search Form -->
                        <form role="search" method="get" action="<?php echo home_url('/'); ?>" style="
                            display: flex;
                            max-width: 400px;
                            margin: 0 auto;
                            gap: 0.5rem;
                        ">
                            <input type="search" name="s" placeholder="<?php _e('Search...', 'vortex-eco'); ?>" style="
                                flex: 1;
                                padding: 1rem;
                                border: 1px solid #D1D5DB;
                                border-radius: 8px;
                                font-size: 1rem;
                            " />
                            <button type="submit" style="
                                background: linear-gradient(135deg, #1263A0, #00A8E6);
                                color: white;
                                border: none;
                                padding: 1rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">
                                <?php _e('Search', 'vortex-eco'); ?>
                            </button>
                        </form>
                    </div>
                    
                <?php endif; ?>
            </main>
            
            <!-- Sidebar -->
            <aside class="sidebar">
                
                <!-- Search Widget -->
                <div class="widget" style="
                    background: #FFFFFF;
                    border: 1px solid #E5E7EB;
                    border-radius: 16px;
                    padding: 2rem;
                    margin-bottom: 2rem;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                ">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <span style="
                            width: 24px;
                            height: 24px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            border-radius: 6px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-size: 0.8rem;
                        ">🔍</span>
                        <?php _e('Search', 'vortex-eco'); ?>
                    </h3>
                    
                    <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                        <div style="
                            display: flex;
                            gap: 0.5rem;
                        ">
                            <input type="search" name="s" placeholder="<?php _e('Search articles...', 'vortex-eco'); ?>" style="
                                flex: 1;
                                padding: 0.75rem;
                                border: 1px solid #D1D5DB;
                                border-radius: 8px;
                                font-size: 0.9rem;
                            " />
                            <button type="submit" style="
                                background: #1263A0;
                                color: white;
                                border: none;
                                padding: 0.75rem 1rem;
                                border-radius: 8px;
                                font-weight: 500;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                font-size: 0.9rem;
                            ">
                                <?php _e('Go', 'vortex-eco'); ?>
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Categories Widget -->
                <?php $categories = get_categories(array('hide_empty' => true)); ?>
                <?php if (!empty($categories)): ?>
                <div class="widget" style="
                    background: #FFFFFF;
                    border: 1px solid #E5E7EB;
                    border-radius: 16px;
                    padding: 2rem;
                    margin-bottom: 2rem;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                ">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <span style="
                            width: 24px;
                            height: 24px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            border-radius: 6px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-size: 0.8rem;
                        ">📂</span>
                        <?php _e('Categories', 'vortex-eco'); ?>
                    </h3>
                    
                    <ul style="list-style: none; margin: 0; padding: 0;">
                        <?php foreach ($categories as $category): ?>
                        <li style="
                            border-bottom: 1px solid #F3F4F6;
                            padding: 0.75rem 0;
                        ">
                            <a href="<?php echo get_category_link($category->term_id); ?>" style="
                                color: #4B5563;
                                text-decoration: none;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                transition: color 0.3s ease;
                                font-size: 0.95rem;
                            ">
                                <span><?php echo esc_html($category->name); ?></span>
                                <span style="
                                    background: #F3F4F6;
                                    color: #6B7280;
                                    padding: 0.25rem 0.5rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                "><?php echo $category->count; ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <!-- Recent Posts Widget -->
                <?php
                $recent_posts = get_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                ?>
                <?php if (!empty($recent_posts)): ?>
                <div class="widget" style="
                    background: #FFFFFF;
                    border: 1px solid #E5E7EB;
                    border-radius: 16px;
                    padding: 2rem;
                    margin-bottom: 2rem;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                ">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <span style="
                            width: 24px;
                            height: 24px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            border-radius: 6px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-size: 0.8rem;
                        ">📰</span>
                        <?php _e('Recent Posts', 'vortex-eco'); ?>
                    </h3>
                    
                    <ul style="list-style: none; margin: 0; padding: 0;">
                        <?php foreach ($recent_posts as $post): ?>
                        <li style="
                            border-bottom: 1px solid #F3F4F6;
                            padding: 1rem 0;
                        ">
                            <a href="<?php echo get_permalink($post->ID); ?>" style="
                                color: #1F2937;
                                text-decoration: none;
                                display: block;
                                transition: color 0.3s ease;
                            ">
                                <h4 style="
                                    font-size: 0.95rem;
                                    font-weight: 600;
                                    margin-bottom: 0.5rem;
                                    line-height: 1.4;
                                ">
                                    <?php echo get_the_title($post->ID); ?>
                                </h4>
                                <p style="
                                    color: #6B7280;
                                    font-size: 0.85rem;
                                    margin: 0;
                                ">
                                    <?php echo get_the_date('', $post->ID); ?>
                                </p>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <!-- Contact CTA Widget -->
                <div class="widget" style="
                    background: linear-gradient(135deg, #1263A0 0%, #0F5287 100%);
                    color: white;
                    border-radius: 16px;
                    padding: 2rem;
                    margin-bottom: 2rem;
                    text-align: center;
                    position: relative;
                    overflow: hidden;
                ">
                    <div style="
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: radial-gradient(circle at 30% 20%, rgba(0, 168, 230, 0.3) 0%, transparent 50%);
                        opacity: 0.6;
                    "></div>
                    
                    <div style="position: relative; z-index: 2;">
                        <div style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255, 255, 255, 0.1);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin: 0 auto 1rem;
                            font-size: 1.5rem;
                        ">💬</div>
                        
                        <h3 style="
                            font-size: 1.2rem;
                            font-weight: 700;
                            margin-bottom: 1rem;
                        ">
                            <?php _e('Need Expert Advice?', 'vortex-eco'); ?>
                        </h3>
                        
                        <p style="
                            color: rgba(255, 255, 255, 0.9);
                            margin-bottom: 1.5rem;
                            font-size: 0.95rem;
                        ">
                            <?php _e('Get professional wind energy consulting tailored to your project needs.', 'vortex-eco'); ?>
                        </p>
                        
                        <a href="#contact" style="
                            background: rgba(255, 255, 255, 0.1);
                            color: white;
                            padding: 0.75rem 1.5rem;
                            border-radius: 25px;
                            text-decoration: none;
                            font-weight: 600;
                            font-size: 0.9rem;
                            transition: all 0.3s ease;
                            border: 1px solid rgba(255, 255, 255, 0.3);
                            display: inline-block;
                        ">
                            <?php _e('Contact Us', 'vortex-eco'); ?>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Additional CSS for interactions -->
<style>
.post:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.15);
    border-color: #00A8E6;
}

.post:hover .post-overlay {
    opacity: 1;
}

.post-title a:hover {
    color: #1263A0;
}

.read-more:hover {
    gap: 0.75rem;
}

.read-more:hover span {
    transform: translateX(3px);
}

.widget:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(18, 99, 160, 0.1);
    border-color: rgba(0, 168, 230, 0.3);
}

.widget ul li a:hover {
    color: #1263A0;
}

.pagination a:hover {
    background: #1263A0 !important;
    color: white !important;
    border-color: #1263A0 !important;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .main-content > .container > div {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    .page-header {
        padding: 6rem 0 3rem !important;
    }
    
    .posts-grid {
        gap: 1.5rem !important;
    }
    
    .post-content {
        padding: 1.5rem !important;
    }
    
    .widget {
        padding: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }
}
</style>

<?php get_footer(); ?>