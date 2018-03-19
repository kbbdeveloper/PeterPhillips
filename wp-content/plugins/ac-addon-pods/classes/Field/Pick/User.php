<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_User extends ACA_Pods_Field_Pick {

	// Display

	public function get_value( $id ) {
		return $this->column->get_formatted_value( new AC_Collection( $this->get_raw_value( $id ) ) );
	}

	public function get_raw_value( $id ) {
		return (array) $this->get_ids_from_array( parent::get_raw_value( $id ) );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_PickUsers( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_PickUsers( $this->column() );
	}

	// Helper

	public function get_users( $user_ids ) {
		$names = array();

		if ( empty( $user_ids ) ) {
			return false;
		}

		foreach ( (array) $user_ids as $k => $user_id ) {
			$names[ $user_id ] = ac_helper()->user->get_display_name( $user_id );
		}

		return $names;
	}

	// Settings

	public function get_dependent_settings() {
		return array(
			new AC_Settings_Column_User( $this->column() ),
		);
	}

}
