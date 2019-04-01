<?php
    /**
     * SIngle Services Template
     *
     * @package Foodchow
     * @author  Webiane
     * @version 1.0
     */
?>
<?php $social_icons = get_post_meta( get_the_ID(), 'social_icons' , true); ?>

<?php if( !empty( $social_icons ) && $options->get( 'single_show_service_icon' ) ) : ?>

	<ul class="social-media">
		
		<?php foreach ($social_icons as $key => $value) : ?>

			  <li><a href="<?php echo esc_url( foodchow_set( $value, 'profile_url' ) ); ?>" style="background-color: <?php echo esc_attr( foodchow_set( $value, 'serv_icon_bg' ) ); ?>; color: <?php echo esc_attr( foodchow_set( $value, 'serv_icon_color' ) ); ?>"><i class="<?php echo esc_attr( foodchow_set( $value, 'icons' ) ); ?>"></i></a></li>
	
		<?php endforeach; ?>

	  	   
	</ul>


<?php endif; ?>