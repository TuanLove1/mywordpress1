<?php
/**
 * Class to define customizer settings for top news area
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Top_News_Area_Customize' ) ) {

	class Cream_Magazine_Top_News_Area_Customize {

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

			// Top News Area Sidebar Position

			$wp_customize->add_section( 
				'cream_magazine_top_news_area_options', 
				array(
					'title'			=> esc_html__( 'Top News Area', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_homepage_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Top News Area

			$wp_customize->add_setting( 
				'cream_magazine_display_top_widget_area', 
				array(
					'sanitize_callback'		=> 'wp_validate_boolean',
					'default'				=> $defaults['cream_magazine_display_top_widget_area'], 
				) 
			);	

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_display_top_widget_area', 
				array(
					'label' => esc_html__( 'Show Top News Area', 'cream-magazine' ),
					'section' => 'cream_magazine_top_news_area_options',
					'type' => 'checkbox',
				) 
			) );


			// Separator

			$wp_customize->add_setting(
				'cream_magazine_homepage_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_homepage_separator_1',
					array(
						'section' => 'static_front_page',
					)
				)
			);


			// Setting : Enable Homepage Content

			$wp_customize->add_setting( 
				'cream_magazine_enable_home_content', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_home_content'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_home_content', 
				array(
					'label'			=> esc_html__( 'Enable Homepage Content', 'cream-magazine' ),
					'section'		=> 'static_front_page',
					'type'			=> 'checkbox',
					'active_callback' => 'cream_magazine_is_static_home_page_set',
				) 
			) );
		}
	}
}

new Cream_Magazine_Top_News_Area_Customize();