<?php
/**
 * Class to define customizer settings for footer
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Footer_Customize' ) ) {

	class Cream_Magazine_Footer_Customize {

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
				'cream_magazine_footer_options', 
				array(
					'title'			=> esc_html__( 'Footer', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Footer Widget Area

			$wp_customize->add_setting( 
				'cream_magazine_show_footer_widget_area', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_show_footer_widget_area'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_show_footer_widget_area', 
				array(
					'label'			=> esc_html__( 'Display Footer Widget Area', 'cream-magazine' ),
					'section'		=> 'cream_magazine_footer_options',
					'type'			=> 'checkbox',
				) 
			) );


			// Show Footer Widget Area On Mobile & Tablet Devices

			$wp_customize->add_setting( 
				'cream_magazine_show_footer_widget_area_on_mobile_n_tablet', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_show_footer_widget_area_on_mobile_n_tablet'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_show_footer_widget_area_on_mobile_n_tablet', 
				array(
					'label'			=> esc_html__( 'Display Footer Widget Area On Mobile &amp; Tablet Devices', 'cream-magazine' ),
					'section'		=> 'cream_magazine_footer_options',
					'type'			=> 'checkbox',
					'active_callback' => 'cream_magazine_is_footer_widget_area_active',
				) 
			) );


			// Separator 10

			$wp_customize->add_setting(
				'cream_magazine_footer_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_footer_separator_1',
					array(
						'section' => 'cream_magazine_footer_options',
					)
				)
			);


			// Show Scroll To Top Button

			$wp_customize->add_setting( 
				'cream_magazine_enable_scroll_top_button', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_scroll_top_button'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_scroll_top_button', 
				array(
					'label'			=> esc_html__( 'Enable Scroll Top Button', 'cream-magazine' ),
					'section'		=> 'cream_magazine_footer_options',
					'type'			=> 'checkbox',
				) 
			) );

			// Separator 11

			$wp_customize->add_setting(
				'cream_magazine_footer_separator_2',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_footer_separator_2',
					array(
						'section' => 'cream_magazine_footer_options',
					)
				)
			);


			// Set Copyright Text

			$wp_customize->add_setting( 
				'cream_magazine_copyright_credit', 
				array(
					'sanitize_callback'	=> 'sanitize_text_field',
					'default'			=> $defaults['cream_magazine_copyright_credit'],
					'transport'			=> 'postMessage',
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_copyright_credit', 
				array(
					'label'				=> esc_html__( 'Copyright Text', 'cream-magazine' ),
					'section'			=> 'cream_magazine_footer_options',
					'type'				=> 'text' 
				) 
			);
		}
	}
}

new Cream_Magazine_Footer_Customize();