<?php
    /**
     * Gallery Main File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

    get_header();


    $data = \Foodchow\Includes\Classes\Common::instance()->data('galleryCat')->get();
    $options = foodchow_WSH()->option();
    $templated = 'gallery';
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(
        'post_type' => 'gallery',
        'post_status' => 'publish',
        'paged' => $paged,

    );

    $query = new WP_Query($args);
    
    
    do_action( 'foodchow_banner' , $data );  


    if ( class_exists( 'Foodchow_Resizer' ) ) {
        $img_obj = new Foodchow_Resizer();
    }
    $height = array( 245, 245, 445, 245, 445, 245, 445, 245, 245 );
    $template = 'gallery';
    if(have_posts()) :
        ?>
        <section>
            <div class="block less-spacing gray-bg top-padd30">
                <div class="container">
                    <div class="row mrg15">
                        <div class="col-md-12">
                            <div class="sec-box">
                                <div class="masonry">
                                    <?php $counter = 0; while ($query->have_posts()): $query->the_post(); ?>
                                    <?php// foodchow_template_load( 'templates\custom-posts\gallery.php', compact( 'data', 'img_obj', 'width', 'height', 'options', 'template' ) ); ?>
                                    <div class="col-md-4 col-sm-6 col-lg-4 filter-item">
                                        <div class="gallery-bx sudo-bg-red wow zoomIn" data-wow-delay="0.2s">
                                            <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
                                                <?php if( $options->get( 'galleryCat_listing_style' ) == 'simple' ) {
                                                    echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 345, 300, true ) );
                                                } else {
                                                    echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 345, $height[$counter], true ) );
                                                }
                                                endif; ?> 

                                                
                                                <div class="gallery-info-btns">
                                                    <a class="yellow-bg brd-rd50" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" data-fancybox="gallery" title="<?php esc_attr_e( 'Click to See Image', 'foodchow' ); ?>" itemprop="url"><i class="fa fa-search"></i></a>
                                                    <a class="yellow-bg brd-rd50" href="<?php the_permalink(); ?>" title="Gallery Detail" itemprop="url"><i class="fa fa-chain"></i></a>
                                                </div>
                                                <h3 itemprop="headline"><a href="<?php the_permalink(); ?>"  itemprop="url"><?php echo wp_trim_words( get_the_title(), $options->get('galleryCat_title_limit'), '...' );?></a></h3>
                                            </div>
                                        </div>


                                        <?php $counter++; endwhile; wp_reset_postdata(); ?>
                                    </div>

                                    <?php if( $options->get( 'galleryCat_pagination' ) ) {
                                        foodchow_the_pagination( $query->max_num_pages ); 
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        <?php endif;

        get_footer(); 
