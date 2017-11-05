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
?>
<?php

if ( $filter && ! $categories ) {
	$terms = get_terms( 'immigration_category' );
	$count = count( $terms );
	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$output .= "<li><a data-filter='." . $term->slug . "'>" . $term->name . "</a></li>\n";
		}
	}
}

if ( '0' === $categories ) {
	$terms          = get_terms( 'immigration_category' );
	$included_terms = wp_list_pluck( $terms, 'term_id' );
} else {
	$included_terms = $categories;
}

$project_query = new WP_Query(
	array(
		'post_type'      => 'immigration',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'immigration_category',
				'field'    => 'id',
				'terms'    => $included_terms,
			),
		),
	)
);?>

<div class="common-section">
	<div class="top-section">
		<div class="top-section-text">Policy</div>
	</div>
</div>
<div class="immigration-container">
	<div class="immigration-header"><span><?php echo __('Immigration Policy', 'default')?></span></div>
	<ul class="immigration-items row  <?php echo $style ?> ">
		<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
			<li class="immigration-item <?php echo suffice_get_column_class( $column )?>">
				<figure class="immigration-item-thumbnail">
					<figcaption class="immigration-item-description">
						<div class="immigration-item-title"><h5><?php echo esc_html( get_the_title() ); ?></h5></div>
						<div class="immigration-item-content"><?php echo get_the_content();?></div>
					</figcaption>
				</figure>
			</li>
		<?php endwhile; wp_reset_postdata();?>
	</ul>
</div>
