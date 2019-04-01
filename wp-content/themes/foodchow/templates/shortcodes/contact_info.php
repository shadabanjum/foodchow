<?php
/**
 * Contact Info Shortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
?>

<ul>
    <?php foreach ($contact_desc as $contact) : ?> 
    	<li>
        	<i class="fa <?php echo esc_attr(foodchow_set($contact, 'contact_icon')); ?>"></i>
            <span><?php echo esc_attr(foodchow_set($contact, 
            'contact_title')); ?></span>
            <em><?php echo esc_attr(foodchow_set($contact, 
            'description')); ?></em>
        </li>
    <?php endforeach; ?>

</ul>