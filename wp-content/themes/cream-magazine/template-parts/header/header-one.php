<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

$show_top_header = cream_magazine_get_option( 'cream_magazine_enable_top_header' );
?>
<header class="general-header cm-header-style-one">
    <?php if( $show_top_header == true ) { ?>
        <div class="top-header">
            <div class="cm-container">
                <div class="row">
                    <div class="cm-col-lg-8 cm-col-md-7 cm-col-12">
                        <div class="top-header-left">
                            <?php
                            /**
                            * Hook - cream_magazine_top_header_menu.
                            *
                            * @hooked cream_magazine_top_header_menu_action - 10
                            */
                            do_action( 'cream_magazine_top_header_menu' );
                            ?>
                        </div><!-- .top-header-left -->
                    </div><!-- col -->
                    <div class="cm-col-lg-4 cm-col-md-5 cm-col-12">
                        <div class="top-header-social-links">
                            <?php
                            /**
                            * Hook - cream_magazine_social_links.
                            *
                            * @hooked cream_magazine_social_links_action - 10
                            */
                            do_action( 'cream_magazine_social_links' );
                            ?>
                        </div><!-- .top-header-social-links -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .cm-container -->
        </div><!-- .top-header -->
    <?php } ?>
    <div class="cm-container">
        <div class="logo-container">
            <div class="row align-items-center">
                <div class="cm-col-lg-4 cm-col-12">
                    <?php
                    /**
                    * Hook - cream_magazine_site_identity.
                    *
                    * @hooked cream_magazine_site_identity_action - 10
                    */
                    do_action( 'cream_magazine_site_identity' );
                    ?>
                </div><!-- .col -->
                <?php if( is_active_sidebar( 'header-advertisement' ) ) { ?>
                    <div class="cm-col-lg-8 cm-col-12">
                        <div class="advertisement-area">
                            <?php dynamic_sidebar( 'header-advertisement' ); ?>
                        </div><!-- .advertisement-area -->
                    </div><!-- .col -->
                <?php } ?>
            </div><!-- .row -->
        </div><!-- .logo-container -->
        <nav class="main-navigation">
            <div id="main-nav" class="primary-navigation">
                <?php
                /**
                * Hook - cream_magazine_main_menu.
                *
                * @hooked cream_magazine_top-header_menu_action - 10
                */
                do_action( 'cream_magazine_main_menu' );
                ?>
            </div><!-- .primary-navigation -->
            <div class="header-search-container">
                <div class="search-form-entry">
                    <?php get_search_form(); ?>
                </div><!-- // search-form-entry -->
            </div><!-- .search-container -->
        </nav><!-- .main-navigation -->
    </div><!-- .cm-container -->
</header><!-- .general-header -->