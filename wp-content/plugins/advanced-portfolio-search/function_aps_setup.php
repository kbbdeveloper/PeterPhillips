<?php // function_aps_setup.php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;



//$dir = plugin_dir_path( __FILE__ );


// add plugin admin styles
function add_aps_adminstyle() {
	echo '<link rel="stylesheet" href="/wp-content/plugins/advanced-portfolio-search/aps.css" />';
}
add_action('admin_head', 'add_aps_adminstyle',999);

function aps_plugin_styles(){
	  //$path = plugin_dir_path( __FILE__ ). 'webaissance.css';
		$path = "/wp-content/plugins/advanced-portfolio-search/";
		//echo $path;
    wp_enqueue_style( 'aps_css',$path."aps.css");
    wp_enqueue_script( 'aps_js',$path.'aps.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'aps_plugin_styles',5 );

function aps_add_pages() {
		add_menu_page(__('Advanced Portfolio Search','Overview'), __('Advanced Portfolio Search','aps'), 'manage_options', 'aps', 'aps_toplevel_page','dashicons-admin-site',2);
    add_submenu_page('aps', 'Overview', 'APS Overview', 'manage_options', 'aps' );
}
add_action('admin_menu', 'aps_add_pages');

//add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
