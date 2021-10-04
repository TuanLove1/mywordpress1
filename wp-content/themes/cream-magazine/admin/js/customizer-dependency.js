/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function() {

	var api = wp.customize;

	api.bind( 'ready', function() {

		function cream_magazine_control_visibility( mainControl, dependentControl ) {

			if( dependentControl.constructor === Array ) {

				var dependentControlsLength = dependentControl.length;

				for( i=0 ; i<dependentControlsLength ; i++ ) {

					// Only show a control when there's a control enabled.
					api( mainControl, function( setting ) {
						api.control( dependentControl[i], function( control ) {
							var visibility = function() {
								if ( true === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
						});
					});
				}
			} else {

				// Only show a control when there's a control enabled.
				api( mainControl, function( setting ) {
					api.control( dependentControl, function( control ) {
						var visibility = function() {
							if ( true === setting.get() ) {
								control.container.slideDown( 180 );
							} else {
								control.container.slideUp( 180 );
							}
						};

						visibility();
						setting.bind( visibility );
					});
				});
			}
		}

		var bannerDependentControls = [ 
			'cream_magazine_banner_separator_1', 
			'cream_magazine_banner_categories', 
			'cream_magazine_banner_separator_2', 
			'cream_magazine_banner_posts_no',
			'cream_magazine_banner_separator_3',
			'cream_magazine_enable_banner_author_meta',
			'cream_magazine_enable_banner_date_meta',
			'cream_magazine_enable_banner_cmnts_no_meta',
			'cream_magazine_enable_banner_categories_meta' 
			];

		cream_magazine_control_visibility( 
			'cream_magazine_enable_banner', 
			bannerDependentControls 
		);


		var tickerDependentControls = [
			'cream_magazine_news_ticker_separator_1',
			'cream_magazine_show_ticker_news',
			'cream_magazine_news_ticker_separator_2',
			'cream_magazine_ticker_news_title',
			'cream_magazine_ticker_news_categories',
			'cream_magazine_ticker_news_posts_no'
		];

		cream_magazine_control_visibility( 
			'cream_magazine_enable_ticker_news', 
			tickerDependentControls 
		);

		cream_magazine_control_visibility( 
			'cream_magazine_show_footer_widget_area', 
			'cream_magazine_show_footer_widget_area_on_mobile_n_tablet' 
		);
		
		cream_magazine_control_visibility( 
			'cream_magazine_show_sidebar_on_mobile_n_tablet', 
			'cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet' 
		);

		cream_magazine_control_visibility( 
			'cream_magazine_enable_post_single_featured_image', 
			'cream_magazine_enable_post_single_featured_image_caption' 
		);

		var relatedPostsDependentControls = [
			'cream_magazine_related_section_title',
			'cream_magazine_related_section_posts_number',
			'cream_magazine_enable_related_section_author_meta',
			'cream_magazine_enable_related_section_date_meta',
			'cream_magazine_enable_related_section_cmnts_no_meta',
			'cream_magazine_enable_related_section_categories_meta'
		];

		cream_magazine_control_visibility( 
			'cream_magazine_enable_related_section', 
			relatedPostsDependentControls 
		);

		cream_magazine_control_visibility( 
			'cream_magazine_enable_post_common_sidebar_position', 
			'cream_magazine_select_post_common_sidebar_position' 
		);

		cream_magazine_control_visibility( 
			'cream_magazine_enable_page_single_featured_image', 
			'cream_magazine_enable_page_single_featured_image_caption' 
		);

		cream_magazine_control_visibility( 
			'cream_magazine_enable_page_common_sidebar_position', 
			'cream_magazine_select_page_common_sidebar_position' 
		);


		cream_magazine_control_visibility( 
			'cream_magazine_display_middle_widget_area', 
			[ 'cream_magazine_separator_1', 'cream_magazine_homepage_sidebar' ] 
		);
	});
})( jQuery );
