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
$city =  $_GET['city'] ? $_GET['city'] : '';
$keywords =  $_GET['keywords'] ? $_GET['keywords'] : '';

?>
<?php
$included_terms = $categories;
$queryArray = array(
	'post_type'      => 'feature',
	'posts_per_page' => $number,
	'paged'=> $paged,
	's' => $keywords,
	'tax_query' => array(
		array(
			'taxonomy' => 'feature_category',
			'field'    => 'id',
			'terms'    => $included_terms,
		),
	),
);

$queryCityArray = array();
if(!empty($city)) {
	$queryCityArray = array(
		'meta_key' => '_feature_city', //(字符串) - 自定义字段的键
		'meta_value' => $city, //(字符串) - 自定义字段的值
	);
}
$project_query = new WP_Query(array_merge($queryArray,$queryCityArray));?>

<div class="feature-container">
	<div class="feature-title">
		<div class="feature-title-text">
			<span><?php echo get_cat_name($categories) ?></span>

			<div class="feature-search-city">
				<span class="search-value" data-city="<?php echo $city ?>">
					<?php
						if(empty($city)) {
							echo __('All Cities', 'default');
						} else {
							echo __($city, 'default');
						}

					?>
				</span>
				<ul class="search-city-list">
					<li data-city=""><?php echo __('All Cities', 'default') ?></li>
					<li data-city="Melbourne"><?php echo __('Melbourne', 'default') ?></li>
					<li data-city="Sydney"><?php echo __('Sydney', 'default') ?></li>
					<li data-city="Brisbane"><?php echo __('Brisbane', 'default') ?></li>
					<li data-city="New Zealand"><?php echo __('New Zealand', 'default') ?></li>
				</ul>
			</div>
			<input type="text"  class="feature-search-text" placeholder="<?php echo __('Input key words', 'default') ?>" value="<?php echo $keywords ?>"/>
		</div>
		<div class="feature-title-line"></div>
	</div>
	<ul class="feature-items row  <?php echo $style ?> ">
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
			<li class="feature-item <?php echo suffice_get_column_class( $column )?> <?php echo $term_string?>" data-category="<?php echo $term_string?>">
				<figure class="feature-item-thumbnail">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="feature-item-img-warpper"><div class="feature-item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($id, $thumbnail_size ) ?>')"></div></a>
					<figcaption class="feature-item-description">
						<h5 class="feature-item-title"><a href = "<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
						<?php if(get_post_meta( $id, '_feature_huxing', true )!==''){
							echo "<p class=\"feature-hot-item-huxing\">" .get_post_meta( $id, '_feature_huxing', true ). "</p>";
						} ?>
						<?php if(get_post_meta( $id, '_feature_price', true )!==''){
							echo "<p class=\"feature-hot-item-price\">". __('Address', 'default')."：" .get_post_meta( $id, '_feature_address', true ). "</p>";
						}?>
						<?php if(get_the_excerpt()!==''){
							echo "<p class='feature-item-desc'>".esc_html( get_the_excerpt() )."</p>";	
						}?>

						<div class="feature-item-more"><a href = "<?php echo esc_url( get_the_permalink() ); ?>"><?php echo __('READ MORE', 'default') ?></a></div>
					</figcaption>
				</figure>
			</li>
		<?php endwhile; wp_reset_postdata();?>
	</ul>
<?php
$pageArray = array(
	'post_type'             => 'feature',
	's' => $keywords,
	'tax_query' => array(
		array(
			'taxonomy' => 'feature_category',
			'field'    => 'id',
			'terms'    => $included_terms,
		),
	),
);
pagination_portfolio(array_merge($pageArray,$queryCityArray), $number);
?>
</div>
