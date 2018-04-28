<?php
get_header();
?>
<header>
    <section class="layout-section">
        <div class="layout-section__inner">
            <h1><?= get_the_archive_title(); ?></h1>
        </div><!-- /.layout-section__inner -->
    </section><!-- /.layout-section -->
</header>
<section class="layout-section">
    <div class="layout-section__inner">
        <?php get_template_part( 'inc/loop/_loop' ); ?>
    </div><!-- /.layout-section__inner -->
</section><!-- /.layout-section -->
<?php
get_footer();
?>
