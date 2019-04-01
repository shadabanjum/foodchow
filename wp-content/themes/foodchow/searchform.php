<?php
/**
 * Search Form template
 *
 * @package Foodchow
 * @author Webinane
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" class="search-frm custom">

	<input type="text" id="s" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e( 'Your Search Title Here.....', 'foodchow' ); ?>" class="form-control" />

	<button type="submit" id="searchsubmit"  class="red-bg"><i class="fa fa-search"></i></button>

</form>


