<?php get_header(); ?>
    <div class='container'>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <small>Posted <?php the_date(); ?> in: <?php the_category(', '); ?></small>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
    <?php endif; ?>
    </div>
<?php get_footer(); ?>
