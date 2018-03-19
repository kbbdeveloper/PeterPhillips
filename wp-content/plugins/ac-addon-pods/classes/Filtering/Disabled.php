<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Filtering_Disabled extends ACP_Filtering_Model {

	public function is_active() {
		return false;
	}

	public function register_settings() {}

	public function get_filtering_vars( $vars ) {
		return $vars;
	}

	public function get_filtering_data() {
		return array();
	}

}
