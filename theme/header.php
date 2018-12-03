<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
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
        <header>
            <div class='container'>
                <a id='main-logo' href='/'>MATT WAMBOLDT</a>
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
