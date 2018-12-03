<?php
define( 'MATTWAMBOLDT_VERSION', '1.3.2' );

function mattwamboldt_setup() {
    add_theme_support('editor-styles');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('menus');
    add_editor_style('styles/gutenberg.css');
    register_nav_menu('primary', 'Header Navigation');
    register_nav_menu('footer', 'Footer Bar');
}

function mattwamboldt_enqueue_scripts() {
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), null );
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css', array('fonts'), null);
    wp_enqueue_script('main', get_template_directory_uri() . '/scripts/main.js', array(), null, true);
}

function mattwamboldt_editor_assets() {
    wp_enqueue_style( 'mattwamboldt-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), null );
}

add_action( 'after_setup_theme', 'mattwamboldt_setup' );
add_action( 'wp_enqueue_scripts', 'mattwamboldt_enqueue_scripts' );
add_action( 'enqueue_block_editor_assets', 'mattwamboldt_editor_assets' );
?>