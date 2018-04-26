<header>
    <?php
    $img = get_field( 'project_hero_image' );
    $img_src;
    $img_srcset;
    $is_gif;
    $thumbnail_size = 'full';

    // Conditionals below handle cases where `project_hero_image` is one of:
    // - a hash (array).
    // - an ID (int).
    // - a URL (string).
    /// TODO: Update logic and remove fallbacks when custom field settings are added to version control.
    if ( is_array( $img ) && isset( $img[ 'id' ] ) ) {

        $is_gif = get_post_mime_type( $img[ 'id' ] ) === 'image/gif';
        $thumbnail_size = $is_gif ? 'full' : $thumbnail_size;
        $img_src = wp_get_attachment_image_src( $img[ 'id' ], $thumbnail_size )[ 0 ];
        $img_srcset = wp_get_attachment_image_srcset( $img[ 'id' ], $thumbnail_size );

    } else if ( preg_match( '/[0-9]+/', $img ) ) {

        $is_gif = get_post_mime_type( $img ) === 'image/gif';
        $thumbnail_size = $is_gif ? 'full' : $thumbnail_size;
        $img_src = wp_get_attachment_image_src( $img, $thumbnail_size )[ 0 ];
        $img_srcset = wp_get_attachment_image_srcset( $img, $thumbnail_size );

    } else {
        $img_src = $img;
    }
    ?>
    <section class="post-hero">
        <img
            src="<?= $img_src; ?>"
            <?php
            // Include `srcset` if:
            // - It exists.
            // - The asset is not a gif (https://wpbloggingnerd.org/solved-gif-not-animating-in-wordpress-posts-and-featured-images/).
            if ( isset( $img_srcset ) && ! $is_gif ) {
            ?>
                srcset="<?= $img_srcset; ?>"
                sizes="100vw"
            <?php } ?>
            alt="<?= get_field( 'project_hero_image_text' ); ?>"
        >
    </section><!-- /.post-hero -->
</header>
