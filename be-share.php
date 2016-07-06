<?php
/*
 * @link              http://digitalkroy.com/born-for-share
 * @since             1.2.0
 * @package           Be Share
 *
 * @wordpress-plugin
 * Plugin Name:       Be Share
 * Plugin URI:        http://digitalkroy.com/born-for-share
 * Description:       A share toolkit that helps you share anything.
 * Version:           1.2.0
 * Author:            Noor alam
 * Author URI:        http://themeforest.net/user/noor-alam
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
 if(is_admin()){
require plugin_dir_path( __FILE__ ) . '/admin/born-for-share-options.php';

}
require plugin_dir_path( __FILE__ ) . '/includes/button-share.php';


	/**
	 * Load the plugin all style and script.
	 *
	 * @since    1.0.0
	 */

 if ( ! function_exists( 'bflightShare_style_script' ) ) :
function bflightShare_style_script() {
wp_enqueue_style( 'bflShare-fontello', plugins_url( '/assets/css/fontello.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'bflShare-main', plugins_url( '/assets/css/bfshare-style.css', __FILE__ ), array(), '1.0', 'all');

wp_enqueue_script('jquery');
wp_enqueue_script( 'bflShare-SocialShare', plugins_url( '/assets/js/SocialShare.js', __FILE__ ), array( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'bflightShare_style_script' );
endif;


