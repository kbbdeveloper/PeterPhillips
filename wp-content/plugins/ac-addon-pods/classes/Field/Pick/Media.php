<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_Media extends ACA_Pods_Field_Pick {

	// Display

	public function get_value( $id ) {
		return $this->column->get_formatted_value( new AC_Collection( $this->get_raw_value( $id ) ) );
	}

	public function get_raw_value( $id ) {
		return (array) $this->get_ids_from_array( parent::get_raw_value( $id ) );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_PickMedia( $this->column() );
	}

	// Settings

	public function get_dependent_settings() {
		return array(
			new AC_Settings_Column_Image( $this->column() ),
		);
	}

}
