<?php
define( 'MATTWAMBOLDT_VERSION', '1.3.2' );

function mattwamboldt_init() {
    register_post_type('projects', array(
        'labels' => array(
            'name' => __('Projects'),
            'singular_name' => __('Project'),
            'add_new_item' => __('Add New Project'),
            'edit_item' => __('Edit Project'),
            'new_item' => __('New Project'),
            'view_item' => __('View Project'),
            'view_items' => __('View Projects'),
            'search_items' => __('Search Projects'),
            'not_found' => __('No projects found')
        ),
        'description' => 'Programs that I wrote or am actively writing.',
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
    ));

    register_post_type('credits', array(
        'labels' => array(
            'name' => __('Credits'),
            'singular_name' => __('Credit'),
            'add_new_item' => __('Add New Credit'),
            'edit_item' => __('Edit Credit'),
            'new_item' => __('New Credit'),
            'view_item' => __('View Credit'),
            'view_items' => __('View Credits'),
            'search_items' => __('Search Credits'),
            'not_found' => __('No credits found')
        ),
        'description' => 'Things I worked on that you can maybe buy.',
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
    ));
}

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

function mattwamboldt_nav_classes($classes, $item) {
    $isProject = is_post_type_archive('projects') || is_singular('projects');
    $isCredit = is_post_type_archive('credits') || is_singular('credits');
    if ($isProject || $isCredit) {
        if ($item->title == 'Blog') {
            $classes = array_diff( $classes, array( 'current_page_parent' ) );
        } else if (
            ($isProject && $item->title == 'Projects') ||
            ($isCredit && $item->title == 'Credits'))
        {
            $classes[] = 'current_page_parent';
        }
    }

    return $classes;
}

add_action( 'after_setup_theme', 'mattwamboldt_setup' );
add_action( 'wp_enqueue_scripts', 'mattwamboldt_enqueue_scripts' );
add_action( 'enqueue_block_editor_assets', 'mattwamboldt_editor_assets' );
add_action( 'init', 'mattwamboldt_init' );
add_filter( 'nav_menu_css_class', 'mattwamboldt_nav_classes', 10, 2);
?>
