<?php if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
}
?>
<div class="tab-pane fade active show" id="link1">
    <ul class="online-coaches">
        <?php while( $query->have_posts() ) :

        $query->the_post(); 
        
    ?>

        <li>
            <div class="coach-avatar">
                <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
                    <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 270, 230, true ) ); ?>
                <?php else : ?>
                    <?php the_post_thumbnail( 'full' ); ?>
                <?php endif; ?>
                <?php if ( $show_favorite ) : ?>
                    <?php foodchow_template_load( 'templates/like.php' ); ?>
                <?php endif; ?>
            </div>

            <div class="coach-info">
                <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '' );?></a></h3>
                
                <?php $course_settings = get_post_meta( get_the_ID(), 'courseSettings', true ); ?>
                <span class="price">
                    <?php if ( $show_price && foodchow_set( $course_settings, 'course_price' ) ) : ?>

                        <?php echo ( $show_saleprice && foodchow_set( $course_settings, 'course_sale_price' ) ) ? '<del>' : '' ?>

                            <?php echo foodchow_wocommerce_currency_symbol(); echo esc_attr( foodchow_set( $course_settings, 'course_price' ) ); ?>
                            <?php echo ( $show_saleprice && foodchow_set( $course_settings, 'course_sale_price' ) ) ? '</del>' : '' ?>


                        <?php endif; ?>

                        <?php if ( $show_saleprice && foodchow_set( $course_settings, 'course_sale_price' ) ) : ?>

                            <?php echo ( $show_price && foodchow_set( $course_settings, 'course_price' ) ) ? '<ins>' : ''; ?>
                                <?php echo foodchow_wocommerce_currency_symbol(); echo esc_attr( foodchow_set( $course_settings, 'course_sale_price' ) ); ?>

                                <?php echo ( $show_price && foodchow_set( $course_settings, 'course_price' ) ) ? '</ins>' : ''; ?>


                            <?php endif; ?>
                        </span>
                        <?php if ( $show_rat && function_exists( 'foodchow_rating_average_stars' ) ) : ?>

                            <div class="rating <?php echo ( foodchow_rating_average( get_the_id() ) == 0 ) ? 'opacity0' : ''; ?>">
                               
                               <?php if ( function_exists( 'foodchow_rating_average_stars' ) ) : ?>

                                <?php echo foodchow_rating_average_stars( get_the_id() ); ?>
                                
                            <?php endif; ?> 
                            
                            <span>(<?php echo foodchow_rating_average( get_the_id() ); ?>)</span>
                        </div>
                    <?php endif; ?>

                </div>
            </li>
        <?php endwhile;

       wp_reset_postdata();

        ?>

    </ul>
</div>

<?php wp_enqueue_script( 'rating' );
