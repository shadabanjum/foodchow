 <?php
    /**
     * Search Found Template
     *
     * @package WordPress
     * @subpackage Webinane
     * @author Webinane
     * @version 1.0
     */
    $options = foodchow_WSH()->option();

?>

<div class="col-lg-12">

    <div class="search-area">

       <h3><?php esc_html_e( 'Search Results', 'foodchow' ); ?> <span>"<?php echo esc_attr( get_search_query() ); ?>"</span></h3>
        <?php if(  $options->get( 'search_found_text' ) ) : ?>
            <span><?php echo wp_kses( $options->get( ( 'search_found_text' ) ) , true ); ?></span>
         <?php endif; ?>
        <?php if ( ! class_exists( 'Foodchow_Core_Plugin' ) ) : ?>
            <?php get_search_form(); ?>
        <?php else : ?>
            <?php if ( $options->get( esc_attr( 'search_form' ) ) ) : ?>
                <?php get_search_form(); ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>

</div>