<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_TrueFalse extends ACA_Pods_Editing {

	public function get_view_settings() {
		return array(
			'type'    => 'togglable',
			'options' => array( '0', '1' ),
		);
	}

}
