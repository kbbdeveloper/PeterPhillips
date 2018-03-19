<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Code extends ACA_Pods_Field {

	public function get_value( $id ) {
		return ac_helper()->html->codearea( parent::get_value( $id ) );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Textarea( $this->column() );
	}

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

}
