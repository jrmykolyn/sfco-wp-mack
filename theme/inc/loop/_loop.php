<?php
if ( have_posts() ):
    while( have_posts() ): the_post();
        get_template_part( 'inc/post-preview/_post-preview' );
    endwhile;
else:
    /* TODO - Handle 'no posts' case. */
endif;
?>
