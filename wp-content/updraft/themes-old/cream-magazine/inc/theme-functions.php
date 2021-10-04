<?php
/**
 * Custom functions for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cream_Magazine
 */
/*
 * Menu Wrapper
 */
if( ! function_exists( 'cream_magazine_main_menu_wrap' ) ) {
	
	function cream_magazine_main_menu_wrap() {

		$show_home_icon = cream_magazine_get_option( 'cream_magazine_enable_home_button' );

	  	$wrap  = '<ul id="%1$s" class="%2$s">';
	  	if( $show_home_icon == true ) {
	  		$wrap .= '<li class="home-btn"><a href="' . esc_url( home_url( '/' ) ) . '"><i class="feather icon-home" aria-hidden="true"></i></a></li>';
	  	}
	  	$wrap .= '%3$s';
	  	$wrap .= '</ul>';

	  	return $wrap;
	}
}


/**
 * Fallback For Main Menu
 */


if ( !function_exists( 'cream_magazine_navigation_fallback' ) ) {

    function cream_magazine_navigation_fallback() {

    	$show_home_icon = cream_magazine_get_option( 'cream_magazine_enable_home_button' );
        ?>
        <ul>
        	<?php if( $show_home_icon == true ) { ?>
	        	<li><a href="<?php echo esc_url( home_url( '/' ) );?>"><i class="feather icon-home" aria-hidden="true"></i></a></li>
	        <?php } ?>
            <?php 
                wp_list_pages( array( 
                    'title_li' => '', 
                    'depth' => 3,
                ) ); 
            ?>
        </ul>
        <?php    
    }
}

/*
 * Banner Post Query
 */
if( ! function_exists( 'cream_magazine_banner_query' ) ) {
	
	function cream_magazine_banner_query() {

		$banner_post_no = '';
		$banner_post_cats = cream_magazine_get_option( 'cream_magazine_banner_categories' );
		$banner_layout = cream_magazine_get_option( 'cream_magazine_select_banner_layout' );		
		$banner_post_no = absint( cream_magazine_get_option( 'cream_magazine_banner_posts_no' ) ) + 4 ;
		
		$banner_args = array(
		    'post_type' => 'post',
		    'ignore_sticky_posts' => true,
		);

		if( absint( $banner_post_no ) > 0 ) {
			
		    $banner_args['posts_per_page'] = absint( $banner_post_no );
		}

		if( !empty( $banner_post_cats ) ) {

			if( cream_magazine_get_option( 'cream_magazine_save_value_as' ) == 'slug' ) {

		    	$banner_args['category_name'] = implode( ',', $banner_post_cats );
		    } else {

		    	$banner_args['cat'] = implode( ',', $banner_post_cats );
		    }
		}  

		$banner_query = new WP_Query( $banner_args );

		return $banner_query;
	}
}

/*
 * Post Metas: Author, Date and Comments Number
 */
if( ! function_exists( 'cream_magazine_post_meta' ) ) {

	function cream_magazine_post_meta( $show_date, $show_author, $show_comments_no, $show_categories ) {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$enable_date = cream_magazine_get_option( 'cream_magazine_enable_date_meta' );

		$enable_author = cream_magazine_get_option( 'cream_magazine_enable_author_meta' );

		$enable_comments_no = cream_magazine_get_option( 'cream_magazine_enable_comment_meta' );

		$enable_categories = cream_magazine_get_option( 'cream_magazine_enable_category_meta' );

		if( get_post_type() == 'post' ) {
			?>
			<div class="cm-post-meta">
				<ul class="post_meta">
					<?php 
			        if( $enable_author == true ) {
				        if( $show_author == true ) {
				        	?>
				        	<li class="post_author">
				        		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
				            </li><!-- .post_author -->
				        	<?php
				        }
			        }

			        if( $enable_date == true ) {
						if( $show_date == true ) { 
							?>
				            <li class="posted_date">
				            	<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $time_string; // phpcs:ignore. ?></a>
				           	</li><!-- .posted_date -->
				           	<?php 
				        } 
			        }

			        if( $enable_comments_no == true ) {
				        if( $show_comments_no == true ) {
				        	if( ( comments_open() || get_comments_number() ) ) {
				        		?>
					            <li class="comments">
					            	<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_comments_number() ); ?></a>
					            </li><!-- .comments -->
					          	<?php
					        }
				        }
				    }

				    if ( $enable_categories == true ) {
					    if( $show_categories == true ) {
							/* translators: used between list items, there is a space after the comma */
							$categories_list = get_the_category_list( ', ' );

							if ( $categories_list ) {
								?>
								<li class="entry_cats">
									<?php echo wp_kses_post( $categories_list ); // WPCS: XSS OK. ?>
								</li><!-- .entry_cats -->
								<?php
							}
						}
					}
			        ?>
		        </ul><!-- .post_meta -->
		    </div><!-- .meta -->
			<?php
		}
	}
}

