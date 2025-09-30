<?php
/**
 * Widget Areas
 * 小工具区域注册
 */

if (!defined('ABSPATH')) exit;

/**
 * 注册小工具区域
 */
function vortexeco_widgets_init() {
    // 主侧边栏
    register_sidebar(array(
        'name'          => __('主侧边栏', 'vortex-eco'),
        'id'            => 'sidebar-1',
        'description'   => __('显示在侧边栏的小工具', 'vortex-eco'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Footer 小工具区域
    register_sidebar(array(
        'name'          => __('Footer 小工具', 'vortex-eco'),
        'id'            => 'footer-widgets',
        'description'   => __('显示在页脚的小工具', 'vortex-eco'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    // Footer 栏位 1-4（4 栏布局）
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(__('Footer 栏位 %d', 'vortex-eco'), $i),
            'id'            => 'footer-column-' . $i,
            'description'   => sprintf(__('页脚第 %d 栏', 'vortex-eco'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }
}
add_action('widgets_init', 'vortexeco_widgets_init');