<?php
/* THEME DEFAULTS */
add_theme_support( 'post-thumbnails' );

/* THEME STYLES */
wp_register_style( 'styles', get_stylesheet_directory_uri() . '/css/styles.css' );
wp_enqueue_style( 'styles' );
?>