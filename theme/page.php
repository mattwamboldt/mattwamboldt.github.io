<?php get_header(); ?>
    <div class='container'>
    <?php if ( have_posts() ) : the_post(); ?>
        <?php // get_template_part('content', get_post_format()); 
        // template parts are php files that are looked up in the theme, the second param adds a -whatever to the end
        // This function is likely how wordpress handles the template hierarchy or at least some of the same base code ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <?php //the_post_thumbnail(); ?>
            <?php the_content(); ?>
        </article>
    <?php else : ?>
        <h2>Nothing to see here, move along folks.</h2>
    <?php endif; ?>
    </div>
<?php get_footer(); ?>
