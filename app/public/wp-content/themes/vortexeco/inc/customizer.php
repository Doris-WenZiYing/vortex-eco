<?php
/**
 * Theme Customizer
 * 主題自訂器設置 - 整合所有自訂選項
 */

if (!defined('ABSPATH')) exit;

/**
 * 註冊所有自訂器設置
 */
function vortexeco_customize_register($wp_customize) {
    
    // ========================================
    // LOGO 設置
    // ========================================
    $wp_customize->add_section('vortexeco_logos', array(
        'title'    => __('Logo 設置', 'vortex-eco'),
        'priority' => 20,
    ));
    
    // Header Logo
    $wp_customize->add_setting('mytheme_header_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_header_logo', array(
        'label'    => __('Header Logo', 'mytheme'),
        'section'  => 'vortexeco_logos',
    )));
    
    // Footer Logo
    $wp_customize->add_setting('mytheme_footer_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_footer_logo', array(
        'label'    => __('Footer Logo', 'mytheme'),
        'section'  => 'vortexeco_logos',
    )));
    
    // Other Logo
    $wp_customize->add_setting('mytheme_other_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_other_logo', array(
        'label'    => __('Other Logo', 'mytheme'),
        'section'  => 'vortexeco_logos',
    )));
    
    // ========================================
    // HEADER 自訂
    // ========================================
    $wp_customize->add_section('vortexeco_header_custom', array(
        'title'    => __('Header 自訂', 'vortex-eco'),
        'priority' => 30,
    ));
    
    // Header Background Color
    $wp_customize->add_setting('header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header 背景顏色', 'vortex-eco'),
        'section'  => 'vortexeco_header_custom',
    )));
    
    // Header Text Color
    $wp_customize->add_setting('header_text_color', array(
        'default'           => '#1263A0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label'    => __('Header 文字顏色', 'vortex-eco'),
        'section'  => 'vortexeco_header_custom',
    )));
    
    // Company Name
    $wp_customize->add_setting('company_name', array(
        'default'           => 'VORTEXECO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_name', array(
        'label'   => __('公司名稱', 'vortex-eco'),
        'section' => 'vortexeco_header_custom',
        'type'    => 'text',
    ));
    
    // ========================================
    // HERO SECTION
    // ========================================
    $wp_customize->add_section('vortexeco_hero_custom', array(
        'title'    => __('Hero 區塊設置', 'vortex-eco'),
        'priority' => 31,
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image', array(
        'label'    => __('Hero 背景圖片', 'vortex-eco'),
        'section'  => 'vortexeco_hero_custom',
    )));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Professional Wind Energy Consulting Solutions',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero 標題', 'vortex-eco'),
        'section' => 'vortexeco_hero_custom',
        'type'    => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'VORTEXECO SOLUTIONS brings together wind industry experts...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero 副標題', 'vortex-eco'),
        'section' => 'vortexeco_hero_custom',
        'type'    => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_text', array(
        'label'   => __('Hero 按鈕文字', 'vortex-eco'),
        'section' => 'vortexeco_hero_custom',
        'type'    => 'text',
    ));
    
    // ========================================
    // SERVICES PAGE SLIDER
    // ========================================
    $wp_customize->add_section('services_slider', array(
        'title'    => __('服務頁圖片', 'vortex-eco'),
        'priority' => 32,
    ));

    // Hero 背景圖（沒有默認值）
    $wp_customize->add_setting('services_hero_image', array(
        'default'           => '', // 空的，沒有默認值
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'services_hero_image', array(
        'label'    => __('服務頁 Hero 背景圖片', 'vortex-eco'),
        'section'  => 'services_slider',
        'priority' => 1,
    )));

    // Slider 圖片 1-3（沒有默認值）
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("services_slider_image_$i", array(
            'default'           => '', // 空的，沒有默認值
            'sanitize_callback' => 'esc_url_raw'
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "services_slider_image_$i", array(
            'label'    => "Slider 圖片 $i",
            'section'  => 'services_slider',
            'priority' => $i + 1,
        )));
    }
    
    // ========================================
    // CERTIFICATIONS
    // ========================================
    $wp_customize->add_section('certifications', array(
        'title'    => __('認證標誌', 'vortex-eco'),
        'priority' => 33,
    ));
    
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("cert_image_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "cert_image_$i", array(
            'label'   => "認證標誌 $i",
            'section' => 'certifications',
        )));
    }
    
    // ========================================
    // COLOR SCHEME
    // ========================================
    $wp_customize->add_section('vortexeco_colors', array(
        'title'    => __('色彩配置', 'vortex-eco'),
        'priority' => 34,
    ));
    
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#1263A0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('主要顏色', 'vortex-eco'),
        'section'  => 'vortexeco_colors',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#00A8E6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('次要顏色', 'vortex-eco'),
        'section'  => 'vortexeco_colors',
    )));
    
    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#059669',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('強調色', 'vortex-eco'),
        'section'  => 'vortexeco_colors',
    )));
    
    // ========================================
    // ABOUT SECTION
    // ========================================
    $wp_customize->add_section('vortexeco_about_custom', array(
        'title'    => __('關於區塊', 'vortex-eco'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('about_title', array(
        'default'           => 'Comprehensive Wind Energy Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label'   => __('關於標題', 'vortex-eco'),
        'section' => 'vortexeco_about_custom',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('about_subtitle', array(
        'default'           => 'Focused on Every Detail',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_subtitle', array(
        'label'   => __('關於副標題', 'vortex-eco'),
        'section' => 'vortexeco_about_custom',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('about_description', array(
        'default'           => 'Want to make your project faster, more stable, and more sustainably competitive?',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_description', array(
        'label'   => __('關於描述', 'vortex-eco'),
        'section' => 'vortexeco_about_custom',
        'type'    => 'textarea',
    ));
    
    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'    => __('關於區塊圖片', 'vortex-eco'),
        'section'  => 'vortexeco_about_custom',
    )));
    
    // ========================================
    // COMPANY INFORMATION
    // ========================================
    $wp_customize->add_section('vortexeco_company', array(
        'title'    => __('公司資訊', 'vortex-eco'),
        'priority' => 36,
    ));
    
    $wp_customize->add_setting('company_phone', array(
        'default'           => '+65 (3) 1258302',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_phone', array(
        'label'   => __('電話號碼', 'vortex-eco'),
        'section' => 'vortexeco_company',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('company_email', array(
        'default'           => 'TSD@vortexeco.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('company_email', array(
        'label'   => __('電子郵件', 'vortex-eco'),
        'section' => 'vortexeco_company',
        'type'    => 'email',
    ));
    
    $wp_customize->add_setting('company_address', array(
        'default'           => '51 GOLDHILL PLAZA #20-07 SINGAPORE (308900)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('company_address', array(
        'label'   => __('地址', 'vortex-eco'),
        'section' => 'vortexeco_company',
        'type'    => 'textarea',
    ));
    
    // ========================================
    // FOOTER CUSTOMIZATION
    // ========================================
    $wp_customize->add_section('vortexeco_footer_custom', array(
        'title'    => __('Footer 自訂', 'vortex-eco'),
        'priority' => 37,
    ));
    
    $wp_customize->add_setting('footer_bg_color', array(
        'default'           => '#1F2937',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'    => __('Footer 背景顏色', 'vortex-eco'),
        'section'  => 'vortexeco_footer_custom',
    )));
    
    $wp_customize->add_setting('footer_description', array(
        'default'           => 'Leading wind energy consulting firm providing comprehensive services...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_description', array(
        'label'   => __('Footer 描述', 'vortex-eco'),
        'section' => 'vortexeco_footer_custom',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'vortexeco_customize_register');

/**
 * 輸出自訂器 CSS
 */
function vortexeco_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#1263A0');
    $secondary_color = get_theme_mod('secondary_color', '#00A8E6');
    $accent_color = get_theme_mod('accent_color', '#059669');
    $header_bg_color = get_theme_mod('header_bg_color', '#ffffff');
    $header_text_color = get_theme_mod('header_text_color', '#1263A0');
    $footer_bg_color = get_theme_mod('footer_bg_color', '#1F2937');
    
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
        }
        
        .site-header {
            background-color: <?php echo esc_attr($header_bg_color); ?>;
        }
        
        .site-branding div:last-child {
            color: <?php echo esc_attr($header_text_color); ?>;
        }
        
        .site-footer {
            background: <?php echo esc_attr($footer_bg_color); ?>;
        }
        
        /* 主要顏色應用 */
        .btn-primary,
        .filter-btn.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        /* 文字顏色 */
        .site-branding a,
        .main-navigation a:hover {
            color: var(--primary-color);
        }
        
        /* 邊框和強調色 */
        .card:hover {
            border-color: var(--secondary-color);
        }
    </style>
    <?php
}
add_action('wp_head', 'vortexeco_customizer_css');