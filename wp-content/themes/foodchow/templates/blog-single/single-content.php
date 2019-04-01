<?php
    /**
     * Single Post Content Template
     *
     * @package WordPress
     * @subpackage Foodchow
     * @author Webinane
     * @version 1.0
     */
?>
<div class="single-meta">

  	<?php if(  $options->get( 'single_date' ) ) : ?>

     	<span class="post-date"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'F j,Y' ); ?></a></span>
   
   <?php endif; ?>
    
    <ul class="likes">
       	
       	<?php if(  $options->get( 'single_likes' ) ) : ?>

            <li>
            
                <?php foodchow_template_load( 'templates/like.php' , compact( 'data') ); ?>

            </li>
       
       <?php endif; ?>
        
        <?php if(  $options->get( 'single_comments' )  ) :  ?>
           
           <li><a href="#comments"><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></a></li>
        
        <?php endif; ?>
   
    </ul>
  	
  	<?php if( $options->get( 'show_single_sharing' ) && $social ) : ?>
        
        <ul class="social-media">
            
            <?php foreach ($social as $k => $v) {
                
                if($v == '') continue;  ?>
                    
                    <?php echo  foodchow_social_share_output( $k );  ?>
                
                <?php } ?>
            
            <?php endif; ?>
        
        </ul>
        <?php $title = get_the_title();  ?>
        <?php if( $title ) : ?>
            <h1 class="single-meta-title"><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php  the_content(); ?>
		
		<div class="tags-area">
            
            <?php $tags = wp_get_post_tags(get_the_ID());  ?>
            
            <?php if(!empty($tags) &&   $options->get( 'show_single_tag' ) ) :?>
               
               <span><i class="fa fa-tags"></i><?php esc_html_e( 'tags:', 'foodchow'); ?></span>
               
                <ul>
                    <?php foreach($tags as $tag) : ?>
                        
                        <li><a href="<?php echo esc_url(get_tag_link(foodchow_set($tag, 'term_id'))); ?>"><?php echo esc_html(foodchow_set($tag, 'name')); ?></a></li>
                    
                    <?php endforeach; ?>
               
                </ul>
            
            <?php endif; ?>
            
            <?php if(  $options->get( 'show_single_cat' ) ) : ?>
                
                <div class="cat-area">
                    
                    <span><i class="fa fa-list-alt"></i>categories:</span>
                    
                    <ul>
                        
                        <li><?php wp_kses( the_category( ' , ' ), true ); ?></li>
                    
                    </ul>
                
                </div>
             
             <?php endif; ?>
    </div>

	 <?php foodchow_template_load( 'templates/blog-single/author.php' , compact( 'options' ) ); ?>

    <?php comments_template() ?>
                                 
</div>