<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Sorting_Disabled extends ACP_Sorting_Model_Meta {

	public function is_active() {
		return false;
	}

	public function register_settings() {}

}
