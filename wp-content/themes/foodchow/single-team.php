<?php
/**
 * Coaches Category Main Template
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

get_header(); ?>

<?php $options = foodchow_WSH()->option();

 $page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

$data = \Foodchow\Includes\Classes\Common::instance()->data( 'team' )->get();

if ( $data->get( 'sidebar' ) ) {
	$width = 385;
	$height = 445;
} else {
	$width = 390;
	$height = 445;
}

$class = ( $data->get( 'layout' ) != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-9' : 'mx-auto col-lg-10';
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}

do_action( 'foodchow_banner', $data ); ?>

<?php if ( have_posts() ) : ?>
	<section>	
		<div class="gap">

			<div class="container">

				<div class="row">
					<?php  do_action( 'foodchow_sidebar', 'left', $data ); ?>

					<?php while( have_posts() ) : the_post(); ?>

						<div class="<?php echo esc_attr( $class ); ?>">
							<div class="row">

								<?php foodchow_template_load( 'templates/custom-posts/team_profile.php', compact( 'page_id', 'img_obj', 'width', 'height' ) ); ?>

								<?php foodchow_template_load( 'templates/custom-posts/team_skills.php', compact( 'page_id' ) ); ?>
								<div class="profile-pera">
									<?php echo apply_filters( 'the_content', the_content() ); ?>
								</div>
							</div>

						</div>

					<?php endwhile; wp_reset_postdata(); ?>

					<?php do_action( 'foodchow_sidebar', 'right', $data ); ?>

				</div>
			</div>
		</div>

	</section>

<?php
	endif;

	get_footer();

?>
