<?php
/**
 * Search Form template
 *
 * @package Foodchow
 * @author Webinane
 * @version 1.0
 */
get_header(); 
?>
<?php  $options = foodchow_WSH()->option();

$data = \Foodchow\Includes\Classes\Common::instance()->data( 'galleryDetail' )->get();

$size = $data->get( 'sidebar' ) ? 'foodchow_470*252' : 'foodchow_970*430';

$loggedin = ( is_user_logged_in() ) ? '1' : '0'; 

$class = ( $data->get('layout') != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-9' : 'col-lg-12'; ?>


<?php if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}
?>
<?php  do_action( 'foodchow_banner', $data );  ?>


<section>
	<div class="block less-spacing gray-bg top-padd30">

		<div class="container">


			<div class="row">
				<div class="sec-box">
					<div class="col-md-12">
						<?php  do_action( 'foodchow_sidebar', 'left', $data ); ?>

						<div class="<?php echo esc_attr( $class ); ?>">

							<?php while( have_posts() ) : the_post(); ?>
								<div class="gallery-detail-wrapper">

									<?php if ( has_post_thumbnail( ) ) : ?>
										<div class="blog-detail-thumb wow fadeIn" data-wow-delay="0.2s">
											<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
												<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 1170, 502, true ) ); ?>
											<?php else : ?>
												<?php the_post_thumbnail( 'full' ); ?>
											<?php endif; ?>


										</div>
									<?php endif; ?>
									<div class="gallery-detail-inner">
										<h1 itemprop="headline"><?php the_title(); ?></h1>
										<?php the_content();  ?>
										<?php  $cat_list = get_the_terms(get_the_ID(), 'gallery_cat' );
										 if( $cat_list ) :  ?>
											<div class="post-tags2">
												<span class="red-clr"><?php esc_html_e( 'Posted By:', 'foodchow' ); ?></span>
												<?php foreach( $cat_list as $cat ) : 

												 echo '<a href="'.get_term_link(foodchow_set( $cat, 'term_id' )).'">' .foodchow_set( $cat, 'name' ).'</a>'; ?>,
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</div><!-- Gallery Detail Wrapper -->
							<?php endwhile; wp_reset_postdata(); ?>


						</div>

						<?php  do_action( 'foodchow_sidebar', 'right', $data ); ?>

					</div>


				</div>

			</div>

		</div>
	</div>
</section>

<?php wp_enqueue_script( array( 'sweetalert2', 'like-script' ) ); ?>

<?php get_footer(); ?>
