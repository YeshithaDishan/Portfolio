<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portm
 */

    $gallery_images = function_exists('get_field') ? get_field('gallery_images') : '';
    $portm_show_blog_share = get_theme_mod('portm_show_blog_share', false);
    $portm_post_tags_width = $portm_show_blog_share ? 'col-xl-6 col-md-7' : 'col-12';
?>

<?php if ( is_single() ): ?>

    <article id="post-<?php the_ID();?>" <?php post_class( 'blog-post-item format-gallery' );?>>

        <?php if ( has_post_thumbnail() ): ?>
        <div class="blog-post-thumb blog-thumb-active">
            <?php foreach( $gallery_images as $key => $image ) :  ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="blog-post-content blog-details-content">

            <h2 class="title"><?php the_title();?></h2>

            <!-- blog meta -->
            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>

            <div class="post-text">
                <?php the_content();?>
                <?php
                    wp_link_pages( [
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'portm' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ] );
                ?>
            </div>

            <?php if (!empty(get_the_tags())) : ?>
            <div class="blog-details-bottom">

                <div class="row">
                    <div class="<?php echo esc_attr($portm_post_tags_width); ?>">
                        <?php print portm_get_tag();?>
                    </div>
                    <?php if (!empty($portm_show_blog_share)) : ?>
                    <div class="col-xl-6 col-md-5">
                        <div class="blog-details-social text-md-end">
                            <h5 class="social-title"><?php echo esc_html__( 'Social Share :', 'portm' ) ?></h5>
                            <?php portm_social_share(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <?php endif; ?>

        </div>
    </article>

<?php else: ?>


    <article id="post-<?php the_ID();?>" <?php post_class( 'blog-post-item format-gallery' );?> >

        <?php if ( !empty( $gallery_images ) ): ?>
        <div class="blog-post-thumb blog-thumb-active">
            <?php foreach( $gallery_images as $key => $image ) :  ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="blog-post-content">

            <!-- blog meta -->
            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>

            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <div class="post-text">
                <?php the_excerpt(); ?>
            </div>

            <!-- blog btn -->
            <?php get_template_part( 'template-parts/blog/blog-btn' ); ?>

        </div>

    </article>

<?php
endif;?>