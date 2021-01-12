<?php
/*
Plugin Name: Simple Table Manager
Description: Enables editing table records and exporting them to CSV files through a minimal database interface from your dashboard.
Version:     1.4
Author:      Ryo Inoue, with contributions by lorro from v1.3
Author URI:  http://www.topcode.co.uk/developments/simple-table-manager/
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: simple-table-manager
Domain Path: /languages/
*/

defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );

$stm_version = '1.4';

define( 'STM_PATH', plugin_dir_path( __FILE__ ) );
// eg: STM_PATH = '/home/.../public_html/my-domain/wp-content/plugins/simple-table-manager/';

define( 'STM_URL', plugin_dir_url( __FILE__ ) );
// eg: STM_URL = 'http://www.my-domain.co.uk/wp-content/plugins/simple-table-manager/';
  
define( 'STM_DELIMITER', ',' );
define( 'STM_NEW_LINE', "\r\n" );
define( 'STM_NEW_ID_HINT', " - Edit new ID" );

// settings
// add_option() will not change the option if it exists
add_option( 'stm_table_name', '' );
add_option( 'stm_rows_per_page', 20 );
add_option( 'stm_csv_file_name', 'export.csv' );
add_option( 'stm_csv_encoding', 'UTF-8' );
add_option( 'stm_base_slug', 'simple_table_manager' );

// translations
add_action( 'plugins_loaded', 'stm_load_textdomain' );
function stm_load_textdomain() {
  // load_plugin_textdomain( $domain, $abs_rel_path__DEPRECATED, $plugin_rel_path );
  load_plugin_textdomain( 'simple-table-manager', false,  STM_PATH. 'languages' );
}

// register style
add_action( 'wp_loaded', 'stm_register_style' );
function stm_register_style() {
  global $stm_version;
  // wp_register_script( $handle, $src, $deps = array(), $ver, $in_footer );
  // $src = full url or path relative to wordpress root
  wp_register_style( 'stm_admin_css', STM_URL.'css/admin.css', array(), $stm_version );
}

// enqueue styles
add_action( 'admin_enqueue_scripts', 'stm_admin_enqueue_style' );
function stm_admin_enqueue_style() {
  wp_enqueue_style( 'stm_admin_css' );
}

require_once( 'includes/functions.php' );
require_once( 'includes/class_stm_controller.php' );
require_once( 'includes/class_stm_table.php' );
  
$control = new STM_Controller();
