<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cream_Magazine
 */

get_header();
	?>
	<div class="cm-container">
	    <div class="inner-page-wrapper">
	        <div id="primary" class="content-area">
	            <main id="main" class="site-main">
	                <?php
	                /**
					* Hook - cream_magazine_breadcrumb.
					*
					* @hooked cream_magazine_breadcrumb_action - 10
					*/
					do_action( 'cream_magazine_breadcrumb' );
					?>
	                <div class="row">
	                    <div class="cm-col-md-12 cm-col-sm-12 cm-col-xs-12">
	                        <div class="content-entry">
	                            <div class="error_page">
	                            	<div class="error_page_top_portion">
	                                <div class="error_head">
	                                    <h3><?php esc_html_e( '404', 'cream-magazine' ); ?></h3>
	                                    <h4><?php esc_html_e( 'Page Not Found !', 'cream-magazine' ); ?></h4>
	                                </div><!-- .error_head -->

	                                <div class="error_body">
	                                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Try searching below.', 'cream-magazine' ); ?></p>
	                                </div><!-- .error_body -->
	                                </div><!-- .error_page_top_portion -->
	                                <div class="error_foot">
	                                    <?php get_search_form(); ?>
	                                </div><!-- .error_foot -->
	                            </div><!-- .error_page -->
	                        </div><!-- .content-entry -->
	                    </div><!-- .col -->
	                </div><!-- .row -->
	            </main><!-- #main.site-main -->
	        </div><!-- #primary.content-area -->
	    </div><!-- .inner-page-wrapper -->
	</div><!-- .cm-container -->
	<?php
get_footer();
