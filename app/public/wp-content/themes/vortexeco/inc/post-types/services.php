<?php
/**
 * Services Custom Post Type
 */

if (!defined('ABSPATH')) exit;

function vortexeco_register_services_cpt() {
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => '服务',
            'add_new' => 'Add Service',
            'add_new_item' => 'Add Service item',
            'edit_item' => 'Edit Service',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'services'),
    ));
}
add_action('init', 'vortexeco_register_services_cpt');