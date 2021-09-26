<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cream_Magazine
 */
	
	/**
	* Hook - cream_magazine_doctype.
	*
	* @hooked cream_magazine_doctype_action - 10
	*/
	do_action( 'cream_magazine_doctype' );

	/**
	* Hook - cream_magazine_head.
	*
	* @hooked cream_magazine_head_action - 10
	*/
	do_action( 'cream_magazine_head' );

	/**
	* Hook - cream_magazine_body_before.
	*
	* @hooked cream_magazine_body_before_action - 10
	*/
	do_action( 'cream_magazine_body_before' );

	cream_magazine_fonts_url();

	/**
	* Hook - cream_magazine_page_wrapper_start.
	*
	* @hooked cream_magazine_page_wrapper_start_action - 10
	*/
	do_action( 'cream_magazine_page_wrapper_start' );

	/**
	* Hook - cream_magazine_header_section.
	*
	* @hooked cream_magazine_header_section_action - 10
	*/
	do_action( 'cream_magazine_header_section' );

	?>
	<div id="content" class="site-content">
		<?php

		get_template_part( 'template-parts/news-ticker' ); 

