<?php
/**
 * Class to define customizer settings for upsell
 *
 * @since 2.0.0
 * @package Cream_Magazine
 */

if( ! class_exists( 'Cream_Magazine_Upsell_Customize' ) ) {

	class Cream_Magazine_Upsell_Customize {

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		public function __construct() {
			
			add_action( 'customize_register', [ $this, 'register_sections' ] );
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

			// Load Upsell Class

			require get_template_directory() . '/inc/customizer/upgrade-to-pro/upgrade.php';

			$wp_customize->register_section_type( 'Cream_Magazine_Customize_Section_Upsell' );

			$wp_customize->add_section(
				new Cream_Magazine_Customize_Section_Upsell(
					$wp_customize,
					'theme_upsell',
					array(
						'title'    => esc_html__( 'Cream Magazine Pro', 'cream-magazine' ),
						'pro_text' => esc_html__( 'Get Pro', 'cream-magazine' ),
						'pro_url'  => 'https://themebeez.com/themes/cream-magazine-pro/?ref=cm-upsell-button',
						'priority' => 1,
					)
				)
			);
		}
	}
}

new Cream_Magazine_Upsell_Customize();