 <?php $counter = 0; while ($query->have_posts()): $query->the_post(); ?>
  <div class="col-md-4 col-sm-6 col-lg-4 filter-item">
                                        <div class="gallery-bx sudo-bg-red wow zoomIn" data-wow-delay="0.2s">
                                            <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
                                                <?php if( $options->get( 'gallery_listing_style' ) == 'simple' ) {
                                                    echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 345, 300, true ) );
                                                } else {
                                                    echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 345, $height[$counter], true ) );
                                                }
                                                endif; ?> 

                                                
                                                <div class="gallery-info-btns">
                                                    <a class="yellow-bg brd-rd50" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" data-fancybox="gallery" title="<?php esc_attr_e( 'Click to See Image', 'foodchow' ); ?>" itemprop="url"><i class="fa fa-search"></i></a>
                                                    <a class="yellow-bg brd-rd50" href="<?php the_permalink(); ?>" title="Gallery Detail" itemprop="url"><i class="fa fa-chain"></i></a>
                                                </div>
                                                <h3 itemprop="headline"><a href="<?php the_permalink(); ?>"  itemprop="url"><?php echo wp_trim_words( get_the_title(), $options->get('gallery_title_limit'), '...' );?></a></h3>
                                            </div>
                                        </div>


                                       
                                    </div>
                                     <?php $counter++; endwhile; wp_reset_postdata(); ?>