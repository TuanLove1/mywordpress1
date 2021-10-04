<?php
/**
 * Template part for displaying author detail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */
$enable_author_section = cream_magazine_get_option( 'cream_magazine_enable_author_section' );
$cream_magazine_enable_lazy_image = cream_magazine_get_option( 'cream_magazine_enable_lazy_load' );
if( $enable_author_section == true ) {
	?>
	<div class="author_box">
	    <div class="row no-gutters">
	        <div class="cm-col-lg-3 cm-col-md-2 cm-col-3">
	            <div class="author_thumb">
	            	<?php
	            	if( $cream_magazine_enable_lazy_image ) {
	            		?>
	            		<img class="avatar lazy-image" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" data-src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ), ['size' => '300'] ) ); ?>" height="300" width="300">
	            		<noscript>
	            			<?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
	            		</noscript>
	            		<?php
	            	} else {

	            		echo get_avatar( get_the_author_meta( 'ID' ), 300 );
	            	}
	            	?>
	            </div><!-- .author_thumb -->
	        </div><!-- .col -->
	        <div class="cm-col-lg-9 cm-col-md-10 cm-col-9">
	            <div class="author_details">
	                <div class="author_name">
	                    <h3><?php echo get_the_author(); ?></h3>
	                </div><!-- .author_name -->
	                <div class="author_desc">
	                    <?php the_author_meta('description'); ?>
	                </div><!-- .author_desc -->
	            </div><!-- .author_details -->
	        </div><!-- .col -->
	    </div><!-- .row -->
	</div><!-- .author_box -->
	<?php
}