/*
 * Post Meta: Categories
 */
if( ! function_exists( 'cream_magazine_post_categories_meta' ) ) {

	function cream_magazine_post_categories_meta( $show_categories ) {

		if( cream_magazine_get_option( 'cream_magazine_enable_category_meta' ) == false ) {

			return;
		}

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			if( $show_categories == true ) {

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list();

				if ( $categories_list ) {
					?>
					<div class="entry_cats">
						<?php echo wp_kses_post( $categories_list ); // WPCS: XSS OK. ?>
					</div><!-- .entry_cats -->
					<?php
				}
			}
		}
	}
}

/*
 * Post Meta: Tags
 */
if( ! function_exists( 'cream_magazine_post_tags_meta' ) ) {

	function cream_magazine_post_tags_meta( $show_tags ) {

		if( ! $show_tags ) {

			return;
		}

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$enable_tags_meta = cream_magazine_get_option( 'cream_magazine_enable_tag_meta' ); 

			if( $enable_tags_meta == true ) {

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();

				if ( $tags_list ) {
					?>
					<div class="post_tags">
						<?php echo wp_kses_post( $tags_list ); // WPCS: XSS OK. ?>
					</div><!-- .post_tags -->
					<?php
				}
			}
		}
	}
}


/**
 * Funtion to define container row class
 */
if( ! function_exists( 'cream_magazine_main_row_class' ) ) {

	function cream_magazine_main_row_class() {

		$row_class = 'row';

		$sidebar_position = cream_magazine_sidebar_position();

		if( $sidebar_position == 'left' ) {

			$row_class = 'row-reverse';
		}

		return $row_class;

	}
}

/*
 * Function to define container class
 */
if( ! function_exists( 'cream_magazine_main_container_class' ) ) {

	function cream_magazine_main_container_class() {

		$sidebar_position = cream_magazine_sidebar_position();
		$is_sticky = cream_magazine_check_sticky_sidebar();
		$sidebar_after_content = cream_magazine_get_option( 'cream_magazine_show_sidebar_after_contents_on_mobile_n_tablet' );

		$main_class = 'cm-col-lg-8 cm-col-12';

		if( is_archive() || is_search() || is_home() || is_single() || is_page() ) {

			if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar' ) ) {

				if( $is_sticky == true ) {

					$main_class .= ' sticky_portion';
				}

				if( $sidebar_position == 'left' ) {

					$main_class .= ' order-2';
				}

				if( $sidebar_after_content ) {

					$main_class .= ' cm-order-1-mobile-tablet';
				}
			} else {
				
				$main_class = 'cm-col-lg-12 cm-col-12';
			}
		}
		return $main_class;
	}
}

/*
 * Function for post thumbnail
 */
if ( ! function_exists( 'cream_magazine_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function cream_magazine_post_thumbnail() {

		if ( post_password_required() || is_attachment() ) {

			return;
		}

		$lazy_thumbnail = cream_magazine_get_option( 'cream_magazine_enable_lazy_load' );

		if( is_archive() || is_search() || is_home() ) {

			$thumbnail_size = '';

			if( is_archive() || is_home() ) {
				$thumbnail_size = 'cream-magazine-thumbnail-2';
			} 

			if( is_search() ) {
				$thumbnail_size = 'cream-magazine-thumbnail-3';
			}

			if( has_post_thumbnail() ) {
				?>
				<div class="<?php cream_magazine_thumbnail_class(); ?>">
					<?php 
					if( $lazy_thumbnail == true ) {
						cream_magazine_lazy_thumbnail( $thumbnail_size );
					} else {
						cream_magazine_normal_thumbnail( $thumbnail_size );
					} 
					?>
				</div>
				<?php
			}
		}	


		if( is_single() || is_page() ) {

			if( has_post_thumbnail() ) {
				?>
				<div class="post_thumb">
					<figure>
					<?php 

					the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

				 	if( ( is_single() && cream_magazine_get_option( 'cream_magazine_enable_post_single_featured_image_caption' ) ) || ( is_page() && cream_magazine_get_option( 'cream_magazine_enable_page_single_featured_image_caption' ) ) ) {

						$thumbnail_attachment_caption = wp_get_attachment_caption( get_post_thumbnail_id( get_the_ID() ) );
						?>
						<figcaption><?php echo esc_html( $thumbnail_attachment_caption ); ?></figcaption>
						<?php
					}
					?>
					</figure>
				</div>
				<?php
			}
		}
	}
endif;


/**
 * Function to get lazy post thumbnail
 */
if( ! function_exists( 'cream_magazine_lazy_thumbnail' ) ) {

	function cream_magazine_lazy_thumbnail( $thumbnail_size ) {

		$thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		$thumbnail_srcset = wp_get_attachment_image_srcset( $thumbnail_id, $thumbnail_size );

		$thumbnail_sizes = wp_get_attachment_image_sizes( $thumbnail_id, $thumbnail_size );

		$thumbnail_attachment = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size );

		$padding_bottom = 0;

		if( $thumbnail_attachment[1] > 0 ) {

			$padding_bottom = ($thumbnail_attachment[2]/$thumbnail_attachment[1]) * 100;
		}
		?>
	 	<a href="<?php the_permalink(); ?>">
	 		<figure class="imghover image-holder" style="padding-bottom: <?php echo esc_attr( $padding_bottom ); ?>%;">
			 	<img class="lazy-image" src="" data-src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size ) ); ?>" data-srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>" alt="<?php cream_magazine_thumbnail_alt_text( get_the_ID() ); ?>" width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>">
			 	<noscript>
			 		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size ) ); ?>" srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" class="image-fallback" alt="<?php cream_magazine_thumbnail_alt_text( get_the_ID() ); ?>">
			 	</noscript>
		 	</figure>
	 	</a>
		<?php
	}
}


