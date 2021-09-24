<?php
/**
 * Helper functions for this theme.
 *
 * @package Cream_Magazine
 */

if ( ! function_exists( 'cream_magazine_get_option' ) ) {

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function cream_magazine_get_option( $key ) {

	    if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = cream_magazine_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;
	}
}


if ( ! function_exists( 'cream_magazine_get_default_theme_options' ) ) {

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */

	function cream_magazine_get_default_theme_options() {

    	$defaults = array();

        $defaults['cream_magazine_enable_home_content'] = false;

        $defaults['cream_magazine_select_site_layout'] = 'fullwidth';

    	$defaults['cream_magazine_enable_ticker_news'] = false;
        $defaults['cream_magazine_show_ticker_news'] = 'choice_1';
    	$defaults['cream_magazine_ticker_news_title'] = esc_html__( 'Breaking News', 'cream-magazine' );
    	$defaults['cream_magazine_ticker_news_posts_no'] = 5;

    	$defaults['cream_magazine_enable_banner'] = false;
        $defaults['cream_magazine_banner_posts_no'] = 3;
        $defaults['cream_magazine_enable_banner_categories_meta'] = true;
        $defaults['cream_magazine_enable_banner_author_meta'] = true;
        $defaults['cream_magazine_enable_banner_date_meta'] = true;
    	$defaults['cream_magazine_enable_banner_cmnts_no_meta'] = true;

    	$defaults['cream_magazine_homepage_sidebar'] = 'right';

        $defaults['cream_magazine_enable_top_header'] = false;
    	$defaults['cream_magazine_enable_sticky_menu_section'] = false;
        $defaults['cream_magazine_enable_home_button'] = false;
    	$defaults['cream_magazine_enable_search_button'] = false;
        $defaults['cream_magazine_enable_menu_description'] = false;
        $defaults['cream_magazine_select_header_layout'] = 'header_1';
        $defaults['cream_magazine_header_overlay_color'] = 'rgba(0,0,0,0.2)';
        
        $defaults['cream_magazine_enable_scroll_top_button'] = true;
        $defaults['cream_magazine_show_footer_widget_area'] = true;
        $defaults['cream_magazine_show_footer_widget_area_on_mobile_n_tablet'] = true;
    	$defaults['cream_magazine_copyright_credit'] = '';

        $defaults['cream_magazine_enable_blog_categories_meta'] = true;
        $defaults['cream_magazine_enable_blog_author_meta'] = true;
        $defaults['cream_magazine_enable_blog_date_meta'] = true;
        $defaults['cream_magazine_enable_blog_cmnts_no_meta'] = true;
    	$defaults['cream_magazine_select_blog_sidebar_position'] = 'right';

        $defaults['cream_magazine_enable_archive_categories_meta'] = true;
        $defaults['cream_magazine_enable_archive_author_meta'] = true;
        $defaults['cream_magazine_enable_archive_date_meta'] = true;
        $defaults['cream_magazine_enable_archive_cmnts_no_meta'] = true;
    	$defaults['cream_magazine_select_archive_sidebar_position'] = 'right';

        $defaults['cream_magazine_enable_search_categories_meta'] = true;
        $defaults['cream_magazine_enable_search_author_meta'] = true;
        $defaults['cream_magazine_enable_search_date_meta'] = true;
        $defaults['cream_magazine_enable_search_cmnts_no_meta'] = true;
        $defaults['cream_magazine_show_pages_on_search_results'] = true;
    	$defaults['cream_magazine_select_search_sidebar_position'] = 'right';
        $defaults['cream_magazine_hide_pages_on_search_results'] = false;

        $defaults['cream_magazine_enable_post_single_tags_meta'] = true;
        $defaults['cream_magazine_enable_post_single_author_meta'] = true;
        $defaults['cream_magazine_enable_post_single_date_meta'] = true;
        $defaults['cream_magazine_enable_post_single_categories_meta'] = true;
        $defaults['cream_magazine_enable_post_single_featured_image'] = true;
        $defaults['cream_magazine_enable_post_single_featured_image_caption'] = false;
        $defaults['cream_magazine_enable_post_single_cmnts_no_meta'] = true;
    	$defaults['cream_magazine_enable_author_section'] = true;
    	$defaults['cream_magazine_enable_related_section'] = true;
    	$defaults['cream_magazine_related_section_title'] = '';
    	$defaults['cream_magazine_related_section_posts_number'] = 6;
        $defaults['cream_magazine_enable_related_section_categories_meta'] = true;
        $defaults['cream_magazine_enable_related_section_author_meta'] = true;
        $defaults['cream_magazine_enable_related_section_date_meta'] = true;
        $defaults['cream_magazine_enable_related_section_cmnts_no_meta'] = true;
        $defaults['cream_magazine_enable_post_common_sidebar_position'] = false;
        $defaults['cream_magazine_select_post_common_sidebar_position'] = 'right';

        $defaults['cream_magazine_enable_page_single_featured_image'] = true;
        $defaults['cream_magazine_enable_page_single_featured_image_caption'] = false;
        $defaults['cream_magazine_enable_page_common_sidebar_position'] = false;
        $defaults['cream_magazine_select_page_common_sidebar_position'] = 'right';

    	$defaults['cream_magazine_enable_category_meta'] = true;
    	$defaults['cream_magazine_enable_date_meta'] = true;
    	$defaults['cream_magazine_enable_author_meta'] = true;
    	$defaults['cream_magazine_enable_tag_meta'] = true;
    	$defaults['cream_magazine_enable_comment_meta'] = true;

    	$defaults['cream_magazine_post_excerpt_length'] = 15;

        $defaults['cream_magazine_facebook_link'] = '';
        $defaults['cream_magazine_twitter_link'] = '';
        $defaults['cream_magazine_instagram_link'] = '';
        $defaults['cream_magazine_youtube_link'] = '';
        $defaults['cream_magazine_vk_link'] = '';
        $defaults['cream_magazine_linkedin_link'] = '';
        $defaults['cream_magazine_vimeo_link'] = '';
        $defaults['cream_magazine_show_social_links_in_new_tab'] = true;

        $defaults['cream_magazine_enable_breadcrumb'] = true;
        
        $defaults['cream_magazine_enable_sticky_sidebar'] = true;
        $defaults['cream_magazine_show_sidebar_on_mobile_n_tablet'] = true;
        $defaults['cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet'] = false;

        $defaults['cream_magazine_enable_lazy_load'] = false;

        $defaults['cream_magazine_primary_theme_color'] = '#FF3D00';

        $defaults['cream_magazine_enable_common_cat_color'] = true;
        $defaults['cream_magazine_common_cat_bg_color'] = '#FF3D00';

        $defaults['cream_magazine_cat_bg_color_1'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_2'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_3'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_4'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_5'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_6'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_7'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_8'] = '#FF3D00';
        $defaults['cream_magazine_cat_bg_color_9'] = '#FF3D00';

        $defaults['cream_magazine_common_cat_txt_color'] = '#fff';

        $defaults['cream_magazine_cat_hover_bg_color'] = '#010101';
        $defaults['cream_magazine_cat_hover_txt_color'] = '#fff';

        $defaults['cream_magazine_content_link_color'] = '#FF3D00';
        $defaults['cream_magazine_content_link_hover_color'] = '#010101';

        $defaults['cream_magazine_save_value_as'] = 'slug';

        $defaults['cream_magazine_body_font_family'] = 'Muli:400,400i,600,600i,700,700i,800,800i';
        $defaults['cream_magazine_headings_font_family'] = 'Roboto:400,400i,500,500i,700,700i';

        $defaults['cream_magazine_display_top_widget_area'] = true;
        $defaults['cream_magazine_display_middle_widget_area'] = true;
        $defaults['cream_magazine_display_bottom_widget_area'] = true;

        $defaults['cream_magazine_tagline_color'] = '#000000';

        $defaults['cream_magazine_disable_link_focus_outline'] = false;
        $defaults['cream_magazine_disable_link_decoration_on_hover'] = true;

        if( class_exists( 'WooCommerce' ) ) {

            $defaults['cream_magazine_select_woocommerce_sidebar_position'] = 'right';
        }  


    	return $defaults;

	}
}


/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'cream_magazine_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function cream_magazine_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        // Headings Font Family
        $fonts[] = cream_magazine_get_option( 'cream_magazine_headings_font_family' );

        // Body Font Family
        $fonts[] = cream_magazine_get_option( 'cream_magazine_body_font_family' );

        if( ! empty( $fonts ) ) {

            $fonts = array_unique( $fonts );
        } else {

            $fonts[] = 'Roboto:400,400i,500,500i,700,700i';

            $fonts[] = 'Muli:400,400i,600,600i,700,700i';
        }

        $query_args = array(
            'family' => implode( '|', $fonts ),
            'subset' => 'latin,latin-ext',
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

        return esc_url_raw( $fonts_url );
    }
endif;


/**
 * Funtion To Get Sidebar Position
 */
if ( !function_exists( 'cream_magazine_sidebar_position' ) ) :

    /**
     * Return Position of Sidebar.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function cream_magazine_sidebar_position() {

        $sidebar_position = '';

        if( class_exists( 'Woocommerce' ) ) {
            if( is_woocommerce() || is_cart() || is_account_page() || is_checkout() ) {

                $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_woocommerce_sidebar_position' );
            } else {
                
                if( is_home() ) {
                    $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_blog_sidebar_position' );
                }

                if( is_archive() ) {
                    $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_archive_sidebar_position' );
                }

                if( is_search() ) {
                    $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_search_sidebar_position' );
                }

                if( is_single() ) {

                    $common_post_sidebar = cream_magazine_get_option( 'cream_magazine_enable_post_common_sidebar_position' );
                    
                    if( $common_post_sidebar == true ) {
                        $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_post_common_sidebar_position' );
                    } else {

                        $sidebar_position = get_post_meta( get_the_ID(), 'cream_magazine_sidebar_position', true );
                    }
                }

                if( is_page() ) {

                    $common_post_sidebar = cream_magazine_get_option( 'cream_magazine_enable_page_common_sidebar_position' );

                    if( $common_post_sidebar == true ) {
                        $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_page_common_sidebar_position' );
                    } else {

                        $sidebar_position = get_post_meta( get_the_ID(), 'cream_magazine_sidebar_position', true );
                    }
                }
            }
        } else {
            if( is_home() ) {
                $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_blog_sidebar_position' );
            }

            if( is_archive() ) {
                $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_archive_sidebar_position' );
            }

            if( is_search() ) {
                $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_search_sidebar_position' );
            }

            if( is_single() ) {

                $common_post_sidebar = cream_magazine_get_option( 'cream_magazine_enable_post_common_sidebar_position' );
                
                if( $common_post_sidebar == true ) {
                    $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_post_common_sidebar_position' );
                } else {

                    $sidebar_position = get_post_meta( get_the_ID(), 'cream_magazine_sidebar_position', true );
                }
            }

            if( is_page() ) {

                $common_post_sidebar = cream_magazine_get_option( 'cream_magazine_enable_page_common_sidebar_position' );

                if( $common_post_sidebar == true ) {
                    $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_page_common_sidebar_position' );
                } else {

                    $sidebar_position = get_post_meta( get_the_ID(), 'cream_magazine_sidebar_position', true );
                }
            }
        }
        
        if( empty( $sidebar_position ) ) {
            $sidebar_position = 'right';
        }

        return $sidebar_position;
    }
endif;



/**
 * Funtion To Check Sidebar Sticky
 */
if ( !function_exists( 'cream_magazine_check_sticky_sidebar' ) ) :

    /**
     * Return True or False
     *
     * @since 1.0.0
     * @return boolean.
     */
    function cream_magazine_check_sticky_sidebar() {

        $is_sticky_sidebar = cream_magazine_get_option( 'cream_magazine_enable_sticky_sidebar' );

        if( $is_sticky_sidebar == true ) {
            return true;
        } else {
            return false;
        }
    }
endif;


/**
 * Function To Get WooCommerce Sidebar
 */
if( ! function_exists( 'cream_magazine_woocommerce_sidebar' ) ) {

    function cream_magazine_woocommerce_sidebar() {

        $sidebar_position = cream_magazine_get_option( 'cream_magazine_select_woocommerce_sidebar_position' );

        if( ! is_active_sidebar( 'woocommerce-sidebar' ) || $sidebar_position == 'none' ) {

            return;
        }

        $sidebar_class = 'cm-col-lg-4 cm-col-12';

        $is_sticky = cream_magazine_check_sticky_sidebar();

        $show_sidebar_on_mobile_n_tablet = cream_magazine_get_option( 'cream_magazine_show_sidebar_on_mobile_n_tablet' );

        $sidebar_after_content = cream_magazine_get_option( 'cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet' );

        if( $sidebar_position == 'left' ) {

            $sidebar_class .= ' order-1';
        } 

        if( $is_sticky == true ) {

            $sidebar_class .= ' sticky_portion';
        }

        if( ! $show_sidebar_on_mobile_n_tablet ) {

            $sidebar_class .= ' hide-tablet hide-mobile';
        }

        if( $sidebar_after_content ) {

            $sidebar_class .= ' cm-order-2-mobile-tablet';
        }
        ?>
        <div class="<?php echo esc_attr( $sidebar_class ); ?>">
            <aside id="secondary" class="sidebar-widget-area">
                <?php dynamic_sidebar( 'woocommerce-sidebar' ); ?>
            </aside><!-- #secondary -->
        </div><!-- .col.sticky_portion -->
        <?php
    }
}


/**
 * Function To Get Thumbnail Class
 */
if( ! function_exists( 'cream_magazine_thumbnail_class' ) ) {

    function cream_magazine_thumbnail_class() {

        $thumbnail_class = 'post_thumb';

        echo esc_attr( $thumbnail_class );
    }
}


if( ! function_exists( 'cream_magazine_front_page_middle_area_class' ) ) {

    function cream_magazine_front_page_middle_area_class() {

        $container_class = '';

        $sidebar_position = cream_magazine_get_option( 'cream_magazine_homepage_sidebar' );

        $is_sticky = cream_magazine_check_sticky_sidebar();

        if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar' ) ) {

            if( $is_sticky ) {

                $container_class = 'cm-col-lg-8 cm-col-12 sticky_portion';
            } else {

                $container_class = 'cm-col-lg-8 cm-col-12';
            }

            if( $sidebar_position == 'left' ) {

                $container_class .= ' order-2';
            }
        } else {

            $container_class = 'cm-col-lg-12 cm-col-12';
        }

        return $container_class;
    }
}


/**
 * Filter For Main Query
 */
if( ! function_exists( 'cream_magazine_main_query_filter' ) ) :

    function cream_magazine_main_query_filter( $query ) {

        if ( is_admin() ) {

            return $query;
        }

        if ( $query->is_search && ( cream_magazine_get_option( 'cream_magazine_hide_pages_on_search_results' ) == true ) ) {
            
            $query->set('post_type', 'post');
        }

        return $query;
    }
endif;
add_filter( 'pre_get_posts', 'cream_magazine_main_query_filter' );