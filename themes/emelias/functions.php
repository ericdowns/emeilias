<?php


require get_template_directory() . '/functions/post-type-events.php';

function custom_post_type_archive_events($query) {

	if ($query->is_main_query() && !is_admin()) {
		if ($query->is_tax('project_categories') || $query->is_post_type_archive('events')) {
			$query->set('orderby', 'meta_value_num'); 
      $query->set('meta_key', 'start_date'); // ACF Name
      $query->set('order', 'ASC');
      $query->set('posts_per_page', '5');
  }
}
}

add_action('pre_get_posts', 'custom_post_type_archive_events', 9999);





function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu-1' => __('Header Menu Desktop'),
			'shop-menu-1' => __('Shop Menu'),
		));
}
add_action('init', 'register_my_menus');



function gmlaunch_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'gmlaunch'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Add widgets here.', 'gmlaunch'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">', 
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'gmlaunch_widgets_init');



function woocommerce_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link border">';
}





//Reposition Related Products.
// We need to do this so we can put a .div around the image and summmary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 1);


// attach my open 'section' function to the before product summary action
add_action( 'woocommerce_before_single_product', 'my_non_image_content_wrapper_start', 40 );
// attach my close 'section' function to the after product summary action
add_action( 'woocommerce_after_single_product_summary', 'my_non_image_content_wrapper_end', 40 );
//This function opens a new css section tag called "no-image-wrap" to the page HTML before all of the woocommerce "stuff" except images
function my_non_image_content_wrapper_start() { 
	echo '<div class="border-wrapper">';
	echo '<div class="border">';
}

//This line adds the HTML to the page to end the new "no-image-wrap" section
function my_non_image_content_wrapper_end() { 
	echo '</div>'; 
	echo '</div>'; 
}







// add_action('admin_menu', 'remove_admin_menu_links');
// function remove_admin_menu_links(){
// 	$user = wp_get_current_user();
// 	if( $user && isset($user->user_email) && 'ivar@adtechsupply.com' == $user->user_email ) {
// 		remove_menu_page('tools.php');
// 		remove_menu_page('themes.php');
// 		remove_menu_page('options-general.php');
// 		remove_menu_page( 'jetpack' );
// 		remove_menu_page('index.php');                             
// 		remove_menu_page( 'edit.php' );
// 		remove_menu_page('plugins.php');
// 		remove_menu_page('users.php');
// 		remove_menu_page('edit-comments.php');
// 		remove_menu_page('page.php');
// 		remove_menu_page('upload.php');
// 		remove_menu_page( 'edit.php?post_type=page' ); 
// 		remove_menu_page( 'edit.php?post_type=videos' );
// 		remove_menu_page( 'edit.php?post_type=acf-field-group');
// 	}
// }

// remove_theme_support( 'genesis-admin-menu' );


function emelias_scripts() {
	wp_enqueue_style('emelias-style', get_stylesheet_uri());
	wp_enqueue_style('emelias-format', get_template_directory_uri() . '/css/format.css');
	wp_enqueue_style('font-awesome5', get_stylesheet_directory_uri(). '/css/fontawesome/all-min.css');
	wp_enqueue_style('woo-theme', get_template_directory_uri() . '/css/woo-theme.css');
	
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.js', array( 'jquery' ), '4.0.1', true ); 
	wp_enqueue_script('waypoints-init', get_template_directory_uri() . '/js/waypoints-int.js',array( 'waypoints' ), '1.0.0', true );  
	wp_enqueue_script('general-js', get_template_directory_uri() . '/js/index.js', array('jquery'), '', true);

}
add_action('wp_enqueue_scripts', 'emelias_scripts');



// add_filter( 'post_class', 'prefix_post_class', 21 );
// function prefix_post_class( $classes ) {
// 	if ( 'product' == get_post_type() ) {
// 		$classes = array_diff( $classes, array( 'first', 'last' ) );
// 	}
// 	return $classes;
// }


// Adds option to GF to hide sublabels under fields
// How to hide Gravity Form field labels when using placeholders
// https://gravitywiz.com/how-to-hide-gravity-form-field-labels-when-using-placeholders/
add_filter('gform_enable_field_label_visibility_settings', '__return_true');


