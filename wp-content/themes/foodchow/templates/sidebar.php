<?php
	/**
	 * Sidebar Template
	 *
	 * @package WordPress
	 * @subpackage Foodchow
	 * @author Webinane
	 * @version 1.0
	 */

?>
<?php if ( is_active_sidebar( $data->get('sidebar') ) ) : ?>
	<div class="col-lg-3 col-sm-12">
		<aside>
			<?php dynamic_sidebar( $data->get('sidebar') ); ?>
		</aside>
	</div>
<?php endif; ?>
