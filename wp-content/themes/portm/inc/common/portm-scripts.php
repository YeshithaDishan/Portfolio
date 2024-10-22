<?php

/**
 * portm_scripts description
 * @return [type] [description]
 */
function portm_scripts() {


    /**
     * ALL CSS FILES
    */
    wp_enqueue_style( 'portm-fonts', portm_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', PORTM_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', PORTM_THEME_CSS_DIR.'bootstrap.min.css', array() );
    }
    wp_enqueue_style( 'font-awesome-free', PORTM_THEME_CSS_DIR . 'fontawesome.min.css', [] );
    wp_enqueue_style( 'odometer-counter', PORTM_THEME_CSS_DIR . 'odometer-theme-default.css', [] );
    wp_enqueue_style( 'select2', PORTM_THEME_CSS_DIR . 'select2.min.css', [] );
    wp_enqueue_style( 'animate', PORTM_THEME_CSS_DIR . 'animate.css', [] );
    wp_enqueue_style( 'portm-core', PORTM_THEME_CSS_DIR . 'portm-core.css', [] );
    wp_enqueue_style( 'portm-update', PORTM_THEME_CSS_DIR . 'portm-update.css', [] );
    wp_enqueue_style( 'portm-unit', PORTM_THEME_CSS_DIR . 'portm-unit.css', [] );
    if( is_rtl() ){
        wp_enqueue_style( 'portm-rtl', PORTM_THEME_CSS_DIR.'portm-rtl.css', array() );
    }
    wp_enqueue_style( 'portm-style', get_stylesheet_uri() );


    // ALL JS FILES
    wp_enqueue_script( 'gsap', PORTM_THEME_JS_DIR . 'gsap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'isotope', PORTM_THEME_JS_DIR . 'isotope.pkg.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'odometer', PORTM_THEME_JS_DIR . 'odometer.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', PORTM_THEME_JS_DIR . 'wow.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'portm-main', PORTM_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'portm_scripts' );

/*
Register Fonts
*/
function portm_fonts_url() {

    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'portm' ) ) {
        $font_url = add_query_arg( 'family', 'Jost:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Lexend+Deca:wght@400,500,600,700,800' , "//fonts.googleapis.com/css");
    }
    return $font_url;
}

