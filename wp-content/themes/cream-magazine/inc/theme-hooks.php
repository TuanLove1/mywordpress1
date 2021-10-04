<?php
/**
 * Custom hooks for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cream_Magazine
 */

/**
 * Doctype declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_doctype_action' ) ) :

	function cream_magazine_doctype_action() {
	?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
	<?php		
	}
endif;
add_action( 'cream_magazine_doctype', 'cream_magazine_doctype_action', 10 );


/**
 * Head declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_head_action' ) ) :

 	function cream_magazine_head_action() {
 	?>
 	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
 	<?php	
 	}
endif;
add_action( 'cream_magazine_head', 'cream_magazine_head_action', 10 );


/**
 * Body Before declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_body_before_action' ) ) :

 	function cream_magazine_body_before_action() {
 	?>
 		<body <?php body_class(); ?>>
            <?php
            if( function_exists( 'wp_body_open' ) ) { 
                wp_body_open(); 
            }
            ?>
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cream-magazine' ); ?></a>
        <?php

 	}
endif;
add_action( 'cream_magazine_body_before', 'cream_magazine_body_before_action', 10 );


/**
 * Page Wapper Start declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_page_wrapper_start_action' ) ) :

 	function cream_magazine_page_wrapper_start_action() {
 	?>
 		<div class="page-wrapper">
 	<?php
 	}
endif;
add_action( 'cream_magazine_page_wrapper_start', 'cream_magazine_page_wrapper_start_action', 10 );


/**
 * Header layout selection declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_header_section_action' ) ) :

 	function cream_magazine_header_section_action() {

 		$header_layout = cream_magazine_get_option( 'cream_magazine_select_header_layout' );

 		if( $header_layout == 'header_1' ) {

 			get_template_part( 'template-parts/header/header', 'one' );
 		} else {

 			get_template_part( 'template-parts/header/header', 'two' );
 		}	
 	?>
 	<?php
 	}
endif;
add_action( 'cream_magazine_header_section', 'cream_magazine_header_section_action', 10 );


/**
 * Header top menu declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_top_header_menu_action' ) ) :

 	function cream_magazine_top_header_menu_action() {

 		if( has_nav_menu( 'menu-2' ) ) {

 			wp_nav_menu( array( 
 				'theme_location' => 'menu-2',
 				'container' => '', 
 				'depth' => 1,
 			) );
 		}
 	}
endif;
add_action( 'cream_magazine_top_header_menu', 'cream_magazine_top_header_menu_action', 10 );


/**
 * Main menu declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_main_menu_action' ) ) :

 	function cream_magazine_main_menu_action() {

 		$menu_args = array(
 			'theme_location' => 'menu-1',
 			'container' => '',
 			'menu_class' => '',
			'menu_id' => '',
			'items_wrap' => cream_magazine_main_menu_wrap(),
			'fallback_cb' => 'cream_magazine_navigation_fallback',
 		);
		wp_nav_menu( $menu_args );
 	}
endif;
add_action( 'cream_magazine_main_menu', 'cream_magazine_main_menu_action', 10 );


/**
 * Site identity declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_site_identity_action' ) ) :

 	function cream_magazine_site_identity_action() {
 		?>
 		<div class="logo">
 			<?php 
			if( has_custom_logo() ) { 
                if( ( is_front_page() && ( cream_magazine_get_option( 'cream_magazine_enable_home_content' ) == true || is_page_template( 'template-home.php' ) ) ) || is_home() ) {
                    ?>
                    <h1 class="site-logo">
                    <?php
                }
				the_custom_logo(); 
                if( ( is_front_page() && ( cream_magazine_get_option( 'cream_magazine_enable_home_content' ) == true || is_page_template( 'template-home.php' ) ) ) || is_home() ) {
                    ?>
                    </h1>
                    <?php
                }
			} else {
                if( ( is_front_page() && ( cream_magazine_get_option( 'cream_magazine_enable_home_content' ) == true || is_page_template( 'template-home.php' ) ) ) || is_home() ) {
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                } else {
                    ?>
                    <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
                    <?php
                }
				 
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description || is_customize_preview() ) {
	                ?>
	                <p class="site-description"><?php echo esc_html( $site_description ); /* WPCS: xss ok. */ ?></p>
					<?php
				}
			}
 			?>
        </div><!-- .logo -->
 		<?php
 	}
