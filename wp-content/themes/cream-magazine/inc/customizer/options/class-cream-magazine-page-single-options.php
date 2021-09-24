<?php
/**
 * Class to define customizer settings for page single
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Page_Single_Customize' ) ) {

	class Cream_Magazine_Page_Single_Customize {

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
				'cream_magazine_single_page_options', 
				array(
					'title'			=> esc_html__( 'Single Page', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Featured Image

			$wp_customize->add_setting( 
				'cream_magazine_enable_page_single_featured_image', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_page_single_featured_image'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_page_single_featured_image', 
				array(
					'label'				=> esc_html__( 'Enable Featured Image', 'cream-magazine' ),
					'section'			=> 'cream_magazine_single_page_options',
					'type'				=> 'checkbox' 
				) 
			) );

			// Show Caption of Featured Image

			$wp_customize->add_setting( 
				'cream_magazine_enable_page_single_featured_image_caption', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_page_single_featured_image_caption'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_page_single_featured_image_caption', 
				array(
					'label'				=> esc_html__( 'Show Featured Image&rsquo;s Caption', 'cream-magazine' ),
					'section'			=> 'cream_magazine_single_page_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Separator 19

			$wp_customize->add_setting(
				'cream_magazine_page_single_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_page_single_separator_1',
					array(
						'section' => 'cream_magazine_single_page_options',
					)
				)
			);

			// Display Common Sidebar Position On All Page Singles

			$wp_customize->add_setting( 
				'cream_magazine_enable_page_common_sidebar_position', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_page_common_sidebar_position'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_page_common_sidebar_position', 
				array(
					'label'				=> esc_html__( 'Enable Common Sidebar Position', 'cream-magazine' ),
					'section'			=> 'cream_magazine_single_page_options',
					'type'				=> 'checkbox',
				) 
			) );


			// Select Sidebar Position

			$wp_customize->add_setting( 
				'cream_magazine_select_page_common_sidebar_position', 
				array(
					'sanitize_callback'	=> 'cream_magazine_sanitize_select',
					'default'			=> $defaults['cream_magazine_select_page_common_sidebar_position'],
				) 
			);

			$wp_customize->add_control( 
				new Cream_Magazine_Radio_Image_Control( 
					$wp_customize,
					'cream_magazine_select_page_common_sidebar_position', 
					array(
						'label'				=> esc_html__( 'Select Sidebar Position', 'cream-magazine' ),
						'section'			=> 'cream_magazine_single_page_options',
						'type'				=> 'select',
						'choices'			=> cream_magazine_sidebar_positions(), 
						'active_callback'	=> 'cream_magazine_is_page_common_sidebar_position_active'
					) 
				)
			);
		}
	}
}

new Cream_Magazine_Page_Single_Customize();