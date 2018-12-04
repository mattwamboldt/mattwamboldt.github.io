<?php get_header(); ?>
    <div class='container'>
    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
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
            <hr style="border-width:thin;"/>
            <?php if (comments_open()):
                comments_template();
            else:?>
                <h5 style="text-align:center;">Comments are disabled for this entry.</h5>
            <?php endif;?>
        </article>
        <?php endwhile; else : ?>
        <h2>Nothing to see here, move along folks.</h2>
    <?php endif; ?>
    </div>
<?php get_footer(); ?>
