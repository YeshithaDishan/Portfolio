<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tpcore
 */

get_header();

?>


    <div class="container">
        <?php
            if( have_posts() ):
            while( have_posts() ): the_post();
        ?>
        <div class="cs_image_box cs_style_5 cs_radius_15">
            <img class="cs_radius_10 w-100" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), ''); ?>" alt="<?php echo esc_attr__('Image','tpcore') ?>">
      </div>
      <div class="cs_height_45 cs_height_lg_30"></div>

        <?php the_content(); ?>

        <?php
            endwhile; wp_reset_query();
        endif;
        ?>
    </div>


<?php get_footer();  ?>