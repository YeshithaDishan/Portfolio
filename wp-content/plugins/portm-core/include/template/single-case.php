<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tpcore
 */
get_header();

$post_column = is_active_sidebar( 'case-sidebar' ) ? 8 : 8;
$post_column_center = is_active_sidebar( 'case-sidebar' ) ? '' : 'justify-content-center';

?>


<!-- case-details-area -->
<section class="case-details-area">
    <div class="cs-height_150 cs-height_lg_80"></div>
    <div class="container">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="case-details-wrap">
                    <div class="case-details-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); endif; ?>

    </div>
    <div class="cs-height_150 cs-height_lg_80"></div>
</section>
<!-- case-details-area-end -->

<?php get_footer();  ?>