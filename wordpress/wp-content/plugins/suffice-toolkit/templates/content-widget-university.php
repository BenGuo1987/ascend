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
	$terms = get_terms( 'school_category' );
	$count = count( $terms );
	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
			$output .= "<li><a data-filter='." . $term->slug . "'>" . $term->name . "</a></li>\n";
		}
	}
}

if ( '0' === $categories ) {
	$terms          = get_terms( 'school_category' );
	$included_terms = wp_list_pluck( $terms, 'term_id' );
} else {
	$included_terms = $categories;
}

$project_query = new WP_Query(
	array(
		'post_type'      => 'school',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'school_category',
				'field'    => 'id',
				'terms'    => $included_terms,
			),
		),
	)
);
$cat_slugs = array(
	"university","high-school"
);
$current_parent_termId = get_category_root_id($categories);
$university_cat = get_category_by_slug_taxonomy('university', 'school_category');
$high_school_cat = get_category_by_slug_taxonomy('high-school', 'school_category');
$sub_university_list = get_categories(array(
	"child_of" => $university_cat->term_id,
	'taxonomy' => 'school_category',
	"hide_empty"=> 0,
	"title_li"=>'',
));
$sub_high_school_list = get_categories(array(
	"child_of" => $high_school_cat->term_id,
	'taxonomy' => 'school_category',
	"hide_empty"=> 0,
	"title_li"=>'',
));
?>

<div class="common-section">
	<div class="top-section">
		<div class="top-section-text">School</div>
	</div>
</div>
<div class="ascend-content-wrapper">
	<div class="ascend-content">
		<div class="school-nav">
			<ul class="cat-list">
				<?php foreach($cat_slugs as $key=>$cat_slug) {
					$active = '';
					if($key == 0) {
						$active = 'active';
					}
					$parent_cat = get_category_by_slug_taxonomy($cat_slug, 'school_category');
					echo '<li class="'.$active.'" data-slug="'.$cat_slug.'">' . $parent_cat->name.'</li>';
				}?>
			</ul>
			<ul class="sub-cat-list university">
				<?php foreach($sub_university_list as $key=>$category) {
					echo '<li data-slug="'.$category->slug.'">' . $category->name.'</li>';
				}?>
			</ul>
			<ul class="sub-cat-list high-school hidden">
				<?php foreach($sub_high_school_list as $key=>$category) {
					echo '<li data-slug="'.$category->slug.'">' . $category->name.'</li>';
				}?>
			</ul>
		</div>
		<div class="school-container">
			<ul class="school-items row  <?php echo $style ?> ">
				<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
					<?php
					global $post;
					$id          = $post->ID;
					$image_per = get_the_post_thumbnail_url(null, $thumbnail_size );
					$terms_array  = get_the_terms( $id, 'school_category' );
					$term_string = '';

					if ( $terms_array ) {
						foreach ( $terms_array as $term ) {
							$term_string .= $term->slug . ' ';
						}
					}
					?>
					<li class="school-item <?php echo suffice_get_column_class( $column )?> <?php echo $term_string?>" data-category="<?php echo $term_string?>">
						<figure class="school-item-thumbnail">
							<div class="school-item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($id, $thumbnail_size ) ?>')"></div>
							<figcaption class="school-item-description">
								<h5 class="school-item-title"><?php echo esc_html( get_the_title() ); ?></h5>
								<p class="service-item-content"><?php echo esc_html( the_content() );?></p>
							</figcaption>
						</figure>
					</li>
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
	</div>
</div>
