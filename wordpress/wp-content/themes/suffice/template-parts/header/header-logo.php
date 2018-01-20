<?php
/**
 * Displays the custom logo if present
 * Otherwise displays the site branding
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?>
<div class="site-identity-container">
	<div class="logo-container">
		<!--?php the_custom_logo(); ?-->
		<a href="<?php echo home_url() ?>/" class="logo-img"></a>
		<div class="lang-container">
			<p>language</p>
			<a href="http://ascendinternational.com.au/home">English</a>
			<a href="http://ascendinternational.com.au/ch/home">Chinese</a>
		</div>
		<div class="lang-container mobile">
			<a href="http://ascendinternational.com.au/home">EN</a>
			<a href="http://ascendinternational.com.au/ch/home">CH</a>
		</div>
	</div> <!-- .logo-container -->
</div> <!-- .logo -->
