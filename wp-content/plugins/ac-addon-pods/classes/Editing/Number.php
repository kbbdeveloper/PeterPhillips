<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_Number extends ACA_Pods_Editing {

	public function get_view_settings() {
		return array(
			'type'       => 'number',
			'range_step' => 'any',
		);
	}

}
