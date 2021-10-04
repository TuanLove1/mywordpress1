<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cream_Magazine
 */

$cream_magazine_sidebar_position = '';

if ( is_front_page() ) {

	if ( is_page_template( 'template-home.php' )  ) {

		$cream_magazine_sidebar_position = cream_magazine_get_option( 'cream_magazine_homepage_sidebar' );
	} else {

		if ( cream_magazine_get_option( 'cream_magazine_enable_home_content' ) == true ) {

			$cream_magazine_sidebar_position = cream_magazine_get_option( 'cream_magazine_homepage_sidebar' );
		} else {

			$cream_magazine_sidebar_position = cream_magazine_sidebar_position();
		}
	}
} else {

	$cream_magazine_sidebar_position = cream_magazine_sidebar_position();
}

if ( ! is_active_sidebar( 'sidebar' ) || $cream_magazine_sidebar_position == 'none'  ) {
	return;
}

$cream_magazine_sidebar_class = 'cm-col-lg-4 cm-col-12';

$cream_magazine_is_sticky = cream_magazine_check_sticky_sidebar();

$cream_magazine_show_sidebar_on_mobile_n_tablet = cream_magazine_get_option( 'cream_magazine_show_sidebar_on_mobile_n_tablet' );

$cream_magazine_sidebar_after_content = cream_magazine_get_option( 'cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet' );

if( $cream_magazine_sidebar_position == 'left' ) {

	$cream_magazine_sidebar_class .= ' order-1';
} 

if( $cream_magazine_is_sticky == true ) {
	$cream_magazine_sidebar_class .= ' sticky_portion';
}

if( ! $cream_magazine_show_sidebar_on_mobile_n_tablet ) {
	$cream_magazine_sidebar_class .= ' hide-tablet hide-mobile';
}

if( $cream_magazine_sidebar_after_content ) {
	$cream_magazine_sidebar_class .= ' cm-order-2-mobile-tablet';
}
?>
<div class="<?php echo esc_attr( $cream_magazine_sidebar_class ); ?>">
	<aside id="secondary" class="sidebar-widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #secondary -->
</div><!-- .col.sticky_portion -->