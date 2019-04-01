<?php 
    /**
     * Single Post meta File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

    ?> 
    <div class="blog-detail-info">
     <?php if(  $options->get( 'single_date' ) ) : ?>

        <span class="post-detail-date red-clr"><i class="fa fa-clock-o"></i> <a href="<?php echo get_day_link( get_the_time( 'M' ), get_the_time( 'd' ), get_the_time( 'Y' ) ); ?>"></a></span>

    <?php endif; ?>
    <div class="post-meta">
        <?php if(  $options->get( 'single_views' ) ) : ?>
            <span><i class="fa fa-eye red-clr"></i> 95 Views</span>
        <?php endif; ?>
        <?php if(  $options->get( 'single_comments' ) ) : ?>
            <span><i class="fa fa-comment-o red-clr"></i> <?php comments_number( '0', '1', '%' ); ?> <?php echo ( get_comment_pages_count() > 1 ) ? esc_html__( 'Comments', 'foodchow' ) : esc_html__( 'Comment', 'foodchow' ); ?></span>
        <?php endif; ?>
    </div>
</div>

<h1 itemprop="headline"><?php the_title(); ?></h1>
<?php the_content(); ?>  
<?php if( has_tag( ) ) : ?>                                   
    <div class="post-tags red-clr">
        <span><?php esc_html_e( 'Tags:', 'foodchow' ); ?></span>
        <?php the_tags(); ?>
    </div>
<?php endif; ?>
<?php if( has_category( ) ) : ?>
    <div class="post-cate red-clr">
        <span><?php esc_html_e( 'Category:', 'foodchow' ); ?></span>
        <?php the_category(); ?>
    </div>
<?php endif; ?>
<div class="post-share">
    <span>Share:</span>
    
    <?php foreach ($social as $k => $v) {

        if($v == '') continue;  ?>

        <?php echo  foodchow_social_share_output( $k );  ?>

        <?php } ?>



    </div>
    <div class="post-next-prev">
        <a class="prev-post" href="#" title="Previous Post" itemprop="url"><i class="fa fa-angle-left"></i> PREV</a> -
        <a class="next-post" href="#" title="Next Post" itemprop="url">NEXT <i class="fa fa-angle-right"></i></a>
    </div>