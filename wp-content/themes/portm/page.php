<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portm
 */

get_header();
?>

<div class="cs_height_150 cs_height_lg_80"></div>
<div class="tg-page-area">
    <div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="tg-page-content portm-page-content">
					<?php
						if ( have_posts() ):
							while ( have_posts() ): the_post();
								get_template_part( 'template-parts/content', 'page' );
							endwhile;
						else:
							get_template_part( 'template-parts/content', 'none' );
						endif;
					?>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="cs_height_150 cs_height_lg_80"></div>

<?php
get_footer();
