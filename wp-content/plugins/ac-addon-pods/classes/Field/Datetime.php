<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Datetime extends ACA_Pods_Field {

	// Display

	public function get_value( $id ) {
		return $this->column->get_formatted_value( parent::get_value( $id ) );
	}

	// Pro

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

	// Settings

	public function get_dependent_settings() {
		return array(
			new ACA_Pods_Setting_Date( $this->column() ),
		);
	}

}
