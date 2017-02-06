<?php
get_header();
?>
<header>
    <section class="index-hero">
        <div class="index-hero__image" style="background-image: url( 'https://placeholdit.imgix.net/~text?txtsize=72&txt=INDEX%20HERO&w=1600&h=900' );">
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
                get_template_part( 'inc/preview/_preview' );
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