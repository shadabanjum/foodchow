<?php
/**
 * Megamenu Map Template 
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
?>
<div class="col-lg-6">
	<div class="mega-map">
        <div class="gen-map">
            <div id="canvas" data-latitude="<?php echo esc_attr( $latitude ) ?>" data-longitude="<?php echo esc_attr( $longitude ) ?>" data-marker2="<?php echo esc_attr( $marker2 ) ?>"></div>

        </div>
    </div><!-- Google Map -->
</div>