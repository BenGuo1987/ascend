<?php
/**
 * SufficeToolkit Portfolio Functions
 *
 * Functions for portfolio specific things.
 *
 * @author   ThemeGrill
 * @category Core
 * @package  SufficeToolkit/Functions
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter to allow portfolio_cat in the permalinks for portfolio.
 *
 * @param  string  $permalink The existing permalink URL.
 * @param  WP_Post $post
 * @return string
 */
function suffice_portfolio_post_type_link( $permalink, $post ) {
	// Abort if post is not a portfolio.
	if ( $post->post_type !== 'portfolio' ) {
		return $permalink;
	}

	// Abort early if the placeholder rewrite tag isn't in the generated URL.
	if ( false === strpos( $permalink, '%' ) ) {
		return $permalink;
	}

	// Get the custom taxonomy terms in use by this post.
	$terms = get_the_terms( $post->ID, 'portfolio_cat' );

	if ( ! empty( $terms ) ) {
		usort( $terms, '_usort_terms_by_ID' ); // order by ID.

		$category_object = apply_filters( 'suffice_toolkit_portfolio_post_type_link_portfolio_cat', $terms[0], $terms, $post );
		$category_object = get_term( $category_object, 'portfolio_cat' );
		$portfolio_cat   = $category_object->slug;

		if ( $category_object->parent ) {
			$ancestors = get_ancestors( $category_object->term_id, 'portfolio_cat' );
			foreach ( $ancestors as $ancestor ) {
				$ancestor_object = get_term( $ancestor, 'portfolio_cat' );
				$portfolio_cat   = $ancestor_object->slug . '/' . $portfolio_cat;
			}
		}
	} else {
		// If no terms are assigned to this post, use a string instead (can't leave the placeholder there)
		$portfolio_cat = _x( 'uncategorized', 'slug', 'suffice-toolkit' );
	}

	$find = array(
		'%year%',
		'%monthnum%',
		'%day%',
		'%hour%',
		'%minute%',
		'%second%',
		'%post_id%',
		'%category%',
		'%portfolio_cat%'
	);

	$replace = array(
		date_i18n( 'Y', strtotime( $post->post_date ) ),
		date_i18n( 'm', strtotime( $post->post_date ) ),
		date_i18n( 'd', strtotime( $post->post_date ) ),
		date_i18n( 'H', strtotime( $post->post_date ) ),
		date_i18n( 'i', strtotime( $post->post_date ) ),
		date_i18n( 's', strtotime( $post->post_date ) ),
		$post->ID,
		$portfolio_cat,
		$portfolio_cat
	);

	$permalink = str_replace( $find, $replace, $permalink );

	return $permalink;
}
add_filter( 'post_type_link', 'suffice_portfolio_post_type_link', 10, 2 );

/**
 * add Price for Portfolio And Service
 */
add_action( 'add_meta_boxes', 'product_price' );
function product_price() {
	$priceText = __('Price', 'default');
	add_meta_box(
		'product_price',
		$priceText,
		'price_meta_box',
		'portfolio',
		'side',
		'low'
	);
}


function price_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'price_meta_box', 'price_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_product_price', true );

	?>

	<input type="text" id="product_price" name="product_price" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Price', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'price_save_meta_box' );
function price_save_meta_box($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['price_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['price_meta_box_nonce'], 'price_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['product_price'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['product_price'] );
	update_post_meta( $post_id, '_product_price', $product_price );

}

add_action("manage_posts_custom_column",  "portfolio_custom_columns");
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
function portfolio_custom_columns($column){
	global $post;
	switch ($column) {
		case "product_price":
			echo get_post_meta( $post->ID, '_product_price', true );
			break;
	}
}
function portfolio_edit_columns($columns){
	$priceText = __('Price', 'default');
	$columns['product_price'] = $priceText;
	return $columns;
}

/** price for service **/
add_action( 'add_meta_boxes', 'service_price' );
function service_price() {
	$priceText = __('Price', 'default');
	add_meta_box(
		'service_price',
		$priceText,
		'service_price_meta_box',
		'service',
		'side',
		'low'
	);
}

function service_price_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'service_price_meta_box', 'service_price_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_service_price', true );

	?>

	<input type="text" id="service_price" name="service_price" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Price', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'price_save_meta_box_service' );
function price_save_meta_box_service($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['service_price_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['service_price_meta_box_nonce'], 'service_price_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['service_price'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['service_price'] );
	update_post_meta( $post_id, '_service_price', $product_price );

}

add_action("manage_posts_custom_column",  "service_custom_columns");
add_filter("manage_edit-service_columns", "service_edit_columns");
function service_custom_columns($column){
	global $post;
	switch ($column) {
		case "service_price":
			echo get_post_meta( $post->ID, '_service_price', true );
			break;
	}
}
function service_edit_columns($columns){
	$priceText = __('Price', 'default');
	$columns['service_price'] = $priceText;
	return $columns;
}
