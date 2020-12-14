<?php
/**
 * Template Name: List Projects Template
 *
 */

get_header(); ?>

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

            <div id="primary" class="content-area clr">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">
                            <div class="items">
                            <?php
                            $args =  array (

                                'post_status' => array ( 'publish' ),
                                'post_type' => 'tecnibo_project' ,
                                'posts_per_page' => 50, 
                                'orderby' => 'title', 
                                'order' => 'ASC'
                            );
                            $query = new WP_Query($args);
                            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'see-details');

                            ?>
                            <a 
                                href="<?php the_permalink()?>" 
                                class="" 
                                rel="group" data-id="<?php the_ID()?>" 
                                data-slug="<?php //?>">
                            <img alt="DOLCE" src="<?php echo $featured_img_url ?>">
                            <span class="hover middleParent">
                                <span class="bg"></span>
                                <span class="middle">
                                    <span class="title"><?php the_title()?></span>
                                    <span class="see"><?php _e('See details','tecnibo')?></span>
                                </span>                                
                            </span>
                            </a>
                            <?php endwhile; else : ?>
                            <p><?php esc_html_e( 'Sorry, no projects matched your criteria.' ); ?></p>
                            <?php endif;
                            wp_reset_query();
                            ?>
                            </div><!-- #items -->

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer();



