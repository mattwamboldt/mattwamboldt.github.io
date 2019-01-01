<?php get_header(); ?>
    <section id="hero">
        <!-- TODO: Cool animated background, code rain and cogs, replicate existing bg, but animated -->
        <div class='container'>
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/profile-square.png'?>" />
            <h1>I'm Matt, I code stuff</h1>
            <p> Come share my experience as a Software Developer. This is part portfolio,
                part resource and part rambling. Hopefully my occasional levity will prove
                to you humans that I'm not just another Matt-Bot.
            </p>
            <nav class='social-links'>
                <a href="https://github.com/mattwamboldt" alt="Github"><i class="fab fa-github"></i> Github</a>
                <a href="https://www.linkedin.com/in/mattwamboldt/" alt="LinkedIn"><i class="fab fa-linkedin"></i> Linkedin</a>
                <a href="https://twitter.com/mattwamboldt" alt="Twitter"><i class="fab fa-twitter"></i> Twitter</a>
            </nav>
        </div>
    </section>
    <div class='container'>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="active-project">
            <?php the_content(); ?>
        </article>
    <?php endwhile;endif; ?>
    </div>
<?php get_footer(); ?>
