<?php
/**
 * Footer Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

?>
<?php $options = foodchow_WSH()->option(); ?>

<?php if ( $options->get( 'show_main_footer' ) ) : ?>

	<?php foodchow_template_load( 'templates/footer/footer.php', compact( 'options' ) ); ?>

<?php endif; ?>

<?php if ( $options->get( 'footer_copyright' ) ) : ?>
	<?php foodchow_template_load( 'templates/footer/copyright.php', compact( 'options' ) ); ?>
<?php endif; ?>

<?php if ( $options->get( 'footer_top_button' ) ) : ?>

	<?php wp_enqueue_script( 'scrolltopcontrol' ); ?>
<?php endif; ?>

<?php if ( $options->get( 'theme_loader' ) ) : ?>

	<?php foodchow_template_load( 'templates/footer/pageloader.php', compact( 'options' ) ); ?>			
<?php endif; ?>

</div>
<?php wp_footer(); ?>
</body>

</html>
