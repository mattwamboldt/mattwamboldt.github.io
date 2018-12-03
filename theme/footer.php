        </main>
        <footer>
            <?php
                $menuOptions = array(
                    'theme_location' => 'footer',
                    'container' => null
                );
                
                wp_nav_menu($menuOptions);
            ?>
            <small>Copyright &copy; 2018 Matthew Wamboldt</small>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>