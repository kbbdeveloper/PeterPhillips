<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_File extends ACA_Pods_Field {

	public function get_value( $id ) {
		return $this->column->get_formatted_value( new AC_Collection( $this->get_raw_value( $id ) ) );
	}

	public function get_raw_value( $id ) {
		return (array) $this->get_db_value( $id );
	}

	public function get_separator() {
		return ' ';
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_File( $this->column() );
	}

	// Settings

	public function get_dependent_settings() {
		$settings = array();

		switch ( $this->get_option( 'file_type' ) ) {
			case 'images' :
			case 'any' :
				$settings[] = new AC_Settings_Column_Image( $this->column() );

				break;
		}

		return $settings;
	}

}
