<?php
/* THEME FUNCTIONS */
/**
 * ...
 *
 * @param {Number} `$id`
 * @return {String}
 */
function getTheFirstCategory( $id=-1, $nameOnly=true) {
    $categories = get_the_category( $id );
    $category = $categories[ 0 ];

    if ( $category && strtolower( $category->name ) != 'uncategorized'  ) {
        return $nameOnly ? $category->name : $category;
    } else {
        return '';
    }
}

/* THEME DEFAULTS */
add_theme_support( 'post-thumbnails' );

/* THEME STYLES */
wp_register_style( 'styles', get_stylesheet_directory_uri() . '/css/styles.css' );
wp_enqueue_style( 'styles' );

/* THEME SCRIPTS */
if ( !is_admin() ) {
    add_action( "wp_enqueue_scripts", "enqueue_jquery", 11 ) ;

    function enqueue_jquery() {
       wp_deregister_script( 'jquery' );
       wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', '', '', false );
       wp_enqueue_script( 'jquery' );
    }
}


wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/main.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'main' );
?>