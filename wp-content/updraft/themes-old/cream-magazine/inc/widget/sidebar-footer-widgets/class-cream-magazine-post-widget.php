<?php

class Cream_Magazine_Post_Widget extends WP_Widget {
 
    function __construct() { 

        parent::__construct(
            'cream-magazine-post-widget',  // Base ID
            esc_html__( 'CM: Posts Widget', 'cream-magazine' ),   // Name
            array(
                'description' => esc_html__( 'Displays Recent, Most Commented or Editor Picked Posts.', 'cream-magazine' ), 
            )
        );
 
    }
 
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$post_choice = !empty( $instance[ 'post_choice' ] ) ? $instance[ 'post_choice' ] : 'recent';

		$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

        $layout = !empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'layout_one';

        $show_author_meta = isset( $instance['show_author_meta'] ) ? $instance['show_author_meta'] : true;

        $show_date_meta = isset( $instance['show_date_meta'] ) ? $instance['show_date_meta'] : true;

        $show_cmnt_no_meta = isset( $instance['show_cmnt_no_meta'] ) ? $instance['show_cmnt_no_meta'] : true;

		echo $args[ 'before_widget' ];

		$post_args = array(
			'posts_per_page' => absint( $posts_no ),
			'post_type' => 'post'
		);

		if( !empty( $post_choice ) ) {

			if( $post_choice == 'most_commented' ) {
				$post_args['orderby'] = 'comment_count';
				$post_args['order'] = 'desc';
			}
		}

		$post_query = new WP_Query( $post_args );

		if( $post_query->have_posts() ) :
			echo $args[ 'before_title' ];
				echo esc_html( $title );
			echo $args[ 'after_title' ];
			?>
			<div class="cm_recent_posts_widget">
                <?php
                while( $post_query->have_posts() ) {

                    $post_query->the_post();
                    ?>
                    <div class="box">
                        <div class="row">
                            <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                <div class="<?php cream_magazine_thumbnail_class(); ?>">
                                    <?php
                                    if( has_post_thumbnail() ) {
                                        
                                        $lazy_thumbnail = cream_magazine_get_option( 'cream_magazine_enable_lazy_load' );

                                        if( $lazy_thumbnail == true ) {
                                            cream_magazine_lazy_thumbnail( 'cream-magazine-thumbnail-3' );
                                        } else {
                                            cream_magazine_normal_thumbnail( 'cream-magazine-thumbnail-3' );
                                        }
                                    }
                                    ?>
                                </div><!-- .post_thumb.imghover -->
                            </div>
                            <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                <div class="post_title">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <?php cream_magazine_post_meta( $show_date_meta, $show_author_meta, $show_cmnt_no_meta, false ); ?>
                            </div>
                        </div><!-- .box.clearfix -->
                    </div><!-- .row -->
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div><!-- .cm_relatedpost_widget -->
			<?php
		endif;
			
		echo $args[ 'after_widget' ]; 
 
    }
 
    public function form( $instance ) {
        $defaults = array(
            'title'       => '',
            'post_choice'	=> 'recent',
            'post_no'	  => 5,
            'show_author_meta' => false,
            'show_date_meta' => true,
            'show_cmnt_no_meta' => false,
        );

        $instance = wp_parse_args( (array) $instance, $defaults );

		?>
        <p>
            <strong><?php esc_html_e( 'At frontend this widget looks like as below:', 'cream-magazine' ); ?></strong> 
            <img src="<?php echo esc_url( get_template_directory_uri() . '/admin/images/widget-placeholders/cm-post-widget.png' ); ?>" style="max-width: 100%; height: auto;"> 
        </p>

		<p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
                <strong><?php esc_html_e('Title', 'cream-magazine'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('post_choice') ); ?>">
                <strong><?php esc_html_e('Type of Posts:', 'cream-magazine'); ?></strong>
            </label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_choice') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_choice') ); ?>">
            	<?php
        		$post_choices = array(
        			'recent' => esc_html__( 'Recent Posts', 'cream-magazine' ),
        			'most_commented' => esc_html__( 'Most Commented', 'cream-magazine' ),
        		);

        		foreach( $post_choices as $key => $post_choice ) {
        	        ?>
        			<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['post_choice'], $key ); ?>><?php echo esc_html( $post_choice ); ?></option>
        	        <?php
        		}
            	?>
            </select>
        </p> 

		<p>
            <label for="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>">
                <strong><?php esc_html_e('No of Popular Posts', 'cream-magazine'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('show_author_meta') ); ?>">
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('show_author_meta') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_author_meta') ); ?>" <?php checked( $instance['show_author_meta'], true ); ?>>
                <?php esc_html_e('Show Post Author', 'cream-magazine'); ?>
            </label>
        </p> 

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('show_date_meta') ); ?>">
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('show_date_meta') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_date_meta') ); ?>" <?php checked( $instance['show_date_meta'], true ); ?>>
                <?php esc_html_e('Show Posted Date', 'cream-magazine'); ?>
            </label>
        </p>  

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('show_cmnt_no_meta') ); ?>">
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('show_cmnt_no_meta') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_cmnt_no_meta') ); ?>" <?php checked( $instance['show_cmnt_no_meta'], true ); ?>>
                <?php esc_html_e('Show Post Comments Number', 'cream-magazine'); ?>
            </label>
        </p>  
		<?php
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance                           = $old_instance;

        $instance['title']                  = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';

        $instance['post_choice']            = isset( $new_instance['post_choice'] ) ? sanitize_text_field( $new_instance['post_choice'] ) : 'recent';

        $instance['post_no']                = isset( $new_instance['post_no'] ) ? absint( $new_instance['post_no'] ) : 5;
        
        $instance['show_author_meta']       = isset( $new_instance['show_author_meta'] ) ? wp_validate_boolean( $new_instance['show_author_meta'] ) : false;

        $instance['show_date_meta']         = isset( $new_instance['show_date_meta'] ) ? wp_validate_boolean( $new_instance['show_date_meta'] ) : false;

        $instance['show_cmnt_no_meta']      = isset( $new_instance['show_cmnt_no_meta'] ) ? wp_validate_boolean( $new_instance['show_cmnt_no_meta'] ) : false;

        return $instance;
    } 
}