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
			<a href="<?php echo home_url() ?>/home">ENGLISH</a>
			<a href="<?php echo home_url() ?>/ch/home">CHINESE</a>
		</div>
		<div class="lang-container mobile">
			<a href="<?php echo home_url() ?>/home">EN</a>
			<a href="<?php echo home_url() ?>/ch/home">CH</a>
		</div>
	</div> <!-- .logo-container -->
</div> <!-- .logo -->
