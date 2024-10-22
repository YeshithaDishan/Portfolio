<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portm
*/

$footer_bg_img = get_theme_mod( 'portm_footer_bg' );

?>

<!-- Start Footer -->
<footer class="cs_footer cs_style_1 footer-style-2-area cs_filled_bg position-relative" data-src="<?php print esc_url( $footer_bg_img );?>">
    <div class="position-absolute cs_footer_shape_1">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_shape.svg" alt="">
    </div>
    <div class="container">

    <?php if ( is_active_sidebar('footer-style-2') ): ?>
        <?php dynamic_sidebar( 'footer-style-2' ); ?>
    <?php endif; ?>

      <div class="cs_copyright"><?php print portm_copyright_text(); ?></div>
    </div>
</footer>
<!-- End Footer -->

