<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/favicon-16x16.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/imgs/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-25321174-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-25321174-2');
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="full-site-wrapper">
		<div class="section-site-header-wrapper">
			<header class="site-header">
				<div id="menu">
					<div id="menu-toggle">
						<div id="menu-icon">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div> <!-- menu-icon -->
					</div> <!-- menu -->
				</div> <!-- menu -->
				<div class="section-header-left">
					<div class="header-search-bar">Search <?php get_template_part('/searchform');?></div>
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
					<div class="header-message-bar">Free Domestic Shipping on Orders $75+</div>
					<div class="section-header-right_nav">
						<div class="navigation-item"><a href="/location">Location</a></div>
						<div class="navigation-item"><a href="/contact">Contact</a></div>
						<div class="navigation-item">
							<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
								<?php if ($count > '0'): ?>
									<?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), 
									WC()->cart->get_cart_contents_count() ); ?> 
									- <?php echo WC()->cart->get_cart_total(); ?>
								<?php else: // field_name returned false ?>
									Cart
								<?php endif; // end of if field_name logic ?>
							</a>
						</div>
					</div> <!-- section-header-right_nav -->
				</div> <!-- section-header-left -->
				<div class="mobile-cart-wrapper">
					<a href="<?php echo wc_get_cart_url(); ?>"><span class="text">Cart</span>
						<span class="cart-count">
							<?php global $woocommerce; $count = $woocommerce->cart->cart_contents_count; if ($count > 0) { echo ''; echo $count; echo '';} ?>
						</span>
					</a>				
				</div> <!-- mobile-cart-wrapper -->
			</header><!-- #masthead -->
		</div> <!-- section-site-header-wrapper -->
		<div class="section-mobile-header-wrapper">
			<div class="mobile-menu-wrapper">
				<div class="navigation-item"><a href="/shop">Shop</a></div>
				<div class="navigation-item"><a href="/about">About</a></div>
				<div class="navigation-item"><a href="/events">Events</a></div>
				<div class="navigation-item"><a href="/location">Location</a></div>
				<div class="navigation-item"><a href="/contact">Contact</a></div>
			</div> <!-- mobile-menu-wrapper -->
		</div><!--  section-mobile-header-wrapper-->
		<div class="section-full-page-wrapper">
