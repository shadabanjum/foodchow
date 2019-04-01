<?php

/**
 * Logo Coming soon File
 *
 * @package Foodchow
 * @author 	Webiane
 * @version 1.0
 */

$logo_type = $options->get( 'logo3_type');

$image_logo =  $options->get( 'image3_logo');

$logo_dimension = $options->get( 'logo3_dimension');

$logo_text =  $options->get( 'log3_text');

$logo_typography =  $options->get( 'logo3_typography');  ?>


<div class="logo">
	<h1>
		<?php echo foodchow_logo($logo_type, $image_logo, $logo_dimension , $logo_text, $logo_typography); ?>
	</h1>
</div>


