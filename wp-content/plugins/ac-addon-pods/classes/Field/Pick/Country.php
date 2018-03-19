<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_Country extends ACA_Pods_Field_Pick {

	// Pick

	public function get_options() {
		return parent::get_pick_field()->data_countries();
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Pick( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_Pick( $this->column() );
	}

}
