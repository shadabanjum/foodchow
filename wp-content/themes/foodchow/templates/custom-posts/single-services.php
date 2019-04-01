<?php
    /**
     * Single Services Template
     *
     * @package Foodchow
     * @author  Webiane
     * @version 1.0
     */
?>

<?php $subtitle = foodchow_set( $meta, 'subtitle' ); ?>

<?php $button_label = foodchow_set( $meta, 'button_start' ); ?>

<?php $button_link = foodchow_set( $meta, 'button_link' ); ?>

<?php $add_features = foodchow_set( $meta, 'add_features' ); ?>



<div class="service-box">
    
    <div class="services">
        
        <div class="services-avatar">
            
            <?php foodchow_template_load( 'templates/services-icon.php' ); ?>
        
        </div>
        
        <h4><?php echo the_title(); ?></h4>
        
        <?php echo($subtitle) ? '<span>' .$subtitle. '</span>' : ''; ?>
        
        <?php if( $add_features ) : ?>
            
            <ul>
                
                <?php foreach ( $add_features as $features ) : ?>
                    
                    <li><?php echo esc_html( foodchow_set( $features, 'feature' ) ); ?></li>

                <?php endforeach;  ?>
              
                
            </ul>
        
        <?php endif; ?>
            
            <?php if ( $button_label && $button_link ) : ?>
                
                <a href="<?php echo esc_url( $button_link ); ?>" class="button"><?php echo esc_html( $button_label ); ?></a>

            <?php endif; ?>
        
    </div>

</div>