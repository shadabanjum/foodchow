<?php
/**
 * We Help SHortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>

<?php $sponsors = json_decode( urldecode( $sponsors ) ); ?>
<?php
if ( ! empty( $sponsors ) ) :
	foreach ( $sponsors as $spons ) :
		$help_list    = foodchow_set( $spons, 'help_type' );
		$help_listing = explode( ',', $help_list );
		$icon_type    = foodchow_set( $spons, 'icon_type' );
		?>
		<li>
			<div class="services" style="background: <?php echo esc_attr( foodchow_set( $spons, 'bg_color' ) ); ?> none repeat scroll 0 0">
				<div class="services-avatar">
					<?php if ( 'image_icon' === $icon_type ) : ?>
						<?php echo wp_get_attachment_image( foodchow_set( $spons, 'iconimage' ), 'full' ); ?>
					<?php else : ?>
						<i class="<?php echo esc_attr( foodchow_set( $spons, 'iconicon' ) ); ?>"></i> 
					<?php endif; ?>
				</div>
				<?php echo ( foodchow_set( $spons, 'help_title' ) ) ? '<h4 style="color: ' . esc_attr( foodchow_set( $spons, 'text_color' ) ) . ' ">' . esc_html( foodchow_set( $spons, 'help_title' ) ) . '</h4>' : ''; ?>
				<span style="color: <?php echo esc_attr( foodchow_set( $spons, 'text_color' ) ); ?>">
					<?php echo esc_html( foodchow_set( $spons, 'help_subtitle' ) ); ?>
				</span>
				<ul>
					<?php foreach ( $help_listing as $helps ) : ?>
						<li style="color: <?php echo esc_attr( foodchow_set( $spons, 'text_color' ) ); ?>"> <?php echo esc_html( ( $helps ) ); ?></li>
					<?php endforeach; ?>

				</ul>
				<!--  Help Button template includes here -->

				<?php foodchow_template_load( 'templates/shortcodes/help_button.php', compact( 'spons', 'button', 'help_link', 'counter_ids' ) ); ?>
			</div>
		</li>
	<?php endforeach;
endif;  ?>
