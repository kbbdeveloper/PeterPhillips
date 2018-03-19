<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Paragraph extends ACA_Pods_Field {

	public function get_value( $id ) {
		return $this->column->get_formatted_value( parent::get_value( $id ) );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Textarea( $this->column() );
	}

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

	// Settings

	public function get_dependent_settings() {
		return array(
			new AC_Settings_Column_WordLimit( $this->column() ),
		);
	}

}
