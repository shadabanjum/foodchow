<?php 
    /**
     * Single Post tags File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

    ?>
    <div class="tags-area">

       <?php $tags = wp_get_post_tags(get_the_ID());
       $get_tags   = get_the_tag_list(get_the_ID());  
       ?>

       <?php if(!empty($tags) &&   $options->get( 'show_single_tag' ) ) :?>

        <span><i class="fa fa-tags"></i><?php esc_html_e( 'tags:' , 'foodchow' ); ?></span>

        <ul>

         <?php foreach($tags as $tag) : ?>

            <li><a href="<?php echo esc_url(get_tag_link(foodchow_set($tag, 'term_id'))); ?>"><?php echo esc_html(foodchow_set($tag, 'name')); ?></a></li>

        <?php endforeach; ?>
        
    </ul>

<?php endif; ?>

<?php if(  $options->get( 'show_single_cat' ) ) : ?>

    <div class="cat-area">

        <span><i class="fa fa-list-alt"></i><?php esc_html_e( 'categories:' , 'foodchow' ); ?></span>

        <ul>

         <li><?php wp_kses( the_category( ' , ' ), true ); ?></li>

     </ul>

 </div>

<?php endif; ?>

</div>