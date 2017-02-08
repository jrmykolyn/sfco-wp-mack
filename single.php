<?php
get_header();

$dek = get_field( 'project_dek' );
$attribution = get_field( 'project_attribution' );

if ( have_posts() ):
    while( have_posts() ): the_post();
        if ( get_field( 'project_hero_image' ) ):
            get_template_part( 'inc/post/_post-hero' );
        endif;
        ?>
        <section class="layout-section">
            <div class="layout-section__inner">
                <div class="post-header">
                    <h1 class="post-title"><?= get_the_title(); ?></h1>
                    <h2 class="post-category"><?= getTheFirstCategory( get_the_ID() ); ?></h2>
                    <?php if ( $dek ): ?>
                    <p class="post-dek"><?= $dek; ?></p>
                    <?php endif; ?>
                    <?php if ( $attribution ): ?>
                        <hr>
                        <div class="post-attribution-wrap">
                            <?= $attribution; ?>
                        </div>
                    <?php endif; ?>
                </div><!-- /.post-header -->
                <div class="post-body">
                    <?php the_content(); ?>
                </div><!-- /.post-body -->
            </div><!-- /.layout-section__inner -->
        </section><!-- /.layout-section -->
        <?php
    endwhile;
else:
    /* TODO - Handle 'no posts' case. */
endif;

get_footer();
?>