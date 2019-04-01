<section>
    <div class="block less-spacing gray-bg top-padd30">
      <div class="container">
        <div class="row">
          <div class="sec-box">
            <?php do_action( 'foodchow_sidebar', 'left', $data ); ?>

            <div class="<?php echo esc_attr( $class ); ?> col-sm-12">
              <div class="resturent-services remove-ext">
                <?php $counter = 0; while ($query->have_posts()): $query->the_post(); ?>
                <div class="col-md-<?php echo esc_attr( $style ); ?> col-sm-6">
                  <div class="servise-box wow fadeIn" data-wow-delay="0.2s">
                    <figure>
                      <?php if ( class_exists( 'Foodchow_Resizer' ) ) {
                        echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, $height, true ) );
                      }  ?> 
                    </figure>
                    <?php $meta = get_post_meta( get_the_ID(), 'servsettings' , true); ?>
                    <div class="uper-meta">
                      <?php if( foodchow_set( $meta, 'icon_type' ) == 'image' && foodchow_set( $meta, 'icon_image' )  ) : ?>
                        <i><?php echo wp_get_attachment_image( foodchow_set( $meta, 'icon_image' ), 'full' ); ?></i>
                      <?php endif; ?>
                      <?php if( foodchow_set( $meta, 'icon_type' ) == 'icon' && foodchow_set( $meta, 'icon_icon' )  ) : ?>
                        <i class="newicon <?php echo esc_attr( foodchow_set( $meta, 'icon_icon' ) ); ?>"></i>
                      <?php endif; ?>
                      <h4><a href="<?php the_permalink(); ?>"  itemprop="url"><?php echo wp_trim_words( get_the_title(), $limit, '...' );?></a></h4>
                      <?php echo esc_attr( foodchow_set( $meta, 'subtitle' ) ) ? '<span>'.foodchow_set( $meta, 'subtitle' ).'</span>' : ''; ?>
                    </div>
                  </div>
                </div>
                <?php $counter++; endwhile; wp_reset_postdata(); ?>
              </div>
              <?php if( $pagination ) {
                foodchow_the_pagination( $query->max_num_pages ); 
              } ?>
            </div><!-- Section Box -->

            <?php do_action( 'foodchow_sidebar', 'right', $data ); ?>
          </div>
        </div>
      </div>

    </div>
  </section>