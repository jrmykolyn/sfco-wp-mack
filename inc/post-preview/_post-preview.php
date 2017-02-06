<?php
$textClass = get_field( 'reverse_text' ) ? 'color--white' : '';
?>

<article class="post-preview">
    <a href="<?= get_post_permalink(); ?>">
        <div class="post-preview__image" style="background-image: url( <?php the_post_thumbnail_url(); ?> )">
        </div><!-- /.post-preview__image -->
        <div class="post-preview__content">
            <h2 class="post-preview-title <?= $textClass; ?>"><?= get_the_title(); ?></h2>
            <h3 class="post-preview-category <?= $textClass; ?>"><?= getTheFirstCategory( get_the_ID() );?></h3>
        </div><!-- /.post-preview__content -->
    </a>
</article><!-- /.post-preview -->