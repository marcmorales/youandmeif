<?php

// Linking CSS/JS
function youandmeif_script_enqueue() {
    
    /*
    -css-
    Bootstrap grid system
    */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('youandmeifstyle', get_template_directory_uri() . '/css/youandmeif.css', array(), '1.0.0', 'all');
    
    /*
    -js-
    Google Jquery 2.2.4 CDN
    */
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.4');
    wp_enqueue_script('jquery');
    wp_enqueue_script('youandmeifjs', get_template_directory_uri() . '/js/youandmeif.js', array(), '1.0.0', true);
    
}
add_action('wp_enqueue_scripts', 'youandmeif_script_enqueue');

// Removing default Wordpress top-margin 32px !important class
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// Navigation Menu
function  youandmeif_theme_setup() {
    add_theme_support('menus');
    
    register_nav_menus( array(
    'primary' => __('You&Me Primary Menu'),
    'footer' => __('You&Me Footer Menu'),
    ));
}
add_action('init', 'youandmeif_theme_setup');

// Theme supports
function youandmeif_theme_support() {
    
    // front-page banner
    add_theme_support('custom-header');
    
    // featured image support
    add_theme_support('post-thumbnails');
    add_image_size('medium-thumbnail');
    
    // post formats
    add_theme_support('post-formats', array(
        'aside', 'gallery', 'image', 'status', 'video'));
}
add_action('after_setup_theme', 'youandmeif_theme_support');

// Applying Categories to Attachments
function youandmeif_category_attachments() {
    register_taxonomy_for_object_type('category', 'attachment');
}
add_action('init', 'youandmeif_category_attachments');

// Child-page layout
function youandmeif_childPage() {
    
    global $post;
    
    if($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
}

// Custom excerpt word-count length
function youandmeif_excerpt_length() {
    return 40;
}
add_filter('excerpt_length', 'youandmeif_excerpt_length');

