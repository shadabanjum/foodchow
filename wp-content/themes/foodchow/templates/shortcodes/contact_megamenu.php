<?php
/**
 * Contact Megamenu Shortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
?>
<ul class="address">
    <?php foreach($contact_info as $info ) : ?>
        <li>
            <i class="fa <?php echo esc_attr(foodchow_set($info , 'contact_icon')); ?>"></i> 
            <span>
                <?php echo esc_html(foodchow_set($info , 'contact_title')); ?>
             </span>
        </li>
    <?php endforeach; ?>
   
</ul>