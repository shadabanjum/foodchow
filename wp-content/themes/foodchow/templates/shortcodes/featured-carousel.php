<div class="image-uppermeta <?php echo esc_attr( foodchow_set( $banner, 'heading_color' ) ); ?>">

    <?php echo ( foodchow_set( $banner, 'title' ) ) ? '<h1>' . esc_html( foodchow_set( $banner, 'title' ) ) . '</h1>' : ''; ?>

    <?php echo ( foodchow_set( $banner, 'subtitle' ) ) ? '<h2>' . esc_html( foodchow_set( $banner, 'subtitle' ) ) . '</h2>' : ''; ?>


    <?php echo ( foodchow_set( $banner, 'text' ) ) ? '<p>' . wp_kses_post( foodchow_set( $banner, 'text' ) ) . '</p>' : ''; ?>

    <?php if ( foodchow_set( $banner, 'appointment_btn' ) ) : ?>


        <?php if ( ! empty( foodchow_set( $banner, 'appointment_link' ) ) ){
            $link = ( '||' ===  foodchow_set( $banner, 'appointment_link' ) ) ? '' : foodchow_set( $banner, 'appointment_link' );  
            $link = vc_build_link( $link ); 

        }

        if ( ! empty( $link  ) ) : ?>
        <a href="<?php echo esc_url( $link['url'] ); ?>" class="new-btn" <?php echo ( $link['target'] ) ? 'target=_blank' : ''; ?>>
            <?php echo esc_html( $link['title'] ); ?></a>
        <?php endif; ?>


    <?php endif; ?>

</div>