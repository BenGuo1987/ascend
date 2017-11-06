<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?>


<?php
	$sectionClass = '';
    $nav = '';
	if ( 'post' === get_post_type() ) {
		$sectionClass = 'news-section';
		$nav = 'NEWS';
	} elseif('service' === get_post_type() ) {
		$nav = 'SERVICES';
	}  elseif('portfolio' === get_post_type() ) {
		$nav = 'PROJECT';
	}
?>
<div class="common-section <?php echo $sectionClass ?>">
	<div class="top-section">
		<div class="top-section-text"><?php echo $nav ?></div>
	</div>
</div>
<div class="ascend-content-wrapper">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * suffice_before_post_content hook
	 */
	do_action( 'suffice_before_post_content' ); ?>

	<header class="entry-header">
		<?php
		// if is single content page.
		// Show title downwards if selected below.
		get_template_part( 'template-parts/content-parts/entry', 'title' );
		?>

		<div class="entry-meta">
			<?php suffice_posted_on();?>
		</div><!-- .entry-meta -->

		<?php
		// If featured is enabled, show featured image.
		get_template_part( 'template-parts/content-parts/entry', 'thumbnail' );
		?>


	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( ! is_single() && 'post-style-grid' === suffice_get_option( 'suffice_blog_post_style', 'post-style-classic' ) ) {
			the_excerpt();
		} else {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'suffice' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'suffice' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php suffice_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
	/**
	 * suffice_after_post_content hook
	 */
	do_action( 'suffice_after_post_content' ); ?>

</article><!-- #post-## -->
</div>
