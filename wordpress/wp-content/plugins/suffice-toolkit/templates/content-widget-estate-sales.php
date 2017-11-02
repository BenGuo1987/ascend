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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<?php

$terms = get_terms( 'portfolio_cat' );
if ( $filter && ! $categories ) {
	$terms = get_terms( 'portfolio_cat' );
	$count = count( $terms );
	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			// $output .= "<li><a data-filter='." . $term->slug . "'>" . $term->name . "</a></li>\n";
		}
	}
}

if ( '0' === $categories ) {
	$terms          = get_terms( 'portfolio_cat' );
	$included_terms = wp_list_pluck( $terms, 'term_id' );
} else {
	$included_terms = $categories;
}

$project_query = new WP_Query(
	array(
		'post_type'      => 'portfolio',
		'posts_per_page' => $number,
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

$cat_list = get_categories(array(
	"child_of" => get_category_root_id($categories),
	'taxonomy' => 'portfolio_cat',
	"hide_empty"=> 0,
	"title_li"=>'',
));

?>



<div class="service-container">

	<ul class="sub-cat-list">
		<?php foreach($cat_list as $key=>$category) {
			$active = '';
			if($categories == $category->term_id) {
				$active = 'active';
			}
			echo '<li><a href="/services?cat='. $category->term_id.'" class="nav-link '.$active .'">' . $category->name.'</a></li>';
		}?>
	</ul>
	<ul class="service-items row clearfix">
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
			<li class="service-item">
				<figure class="service-item-thumbnail">
					<div class="service-item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($id, $thumbnail_size ) ?>')"></div>
					<figcaption class="service-item-description">
						<div class="service-item-intro clearfix">
							<h5 class="service-item-title"><a href = "<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
							<p class="service-item-price"><?php echo get_post_meta( $id, '_product_price', true )?></p>
						</div>
						<p class="service-item-content"><?php echo esc_html( get_the_excerpt() );?></p>
						<div class="service-item-more"><a href = "<?php echo esc_url( get_the_permalink() ); ?>">READ MORE<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
					</figcaption>
				</figure>
			</li>
		<?php endwhile; wp_reset_postdata();?>
	</ul>
<?php
pagination_portfolio(array(
	'post_type'             => 'portfolio',
	'tax_query' => array(
		array(
			'taxonomy' => 'portfolio_cat',
			'field'    => 'id',
			'terms'    => $included_terms,
		),
	),
), $number);
?>
</div>
