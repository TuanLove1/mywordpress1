<?php
/**
 * Template part for displaying banner layout five
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cream_Magazine
 */

$banner_query = cream_magazine_banner_query();
$item_no = cream_magazine_get_option( 'cream_magazine_banner_posts_no' );

$cream_magazine_enable_lazy_load = cream_magazine_get_option( 'cream_magazine_enable_lazy_load' );

if( $banner_query->have_posts() ) {

    $show_categories_meta = cream_magazine_get_option( 'cream_magazine_enable_banner_categories_meta' );
    $show_author_meta = cream_magazine_get_option( 'cream_magazine_enable_banner_author_meta' );
    $show_date_meta = cream_magazine_get_option( 'cream_magazine_enable_banner_date_meta' );
    $show_cmnt_no_meta = cream_magazine_get_option( 'cream_magazine_enable_banner_cmnts_no_meta' );
    ?>
    <div class="cm_banner cm_banner-five">
        <div class="banner-inner">
            <div class="cm-container">
                <div class="row">
                    <div class="cm-col-lg-7 cm-col-12 gutter-left">
                        <div class="card">
                            <div class="owl-carousel cm_banner-carousel-five">
                                <?php
                                $count = 0;
                                while( $banner_query->have_posts() ) {
                                    $banner_query->the_post();
                                    if( $count < $item_no ) {
                                        ?>
                                        <div class="item">
                                            <div class="<?php cream_magazine_thumbnail_class(); ?>" style="background-image: url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>)">
                                                <div class="post-holder">
                                                    <?php cream_magazine_post_categories_meta( $show_categories_meta ); ?>
                                                    <div class="post_title">
                                                       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    </div><!-- .post_title -->
                                                    <?php cream_magazine_post_meta( $show_date_meta, $show_author_meta, $show_cmnt_no_meta, false ); ?>
                                                </div><!-- .post-holder -->
                                            </div>
                                            <!-- // post_thumb -->
                                        </div><!-- .item -->
                                        <?php
                                    }
                                    $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div><!-- .owl-carousel -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="cm-col-lg-5 cm-col-12 gutter-right">
                        <div class="right-content-holder">
                            <div class="custom_row clearfix">
                                <?php
                                $count = 0;
                                while( $banner_query->have_posts() ) {
                                    $banner_query->the_post();
                                    if( $count >= $item_no ) {
                                        ?>
                                        <div class="col small_posts">
                                            <div class="card">
                                                <?php
                                                if( $cream_magazine_enable_lazy_load ) {
                                                    ?>
                                                    <div class="post_thumb imghover lazy-image" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk4AcAABUAET9MVpIAAAAASUVORK5CYII=);" data-src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>">
                                                    <noscript>
                                                        <div class="post_thumb imghover" style="background-image: url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>);">
                                                    </noscript>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="post_thumb imghover" style="background-image: url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>);">
                                                    <?php
                                                }
                                                ?>
                                                    <div class="post-holder">
                                                        <?php cream_magazine_post_categories_meta( $show_categories_meta ); ?>
                                                        <div class="post_title">
                                                           <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                        </div><!-- .post_title -->
                                                        <?php cream_magazine_post_meta( $show_date_meta, $show_author_meta, $show_cmnt_no_meta, false ); ?>
                                                    </div><!-- .post-holder -->
                                                </div><!-- .post_thumb -->
                                            </div><!-- .card -->
                                        </div><!-- .col.small_posts -->
                                        <?php
                                    }
                                    $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div><!-- .row -->
                        </div><!-- .right-content-holder -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .cm-container -->
        </div><!-- .banner-inner -->
    </div><!-- .cm_banner -->
    <?php
}
