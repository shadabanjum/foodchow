<?php
/**
 * Google Map Shortcode
 *
 * @package WordPress
 * @subpackage Esperto
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php $add_map = json_decode( urldecode( $add_map ) ); ?>

<?php if ( $add_map ) : ?>
	<?php echo  esc_attr( $bg_select ) ? '<div class="'.$bg_select.'">' : ''; ?>
		<div id="google-map" class="google-map loc-map">
		</div><!-- #google-map -->
	<?php echo  esc_attr( $bg_select ) ? '</div>' : ''; ?>
		<?php
		$locations = array();

		foreach ( $add_map as $map ) {
			$locations[] = array(
				'google_map' => array(
					'lat' => foodchow_set( $map, 'latitude' ),
					'lng' => foodchow_set( $map, 'longitude' ),
				),
				'location_address' => foodchow_set( $map, 'address' ),
				'location_name'    => foodchow_set( $map, 'title' ),
			);
		}


		?>

		<?php
		/* Set Default Map Area Using First Location */
		$map_area_lat = isset( $locations[0]['google_map']['lat'] ) ? $locations[0]['google_map']['lat'] : '';
		$map_area_lng = isset( $locations[0]['google_map']['lng'] ) ? $locations[0]['google_map']['lng'] : '';
		?>

		<script>
			jQuery( document ).ready( function($) {

				/* Do not drag on mobile. */
				var is_touch_device = 'ontouchstart' in document.documentElement;

				var map = new GMaps({
					el: '#google-map',
					lat: '<?php echo esc_attr( $map_area_lat ); ?>',
					lng: '<?php echo esc_attr( $map_area_lng ); ?>',
					scrollwheel: false,
					draggable: ! is_touch_device,
					  zoom: 6,
				});

				/* Map Bound */
				var bounds = [];

				<?php /* For Each Location Create a Marker. */
				foreach( $locations as $location ){
					$name = $location['location_name'];
					$addr = $location['location_address'];
					$map_lat = $location['google_map']['lat'];
					$map_lng = $location['google_map']['lng'];

					?>
					/* Set Bound Marker */
					var latlng = new google.maps.LatLng(<?php echo esc_attr( $map_lat ); ?>, <?php echo esc_attr( $map_lng ); ?>);
					bounds.push(latlng);
					/* Add Marker */
					map.addMarker({
						lat: <?php echo esc_attr( $map_lat ); ?>,
						lng: <?php echo esc_attr( $map_lng ); ?>,
						title: '<?php echo esc_html( $name ); ?>',

						infoWindow: {
							content: '<h5><?php echo esc_html( $name ); ?></h5><p><?php echo wp_kses_post( $addr ); ?></p>'
						}
					});
					<?php } //end foreach locations ?>

					/* Fit All Marker to map */
					map.fitLatLngBounds(bounds);

					/* Make Map Responsive */
					var $window = $(window);
					function mapWidth() {
						var size = $('.google-map-wrap').width();
						$('.google-map').css({width: size + 'px'});
					}
					mapWidth();
					$(window).resize(mapWidth);

				});
			</script>

			<?php wp_enqueue_script(array( 'google-api', 'foodchow-g-map' ) );

endif;
