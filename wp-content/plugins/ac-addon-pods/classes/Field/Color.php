<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Color extends ACA_Pods_Field {

	public function get_value( $id ) {
		return ac_helper()->string->get_color_block( $this->get_raw_value( $id ) );
	}

	public function get_raw_value( $id ) {
		return $this->get_single_raw_value( $id );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Color( $this->column() );
	}

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

	public function filtering() {
		return new ACP_Filtering_Model_Meta( $this->column() );
	}

}
