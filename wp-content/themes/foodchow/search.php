<?php
/**
 * Author Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

get_header();
 $options = foodchow_WSH()->option();
$data = \Foodchow\Includes\Classes\Common::instance()->data( 'search' )->get();
if ( $data->get( 'style' ) == '6' && $data->get( 'layout' ) != 'full' ) {
	$width = 375;
	$height = 300;
} 
elseif ( $data->get( 'style' ) == '6' ) {
	$width = 375;
	$height = 475;
}  elseif ( $data->get( 'style' ) == '12' ) {
	$width = 600;
	$height = 400;

} elseif ( $data->get( 'style' ) == '12'  && $data->get( 'layout' ) != 'full'  ) {
	$width = 1000;
	$height = 500;

} else {
	$width = 375;
	$height = 270;
}


$class = ( $data->get( 'layout' ) != 'full' && $data->get( 'style' ) !== 'col-lg-6' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-9' : 'col-xs-12 col-sm-12 col-md-12';
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}

do_action( 'foodchow_banner', $data );  ?>


<section>
	<div class="block less-spacing gray-bg top-padd30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="sec-box">
						<?php do_action( 'foodchow_sidebar', 'left', $data ); ?>
						<div class="<?php echo ( $class != 'col-xs-12 col-sm-12 col-md-12' ) ? esc_attr( $class ) : ''; ?>">
							<?php if ( have_posts() ) : ?>
								<?php if( $options->get( 'search_found_form' ) ) : ?>
									<div class="search-found">
										<h3 itemprop="headline"><?php echo wp_kses_post( $options->get( 'search_found_form_title' ) ) ? $options->get( 'search_found_form_title' ) : esc_html__( 'Search Result Found', 'foodchow' ); ?> <span class="red-clr">"<?php echo get_search_query(); ?>"</span></h3>
										<p itemprop="description"><?php echo wp_kses_post( $options->get( 'search_found_form_text' ) ); ?></p>
										<?php get_search_form( true ); ?>
									</div>
								<?php endif; ?>
								<div class="remove-ext">
									<div class="row">

										<?php  while ( have_posts() ) : the_post(); ?>
											<?php foodchow_template_load( 'templates/blog/blog.php', compact( 'data', 'img_obj', 'width', 'height' ) ); ?>
										<?php endwhile; wp_reset_postdata(); ?>


										<?php foodchow_blog_the_pagination(); ?>
									</div>
								</div>
							<?php else : ?>
								<div class="search-found">
									<h3 itemprop="headline"><?php esc_html_e( 'Search Result Not Found For', 'foodchow' ); ?> <span class="red-clr">"<?php echo get_search_query(); ?>"</span></h3>
									<p itemprop="description"><?php echo wp_kses_post( $options->get('search_notfound_text' ) ); ?></p>
									<h2 itemprop="headline"><?php echo wp_kses_post( $options->get('search_notfound_text2' ) ); ?></h2>
									<?php get_search_form( true ); ?>
								</div>
							<?php endif; ?>
						</div>
						<?php do_action( 'foodchow_sidebar', 'right', $data ); ?>
					</div>
				</div><!-- Section Box -->
			</div>
		</div>
	</div>
</section>




<?php get_footer(); ?>
