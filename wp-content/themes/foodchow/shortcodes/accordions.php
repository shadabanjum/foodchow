<?php
 /**
 * Accordions File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 $accordions = json_decode( urldecode( $add_accordions ) );

 if( $accordions ) :?>
 <?php echo  esc_attr( $bg_select ) ? '<div class="'.$bg_select.'">' : ''; ?>
 	<div class="toggle-wrapper text-center bottom-padd80">
 		<div id="toggle" class="toggle">
 			<?php foreach( $accordions as $accordion ) : ?>
 				<div class="toggle-item">
 					<h4><i class="fa fa-angle-right brd-rd50"></i> <?php echo wp_kses_post( foodchow_set( $accordion, 'title' ) ); ?></h4>
 					<div class="content">
 						<p><?php echo wp_kses_post( foodchow_set( $accordion, 'text' ) ); ?></p>
 					</div>
 				</div>
 			<?php endforeach; ?>
 		</div><!-- Accordions -->
 	</div>
 	<?php echo  esc_attr( $bg_select ) ? '</div>' : ''; ?>
 <?php endif; ?>