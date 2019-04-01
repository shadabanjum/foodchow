<?php
/**
 * Template Name: Services Template
 */

get_header();

$data = \Foodchow\Includes\Classes\Common::instance()->data( 'services' )->get();

$class = ( $data->get( 'layout' ) != 'full') ? 'col-lg-9 col-md-9' : 'col-lg-12 col-md-12';

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args  = array(
	'post_type'   => 'services',
	'post_status' => 'publish',
	'paged'       => $paged
);

$query = new WP_Query( $args );
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}
$options = foodchow_WSH()->option();
$style = $options->get('services_listing_style') ? $options->get('services_listing_style') : 4; 
$width = ( $options->get('services_listing_style') == 6 ) ? 445 : 345;
$height = ( $options->get('services_listing_style') == 6 ) ? 400 : 300;
$pagination = $options->get( 'services_pagination');
$limit = $options->get('services_title_limit');
?>

<?php do_action( 'foodchow_banner', $data ); ?>
<?php if ( have_posts() ) : ?>
	<?php foodchow_template_load( 'templates/custom-posts/services.php', compact( 'data', 'width', 'height', 'pagination', 'limit', 'query', 'img_obj', 'style', 'class' ) ); ?>
<?php endif; ?>
<?php get_footer(); ?>
