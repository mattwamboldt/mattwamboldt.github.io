<?php get_header(); ?>
    <div class='container projects'>
        <h1 class="archive-title">Programs I have written or am actively working on.</h1>
        <hr />
        <section class='post-grid'>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="blog-entry">
                <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <small><strong>Started</strong> <?php echo get_the_date(); ?></small>
                <?php the_excerpt(); ?>
                <a class="btn" href="<?php the_permalink(); ?>">
                    Read More
                </a>
                <a class="btn" href="<?php echo get_post_meta($post->ID, 'project-source', true); ?>">
                    <i class="fab fa-github"></i>Github
                </a>
                <a class="btn" href="<?php echo get_post_meta($post->ID, 'project-release', true); ?>">
                    <i class="fas fa-download"></i>Download
                </a>
            </article>
<?php endwhile; ?>
<?php else : ?>
            <h2>Nothing to see here, move along folks.</h2>
<?php endif; ?>
        </section>
    </div>
<?php get_footer(); ?>
