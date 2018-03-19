<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_UsState extends ACA_Pods_Field_Pick {

	public function editing() {
		return new ACA_Pods_Editing_Pick( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_Pick( $this->column() );
	}

	// Helpers

	public function get_options() {
		return $this->get_pick_field()->data_us_states();
	}

}
