<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/brands.css" integrity="sha384-QT2Z8ljl3UupqMtQNmPyhSPO/d5qbrzWmFxJqmY7tqoTuT2YrQLEqzvVOP2cT5XW" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
        <?php wp_head(); ?>
        <?php if ( is_admin_bar_showing() ): ?>
            <style>
                html { height: calc(100% - 32px) !important; }
                @media screen and ( max-width: 782px ) {
                    html { height: calc(100% - 46px) !important; }
                }
            </style>
        <?php endif;?>
    </head>
    <body <?php body_class(); ?>>
        <header id="main-header">
            <div class='container'>
                <div class="branding">
                    <a class='logo' href='/'>MATT WAMBOLDT</a>
                    <div id="hamburger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
                <?php
                    $menuOptions = array(
                        'theme_location' => 'primary',
                        'container' => null
                    );
                    
                    wp_nav_menu($menuOptions);
                ?>
            </div>
        </header>
        <main>
