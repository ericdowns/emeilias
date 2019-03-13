<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="full-site-wrapper">
		<div class="section-site-header-wrapper">
			<header class="site-header">
				<div class="section-header-left">
					<div class="header-search-bar">Search</div>
					<div class="section-header-left_nav">
						<div class="navigation-item"><a href="/shop">Shop</a></div>
						<div class="navigation-item"><a href="/about">About</a></div>
						<div class="navigation-item"><a href="/events">Events</a></div>
					</div> <!-- section-header-left_nav -->
				</div> <!-- section-header-left -->
				<div class="section-logo-wrapper">
					<a href="/"><?php get_template_part('imgs/inline-headerlogo.svg');?></a>
				</div><!--section-logo-wrapper-->
				<div class="section-header-right">
					<div class="header-message-bar">Free Shipping over $100</div>
					<div class="section-header-right_nav">
						<div class="navigation-item"><a href="/location">Location</a></div>
						<div class="navigation-item"><a href="/contact">Contact</a></div>
						<div class="navigation-item"><a href="/cart">Cart</a></div>
					</div> <!-- section-header-right_nav -->
				</div> <!-- section-header-left -->
			</header><!-- #masthead -->
		</div>
		<div class="section-full-page-wrapper">
