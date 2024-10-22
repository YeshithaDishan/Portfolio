<?php

	/**
	* Template part for displaying header layout one
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	*
	* @package portm
	*/

  $portm_header_right = get_theme_mod( 'portm_header_right', false );
  $portm_menu_col = $portm_header_right ? 'cs_main_header_center' : 'cs_main_header_right';

  // contact button
  $portm_button_text = get_theme_mod( 'portm_button_text', __( 'Hire Me', 'eduker' ) );
  $portm_button_link = get_theme_mod( 'portm_button_link', __( '#', 'eduker' ) );

?>


  <!-- Start Header Section -->
  <header class="cs_site_header cs_style_1 cs_sticky_header cs_color_2">
    <div class="cs_main_header">
      <div class="container">
        <div class="cs_main_header_in">
          <div class="cs_main_header_left">
              <?php portm_header_logo(); ?>
          </div>
          <div class="<?php echo esc_attr($portm_menu_col); ?>">
            <div class="cs_nav">
                <?php portm_header_menu(); ?>
            </div>
          </div>
          <?php if ( !empty( $portm_header_right ) ): ?>
          <div class="cs_main_header_right">
            <a href="<?php echo esc_html($portm_button_link); ?>" class="cs_btn cs_style_1 cs_primary_font"><span><?php echo esc_html($portm_button_text); ?></span></a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </header>
  <!-- End Header Section -->


