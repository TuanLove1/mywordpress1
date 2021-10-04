<?php
/**
 * Class to define customizer settings for WooCommerce
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_WooCommerce_Customize' ) ) {

	class Cream_Magazine_WooCommerce_Customize {

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		public function __construct() {
			
			add_action( 'customize_register', [ $this, 'register_sections' ] );

			add_action( 'customize_register', [ $this, 'register_settings' ] );
		}

		/**
		 * Sets up the customizer sections.
		 *
		 * @since  2.0.0
		 * @access public
		 * @param  object  $wp_customize
		 * @return void
		 */
		public function register_sections( $wp_customize ) {

			$wp_customize->add_section( 
				'cream_magazine_woocommerce_sidebar_position', 
				array(
					'title'			=> esc_html__( 'Woocommerce Sidebar Position', 'cream-magazine' ),
					'panel'			=> 'woocommerce',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Select Sidebar Position

			$wp_customize->add_setting( 
				'cream_magazine_select_woocommerce_sidebar_position', 
				array(
					'sanitize_callback'	=> 'cream_magazine_sanitize_select',
					'default'			=> $defaults['cream_magazine_select_woocommerce_sidebar_position'],
				) 
			);

			$wp_customize->add_control( 
				new Cream_Magazine_Radio_Image_Control( 
					$wp_customize,
					'cream_magazine_select_woocommerce_sidebar_position', 
					array(
						'label'				=> esc_html__( 'Woocommerce Sidebar Position', 'cream-magazine' ),
						'section'			=> 'cream_magazine_woocommerce_sidebar_position',
						'type'				=> 'select',
						'choices'			=> cream_magazine_sidebar_positions(), 
					) 
				)
			);
		}
	}
}

new Cream_Magazine_WooCommerce_Customize();