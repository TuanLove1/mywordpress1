<?php

$cream_magazine_theme = wp_get_theme( 'cream-magazine' );

define( 'CREAM_MAGAZINE_VERSION', $cream_magazine_theme->get( 'Version' ) );

require get_template_directory() . '/inc/class-cream-magazine.php';


function cream_magazine_run() {

	$cream_magazine = new Cream_Magazine();
}

cream_magazine_run();