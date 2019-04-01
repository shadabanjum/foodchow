<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 *
 * @package Foodchow
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $options = foodchow_WSH()->option(); ?>
	<?php
	$favicon = $options->get( 'site_favicon', 'url' );

	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

		echo ( $favicon ) ? '<link rel="icon" type="image/png" href="' . esc_url( foodchow_set( $favicon, 'url' ) ) . '">' : '';

	endif;
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( $options->get( 'page_loader' ) ) : ?>
		<?php if ( $options->get( 'page_loader_type' ) == 'creative_style' ) : ?>
			<div class="pageloader">
				<div class="loader">
					<div class="loader-inner line-scale">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        </div>
				</div> 
			</div><!-- Pageloader -->
		<?php else : ?>
			<?php $loader = $options->get('site_loader_gif') ? foodchow_set($options->get('site_loader_gif'), 'url' ) : get_template_directory_uri().'/assets/images/loading.gif'; ?>
			<div class="se-pre-con" style="background: url('<?php echo ( $loader ); ?>') center no-repeat #fff;"></div>
		<?php endif; ?>
	<?php endif; ?>
	<?php
	$header_meta = get_post_meta( get_the_ID(), 'layout_settings', true );
	if(foodchow_set( $header_meta, 'enable_box_layout' )=='1' || foodchow_set( $header_meta, 'enable_border_layout' ) == '1' )
	{
		$boxed  =  foodchow_set( $header_meta, 'enable_box_layout' ) ? ' boxed' : ' pading' ;
	}
	else{
		$boxed  = ($options->get( 'boxed_layout_status') == 1 ) ? ' boxed' : '';
	} ?>

	<?php $boxed_margin = ( $options->get( 'boxed_layout_status' ) == 1 && $options->get( 'boxed_top' ) != "" ) ? 'margin-top:' . esc_attr( $options->get( 'boxed_top' ) ) . 'px;' : ''; ?>

	<?php $boxed_margin .= ( $options->get( 'boxed_layout_status' ) == 1 && $options->get( 'boxed_bottom' ) != "" ) ? 'margin-bottom:' . esc_attr( $options->get( 'boxed_bottom' ) ) . 'px;' : '';  ?>

	<?php $boxed_margin .= ( foodchow_set( $header_meta, 'enable_border_layout' ) == 1 && foodchow_set( $header_meta, 'border_color' ) != "" ) ? 'border-color:' . esc_attr( foodchow_set( $header_meta, 'border_color' ) ) . ';' : '';  ?>

	<div class="theme-layout<?php echo esc_attr( $boxed ) ?> <?php echo ( function_exists('the_gutenberg_project') ) ? 'mycustom-gutunburg' : ''; ?>" style="<?php echo esc_attr( $boxed_margin ) ?>">

		<?php do_action( 'foodchow_main_header' ); ?>
