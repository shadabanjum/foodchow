<div class="col-lg-5 col-md-5 col-sm-5 fromright">
	<div class="funfact-info">
		<h2><?php echo ( $heading_stat_colored ) ? '<span>' .$heading_stat_colored. '</span>' : ''; ?> <?php echo wp_kses_post( ( $heading_stat ) ); ?></h2>
		<p><?php echo esc_html( $text_stat ); ?></p>
		<?php if ( $button && $help_link ) : ?>
			<!-- Butoon template includes from here -->            
			<?php foodchow_template_load( 'templates/shortcodes/transform_button.php', compact( 'button' , 'help_link' ) ); ?>
		<?php endif; ?>
	</div>
</div>