<?php
/*
 *  Dynamic styles from customizer
 */

if( ! function_exists( 'cream_magazine_dynamic_styles' ) ) {

	function cream_magazine_dynamic_styles() {

		$google_fonts = cream_magazine_google_font_family_choices();

		$body_font_family = cream_magazine_get_option( 'cream_magazine_body_font_family' );

		$headings_font_family = cream_magazine_get_option( 'cream_magazine_headings_font_family' );

		$primary_theme_color = cream_magazine_get_option( 'cream_magazine_primary_theme_color' );

		$header_overlay = cream_magazine_get_option( 'cream_magazine_header_overlay_color' );
		?>
		<style>
			<?php
			if( cream_magazine_get_option( 'cream_magazine_disable_link_focus_outline' ) ) {
				?>
				a:focus {

					outline: none !important;
				}
				<?php
			}  

			if( cream_magazine_get_option( 'cream_magazine_disable_link_decoration_on_hover' ) ) {
				?>
				a:hover {

					text-decoration: none !important;
				}
				<?php
			}

			if( !empty( $primary_theme_color ) ) {
				?>
				button,
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.primary-navigation > ul > li.home-btn,
				.cm_header_lay_three .primary-navigation > ul > li.home-btn,
				.news_ticker_wrap .ticker_head,
				#toTop,
				.section-title h2::after,
				.sidebar-widget-area .widget .widget-title h2::after,
				.footer-widget-container .widget .widget-title h2::after,
				#comments div#respond h3#reply-title::after,
				#comments h2.comments-title:after,
				.post_tags a,
				.owl-carousel .owl-nav button.owl-prev, 
				.owl-carousel .owl-nav button.owl-next,
				.cm_author_widget .author-detail-link a,
				.error_foot form input[type="submit"], 
				.widget_search form input[type="submit"],
				.header-search-container input[type="submit"],
				.trending_widget_carousel .owl-dots button.owl-dot,
				.pagination .page-numbers.current,
				.post-navigation .nav-links .nav-previous a, 
				.post-navigation .nav-links .nav-next a,
				#comments form input[type="submit"],
				footer .widget.widget_search form input[type="submit"]:hover,
				.widget_product_search .woocommerce-product-search button[type="submit"],
				.woocommerce ul.products li.product .button,
				.woocommerce .woocommerce-pagination ul.page-numbers li span.current,
				.woocommerce .product div.summary .cart button.single_add_to_cart_button,
				.woocommerce .product div.woocommerce-tabs div.panel #reviews #review_form_wrapper .comment-form p.form-submit .submit,
				.woocommerce .product section.related > h2::after,
				.woocommerce .cart .button:hover, 
				.woocommerce .cart .button:focus, 
				.woocommerce .cart input.button:hover, 
				.woocommerce .cart input.button:focus, 
				.woocommerce #respond input#submit:hover, 
				.woocommerce #respond input#submit:focus, 
				.woocommerce button.button:hover, 
				.woocommerce button.button:focus, 
				.woocommerce input.button:hover, 
				.woocommerce input.button:focus,
				.woocommerce #respond input#submit.alt:hover, 
				.woocommerce a.button.alt:hover, 
				.woocommerce button.button.alt:hover, 
				.woocommerce input.button.alt:hover,
				.woocommerce a.remove:hover,
				.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
				.woocommerce a.button:hover, 
				.woocommerce a.button:focus,
				.widget_product_tag_cloud .tagcloud a:hover, 
				.widget_product_tag_cloud .tagcloud a:focus,
				.woocommerce .widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle,
				.error_page_top_portion,
				.primary-navigation ul li a span.menu-item-description {

					background-color: <?php echo esc_attr( $primary_theme_color ); ?>;
				}
				

				a:hover,
				.post_title h2 a:hover,
				.post_title h2 a:focus,
				.post_meta li a:hover,
				.post_meta li a:focus,
				ul.social-icons li a[href*=".com"]:hover::before,
				.ticker_carousel .owl-nav button.owl-prev i, 
				.ticker_carousel .owl-nav button.owl-next i,
				.news_ticker_wrap .ticker_items .item a:hover,
				.news_ticker_wrap .ticker_items .item a:focus,
				.cm_banner .post_title h2 a:hover,
				.cm_banner .post_meta li a:hover,
				.cm_middle_post_widget_one .post_title h2 a:hover, 
				.cm_middle_post_widget_one .post_meta li a:hover,
				.cm_middle_post_widget_three .post_thumb .post-holder a:hover,
				.cm_middle_post_widget_three .post_thumb .post-holder a:focus,
				.cm_middle_post_widget_six .middle_widget_six_carousel .item .card .card_content a:hover, 
				.cm_middle_post_widget_six .middle_widget_six_carousel .item .card .card_content a:focus,
				.cm_post_widget_twelve .card .post-holder a:hover, 
				.cm_post_widget_twelve .card .post-holder a:focus,
				.cm_post_widget_seven .card .card_content a:hover, 
				.cm_post_widget_seven .card .card_content a:focus,
				.copyright_section a:hover,
				.footer_nav ul li a:hover,
				.breadcrumb ul li:last-child span,
				.pagination .page-numbers:hover,
				#comments ol.comment-list li article footer.comment-meta .comment-metadata span.edit-link a:hover,
				#comments ol.comment-list li article .reply a:hover,
				.social-share ul li a:hover,
				ul.social-icons li a:hover,
				ul.social-icons li a:focus,
				.woocommerce ul.products li.product a:hover,
				.woocommerce ul.products li.product .price,
				.woocommerce .woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
				.woocommerce div.product p.price, 
				.woocommerce div.product span.price,
				.video_section .video_details .post_title h2 a:hover,
				.primary-navigation.dark li a:hover,
				footer .footer_inner a:hover,
				.footer-widget-container ul.post_meta li:hover span, 
				.footer-widget-container ul.post_meta li:hover a,
				ul.post_meta li a:hover,
				.cm-post-widget-two .big-card .post-holder .post_title h2 a:hover,
				.cm-post-widget-two .big-card .post_meta li a:hover,
				.copyright_section .copyrights a,
				.breadcrumb ul li a:hover, 
				.breadcrumb ul li a:hover span {

					color: <?php echo esc_attr( $primary_theme_color ); ?>;
				}
				
				.ticker_carousel .owl-nav button.owl-prev, 
				.ticker_carousel .owl-nav button.owl-next,
				.error_foot form input[type="submit"], 
				.widget_search form input[type="submit"],
				.pagination .page-numbers:hover,
				#comments form input[type="submit"],
				.social-share ul li a:hover,
				.header-search-container .search-form-entry,
				.widget_product_search .woocommerce-product-search button[type="submit"],
				.woocommerce .woocommerce-pagination ul.page-numbers li span.current,
				.woocommerce .woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
				.woocommerce a.remove:hover,
				.ticker_carousel .owl-nav button.owl-prev:hover, 
				.ticker_carousel .owl-nav button.owl-next:hover,
				footer .widget.widget_search form input[type="submit"]:hover,
				.trending_widget_carousel .owl-dots button.owl-dot,
				.the_content blockquote,
				.widget_tag_cloud .tagcloud a:hover {

					border-color: <?php echo esc_attr( $primary_theme_color ); ?>;
				}
				<?php
			}

			if( !empty( $header_overlay ) ) {
				?>
				header .mask {
					background-color: <?php echo esc_attr( $header_overlay ); ?>;
				}
				<?php
			}

			if( has_header_image() ) {
				?>
				header.cm-header-style-one {

					background-image: url(<?php header_image(); ?>);
				}
				<?php
			}

			if( cream_magazine_get_option( 'cream_magazine_tagline_color' ) ) {
				?>
				.site-description {

					color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_tagline_color' ) ); ?>;
				}
				<?php
			}

			if( $body_font_family ) {
				?>
				body {

					font-family: <?php echo esc_attr( $google_fonts[ $body_font_family ] ); ?>;
				}
				<?php
			}

			if( $headings_font_family ) {
				?>
				h1, 
				h2, 
				h3, 
				h4, 
				h5, 
				h6, 
				.site-title {

					font-family: <?php echo esc_attr( $google_fonts[ $headings_font_family ] ); ?>;
				}
				<?php
			}


			if( cream_magazine_get_option( 'cream_magazine_enable_common_cat_color' ) ) {
				
				if( cream_magazine_get_option( 'cream_magazine_common_cat_bg_color' ) ) {
					?>
					.entry_cats ul.post-categories li a {

						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_common_cat_bg_color' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_common_cat_txt_color' ) ) {
					?>
					.entry_cats ul.post-categories li a {

						color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_common_cat_txt_color' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_hover_bg_color' ) ) {
					?>
					.entry_cats ul.post-categories li a:hover {

						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_hover_bg_color' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_hover_txt_color' ) ) {
					?>
					.entry_cats ul.post-categories li a:hover {

						color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_hover_txt_color' ) ); ?>;
					}
					<?php
				}

			} else {
				
				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_1' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+1) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_1' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_2' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+2) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_2' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_3' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+3) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_3' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_4' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+4) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_4' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_5' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+5) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_5' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_6' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+6) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_6' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_7' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+7) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_7' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_8' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+8) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_8' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_bg_color_9' ) ) {
					?>
					.entry_cats ul.post-categories li:nth-child(9n+9) a {
						
						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_bg_color_9' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_common_cat_txt_color' ) ) {
					?>
					.entry_cats ul.post-categories li a {

						color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_common_cat_txt_color' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_hover_bg_color' ) ) {
					?>
					.entry_cats ul.post-categories li a:hover {

						background-color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_hover_bg_color' ) ); ?>;
					}
					<?php
				}

				if( cream_magazine_get_option( 'cream_magazine_cat_hover_txt_color' ) ) {
					?>
					.entry_cats ul.post-categories li a:hover {

						color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_cat_hover_txt_color' ) ); ?>;
					}
					<?php
				}
			}


			if( cream_magazine_get_option( 'cream_magazine_content_link_color' ) ) {
				?>

				.the_content a,
				.the_content a {

					color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_content_link_color' ) ); ?>;
				}
				<?php
			}

			if( cream_magazine_get_option( 'cream_magazine_content_link_hover_color' ) ) {
				?>
				.the_content a:hover,
				.the_content a:hover {

					color: <?php echo esc_attr( cream_magazine_get_option( 'cream_magazine_content_link_hover_color' ) ); ?>;
				}
				<?php
			}
			?>
		</style>
		<?php
	}
}
add_action( 'wp_head', 'cream_magazine_dynamic_styles', 10 );