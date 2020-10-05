<?php
/**
 * 
 *
 */

get_header(); ?>

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

            <div id="primary" class="content-area clr">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">
                            
                            <?php
                                $taxonomy_id = $wp_query->queried_object->term_id;
                                $taxonomy_image_id = get_term_meta($taxonomy_id, 'showcase-taxonomy-image-id', true);
                                $taxonomy_image_url = wp_get_attachment_image_url($taxonomy_image_id,'full');
                            ?>
                            <header class="custom_tax_header" style="background-image: url('<?php echo $taxonomy_image_url ?>')">
                                <h1 class="custom-tax-title"><?php  single_cat_title(''); ?></h1>
                                
                            </header>
                            <?php the_archive_description('<section class="archive-description">', '</section>'); ?>
                            <?php

                                
                            ?>
                            <?php if ( have_posts() ) : ?>
                                <?php if ( $wp_query->queried_object->taxonomy == 'product_category' ): ?>
                                    <?php 
                                    $args = array(
                                        'post_type' => 'tecnibo_product',
                                        'orderby' => 'title',
                                        'posts_per_page' => -1,
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            array('taxonomy' => 'product_category',
                                                'field' => 'term_id',
                                                'terms' => $wp_query->queried_object->term_id //6 //198
                                            )
                                        ),
                                    );                                    
                                    echo Tecnibo_Portfolio::get_grid_products_projects( $args );
                                    endif;// queried object 
                                    ?>
                            <?php 
                                else:
                                    _e( 'No Products for this category', 'tecnibo' );
                            endif; // has posts 
                            wp_reset_query();
                            ?>
                            
                            
                            <?php do_action( 'ocean_before_content_inner' ); ?>

                            <?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer();



