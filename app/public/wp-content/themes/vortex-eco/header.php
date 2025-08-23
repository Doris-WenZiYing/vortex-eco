<?php
/**
 * The header for our theme
 *
 * @package VortexEco
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link sr-only" href="#main"><?php esc_html_e('Skip to content', 'vortex-eco'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </p>
                        <?php
                    endif;
                    
                    $vortexeco_description = get_bloginfo('description', 'display');
                    if ($vortexeco_description || is_customize_preview()) :
                        ?>
                        <p class="site-description sr-only"><?php echo $vortexeco_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    <?php endif; ?>
                </div>

                <nav id="site-navigation" class="main-navigation">
                    <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="sr-only"><?php esc_html_e('Menu', 'vortex-eco'); ?></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'fallback_cb'    => 'vortexeco_fallback_menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>

    <?php
    // Add custom header image on non-homepage
    if (!is_front_page() && (has_header_image() || get_theme_mod('page_header_enable', true))) :
        $header_image = get_header_image();
        $header_text = '';
        
        if (is_singular()) {
            $header_text = get_the_title();
        } elseif (is_archive()) {
            $header_text = get_the_archive_title();
        } elseif (is_search()) {
            $header_text = sprintf(esc_html__('Search Results for: %s', 'vortex-eco'), get_search_query());
        } elseif (is_404()) {
            $header_text = esc_html__('Page Not Found', 'vortex-eco');
        }
        ?>
        
        <div class="page-header" style="
            background: linear-gradient(var(--gradient-overlay)), <?php echo $header_image ? "url($header_image)" : 'var(--gradient-primary)'; ?>;
            background-size: cover;
            background-position: center;
            padding: calc(var(--header-height) + 60px) 0 60px;
            color: white;
            text-align: center;
            position: relative;
        ">
            <div class="container">
                <?php if ($header_text) : ?>
                    <h1 class="page-title" style="
                        font-size: clamp(2rem, 5vw, 3.5rem);
                        margin: 0;
                        color: white;
                        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
                    ">
                        <?php echo esc_html($header_text); ?>
                    </h1>
                <?php endif; ?>
                
                <?php
                // Breadcrumbs
                if (function_exists('yoast_breadcrumb') || function_exists('rank_math_the_breadcrumbs')) :
                    echo '<nav class="breadcrumbs" style="margin-top: 1rem; color: rgba(255,255,255,0.8);">';
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                    } elseif (function_exists('rank_math_the_breadcrumbs')) {
                        rank_math_the_breadcrumbs();
                    }
                    echo '</nav>';
                endif;
                ?>
            </div>
        </div>
    <?php endif; ?>

    <div id="content" class="site-content">

<?php
/**
 * Fallback menu for when no menu is assigned
 */
function vortexeco_fallback_menu() {
    echo '<ul id="primary-menu" class="menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'vortex-eco') . '</a></li>';
    
    // Add pages to menu
    $pages = get_pages(array(
        'sort_order' => 'ASC',
        'sort_column' => 'menu_order',
        'number' => 5
    ));
    
    foreach ($pages as $page) {
        echo '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html($page->post_title) . '</a></li>';
    }
    
    // Add blog link if not on front page
    if (get_option('page_for_posts')) {
        echo '<li><a href="' . esc_url(get_permalink(get_option('page_for_posts'))) . '">' . esc_html__('Blog', 'vortex-eco') . '</a></li>';
    }
    
    echo '</ul>';
}
?>