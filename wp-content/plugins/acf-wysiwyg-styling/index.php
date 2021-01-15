<?php
/*
Plugin Name: ACF WYSIWYG Styling
Version: 1.0
Author: Delwin Vriend
Author URI: http://www.delwinvriend.com/
Description: Provides necessary classes in WYSYWIG editor to allow for complete styling of the admin interface.

Released under the GPLv2 license http://www.gnu.org/licenses/gpl-2.0.html
*/

function acf_plugin_wysiwyg_styling() {
	echo '<script src="' . plugins_url( 'js/acf-wysiwyg-styling.js', __FILE__ ) . '"></script>';
}
add_action('acf/input/admin_footer', 'acf_plugin_wysiwyg_styling');
