<?php
/**
 * Class to define customizer settings for middle news area
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Middle_News_Area_Customize' ) ) {

	class Cream_Magazine_Middle_News_Area_Customize {

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

			// Middle News Area Sidebar Position

			$wp_customize->add_section( 
				'cream_magazine_middle_news_area_options', 
				array(
					'title'			=> esc_html__( 'Middle News Area', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_homepage_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Middle News Area

			$wp_customize->add_setting( 
				'cream_magazine_display_middle_widget_area', 
				array(
					'sanitize_callback'		=> 'wp_validate_boolean',
					'default'				=> $defaults['cream_magazine_display_middle_widget_area'], 
				) 
			);	

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_display_middle_widget_area', 
				array(
					'label' => esc_html__( 'Show Middle News Area', 'cream-magazine' ),
					'section' => 'cream_magazine_middle_news_area_options',
					'type' => 'checkbox',
				) 
			) );


			// Separator 1

			$wp_customize->add_setting(
				'cream_magazine_middle_news_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_middle_news_separator_1',
					array(
						'section' => 'cream_magazine_middle_news_area_options',
					)
				)
			);


			// Middle News Area Sidebar Position

			$wp_customize->add_setting( 
				'cream_magazine_homepage_sidebar', 
				array(
					'sanitize_callback'	=> 'cream_magazine_sanitize_select',
					'default'			=> $defaults['cream_magazine_homepage_sidebar'],
				) 
			);

			$wp_customize->add_control( 
				new Cream_Magazine_Radio_Image_Control( 
					$wp_customize,  
					'cream_magazine_homepage_sidebar', 
					array(
						'label'				=> esc_html__( 'Sidebar Position', 'cream-magazine' ),
						'section'			=> 'cream_magazine_middle_news_area_options',
						'type'				=> 'radio',
						'choices'			=> cream_magazine_sidebar_positions(), 
					) 
				) 
			);
		}
	}
}

new Cream_Magazine_Middle_News_Area_Customize();