endif;
add_action( 'cream_magazine_site_identity', 'cream_magazine_site_identity_action', 10 );


/**
 * Social links declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_social_links_action' ) ) :

 	function cream_magazine_social_links_action() {

        $show_on_new_tab = cream_magazine_get_option( 'cream_magazine_show_social_links_in_new_tab' );
 		?>
 		<ul class="social-icons">
 			<?php
 			$facebook_link = cream_magazine_get_option( 'cream_magazine_facebook_link' );
 			if( !empty( $facebook_link ) ) {
 				?>
 				<li><a href="<?php echo esc_url( $facebook_link); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'Facebook', 'cream-magazine' ); ?></a></li>
 				<?php
 			}
 			$twitter_link = cream_magazine_get_option( 'cream_magazine_twitter_link' );
 			if( !empty( $twitter_link ) ) {
 				?>            
            	<li><a href="<?php echo esc_url( $twitter_link ); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'Twitter', 'cream-magazine' ); ?></a></li>
            	<?php
 			}
 			$instagram_link = cream_magazine_get_option( 'cream_magazine_instagram_link' );
 			if( !empty( $instagram_link ) ) {
 				?>       
            	<li><a href="<?php echo esc_url( $instagram_link ); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'Instagram', 'cream-magazine' ); ?></a></li>
            	<?php
 			}
 			$youtube_link = cream_magazine_get_option( 'cream_magazine_youtube_link' );
 			if( !empty( $youtube_link ) ) {
 				?>       
            	<li><a href="<?php echo esc_url( $youtube_link ); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'Youtube', 'cream-magazine' ); ?></a></li>
            	<?php
 			}
 			$vk_link = cream_magazine_get_option( 'cream_magazine_vk_link' );
 			if( !empty( $vk_link ) ) {
 				?>       
            	<li><a href="<?php echo esc_url( $vk_link ); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'VK', 'cream-magazine' ); ?></a></li>
            	<?php
 			}
 			$linkedin_link = cream_magazine_get_option( 'cream_magazine_linkedin_link' );
 			if( !empty( $linkedin_link ) ) {
 				?>       
            	<li><a href="<?php echo esc_url( $linkedin_link ); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'Linkedin', 'cream-magazine' ); ?></a></li>
            	<?php
 			}
 			$vimeo_link = cream_magazine_get_option( 'cream_magazine_vimeo_link' );
 			if( !empty( $vimeo_link ) ) {
 				?>       
            	<li><a href="<?php echo esc_url( $vimeo_link ); ?>" <?php if( $show_on_new_tab ) {?>target="_blank"<?php } ?>><?php echo esc_html__( 'Vimeo', 'cream-magazine' ); ?></a></li>
            	<?php
 			}
 			?>       
        </ul>
 		<?php
 	}
endif;
add_action( 'cream_magazine_social_links', 'cream_magazine_social_links_action', 10 );

/**
 * Ticker news declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_ticker_news_action' ) ) :

 	function cream_magazine_ticker_news_action() {

 		$news_ticker_section_title = cream_magazine_get_option( 'cream_magazine_ticker_news_title' );
 		$news_ticker_post_cats = cream_magazine_get_option( 'cream_magazine_ticker_news_categories' );
 		$news_ticker_post_nos = cream_magazine_get_option( 'cream_magazine_ticker_news_posts_no' );

 		$news_ticker_args = array(
 			'post_type' => 'post',
            'ignore_sticky_posts' => true,
 		);

 		if( !empty( $news_ticker_post_cats ) ) {

            if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

                $news_ticker_args['category_name'] = implode( ',', $news_ticker_post_cats );
            } else {

                $news_ticker_args['cat'] = implode( ',', $news_ticker_post_cats );
            }
 		}

 		if( absint( $news_ticker_post_nos ) > 0 ) {
			$news_ticker_args['posts_per_page'] = absint( $news_ticker_post_nos );
 		} else {
 			$news_ticker_args['posts_per_page'] = 6;
 		}

 		$news_ticker_query = new WP_Query( $news_ticker_args );

 		if( $news_ticker_query->have_posts() ) {
 			?>
	 		<div class="news_ticker_wrap clearfix">
	 			<?php if( !empty( $news_ticker_section_title ) ) { ?>
		            <div class="ticker_head">
                        <span class="ticker_icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>
		                <div class="ticker_title"><?php echo esc_html( $news_ticker_section_title ); ?></div>
		            </div><!-- .ticker_head -->
		        <?php } ?>
	            <div class="ticker_items">
	                <div class="owl-carousel ticker_carousel">
	                	<?php 
                		while( $news_ticker_query->have_posts() ) { 
                			$news_ticker_query->the_post(); 
                			?>
                			<div class="item">
		                        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		                    </div><!-- .item -->
                			<?php
                		} 
	                	?>
	                </div><!-- .owl-carousel -->
	            </div><!-- .ticker_items -->
	        </div><!-- .news_ticker_wrap.clearfix -->
	 		<?php
 		}
 		
 	}
endif;
add_action( 'cream_magazine_ticker_news', 'cream_magazine_ticker_news_action', 10 );

/**
 * Breadcrumb declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_breadcrumb_action' ) ) :

 	function cream_magazine_breadcrumb_action() {

 		$enable_breadcrumb = cream_magazine_get_option( 'cream_magazine_enable_breadcrumb' ); 

 		if( $enable_breadcrumb == true ) {
			?>
 			<div class="breadcrumb">
	            <?php
	                $breadcrumb_args = array(
	                    'show_browse' => false,
	                );
	                cream_magazine_breadcrumb_trail( $breadcrumb_args );
	            ?>
	        </div><!-- .breadcrumb -->
 			<?php
 		}  		
 	}
endif;
add_action( 'cream_magazine_breadcrumb', 'cream_magazine_breadcrumb_action', 10 );

/**
 * Pagination declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_pagination_action' ) ) :

 	function cream_magazine_pagination_action() {

        global $wp_query;

        if( $wp_query->max_num_pages != 1 ) {
     		?>
     		<div class="pagination">
    	 		<?php
            	the_posts_pagination( array(
            		'mid_size' 			 => 2,
            		'prev_text'          => esc_html__( 'Prev', 'cream-magazine' ),
    	            'next_text'          => esc_html__( 'Next', 'cream-magazine' ),
            	) );
    	        ?>
    	    </div>
    		<?php
        }
 	}
endif;
add_action( 'cream_magazine_pagination', 'cream_magazine_pagination_action', 10 );

/**
 * Banner/Slider layout selection declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_banner_slider_action' ) ) :
	
 	function cream_magazine_banner_slider_action() {

		get_template_part( 'template-parts/banner/banner', 'five' );
 	}
endif;
add_action( 'cream_magazine_banner_slider', 'cream_magazine_banner_slider_action', 10 );


/**
 * Top news section contents declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_top_news_action' ) ) :

 	function cream_magazine_top_news_action() {

 		if( is_active_sidebar( 'home-top-news-area' ) ) {

 			dynamic_sidebar( 'home-top-news-area' );
 		}
 	}
endif;
add_action( 'cream_magazine_top_news', 'cream_magazine_top_news_action', 10 );


/**
 * Middle news section contents declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_middle_news_action' ) ) :

 	function cream_magazine_middle_news_action() {

 		if( is_active_sidebar( 'home-middle-news-area' ) ) {

 			dynamic_sidebar( 'home-middle-news-area' );
 		}
 	}
endif;
add_action( 'cream_magazine_middle_news', 'cream_magazine_middle_news_action', 10 );


/**
 * Bottom news section contents declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_bottom_news_action' ) ) :

 	function cream_magazine_bottom_news_action() {

 		if( is_active_sidebar( 'home-bottom-news-area' ) ) {

 			dynamic_sidebar( 'home-bottom-news-area' );
 		}
 	}
endif;
add_action( 'cream_magazine_bottom_news', 'cream_magazine_bottom_news_action', 10 );


/**
 * Page Wapper End declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_page_wrapper_end_action' ) ) :

 	function cream_magazine_page_wrapper_end_action() {
 		?>
 		</div><!-- .page_wrap -->
 		<?php
 	}
endif;
add_action( 'cream_magazine_page_wrapper_end', 'cream_magazine_page_wrapper_end_action', 10 );


/**
 * Footer Wapper Start declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_footer_wrapper_start_action' ) ) :

 	function cream_magazine_footer_wrapper_start_action() {

        $footer_inner_class = 'footer_inner';

        if( cream_magazine_get_option( 'cream_magazine_show_footer_widget_area' ) == false ) {

            $footer_inner_class .= ' no-footer-widget-areas';
        }
 		?>
 		<footer class="footer">
	        <div class="<?php echo esc_attr( $footer_inner_class ); ?>">
	            <div class="cm-container">
 		<?php
 	}
endif;
add_action( 'cream_magazine_footer_wrapper_start', 'cream_magazine_footer_wrapper_start_action', 10 );


/**
 * Footer Widget Wapper Start declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_footer_widget_wrapper_start_action' ) ) :

 	function cream_magazine_footer_widget_wrapper_start_action() {

        $footer_widget_area_class = 'row footer-widget-container';

        $show_on_mobile_n_tablet = cream_magazine_get_option( 'cream_magazine_show_footer_widget_area_on_mobile_n_tablet' );

        if( ! $show_on_mobile_n_tablet ) {

            $footer_widget_area_class .= ' hide-tablet hide-mobile';
        }
 		?>
 		<div class="<?php echo esc_attr( $footer_widget_area_class ); ?>">
 		<?php
 	}
endif;
add_action( 'cream_magazine_footer_widget_wrapper_start', 'cream_magazine_footer_widget_wrapper_start_action', 10 );

/**
 * Left Footer Widgetarea declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_left_footer_widgetarea_action' ) ) :

 	function cream_magazine_left_footer_widgetarea_action() {
		?>
        <div class="cm-col-lg-4 cm-col-12">
            <div class="blocks">
                <?php 
                if( is_active_sidebar( 'footer-left' ) ) { 

                    dynamic_sidebar( 'footer-left' ); 
                }
                ?>
            </div><!-- .blocks -->
        </div><!-- .cm-col-->
		<?php 
 	}
endif;
add_action( 'cream_magazine_left_footer_widgetarea', 'cream_magazine_left_footer_widgetarea_action', 10 );


/**
 * Middle Footer Widgetarea declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_middle_footer_widgetarea_action' ) ) :

 	function cream_magazine_middle_footer_widgetarea_action() {
		?>
        <div class="cm-col-lg-4 cm-col-12">
            <div class="blocks">
                <?php 
                if( is_active_sidebar( 'footer-middle' ) ) {

                    dynamic_sidebar( 'footer-middle' );
                } 
                ?>
            </div><!-- .blocks -->
        </div><!-- .cm-col-->
		<?php 
 	}
endif;
add_action( 'cream_magazine_middle_footer_widgetarea', 'cream_magazine_middle_footer_widgetarea_action', 10 );


/**
 * Right Footer Widgetarea declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_right_footer_widgetarea_action' ) ) :

 	function cream_magazine_right_footer_widgetarea_action() {
		?>
        <div class="cm-col-lg-4 cm-col-12">
            <div class="blocks">
                <?php 
                if( is_active_sidebar( 'footer-right' ) ) { 

                    dynamic_sidebar( 'footer-right' );
                } 
                ?>
            </div><!-- .blocks -->
        </div><!-- .cm-col-->
		<?php 
 	}
endif;
add_action( 'cream_magazine_right_footer_widgetarea', 'cream_magazine_right_footer_widgetarea_action', 10 );

/**
 * Footer Widget Wapper End declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_footer_widget_wrapper_end_action' ) ) :

 	function cream_magazine_footer_widget_wrapper_end_action() {
 		?>
 		</div><!-- .row -->
 		<?php
 	}
endif;
add_action( 'cream_magazine_footer_widget_wrapper_end', 'cream_magazine_footer_widget_wrapper_end_action', 10 );

/**
 * Footer Copyright Wapper Start declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_footer_copyright_wrapper_start_action' ) ) :

 	function cream_magazine_footer_copyright_wrapper_start_action() {
 		?>
 		<div class="copyright_section">
            <div class="row">
 		<?php
 	}
endif;
add_action( 'cream_magazine_footer_copyright_wrapper_start', 'cream_magazine_footer_copyright_wrapper_start_action', 10 );


/**
 * Copyright Declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_copyright_action' ) ) :

    function cream_magazine_copyright_action() {

    	$copyright_text = cream_magazine_get_option( 'cream_magazine_copyright_credit' );
        ?>
        <div class="cm-col-lg-7 cm-col-md-6 cm-col-12">
            <div class="copyrights">
            	<p>
            		<?php
                    if( !empty( $copyright_text ) ) {

                        /* translators: 1: Copyright Text 2: Theme name, 3: Theme author. */
                        printf( __( '<span class="copyright-text">%1$s</span> %2$s by %3$s','cream-magazine' ), esc_html( $copyright_text ), 'Cream Magazine', '<a href="'. esc_url( 'https://themebeez.com' ) . '" rel="designer noopener" target="_blank">' . esc_html__( 'Themebeez', 'cream-magazine' ) . '</a>' );

                    } else {
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf( esc_html__( '%1$s by %2$s', 'cream-magazine' ), 'Cream Magazine', '<a href="'. esc_url( 'https://themebeez.com' ) . '">' . esc_html__( 'Themebeez', 'cream-magazine' ) . '</a>' );
                    }
                    ?>
            	</p>
            </div>
        </div><!-- .col -->
    	<?php
    }
