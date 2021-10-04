<?php
/**
 * Template part for displaying front page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

$show_banner = cream_magazine_get_option( 'cream_magazine_enable_banner' );
    
if( $show_banner == true ) {
    ?>
    <div class="banner-area">            
        <?php
        /**
        * Hook - cream_magazine_banner_slider.
        *
        * @hooked cream_magazine_banner_slider_action - 10
        */
        do_action( 'cream_magazine_banner_slider' );
        ?>
    </div><!-- .banner-area -->
    <?php
}

if( is_active_sidebar( 'home-top-news-area' ) && cream_magazine_get_option( 'cream_magazine_display_top_widget_area' ) ) {
    ?>
    <div class="top-news-area news-area">
        <div class="cm-container">
            <?php
            /**
            * Hook - cream_magazine_top_news.
            *
            * @hooked cream_magazine_top_news_action - 10
            */
            do_action( 'cream_magazine_top_news' );
        	?>
        </div><!-- .cm-container -->
    </div><!-- .top-news-area.news-area -->
    <?php
}

if( cream_magazine_get_option( 'cream_magazine_display_middle_widget_area' ) ) {
    ?>
    <div class="middle-news-area news-area">
        <div class="cm-container">
            <div class="left_and_right_layout_divider">
                <div class="row">
                    <?php
                    $sidebar_position = cream_magazine_get_option( 'cream_magazine_homepage_sidebar' );
                    if( $sidebar_position == 'left' ) {
                        get_sidebar();
                    }

                    $middle_area_class = cream_magazine_front_page_middle_area_class();
                    ?>
                    <div class="<?php echo esc_attr( $middle_area_class ); ?>">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <?php
                                /**
                                * Hook - cream_magazine_middle_news.
                                *
                                * @hooked cream_magazine_middle_news_action - 10
                                */
                                do_action( 'cream_magazine_middle_news' );
                                ?>
                            </main><!-- #main.site-main -->
                        </div><!-- #primary.content-area -->
                    </div><!-- .col -->
                    <?php 
                    if( $sidebar_position == 'right' ) {
                        get_sidebar();
                    }
                    ?>
                </div><!-- .main row -->
            </div><!-- .left_and_right_layout_divider -->
        </div><!-- .cm-container -->
    </div><!-- .middle-news-area.news-area -->
    <?php
}

if( is_active_sidebar( 'home-bottom-news-area' ) && cream_magazine_get_option( 'cream_magazine_display_bottom_widget_area' ) ) {
    ?>
    <div class="bottom-news-area news-area">
        <div class="cm-container">
            <?php
            /**
            * Hook - cream_magazine_top_news.
            *
            * @hooked cream_magazine_top_news_action - 10
            */
            do_action( 'cream_magazine_bottom_news' );
            ?>
        </div><!-- .cm-container -->
    </div><!-- .bottom-news-area.news-area -->
    <?php
}