<?php
/**
 * Logo Header 1  File
 *
 * @package Foodchow
 * @author 	Webiane
 * @version 1.0
 */
$logo_type = $options->get( 'logo1_type' );
$image_logo = $options->get( 'image1_logo' );
$logo_dimension = $options->get( 'logo1_dimension' );
$logo_text = $options->get( 'logo1_text' );
$logo_typography = $options->get( 'logo1_typography' ); ?>


<div class="logo">
	<h1>
		<?php echo foodchow_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?>
	</h1>
</div>


