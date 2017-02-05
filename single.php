<?php
get_header();

if ( have_posts() ):
    while( have_posts() ): the_post();
        get_template_part( 'inc/post/_post-hero' );
        ?>
        <section class="layout-section">
            <div class="layout-section__inner">
                <div class="post-header">
                    <h1 class="post-title">Bicycle Film Festival</h1>
                    <h2 class="post-category">The Category</h2>
                    <p class="post-dek">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <hr>
                    <ul class="post-credits">
                        <li class="post-credits__item"><strong>Title:</strong> Name</li>
                        <li class="post-credits__item"><strong>Title:</strong> Name</li>
                        <li class="post-credits__item"><strong>Title:</strong> Name</li>
                        <li class="post-credits__item"><strong>Title:</strong> Name</li>
                        <li class="post-credits__item"><strong>Title:</strong> Name</li>
                        <li class="post-credits__item"><strong>Title:</strong> Name</li>
                    </ul>
                </div><!-- /.post-header -->
                <div class="post-body">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
                    <img src="http://lorempixel.com/g/1200/900/" alt="...">
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