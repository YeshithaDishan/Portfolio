<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package portm
 */

get_header();

$blog_column_lg = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;

?>

<div class="cs_height_150 cs_height_lg_80"></div>
<div class="blog-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-<?php print esc_attr( $blog_column_lg );?>">
            	<div class="postbox__wrapper">
	                <?php
						if ( have_posts() ):
					?>
					<div class="result-bar page-header d-none">
						<h1 class="page-title"><?php esc_html_e( 'Search Results For:', 'portm' );?> <?php print get_search_query();?></h1>
					</div>
					<?php
						while ( have_posts() ): the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile;
					?>
					<nav class="pagination-wrap">
						<?php portm_pagination( '<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>', '', [ 'class' => 'page-link next' ] );?>
					</nav>
					<?php
						else:
							get_template_part( 'template-parts/content', 'none' );
						endif;
					?>
            	</div>
            </div>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
		        <div class="col-lg-4">
		        	<aside class="blog-sidebar">
						<?php get_sidebar();?>
	            	</aside>
	            </div>
			<?php endif;?>
        </div>
    </div>
</div>
<div class="cs_height_150 cs_height_lg_80"></div>

<?php
get_footer();
