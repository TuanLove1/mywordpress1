<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

get_header();

if( cream_magazine_get_option( 'cream_magazine_enable_home_content' ) == true && is_front_page() && ! is_home() ) {
    
    get_template_part('template-parts/content', 'front-page' );
} else {
    ?>
    <div class="cm-container">
        <div class="inner-page-wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="cm_post_page_lay_wrap">
                        <?php
                        /**
    					* Hook - cream_magazine_breadcrumb.
    					*
    					* @hooked cream_magazine_breadcrumb_action - 10
    					*/
    					do_action( 'cream_magazine_breadcrumb' );
                        ?>
                        <div class="page-container clearfix">
                            <div class="row">                            
                                <div class="<?php echo esc_attr( cream_magazine_main_container_class() ); ?>">
                                    <?php
        							while ( have_posts() ) :

        								the_post();

        								get_template_part( 'template-parts/content', 'page' );

        								// If comments are open or we have at least one comment, load up the comment template.
        								if ( comments_open() || get_comments_number() ) :
        									comments_template();
        								endif;

        							endwhile; // End of the loop.
        							?>
                                </div><!-- .col -->
                                <?php 
                                if( class_exists( 'Woocommerce' ) ) {

                                    if( is_cart() || is_checkout() || is_account_page() ) {

                                        cream_magazine_woocommerce_sidebar();
                                    } else {
                                        
                                        get_sidebar();
                                    }
                                } else {

                                    get_sidebar();
                                }
                                ?>
                            </div><!-- .row -->
                        </div><!-- .page-container -->
                    </div><!-- .cm_post_page_lay_wrap -->
                </main><!-- #main.site-main -->
            </div><!-- #primary.content-area -->
        </div><!-- .inner-page-wrapper -->
    </div><!-- .cm-container -->
    <?php
}
get_footer();