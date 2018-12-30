<?php get_header(); ?>
    <div class='container'>
        <?php the_posts_pagination(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php // get_template_part('content', get_post_format()); 
        // template parts are php files that are looked up in the theme, the second param adds a -whatever to the end
        // This function is likely how wordpress handles the template hierarchy or at least some of the same base code ?>
        <article class="blog-entry">
            <?php the_post_thumbnail(); ?>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <small>Posted <?php the_date(); ?> in: <?php the_category(', '); ?></small>
            <?php the_excerpt(); ?>
        </article>
    <?php endwhile; ?>
    <?php the_posts_pagination(); ?>
    <?php else : ?>
        <h2>Nothing to see here, move along folks.</h2>
    <?php endif; ?>
    </div>
<?php get_footer(); ?>
