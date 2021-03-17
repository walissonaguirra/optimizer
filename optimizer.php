<?php 
/**
 * Plugin Name:       Optimizer
 * Plugin URI:        https://github.com/walissonaguirra
 * Description:       Optimizer.
 * Version:           1.0.0
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Walisson Aguirra
 * Author URI:        https://github.com/walissonaguirra
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       optimizer
 */

$optimizer_dir = plugin_dir_path(__FILE__);

require_once "{$optimizer_dir}inc/emojis.php";
require_once "{$optimizer_dir}inc/head.php";
require_once "{$optimizer_dir}inc/rest-api.php";

add_action( 'plugins_loaded', function() {
	
	if (current_user_can('administrator')) return;

	require_once "{$optimizer_dir}inc/javascript.php";
	
});