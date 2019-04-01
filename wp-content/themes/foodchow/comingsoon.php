<?php
/**
 * Coming Soon Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php

	$options = foodchow_WSH()->option();

	$favicon = $options->get( 'site_favicon', 'url' );

	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

		echo ( $favicon ) ? '<link rel="icon" type="image/png" href=" ' . esc_url( foodchow_set( $favicon, 'url' ) ) . ' ">' : '';

	endif;
	?>

	<?php wp_head(); ?>

</head>


<body itemscope>

	<?php $bg = $options->get( 'comingsoon_background'); ?>

	<?php $background =  ( $bg ) ? foodchow_set( $bg, 'url') : '';  ?>
	<div class="theme-layout">
		<section>
			<div class="block">
				<div style="background-image: url(<?php echo esc_url( $background); ?>);" class="fixed-bg full-height"></div>
				<div class="coming-soon-wrapper text-center">
					<div class="coming-soon-inner">
						
						<?php foodchow_template_load( 'templates/custom-posts/comingsoon-logo.php', compact( 'options') ); ?>
						<?php echo esc_attr( $options->get( 'comingsoon_page_tagline' ) ) ? '<span class="yellow-clr">'.$options->get( 'comingsoon_page_tagline' ).'</span>' : ''; ?>
						<h1 itemprop="headline" class="wow flash" data-wow-delay="0.2s"><?php echo wp_kses_post( $options->get( 'comingsoon_page_title' ) ); ?></h1>
						<p itemprop="description"><?php echo wp_kses_post( $options->get( 'comingsoon_page_text' ) ); ?></p>
						<ul class="countdown">
							<li class="brd-rd50 yellow-bg wow bounceIn" data-wow-delay="0.2s">
								<span class="days">00</span>
								<p class="days_ref">Days</p>
							</li>
							<li class="brd-rd50 yellow-bg wow bounceIn" data-wow-delay="0.4s">
								<span class="hours">00</span>
								<p class="hours_ref">Hours</p>
							</li>
							<li class="brd-rd50 yellow-bg wow bounceIn" data-wow-delay="0.5s">
								<span class="minutes">00</span>
								<p class="minutes_ref">Minutes</p>
							</li>
							<li class="brd-rd50 yellow-bg wow bounceIn" data-wow-delay="0.6s">
								<span class="seconds">00</span>
								<p class="seconds_ref">Seconds</p>
							</li>
						</ul>
						<?php if( $options->get( 'show_comingsoon_sharing') && $options->get( 'comingsoon_social_share')  ) : ?>

							<?php $social_share  = $options->get( 'comingsoon_social_share' ); ?>

							<div class="follow-us">
								<span><?php echo esc_html( $options->get( 'comingsoon_share_label') ); ?></span>
								<?php foreach ( $social_share as $h_icon ) :
								$header_social_icons = json_decode( urldecode( foodchow_set( $h_icon, 'data' ) ) );
								if ( foodchow_set( $header_social_icons, 'enable') == '' )                                              
									continue;
								?>
								<a href="<?php echo foodchow_set( $header_social_icons, 'url'); ?>" target="_blank" <?php echo ( foodchow_set( $header_social_icons, 'background' ) ) ? 'style="background-color:'. foodchow_set( $header_social_icons, 'background' ).';"' : ''; ?>><i class="fa <?php echo esc_attr( foodchow_set( $header_social_icons, 'icon' ) ); ?>" <?php echo ( foodchow_set( $header_social_icons, 'color' ) ) ? 'style="color:' .foodchow_set( $header_social_icons, 'color' ).';"' : ''; ?>></i></a>
							<?php endforeach; ?>
						</div>

					<?php endif; ?>

					<?php if ( $options->get( 'c_footer_copyright' ) && $options->get( 'c_copyright_text' ) ) : ?>
						<div class="copyright">
							<p><?php echo wp_kses_post( $options->get( 'c_copyright_text' ) ); ?></p>
						</div>
					<?php endif; ?>

				</div>
			</div><!-- Coming Soon Wrapper -->
		</div>
	</section>



</div>

<?php wp_footer(); ?>

</body>

</html>

