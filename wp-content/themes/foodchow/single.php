<?php 
/**
 * Blog Post Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

get_header(); 

?>
<?php $data = \Foodchow\Includes\Classes\Common::instance()->data('post')->get();

$format = get_post_format( get_the_ID() );

$class = ( $data->get('layout') != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-9' : 'col-md-12 col-sm-12 col-lg-12';

$options = foodchow_WSH()->option();

$social = $options->get( 'single_post_social_share' );?>

<?php  do_action( 'foodchow_banner' , $data );  ?>

<?php global $wp_query;
$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

$gallery  = get_post_meta( $page_id, 'gallery', true );

$video  = get_post_meta( $page_id, 'video_url', true );


$audio_type  = get_post_meta( $page_id, 'audio_type', true );

?>

<section>
    <div class="block less-spacing gray-bg top-padd30">

        <div class="container">


            <div class="row">
                <div class="sec-box">
                   <div class="col-md-12">
                     <?php  do_action( 'foodchow_sidebar', 'left', $data ); ?>

                     <div class="<?php echo esc_attr( $class ); ?>">

                        <?php while( have_posts() ) : the_post(); ?>
                            <div <?php post_class(); ?>>                       

                                <div class="blog-detail-wrapper">

                                    <?php if( $gallery && $format == 'gallery' ) { ?>

                                    <?php foodchow_template_load( 'templates/blog-single/gallery.php' , compact( 'gallery', 'options' ) ); ?>


                                    <?php }

                                    elseif( $video && $format == 'video' ) { ?>

                                    <?php foodchow_template_load( 'templates/blog-single/video.php' , compact( 'video' , 'options' ) ); ?>


                                    <?php  }

                                    elseif( $audio_type && $format == 'audio'  ) {  ?>

                                    <?php foodchow_template_load( 'templates/blog-single/audio.php' , compact( 'audio_type' , 'page_id' , 'options' ) ); ?>

                                    <?php }

                                    else{ ?>

                                    <?php foodchow_template_load( 'templates/blog-single/image.php' , compact( 'options' ) ); ?>


                                    <?php } ?>

                                    <div class="single-meta single-blockquote">

                                        <?php foodchow_template_load( 'templates/blog-single/meta.php' , compact( 'options', 'social') ); ?>

                                    </div>

                                </div>
                                <?php foodchow_template_load( 'templates/blog/author-box.php' , compact( 'options') ); ?>
                                <?php comments_template() ?>
                            </div>
                            <?php
                            $defaults = array(
                                'before'           => '<div class="paginate_link">' . esc_html__( 'Pages:', 'foodchow' ),
                                'after'            => '</div>',

                            );

                            wp_link_pages( $defaults );
                            ?>
                            <?php paginate_links( array('before'=>'<div class="pagination">', 'after'=>'</div>' ));?>

                        <?php endwhile; wp_reset_postdata(); ?>


                    </div>

                    <?php  do_action( 'foodchow_sidebar', 'right', $data ); ?>

                </div>


            </div>

        </div>

    </div>
</div>
</section>
<?php get_footer(); ?>