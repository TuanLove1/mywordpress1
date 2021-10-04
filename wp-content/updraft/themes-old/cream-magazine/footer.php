<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cream_Magazine
 */
?>
	</div><!-- #content.site-content -->
	<?php
	/**
	* Hook - cream_magazine_footer_wrapper_start.
	*
	* @hooked cream_magazine_footer_wrapper_start_action - 10
	*/
	do_action( 'cream_magazine_footer_wrapper_start' );

	if( cream_magazine_get_option( 'cream_magazine_show_footer_widget_area' ) ) {

		/**
		* Hook - cream_magazine_footer_widget_wrapper_start.
		*
		* @hooked cream_magazine_footer_widget_wrapper_start_action - 10
		*/
		do_action( 'cream_magazine_footer_widget_wrapper_start' );

		/**
		* Hook - cream_magazine_left_footer_widgetarea.
		*
		* @hooked cream_magazine_left_footer_widgetarea_action - 10
		*/
		do_action( 'cream_magazine_left_footer_widgetarea' );

		/**
		* Hook - cream_magazine_middle_footer_widgetarea.
		*
		* @hooked cream_magazine_middle_footer_widgetarea_action - 10
		*/
		do_action( 'cream_magazine_middle_footer_widgetarea' );

		/**
		* Hook - cream_magazine_right_footer_widgetarea.
		*
		* @hooked cream_magazine_right_footer_widgetarea_action - 10
		*/
		do_action( 'cream_magazine_right_footer_widgetarea' );

		/**
		* Hook - cream_magazine_footer_widget_wrapper_end.
		*
		* @hooked cream_magazine_footer_widget_wrapper_end_action - 10
		*/
		do_action( 'cream_magazine_footer_widget_wrapper_end' );
	}

	/**
	* Hook - cream_magazine_footer_copyright_wrapper_start.
	*
	* @hooked cream_magazine_footer_copyright_wrapper_start_action - 10
	*/
	do_action( 'cream_magazine_footer_copyright_wrapper_start' );
	
    
   	/**
	* Hook - cream_magazine_copyright.
	*
	* @hooked cream_magazine_copyright_action - 10
	*/
	do_action( 'cream_magazine_copyright' );

	/**
	* Hook - cream_magazine_footer_menu.
	*
	* @hooked cream_magazine_footer_menu_action - 10
	*/
	do_action( 'cream_magazine_footer_menu' );

    /**
	* Hook - cream_magazine_footer_copyright_wrapper_end.
	*
	* @hooked cream_magazine_footer_copyright_wrapper_end_action - 10
	*/
	do_action( 'cream_magazine_footer_copyright_wrapper_end' );

	/**
	* Hook - cream_magazine_footer_wrapper_end.
	*
	* @hooked cream_magazine_footer_wrapper_end_action - 10
	*/
	do_action( 'cream_magazine_footer_wrapper_end' );


    /**
	* Hook - cream_magazine_page_wrapper_end.
	*
	* @hooked cream_magazine_page_wrapper_end_action - 10
	*/
	do_action( 'cream_magazine_page_wrapper_end' );


	/**
	* Hook - cream_magazine_scroll_top_button.
	*
	* @hooked cream_magazine_scroll_top_button_template - 10
	*/
	do_action( 'cream_magazine_scroll_top_button' );


	/**
	* Hook - cream_magazine_footer.
	*
	* @hooked cream_magazine_footer_action - 10
	*/
	do_action( 'cream_magazine_footer' );	