endif;
add_action( 'cream_magazine_copyright', 'cream_magazine_copyright_action', 10 );


/**
 * Footer menu declaration of the theme.
 *
 * @since 1.0.0
 */


if( ! function_exists( 'cream_magazine_footer_menu_action' ) ) :

 	function cream_magazine_footer_menu_action() {
 		?>
 		<div class="cm-col-lg-5 cm-col-md-6 cm-col-12">
	        <div class="footer_nav">
	            <?php
	            if( has_nav_menu( 'menu-3' ) ) {
		 			wp_nav_menu( array( 
		 				'theme_location' => 'menu-3',
		 				'container' => '', 
		 				'depth' => 1,
		 			) );
		 		}
	            ?>
	        </div><!-- .footer_nav -->
	    </div><!-- .col -->
	    <?php 		
 	}
endif;
add_action( 'cream_magazine_footer_menu', 'cream_magazine_footer_menu_action', 10 );


/**
 * Footer Copyright Wapper End declaration of the theme.
 *
 * @since 1.0.0
 */

if( ! function_exists( 'cream_magazine_footer_copyright_wrapper_end_action' ) ) :

 	function cream_magazine_footer_copyright_wrapper_end_action() {
 		?>
 			</div><!-- .row -->
        </div><!-- .copyright_section -->
 		<?php
 	}
