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

$categories    = (get_query_var('cat')) ? get_query_var('cat') : (isset( $instance['categories'] ) ? $instance['categories'] : '');
$number        = isset( $instance['number'] ) ? $instance['number'] : '';
$filter        = empty( $instance['filter'] ) ? 0 : 1;
$style         = isset( $instance['style'] ) ? $instance['style'] : 'portfolio-with-text';
$column        = isset( $instance['column'] ) ? $instance['column'] : '4';
?>
<?php
$terms = get_terms( 'service_category' );
if ( '0' === $categories ) {
	$terms          = get_terms( 'service_category' );
	$included_terms = wp_list_pluck( $terms, 'term_id' );
} else {
	$included_terms = $categories;
}

$project_query = new WP_Query(
	array(
		'post_type'      => 'service',
		'posts_per_page' => $number,
		'paged'=> $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'service_category',
				'field'    => 'id',
				'terms'    => $included_terms,
			),
		),
	)
);
?>


<div class="portfolio-container">
	<ul class="portfolio-items row  <?php echo $style ?> ">
		<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
			<?php
			global $post;
			$id          = $post->ID;
			$image_per = get_the_post_thumbnail_url(null, $thumbnail_size );
			$terms_array  = get_the_terms( $id, 'portfolio_cat' );
			$term_string = '';

			if ( $terms_array ) {
				foreach ( $terms_array as $term ) {
					$term_string .= $term->slug . ' ';
				}
			}
			?>
			<li class="portfolio-item <?php echo suffice_get_column_class( $column )?> <?php echo $term_string?>" data-category="<?php echo $term_string?>">
				<figure class="portfolio-item-thumbnail">
					<a href="#" ><div class="portfolio-item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($id, $thumbnail_size ) ?>')"></div></a>
					<figcaption class="portfolio-item-description">
						<p class="portfolio-item-price"><?php echo get_post_meta( $id, '_service_price', true )?></p>
						<h5 class="portfolio-item-title"><a href = "<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
						<div class="portfolio-item-more"><a href = "<?php echo esc_url( get_the_permalink() ); ?>">READ MORE<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
					</figcaption>
				</figure>
			</li>
		<?php endwhile; wp_reset_postdata();?>
	</ul>
</div>
