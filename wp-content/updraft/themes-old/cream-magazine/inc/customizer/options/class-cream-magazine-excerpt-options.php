<?php
/**
 * Class to define customizer settings for post excerpt
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Post_Excerpt_Customize' ) ) {

	class Cream_Magazine_Post_Excerpt_Customize {

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
				'cream_magazine_post_excerpt_options', 
				array(
					'title'			=> esc_html__( 'Post Excerpt', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Set Excerpt Length

			$wp_customize->add_setting( 
				'cream_magazine_post_excerpt_length', 
				array(
					'sanitize_callback'		=> 'cream_magazine_sanitize_number',
					'default'				=> $defaults['cream_magazine_post_excerpt_length'], 
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_post_excerpt_length', 
				array(
					'label' => esc_html__( 'Excerpt Length', 'cream-magazine' ),
					'section' => 'cream_magazine_post_excerpt_options',
					'type' => 'number',
				) 
			);
		}
	}
}

new Cream_Magazine_Post_Excerpt_Customize();