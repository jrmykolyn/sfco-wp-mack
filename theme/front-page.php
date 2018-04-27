<?php
get_header();
?>
<header>
    <?php get_template_part( 'inc/index-hero/_index-hero' ); ?>
</header>
<section class="layout-section">
    <div class="layout-section__inner">
        <?php get_template_part( 'inc/loop/_loop' ); ?>
    </div><!-- /.layout-section__inner -->
</section><!-- /.layout-section -->
<?php
get_footer();
?>