// Declaring WooCommerce support in themes
// https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
function mytheme_add_woocommerce_support() {
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');





// START Add Woocom Action ===============================================================
// https://iconicwp.com/blog/best-way-modify-woocommerce-templates/

/**
 * Opening div for our content wrapper
 */
add_action('woocommerce_before_main_content', 'iconic_open_div', 5);

function iconic_open_div() {
	echo '<div class="full">';
	echo '<div class="content">';
	echo '<div class="woocommerce-wrapper">';
	echo '<div class="woocommerce-wrapper-inner">';

}

/**
 * Closing div for our content wrapper
 */
add_action('woocommerce_after_main_content', 'iconic_close_div', 50);

function iconic_close_div() {
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

}

// END Add Woocom Action ===============================================================

// Remove Tabs from below - place next to price
remove_action('woocommerce_after_single_product_summary',
	'woocommerce_output_product_data_tabs', 10);

remove_action('woocommerce_single_product_summary',
	'woocommerce_template_single_meta', 40);

//Reposition WooCommerce breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_breadcrumb', 1);

// Replace the home link URL
add_filter('woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url');
function woo_custom_breadrumb_home_url() {
	return '/shop';
}

// Rename "home" in breadcrumb
add_filter('woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text');
function wcc_change_breadcrumb_home_text($defaults) {
	// Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['home'] = 'Shop';
	return $defaults;
}


// Change text for related products
function my_text_strings($translated_text, $text, $domain) {
	switch ($translated_text) {
		case 'Related products':
		$translated_text = __('Related Products', 'woocommerce');
		break;
	}
	return $translated_text;
}
add_filter('gettext', 'my_text_strings', 20, 3);



// Hide category product count in product archives
add_filter('woocommerce_subcategory_count_html', '__return_false');

// Remove the sorting dropdown from Woocommerce
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Remove the result count from WooCommerce
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// Enable Built in Woocommerce prodcut gallery
// https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * @snippet       WooCommerce Change Number of Related Products
 * @sourcecode    https://businessbloomer.com/?p=17473
 */

add_filter('woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999);

function bbloomer_change_number_related_products($args) {
	$args['posts_per_page'] = 3; // # of related products
	$args['columns'] = 3; // # of columns per row
	return $args;
}



/**
 * Change price format from range to "From:"
 *
 * @param float $price
 * @param obj $product
 * @return str
 */
function iconic_variable_price_format( $price, $product ) {
	
	$prefix = sprintf('%s: ', __('<span class="price-wrap"> from', 'iconic </span>'));
	
	$min_price_regular = $product->get_variation_regular_price( 'min', true );
	$min_price_sale    = $product->get_variation_sale_price( 'min', true );
	$max_price = $product->get_variation_price( 'max', true );
	$min_price = $product->get_variation_price( 'min', true );
	
	$price = ( $min_price_sale == $min_price_regular ) ?
	wc_price( $min_price_regular ) :
	'<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
	
	return ( $min_price == $max_price ) ?
	$price :
	sprintf('%s%s', $prefix, $price);
	
}

add_filter( 'woocommerce_variable_sale_price_html', 'iconic_variable_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'iconic_variable_price_format', 10, 2 );



/**
* RETURNS MINIMUM PRICE AND HIDES MAXIMUM PRICE FOR VARIABLE PRODUCTS
https://www.joshrobertnay.com/2018/01/show-starting-at-price-and-hiding-maximum-price-in-woocommerce/
**/

// add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
// add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
// function wc_wc20_variation_price_format( $price, $product ) {
// // Main Price
// $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
// $price = $prices[0] !== $prices[1] ? sprintf( __( 'Starting at %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

// // Sale Price
// $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
// sort( $prices );
// $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Starting at %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
// if ( $price !== $saleprice ) {
// $price = '' . $saleprice . ' ' . $price . '';
// }
// return $price;
// }

/*
* change read more buttons for out of stock items to read contact us
**/
if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart() {
		global $product;
		if (!$product->is_in_stock()) {
			echo '<a href="'.get_permalink().'" rel="nofollow" class="button">Add to Cart</a>';
		} 
		else 
		{ 
			woocommerce_get_template('loop/add-to-cart.php');
		}
	}
}



add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		$text = $product->is_purchasable() ? __( 'Add to Cart', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
	}
	return $text;
}, 10 );







// ===============================================================
// Change the placeholder image
// https://gist.github.com/woogists/cc3787e56446601ac5d14971b2e01a62#file-wc-change-placeholder-image-php

add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

function custom_woocommerce_placeholder_img_src( $src ) {
	$upload_dir = wp_upload_dir();
	$uploads = untrailingslashit( $upload_dir['baseurl'] );
	// replace with path to your image
	$src = $uploads . '/woocommerce_uploads/woo-placeholder.jpg';
	
	return $src;
}



// Remove Add to Cart Everywhere except on Single
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
	if( is_product_category() || is_shop() || is_archive()) { 
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	}
}


// Support to hide products with settting of Catalog Visibility : Hidden. 
// https://stackoverflow.com/questions/36522439/set-catalog-visibility-hidden-woo-commerce
// update_post_meta( $product_id, '_visibility', '_visibility_hidden' );


// function ec_mail_name( $email ){
//   return 'Joe Doe'; // new email name from sender.
// }
// add_filter( 'wp_mail_from_name', 'ec_mail_name' );

// function ec_mail_from ($email ){
//   return 'info@dkoenigart.com'; // new email address from sender.
// }
// add_filter( 'wp_mail_from', 'ec_mail_from' );



