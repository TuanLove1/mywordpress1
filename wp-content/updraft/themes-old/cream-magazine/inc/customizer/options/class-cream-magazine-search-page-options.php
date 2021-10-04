<?php
/**
 * Class to define customizer settings for search page
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Search_Page_Customize' ) ) {

	class Cream_Magazine_Search_Page_Customize {

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
				'cream_magazine_search_page_options', 
				array(
					'title'			=> esc_html__( 'Search Page', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Display Post Author

			$wp_customize->add_setting( 
				'cream_magazine_enable_search_author_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_search_author_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_search_author_meta', 
				array(
					'label'				=> esc_html__( 'Enable Post Author Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_search_page_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Display Post Date

			$wp_customize->add_setting( 
				'cream_magazine_enable_search_date_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_search_date_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_search_date_meta', 
				array(
					'label'				=> esc_html__( 'Enable Posted Date Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_search_page_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Display Post Comments Number

			$wp_customize->add_setting( 
				'cream_magazine_enable_search_cmnts_no_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_search_cmnts_no_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_search_cmnts_no_meta', 
				array(
					'label'				=> esc_html__( 'Enable Post Comments Number Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_search_page_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Display Post Category(ies)

			$wp_customize->add_setting( 
				'cream_magazine_enable_search_categories_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_search_categories_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_search_categories_meta', 
				array(
					'label'				=> esc_html__( 'Enable Post Categories Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_search_page_options',
					'type'				=> 'checkbox' 
				) 
			) );



			// Separator 14

			$wp_customize->add_setting(
				'cream_magazine_search_page_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_search_page_separator_1',
					array(
						'section' => 'cream_magazine_search_page_options',
					)
				)
			);


			// Hide Pages In Search Result

			$wp_customize->add_setting( 
				'cream_magazine_hide_pages_on_search_results', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_hide_pages_on_search_results'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_hide_pages_on_search_results', 
				array(
					'label'				=> esc_html__( 'Hide Pages On Search Results', 'cream-magazine' ),
					'section'			=> 'cream_magazine_search_page_options',
					'type'				=> 'checkbox',
				) 
			) );


			// Separator 15

			$wp_customize->add_setting(
				'cream_magazine_search_page_separator_2',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_search_page_separator_2',
					array(
						'section' => 'cream_magazine_search_page_options',
					)
				)
			);


			// Select Sidebar Position

			$wp_customize->add_setting( 
				'cream_magazine_select_search_sidebar_position', 
				array(
					'sanitize_callback'	=> 'cream_magazine_sanitize_select',
					'default'			=> $defaults['cream_magazine_select_search_sidebar_position'],
				) 
			);

			$wp_customize->add_control( 
				new Cream_Magazine_Radio_Image_Control( 
					$wp_customize,
					'cream_magazine_select_search_sidebar_position', 
					array(
						'label'				=> esc_html__( 'Select Sidebar Position', 'cream-magazine' ),
						'section'			=> 'cream_magazine_search_page_options',
						'type'				=> 'select',
						'choices'			=> cream_magazine_sidebar_positions(), 
					) 
				)
			);
		}
	}
}

new Cream_Magazine_Search_Page_Customize();