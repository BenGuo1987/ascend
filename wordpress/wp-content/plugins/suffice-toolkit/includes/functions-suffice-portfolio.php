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
		'normal',
		'low'
	);
}


function price_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'price_meta_box', 'price_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_product_price', true );

	?>

	<input type="text" style="width: 100%;" id="product_price" name="product_price" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Price', 'default'); ?>" >

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

	<input type="text" style="width: 100%;" id="service_price" name="service_price" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Price', 'default'); ?>" >

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

/** price for Feature **/
add_action( 'add_meta_boxes', 'feature_price' );
function feature_price() {
	$priceText = __('Price', 'default');
	add_meta_box(
		'feature_price',
		$priceText,
		'feature_price_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_price_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_price_meta_box', 'feature_price_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_price', true );

	?>

	<input type="text" style="width: 100%;" id="feature_price" name="feature_price" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Price', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'price_save_meta_box_feature' );
function price_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_price_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_price_meta_box_nonce'], 'feature_price_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_price'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_price'] );
	update_post_meta( $post_id, '_feature_price', $product_price );

}

/** price for service **/
add_action( 'add_meta_boxes', 'feature_address' );
function feature_address() {
	$priceText = __('Address', 'default');
	add_meta_box(
		'feature_address',
		$priceText,
		'feature_address_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_address_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_address_meta_box', 'feature_address_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_address', true );

	?>

	<input type="text" style="width: 100%;" id="feature_address" name="feature_address" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Address', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'address_save_meta_box_feature' );
function address_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_address_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_address_meta_box_nonce'], 'feature_address_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_address'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_address'] );
	update_post_meta( $post_id, '_feature_address', $product_price );

}

/** price for Developer **/
add_action( 'add_meta_boxes', 'feature_dev' );
function feature_dev() {
	$priceText = __('Developer', 'default');
	add_meta_box(
		'feature_dev',
		$priceText,
		'feature_dev_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_dev_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_dev_meta_box', 'feature_dev_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_dev', true );

	?>

	<input type="text" style="width: 100%;" id="feature_dev" name="feature_dev" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Developer', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'dev_save_meta_box_feature' );
function dev_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_dev_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_dev_meta_box_nonce'], 'feature_dev_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_dev'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_dev'] );
	update_post_meta( $post_id, '_feature_dev', $product_price );

}


/** price for Developer **/
add_action( 'add_meta_boxes', 'feature_designer' );
function feature_designer() {
	$priceText = __('Designer', 'default');
	add_meta_box(
		'feature_designer',
		$priceText,
		'feature_designer_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_designer_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_designer_meta_box', 'feature_designer_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_designer', true );

	?>

	<input type="text" style="width: 100%;" id="feature_designer" name="feature_designer" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Designer', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'des_save_meta_box_feature' );
function des_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_designer_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_designer_meta_box_nonce'], 'feature_designer_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_designer'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_designer'] );
	update_post_meta( $post_id, '_feature_designer', $product_price );

}

/** price for Floor **/
add_action( 'add_meta_boxes', 'feature_floor' );
function feature_floor() {
	$priceText = __('Floor', 'default');
	add_meta_box(
		'feature_floor',
		$priceText,
		'feature_floor_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_floor_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_floor_meta_box', 'feature_floor_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_floor', true );

	?>

	<input type="text" style="width: 100%;" id="feature_floor" name="feature_floor" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Floor', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'floor_save_meta_box_feature' );
function floor_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_floor_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_floor_meta_box_nonce'], 'feature_floor_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_floor'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_floor'] );
	update_post_meta( $post_id, '_feature_floor', $product_price );

}

/** price for Dwellings **/
add_action( 'add_meta_boxes', 'feature_dwellings' );
function feature_dwellings() {
	$priceText = __('Number of dwellings', 'default');
	add_meta_box(
		'feature_dwellings',
		$priceText,
		'feature_dwellings_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_dwellings_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_dwellings_meta_box', 'feature_dwellings_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_dwellings', true );

	?>

	<input type="text" style="width: 100%;" id="feature_dwellings" name="feature_dwellings" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Number of dwellings', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'dwellings_save_meta_box_feature' );
function dwellings_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_dwellings_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_dwellings_meta_box_nonce'], 'feature_dwellings_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_dwellings'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_dwellings'] );
	update_post_meta( $post_id, '_feature_dwellings', $product_price );

}

/** price for Room Type **/
add_action( 'add_meta_boxes', 'feature_roomType' );
function feature_roomType() {
	$priceText = __('Room Type', 'default');
	add_meta_box(
		'feature_roomType',
		$priceText,
		'feature_roomType_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_roomType_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_roomType_meta_box', 'feature_roomType_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_roomType', true );

	?>

	<select id="feature_roomType" name="feature_roomType" value="<?php echo esc_attr( $value ); ?>">
		<option <?php if($value==='Apartment'){ echo 'selected';}?> value="Apartment"><?php echo __('Apartment', 'default') ?></option>
		<option <?php if($value==='Townhouse'){ echo 'selected';}?> value="Townhouse"><?php echo __('Townhouse', 'default') ?></option>
		<option <?php if($value==='Single-family villa'){ echo 'selected';}?> value="Single-family villa"><?php echo __('Single-family villa', 'default') ?></option>
	</select>

	<?php
}

