<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portm
 */

$categories = get_the_terms( $post->ID, 'category' );

$portm_blog_date = get_theme_mod( 'portm_blog_date', true );
$portm_blog_comments = get_theme_mod( 'portm_blog_comments', true );
$portm_blog_author = get_theme_mod( 'portm_blog_author', true );
$portm_blog_cat = get_theme_mod( 'portm_blog_cat', false );

?>


<div class="col-lg-4 col-md-6">
     <div class="blog__item white-bg mb-30 transition-3 fix">
        <?php if ( has_post_thumbnail() ): ?>
        <div class="blog__thumb w-img fix">
           <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <?php endif; ?>
        <div class="blog__content">
           <div class="blog__tag mb-10">
              <?php portm_get_category(); ?>
           </div>
           <h3 class="blog__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

           <div class="blog__meta d-flex align-items-center justify-content-between">
              <div class="blog__author d-flex align-items-center">
                 <div class="blog__author-thumb mr-10">
                    <?php echo get_avatar(get_the_author_meta('ID'), 50) ?>
                 </div>
                 <div class="blog__author-info">
                    <h5>
                        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>">
                            <?php echo get_the_author_meta('display_name', get_the_author_meta('ID')); ?>
                        </a>
                    </h5>
                 </div>
              </div>
              <div class="blog__date d-flex align-items-center">
                 <i class="fal fa-clock"></i>
                 <span><?php the_time( get_option('date_format') ); ?></span>
              </div>
           </div>
        </div>
     </div>
</div>
