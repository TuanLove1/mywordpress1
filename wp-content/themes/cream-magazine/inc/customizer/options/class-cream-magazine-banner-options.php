<?php
/**
 * Class to define customizer settings for banner/slider
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Banner_Customize' ) ) {

	class Cream_Magazine_Banner_Customize {

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
				'cream_magazine_banner_options', 
				array(
					'title'			=> esc_html__( 'Banner/Slider', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Banner/Slider

			$wp_customize->add_setting( 
				'cream_magazine_enable_banner', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_banner'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_banner', 
				array(
					'label'				=> esc_html__( 'Enable Banner/Slider', 'cream-magazine' ),
					'section'			=> 'cream_magazine_banner_options',
					'type'				=> 'checkbox' 
				) 
			) );


			// Separator 2

			$wp_customize->add_setting(
				'cream_magazine_banner_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_banner_separator_1',
					array(
						'section' => 'cream_magazine_banner_options',
						'active_callback' => 'cream_magaine_is_banner_active',
					)
				)
			);


			// Select Post Category(ies) To Be Displayed On Banner
			
			$wp_customize->add_setting( 
				'cream_magazine_banner_categories', 
				array(
					'sanitize_callback' => 'cream_magazine_sanitize_multiple_cat_select',
				) 
			);

			if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

				$wp_customize->add_control( 
					new Cream_Magazine_Multiple_Select_Dropdown_Taxonomies( 
						$wp_customize, 'cream_magazine_banner_categories', 
						array(
							'label'	=> esc_html__( 'Banner/Slider Post Categories', 'cream-magazine' ),
							'section' => 'cream_magazine_banner_options',
							'choices' => cream_magazine_categories_tax_slug(),
							'active_callback' => 'cream_magaine_is_banner_active',
						) 
					) 
				);
			} else {
				
				$wp_customize->add_control( 
					new Cream_Magazine_Multiple_Select_Dropdown_Taxonomies( 
						$wp_customize, 'cream_magazine_banner_categories', 
						array(
							'label'	=> esc_html__( 'Banner/Slider Post Categories', 'cream-magazine' ),
							'section' => 'cream_magazine_banner_options',
							'choices' => cream_magazine_categories_tax_id(),
							'active_callback' => 'cream_magaine_is_banner_active',
						) 
					) 
				);
			}


			// Separator 3

			$wp_customize->add_setting(
				'cream_magazine_banner_separator_2',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_banner_separator_2',
					array(
						'section' => 'cream_magazine_banner_options',
						'active_callback' => 'cream_magaine_is_banner_active',
					)
				)
			);


			// Set Number of Banner Items

			$wp_customize->add_setting( 
				'cream_magazine_banner_posts_no', 
				array(
					'sanitize_callback'		=> 'cream_magazine_sanitize_number',
					'default'				=> $defaults['cream_magazine_banner_posts_no'], 
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_banner_posts_no', 
				array(
					'label' => esc_html__( 'Number of Slider Items', 'cream-magazine' ),
					'description' => esc_html__( 'Note: This option works only for slider part.', 'cream-magazine' ),
					'section' => 'cream_magazine_banner_options',
					'type' => 'number',
					'active_callback' => 'cream_magaine_is_banner_active',
				) 
			);


			// Separator 4

			$wp_customize->add_setting(
				'cream_magazine_banner_separator_3',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_banner_separator_3',
					array(
						'section' => 'cream_magazine_banner_options',
						'active_callback' => 'cream_magaine_is_banner_active',
					)
				)
			);


			// Show Post Author

			$wp_customize->add_setting( 
				'cream_magazine_enable_banner_author_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_banner_author_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_banner_author_meta', 
				array(
					'label'				=> esc_html__( 'Enable Post Author Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_banner_options',
					'type'				=> 'checkbox',
					'active_callback' => 'cream_magaine_is_banner_active', 
				) 
			) );


			// Show Post Date

			$wp_customize->add_setting( 
				'cream_magazine_enable_banner_date_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_banner_date_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_banner_date_meta', 
				array(
					'label'				=> esc_html__( 'Enable Posted Date Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_banner_options',
					'type'				=> 'checkbox',
					'active_callback' => 'cream_magaine_is_banner_active', 
				) 
			) );


			//  Show Post Comments Number

			$wp_customize->add_setting( 
				'cream_magazine_enable_banner_cmnts_no_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_banner_cmnts_no_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_banner_cmnts_no_meta', 
				array(
					'label'				=> esc_html__( 'Enable Post Comments Number Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_banner_options',
					'type'				=> 'checkbox',
					'active_callback' => 'cream_magaine_is_banner_active', 
				) 
			) );

			
			// Show Post Categories

			$wp_customize->add_setting( 
				'cream_magazine_enable_banner_categories_meta', 
				array(
					'sanitize_callback'	=> 'wp_validate_boolean',
					'default'			=> $defaults['cream_magazine_enable_banner_categories_meta'],
				) 
			);

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_banner_categories_meta', 
				array(
					'label'				=> esc_html__( 'Enable Post Categories Meta', 'cream-magazine' ),
					'section'			=> 'cream_magazine_banner_options',
					'type'				=> 'checkbox',
					'active_callback' => 'cream_magaine_is_banner_active',
				) 
			) );
		}
	}
}

new Cream_Magazine_Banner_Customize();