add_action( 'save_post', 'roomType_save_meta_box_feature' );
function roomType_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_roomType_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_roomType_meta_box_nonce'], 'feature_roomType_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_roomType'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_roomType'] );
	update_post_meta( $post_id, '_feature_roomType', $product_price );

}

/** price for City **/
add_action( 'add_meta_boxes', 'feature_city' );
function feature_city() {
	$priceText = __('City', 'default');
	add_meta_box(
		'feature_city',
		$priceText,
		'feature_city_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_city_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_city_meta_box', 'feature_city_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_city', true );

	?>

	<select id="feature_city" name="feature_city" value="<?php echo esc_attr( $value ); ?>">
		<option <?php if($value==='Melbourne'){ echo 'selected';}?> value="Melbourne"><?php echo __('Melbourne', 'default') ?></option>
		<option <?php if($value==='Sydney'){ echo 'selected';}?> value="Sydney"><?php echo __('Sydney', 'default') ?></option>
		<option <?php if($value==='Brisbane'){ echo 'selected';}?> value="Brisbane"><?php echo __('Brisbane', 'default') ?></option>
		<option <?php if($value==='New Zealand'){ echo 'selected';}?> value="New Zealand"><?php echo __('New Zealand', 'default') ?></option>
	</select>

	<?php
}

add_action( 'save_post', 'city_save_meta_box_feature' );
function city_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_city_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_city_meta_box_nonce'], 'feature_city_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_city'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_city'] );
	update_post_meta( $post_id, '_feature_city', $product_price );

}

/** price for Huxing **/
add_action( 'add_meta_boxes', 'feature_huxing' );
function feature_huxing() {
	$priceText = __('Huxing', 'default');
	add_meta_box(
		'feature_huxing',
		$priceText,
		'feature_huxing_meta_box',
		'feature',
		'side',
		'low'
	);
}

function feature_huxing_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'feature_huxing_meta_box', 'feature_huxing_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_feature_huxing', true );

	?>

	<input type="text" style="width: 100%;" id="feature_huxing" name="feature_huxing" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Huxing', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'huxing_save_meta_box_feature' );
function huxing_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['feature_huxing_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['feature_huxing_meta_box_nonce'], 'feature_huxing_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['feature_huxing'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['feature_huxing'] );
	update_post_meta( $post_id, '_feature_huxing', $product_price );

}

/** position for staff **/
add_action( 'add_meta_boxes', 'staff_position' );
function staff_position() {
	$priceText = __('Position', 'default');
	add_meta_box(
		'staff_position',
		$priceText,
		'staff_position_meta_box',
		'staff',
		'side',
		'low'
	);
}

function staff_position_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'staff_position_meta_box', 'staff_position_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_staff_position', true );

	?>

	<input type="text" style="width: 100%;" id="staff_position" name="staff_position" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Position', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'position_save_meta_box_feature' );
function position_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['staff_position_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['staff_position_meta_box_nonce'], 'staff_position_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['staff_position'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['staff_position'] );
	update_post_meta( $post_id, '_staff_position', $product_price );

}

/** email for staff **/
add_action( 'add_meta_boxes', 'staff_email' );
function staff_email() {
	$priceText = __('Email', 'default');
	add_meta_box(
		'staff_email',
		$priceText,
		'staff_email_meta_box',
		'staff',
		'side',
		'low'
	);
}

function staff_email_meta_box($post) {

	// 创建临时隐藏表单，为了安全
	wp_nonce_field( 'staff_email_meta_box', 'staff_email_meta_box_nonce' );
	// 获取之前存储的值
	$value = get_post_meta( $post->ID, '_staff_email', true );

	?>

	<input type="text" style="width: 100%;" id="staff_email" name="staff_email" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo __('Email', 'default'); ?>" >

	<?php
}

add_action( 'save_post', 'email_save_meta_box_feature' );
function email_save_meta_box_feature($post_id){

	// 安全检查
	// 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
	if ( ! isset( $_POST['staff_email_meta_box_nonce'] ) ) {
		return;
	}
	// 判断隐藏表单的值与之前是否相同
	if ( ! wp_verify_nonce( $_POST['staff_email_meta_box_nonce'], 'staff_email_meta_box' ) ) {
		return;
	}
	// 判断该用户是否有权限
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 判断 Meta Box 是否为空
	if ( ! isset( $_POST['staff_position'] ) ) {
		return;
	}

	$product_price = sanitize_text_field( $_POST['staff_email'] );
	update_post_meta( $post_id, '_staff_email', $product_price );

}
