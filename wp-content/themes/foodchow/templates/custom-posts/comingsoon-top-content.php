<?php

/**
 *  Coming soon File
 *
 * @package Foodchow
 * @author  Webiane
 * @version 1.0
 */
?>
<?php $bg = $options->get( 'comingsoon_background'); ?>

<?php $background =  ( $bg ) ? foodchow_set( $bg, 'url') : '';  ?>

<div class="coming-soon-top">

	<div class="bg-image" style="background-image:url(<?php echo esc_url( $background); ?>);"></div>

	<?php foodchow_template_load( 'templates/custom-posts/comingsoon-logo.php', compact( 'options') ); ?>

	<?php if( $options->get( 'show_comingsoon_sharing') && $options->get( 'comingsoon_social_share')  ) : ?>

		<?php $social_share  = $options->get( 'comingsoon_share_label' ); ?>

		<ul class="social-media">

			<?php foreach ( $social_share as $k => $v ) {
				if ($v == '') continue;  ?>

				<?php echo  foodchow_social_share_output_without_color( $k );  ?>

				<?php } ?>

			</ul>

		<?php endif; ?>

	</div>
