<?php get_header(); ?>
    <div class='container'>
    <?php if ( have_posts() ) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <small>Posted <?php the_date(); ?> in: <?php the_category(', '); ?></small>
            <?php the_content(); ?>
            <?php
                $pageArgs = array(
                    'before'           => '<nav>Pages:',
                    'after'            => '</nav>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'separator'        => ' ',
                    'nextpagelink'     => 'Next page',
                    'previouspagelink' => 'Previous page',
                    'pagelink'         => '%',
                    'echo'             => 1
                );
         
                wp_link_pages( $pageArgs );
            ?>
        </article>
    <?php else : ?>
        <h2>Nothing to see here, move along folks.</h2>
    <?php endif; ?>
    </div>
<?php get_footer(); ?>
