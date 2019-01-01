<?php get_header(); ?>
    <div class='container'>
    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <small><strong>Started</strong> <?php the_date(); ?></small>
            <?php the_content(); ?>
        </article>
        <?php endwhile; else : ?>
        <h2>Nothing to see here, move along folks.</h2>
    <?php endif; ?>
    </div>
<?php get_footer(); ?>
