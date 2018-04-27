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
?>
<?php

if ( $filter && ! $categories ) {
	$terms = get_terms( 'staff_category' );
	$count = count( $terms );
}

if ( '0' === $categories ) {
	$terms          = get_terms( 'staff_category' );
	$included_terms = wp_list_pluck( $terms, 'term_id' );
} else {
	$included_terms = $categories;
}

$project_query = new WP_Query(
	array(
		'post_type'      => 'staff',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'staff_category',
				'field'    => 'id',
				'terms'    => $included_terms,
			),
		),
	)
);

?>
<div class="<?php echo __('staff-wrapper-out', 'default') ?>">
	<div class="staff-wrapper">
		<h3><?php echo __('Our Team', 'default') ?></h3>
		<ul class="staff-items row clearfix">
			<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
				<?php
					global $post;
					$id = $post->ID;
				?>
				<li class="staff-item">
					<figure class="staff-item-thumbnail clearfix">
						<div class="staff-item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($id, $thumbnail_size ) ?>')"></div>
						<figcaption class="staff-item-description">
							<h5 class="staff-title"><?php echo esc_html( get_the_title() ); ?></h5>
							<p class="staff-position"><?php echo get_post_meta( $id, '_staff_position', true ); ?></p>
							<p class="staff-email"><a href="mailto:<?php echo get_post_meta( $id, '_staff_email', true ); ?>"><?php echo get_post_meta( $id, '_staff_email', true ); ?></a></p>
						</figcaption>
					</figure>
				</li>
			<?php endwhile; wp_reset_postdata();?>
		</ul>
	</div>
</div>
