<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?>

		</div><!-- #content -->
	</div> <!-- .container -->

	<?php
	/**
	 * suffice_before_footer hook
	 */
	do_action( 'suffice_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-top">
			<div class="container">

				<div class="useful-tools clearfix">
					<div class="icon-box icon-box-center icon-box-hexagon">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<i class="fa fa-code"></i>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Exchange Rate', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<i class="fa fa-code"></i>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Stamp Duty', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<i class="fa fa-code"></i>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Home Loan', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<i class="fa fa-code"></i>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Australian School', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<i class="fa fa-code"></i>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Immigration Policy', 'default')) ?></h5>
						</div>
					</div>
				</div>
			</div> <!-- end container -->
		</div> <!-- end footer-top -->

		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-container">
					<div class="site-info">
						<?php do_action( 'suffice_footer_copyright_text' ); ?>
					</div><!-- .site-info -->

					<?php get_template_part( 'template-parts/footer/bottom', 'right' ); ?>
				</div> <!-- .footer-bottom-container -->
			</div> <!-- .container -->
		</div> <!-- .footer -->
	</footer><!-- #colophon -->

	<?php
	/**
	 * suffice_after_footer hook
	 */
	do_action( 'suffice_after_footer' ); ?>

</div><!-- #page -->
<div class="suffice-body-dimmer">
</div>

<?php wp_footer(); ?>

</body>
</html>
