<?php
/**
 * Class to define customizer settings for image
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Image_Customize' ) ) {

	class Cream_Magazine_Image_Customize {

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
				'cream_magazine_site_image_options', 
				array(
					'title'			=> esc_html__( 'Site Image', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Enable Image Lazy Load

			$wp_customize->add_setting( 
				'cream_magazine_enable_lazy_load', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_lazy_load'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_lazy_load', 
				array(
					'label'			=> esc_html__( 'Enable Lazy Load', 'cream-magazine' ),
					'section'		=> 'cream_magazine_site_image_options',
					'type'			=> 'checkbox',
				) 
			) );
		}
	}
}

new Cream_Magazine_Image_Customize();