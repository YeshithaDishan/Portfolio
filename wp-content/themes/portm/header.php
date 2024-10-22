<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portm
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>

    <?php
        $portm_preloader = get_theme_mod( 'portm_preloader', false );
    ?>

    <?php if ( !empty( $portm_preloader ) ): ?>
    <!-- Start Preloader -->
      <div class="cs_preloader cs_center">
        <div class="cs_preloader_in"></div>
      </div>
    <!-- End Preloader -->
    <?php endif;?>

    <?php do_action( 'portm_header_style' );?>

    <!-- main-area -->
    <main class="main-area">

        <?php do_action( 'portm_before_main_content' ); ?>