<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tpcore
 */
get_header();

$post_column = is_active_sidebar( 'services-sidebar' ) ? 8 : 8;
$post_column_center = is_active_sidebar( 'services-sidebar' ) ? '' : 'justify-content-center';

?>

<div class="cs-height_140 cs-height_lg_180"></div>
<!-- Start Breadcrumb -->
<div class="cs-breadcrumb service-breadcumb-area cs-style1 cs-type1 cs-accent_bg_2 cs-white_80">
    <?php if(function_exists('bcn_display')) {
    bcn_display();
    } ?>
</div>
<!-- End Breadcrumb -->

<!-- services-details-area -->
<section class="services-details-area">
    <div class="cs-height_140 cs-height_lg_80"></div>
    <div class="container">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="services-details-wrap">
                    <div class="services-details-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); endif; ?>

    </div>
    <div class="cs-height_80 cs-height_lg_40"></div>
</section>
<!-- services-details-area-end -->


<?php get_footer();  ?>