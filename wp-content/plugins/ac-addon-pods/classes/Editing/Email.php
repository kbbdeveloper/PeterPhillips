<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_Email extends ACA_Pods_Editing {

	public function get_view_settings() {
		return array(
			'type' => 'email',
		);
	}

}
