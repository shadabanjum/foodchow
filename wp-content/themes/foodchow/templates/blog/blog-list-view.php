<?php
	/**
	 * Blog Content Template
	 *
	 * @package WordPress
	 * @subpackage Foodchow
	 * @author Webinane
	 * @version 1.0
	 */

$archive_year  = get_the_time( 'Y' );
$archive_month = get_the_time( 'm' );
$archive_day   = get_the_time( 'd' );
?>
<div <?php post_class(); ?>>
	<div class="row">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-md-12">   
				<div class="blog-avatar">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> 
						
					</a>

				</div>

			</div>
		<?php endif; ?>

	<div class="col-md-12 blog-list-view">
		<?php $titlelimit = $data->get( 'title_limit' ) ? $data->get( 'title_limit' ) : 10; ?>
		<div class="blog-meta">
		    <?php if ( $data->get( 'likes' ) ||  $data->get( 'date' ) || $data->get( 'comments' ) ) : ?>
    			<ul>
    				<?php if ( $data->get( 'likes' ) ) : ?>
    					<li>
    						<?php foodchow_template_load( 'templates/like.php', compact( 'data') ); ?>
    					</li>		
    				<?php endif; ?>			
    				<?php if( $data->get( 'date' ) ) : ?>			
    					<li>
    						<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>">
    							<i class="fa fa-clock-o"></i> <?php echo get_the_date( 'F j, Y' ); ?>
    						</a>
    					</li>				
    				<?php endif; ?>
    
    				<?php if( $data->get( 'comments' ) ) : ?>
    
    					<li><a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>#comments"><i class="fa fa-comments-o"></i><?php comments_number(); ?></a></li>			
    				<?php endif; ?>
    			</ul>
    			<?php endif; ?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words( get_the_title(), $titlelimit, '...' ); ?></a></h2>
			<?php
	           $patterns = "/\[[\/]?vc_[^\]]*\]/";
	           $replacements = "";
	           $content = preg_replace( $patterns, $replacements,get_the_content() );
	           $con = strip_shortcodes( $content );
	           $text_limit = $data->get( 'text_limit' ) ? $data->get( 'text_limit' ) : 100;
	        ?>
           <p><?php echo wp_trim_words( $con,$text_limit, '...' );?></p>
			<a href="<?php echo the_permalink(); ?>" class="button"><?php echo esc_html( $data->get( 'button_label' ) ) ? esc_html( $data->get( 'button_label' ) ) : esc_html_e( 'Read More', 'foodchow' ); ?></a>		
		</div>

	</div>

</div>
</div>