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

	register_sidebar(array(
		'name' => esc_html__('Home Menu', 'gmlaunch'),
		'id' => 'home-widget',
		'description' => esc_html__('Add widgets here.', 'gmlaunch'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">', 
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

}
add_action('widgets_init', 'gmlaunch_widgets_init');


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// Hide shipping rates when free shipping is available.
add_filter('woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2);
function hide_shipping_when_free_is_available($rates, $package) {
	$free_yn = 0;
	$pickup_yn = 0;
	foreach($rates as $key => $value) {
		$key_part = explode(":", $key);
		$method_title = $key_part[0];

		if ('local_pickup' == $method_title) {
            // check if local pickup rate exists
			$pickup_yn = 1;
			$local_pickup = $rates[$key];
			$pickup_key = $key;
		}


		if ('free_shipping' == $method_title) {
            // check if free shipping rate exists
			$free_yn = 1;
			$free_shipping = $rates[$key];
			$free_key = $key;
		}
	}


	if ($free_yn == 1) {
        // Unset all rates.
		$rates = array();
        // Restore free shipping rate.
		$rates[$free_key] = $free_shipping;

		if ($pickup_yn == 1) {
        // Restore local pickup rate.
			$rates[$pickup_key] = $local_pickup;

		}


		return $rates;
	}
	return $rates;
}


//Add Alphabetical sorting option to shop page / WC Product Settings
// https://www.skyverge.com/blog/rename-add-woocommerce-product-sorting-options/
function sv_alphabetical_woocommerce_shop_ordering( $sort_args ) {
	$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
	
	if ( 'alphabetical' == $orderby_value ) {
		$sort_args['orderby'] = 'title';
		$sort_args['order'] = 'asc';
		$sort_args['meta_key'] = '';
	}
	
	return $sort_args;
}
add_filter( 'woocommerce_get_catalog_ordering_args', 'sv_alphabetical_woocommerce_shop_ordering' );


function sv_custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['alphabetical'] = 'Sort by name: alphabetical';
	return $sortby;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'sv_custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'sv_custom_woocommerce_catalog_orderby' );







function woocommerce_template_loop_product_link_open() {
	global $product;
	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link border">';
}


// Move woocommerce_sidebar on Product Single from Bottom to Top of Page
// We are using this to show a Widget which has "Sidebar Menu" - These are the top Level Categories
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action('woocommerce_before_single_product', 'woocommerce_get_sidebar', 1);


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

function emelias_scripts() {
	wp_enqueue_style('emelias-style', get_stylesheet_uri());
	wp_enqueue_style('emelias-format', get_template_directory_uri() . '/css/format.css');
	wp_enqueue_style('font-awesome5', get_stylesheet_directory_uri(). '/css/fontawesome/all-min.css');
	wp_enqueue_style('woo-theme', get_template_directory_uri() . '/css/woo-theme.css');
	wp_enqueue_script('general-js', get_template_directory_uri() . '/js/index.js', array('jquery'), '', true);

}
add_action('wp_enqueue_scripts', 'emelias_scripts');

// Load Typekit fonts -
// http://wptheming.com/2013/02/typekit-code-snippet/.
require get_template_directory() . '/functions/typekit.php';


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
// add_filter('woocommerce_subcategory_count_html', '__return_false');

// Remove the sorting dropdown from Woocommerce
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Remove the result count from WooCommerce
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);



// Enable Built in Woocommerce prodcut gallery
// https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



// WooCommerce Change Number of Related Products
// https://businessbloomer.com/?p=17473
add_filter('woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999);

function bbloomer_change_number_related_products($args) {
	$args['posts_per_page'] = 3; // # of related products
	$args['columns'] = 3; // # of columns per row
	return $args;
}



// Change price format from range to "From:"
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



// Change read more buttons for out of stock items to read contact us
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


// Remove Add to Cart Everywhere except on Single
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
	if( is_product_category() || is_shop() || is_archive()) { 
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	}
}


// Rename Dropdown from "Choose an Option"
//https://cinchws.com/change-choose-an-option-variation-dropdown-label-in-woocommerce/
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'cinchws_filter_dropdown_args', 10 );

function cinchws_filter_dropdown_args( $args ) {
	$var_tax = get_taxonomy( $args['attribute'] );
	$args['show_option_none'] = apply_filters( 'the_title', $var_tax->labels->name );
	return $args;
}



// add_filter( 'woocommerce_cart_shipping_method_full_label', 'remove_local_pickup_free_label', 10, 2 );
// function remove_local_pickup_free_label($full_label, $method){
// 	$full_label = str_replace("Local pickup","Dunedin Delivery",$full_label);
// 	return $full_label;
// }






// add_filter('gettext', 'custom_strings_translation', 20, 3);

// function custom_strings_translation( $translated_text, $text, $domain ) {

// 	switch ( $translated_text ) {
// 		case 'Ship to a different address?' : 
// 		$translated_text =  __( 'Ship or Deliver to a different address?', '__x__' ); 
// 		break;
// 	}

// 	return $translated_text;
// }


// add_filter('gettext', 'custom_strings_translation2', 20, 3);

// function custom_strings_translation2( $translated_text, $text, $domain ) {
// 	switch ( $translated_text ) {
// 		case 'Billing details' : 
// 		$translated_text =  __( 'Billing Address', '__x__' ); 
// 		break;
// 	}
// 	return $translated_text;
// }




// /**
//  * @snippet       Add Order Note @ Checkout Page - WooCommerce
//  * @sourcecode    https://businessbloomer.com/?p=358
//  */

// add_action( 'woocommerce_before_checkout_form', 'bbloomer_notice_checkout' );

// function bbloomer_notice_checkout() {
// 	echo '<p class="cart-notice"><strong>Dunedin Residents:<br></strong> If you selected Local Delivery and your delivery address is different than you billing address please include your delivery on the right. <br><a href="/">Read more about our local Delivery Option</a></p>';
// }


// add_action( 'woocommerce_before_cart_table', 'bbloomer_notice_cart' );

// function bbloomer_notice_cart() {
// 	echo '<p class="cart-notice"><strong>Dunedin Residents:<br></strong><a href="/">Read more about our local Delivery Option Here</a></p>';
// }


// add_filter( 'woocommerce_shipping_package_name' , 'woocommerce_replace_text_shipping_to_delivery', 10, 3);

// function woocommerce_replace_text_shipping_to_delivery($package_name, $i, $package){
// 	return sprintf( _nx( 'Delivery', 'Delivery %d', ( $i + 1 ), 'shipping packages', 'put-here-you-domain-i18n' ), ( $i + 1 ) );
// }






