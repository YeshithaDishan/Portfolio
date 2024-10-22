<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package portm
 */


/**
 *
 * portm Header
 */

function portm_check_header() {
    $portm_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $portm_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $portm_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    }
    elseif ( $portm_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    }
    elseif ( $portm_header_style == 'header-style-3' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-3' );
    }     
    else {

        /** Default Header Style **/
        if ( $portm_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        }
         elseif ( $portm_default_header_style == 'header-style-3' ) {
            get_template_part( 'template-parts/header/header-3' );
        }       
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'portm_header_style', 'portm_check_header', 10 );


/**
 * [portm_header_lang description]
 * @return [type] [description]
 */
function portm_header_lang_default() {
    $portm_header_lang = get_theme_mod( 'portm_header_lang', false );
    if ( $portm_header_lang ): ?>

    <ul>
        <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__( 'English', 'portm' );?> <i class="fa-light fa-angle-down"></i></a>
        <?php do_action( 'portm_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [portm_language_list description]
 * @return [type] [description]
 */
function _portm_language( $mar ) {
    return $mar;
}
function portm_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="lang-list">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="lang-list">';
        $mar .= '<li><a href="#">' . esc_html__( 'IND', 'portm' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'SPA', 'portm' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'GRE', 'portm' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'CIN', 'portm' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _portm_language( $mar );
}
add_action( 'portm_language', 'portm_language_list' );


// Header Logo
function portm_header_logo() { ?>
      <?php
        $portm_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $portm_logo = get_template_directory_uri() . '/assets/img/logo.svg';
        $portm_logo_black = get_template_directory_uri() . '/assets/img/logo2.svg';

        $portm_site_logo = get_theme_mod( 'logo', $portm_logo );
        $portm_secondary_logo = get_theme_mod( 'secondary_logo', $portm_logo_black );
      ?>

      <?php if ( !empty( $portm_logo_on ) ) : ?>
         <a class="cs-site_branding" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $portm_secondary_logo );?>" alt="<?php print esc_attr__( 'Logo', 'portm' );?>" />
         </a>
      <?php else : ?>
         <a class="cs-site_branding" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $portm_site_logo );?>" alt="<?php print esc_attr__( 'Logo', 'portm' );?>" />
         </a>
      <?php endif; ?>
   <?php
}

// Header Sticky Logo
function portm_header_sticky_logo() {?>
    <?php
        $portm_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $portm_site_logo = get_theme_mod( 'logo', $portm_logo );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $portm_site_logo );?>" alt="<?php print esc_attr__( 'Logo', 'portm' );?>" />
      </a>
    <?php
}

// Side Menu Logo
function portm_side_logo() {

    $portm_side_logo = get_template_directory_uri() . '/assets/img/logo2.svg';
    $side_logo = get_theme_mod('side_logo', $portm_side_logo);
    ?>
    <a class="cs-site_branding" href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $side_logo ); ?>" alt="<?php print esc_attr__( 'Logo', 'portm' );?>" />
    </a>

<?php }


/**
 * [portm_header_social_profiles description]
 * @return [type] [description]
 */
function portm_header_social_profiles() {
    $portm_header_fb_url = get_theme_mod( 'portm_header_fb_url', __( '#', 'portm' ) );
    $portm_header_twitter_url = get_theme_mod( 'portm_header_twitter_url', __( '#', 'portm' ) );
    $portm_header_linkedin_url = get_theme_mod( 'portm_header_linkedin_url', __( '#', 'portm' ) );
    ?>
    <ul>
        <?php if ( !empty( $portm_header_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $portm_header_fb_url );?>"><span><i class="flaticon-facebook"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $portm_header_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $portm_header_twitter_url );?>"><span><i class="flaticon-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $portm_header_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $portm_header_linkedin_url );?>"><span><i class="flaticon-linkedin"></i></span></a></li>
        <?php endif;?>
    </ul>

<?php
}

function portm_footer_social_profiles() {
    $portm_footer_fb_url = get_theme_mod( 'portm_footer_fb_url', __( '#', 'portm' ) );
    $portm_footer_twitter_url = get_theme_mod( 'portm_footer_twitter_url', __( '#', 'portm' ) );
    $portm_footer_vimeo_url = get_theme_mod( 'portm_footer_vimeo_url', __( '#', 'portm' ) );
    $portm_footer_youtube_url = get_theme_mod( 'portm_footer_youtube_url', __( '#', 'portm' ) );
    ?>

        <ul>
        <?php if ( !empty( $portm_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $portm_footer_fb_url );?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $portm_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $portm_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $portm_footer_vimeo_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $portm_footer_vimeo_url );?>">
                    <i class="fab fa-vimeo-v"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $portm_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $portm_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [portm_mobile_social_profiles description]
 * @return [type] [description]
 */
function portm_mobile_social_profiles() {
    $portm_mobile_fb_url           = get_theme_mod('portm_mobile_fb_url', __('#','portm'));
    $portm_mobile_twitter_url      = get_theme_mod('portm_mobile_twitter_url', __('#','portm'));
    $portm_mobile_instagram_url    = get_theme_mod('portm_mobile_instagram_url', __('#','portm'));
    $portm_mobile_linkedin_url     = get_theme_mod('portm_mobile_linkedin_url', __('#','portm'));
    $portm_mobile_telegram_url      = get_theme_mod('portm_mobile_telegram_url', __('#','portm'));
    ?>

    <ul class="clearfix">
        <?php if (!empty($portm_mobile_fb_url)): ?>
        <li class="facebook">
            <a href="<?php print esc_url($portm_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($portm_mobile_twitter_url)): ?>
        <li class="twitter">
            <a href="<?php print esc_url($portm_mobile_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($portm_mobile_instagram_url)): ?>
        <li class="instagram">
            <a href="<?php print esc_url($portm_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($portm_mobile_linkedin_url)): ?>
        <li class="linkedin">
            <a href="<?php print esc_url($portm_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($portm_mobile_telegram_url)): ?>
        <li class="telegram">
            <a href="<?php print esc_url($portm_mobile_telegram_url); ?>"><i class="fab fa-telegram-plane"></i></a>
        </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [portm_header_menu description]
 * @return [type] [description]
 */
function portm_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'cs_nav_list',
            'container'      => '',
            'fallback_cb'    => 'portm_Navwalker_Class::fallback',
            'walker'         => new portm_Navwalker_Class,
        ] );
    ?>
    <?php
}


