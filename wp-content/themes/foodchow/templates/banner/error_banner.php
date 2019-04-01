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
$header_bg = $options->get( 'error_banner_bg') ? $options->get( 'error_banner_bg' ) : ''; ?>
<?php if ( $options->get( 'show_error_banner' ) ) : ?>

	<section>

		<div class="gap2 banner blackish low-opacity overlap-2 ext-topgap">

			<div class="bg-image" <?php if ( $header_bg ) : ?> style="background-image:url('<?php echo esc_url( foodchow_set($header_bg, 'background-image' )); ?>'); background-repeat: no-repeat;" <?php endif; ?>></div>

			<div class="container">

				<div class="row">

					<div class="col-lg-12">

						<div class="top-area">

							<span><?php echo ( $options->get( 'error_title' ) ) ? wp_kses( $options->get( 'error_title' ), true ) : esc_html_e( 'Error Page', 'foodchow' ); ?></span>

							<?php if ( $options->get( 'show_error_breadcrumb' ) ) : ?>

								<ul class="bread-crumb">

									<?php echo wp_kses_post( $breadcrumb ); ?>

								</ul>

							<?php endif; ?>			
						</div>

					</div>

				</div>

			</div>

		</div>
	</section><!-- page top with breadcrumb -->

<?php endif; ?>

<?php if ( $options->get( 'show_error_banner' ) ) : ?>
	<div class="bottom-bar dark-bg text-center">
		<div class="container">
			<p itemprop="description">&copy; 2018 <a class="red-clr" href="http://webinane.com/" title="Webinane" itemprop="url" target="_blank">WEBINANE</a>. All Rights Reserved</p>
		</div>
	</div><!-- Bottom Bar -->
<?php endif; ?>
