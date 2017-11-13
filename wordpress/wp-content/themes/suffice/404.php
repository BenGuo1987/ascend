<?php
/**
 * Contains the post embed content template part
 *
 * When a post is embedded in an iframe, this file is used to create the content template part
 * output if the active theme does not include an embed-404.php template.
 *
 * @package WordPress
 * @subpackage Theme_Compat
 * @since 4.5.0
 */
?>

<div class="wrapper no-navigation preload">
	<div class="error-wrapper">
		<div class="error-inner">
			<div class="error-type animated">404</div>
			<h1>Page Not Found</h1>
			<p>Look like the page you're looking for isn't here anymore.
				Try typing the address again or start over from the home page.</p>
			<div class="back-info">
				<a href="/home" class="btn btn-default btn-lg text-upper">Back to Home</a>
			</div>
		</div><!-- ./error-inner -->
	</div><!-- ./error-wrapper -->
</div><!-- /wrapper -->
<style>
	html {
		background-color: #f5f5f5;
	}
	.wrapper {

		color: #666;
	}
	.error-wrapper .error-inner .error-type.animated {
		visibility: visible;
		animation: fadeInDown 1s ease;
		-webkit-animation: fadeInDown 1s ease;
	}
	.error-wrapper .error-inner .error-type {
		position: relative;
		font-size: 15em;
	}
	h1 {
		font-size: 36px;
	}
	p {
		font-size: 13px;
		margin: 0 0 10px;
	}
	.error-wrapper .error-inner {
		width: 420px;
		margin: 50px auto;
		text-align: center;
	}
	.back-info .btn-lg {
		display: inline-block;
		padding: 10px 16px;
		font-size: 18px;
		line-height: 1.3333333;
		border-radius: 6px;
		color: #333;
		background-color: #fff;
		border: 1px solid #ccc;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		user-select: none;
		font-weight: 400;
		cursor: pointer;
		margin-top: 20px;
	}
	.back-info .btn-lg:hover {
		color: #333;
		background-color: #e6e6e6;
		border-color: #adadad;
		transition: background-color .3s ease;
	}

</style>