<?php
/**
 * 404 page file
 *
 * @package WordPress
 * @subpackage Floor Press
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 *
 */

?>
<?php get_header(); 
$data = \Foodchow\Includes\Classes\Common::instance()->data( 'error' )->get();
do_action( 'foodchow_banner', $data );  ?>

<?php $options = foodchow_WSH()->option(); //printr($options->get( 'error_page_bg' ));  ?>
<?php $bg = foodchow_set( $options->get( 'error_page_bg' ), 'background-image' ) ? foodchow_set( $options->get( 'error_page_bg' ), 'background-image' ) : get_template_directory_uri().'/assets/images/topbg.jpg'; ?>

<section>
	<div class="block">
		<div style="background-image: url('<?php echo esc_url( $bg ); ?>');" class="fixed-bg"></div>
		<div class="error-page-wrapper text-center">
			<div class="error-page-inner">
				<h1 itemprop="headline">404 <span class="red-clr"><?php esc_html_e( 'Error', 'foodchow' ); ?></span></h1>
				<h4 itemprop="headline"><span class="yellow-clr"><?php echo ( $options->get( '404_title' ) ) ? $options->get('404_title' ) : 'Oops'; ?>,</span> <?php echo ( $options->get( '404_title2' ) ) ? $options->get( '404_title2' ) : esc_html__( 'This Page Not Found!', 'foodchow' ); ?></h4>
				<p itemprop="description"><?php echo $options->get( '404_description' ); ?></p>
				<a class="brd-rd2 yellow-bg" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><i class="fa fa-home"></i> <?php echo ( $options->get( '404_label' ) ) ? $options->get( '404_label' ) : esc_html__( 'BACK TO HOME', 'foodchow' ); ?></a>
				
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" class="search-frm custom">

					<input type="text" id="s" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e( 'SEARCH KEYWORD', 'foodchow' ); ?>" class="brd-rd3" />

					<button type="submit" id="searchsubmit" class="yellow-bg"><i class="fa fa-search"></i></button>

				</form>



			</div>
		</div><!-- Error Page Wrapper -->
	</div>
</section>

<?php get_footer(); ?>
