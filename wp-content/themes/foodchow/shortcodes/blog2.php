<?php
/**
 * Blog Simple Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}


$cat = explode(',', $cat);
$args = array(
	'post_type' => 'post',
	'order' => $order,
	'posts_per_page' => $number,
);
if (!empty($cat) && foodchow_set($cat, 0) == 'all') {
	array_shift($cat);
}

if (!empty($cat) && foodchow_set($cat, 0) != '')
	$args['tax_query'] = array(array('taxonomy' => 'category', 'field' => 'slug', 'terms' => (array) $cat));
$query = new WP_Query($args);
$title_limit = $title_limit ? $title_limit : 10;
$text_limit = $text_limit ? $text_limit : 20;
?>


<?php if($query->have_posts()) : ?>
	<div class="row">
		<?php $counter = 1; while($query->have_posts()) : $query->the_post(); ?>

		<div class="col-md-4 col-sm-6 col-lg-4">
			<div class="news-box wow fadeIn" data-wow-delay="0.1s">
				<div class="news-thumb">
					<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 370, 250, true ) ); ?>
					<?php endif; ?>
					<div class="news-btns">

						<?php if( $date ) : ?>
							<a class="post-date red-bg" href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"  itemprop="url"><?php echo get_the_date( 'F j' ); ?></a>
						<?php endif; ?>
						<?php if( $button ) : ?>
							<a class="read-more" href="<?php the_permalink(); ?>" itemprop="url"><?php echo esc_attr( $btn_label ) ? $btn_label : esc_html__( 'READ MORE', 'foodchow'); ?></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="news-info">
					<h4 itemprop="headline">
						<a href="<?php the_permalink(); ?>">
							<?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?>			
						</a>
					</h4>
					<?php
					$patterns = "/\[[\/]?vc_[^\]]*\]/";
					$replacements = "";
					$content = preg_replace( $patterns, $replacements,get_the_content() );
					$con = strip_shortcodes( $content );
					
					?>
					<p><?php echo wp_trim_words( $con,$text_limit, '...' );?></p>
				</div>
			</div>
		</div>

	
	<?php $counter++; endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>