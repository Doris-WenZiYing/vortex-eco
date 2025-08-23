<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package VortexEco
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <section class="error-404 not-found" style="
            text-align: center;
            padding: 4rem 2rem;
            max-width: 800px;
            margin: 0 auto;
        ">
            
            <!-- 404 Illustration -->
            <div class="error-illustration" style="
                font-size: clamp(8rem, 15vw, 12rem);
                font-weight: 700;
                background: var(--gradient-primary);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 2rem;
                line-height: 1;
            ">
                404
            </div>
            
            <!-- Error Icon -->
            <div style="
                font-size: 4rem;
                margin-bottom: 2rem;
                opacity: 0.8;
            ">
                🌪️
            </div>
            
            <!-- Error Message -->
            <header class="page-header" style="margin-bottom: 3rem;">
                <h1 class="page-title" style="
                    font-size: clamp(2rem, 4vw, 3rem);
                    margin-bottom: 1rem;
                    color: var(--text-dark);
                ">
                    <?php esc_html_e('Oops! Page Not Found', 'vortex-eco'); ?>
                </h1>
                
                <p style="
                    font-size: 1.3rem;
                    color: var(--text-medium);
                    margin-bottom: 2rem;
                    line-height: 1.6;
                ">
                    <?php esc_html_e('The page you were looking for appears to have been moved, deleted or does not exist.', 'vortex-eco'); ?>
                </p>
                
                <p style="
                    font-size: 1.1rem;
                    color: var(--text-light);
                ">
                    <?php esc_html_e("Don't worry, let's get you back on track!", 'vortex-eco'); ?>
                </p>
            </header>

            <!-- Search Form -->
            <div class="error-search" style="
                background: var(--bg-white);
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
                margin-bottom: 3rem;
            ">
                <h3 style="
                    margin-bottom: 1.5rem;
                    color: var(--primary-color);
                    font-size: 1.5rem;
                ">
                    <?php esc_html_e('Search Our Site', 'vortex-eco'); ?>
                </h3>
                
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="
                    display: flex;
                    gap: 1rem;
                    max-width: 500px;
                    margin: 0 auto;
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

            <!-- Quick Links -->
            <div class="error-links" style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
                margin-bottom: 3rem;
            ">
                <div class="link-card" style="
                    background: var(--bg-white);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    transition: var(--transition);
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">🏠</div>
                    <h4 style="margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Home Page', 'vortex-eco'); ?>
                    </h4>
                    <p style="color: var(--text-medium); margin-bottom: 1.5rem; font-size: 0.95rem;">
                        <?php esc_html_e('Return to our homepage and explore our wind energy consulting services.', 'vortex-eco'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-outline btn-sm">
                        <?php esc_html_e('Go Home', 'vortex-eco'); ?>
                    </a>
                </div>

                <div class="link-card" style="
                    background: var(--bg-white);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    transition: var(--transition);
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                    <h4 style="margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Our Services', 'vortex-eco'); ?>
                    </h4>
                    <p style="color: var(--text-medium); margin-bottom: 1.5rem; font-size: 0.95rem;">
                        <?php esc_html_e('Discover our comprehensive wind energy consulting expertise.', 'vortex-eco'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/#services')); ?>" class="btn btn-outline btn-sm">
                        <?php esc_html_e('View Services', 'vortex-eco'); ?>
                    </a>
                </div>

                <div class="link-card" style="
                    background: var(--bg-white);
                    padding: 2rem;
                    border-radius: var(--border-radius-lg);
                    box-shadow: var(--shadow-sm);
                    transition: var(--transition);
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">📞</div>
                    <h4 style="margin-bottom: 1rem; color: var(--primary-color);">
                        <?php esc_html_e('Contact Us', 'vortex-eco'); ?>
                    </h4>
                    <p style="color: var(--text-medium); margin-bottom: 1.5rem; font-size: 0.95rem;">
                        <?php esc_html_e('Get in touch with our expert team for your wind energy project.', 'vortex-eco'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-sm">
                        <?php esc_html_e('Contact Us', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>

            <!-- Popular Content -->
            <?php
            $popular_posts = get_posts(array(
                'numberposts' => 3,
                'meta_key' => 'wpb_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            ));

            if (empty($popular_posts)) {
                $popular_posts = get_posts(array(
                    'numberposts' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
            }

            if ($popular_posts) : ?>
                <div class="popular-content" style="
                    background: var(--bg-light);
                    padding: 3rem 2rem;
                    border-radius: var(--border-radius-lg);
                    margin-bottom: 2rem;
                ">
                    <h3 style="
                        text-align: center;
                        margin-bottom: 2rem;
                        color: var(--primary-color);
                        font-size: 1.8rem;
                    ">
                        <?php esc_html_e('Popular Content', 'vortex-eco'); ?>
                    </h3>
                    
                    <div style="
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                        gap: 2rem;
                    ">
                        <?php foreach ($popular_posts as $post) : ?>
                            <article style="
                                background: var(--bg-white);
                                border-radius: var(--border-radius);
                                overflow: hidden;
                                transition: var(--transition);
                            " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                                
                                <?php if (has_post_thumbnail($post->ID)) : ?>
                                    <div style="height: 150px; overflow: hidden;">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <?php echo get_the_post_thumbnail($post->ID, 'medium', array(
                                                'style' => 'width: 100%; height: 100%; object-fit: cover;'
                                            )); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div style="padding: 1.5rem;">
                                    <h4 style="
                                        margin-bottom: 0.5rem;
                                        font-size: 1.1rem;
                                        line-height: 1.4;
                                    ">
                                        <a href="<?php echo get_permalink($post->ID); ?>" style="color: var(--text-dark);">
                                            <?php echo get_the_title($post->ID); ?>
                                        </a>
                                    </h4>
                                    
                                    <div style="
                                        font-size: 0.85rem;
                                        color: var(--text-light);
                                        margin-bottom: 1rem;
                                    ">
                                        <?php echo get_the_date('', $post->ID); ?>
                                    </div>
                                    
                                    <p style="
                                        color: var(--text-medium);
                                        font-size: 0.9rem;
                                        line-height: 1.5;
                                        margin: 0;
                                    ">
                                        <?php echo wp_trim_words(get_the_excerpt($post->ID), 15); ?>
                                    </p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Help Text -->
            <div class="error-help" style="
                background: var(--bg-white);
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-sm);
                border-left: 4px solid var(--accent-color);
            ">
                <h4 style="
                    margin-bottom: 1rem;
                    color: var(--primary-color);
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                ">
                    💡 <?php esc_html_e('Still Need Help?', 'vortex-eco'); ?>
                </h4>
                
                <p style="color: var(--text-medium); margin-bottom: 1.5rem;">
                    <?php esc_html_e('If you believe this is an error or you need assistance finding specific information about our wind energy consulting services, please contact our team directly.', 'vortex-eco'); ?>
                </p>
                
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                    <a href="mailto:info@vortexeco.com" class="btn btn-primary" style="display: flex; align-items: center; gap: 0.5rem;">
                        📧 <?php esc_html_e('Email Support', 'vortex-eco'); ?>
                    </a>
                    <a href="tel:+1-555-123-4567" class="btn btn-outline" style="display: flex; align-items: center; gap: 0.5rem;">
                        📞 <?php esc_html_e('Call Us', 'vortex-eco'); ?>
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- 404 Page Specific Styles -->
<style>
@media (max-width: 768px) {
    .error-404 {
        padding: 2rem 1rem !important;
    }
    
    .error-links {
        grid-template-columns: 1fr !important;
    }
    
    .error-search form {
        flex-direction: column !important;
    }
    
    .error-help .btn {
        flex: 1;
        justify-content: center;
    }
}

/* Add some animation to the 404 number */
.error-illustration {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Add hover effects to cards */
.link-card {
    cursor: pointer;
}

.link-card:hover .btn {
    background: var(--primary-color) !important;
    color: white !important;
    border-color: var(--primary-color) !important;
}
</style>

<?php
get_footer();
?>