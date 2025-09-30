<?php
/**
 * Rewrite Rules
 * URL 重写规则设定
 */

if (!defined('ABSPATH')) exit;

/**
 * 添加自定义 URL 重写规则
 */
function vortexeco_add_rewrite_rules() {
    // 产品详细页面
    add_rewrite_rule(
        '^product-detail/?$',
        'index.php?pagename=product-detail',
        'top'
    );
    
    // 服务详细页面
    add_rewrite_rule(
        '^service-detail/?$',
        'index.php?pagename=service-detail',
        'top'
    );
    
    // 如果需要其他自定义 URL，在此添加
    // 例如: add_rewrite_rule('^custom-page/?$', 'index.php?pagename=custom-page', 'top');
}
add_action('init', 'vortexeco_add_rewrite_rules');

/**
 * 主题启动时刷新重写规则
 */
function vortexeco_flush_rewrite_on_activation() {
    vortexeco_add_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'vortexeco_flush_rewrite_on_activation');

/**
 * 检查并刷新重写规则（只执行一次）
 */
function vortexeco_check_flush_rewrite_rules() {
    $version_option = 'vortexeco_rewrite_version';
    $current_version = '2.0'; // 每次修改规则时更新版本号
    
    if (get_option($version_option) !== $current_version) {
        vortexeco_add_rewrite_rules();
        flush_rewrite_rules();
        update_option($version_option, $current_version);
    }
}
add_action('init', 'vortexeco_check_flush_rewrite_rules');

/**
 * 主题停用时清理重写规则
 */
function vortexeco_deactivation_cleanup() {
    flush_rewrite_rules();
    delete_option('vortexeco_rewrite_version');
}
register_deactivation_hook(__FILE__, 'vortexeco_deactivation_cleanup');