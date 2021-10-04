<?php

class Cream_Magazine_Social_Widget extends WP_Widget {
 
    function __construct() { 

        parent::__construct(
            'cream-magazine-social-widget',  // Base ID
            esc_html__( 'CM: Social Widget', 'cream-magazine' ),   // Name
            array(
                'classname' => 'social_widget_style_1',
                'description' => esc_html__( 'Displays links to social sites.', 'cream-magazine' ), 
            )
        );
 
    }
 
    public function widget( $args, $instance ) {

        $title          = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $facebook       = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter        = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $instagram      = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        $linkedin       = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $youtube        = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
        $pinterest      = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';

		echo $args[ 'before_widget' ];
        if( !empty( $title ) ) {
            echo $args['before_title'];
            echo esc_html( $title );
            echo $args['after_title'];
        }
        ?>
        <div class="widget-contents">
            <ul>
                <?php
                if( !empty( $facebook ) ) {
                    ?>
                    <li class="fb">
                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook-f"></i><span><?php esc_html_e( 'Like', 'cream-magazine' ); ?></span></a>
                    </li>
                    <?php
                }
                if( !empty( $twitter ) ) {
                    ?>
                    <li class="tw">
                        <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter"></i><span><?php esc_html_e( 'Follow', 'cream-magazine' ); ?></span></a>
                    </li>
                    <?php
                }
                if( !empty( $instagram ) ) {
                    ?>
                    <li class="insta">
                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram"></i><span><?php esc_html_e( 'Follow', 'cream-magazine' ); ?></span></a>
                    </li>
                    <?php
                }
                if( !empty( $linkedin ) ) {
                    ?>
                    <li class="linken">
                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin"></i><span><?php esc_html_e( 'Connect', 'cream-magazine' ); ?></span></a>
                    </li>
                    <?php
                }
                if( !empty( $pinterest ) ) {
                    ?>
                    <li class="pin">
                        <a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest"></i><span><?php esc_html_e( 'Follow', 'cream-magazine' ); ?></span></a>
                    </li>
                    <?php
                }
                if( !empty( $youtube ) ) {
                    ?>
                    <li class="yt">
                        <a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube-play"></i><span><?php esc_html_e( 'Follow', 'cream-magazine' ); ?></span></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- .widget-contents -->
        <?php		
			
		echo $args[ 'after_widget' ]; 
 
    }
 
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, 
            array(
                'title'         => '',
                'facebook'      => '',
                'twitter'       => '',
                'instagram'     => '',
                'linkedin'      => '',
                'youtube'       => '',
                'pinterest'     => '',
            ) 
        );
        ?>
        <p>
            <strong><?php esc_html_e( 'At frontend this widget looks like as below:', 'cream-magazine' ); ?></strong> 
            <img src="<?php echo esc_url( get_template_directory_uri() . '/admin/images/widget-placeholders/cm-social-widget.png' ); ?>" style="max-width: 100%; height: auto;"> 
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <strong><?php esc_html_e( 'Title: ', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
                <strong><?php esc_html_e( 'Facebook Link:', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
                <strong><?php esc_html_e( 'Twitter Link:', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>">
        </p> 

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
                <strong><?php esc_html_e( 'Instagram Link:', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>">
        </p> 

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>">
                <strong><?php esc_html_e( 'linkedin Link:', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
                <strong><?php esc_html_e( 'Youtube Link:', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
                <strong><?php esc_html_e( 'Pinterest Link:', 'cream-magazine' ); ?></strong>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>">
        </p>          
		<?php
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance                   = $old_instance;

        $instance[ 'title' ]        = isset( $new_instance[ 'title' ] ) ? sanitize_text_field( $new_instance[ 'title' ] ) : '';

        $instance[ 'facebook' ]     = isset( $new_instance[ 'facebook' ] ) ? esc_url_raw( $new_instance[ 'facebook' ] ) : '';

        $instance[ 'twitter' ]      = isset( $new_instance[ 'twitter' ] ) ? esc_url_raw( $new_instance[ 'twitter' ] ) : '';

        $instance[ 'instagram' ]    = isset( $new_instance[ 'instagram' ] ) ? esc_url_raw( $new_instance[ 'instagram' ] ) : '';

        $instance[ 'linkedin' ]     = isset( $new_instance[ 'linkedin' ] ) ? esc_url_raw( $new_instance[ 'linkedin' ] ) : '';

        $instance[ 'youtube' ]      = isset( $new_instance[ 'youtube' ] ) ? esc_url_raw( $new_instance[ 'youtube' ] ) : '';

        $instance[ 'pinterest' ]    = isset( $new_instance[ 'pinterest' ] ) ? esc_url_raw( $new_instance[ 'pinterest' ] ) : '';

        return $instance;
    } 
}