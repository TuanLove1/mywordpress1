<?php // phpcs:ignore WordPress.Files.FileName
/**
 * Customize API: ColorAlpha class
 *
 * @package Cream_Magazine
 * @subpackage Cream_Magazine/Inc/Customizer/Control
 * @since 2.0.0
 */

/**
 * Customize Color Control class.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Cream_Magazine_ColorAlpha extends WP_Customize_Color_Control {

	/**
	 * Type.
	 *
	 * @access public
	 * @since 1.0.0
	 * @var string
	 */
	public $type = 'color-alpha';

	/**
	 * Enqueue scripts/styles for the color picker.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function enqueue() {

		wp_enqueue_script( 'cream-magazine-control-color-picker-alpha', get_template_directory_uri() . '/admin/js/color-alpha-picker.js',
			// We're including wp-color-picker for localized strings, nothing more.
			[ 'customize-controls', 'wp-element', 'jquery', 'customize-base', 'wp-color-picker' ], // phpcs:ignore Generic.Arrays.DisallowShortArraySyntax
			CREAM_MAGAZINE_VERSION,
			true
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['choices'] = $this->choices;
	}

	/**
	 * Empty JS template.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function content_template() {}
}