<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Date extends ACA_Pods_Field {

	// Display

	public function get_value( $id ) {
		return $this->column->get_formatted_value( parent::get_value( $id ) );
	}

	public function get_raw_value( $id ) {
		return $this->get_single_raw_value( $id );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Date( $this->column );
	}

	public function sorting() {
		$model = new ACP_Sorting_Model_Meta( $this->column );
		$model->set_data_type( 'date' );

		return $model;
	}

	public function filtering() {
		return new ACP_Filtering_Model_MetaDate( $this->column );
	}

	// Settings

	public function get_dependent_settings() {
		return array(
			new ACA_Pods_Setting_Date( $this->column ),
		);
	}

}
