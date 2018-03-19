<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_PostType extends ACA_Pods_Field_Pick {

	public function get_value( $id ) {
		return $this->column->get_formatted_value( new AC_Collection( $this->get_raw_value( $id ) ) );
	}

	public function get_raw_value( $id ) {
		return $this->get_db_value( $id );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_PickPosts( $this->column );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_PickPosts( $this->column );
	}

	// Settings

	public function get_dependent_settings() {
		return array(
			new AC_Settings_Column_Post( $this->column ),
		);
	}

}
