<?php
/* ACTIONS */
 add_action( 'customize_register', 'theme_customize_register' );


/* THEME FUNCTIONS */
/**
 * ...
 */
 function theme_customize_register( $wp_customize ) {
     addCustomizationOptsForFrontPage( $wp_customize );
     addCustomizationOptsForContactInfo( $wp_customize );
 } // /theme_customize_register()


/**
 * ...
 */
function addCustomizationOptsForContactInfo( $wp_customize ) {
    $wp_customize->add_section( 'sfco-wp-mack_contact_info', array(
        'title'     => __( 'Contact Info', 'sfco-wp-mack' ),
        'priority'  => 10000,
    ) );

    $wp_customize->add_setting( 'contact_info_email' , array(
        'default'   => 'me@email.com',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'contact_info_instagram' , array(
        'default'   => null,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'contact_info_linkedin' , array(
        'default'   => null,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contact_info_email',
            array(
                'label'     => __( 'Email', 'sfco-wp-mack' ),
                'section'   => 'sfco-wp-mack_contact_info',
                'settings'  => 'contact_info_email',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contact_info_instagram',
            array(
                'label'     => __( 'Instagram', 'sfco-wp-mack' ),
                'section'   => 'sfco-wp-mack_contact_info',
                'settings'  => 'contact_info_instagram',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contact_info_linkedin',
            array(
                'label'     => __( 'LinkedIn', 'sfco-wp-mack' ),
                'section'   => 'sfco-wp-mack_contact_info',
                'settings'  => 'contact_info_linkedin',
            )
        )
    );
} // /addCustomizationOptsForContactInfo()


/**
 * ...
 */
function addCustomizationOptsForFrontPage( $wp_customize ) {
    $wp_customize->add_section( 'sfco-wp-mack_front_page' , array(
        'title'     => __( 'Front Page', 'sfco-wp-mack' ),
        'priority'  => 9999,
    ) );

    $wp_customize->add_setting( 'front_page_title' , array(
        'default'   => 'My Site',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'front_page_subtitle' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'front_page_image_foreground' , array(
        'default'   => null,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'front_page_image_midground' , array(
        'default'   => null,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'front_page_image_background' , array(
        'default'   => null,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'front_page_title',
            array(
                'label'     => __( 'Title', 'sfco-wp-mack' ),
                'section'   => 'sfco-wp-mack_front_page',
                'settings'  => 'front_page_title',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'front_page_subtitle',
            array(
                'label'     => __( 'Subtitle', 'sfco-wp-mack' ),
                'section'   => 'sfco-wp-mack_front_page',
                'settings'  => 'front_page_subtitle',
                'type'      => 'textarea'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'front_page_image_foreground',
            array(
                'label'      => __( 'Upload the foreground image.', 'sfco-wp-mack' ),
                'section'    => 'sfco-wp-mack_front_page',
                'settings'   => 'front_page_image_foreground'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'front_page_image_midground',
            array(
                'label'      => __( 'Upload the midground image.', 'sfco-wp-mack' ),
                'section'    => 'sfco-wp-mack_front_page',
                'settings'   => 'front_page_image_midground'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'front_page_image_background',
            array(
                'label'      => __( 'Upload the background image.', 'sfco-wp-mack' ),
                'section'    => 'sfco-wp-mack_front_page',
                'settings'   => 'front_page_image_background'
            )
        )
    );
} // /addCustomizationOptsForFrontPage()


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
} // /getTheFirstCategory()


/* THEME DEFAULTS */
add_theme_support( 'post-thumbnails' );


/* THEME SCRIPTS/STYLES */
if ( !is_admin() ) {
    add_action( "wp_enqueue_scripts", "enqueue_jquery", 11 ) ;

    wp_register_style( 'styles', get_stylesheet_directory_uri() . '/css/styles.css' );
    wp_enqueue_style( 'styles' );

    function enqueue_jquery() {
       wp_deregister_script( 'jquery' );
       wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', '', '', false );
       wp_enqueue_script( 'jquery' );
    }
}


wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/main.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'main' );
?>