<nav class="nav">
    <div class="nav__inner">
        <?php if ( get_theme_mod( 'header_logo' ) ) { ?>
        <a href="<?= get_home_url(); ?>" class="logo">
            <img class="logo__image" src="<?= get_theme_mod( 'header_logo' ); ?>" alt="<?= 'Logo Image'; ?>">
        </a><!-- /.logo -->
        <?php
        }

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
</nav><!-- /.nav -->
<!-- /// TODO[@jrmykolyn] - Add required ARIA/WCAG attrs. to 'supporting' nav. -->
<nav class="nav--supporting js--supporting-nav">
    <div class="nav--supporting__inner">
        <?php if ( get_theme_mod( 'header_logo' ) ) { ?>
        <a href="<?= get_home_url(); ?>" class="logo">
            <img class="logo__image" src="<?= get_theme_mod( 'header_logo' ); ?>" alt="<?= 'Logo Image'; ?>">
        </a><!-- /.logo -->
        <?php
        }

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