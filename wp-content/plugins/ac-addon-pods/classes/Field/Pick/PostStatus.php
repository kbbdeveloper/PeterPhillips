<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_PostStatus extends ACA_Pods_Field_Pick {

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Pick( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_Pick( $this->column() );
	}

	// Pick

	public function get_options() {
		if ( ! class_exists( 'PodsField_Pick', true ) ) {
			return array();
		}

		$pod = new PodsField_Pick();

		return $pod->data_post_stati();
	}

}
