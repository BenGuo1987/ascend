<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?>


<?php
	$sectionClass = '';
    $nav = '';
	if ( 'post' === get_post_type() ) {
		$sectionClass = 'news-section';
		$nav = 'NEWS';
	} elseif('service' === get_post_type() ) {
		$nav = 'SERVICES';
	}  elseif('portfolio' === get_post_type() ) {
		$nav = 'PROJECT';
	} elseif('feature' === get_post_type() ) {
		$nav = 'FEATURE';
	}
?>
<div class="common-section <?php echo $sectionClass ?>">
	<div class="top-section">
		<div class="top-section-text"><?php echo $nav ?></div>
	</div>
</div>
<div class="ascend-content-wrapper">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * suffice_before_post_content hook
	 */
	do_action( 'suffice_before_post_content' ); ?>

	<header class="entry-header">
		<?php
		// if is single content page.
		// Show title downwards if selected below.
		get_template_part( 'template-parts/content-parts/entry', 'title' );
		?>

		<div class="entry-meta">
			<?php suffice_posted_on();?>
		</div><!-- .entry-meta -->

		<?php
		// If featured is enabled, show featured image.
		get_template_part( 'template-parts/content-parts/entry', 'thumbnail' );
		?>


	</header><!-- .entry-header -->
	<?php if ( 'feature' === get_post_type() ) {?>
		<div class="feature-basic-info">
			<div class="basic-info-panel">
				<div class="basic-info-panel-header"><?php echo __('Basic Info', 'default');?></div>
				<div class="basic-info-panel-body">
					<table>
						<?php if (get_post_meta( $post->ID, '_feature_address', true )) {?>
							<tr>
								<td><?php echo __('Address', 'default');?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_address', true );?></td>
							</tr>
						<?php }?>
						<?php if (get_post_meta( $post->ID, '_feature_dev', true )) {?>
							<tr>
								<td><?php echo __('Developer', 'default'); ?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_dev', true );?></td>
							</tr>
						<?php }?>
						<?php if (get_post_meta( $post->ID, '_feature_designer', true )) {?>
							<tr>
								<td><?php echo __('Designer', 'default'); ?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_designer', true );?></td>
							</tr>
						<?php }?>
						<?php if (get_post_meta( $post->ID, '_feature_roomType', true )) {?>
							<tr>
								<td><?php echo __('Room Type', 'default'); ?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_roomType', true );?></td>
							</tr>
						<?php }?>
						<?php if (get_post_meta( $post->ID, '_feature_floor', true )) {?>
							<tr>
								<td><?php echo __('Floor', 'default'); ?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_floor', true );?></td>
							</tr>
						<?php }?>
						<?php if (get_post_meta( $post->ID, '_feature_dwellings', true )) {?>
							<tr>
								<td><?php echo __('Number of dwellings', 'default'); ?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_dwellings', true );?></td>
							</tr>
						<?php }?>
						<?php if (get_post_meta( $post->ID, '_feature_huxing', true )) {?>
							<tr>
								<td><?php echo __('Huxing', 'default'); ?></td>
								<td><?php echo get_post_meta( $post->ID, '_feature_huxing', true );?></td>
							</tr>
						<?php }?>
					</table>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="entry-content">
		<?php
		if ( ! is_single() && 'post-style-grid' === suffice_get_option( 'suffice_blog_post_style', 'post-style-classic' ) ) {
			the_excerpt();
		} else {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'suffice' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'suffice' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( 'feature' === get_post_type() ) {?>
	<div class="map-box-wrapper clearfix">
		<div id="map_box" class="map-box"></div>
		<div class="feature-contact">
			<?php echo  do_shortcode( '[contact-form-7 id="featureContactForm" title="contact-for-feature"]' ); ?>
		</div>
	</div>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzE9xAESye6Kde-3hT-6B90nfwUkcS8Yw&sensor=false"></script>
	<script type="text/javascript">
		var myOptions = {
			zoom : 17,
			center : new google.maps.LatLng(-37.81195385919268, 144.96185302734375),
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};

		var markerLocation = null;
		//生成地图

		var map = new google.maps.Map(document.getElementById('map_box'), myOptions);

		var geocoder = new google.maps.Geocoder();
		var address = '<?php echo get_post_meta( $post->ID, '_feature_address', true );?>';
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				console.log(results[0].geometry);
				markerLocation = results[0].geometry.location;
				var marker = null;
				marker = new google.maps.Marker({
					position: markerLocation,
					map: map
				});
				map.setCenter(markerLocation);
			} else {
				console.log("Geocode was not successful for the following reason: " + status);
			}
		});

	</script>
	<?php }?>

	<footer class="entry-footer">
		<?php suffice_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
	/**
	 * suffice_after_post_content hook
	 */
	do_action( 'suffice_after_post_content' ); ?>

</article><!-- #post-## -->
</div>
