<div class="col-lg-12">
	<div class="new-promo-funfact">
		<?php foreach(  $add_stats as $stats ) : ?>

			<div class="funfact">
				<span class="counter"><?php echo esc_attr( foodchow_set( $stats, 'stat_number' ) ); ?></span>
				<div class="fun-info">

					<h4><?php echo esc_attr( foodchow_set( $stats, 'stat_title' ) ); ?></h4>

					<p><?php echo esc_attr( foodchow_set( $stats, 'stat_subtitle' ) ); ?></p>

				</div>	
			</div>

		<?php endforeach; ?>

	</div>
</div>
<?php wp_enqueue_script( array( 'jquery-counterup', 'jquery-counterup2' ) ); ?>