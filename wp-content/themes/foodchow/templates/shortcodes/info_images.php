<?php

if($images) : 

$seccounter = 2;

?>
    <div class="img-gal">
        <div class="row">
            <?php foreach( $images as $image ) :  ?>
                <div class="col-lg-3 col-sm-6 wow fadeIn" data-wow-delay=".<?php echo esc_attr($seccounter); ?>s">
                    <figure>
                        <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
                            <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $image, 'full' ), 270, 219, true ) ); ?>
                        <?php else : ?>
                            <?php the_post_thumbnail( 'full' ); ?>
                        <?php endif; ?>            
                    </figure>
                </div>
            <?php $seccounter+=2; endforeach; ?>                   
        </div>
    </div>
<?php endif; ?>