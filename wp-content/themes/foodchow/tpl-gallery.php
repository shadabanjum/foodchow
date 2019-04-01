<?php
/**
 * Template Name: Gallery Template
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */


    get_header();


    $data = \Foodchow\Includes\Classes\Common::instance()->data('gallery')->get();
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
                                   
                                    <?php foodchow_template_load( 'templates\custom-posts\gallery.php', compact( 'data', 'img_obj', 'width', 'height', 'options', 'template' ) ); ?>
                                  

                                    <?php if( $options->get( 'gallery_pagination' ) ) {
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
