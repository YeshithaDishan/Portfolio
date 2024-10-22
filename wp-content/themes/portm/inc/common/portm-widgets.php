<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portm_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_style_2_switch', true );

    /**
     * Blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'portm' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="blog-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="cs-widget_title">',
        'after_title'   => '</h3>',
    ] );


    // footer 2
    if ( $footer_style_2_switch ) {

            register_sidebar( [
                'name'          => esc_html__( 'Main Footer Style Widget', 'portm' ),
                'id'            => 'footer-style-2',
                'before_widget' => '<div id="%1$s" class="cs-footer_item footer-widget widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="cs-widget_title">',
                'after_title'   => '</h3>',
            ] );

    }  


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // Footer Default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer widget no. %1$s', 'portm' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'portm' ), $num ),
            'before_widget' => '<div id="%1$s" class="cs-footer_item footer-widget column-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="cs-widget_title">',
            'after_title'   => '</h2>',
        ] );
    }

 

}
add_action( 'widgets_init', 'portm_widgets_init' );