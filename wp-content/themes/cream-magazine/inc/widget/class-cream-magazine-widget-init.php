<?php
/**
 * Cream Magazine Widget Init Class
 */
class Cream_Magazine_Widget_Init {

	/**
	 * Setup class.
	 *
	 * @return  void
	 */
	public function __construct() {	

		add_action( 'widgets_init', array( $this, 'widgets_init' ), 5 );

		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for this this.
	 *
	 * @return void
	 */
	public function load_dependencies() {
		// Load author widget class
		require get_template_directory() . '/inc/widget/sidebar-footer-widgets/class-cream-magazine-author-widget.php';
		// Load post widget class
		require get_template_directory() . '/inc/widget/sidebar-footer-widgets/class-cream-magazine-post-widget.php';
		// Load social widget class
		require get_template_directory() . '/inc/widget/sidebar-footer-widgets/class-cream-magazine-social-widget.php';
		// Load News Widgets
		require get_template_directory() . '/inc/widget/news-widgets/class-cream-magazine-news-widget-one.php';
		require get_template_directory() . '/inc/widget/news-widgets/class-cream-magazine-news-widget-two.php';
		require get_template_directory() . '/inc/widget/news-widgets/class-cream-magazine-news-widget-three.php';
		require get_template_directory() . '/inc/widget/news-widgets/class-cream-magazine-news-widget-six.php';
		require get_template_directory() . '/inc/widget/news-widgets/class-cream-magazine-news-widget-nine.php';
		require get_template_directory() . '/inc/widget/news-widgets/class-cream-magazine-news-widget-eleven.php';
	}

	/**
	 * Register widget area.
	 *
	 * @see 	https://codex.wordpress.org/Function_Reference/register_sidebar
	 * @return  void
	 */
	public function widgets_init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'cream-magazine' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Left', 'cream-magazine' ),
			'id'            => 'footer-left',
			'description'   => esc_html__( 'Add widgets here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Middle', 'cream-magazine' ),
			'id'            => 'footer-middle',
			'description'   => esc_html__( 'Add widgets here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Right', 'cream-magazine' ),
			'id'            => 'footer-right',
			'description'   => esc_html__( 'Add widgets here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Header Advertisement', 'cream-magazine' ),
			'id'            => 'header-advertisement',
			'description'   => esc_html__( 'Add widgets here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title"><h3>',
			'after_title'   => '</h3></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Home Top News Area', 'cream-magazine' ),
			'id'            => 'home-top-news-area',
			'description'   => esc_html__( 'Add Fullwidth News Widgets Here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget cm-post-widget-section %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="section-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Home Middle News Area', 'cream-magazine' ),
			'id'            => 'home-middle-news-area',
			'description'   => esc_html__( 'Add Halfwidth News Widgets Here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget cm-post-widget-section %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="section-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Home Bottom News Area', 'cream-magazine' ),
			'id'            => 'home-bottom-news-area',
			'description'   => esc_html__( 'Add Fullwidth News Widgets Here.', 'cream-magazine' ),
			'before_widget' => '<div id="%1$s" class="widget cm-post-widget-section %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="section-title"><h2>',
			'after_title'   => '</h2></div>',
		) );

		if( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Woocommerce Sidebar', 'cream-magazine' ),
				'id'            => 'woocommerce-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'cream-magazine' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h2>',
				'after_title'   => '</h2></div>',
			) );
		}

		register_widget( 'Cream_Magazine_Author_Widget' );

		register_widget( 'Cream_Magazine_Post_Widget' );
		
		register_widget( 'Cream_Magazine_Social_Widget' );

		// News Widgets
		register_widget( 'Cream_Magazine_News_Widget_One' );

		register_widget( 'Cream_Magazine_News_Widget_Two' );

		register_widget( 'Cream_Magazine_News_Widget_Three' );

		register_widget( 'Cream_Magazine_News_Widget_Six' );

		register_widget( 'Cream_Magazine_News_Widget_Nine' );

		register_widget( 'Cream_Magazine_News_Widget_Eleven' );
	}
}