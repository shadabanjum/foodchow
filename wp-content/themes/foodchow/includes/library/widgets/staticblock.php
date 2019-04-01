<?php

namespace Foodchow\Includes\Library\Widgets;

use \WP_Widget;

/**
 * Widgets files
 *
 * @package Foodchow
 */


//Get In Touch
class Staticblock extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Staticblock', /* Name */__( 'Static Blocks', 'foodchow' ), array( 'description' => esc_html__( 'Choose the static block to show.', 'foodchow' ) ) );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance )
	{
		extract( $args );
		
		$block = isset( $instance['block'] ) ? $instance['block'] : '';

		if ( ! $block ) {
			return;
		}
	
		if ( function_exists( 'foodchow_widget_output_test' ) ) {

	        foodchow_widget_output_test($block);
		}


	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['block'] = strip_tags($new_instance['block']);
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$block = ($instance) ? esc_attr($instance['block']) : '';
		?>       
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('block') ); ?>"><?php esc_html_e( 'Choose static block for sidebar widgets or footer widgets area:', 'foodchow' ); ?></label>
            
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('block') ); ?>" id="<?php echo esc_attr( $this->get_field_id('block') ); ?>">

				<?php foreach ( (array)foodchow_get_posts_blocks('static_block') as $key => $value ) : ?>
					
					<option value="<?php echo esc_attr( $key ); ?>"<?php selected( $key, $block ) ?>><?php echo wp_kses_post( $value ) ?></option>
				<?php endforeach; ?>
			</select>
            
        </p>
            
		<?php 
	}
}
