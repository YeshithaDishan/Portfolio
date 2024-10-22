<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portm
*/

// Footer Columns
$footer_columns = 0;
$footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    if ( is_active_sidebar( 'footer-' . $num ) ) {
        $footer_columns++;
    }
}

switch ( $footer_columns ) {
case '1':
    $footer_class[1] = 'col-lg-12';
    break;
case '2':
    $footer_class[1] = 'col-lg-6 col-md-6';
    $footer_class[2] = 'col-lg-6 col-md-6';
    break;
case '3':
    $footer_class[1] = 'col-lg-4 col-md-6';
    $footer_class[2] = 'col-lg-4 col-md-6 col-sm-6';
    $footer_class[3] = 'col-lg-4 col-md-6 col-sm-6';
    break;
case '4':
    $footer_class[1] = 'col-lg-3 col-sm-6';
    $footer_class[2] = 'col-lg-3 col-sm-6';
    $footer_class[3] = 'col-lg-3 col-sm-6';
    $footer_class[4] = 'col-lg-3 col-sm-6';
    break;
default:
    $footer_class = 'col-lg-3 col-sm-6';
    break;
}

?>


<!-- footer-area -->
<footer class="cs-fooer cs_footer_style0">
    <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
    <div class="cs-fooer_main">
        <div class="container">
            <div class="row">
                <?php
                    if ( $footer_columns < 4 ) {
                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-1' );
                    print '</div>';

                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-2' );
                    print '</div>';

                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-3' );
                    print '</div>';

                    print '<div class="col-lg-3 col-sm-6">';
                    dynamic_sidebar( 'footer-4' );
                    print '</div>';
                    } else {
                        for ( $num = 1; $num <= $footer_columns; $num++ ) {
                            if ( !is_active_sidebar( 'footer-' . $num ) ) {
                                continue;
                            }
                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                            dynamic_sidebar( 'footer-' . $num );
                            print '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="cs-copyright text-center cs-primary_color cs-accent_4_bg">
            <div class="container">
              <?php print portm_copyright_text(); ?>
            </div>
     </div>

</footer>
<!-- footer-area-end -->