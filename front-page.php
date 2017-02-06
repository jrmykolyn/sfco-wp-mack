<?php
get_header();
?>
<header>
    <section class="index-hero">
        <div class="index-hero__image" style="background-image: url( 'http://lorempixel.com/1600/900/abstract/' );">
        </div>
        <div class="index-hero__content">
            <div class="index-hero-text">
                <h1 class="index-title">This is a title</h2>
                <h2 class="index-subtitle">This is a subtitle</h3>
            </div>
        </div>
        <div class="index-hero__cta js--index-hero-arrow">

        </div>
    </section><!-- /.index-hero -->
</header>
<section class="layout-section">
    <div class="layout-section__inner">
        <?php
        if ( have_posts() ):
            while( have_posts() ): the_post();
                get_template_part( 'inc/post-preview/_post-preview' );
            endwhile;
        else:
            /* TODO - Handle 'no posts' case. */
        endif;
        ?>
    </div><!-- /.layout-section__inner -->
</section><!-- /.layout-section -->
<?php
get_footer();
?>