<?php
/**
 * ...
 */
function theme_customize_register( $wp_customize ) {
    addCustomizationOptsForFrontPage( $wp_customize );
    addCustomizationOptsForContactInfo( $wp_customize );
    addCustomizationOptsForSiteIdentity( $wp_customize );
    addCustomizationOptsForGoogleAnalytics( $wp_customize );
} // /theme_customize_register()

/**
* ...
*/
function addCustomizationOptsForGoogleAnalytics( $wp_customize ) {
    $wp_customize->add_section( 'sfco-wp-mack_analytics', array(
        'title'     => __( 'Analytics', 'sfco-wp-mack' ),
        'priority'  => 10000,
    ) );

    $wp_customize->add_setting( 'google_analytics_code' , array(
        'default'   => null,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'google_analytics_code',
            array(
                'label'         => __( 'Google Analytics Code', 'sfco-wp-mack' ),
                'description'   => __( 'eg. "UA-XXXXX-Y"' ),
                'section'       => 'sfco-wp-mack_analytics',
                'settings'      => 'google_analytics_code'
            )
        )
    );
} // /addCustomizationOptsForGoogleAnalytics()


/**
 * NOTE: This function hooks into the existing 'title_tagline' section.
 */
function addCustomizationOptsForSiteIdentity( $wp_customize ) {
    $wp_customize->add_setting( 'header_logo', array(
        'default' => null,
        'transport' => 'refresh'
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_logo',
            array(
                'label'      => __( 'Header Logo', 'sfco-wp-mack' ),
                'description' => __( 'This image will be displayed in the "header" element at the top of the page. Image should be at least 100px in height.' ),
                'section'    => 'title_tagline',
                'settings'   => 'header_logo'
            )
        )
    );
} // /addCustomizationOptsForSiteIdentity()


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
