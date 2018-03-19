<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Boolean extends ACA_Pods_Field {

	public function get_value( $id ) {
		$value = $this->get_single_raw_value( $id );

		return ac_helper()->icon->yes_or_no( '1' == $value );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_TrueFalse( $this->column() );
	}

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_TrueFalse( $this->column() );
	}

}
