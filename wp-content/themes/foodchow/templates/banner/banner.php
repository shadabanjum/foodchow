<?php
/**
 * Banner Template
 *
 * @package WordPress
 * @subpackage Webinane
 * @author Webinane
 * @version 1.0
 */

$breadcrumb = foodchow_the_breadcrumb(); 
$bg_image = ( $data->get( 'banner' ) ); ?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<section>
		<div class="block">
			<div class="fixed-bg" <?php if ( $bg_image ) : ?> style="background-image:url('<?php echo esc_url( $bg_image ); ?>'); background-repeat: no-repeat;" <?php endif; ?>></div>
			<div class="page-title-wrapper text-center">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="page-title-inner">
						<h1 itemprop="headline"><?php echo wp_kses( $data->get( 'title' ), true ); ?></h1>
						<span><?php echo wp_kses( $data->get( 'subtitle' ), true ); ?></span>
						
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>
<?php if ( $data->get( 'breadcrumb' ) ) : ?>
	<div class="bread-crumbs-wrapper">
		<div class="container">
			<ol class="breadcrumb">
				<?php echo wp_kses_post( $breadcrumb ); ?>
			</ol>
		</div>
	</div>
<?php endif; ?>