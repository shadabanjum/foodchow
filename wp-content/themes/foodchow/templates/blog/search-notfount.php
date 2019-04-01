<?php
	/**
	 * Search Not Found Template
	 *
	 * @package WordPress
	 * @subpackage Webinane
	 * @author Webinane
	 * @version 1.0
	 */
	
?>
<?php $options = foodchow_WSH()->option(); ?>

<div class="search-area">
   
    <h3>
       
        <?php echo ( $options->get( esc_attr( 'search_notfound_title' ) ) )  ? wp_kses (  $options->get( esc_attr( 'search_notfound_title' ) ) , true  ) : esc_html_e( 'Search Results ', 'foodchow' ); ?>
        <span>"<?php echo get_search_query( true ); ?>"</span>
   	
   	</h3>
   
    <span><?php echo wp_kses( $options->get( esc_attr( 'search_not_found_text' ) ) , true ) ? wp_kses( $options->get( esc_attr( 'search_not_found_text' ) ) , true ) : esc_html_e( 'Sorry! Your search result not found', 'foodchow' ); ?></span>

    <?php if(  $options->get( esc_attr( 'search_notfound_form' ) ) ) : ?>

         <?php get_search_form(); ?>

    <?php endif; ?>

 </div>