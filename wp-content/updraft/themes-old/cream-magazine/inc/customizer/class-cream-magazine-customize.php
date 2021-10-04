<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
if( ! class_exists( 'Cream_Magazine_Customize' ) ) {

	class Cream_Magazine_Customize {

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		public function __construct() {
			
			$this->setup_actions();
		}

		public function dependencies() {

			// Load functions that return choices needed for settings
			
			require get_template_directory() . '/inc/customizer/functions/control-choices.php';
		}

		/**
		 * Sets up initial actions.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		public function setup_actions() {

			// Enqueue scripts and styles for the preview.
			add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );

			// Register panels, sections, settings, controls, and partials.
			add_action( 'customize_register', array( $this, 'controls' ) );
			add_action( 'customize_register', array( $this, 'register_panels' ) );			
			add_action( 'customize_register', array( $this, 'register_settings' ) );
			add_action( 'customize_register', array( $this, 'add_partials' ) );

			$this->load_options();

			// Register scripts and styles for the controls.
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizer_scripts' ), 10 );
		}

		/**
		 * Register Customizer Controls
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		public function controls( $wp_customize ) {

			// Multiple Select Dropdown Taxonomies
			require get_template_directory() . '/inc/customizer/controls/class-cream-magazine-multiple-select-dropdown-taxonomies.php';
			// Radio Image Control
			require get_template_directory() . '/inc/customizer/controls/class-cream-magazine-radio-image-control.php';
			// Separator Control
			require get_template_directory() . '/inc/customizer/controls/class-cream-magazine-separator-control.php';
			// Toggle Switch Control
			require get_template_directory() . '/inc/customizer/controls/class-cream-magazine-toggle-switch-control.php';
			// Color Alpha Picker Control
			require get_template_directory() . '/inc/customizer/controls/class-cream-magazine-color-alpha-control.php';

			$wp_customize->register_control_type( 'Cream_Magazine_ColorAlpha' );
		}

		/**
		 * Sets up the customizer panels.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $wp_customize
		 * @return void
		 */
		public function register_panels( $wp_customize ) {

			// Front Page Customization Panel
			$wp_customize->add_panel(
				'cream_magazine_homepage_customization',
				array(
					'title' => esc_html__( 'Front Page Customization', 'cream-magazine' ),
					'priority' => 10,
				)
			);

			// Theme Customization Panel
			$wp_customize->add_panel(
				'cream_magazine_theme_customization',
				array(
					'title' => esc_html__( 'Theme Customization', 'cream-magazine' ),
					'priority' => 10,
				)
			);

			// Theme Color Customization Panel
			$wp_customize->add_panel(
				'cream_magazine_color_customization',
				array(
					'title' => esc_html__( 'Color Customization', 'cream-magazine' ),
					'priority' => 10,
				)
			);

			// Typography Customization Panel
			$wp_customize->add_panel(
				'cream_magazine_typography_customization',
				array(
					'title' => esc_html__( 'Typography Customization', 'cream-magazine' ),
					'priority' => 10,
				)
			);

			// Global Customization Panel
			$wp_customize->add_panel(
				'cream_magazine_global_customization',
				array(
					'title' => esc_html__( 'Global', 'cream-magazine' ),
					'priority' => 10,
				)
			);
		}

		/**
		 * Sets up the customizer settings.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $wp_customize
		 * @return void
		 */
		public function register_settings( $wp_customize ) {

			// Customizer Sanitization
			require get_template_directory() . '/inc/customizer/functions/sanitize-callback.php';

			// Set the transport property of existing settings.
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			$wp_customize->get_control( 'header_textcolor' )->section = 'title_tagline';
			$wp_customize->get_control( 'background_color' )->section = 'background_image';
			$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'cream-magazine' );

			$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Site Background', 'cream-magazine' );
		}

		public function load_options() {

			// Load Upsell
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-upsell-options.php';

			// Load Top News Area Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-top-news-area-options.php';
			// Load Middle News Area Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-middle-news-area-options.php';
			// Load Bottom News Area Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-bottom-news-area-options.php';

			// Load Banner Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-banner-options.php';
			// Load News Ticker Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-news-ticker-options.php';
			// Load Header Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-header-options.php';
			// Load Footer Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-footer-options.php';
			// Load Blog Page Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-blog-page-options.php';
			// Load Archive Page Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-archive-page-options.php';
			// Load Search Page Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-search-page-options.php';
			// Load Post Single Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-post-single-options.php';
			// Load Page Single Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-page-single-options.php';
			// Load Post Meta Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-post-meta-options.php';
			// Load Post Excerpt Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-excerpt-options.php';
			// Load Social Links Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-social-links-options.php';
			// Load Breadcrumb Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-breadcrumb-options.php';
			// Load Site Sidebar Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-site-sidebar-options.php';
			// Load Site Image Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-site-image-options.php';
			// Load Color Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-color-options.php';
			// Load Typography Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-typo-options.php';
			// Load Site Layout Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-site-layout-options.php';
			// Load Global Settings
			require get_template_directory() . '/inc/customizer/options/class-cream-magazine-global-options.php';

			if( class_exists( 'WooCommerce' ) ) {
				
				// Load WooCommerce Settings
				require get_template_directory() . '/inc/customizer/options/class-cream-magazine-woocommerce-options.php';
			}

			// Load Dynamic Styles
			require get_template_directory() . '/inc/customizer/functions/dynamic-css.php';
		}

		/**
		 * Sets up the customizer partials.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $manager
		 * @return void
		 */
		public function add_partials( $manager ) {
			
			if ( isset( $wp_customize->selective_refresh ) ) {

				$wp_customize->selective_refresh->add_partial( 
					'blogname', 
					array(
						'selector'        => '.site-title a',
						'render_callback' => array( $this, 'customize_partial_blogname' ),
					) 
				);

				$wp_customize->selective_refresh->add_partial( 
					'blogdescription', 
					array(
						'selector'        => '.site-description',
						'render_callback' => array( $this, 'customize_partial_blogdescription' ),
					) 
				);
			}
		}

		/**
		 * Render the site title for the selective refresh partial.
		 *
		 * @return void
		 */
		function customize_partial_blogname() {

			bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @return void
		 */
		function customize_partial_blogdescription() {

			bloginfo( 'description' );
		}

		/**
		 * Loads theme customizer JavaScript.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function customize_preview_js() {

			wp_enqueue_script( 'cream-magazine-customizer', get_template_directory_uri() . '/admin/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), CREAM_MAGAZINE_VERSION, true );
		}

		/**
		 * Loads theme customizer CSS.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function customizer_scripts() {

			wp_enqueue_style( 'chosen', get_template_directory_uri() . '/admin/css/chosen.css' );

			wp_enqueue_style( 'cream-magazine-upgrade', get_template_directory_uri() . '/inc/customizer/upgrade-to-pro/upgrade.css' );

			wp_enqueue_style( 'cream-magazine-customizer-style', get_template_directory_uri() . '/admin/css/customizer-style.css' );

			wp_enqueue_script( 'chosen', get_template_directory_uri() . '/admin/js/chosen.js', array( 'jquery' ), CREAM_MAGAZINE_VERSION, true );

			wp_enqueue_script( 'cream-magazine-upgrade', get_template_directory_uri() . '/inc/customizer/upgrade-to-pro/upgrade.js', array( 'jquery' ), CREAM_MAGAZINE_VERSION, true );

			wp_enqueue_script( 'cream-magazine-customizer-dependency', get_template_directory_uri() . '/admin/js/customizer-dependency.js', array( 'jquery' ), CREAM_MAGAZINE_VERSION, true );

			wp_enqueue_script( 'cream-magazine-customizer-script', get_template_directory_uri() . '/admin/js/customizer-script.js', array( 'jquery' ), CREAM_MAGAZINE_VERSION, true );
		}
	}
}