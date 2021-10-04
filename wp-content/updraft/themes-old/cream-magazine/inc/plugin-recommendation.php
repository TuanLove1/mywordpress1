<?php
/**
 * Recommend plugins that are comaptible.
 *
 * @since 2.0.0
 */

/*
 * Hook - Plugin Recommendation. This hook is dependent to class-tgm-plugin-activation.php
 *
 *
 */
if ( ! function_exists( 'cream_magazine_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function cream_magazine_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => 'Themebeez Toolkit',
                'slug'     => 'themebeez-toolkit',
                'required' => false,
            ),
            array(
                'name'     => 'Universal Google AdSense And Ads Manager',
                'slug'     => 'universal-google-adsense-and-ads-manager',
                'required' => false,
            ),
        );

        tgmpa( $plugins );
    }
endif;
add_action( 'tgmpa_register', 'cream_magazine_recommended_plugins' );