<?php
/**
 * Custom customizer control class for multiple select dropdown taxonomies.
 */

if( ! class_exists( 'Cream_Magazine_Multiple_Select_Dropdown_Taxonomies' ) ) {

  class Cream_Magazine_Multiple_Select_Dropdown_Taxonomies extends WP_Customize_Control {

    public $type = 'multiple-select-dropdown-taxonomies';

    public $placeholder = '';

    public function __construct($manager, $id, $args = array()) {
      
      parent::__construct( $manager, $id, $args );
    }

    public function render_content() {

      $default_values = ( $this->value() ) ? $this->value() : array();   

      $choices = $this->choices;  
      ?>
      <label>
        <span class="customize-control-title">
          <?php echo esc_html( $this->label ); ?>
        </span>
        <?php if ( $this->description ) { ?>
          <span class="description customize-control-description">
          <?php echo wp_kses_post($this->description); ?>
          </span>
        <?php } ?>

        <select multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
          <?php
          if ( $choices ) {
            foreach ( $choices as $value => $label ) {
              ?>
              <option value="<?php echo esc_attr( $value ); ?>" <?php selected( in_array( $value, $default_values ), true ); ?>><?php echo esc_html( $label ); ?></option>
              <?php
            }
          }
          ?>
        </select>
      </label>
      <?php
    }
  }
}