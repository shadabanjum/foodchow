<?php 
/**
 * Single Services Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

get_header(); 
?>

<section>       

	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php the_content(); ?>

	<?php endwhile; wp_reset_postdata(); ?>


</section><!-- blog section with pagination -->


<?php get_footer(); ?>