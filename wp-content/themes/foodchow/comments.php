<?php
/**
 * Comments Main File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $options = foodchow_WSH()->option(); ?>
<div class="comments-wrapper" id="comments">
	<?php if ( have_comments() ) : ?>
		<?php if( $options->get( 'blog_comment_list_title' ) ) : ?>
		   <h4 class="single-title"><?php echo esc_html( $options->get( 'blog_comment_list_title' ) ); ?></h4>
		<?php endif;?>
		<h3 class="title4" itemprop="headline"><span class="sudo-bottom sudo-bg-red"><?php echo ( get_comment_pages_count() > 1  ) ? esc_html__( 'Comments', 'foodchow' ) : esc_html__( 'Comment', 'foodchow' ); ?></span></h3>
		<ul class="comments">
			<?php
			wp_list_comments( array(
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 74,
				'callback'    => 'foodchow_list_comments',
			) );
			?>
		</ul><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading">
					<?php esc_html_e( 'Comment navigation', 'foodchow' ); ?>
				</h1>
				<div class="nav-previous">
					<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'foodchow' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'foodchow' ) ); ?>
				</div>
			</nav><!-- .comment-navigation -->
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'foodchow' ); ?>
			</p>
		<?php endif; ?>

	<?php endif; ?>

	<?php foodchow_comment_form(); ?>
</div>