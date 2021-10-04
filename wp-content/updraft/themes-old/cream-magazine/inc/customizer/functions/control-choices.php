<?php

if( ! function_exists( 'cream_magazine_categories_tax_slug' ) ) {

	function cream_magazine_categories_tax_slug() {

		$taxonomy = 'category';

		$cat_terms = get_terms( $taxonomy );

		$dropdown = array();

		foreach( $cat_terms as $cat_term ) {

			$dropdown[$cat_term->slug] = $cat_term->name;
		}

		return $dropdown;
	}
}



if( ! function_exists( 'cream_magazine_categories_tax_id' ) ) {

	function cream_magazine_categories_tax_id() {

		$taxonomy = 'category';

		$cat_terms = get_terms( $taxonomy );

		$dropdown = array();

		foreach( $cat_terms as $cat_term ) {

			$dropdown[$cat_term->term_id] = $cat_term->name;
		}

		return $dropdown;
	}
}


if( ! function_exists( 'cream_magazine_ticker_news_on_pages' ) ) {

	function cream_magazine_ticker_news_on_pages() {

		return array(
			'choice_1' => esc_html__( 'Front Page Only', 'cream-magazine' ),
			'choice_2' => esc_html__( 'Blog Page Only', 'cream-magazine' ),
			'choice_3' => esc_html__( 'Both Front Page & Blog Page', 'cream-magazine' )
		);
	}
}


if( ! function_exists( 'cream_magazine_save_value_as' ) ) {

	function cream_magazine_save_value_as() {

		return array(
			'slug' => esc_html__( 'Slug', 'cream-magazine' ),
			'id' => esc_html__( 'ID', 'cream-magazine' )
		);
	}
}


if( ! function_exists( 'cream_magazine_header_layouts' ) ) {

	function cream_magazine_header_layouts() {

		return array(
			'header_1' => get_template_directory_uri() . '/admin/images/header-placeholders/header_1.png',
			'header_2' => get_template_directory_uri() . '/admin/images/header-placeholders/header_2.png',
		);
	}
}


if( ! function_exists( 'cream_magazine_sidebar_positions' ) ) {

	function cream_magazine_sidebar_positions() {

		return array(
			'left' => get_template_directory_uri() . '/admin/images/sidebar-placeholders/sidebar_left.png',
			'right' => get_template_directory_uri() . '/admin/images/sidebar-placeholders/sidebar_right.png',
			'none' => get_template_directory_uri() . '/admin/images/sidebar-placeholders/sidebar_none.png',
		);
	}
}


if( ! function_exists( 'cream_magazine_google_font_family_choices' ) ) {

	function cream_magazine_google_font_family_choices() {

		return array(
		    'Roboto:400,400i,500,500i,700,700i' => 'Roboto',
		    'Nunito:400,400i,600,600i,700,700i,800,800i' => 'Nunito',
		    'DM+Sans:400,400i,500,500i,700,700i' => 'DM Sans',
		    'Muli:400,400i,600,600i,700,700i,800,800i' => 'Muli',
		    'Open+Sans:400,400i,600,600i,700,700i' => 'Open Sans',
		    'Lato:400,400i,700,700i' => 'Lato',
		    'Poppins:400,400i,500,500i,600,600i,700,700i' => 'Poppins',
		    'Lora:400,400i,500,500i,600,600i,700,700i' => 'Lora',
		    'IBM+Plex+Sans:400,400i,500,500i,600,600i,700,700i' => 'IBM Plex Serif',
		    'Noto+Sans:400,400i,700,700i'=>'Noto Sans',
		    'Noto+Sans+JP:400,500,700' => 'Noto Sans JP',
		    'Noto+Sans+KR:400,500,700' => 'Noto Sans KR',
		    'Source+Sans+Pro:400,400i,600,600i,700,700i' => 'Source Sans Pro',
		    'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' => 'Montserrat',
		    'Ubuntu:400,400i,500,500i,700,700i' => 'Ubuntu',
		    'Cairo:400,600,700' =>'Cairo',
		    'Heebo:400,500,700,800' => 'Heebo',
		    'Karma:400,500,600,700' => 'Karma',
		    'Mukta:400,500,600,700,800' => 'Mukta',
		    'Kanit:400,400i,500,500i,600,600i,700,700i' => 'Kanit',
		    'Merriweather:400,400i,700,700i' => 'Merriweather'
		);
	}
}