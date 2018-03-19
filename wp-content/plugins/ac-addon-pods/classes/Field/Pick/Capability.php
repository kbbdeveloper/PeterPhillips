<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_Capability extends ACA_Pods_Field_Pick {

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Pick( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_Pick( $this->column() );
	}

	// Helpers

	public function get_options() {
		return parent::get_pick_field()->data_capabilities();
	}

}
