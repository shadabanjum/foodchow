<div class="topbar" style="background-color:<?php echo esc_attr( $options->get( 'topbar1_bg_color' ) ); ?>">
	<div class="container">
		<div class="select-wrp">
			<select data-placeholder="Feel Like Eating">
				<option>FEEL LIKE EATING</option>
				<option>Burger</option>
				<option>Pizza</option>
				<option>Fried Rice</option>
				<option>Chicken Shots</option>
			</select>
		</div>
		<div class="select-wrp">
			<select data-placeholder="Choose Location">
				<option>CHOOSE LOCATION</option>
				<option>New york</option>
				<option>Washington</option>
				<option>Chicago</option>
				<option>Los Angeles</option>
			</select>
		</div>
		<?php if ( $options->get( 'show_topbar_login' ) || $options->get( 'show_topbar_register' ) && ( ! is_user_logged_in() ) ) : ?>
			<div class="topbar-register">
				<?php if( $options->get( 'show_topbar_login' ) ) : ?>
					<a class="log-popup-btn" href="#" title="Login" itemprop="url"><?php echo esc_attr(  $options->get( 'login_label' )  ) ?  $options->get( 'login_label' ) : esc_html_e( 'LOGIN', 'foodchow' ); ?></a> 

					/ 
				<?php endif; ?>
				<?php if( $options->get( 'show_topbar_register' ) ) : ?>
					<a class="sign-popup-btn" href="#" title="Register" itemprop="url"><?php echo esc_attr(  $options->get( 'register_label' )  ) ?  $options->get( 'register_label' ) : esc_html_e( 'REGISTER', 'foodchow' ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $options->get( 'show_topbar_sharing' ) && $options->get( 'topbar_social_share' ) ) : ?>
			<?php $social_share  = $options->get( 'topbar_social_share' ); ?>
			<div class="social1">

					<?php foreach ( $social_share as $h_icon ) :
					$header_social_icons = json_decode( urldecode( foodchow_set( $h_icon, 'data' ) ) );
					if ( foodchow_set( $header_social_icons, 'enable') == '' )                                              
						continue;
					?>
					<a href="<?php echo foodchow_set( $header_social_icons, 'url'); ?>" target="_blank" <?php echo ( foodchow_set( $header_social_icons, 'background' ) ) ? 'style="background-color:'. foodchow_set( $header_social_icons, 'background' ).';"' : ''; ?>><i class="fa <?php echo esc_attr( foodchow_set( $header_social_icons, 'icon' ) ); ?>" <?php echo ( foodchow_set( $header_social_icons, 'color' ) ) ? 'style="color:' .foodchow_set( $header_social_icons, 'color' ).';"' : ''; ?>></i></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>                
</div><!-- Topbar -->


