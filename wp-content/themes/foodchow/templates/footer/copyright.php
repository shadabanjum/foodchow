<?php
 /**
 * Copyright  File
 *
 * @package Foodchow
 * @author 	Webiane
 * @version 1.0
 */

 ?>

<div class="bottom-bar dark-bg text-center" style="background: <?php echo esc_attr( $options->get( 'copyrigt_bg' ) ); ?>">
 	<div class="container">
 		<p itemprop="description"><?php echo esc_html( $options->get( 'copyright_text' ) ) ? wp_kses_post( $options->get( 'copyright_text' ) ) : esc_html_e( 'Copyright 2018 All Right Reserved', 'foodchow' ); ?></p>
 	</div>
 </div><!-- Bottom Bar -->
 