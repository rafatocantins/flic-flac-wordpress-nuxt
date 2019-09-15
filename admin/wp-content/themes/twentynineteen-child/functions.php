<?php

include('api/pages/acf-api.php');

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( get_template_directory_uri() . '/style.css' );
 
}

// Custom post type Gallery function 
function create_gallery() {
    register_post_type( 'gallery',
    // Options
        array(
            'labels' => array(
                'name' => __('Gallery'),
                'singular_name' => __('Gallery')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'gallery'),
            'supports' => array( 'title', 'editor', 'custom-fields' ),
            'show_in_rest' => true,
        )
    );
}

// Hook my function to theme Setup
add_action('init', 'create_gallery');


