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
			<a href="http://ascendinternational.com.au:8080/home">English</a>
			<a href="http://ascendinternational.com.au:8080/ch/home">中文</a>
		</div>
		<div class="lang-container mobile">
			<a href="http://ascendinternational.com.au:8080/home">EN</a>
			<a href="http://ascendinternational.com.au:8080/ch/home">中文</a>
		</div>
	</div> <!-- .logo-container -->
</div> <!-- .logo -->
