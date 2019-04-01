<?php
 /**
 * Languge Switcher  File
 *
 * @package Esperto
 * @author  Webiane
 * @version 1.0
 */
 ?>
 <?php $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $links = json_decode( urldecode( $add_link ) );
 ?>


 <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">

 	<h4 class="widget-title"><?php echo wp_kses( $title, true ); ?></h4>
 	<?php if( $links ) :  ?>
 		<ul>
 			<?php foreach ( $links as $link ) : ?>

 				<?php foodchow_template_load( 'templates/shortcodes/links.php', compact( 'link' ) ); ?>

 			<?php endforeach; ?> 
 		</ul>
 	<?php endif; ?>
 </div>