endif;
add_action( 'cream_magazine_footer_copyright_wrapper_end', 'cream_magazine_footer_copyright_wrapper_end_action', 10 );

/**
 * Footer Wapper End declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_footer_wrapper_end_action' ) ) :

 	function cream_magazine_footer_wrapper_end_action() {
 		?>
	 			</div><!-- .cm-container -->
	        </div><!-- .footer_inner -->
	    </footer><!-- .footer -->
 		<?php
 	}
endif;
add_action( 'cream_magazine_footer_wrapper_end', 'cream_magazine_footer_wrapper_end_action', 10 );


/**
 * Footer Declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'cream_magazine_footer_action' ) ) :

    function cream_magazine_footer_action() {
    	
        wp_footer();
    	?>
            </body>
        </html>
    	<?php
    }
endif;
add_action( 'cream_magazine_footer', 'cream_magazine_footer_action', 10 );



/**
 * Scroll Top Button 
 *
 * @since 2.0.0
 */
if( ! function_exists( 'cream_magazine_scroll_top_button_template' ) ) {

    function cream_magazine_scroll_top_button_template() {

        if( cream_magazine_get_option( 'cream_magazine_enable_scroll_top_button' ) == true ) {
            ?>
            <div class="backtoptop">
                <button id="toTop" class="btn btn-info">
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </button>
            </div><!-- ./ backtoptop -->
            <?php
        }
    }
}  
add_action( 'cream_magazine_scroll_top_button', 'cream_magazine_scroll_top_button_template', 10 );