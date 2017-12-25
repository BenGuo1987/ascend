<?php
/**
 * The template for displaying feature widget.
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-feature.php.
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
$style         = isset( $instance['style'] ) ? $instance['style'] : 'feature-with-text';
$column        = isset( $instance['column'] ) ? $instance['column'] : '4';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<?php
$included_terms = $categories;
$project_query = new WP_Query(
	array(
		'post_type'      => 'feature',
		'posts_per_page' => $number,
		'tax_query' => array(
			array(
				'taxonomy' => 'feature_category',
				'field'    => 'id',
				'terms'    => $included_terms,
			),
		),
	)
);?>

<div class="feature-container">
	<div class="feature-title">
		<div class="feature-title-text"><?php echo get_cat_name($categories) ?></div>
		<div class="feature-title-line"></div>
	</div>
	<ul class="feature-hot-items row  <?php echo $style ?> ">
		<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
			<?php
				global $post;
				$id = $post->ID;
			?>
			<li class="feature-hot-item">
				<figure class="feature-hot-item-thumbnail">
					<figcaption class="feature-hot-item-description">
						<h5 class="feature-hot-item-title"><a href = "<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
						<?php if(get_post_meta( $id, '_feature_huxing', true )!==''){
							echo "<p class=\"feature-hot-item-huxing\">" .get_post_meta( $id, '_feature_huxing', true ). "</p>";
						} ?>
						<?php if(get_post_meta( $id, '_feature_price', true )!==''){
							echo "<p class=\"feature-hot-item-price\">". __('Price', 'default')."：" .get_post_meta( $id, '_feature_price', true ). "</p>";
						} else {
							echo "<p class=\"feature-hot-item-price\">询价请联系我们</p>";
						}?>

					</figcaption>
				</figure>
			</li>
		<?php endwhile; wp_reset_postdata();?>
	</ul>
<?php
//pagination_portfolio(array(
//	'post_type'             => 'feature',
//	'tax_query' => array(
//		array(
//			'taxonomy' => 'feature_category',
//			'field'    => 'id',
//			'terms'    => $included_terms,
//		),
//	),
//), $number);
//?>
</div>
