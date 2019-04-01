<?php 
    /**
     * Single Services Main File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

    get_header(); 
?>
<?php  $options = foodchow_WSH()->option();

$data = \Foodchow\Includes\Classes\Common::instance()->data('post')->get();

$width = ( $data->get( 'sidebar' ) && ( $data->get( 'layout' ) != 'full') ) ? 870 : 970;

$height = ( $data->get( 'sidebar' ) && ( $data->get( 'layout' ) != 'full') ) ? 386 : 430;

if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
}

$class = ( $data->get('layout') != 'full' && $data->get('sidebar') ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-9' : 'mx-auto col-lg-10';

$social = $options->get( 'single_post_social_share' );?>

<?php  do_action( 'foodchow_banner' , $data );  ?>

    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    
                    <?php  do_action( 'foodchow_sidebar', 'left', $data ); ?>
                    
                   <div class="<?php echo esc_attr( $class ); ?>">

                        <?php while ( have_posts() ) : the_post(); ?>
                            
                            <?php foodchow_template_load( 'templates/custom-posts/services-meta.php', compact( 'width', 'options', 'img_obj','height' ) ); ?>

                        <?php endwhile; wp_reset_postdata(); ?>
                        
                    </div><!-- buyer single meta -->
                    
                    <?php  do_action( 'foodchow_sidebar', 'right', $data ); ?>

                </div>
            </div>
        </div>
        
    </section><!-- blog section with pagination -->


<?php get_footer(); ?>