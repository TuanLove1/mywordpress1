<?php

class Cream_Magazine_News_Widget_Three extends WP_Widget {
 
    function __construct() { 

        parent::__construct(
            'cream-magazine-news-widget-three',  // Base ID
            esc_html__( 'CM Full: News Widget 3', 'cream-magazine' ),   // Name
            array(
                'description' => esc_html__( 'Displays posts of selected category.', 'cream-magazine' ), 
            )
        );
 
    }
 
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$post_cat = '';

        if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

            $post_cat = !empty( $instance[ 'post_cat' ] ) ? $instance[ 'post_cat' ] : 'none';
        } else {

            $post_cat = !empty( $instance[ 'post_cat' ] ) ? $instance[ 'post_cat' ] : 0;
        }

		$post_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 6;

        $show_author_meta = isset( $instance['show_author_meta'] ) ? $instance['show_author_meta'] : true;

        $show_date_meta = isset( $instance['show_date_meta'] ) ? $instance['show_date_meta'] : true;

        $show_cmnt_no_meta = isset( $instance['show_cmnt_no_meta'] ) ? $instance['show_cmnt_no_meta'] : true;

		$post_args = array(
			'post_type' => 'post',
            'ignore_sticky_posts' => true,
		);

        if( $post_cat != 'none' ) {

            if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

                $post_args['category_name'] = sanitize_text_field( $post_cat );
            } else {

                $post_args['cat'] = absint( $post_cat );
            }
        }

        if( absint( $post_no ) > 0 ) {
            $post_args['posts_per_page'] = absint( $post_no );
        }

		$post_query = new WP_Query( $post_args );

		if( $post_query->have_posts() ) {
            ?>
            <section class="cm-post-widget-section cm_post_widget_six">
                <div class="section_inner">
                    <?php 
                    if( !empty( $title ) ) {
                        ?>
                        <div class="section-title">
                            <h2><?php echo esc_html( $title ); ?></h2>
                        </div><!-- .section-title -->
                        <?php
                    }
                    ?>      
                    <div class="post_widget_inner">
                        <div class="row">
                            <?php
                            while( $post_query->have_posts() ) {
                                $post_query->the_post();
                                ?>
                                <div class="cm-col-lg-4 cm-col-md-6 cm-col-12">
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
                                            </div><!-- .col -->
                                            <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                <div class="right_box">
                                                    <div class="post_title">
                                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    </div><!-- .post_title -->
                                                    <?php cream_magazine_post_meta( $show_date_meta, $show_author_meta, $show_cmnt_no_meta, false ); ?>
                                                </div><!-- .right_box -->
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                    </div><!-- .box -->
                                </div><!-- .col -->
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div><!-- .row -->
                    </div><!-- .post_widget_inner -->
                </div><!-- .section_inner -->
            </section><!-- .cm_post_widget_six.section_spacing -->
            <?php
        }
 
    }
 
    public function form( $instance ) {
        $defaults = array(
            'title'       => '',
            'post_no'	  => 6,
            'show_author_meta' => true,
            'show_date_meta' => true,
            'show_cmnt_no_meta' => true,
        );

        if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

            $defaults['post_cat'] = 'none';
        } else {

            $defaults['post_cat'] = 0;
        }

        $instance = wp_parse_args( (array) $instance, $defaults );

		?>
        <p>
            <strong><?php esc_html_e( 'At frontend this widget looks like as below:', 'cream-magazine' ); ?></strong> 
            <img src="<?php echo esc_url( get_template_directory_uri() . '/admin/images/widget-placeholders/cm-full-widget-three.png' ); ?>" style="max-width: 100%; height: auto;"> 
        </p>

		<p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
                <strong><?php esc_html_e('Title', 'cream-magazine'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'post_cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'cream-magazine' ); ?></strong></label>
            <?php
            $categories = get_terms( 
                array( 
                    'taxonomy' => 'category', 
                    'hide_empty' => 0, 
                )
            );
            ?>
            <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'post_cat' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'post_cat' ) ); ?>">
                <option value="none" <?php selected( $instance['post_cat'], 'none' ); ?>><?php esc_html_e( 'Select Categories', 'cream-magazine' ); ?></option>
                <?php
                if( !empty( $categories ) ) {
                    foreach( $categories as $cat ) {
                        if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {
                            ?>
                            <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php selected( $instance['post_cat'], $cat->slug ); ?>><?php echo esc_html( $cat->name ); ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo esc_attr( $cat->term_id ); ?>" <?php selected( $instance['post_cat'], $cat->term_id ); ?>><?php echo esc_html( $cat->name ); ?></option>
                            <?php
                        }
                    }
                }
                ?>
            </select>
            <small><?php echo esc_html__( 'If no category is selected, then recent posts will be displayed.', 'cream-magazine' ); ?></small>
        </p>

		<p>
            <label for="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>">
                <strong><?php esc_html_e('No of Posts', 'cream-magazine'); ?></strong>
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
 
        $instance                       = $old_instance;

        $instance['title']              = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';

        if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

            $instance['post_cat']           = isset( $new_instance['post_cat'] ) ? sanitize_text_field( $new_instance['post_cat'] ) : 'none';
        } else {

            $instance['post_cat']           = isset( $new_instance['post_cat'] ) ? absint( $new_instance['post_cat'] ) : 0;
        }

        $instance['post_no']            = isset( $new_instance['post_no'] ) ? absint( $new_instance['post_no'] ) : 6;
        
        $instance['show_author_meta']   = isset( $new_instance['show_author_meta'] ) ? wp_validate_boolean( $new_instance['show_author_meta'] ) : false;

        $instance['show_date_meta']     = isset( $new_instance['show_date_meta'] ) ? wp_validate_boolean( $new_instance['show_date_meta'] ) : false;

        $instance['show_cmnt_no_meta']  = isset( $new_instance['show_cmnt_no_meta'] ) ? wp_validate_boolean( $new_instance['show_cmnt_no_meta'] ) : false;

        return $instance;
    } 
}