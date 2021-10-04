<?php
/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */
?>
<header class="general-header cm_header-five">
    <?php 
    if( has_header_image() ) { 
        ?>
        <div class="top-header" style="background-image: url(<?php header_image(); ?>);">
        <?php 
    } else { 
        ?>
        <div class="top-header" >
        <?php
    }
    ?>
        <div class="logo-container">
            <?php
            /**
            * Hook - cream_magazine_site_identity.
            *
            * @hooked cream_magazine_site_identity_action - 10
            */
            do_action( 'cream_magazine_site_identity' );
            ?>
        </div><!-- .logo-container -->
        <div class="mask"></div><!-- .mask -->
    </div><!-- .top-header -->
    <div class="navigation-container">
        <div class="cm-container">
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
                </div><!-- #main-nav.primary-navigation -->
               <div class="header-search-container">
                <div class="search-form-entry">
                    <?php get_search_form(); ?>
                </div><!-- // search-form-entry -->
            </div><!-- .search-container -->
            </nav><!-- .main-navigation -->
        </div><!-- .cm-container -->
    </div><!-- .navigation-container -->
</header><!-- .general-header.cm_header-five -->