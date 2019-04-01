 <?php
/**
 * Responsive Header File
 *
 * @package Foodchow
 * @author 	Webinane
 * @version 1.0
 */

?>

<div class="responsive-header">
	<?php if( $options->get( 'responsive_topbar' ) ) : ?>
		<div class="responsive-topbar">
			<?php if( $options->get( 'responsive_dropdown1' ) ) : ?>
				<div class="select-wrp">
					<select data-placeholder="Feel Like Eating">
						<option>FEEL LIKE EATING</option>
						<option>Burger</option>
						<option>Pizza</option>
						<option>Fried Rice</option>
						<option>Chicken Shots</option>
					</select>
				</div>
			<?php endif; ?>
			<?php if( $options->get( 'responsive_dropdown1' ) ) : ?>
				<div class="select-wrp">
					<select data-placeholder="Choose Location">
						<option>CHOOSE LOCATION</option>
						<option>New york</option>
						<option>Washington</option>
						<option>Chicago</option>
						<option>Los Angeles</option>
					</select>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="responsive-logomenu">
		<div class="logo"><h1 itemprop="headline"><a href="index.html" title="Home" itemprop="url"><img src="assets/images/logo.png" alt="logo.png" itemprop="image"></a></h1></div>
		<span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
	</div>
	<div class="responsive-menu">
		<span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
		<div class="menu-lst">
			<?php foodchow_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_style' ) ); ?>
		</div>
		<?php if( $options->get( 'show_responsive_login' ) ) : ?>
			<div class="topbar-register">
				<a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
			</div>
		<?php endif; ?>
		<div class="social1">
			<a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook-square"></i></a>
			<a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
			<a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
		</div>
		<div class="register-btn">
			<a class="yellow-bg brd-rd4" href="register-reservation.html" title="Register" itemprop="url">REGISTER RESTAURANT</a>
		</div>
	</div><!-- Responsive Menu -->
</div><!-- Responsive Header -->
<div class="responsive-header">
	<?php if ( $options->get( 'responsive_topbar' ) && $options->get( 'responsive_timing' ) ) : ?>
		<div class="res-top-bar" style="background-color: <?php echo $options->get('show_responsive_typo') ? esc_attr( foodchow_set($options->get( 'responsive_logobar_bg' ), 'rgba' ) ) : ''; ?>">
			<ul class="little-contact">
				<li>
					<i><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-6.png' ); ?>" alt="icon"></i> 
					<?php echo esc_html( $options->get( 'responsive_timing' ) ); ?>
				</li>
			</ul>
		</div>
	<?php endif; ?>
	<div class="res-logoarea" style="background: <?php echo $options->get('show_responsive_typo') ? esc_attr( foodchow_set( $options->get( 'responsive_menubar_bg' ) , 'rgba' ) ) : ''; ?>">
		<?php echo wp_kses_post( foodchow_logo( $options->get( 'responsive_logo_type' ), $options->get( 'responsive_image_logo' ), $options->get( 'responsive_logo_dimension' ), $options->get( 'respnsive_logo_text' ), $options->get( 'responsive_logo_typography' ) ) ); ?>
		<ul class="search-n-cart">
			<?php if ( $options->get( 'responsive_button' ) && $options->get( 'responsive_login_link' ) ) : ?>
				<?php if(is_user_logged_in()) : ?>

					<a class="res-login-page logout" href="<?php echo wp_logout_url(home_url('/')); ?> "><i class="fa fa-power-off"></i></a>
					
					<?php $roles = wp_get_current_user()->roles; 

					$coach_rule = foodchow_set($roles,0); 
					if( $coach_rule == 'coach' && $options->get('responsive_account_link') ) : ?>

					<a class="res-login-page" href="<?php echo esc_url($options->get('responsive_account_link')); ?>"><i class="fa fa-users "></i></a>

				<?php endif; ?>
			<?php else : ?>
				
				<a class="res-login-page" href="<?php echo get_page_link( $options->get( 'responsive_login_link' ) ); ?>"><i class="fa fa-user"></i></a>
				
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( $options->get( 'responsive_search' ) ) : ?>
			<li class="top-search"><i class="fa fa-search"></i>
				<form method="post">
					<input placeholder="<?php esc_html_e( 'search here', 'foodchow' ); ?>" type="text">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</li>
		<?php endif; ?>
		<?php if ( $options->get( 'responsive_cart' ) ) : ?>
			<?php foodchow_template_load( 'templates/header/responsive_cart.php' ); ?>
		<?php endif; ?>
		<li><a href="#" class="menu-btn"><i class="fa fa-align-justify"></i></a></li>
	</ul>
</div>
<div class="responsive-menu" style="background: <?php echo $options->get('show_responsive_typo') ? esc_attr( $options->get( 'responsive_menu_bg' ) ) : ''; ?>">
	<span class="menu-close-btn"><i class="fa fa-close"></i></span>
	<?php $menu_style =  'res_menu'; ?>
	<?php foodchow_template_load( 'templates/header/navigation.php', compact( 'options', 'menu_style' ) ); ?>
</div>
	</div><!-- responsive menu -->