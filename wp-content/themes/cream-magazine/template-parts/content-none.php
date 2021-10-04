<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

?>
<section class="nothing-found list_page_iner">
    <div class="section-title">
        <h1><?php esc_html_e( 'Nothing Found', 'cream-magazine' ); ?></h1><!-- .list_head -->
    </div><!-- .section-title -->
    <div class="error_foot">
        <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cream-magazine' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cream-magazine' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cream-magazine' ); ?></p>
			<?php
			
			get_search_form();

		endif;
		?>
    </div><!-- .error_foot -->
</section><!-- .list_page_iner -->
