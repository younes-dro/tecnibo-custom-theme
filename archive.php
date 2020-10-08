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
                            <?php if ( $taxonomy_image_url) :?>
                            <header class="custom_tax_header" style="background-image: url('<?php echo $taxonomy_image_url ?>')">
                                <div class="overlay-achive-page"></div>
                                
                                <h1 class="custom-tax-title"><?php  single_cat_title(''); ?></h1>
                                
                            </header>
                            <?php endif;?>
                            <?php the_archive_description('<section class="archive-description">', '</section>'); ?>
                            <?php
                            // If a parent Category 
                            if( $wp_query->queried_object->parent == 0):
                                
                                echo Tecnibo_Portfolio::get_archive_subcat($wp_query->queried_object->term_id ) ;
                                
                            else:
                                
                            ?>
                            
                            <?php if ( have_posts() ) : ?>
                                <?php if ( $wp_query->queried_object->taxonomy == 'product_category' ): ?>
                                    <?php 
                                    // Products 
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
                                    if ( Tecnibo_Portfolio::category_has_product_project($args)){
                                        echo '<div class="divider"><hr class="flush"></div>';
                                        echo '<section class="tecnibo-row">';
                                        echo '<h2 class="related_products_projects"><span>' . __('Products','tecnibo') . '</span></h2>';
                                        echo Tecnibo_Portfolio::get_grid_products_projects( $args );
                                        echo '</section>';
                                    }
                                    
                                    wp_reset_query();
                                    
                                    // Projects
                                    $args = array(
                                        'post_type' => 'tecnibo_project',
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
                                    if ( Tecnibo_Portfolio::category_has_product_project($args)){
                                        echo '<div class="divider"><hr class="flush"></div>';
                                        echo '<section class="tecnibo-row">';
                                        echo '<h2 class="related_products_projects"><span>' . __('Projects','tecnibo') . '</span></h2>';
                                        echo Tecnibo_Portfolio::get_grid_products_projects( $args );
                                        echo '</section>';
                                    }
                                   
                                    wp_reset_query();                                    
                                    endif;// queried object 
                                    ?>
                            <?php 
                                else:
                                    echo '<p>'.__( "Sorry, no products or projects  matched your criteria.", "tecnibo") .'</p>';
                            endif; // has posts 
                            endif; // End Parent Cat
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



