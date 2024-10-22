<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portm
 */

$portm_blog_btn = get_theme_mod('portm_blog_btn', __( 'Read More', 'portm' ) );
$portm_blog_btn_switch = get_theme_mod( 'portm_blog_btn_switch', true );

?>

<?php if ( !empty( $portm_blog_btn_switch ) ): ?>
<a class="cs_btn cs_style_1" href="<?php the_permalink(); ?>">
	<span><?php print esc_html($portm_blog_btn); ?></span>
</a> 
<?php endif;?>