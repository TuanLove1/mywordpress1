<?php
/**
 * Template part for displaying news ticker
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */
if( ! cream_magazine_show_news_ticker() ) {

	return;
}
?>
<div class="ticker-news-area">
    <div class="cm-container">
            <?php
    		/**
            * Hook - cream_magazine_ticker_news.
            *
            * @hooked cream_magazine_ticker_news_action - 10
            */
            do_action( 'cream_magazine_ticker_news' );
        ?>
    </div><!-- .cm-container -->
</div><!-- .ticker-news-area -->