/**
 * Function to get normal post thumbnail
 */
if( ! function_exists( 'cream_magazine_normal_thumbnail' ) ) {

	function cream_magazine_normal_thumbnail( $thumbnail_size ) {
		?>
	 	<a href="<?php the_permalink(); ?>">
	 		<figure class="imghover">
		 		<?php the_post_thumbnail( $thumbnail_size, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		 	</figure>
	 	</a>
		<?php
	}
}


/**
 * Function to get post thumbnail Alt text
 */
if( !function_exists( 'cream_magazine_thumbnail_alt_text' ) ) {

    function cream_magazine_thumbnail_alt_text( $post_id ) {

        $post_thumbnail_id = get_post_thumbnail_id( $post_id );

        $alt_text = '';

        if( !empty( $post_thumbnail_id ) ) {

            $alt_text = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
        }

	    if( !empty( $alt_text ) ) {

	    	echo esc_attr( $alt_text );
	    } else {

	    	the_title_attribute();
	    }
    }
}


/**
 * Function to check if news ticker is active
 */
if( ! function_exists( 'cream_magazine_show_news_ticker' ) ) {

	function cream_magazine_show_news_ticker() {

		if( cream_magazine_get_option( 'cream_magazine_enable_ticker_news' ) ) {

			$show_on = cream_magazine_get_option( 'cream_magazine_show_ticker_news' );

			switch( $show_on ) {

				case 'choice_2' :

	                if( is_home() && is_front_page() ) {

	                    return true;
	                } else {

	                    if( is_home() && ! is_front_page() ) {

	                        return true;
	                    }
	                }

	                break;

	            case 'choice_1' :

	                if( ! is_home() && is_front_page() ) {

	                    return true;
	                }

	                break;

	            case 'choice_3' :

	                if( is_home() || is_front_page() ) {

	                    return true;
	                }

	                break;

	            default :

	                return false;
			}

			return false;
			
		} else {

			return false;
		}
	}
}


/**
 * Filters For Excerpt Length
 */
if( !function_exists( 'cream_magazine_excerpt_length' ) ) :
    /*
     * Excerpt More
     */
    function cream_magazine_excerpt_length( $length ) {

        if( is_admin() ) {
            return $length;
        }

        $excerpt_length = cream_magazine_get_option( 'cream_magazine_post_excerpt_length' );

        if ( absint( $excerpt_length ) > 0 ) {
            $excerpt_length = absint( $excerpt_length );
        }

        return $excerpt_length;
    }
endif;
add_filter( 'excerpt_length', 'cream_magazine_excerpt_length' );


/**
 * Function to enable menu description
 */
if( ! function_exists( 'cream_magazine_menu_description' ) ) {

    function cream_magazine_menu_description( $item_output, $item, $depth, $args ) {

    	if( ! cream_magazine_get_option( 'cream_magazine_enable_menu_description' ) ) {

    		return $item_output;
    	}

        if ( !empty( $item->description ) ) {

            $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
        }
     
        return $item_output;
    }
}
add_filter( 'walker_nav_menu_start_el', 'cream_magazine_menu_description', 10, 4 );