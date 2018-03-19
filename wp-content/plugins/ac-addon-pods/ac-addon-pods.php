<?php
/*
Plugin Name: 		Admin Columns - Pods add-on
Version: 			1.0.2
Description: 		Show Pod fields in your admin post overviews and edit them inline! Pods integration Add-on for Admin Columns.
Author: 			Codepress
Author URI: 		https://admincolumns.com
Text Domain: 		codepress-admin-columns
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods {

	CONST CLASS_PREFIX = 'ACA_Pods_';

	/**
	 * @var AC_Addon_Pods
	 */
	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	private function __construct() {
		add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	public function init() {
		if ( ! is_admin() ) {
			return;
		}

		if ( $this->has_missing_dependencies() ) {
			return;
		}

		AC()->autoloader()->register_prefix( self::CLASS_PREFIX, $this->get_plugin_dir() . 'classes/' );

		add_action( 'ac/column_groups', array( $this, 'register_column_groups' ) );
		add_action( 'acp/column_types', array( $this, 'add_columns' ) );
	}

	/**
	 * @param AC_Groups $groups
	 */
	public function register_column_groups( $groups ) {
		$groups->register_group( 'pods', __( 'Pods', 'pods' ), 11 );
	}

	/**
	 * @return bool True when there are missing dependencies
	 */
	private function has_missing_dependencies() {
		require_once plugin_dir_path( __FILE__ ) . 'classes/Dependencies.php';

		$dependencies = new ACA_Pods_Dependencies( __FILE__ );

		$dependencies->is_acp_active( '4.0.3' );

		if ( ! $this->is_pods_active() ) {
			$dependencies->add_missing( $dependencies->get_search_link( 'Pods', 'Pods' ) );
		}

		return $dependencies->has_missing();
	}

	public function get_plugin_basename() {
		return plugin_basename( __FILE__ );
	}

	public function get_plugin_dir() {
		return plugin_dir_path( __FILE__ );
	}

	public function get_version() {
		$plugins = get_plugins();

		return $plugins[ $this->get_plugin_basename() ]['Version'];
	}

	/**
	 * @return bool
	 */
	private function is_pro_active() {
		return function_exists( 'ac_is_pro_active' ) && ac_is_pro_active();
	}

	/**
	 * Whether Pods is active
	 *
	 * @return bool Returns true if Pods is active, false otherwise
	 */
	public function is_pods_active() {
		return $this->is_pro_active() && function_exists( 'pods' );
	}

	/**
	 * Add custom columns
	 *
	 * @param AC_ListScreen $list_screen
	 *
	 */
	public function add_columns( $list_screen ) {

		switch ( true ) {

			case $list_screen instanceof AC_ListScreen_Comment :
				$list_screen->register_column_type( new ACA_Pods_Column_Comment );

				break;
			case $list_screen instanceof AC_ListScreen_Post :
				$list_screen->register_column_type( new ACA_Pods_Column_Post );

				break;
			case $list_screen instanceof AC_ListScreen_Media :
				$list_screen->register_column_type( new ACA_Pods_Column_Media );

				break;
			case $list_screen instanceof AC_ListScreen_User :
				$list_screen->register_column_type( new ACA_Pods_Column_User );

				break;
			case $list_screen instanceof ACP_ListScreen_Taxonomy :
				$list_screen->register_column_type( new ACA_Pods_Column_Taxonomy() );

				break;
		}
	}

}

function ac_addon_pods() {
	return ACA_Pods::instance();
}

ac_addon_pods();