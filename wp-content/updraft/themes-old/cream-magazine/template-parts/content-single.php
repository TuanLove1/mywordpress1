<?php
/**
 * Template part for displaying post detail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

$show_tags_meta = cream_magazine_get_option( 'cream_magazine_enable_post_single_tags_meta' );
$show_author_meta = cream_magazine_get_option( 'cream_magazine_enable_post_single_author_meta' );
$show_date_meta = cream_magazine_get_option( 'cream_magazine_enable_post_single_date_meta' );
$show_cmnt_no_meta = cream_magazine_get_option( 'cream_magazine_enable_post_single_cmnts_no_meta' );
$show_featured_image = cream_magazine_get_option( 'cream_magazine_enable_post_single_featured_image' );
$show_categories = cream_magazine_get_option( 'cream_magazine_enable_post_single_categories_meta' );
?>
<div class="content-entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-detail'); ?>>
	    <div class="the_title">
	        <h1><?php the_title(); ?></h1>
	    </div><!-- .the_title -->
	    <?php cream_magazine_post_meta( $show_date_meta, $show_author_meta, $show_cmnt_no_meta, $show_categories ); ?>
	    <?php 
	    if( $show_featured_image == true ) {
	    	cream_magazine_post_thumbnail();
	    }
	    ?>
	    <div class="the_content">
	    	<?php
	    	the_content();

	    	wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cream-magazine' ),
				'after'  => '</div>',
			) );
	    	?>
	    </div><!-- .the_content -->
	    <?php cream_magazine_post_tags_meta( $show_tags_meta ); ?>
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .content-entry -->