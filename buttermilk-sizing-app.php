<?php
/**
* Plugin Name: buttermilk
* Description: This is the plugin that implements buttermilk's sizing app.
* Author: Joshua Kall
**/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BUTTERMILK_PLUGIN_MAIN_FILE', __FILE__ );

require_once plugin_dir_path(__FILE__) . 'includes/loader.php';
