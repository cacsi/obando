<?php
/**
 * Plugin Name: Colorbox Panels
 * Version: 1.8.5
 * Description: Colorbox panels is the most easiest drag & drop icon box and content box builder for WordPress. You can add unlimited panels with unlimited color scheme.
 * Author: wpshopmart
 * Author URI: https://www.wpshopmart.com
 * Plugin URI: https://www.wpshopmart.com/plugins/
 */

/**
 * DEFINE PATHS
 */
define("wpshopmart_colorbox_directory_url", plugin_dir_url(__FILE__));
define("wpshopmart_colorbox_text_domain", "wpsm_colorbox");

/**
 * PLUGIN Install
 */
require_once("ink/install/installation.php");

add_action('admin_menu' , 'wpsm_cb_help_page_manu');
function wpsm_cb_help_page_manu() {
	$submenu = add_submenu_page('edit.php?post_type=colorbox_panels', __('More_Free_Plugins', wpshopmart_colorbox_text_domain), __('More Free Plugins', wpshopmart_colorbox_text_domain), 'administrator', 'wpsm_ac_sh_help_page', 'wpsm_cb_help_page_funct');
	//add hook to add styles and scripts for colorbox admin page
    add_action( 'admin_print_styles-' . $submenu, 'wpsm_cb_help_js_css' );
}
function wpsm_cb_help_js_css(){
	wp_enqueue_style('wpsm_cb_bootstrap_css', wpshopmart_colorbox_directory_url.'assets/css/bootstrap.css');
	wp_enqueue_style('wpsm_cb_sh_help_css', wpshopmart_colorbox_directory_url.'assets/css/help.css');
}
function wpsm_cb_help_page_funct(){
	require_once('ink/admin/help.php');
}
 
/**
 * menu classes and functions calling
 */
 
require_once("ink/admin/menu.php");

/**
 * COLORBOX SHORTCODE
 */
require_once("template/shortcode.php"); 

?>