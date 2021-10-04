<?php
/**
 * Class to define customizer settings for typography
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Typography_Customize' ) ) {

	class Cream_Magazine_Typography_Customize {

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
				'cream_magazine_body_typo_options', 
				array(
					'title'			=> esc_html__( 'Body', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_typography_customization',
				) 
			);

			$wp_customize->add_section( 
				'cream_magazine_headings_typo_options', 
				array(
					'title'			=> esc_html__( 'Headings(H1-H6)', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_typography_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Body Font Family

			$wp_customize->add_setting( 
				'cream_magazine_body_font_family', 
				array(
					'sanitize_callback'	=> 'sanitize_text_field',
					'default'			=> $defaults['cream_magazine_body_font_family'],
					'transport'			=> 'postMessage',
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_body_font_family', 
				array(
					'label'				=> esc_html__( 'Font Family', 'cream-magazine' ),
					'section'			=> 'cream_magazine_body_typo_options',
					'type'				=> 'select',
					'choices'			=> cream_magazine_google_font_family_choices(),
				) 
			);



			// Headings Font Family

			$wp_customize->add_setting( 
				'cream_magazine_headings_font_family', 
				array(
					'sanitize_callback'	=> 'sanitize_text_field',
					'default'			=> $defaults['cream_magazine_headings_font_family'],
					'transport'			=> 'postMessage',
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_headings_font_family', 
				array(
					'label'				=> esc_html__( 'Font Family', 'cream-magazine' ),
					'section'			=> 'cream_magazine_headings_typo_options',
					'type'				=> 'select',
					'choices'			=> cream_magazine_google_font_family_choices(),
				) 
			);
		}
	}
}

new Cream_Magazine_Typography_Customize();