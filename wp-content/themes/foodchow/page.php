<?php
/**
 * Default Template Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */


get_header();


$data = \Foodchow\Includes\Classes\Common::instance()->data( 'page' )->get();
/*printr($data);*/
$class = ( $data->get( 'layout' ) != 'full' || $data->get( 'style' ) == 'col-md-12' ) ? 'col-lg-9' : 'col-xs-12 col-sm-12 col-md-12';

do_action( 'foodchow_banner', $data ); ?>


<section>

	<div class="gap">

		<div class="container">

			<div class="row">

				<?php do_action( 'foodchow_sidebar', 'left', $data ); ?>

				<div class="<?php echo esc_attr( $class ); ?> single-meta">

					<?php while ( have_posts() ): the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; wp_reset_postdata(); ?>
					<div class="clearfix"></div>
					
					    <?php
                         	$defaults = array(
                        		'before'           => '<div class="paginate_link">' . esc_html__( 'Pages:', 'foodchow' ),
                        		'after'            => '</div>',
                        		
                        	);
                         
                        wp_link_pages( $defaults );
                        ?>
				    
					<?php comments_template() ?>
				</div>

				<?php do_action( 'foodchow_sidebar', 'right', $data ); ?>

			</div>
		</div>
	</div>
</section><!-- blog section with pagination -->

<?php get_footer(); ?>
