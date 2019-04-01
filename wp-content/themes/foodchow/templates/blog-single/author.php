
    <?php if( $options->get( 'show_single_authorbox' ) ) : ?>

        <div class="about-instructor">

            <h4><?php echo wp_kses( $blog_author_title, true ); ?></h4>

            <div class="row">

                <div class="col-sm-4">

                   <?php echo get_avatar(get_the_author_meta('ID'), 200);  ?>

                </div>

                <div class="col-sm-8">

                    <div class="instructure-meta style2">

                        <span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo esc_html(get_the_author_meta('display_name')); ?></a></span>
                        
                        <ul class="batach">
                            <?php $designation = get_the_author_meta( 'designation' );  ?>
                            <li>web developer</li>
                            
                            <li>Online Instructor</li>
                        
                        </ul>
                        
                        <p><?php echo esc_html(get_the_author_meta('description')); ?></p>
                    
                    </div>
                
                </div>
            
            </div>
        </div>
    
    <?php endif; ?>