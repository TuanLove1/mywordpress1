<?php
/**
 * The template for displaying related posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cream_Magazine
 */

$enable_related_posts = cream_magazine_get_option( 'cream_magazine_enable_related_section' );

$section_title = cream_magazine_get_option( 'cream_magazine_related_section_title' );

$related_posts_no = cream_magazine_get_option( 'cream_magazine_related_section_posts_number');

$related_args = array(
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
);

if( absint( $related_posts_no ) > 0 ) {
	$related_args['posts_per_page'] = absint( $related_posts_no );
} else {
	$related_args['posts_per_page'] = 6;
}

$current_object = get_queried_object();

if ( $current_object instanceof WP_Post ) {
	$current_id = $current_object->ID;
	if ( absint( $current_id ) > 0 ) {
		// Exclude current post.
		$related_args['post__not_in'] = array( absint( $current_id ) );
		// Include current posts categories.
		$categories = wp_get_post_categories( $current_id );
		if ( ! empty( $categories ) ) {
			$related_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $categories,
					'operator' => 'IN',
					)
				);
		}
	}
}

$related_posts = new WP_Query( $related_args );

if( $related_posts->have_posts() && $enable_related_posts == true ) {
	
	$show_categories_meta = cream_magazine_get_option( 'cream_magazine_enable_related_section_categories_meta' );
    $show_author_meta = cream_magazine_get_option( 'cream_magazine_enable_related_section_author_meta' );
    $show_date_meta = cream_magazine_get_option( 'cream_magazine_enable_related_section_date_meta' );
    $show_cmnt_no_meta = cream_magazine_get_option( 'cream_magazine_enable_related_section_cmnts_no_meta' );
    ?>
    <section class="cm_related_post_container">
        <div class="section_inner">
        	<?php
        	if( !empty( $section_title ) ) {
        		?>
        		<div class="section-title">
	                <h2><?php echo esc_html( $section_title ); ?></h2>
	            </div><!-- .section-title -->
        		<?php
        	}
        	?>
            <div class="row">
            	<?php
            	$sidebar_position = cream_magazine_sidebar_position();
				$container_class = '';
				if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar' ) ) {
					$container_class = 'cm-col-lg-6 cm-col-md-6 cm-col-12';
				} else {
					$container_class = 'cm-col-lg-4 cm-col-md-6 cm-col-12';
				}
				while( $related_posts->have_posts() ) {
					$related_posts->the_post();
					?>
					<div class="<?php echo esc_attr( $container_class ); ?>">
	                    <div class="card">
					       <div class="<?php cream_magazine_thumbnail_class(); ?>">
						       	<?php
	                        	if( has_post_thumbnail() ) {
	                        		
	                        		$lazy_thumbnail = cream_magazine_get_option( 'cream_magazine_enable_lazy_load' );

									if( $lazy_thumbnail == true ) {
										cream_magazine_lazy_thumbnail( 'cream-magazine-thumbnail-2' );
									} else {
										cream_magazine_normal_thumbnail( 'cream-magazine-thumbnail-2' );
									}
								}
	                        	?>
					        </div><!-- .post_thumb.imghover -->
					        <div class="card_content">
				       			<?php cream_magazine_post_categories_meta( $show_categories_meta ); ?>
				                <div class="post_title">
				                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				                </div><!-- .post_title -->
				                <?php cream_magazine_post_meta( $show_date_meta, $show_author_meta, $show_cmnt_no_meta, false ); ?>	 
					        </div><!-- .card_content -->
					    </div><!-- .card -->
	                </div><!-- .col -->
					<?php
				}
				wp_reset_postdata();
            	?>
            </div><!-- .row -->
        </div><!-- .section_inner -->
    </section><!-- .cm-post-widget-three -->
    <?php
}