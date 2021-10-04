<?php
/**
 * Checkbox toggle custom control
 *
 * @package WordPress
 * @subpackage inc/customizer
 * @version 1.1.0
 * @author  Denis Žoljom <http://madebydenis.com/>
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link https://github.com/dingo-d/wordpress-theme-customizer-extra-custom-controls
 * @since  1.0.0
 */
if( ! class_exists( 'Cream_Magazine_Toggle_Switch_Control' ) ) {

	class Cream_Magazine_Toggle_Switch_Control extends WP_Customize_Control {

		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'toogle-switch';
		
		/**
		 * Control scripts and styles enqueue
		 *
		 * @since 1.0.0
		 */
		public function enqueue() {

			wp_enqueue_style( 'cream-magazine-toggle-switch', get_template_directory_uri() . '/admin/css/toggle-switch.css' );
		}

		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() {
			?>
			<div class="checkbox_switch">
				<div class="onoffswitch">
				    <input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> <?php $this->link() . checked( $this->value() ); ?>>
				    <label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
				</div>
				<span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
				<?php
				if( !empty( $this->description ) ) {
					?>
					<span class="customize-control-desc"><?php echo esc_html( $this->description ); ?></span>
					<?php
				}
				?>
			</div>
			<?php
		}
	}
}