/**
 * [portm_header_menu description]
 * @return [type] [description]
 */
function portm_mobile_menu() {
    ?>
    <?php
        $portm_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $portm_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $portm_menu );
        echo wp_kses_post( $portm_menu );
    ?>
    <?php
}

/**
 * [portm_blog_mobile_menu description]
 * @return [type] [description]
 */
function portm_blog_mobile_menu() {
    ?>
    <?php
        $portm_menu = wp_nav_menu( [
            'theme_location' => 'blog-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $portm_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $portm_menu );
        echo wp_kses_post( $portm_menu );
    ?>
    <?php
}

/**
 * [portm_search_menu description]
 * @return [type] [description]
 */
function portm_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'portm_Navwalker_Class::fallback',
            'walker'         => new portm_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [portm_footer_menu description]
 * @return [type] [description]
 */
function portm_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'portm_Navwalker_Class::fallback',
        'walker'         => new portm_Navwalker_Class,
    ] );
}


/**
 * [portm_category_menu description]
 * @return [type] [description]
 */
function portm_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'portm_Navwalker_Class::fallback',
        'walker'         => new portm_Navwalker_Class,
    ] );
}

/**
 *
 * portm footer
 */
add_action( 'portm_footer_style', 'portm_check_footer', 10 );

function portm_check_footer() {

    $footer_show = 1;
    $is_footer = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_footer') : '';
    if( !empty($_GET['s']) ) {
      $is_footer = null;
    }

    if ( empty( $is_footer ) && $footer_show == 1 ) {
        $portm_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
        $portm_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-2' );

        if ( $portm_footer_style == 'footer-style-1' ) {
            get_template_part( 'template-parts/footer/footer-1' );
        } 
        elseif ( $portm_footer_style == 'footer-style-2' ) {
            get_template_part( 'template-parts/footer/footer-2' );
        } else {

            /** default footer style **/
            if ( $portm_default_footer_style == 'footer-style-1' ) {
                get_template_part( 'template-parts/footer/footer-1' );
            } 
            else {
                get_template_part( 'template-parts/footer/footer-2' );
            }
        }

    }

}

// portm_copyright_text
function portm_copyright_text() {
   print get_theme_mod( 'portm_copyright', wp_kses_post( '© 2023 Laralink. All rights reserved', 'portm' ) );
}


/**
 *
 * pagination
 */
if ( !function_exists( 'portm_pagination' ) ) {

    function _portm_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function portm_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="pagination">';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _portm_pagi_callback( $pagi );
    }
}


// theme color
function portm_custom_color() {

    // Theme color
    $color_code = get_theme_mod( 'portm_color_option', '#ff4a17' );
    wp_enqueue_style( 'portm-custom', PORTM_THEME_CSS_DIR . 'portm-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --primary-color: " . $color_code . "}";
        $custom_css .= "html:root { --primary-color: " . $color_code . "}";
        wp_add_inline_style( 'portm-custom', $custom_css );
    }

    // Secondary color
    $color_code2 = get_theme_mod( 'portm_color_option_2', '#4d4d4d' );
    wp_enqueue_style( 'portm-custom', PORTM_THEME_CSS_DIR . 'portm-custom.css', [] );
    if ( $color_code2 != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --secondary-color: " . $color_code2 . "}";
        $custom_css .= "html:root { --secondary-color: " . $color_code2 . "}";
        wp_add_inline_style( 'portm-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'portm_custom_color' );


// portm_kses_intermediate
function portm_kses_intermediate( $string = '' ) {
    return wp_kses( $string, portm_get_allowed_html_tags( 'intermediate' ) );
}

function portm_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function portm_kses($raw){

   $allowed_tags = array(
      'a'      => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'   => array(
         'title' => array(),
      ),
      'b'    => array(),
      'blockquote'   => array(
         'cite' => array(),
      ),
      'cite'   => array(
         'title' => array(),
      ),
      'code'  => array(),
      'del'   => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'     => array(),
      'div'    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'   => array(),
      'dt'   => array(),
      'em'   => array(),
      'h1'   => array(),
      'h2'   => array(),
      'h3'   => array(),
      'h4'   => array(),
      'h5'   => array(),
      'h6'   => array(),
      'i'    => array(
        'class' => array(),
      ),
      'img'   => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'   => array(
         'class' => array(),
      ),
      'ol'   => array(
         'class' => array(),
      ),
      'p'    => array(
         'class' => array(),
      ),
      'q'    => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'  => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'   => array(
         'width'        => array(),
         'height'       => array(),
         'scrolling'    => array(),
         'frameborder'  => array(),
         'allow'        => array(),
         'src'          => array(),
      ),
      'strike'  => array(),
      'br'      => array(),
      'strong'    => array(),
      'data-wow-duration'   => array(),
      'data-wow-delay'   => array(),
      'data-wallpaper-options'  => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'   => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}