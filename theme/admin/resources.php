<?php
// THEME SCRIPTS/STYLES
if ( !is_admin() ) {
    add_action( "wp_enqueue_scripts", "enqueue_jquery", 11 ) ;

    wp_register_style( 'styles', get_stylesheet_directory_uri() . '/assets/dist/css/styles.css', null, THEME_VERSION );
    wp_enqueue_style( 'styles' );

    function enqueue_jquery() {
       wp_deregister_script( 'jquery' );
       wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', '', '', false );
       wp_enqueue_script( 'jquery' );
    }
}

wp_register_script( 'main', get_stylesheet_directory_uri() . '/assets/dist/js/theme.min.js', array( 'jquery' ), THEME_VERSION, true );
wp_enqueue_script( 'main' );

wp_register_script( 'vendor', get_stylesheet_directory_uri() . '/assets/dist/js/vendor.min.js', array( 'jquery' ), THEME_VERSION, true );
wp_enqueue_script( 'vendor' );
