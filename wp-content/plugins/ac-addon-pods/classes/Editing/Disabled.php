<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_Disabled extends ACP_Editing_Model {

	public function is_active() {
		return false;
	}

	public function register_settings() {}

}
