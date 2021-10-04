<?php
/**
 * Class to define customizer settings for ticker news
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_News_Ticker_Customize' ) ) {

	class Cream_Magazine_News_Ticker_Customize {

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
				'cream_magazine_ticker_news_options', 
				array(
					'title'			=> esc_html__( 'Ticker News', 'cream-magazine' ),
					'panel'			=> 'cream_magazine_theme_customization',	
				) 
			);
		}

		public function register_settings( $wp_customize ) {

			$defaults = cream_magazine_get_default_theme_options();

			// Show Ticker News

			$wp_customize->add_setting( 
				'cream_magazine_enable_ticker_news', 
				array(
					'sanitize_callback'		=> 'wp_validate_boolean',
					'default'				=> $defaults['cream_magazine_enable_ticker_news'],
				) 
			);	

			$wp_customize->add_control( new Cream_Magazine_Toggle_Switch_Control( $wp_customize,
				'cream_magazine_enable_ticker_news', 
				array(
					'label' => esc_html__( 'Enable Ticker News', 'cream-magazine' ),
					'description' => esc_html__( 'This option will be effective only for the ticker news section that is displayed below the header section.', 'cream-magazine' ),
					'section' => 'cream_magazine_ticker_news_options',
					'type' => 'checkbox',
				) 
			) );



			// Separator 5

			$wp_customize->add_setting(
				'cream_magazine_news_ticker_separator_1',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_news_ticker_separator_1',
					array(
						'section' => 'cream_magazine_ticker_news_options',
						'active_callback' => 'cream_magaine_is_ticker_news_enabled',
					)
				)
			);


			// Show Ticker News On Pages

			$wp_customize->add_setting( 
				'cream_magazine_show_ticker_news', 
				array(
					'sanitize_callback'	=> 'cream_magazine_sanitize_select',
					'default'			=> $defaults['cream_magazine_show_ticker_news'],
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_show_ticker_news', 
				array(
					'label'				=> esc_html__( 'Display Ticker News On', 'cream-magazine' ),
					'section'			=> 'cream_magazine_ticker_news_options',
					'type'				=> 'radio',
					'choices'			=> cream_magazine_ticker_news_on_pages(),
					'active_callback'	=> 'cream_magaine_is_ticker_news_enabled',
				) 
			);



			// Separator 6

			$wp_customize->add_setting(
				'cream_magazine_news_ticker_separator_2',
				array(
					'sanitize_callback' => 'esc_html',
					'default' => '',
				)
			);

			$wp_customize->add_control(
				new Cream_Magazine_Separator_Control(
					$wp_customize,
					'cream_magazine_news_ticker_separator_2',
					array(
						'section' => 'cream_magazine_ticker_news_options',
						'active_callback' => 'cream_magaine_is_ticker_news_enabled',
					)
				)
			);

			
			// Set Ticker News Title

			$wp_customize->add_setting( 
				'cream_magazine_ticker_news_title', 
				array(
					'sanitize_callback'		=> 'sanitize_text_field',
					'default'				=> $defaults['cream_magazine_ticker_news_title'], 
					'transport'				=> 'postMessage',
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_ticker_news_title', 
				array(
					'label' => esc_html__( 'Ticker News Title', 'cream-magazine' ),
					'section' => 'cream_magazine_ticker_news_options',
					'type' => 'text',
					'active_callback' => 'cream_magaine_is_ticker_news_enabled',
				) 
			);

			
			// Set Categories To Be Displayed

			$wp_customize->add_setting( 
				'cream_magazine_ticker_news_categories', 
				array(
					'sanitize_callback' => 'cream_magazine_sanitize_multiple_cat_select',
				) 
			);

			if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

				$wp_customize->add_control( 
					new Cream_Magazine_Multiple_Select_Dropdown_Taxonomies( 
						$wp_customize, 'cream_magazine_ticker_news_categories', 
						array(
							'label'	=> esc_html__( 'Ticker News Categories', 'cream-magazine' ),
							'section' => 'cream_magazine_ticker_news_options',
							'choices' => cream_magazine_categories_tax_slug(),
							'active_callback' => 'cream_magaine_is_ticker_news_enabled',
						) 
					) 
				);
			} else {

				$wp_customize->add_control( 
					new Cream_Magazine_Multiple_Select_Dropdown_Taxonomies( 
						$wp_customize, 'cream_magazine_ticker_news_categories', 
						array(
							'label'	=> esc_html__( 'Ticker News Categories', 'cream-magazine' ),
							'section' => 'cream_magazine_ticker_news_options',
							'choices' => cream_magazine_categories_tax_id(),
							'active_callback' => 'cream_magaine_is_ticker_news_enabled',
						) 
					) 
				);
			}
			
			// Set Number of Ticker News Items

			$wp_customize->add_setting( 
				'cream_magazine_ticker_news_posts_no', 
				array(
					'sanitize_callback'		=> 'cream_magazine_sanitize_number',
					'default'				=> $defaults['cream_magazine_ticker_news_posts_no'], 
				) 
			);

			$wp_customize->add_control( 
				'cream_magazine_ticker_news_posts_no', 
				array(
					'label' => esc_html__( 'Number of Ticker News Items', 'cream-magazine' ),
					'section' => 'cream_magazine_ticker_news_options',
					'type' => 'number',
					'active_callback' => 'cream_magaine_is_ticker_news_enabled',
				) 
			);
		}
	}
}

new Cream_Magazine_News_Ticker_Customize();