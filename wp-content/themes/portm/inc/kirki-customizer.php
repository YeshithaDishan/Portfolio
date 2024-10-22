<?php
/**
 * portm customizer
 *
 * @package portm
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function portm_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'portm_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Portm Customizer', 'portm' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'portm_default_setting', [
        'title'       => esc_html__( 'Portm Default Setting', 'portm' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'header_info_setting', [
        'title'       => esc_html__( 'Header Right Setting', 'portm' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'portm' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'portm' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'portm' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'portm' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'portm' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'portm' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'portm' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'portm' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'portm_customizer',
    ] );
}

add_action( 'customize_register', 'portm_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _portm_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_preloader',
        'label'    => esc_html__( 'Preloader ON/OFF', 'portm' ),
        'section'  => 'portm_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_portm_default_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {

    // side info settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'side_logo',
        'label'       => esc_html__( 'Side Info Logo', 'portm' ),
        'description' => esc_html__( 'Upload Your Logo.', 'portm' ),
        'section'     => 'header_side_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo2.svg',
    ];

    // Contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_contact_mail',
        'label'    => esc_html__( 'Email Address', 'portm' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'youremail@gmail.com', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_contact_number',
        'label'    => esc_html__( 'Phone Number', 'portm' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '+012 3456 7890', 'portm' ),
        'priority' => 10,
    ];

    // Sidebar Social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_sidebar_facebook_url',
        'label'    => esc_html__( 'Facebook URL', 'portm' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_sidebar_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'portm' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_sidebar_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'portm' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_sidebar_pinterest_url',
        'label'    => esc_html__( 'Pinterest URL', 'portm' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
Mobile Menu Settings
*/
function _mobile_menu_fields( $fields ) {

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'mobile_logo',
        'label'       => esc_html__( 'Mobile Menu Logo Dark', 'portm' ),
        'description' => esc_html__( 'Upload Your Logo.', 'portm' ),
        'section'     => 'mobile_menu_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_show_mobile_social',
        'label'    => esc_html__( 'Show Mobile Menu Social', 'portm' ),
        'section'  => 'mobile_menu_setting',
        'default'  => 0,
        'priority' => 12,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    // Mobile section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_mobile_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'portm' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'portm_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_mobile_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'portm' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'portm_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_mobile_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'portm' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'portm_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_mobile_linkedin_url',
        'label'    => esc_html__( 'Linkedin URL', 'portm' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'portm_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_mobile_telegram_url',
        'label'    => esc_html__( 'Telegram URL', 'portm' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'portm_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_mobile_menu_fields' );


/*
Header Settings
 */
function _header_header_fields( $fields ) {

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'portm' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'portm' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3' => get_template_directory_uri() . '/inc/img/header/header-3.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'portm' ),
        'description' => esc_html__( 'Upload Your Logo', 'portm' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo.svg',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'secondary_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'portm' ),
        'description' => esc_html__( 'Upload Your Logo', 'portm' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo2.svg',
    ];

     $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_header_right',
        'label'    => esc_html__( 'Header Right Button On/Off', 'portm' ),
        'section'  => 'section_header_logo',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

     // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_button_text',
        'label'    => esc_html__( 'Button Text', 'portm' ),
        'section'  => 'section_header_logo',
        'default'  => esc_html__( 'Hire Me', 'portm' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'portm_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'portm_button_link',
        'label'    => esc_html__( 'Button URL', 'portm' ),
        'section'  => 'section_header_logo',
        'default'  => esc_html__( '#', 'portm' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'portm_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];        

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'portm' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'portm' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/breadcrumb_bg.jpeg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portm_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'portm' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'portm' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#121212',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__( 'Breadcrumb Info switch', 'portm' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_blog_btn_switch',
        'label'    => esc_html__( 'Blog Button ON/OFF', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta ON/OFF', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_blog_author',
        'label'    => esc_html__( 'Blog Author Meta ON/OFF', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_blog_date',
        'label'    => esc_html__( 'Blog Date Meta ON/OFF', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta ON/OFF', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'portm_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'portm' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'portm' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'portm' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'portm' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'portm' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'portm' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'portm' ),
            '3' => esc_html__( 'Widget Number 3', 'portm' ),
            '2' => esc_html__( 'Widget Number 2', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'portm' ),
        'section'  => 'footer_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'portm' ),
            'off' => esc_html__( 'Disable', 'portm' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'portm_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'portm' ),
        'description' => esc_html__( 'Footer Background Image.', 'portm' ),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/footer_bg.svg',
    ]; 

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_copyright',
        'label'    => esc_html__( 'CopyRight', 'portm' ),
        'section'  => 'footer_setting',
        'default'  => wp_kses_post( 'Copyright © 2023 Laralink.', 'portm' ),
        'priority' => 12,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function portm_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portm_color_option',
        'label'       => __( 'Theme Color', 'portm' ),
        'description' => esc_html__( 'This is a Theme color control.', 'portm' ),
        'section'     => 'color_setting',
        'default'     => '#ff6d5a',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'portm_color_option_2',
        'label'       => __( 'Secondary Color', 'portm' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'portm' ),
        'section'     => 'color_setting',
        'default'     => '#4d4d4d',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'portm_color_fields' );

// 404
function portm_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_error_text',
        'label'    => esc_html__( '404 Text', 'portm' ),
        'section'  => '404_page',
        'default'  => esc_html__( '404', 'portm' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'portm_error_title',
        'label'    => esc_html__( 'Not Found Title', 'portm' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Sorry, the page you are looking for could not be found', 'portm' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'portm' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'portm' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'portm_404_fields' );


/**
 * Added Fields
 */
function portm_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'portm' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'portm_typo_fields' );


/**
 * Added Fields
 */
function portm_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_ev_slug',
        'label'    => esc_html__( 'Event Slug', 'portm' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourevent', 'portm' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'portm_port_slug',
        'label'    => esc_html__( 'Portfolio Slug', 'portm' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourportfolio', 'portm' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'portm_slug_setting' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function PORTM_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'portm' ) ) {
        $value = Kirki::get_option( portm_get_theme(), $name );
    }

    return apply_filters( 'PORTM_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function portm_get_theme() {
    return 'portm';
}