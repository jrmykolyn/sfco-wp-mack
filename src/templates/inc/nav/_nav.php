<nav class="nav">
    <div class="nav__inner">
        <a href="#" class="logo">
            <img class="logo__image" src="https://placeholdit.imgix.net/~text?txtsize=18&txt=LOGO&w=100&h=66" alt="<?= 'Logo Image'; ?>">
        </a><!-- /.logo -->
        <?php
        /// TEMP - Force `if` condition below to fail.
        if ( has_nav_menu( 'header-nav' ) && 1 == 2 ) {
            wp_nav_menu(
                array(
                    'theme_location' => 'header-nav',
                    'container_class' => 'menu-wrap'
                )
            );
        }
        ?>
    </div>
</nav>