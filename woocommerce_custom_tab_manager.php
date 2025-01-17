<?php
/**

* Plugin Name: WooCommerce Custom Tab Lite

* Plugin URI: https://www.phoeniixx.com/product/woocommerce-custom-tabs-plugin/

* Description: This is not just a plugin ,Tab Manager allows you to add Multiple Tab on every Product page.

* Version: 1.4.4

* Author: phoeniixx

* Author URI: http://www.phoeniixx.com/

* License: GPL2

*Text Domain:custom-tab

* WC requires at least: 2.6.0

* WC tested up to: 3.9.0

*/ 
 
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Put your plugin code here
	include(dirname(__FILE__).'/libs/execute-libs.php');

ob_start();
// wp_admin_table for list of tabs

require_once('wp_table.php');
require_once('tabs.php');
require_once('add_tab.php');
require_once('all_tabs.php'); 
require_once('settings.php');   

  // add menu or sub_menu

  add_action('admin_menu','pctm_custum_tab');
	function pctm_custum_tab(){

        $page_title="Custom Tab";
        $menu_title="Tab Manager";
        $capability="manage_options";
        $menu_slug="pctm-tab-manager";
        $function=NULL;
        $icon_url=plugin_dir_url( __FILE__ )."images/logo-wp.png";
        $position="26.1";
         add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	  	 add_submenu_page( "pctm-tab-manager", "List All", "All Tabs", "manage_options", "pctm-tab-manager", "pctm_list_all" );
         add_submenu_page( "pctm-tab-manager", "Add Tab", "Add Tabs", "manage_options", "pctm-add-tab", "pctm_add_tab" );
         add_submenu_page( "pctm-tab-manager", "Settings", "Settings", "manage_options", "pctm-change-settings", "pctm_change_settings" );
         
         
	}
	add_filter( 'pztm_woocommerce_custom_product_tabs_lite_content', 'do_shortcode' );	add_action('admin_head','admin_assets_file');	function admin_assets_file(){			wp_enqueue_style( 'style-name', plugin_dir_url( __FILE__ )."css/style.css");			}		
}else{
    add_action('admin_notices', 'pctm_my_plugin_admin_notices');
    function pctm_my_plugin_admin_notices() {
    if (!is_plugin_active('plugin-directory/plugin-file.php')) {
        echo "<div class='error'><p>Please active WooCommerce First To Use WooCommerce Custom Tab Manager</p></div>";
    }
}
 }

ob_clean(); 
 
 ?>
