<header>
    <?php
    $img = get_field( 'project_hero_image' );
    $img_src;
    $img_srcset;

    // Conditionals below handle cases where `project_hero_image` is one of:
    // - a hash (array).
    // - an ID (int).
    // - a URL (string).
    /// TODO: Update logic and remove fallbacks when custom field settings are added to version control.
    if ( is_array( $img ) && isset( $img[ 'id' ] ) ) {
        $img_src = wp_get_attachment_image_src( $img[ 'id' ], 'medium_large' )[ 0 ];
        $img_srcset = wp_get_attachment_image_srcset( $img[ 'id' ], 'medium_large' );
    } else if ( preg_match( '/[0-9]+/', $img ) ) {
        $img_src = wp_get_attachment_image_src( $img, 'medium_large' )[ 0 ];
        $img_srcset = wp_get_attachment_image_srcset( $img, 'medium_large' );
    } else {
        $img_src = $img;
    }
    ?>
    <section class="post-hero">
        <img
            src="<?= $img_src; ?>"
            <?php if ( isset( $img_srcset ) ) { ?>
                srcset="<?= $img_srcset; ?>"
                sizes="100vw"
            <?php } ?>
            alt="<?= get_field( 'project_hero_image_text' ); ?>"
        >
    </section><!-- /.post-hero -->
</header>
