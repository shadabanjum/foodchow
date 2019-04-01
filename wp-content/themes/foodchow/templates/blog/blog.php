<?php
/**
 * Blog Template 
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */


?>
<div class="col-md-<?php echo esc_attr( $data->get( 'style' ) ); ?> col-sm-<?php echo esc_attr( $data->get( 'style' ) ); ?> col-lg-<?php echo esc_attr( $data->get( 'style' ) ); ?>">
	<div class="news-box wow fadeIn" data-wow-delay="0.1s">
		<?php foodchow_template_load( 'templates/blog/thumbnail.php', compact( 'img_obj', 'width', 'height', 'data' ) ); ?>
		
		<div class="news-info">
			<h4 itemprop="headline">
				<a href="<?php the_permalink(); ?>">
					<?php echo wp_trim_words( get_the_title(), $data->get( 'title_limit' ), '...' ); ?>			
				</a>
			</h4>
			<?php
	           $patterns = "/\[[\/]?vc_[^\]]*\]/";
	           $replacements = "";
	           $content = preg_replace( $patterns, $replacements,get_the_content() );
	           $con = strip_shortcodes( $content );
	           $text_limit = $data->get( 'text_limit' ) ? $data->get( 'text_limit' ) : 100;
	        ?>
           <p><?php echo wp_trim_words( $con,$text_limit, '...' );?></p>
		</div>
	</div>
</div>
