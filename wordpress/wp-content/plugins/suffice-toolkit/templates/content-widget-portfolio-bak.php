<?php
/**
 * The template for displaying portfolio widget.
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-portfolio.php.
 *
 * HOWEVER, on occasion SufficeToolkit will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     http://docs.themegrill.com/suffice-toolkit/template-structure/
 * @author  ThemeGrill
 * @package SufficeToolkit/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories    = isset( $instance['categories'] ) ? $instance['categories'] : '';
$number        = isset( $instance['number'] ) ? $instance['number'] : '';
$filter        = empty( $instance['filter'] ) ? 0 : 1;
$style         = isset( $instance['style'] ) ? $instance['style'] : 'portfolio-with-text';
$column        = isset( $instance['column'] ) ? $instance['column'] : '4';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if ( $filter && ! $categories ) {
	$terms = get_terms( 'portfolio_cat' );

	// Filter.
	$output .= '<nav class="portfolio-navigation portfolio-navigation-normal portfolio-navigation-center">';
	$output .= '<ul class="navigation-portfolio">';
	$output .= '<li class="active"><a data-filter="*">' . esc_html__( 'All', 'suffice-toolkit' ) . '</a></li>';
	$count = count( $terms );
	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$output .= "<li><a data-filter='." . $term->slug . "'>" . $term->name . "</a></li>\n";
		}
	}
	$output .= '</ul>';
	$output .= '</nav>';
}

if ( '0' === $categories ) {
	$terms          = get_terms( 'portfolio_cat' );
	$included_terms = wp_list_pluck( $terms, 'term_id' );
} else {
	$included_terms = $categories;
}

// Grid.
$output .= '<ul class="portfolio-items row ' . $style . '">';

$get_featured_posts = new WP_Query(
	array(
		'post_type'      => 'portfolio',
		'posts_per_page' => 3,
		'paged'=> $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio_cat',
				'field'    => 'id',
				'terms'    => $included_terms,
			),
		),
	)
);

?>


<div class="blog-post-container">
	<?php if ( 'post-style-carousel' === $style ) : ?>
	<div class="swiper-container">
		<div class="swiper-wrapper">

			<?php else : ?>
			<div class="row">
				<?php endif ?>
				<?php
				while ( $get_featured_posts->have_posts() ) : $get_featured_posts->the_post(); ?>
					<article class="post <?php echo esc_attr( $style . ' ' . ( 'post-style-carousel' === $style ? 'swiper-slide' : suffice_get_column_class( $column ) ) . '' ); ?>">
						<div class="article-inner">

							<!-- ====== Entry Thumbnail =====  -->
							<figure class="entry-thumbnail">
								<!--php the_post_thumbnail( $thumbnail_size ); -->
								<div class="news-item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url(null, $thumbnail_size ) ?>')"></div>
								<div class="entry-date">Posted on <?php echo get_the_date( 'M d, Y' ); ?></div>
							</figure>

							<?php if ( 'post-style-overlay' === $style || 'post-style-carousel' === $style ) : ?>
							<div class="overlay-inner">
								<?php endif ?>

								<!-- ====== Entry Header =====  -->
								<div class="entry-news-content">
									<header class="entry-header">
										<a href="<?php echo esc_url( get_the_permalink() ); ?>"><h1 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h1></a>
										<?php if ( 'post-style-grid' === $style ) : ?>
											<div class="entry-meta hidden">
						<span class="posted-by">
						<?php
						printf( esc_html_x( 'by %s', 'post author', 'suffice-toolkit' ),
							'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
						);
						?>
						</span>
												<?php
												if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
													echo '<span class="comments">';
													/* translators: %s: post title */
													comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'suffice-toolkit' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
													echo '</span>';
												}
												?>
											</div>
										<?php endif; ?>
									</header>  <!-- .entry-header -->

									<!-- ====== Entry Content =====  -->
									<div class="entry-content">
										<p>
											<?php
											// If post style is list, trim excerpt.
											if ( 'post-style-list' === $style || 'post-style-carousel' === $style ) {
												echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) );
											} else {
												echo esc_html( get_the_excerpt() );
											}
											?>
										</p>

										<?php if ( 'post-style-grid' === $style ) :  ?>
											<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><?php esc_html_e( 'Read More', 'suffice-toolkit' ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
										<?php endif ?>
									</div> <!-- entry-content -->
								</div>
								<!-- ====== Entry Meta =====  -->
								<?php if ( 'post-style-list' === $style || 'post-style-overlay' === $style ) : ?>
									<div class="entry-meta">
						<span class="posted-by">
						<?php
						printf( esc_html_x( 'by %s', 'post author', 'suffice-toolkit' ),
							'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
						);
						?>
						</span>
										<?php
										if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
											echo '<span class="comments">';
											/* translators: %s: post title */
											comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'suffice-toolkit' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
											echo '</span>';
										}
										?>
										<span class="read-more-meta">
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php esc_html_e( 'Read More', 'suffice-toolkit' ); ?></a>
						</span>
									</div>
								<?php endif; ?>

								<?php if ( 'post-style-carousel' === $style ) : ?>
									<div class="entry-meta">
						<span class="posted-on">
							<?php echo get_the_date( 'M d Y' ); ?>
						</span>
									</div>
								<?php endif ?>
								<?php if ( 'post-style-overlay' === $style || 'post-style-carousel' === $style ) : ?>
								<div> <!-- .overlay-inner -->
									<?php endif ?>
								</div>  <!-- .article-inner -->
					</article> <!-- end post-style-* -->
					<?php
				endwhile;
				wp_reset_postdata();
				?>
				<?php if ( 'post-style-carousel' === $style ) : ?>
			</div> <!-- .swiper-wrapper -->
			<div class="post-carousel-controls">
				<span class="prev"><i class="fa fa-angle-left"></i></span>
				<span class="next"><i class="fa fa-angle-right"></i></span>
			</div>
		</div> <!-- .swiper-container -->
		<?php else : ?>
	</div> <!-- row -->

<?php
pagination(wp_parse_args (array(
	'post_type'             => 'portfolio',
	'tax_query' => array(
		array(
			'taxonomy' => 'portfolio_cat',
			'field'    => 'id',
			'terms'    => $included_terms,
		),
	),
)), 3);
?>
<?php endif ?>
</div>
