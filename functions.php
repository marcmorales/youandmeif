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
    MatchHeight 0.7.0 Local
    */
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.4');
    wp_enqueue_script('jquery');
    wp_enqueue_script('matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array(), '0.7.0', true);
    wp_enqueue_script('youandmeifjs', get_template_directory_uri() . '/js/youandmeif.js', array(), '1.0.0', true);
    // custom js
    wp_enqueue_script('mycustom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
    
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
    'primary'   => __('You&Me Primary Menu'),
    'secondary' => __('You&Me Secondary Menu'),
    'footer'    => __('You&Me Footer Menu'),
    ));
}
add_action('init', 'youandmeif_theme_setup');

// Theme supports
function youandmeif_theme_support() {
    
    // Page banner and logo
    add_theme_support('custom-logo', array(
        'height'        => 100,
        'width'         => 300,
        'flex-height'   => true,
        'flex-width'    => true,
        'header-text'   => array('site-title', 'site-description')
    ));
    
    $defHeader = array(
        'height'        => 600,
        'width'         => 1200,
        'default-image' => get_template_directory_uri() . '/images/default/office.jpeg',
        'uploads'       => true
    );
    add_theme_support( 'custom-header', $defHeader );
    
    // featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 200, 100, array('center', 'center'));
    add_image_size('medium-thumbnail', 500, 250, array('center', 'center'));
    add_image_size('large-thumbnail', 1024, 512, array('center', 'center'));
    
    // post formats
    add_theme_support('post-formats', array(
        'aside', 'gallery', 'status', 'video', 'link'));
}
add_action('after_setup_theme', 'youandmeif_theme_support');

// Add Widget
function youandmeif_widget() {
    
    register_sidebar( array(
        'name' => 'Header Links',
        'id'    => 'link1'
    ));
    
    register_sidebar( array(
        'name' => 'Footer Contact',
        'id'    => 'sidebar2'
    ));
    
    register_sidebar( array(
        'name' => 'Footer Sidebar',
        'id'    => 'sidebar1'
    ));
    
}
add_action('widgets_init', 'youandmeif_widget');

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

// Check page if has children
function has_children() {
    global $post;
    
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

// Custom excerpt word-count length
function youandmeif_excerpt_length() {
    return 30;
}
add_filter('excerpt_length', 'youandmeif_excerpt_length');

// ===================================================== //
// Additional custom functions for You&Me Int Foundation //
// ===================================================== //

// Adding editable features for the frontpage
function youandmeif_fp_callout( $wp_customize ) {
    
    $wp_customize->add_section('unme-fp-intro', array(
        'title' => 'FrontPage Intro'
    ));
    
    // Who we are section
    $wp_customize->add_setting('unme-fp-headline', array(
    'default'   => 'Headline Text'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-headline-control', array(
        'label' => 'Headline',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-headline'    
    )));

    $wp_customize->add_setting('unme-fp-txt', array(
        'default'   => 'Sample paragraph text'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-txt-control', array(
        'label' => 'Headline Description',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-txt',
        'type'  => 'textarea'
    )));

    $wp_customize->add_setting('unme-fp-link');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-link-control', array(
        'label' => 'Link',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-link',
        'type'  => 'dropdown-pages'
    )));

    $wp_customize->add_setting('unme-fp-img');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'unme-fp-img-control', array(
        'label' => 'Image',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-img',
        'width'     => 500,
        'height'    => 250,
        'flex-width'    => true,
        'flex-height'    => true,
    )));
    
    // what and why section
    // what section
    $wp_customize->add_setting('unme-fp-head2', array(
        'default'   => 'Headline Text'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-head2-control', array(
        'label' => 'Headline 2',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-head2'    
    )));
    
    $wp_customize->add_setting('unme-fp-txt-head2', array(
        'default'   => 'Sample paragraph text two'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-txt-head2-control', array(
        'label' => 'Headline Description two',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-txt-head2',
        'type'  => 'textarea'
    )));
    
    $wp_customize->add_setting('unme-fp-link-head2');
    
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-link-head2-control', array(
        'label' => 'Link',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-link-head2',
        'type'  => 'dropdown-pages'
    )));
    
    // why section
    $wp_customize->add_setting('unme-fp-head3', array(
        'default'   => 'Headline Text'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-head3-control', array(
        'label' => 'Headline 3',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-head3'    
    )));
    
    $wp_customize->add_setting('unme-fp-txt-head3', array(
        'default'   => 'Sample paragraph text three'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-txt-head3-control', array(
        'label' => 'Headline Description three',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-txt-head3',
        'type'  => 'textarea'
    )));
    
    $wp_customize->add_setting('unme-fp-link-head3');
    
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-link-head3-control', array(
        'label' => 'Link',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-link-head3',
        'type'  => 'dropdown-pages'
    )));
    
    // quote section
    $wp_customize->add_setting('unme-fp-quote', array(
        'default'   => 'Quote section'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'unme-fp-txt-head3-control', array(
        'label' => 'Quote section here',
        'section'   => 'unme-fp-intro',
        'settings'  => 'unme-fp-quote',
        'type'  => 'textarea'
    )));
}
add_action('customize_register', 'youandmeif_fp_callout');