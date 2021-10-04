<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

get_header();
	?>
	<div class="cm-container">
	    <div class="inner-page-wrapper">
	        <div id="primary" class="content-area">
	            <main id="main" class="site-main">
	                <div class="cm_archive_page">
	                    <?php
	                    /**
						* Hook - cream_magazine_breadcrumb.
						*
						* @hooked cream_magazine_breadcrumb_action - 10
						*/
						do_action( 'cream_magazine_breadcrumb' );
	                    ?>
	                    <div class="archive-container">
	                    	<div class="row">
		                        <div class="<?php echo esc_attr( cream_magazine_main_container_class() ); ?>">
		                            <div class="content-entry">
		                            	<?php
		                            	if( have_posts() ) {
			                            	?>
			                                <section class="list_page_iner">
			                                    <div class="section-title">
			                                    	<?php
													the_archive_title( '<h1>', '</h1>' );
													the_archive_description( '<div class="archive-description">', '</div>' );
													?>
			                                    </div><!-- .section-title -->
		                                		<div class="list_entry">
	                                                <section class="post-display-grid">
	                                                    <div class="section_inner">
	                                                        <div class="row">
	                                                            <?php
				                                            	/* Start the Loop */
																while ( have_posts() ) {

																	the_post();

																	/*
																	 * Include the Post-Type-specific template for the content.
																	 * If you want to override this in a child theme, then include a file
																	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
																	 */
																	get_template_part( 'template-parts/layout/layout', 'grid' );
																}
																?>
	                                                        </div><!-- .row -->
	                                                    </div><!-- .section_inner -->
	                                                </section><!-- .cm-post-widget-three -->
	                                            </div><!-- .list_entry -->
			                                </section><!-- .section list -->
			                                <?php
					                        /**
											* Hook - cream_magazine_pagination.
											*
											* @hooked cream_magazine_pagination_action - 10
											*/
											do_action( 'cream_magazine_pagination' );
										} else {
											get_template_part( 'template-parts/content', 'none' );
										}
										?>
		                            </div><!-- .content-entry -->
		                        </div>
		                        <?php get_sidebar(); ?>
		                    </div><!-- .row -->
	                    </div><!-- .archive-container -->
	                </div><!-- .cm_archive_page -->
	            </main><!-- #main.site-main -->
	        </div><!-- #primary.content-area -->
	    </div><!-- .inner-page-wrapper -->
	</div><!-- .cm-container -->
	<?php
get_footer();