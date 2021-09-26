<?php
/**
 * Class to define customizer settings for site layout
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Site_Layout_Customize' ) ) {

	class Cream_Magazine_Site_Layout_Customize {

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
				'cream_magazine_site_layout_options', 
				array(
					'title'			=> esc_html__( 'Site Layout', 'cream-magazine' ),
					'priority'		=> 10,
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Select Site Layout

			$wp_customize->add_setting( 
				'cream_magazine_select_site_layout', 
				array(
					'sanitize_callback'		=> 'cream_magazine_sanitize_select',
					'default'				=> $defaults['cream_magazine_select_site_layout'], 
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_select_site_layout', 
				array(
					'label'				=> esc_html__( 'Select Site Layout', 'cream-magazine' ),
					'section'			=> 'cream_magazine_site_layout_options',
					'type'				=> 'select',
					'choices'			=> array(
						'boxed' => esc_html__( 'Boxed Layout', 'cream-magazine' ),
						'fullwidth' => esc_html__( 'Fullwidth Layout', 'cream-magazine' )
					), 
				) 
			);
		}
	}
}

new Cream_Magazine_Site_Layout_Customize();