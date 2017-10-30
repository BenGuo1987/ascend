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
									<div class="fa-tool-icon ex-rate"></div>
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
									<div class="fa-tool-icon stamp-duty"></div>
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
									<div class="fa-tool-icon home-loan"></div>
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
									<div class="fa-tool-icon au-school"></div>
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
									<div class="fa-tool-icon im-policy"></div>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Immigration Policy', 'default')) ?></h5>
						</div>
					</div>
				</div>
				<div class="contact-us clearfix">
					<div class="col-md-6">
						<h2><?php echo(__('Contact Us', 'default')) ?></h2>
						<p class="contact-us-content">
							"Dream in Australia, Australia or edge of the source of" Sheng International real estate group, the group is headquartered in Melbourne City,
							the famous Camberwell downtown area. Australia International founded by the Chinese elite in the Australian real estate industry, the group...
						</p>
						<p class="contact-type">Phone: +03 9882 1699</p>
						<p class="contact-type">Email: info@ascendinternational.com.au</p>
					</div>
					<div class="col-md-6">
						<div role="button" class="online-contact-btn" onclick="location.href='/contact-us'"><?php echo(__('Online Contact', 'default')) ?></div>
					</div>
				</div>
				<div class="copy-info clearfix">
					<div class="col-md-8">
						<p class="copy-right">Copyright &copy; 2013-2017 <?php echo(__('All Rights Reserved Ascend International Property Group', 'default')) ?> ABN:46 169 369 822</p>
					</div>
					<div class="col-md-4 text-right">
						<ul class="social-list clearfix">
							<li><a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-qq" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-weixin" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div> <!-- end container -->
		</div> <!-- end footer-top -->

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
