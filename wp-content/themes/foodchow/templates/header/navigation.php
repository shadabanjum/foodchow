<?php 

if ( has_nav_menu( $menu_style ) ) : ?>
<ul <?php echo ( $menu_style == 'main_menu4' ) ? 'class="hover-menu"' : ''; ?>>
	<?php
	wp_nav_menu( array(
		'theme_location' => $menu_style,
		'container_id' => 'navbar-collapse-1',
		'container_class' => 'navbar-collapse collapse navbar-right',
		'menu_class' => 'nav navbar-nav',
		'fallback_cb' => false,
		'items_wrap' => '%3$s',
		'container' => false,
		'walker' => new \Foodchow\Includes\Classes\Bootstrap_Walker(),
		) );   ?>
	</ul> 
<?php elseif(has_nav_menu( 'main_menu' )) : ?>

	<ul>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'main_menu',
			'container_id' => 'navbar-collapse-1',
			'container_class' => 'navbar-collapse collapse navbar-right',
			'menu_class' => 'nav navbar-nav',
			'fallback_cb' => false,
			'items_wrap' => '%3$s',
			'container' => false,
			'walker' => new \Foodchow\Includes\Classes\Bootstrap_Walker(),
			) );   ?>
		</ul> 


	<?php endif; ?>
