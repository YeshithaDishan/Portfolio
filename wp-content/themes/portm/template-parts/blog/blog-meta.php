<?php

/**
 * Template part for displaying post meta
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

<div class="blog-post-meta">
    <ul class="list-wrap">

        <?php if ( !empty($portm_blog_author) ): ?>
            <li><i class="far fa-user"></i><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php print get_the_author();?></a></li>
        <?php endif;?>

        <?php if ( !empty($portm_blog_date) ): ?>
            <li><i class="far fa-calendar-alt"></i> <?php the_time( get_option('date_format') ); ?></li>
        <?php endif;?>

        <?php if ( !empty($portm_blog_cat) ): ?>
            <?php if ( !empty( $categories[0]->name ) ): ?>
                <li><i class="far fa-bookmark"></i><a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
            <?php endif;?>
        <?php endif;?>

        <?php if ( !empty($portm_blog_comments) ): ?>
            <li><i class="far fa-comments"></i> <a href="<?php comments_link();?>"><?php comments_number();?></a></li>
        <?php endif;?>

    </ul>
</div>