<?php
/**
 * Plugin Name:       Milun Search
 * Plugin URI:        https://milunsearch.com/
 * Description:       A simplified live search plugin created for learning WordPress plugin development by building a complete search plugin step by step.
 * Version:           1.0.1
 * Requires PHP:      7.0
 * Author:            Dragan Milunovic
 * Author URI:        https://www.templatemonster.com/authors/milunovicdragan36
 * Text Domain:       milun-search
 * License:           GPLv2 or later
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin.php';

new MILUSE_Plugin();