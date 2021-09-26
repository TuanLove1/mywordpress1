<?php
/**
 * Class to define customizer settings for header
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Header_Customize' ) ) {

	class Cream_Magazine_Header_Customize {

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
				'cream_magazine_header_options', 
				array(
					'title'			=> esc_html__( 'Header', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Top Header

			$wp_customize->add_setting( 
				'cream_magazine_enable_top_header', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_top_header'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_top_header', 
				array(
					'label'				=> esc_html__( 'Enable Top Header', 'cream-magazine' ),
					'section'			=> 'cream_magazine_header_options',
					'type'				=> 'checkbox',
					'active_callback'	=> 'cream_magaine_is_header_one_active',
				) 
			) );


			// Separator 7

			$wp_customize->add_setting(
				'cream_magazine_header_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_header_separator_1',
					array(
						'section' => 'cream_magazine_header_options',
						'active_callback'	=> 'cream_magaine_is_header_one_active',
					)
				)
			);


			// Show Home Button

			$wp_customize->add_setting( 
				'cream_magazine_enable_home_button', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_home_button'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_home_button', 
				array(
					'label'				=> esc_html__( 'Enable Home Button', 'cream-magazine' ),
					'section'			=> 'cream_magazine_header_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Show Search Button

			$wp_customize->add_setting( 
				'cream_magazine_enable_search_button', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_search_button'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_search_button', 
				array(
					'label'				=> esc_html__( 'Enable Search Button', 'cream-magazine' ),
					'section'			=> 'cream_magazine_header_options',
					'type'				=> 'checkbox' 
				) 
			) );



			// Show Menu Description

			$wp_customize->add_setting( 
				'cream_magazine_enable_menu_description', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_menu_description'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_menu_description', 
				array(
					'label'				=> esc_html__( 'Enable Menu Description', 'cream-magazine' ),
					'section'			=> 'cream_magazine_header_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Separator 8

			$wp_customize->add_setting(
				'cream_magazine_header_separator_2',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_header_separator_2',
					array(
						'section' => 'cream_magazine_header_options',
					)
				)
			);


			// Enable Sticky Menu Section

			$wp_customize->add_setting( 
				'cream_magazine_enable_sticky_menu_section', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_sticky_menu_section'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_sticky_menu_section', 
				array(
					'label'				=> esc_html__( 'Enable Sticky Menu Section', 'cream-magazine' ),
					'section'			=> 'cream_magazine_header_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Separator 9

			$wp_customize->add_setting(
				'cream_magazine_header_separator_3',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_header_separator_3',
					array(
						'section' => 'cream_magazine_header_options',
					)
				)
			);


			// Select Header Layout

			$wp_customize->add_setting( 
				'cream_magazine_select_header_layout', 
				array(
					'sanitize_callback'	=> 'cream_magazine_sanitize_select',
					'default'			=> $defaults['cream_magazine_select_header_layout'],
				) 
			);

			$wp_customize->add_control( 
				new Cream_Magazine_Radio_Image_Control( 
					$wp_customize,
					'cream_magazine_select_header_layout', 
					array(
						'label'				=> esc_html__( 'Select Header Layout', 'cream-magazine' ),
						'section'			=> 'cream_magazine_header_options',
						'type'				=> 'select',
						'choices'			=> cream_magazine_header_layouts(), 
					) 
				)
			);


			// Set Header Mask Color

			$wp_customize->add_setting( 
				'cream_magazine_header_overlay_color', 
				array(
					'sanitize_callback'	=> 'cream_magazine_color_sanitize_callback',
					'default'			=> $defaults['cream_magazine_header_overlay_color'],
				) 
			);

			$wp_customize->add_control( 
				new Cream_Magazine_ColorAlpha( 
					$wp_customize, 
					'cream_magazine_header_overlay_color', 
					array(
						'label'		=> esc_html__( 'Header Overlay Color', 'cream-magazine' ),
						'section'	=> 'header_image',
						'active_callback' => 'cream_magaine_is_header_two_active',
					) 
				) 
			);
		}
	}
}

new Cream_Magazine_Header_Customize();