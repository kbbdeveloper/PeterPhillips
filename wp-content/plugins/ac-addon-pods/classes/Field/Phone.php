<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Phone extends ACA_Pods_Field {

	public function editing() {
		return new ACA_Pods_Editing( $this->column() );
	}

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

	public function filtering() {
		return new ACP_Filtering_Model_Meta( $this->column() );
	}

}
