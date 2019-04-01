<?php 
/**
 * Single Post author box File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

?>

<?php if ( class_exists( 'Foodchow_Resizer' ) ) {
  $img_obj = new Foodchow_Resizer();
}
?>
<div class="author-info-wrapper">
  <h3 class="title4" itemprop="headline"><?php echo esc_html( $options->get( 'blog_author_title' ) ) ? esc_html( $options->get( 'blog_author_title' ) ) : esc_html_e( 'About Author', 'foodchow' ); ?></h3>
  <div class="author-box">
    <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
    <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_the_author_meta( 'photo' ), 'full' ), 100, 100, true ) ); ?>
  <?php else : ?>
    <?php echo get_avatar(get_the_author_meta('ID'), 100); ?> 
 <?php endif; ?>
 <div class="author-info">
  <h4 itemprop="headline"><?php echo esc_html(get_the_author_meta('display_name')); ?></h4>
  <p itemprop="description"><?php echo wp_strip_all_tags( get_the_author_meta( 'description' ) ); ?></p>
  <a class="red-clr" href="<?php echo esc_url( get_the_author_meta( 'url' ) ); ?>" title="Webinane" itemprop="url" target="_blank"><?php echo  get_the_author_meta( 'url' ); ?></a>
</div>
</div>
</div>

