<?php
/**
 * Class to define customizer settings for sidebar
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Sidebar_Customize' ) ) {

	class Cream_Magazine_Sidebar_Customize {

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
				'cream_magazine_sidebar_options', 
				array(
					'title'			=> esc_html__( 'Sidebar', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Enable Sticky Sidebar

			$wp_customize->add_setting( 
				'cream_magazine_enable_sticky_sidebar', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_sticky_sidebar'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_sticky_sidebar', 
				array(
					'label'			=> esc_html__( 'Enable Sticky Sidebar', 'cream-magazine' ),
					'section'		=> 'cream_magazine_sidebar_options',
					'type'			=> 'checkbox',
				) 
			) );


			// Separator 20

			$wp_customize->add_setting(
				'cream_magazine_sidebar_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_sidebar_separator_1',
					array(
						'section' => 'cream_magazine_sidebar_options',
					)
				)
			);


			// Show Sidebar On Mobile & Tablet Devices

			$wp_customize->add_setting( 
				'cream_magazine_show_sidebar_on_mobile_n_tablet', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_show_sidebar_on_mobile_n_tablet'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_show_sidebar_on_mobile_n_tablet', 
				array(
					'label'			=> esc_html__( 'Show Sidebar On Mobile &amp; Tablet Devices', 'cream-magazine' ),
					'section'		=> 'cream_magazine_sidebar_options',
					'type'			=> 'checkbox',
				) 
			) );


			// Show Sidebar After Main Content On Mobile & Tablet Devices

			$wp_customize->add_setting( 
				'cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet', 
				array(
					'label'			=> esc_html__( 'Show Sidebar After Main Content On Mobile &amp; Tablet Devices', 'cream-magazine' ),
					'section'		=> 'cream_magazine_sidebar_options',
					'type'			=> 'checkbox',
					'active_callback' => 'cream_magazine_is_sidebar_on_mobile_active',
				) 
			) );
		}
	}
}

new Cream_Magazine_Sidebar_Customize();