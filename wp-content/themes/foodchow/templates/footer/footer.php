<?php
/**
 * Footer Template  File
 * @package Foodchow
 * @author  Webiane
 * @version 1.0
 */

?>


<footer class="block top-padd80 bottom-padd80 dark-bg" style="background-color: <?php echo esc_attr( $options->get('footer_bg') ); ?>">

	<?php if( $options->get('footer_post')  ) : ?>

		<?php $query = new WP_Query( array( 'post_type' => 'static_block', 'post__in' => array( $options->get('footer_post') ), 'posts_per_page' => 1 ) ); ?>

		<?php

		if ( $query->have_posts() ) {

			echo do_shortcode( $query->post->post_content );

		}
		?>
	<?php endif; ?>
</footer>