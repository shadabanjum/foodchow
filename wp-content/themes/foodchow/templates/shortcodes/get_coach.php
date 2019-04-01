<?php
/**
 * Get Coach Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */

$biography = json_decode(urldecode($study_history)); ?>
<div class="col-sm-6 fadein">
	<div class="couch-info">
    	<h1><?php echo esc_html($title); ?></h1>
        <span><?php echo esc_html($tagline); ?></span>
        <?php if ( $biography ) : ?>
            <div class="tab-content">
                <?php $counter = 0;  foreach($biography as  $bio) : ?>
                    <div class="tab-pane <?php echo ($counter == 0 ) ? 'active' : '' ?>  fade show" id="class-<?php echo esc_attr($counter); ?><?php echo esc_attr(foodchow_set($bio, 'study_year')); ?>">
                		<h4><?php echo esc_html(foodchow_set($bio, 'study_title')); ?></h4>
                		<p><?php echo esc_html(foodchow_set($bio, 'study_text')); ?> </p>
                    </div>
                <?php $counter++; endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $biography ) ) : ?>
            <ul class="nav nav-tabs tab-btn">
                 
                 <?php $counter2 = 0;  foreach($biography as  $bio) : ?>
                     <li class="nav-item">
                        <a class="<?php echo ($counter2 == 0 ) ? 'active' : '' ?>" href="#class-<?php echo esc_attr($counter2); ?><?php echo esc_attr(foodchow_set($bio, 'study_year')); ?>" data-toggle="tab"><?php echo esc_attr(foodchow_set($bio, 'study_year')); ?></a>
                    </li>
                <?php $counter2++; endforeach; ?>
                 
            </ul>
        <?php endif; ?>
    </div>
</div>