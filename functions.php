<?php
/* ACTIONS */
 add_action( 'customize_register', 'theme_customize_register' );


/* THEME FUNCTIONS */
/**
 * ...
 */
 function theme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'sfco-wp-mack_front_page_text' , array(
        'title' => __( 'Front Page Text', 'sfco-wp-mack' ),
        'priority' => 9999,
    ) );

    $wp_customize->add_setting( 'front_page_title' , array(
        'default' => 'My Site',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'front_page_subtitle' , array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'front_page_title',
            array(
                'label' => __( 'Title', 'sfco-wp-mack' ),
                'section' => 'sfco-wp-mack_front_page_text',
                'settings' => 'front_page_title',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'front_page_subtitle',
            array(
                'label' => __( 'Subtitle', 'sfco-wp-mack' ),
                'section' => 'sfco-wp-mack_front_page_text',
                'settings' => 'front_page_subtitle',
                'type' => 'textarea'
            )
        )
    );
 }


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