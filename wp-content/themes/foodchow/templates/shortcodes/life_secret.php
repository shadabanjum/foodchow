<?php if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
}

?>
<div class="col-lg-5 col-sm-4 fromright">
	<div class="coach-boy">
		<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
			<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $image_person, 'full' ), 522, 622, true ) ); ?>
		<?php else : ?>
			<?php wp_get_attachment_url( $image_person, 'full' ); ?>
		<?php endif; ?>
	</div>
</div>