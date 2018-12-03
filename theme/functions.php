<?php
define( 'MATTWAMBOLDT_VERSION', '1.3.2' );

function mattwamboldt_setup() {
    add_theme_support('editor-styles');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('menus');
    add_theme_support('custom-background'); // allows setting the bg in the interface
    add_theme_support('post-thumbnails'); // feature images per blog post
    // add_theme_support('custom-header'); // custom header image that you can put somewhere in the theme
    add_theme_support('post-formats', array('aside', 'image', 'video')); // post formats can be used to display certain posts differently, like a gallery or video

    add_editor_style('styles/gutenberg.css');
    register_nav_menu('primary', 'Header Navigation');
    register_nav_menu('footer', 'Footer Bar');
}

function mattwamboldt_enqueue_scripts() {
    // the rand here is to ensure we get an actual reload each time. in production you'd use a proper version scheme
    $themeVersion = rand(0,1000); // '0.1.0'
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), null );
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css', array('fonts'), $themeVersion);
    wp_enqueue_script('main', get_template_directory_uri() . '/scripts/main.js', array(), $themeVersion, true);
}

function mattwamboldt_editor_assets() {
    wp_enqueue_style( 'mattwamboldt-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), null );
}

add_action( 'after_setup_theme', 'mattwamboldt_setup' );
add_action( 'wp_enqueue_scripts', 'mattwamboldt_enqueue_scripts' );
add_action( 'enqueue_block_editor_assets', 'mattwamboldt_editor_assets' );
?>