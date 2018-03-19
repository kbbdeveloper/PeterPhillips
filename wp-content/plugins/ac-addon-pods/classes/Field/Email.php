<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Email extends ACA_Pods_Field {

	public function editing() {
		return new ACA_Pods_Editing_Email( $this->column() );
	}

	public function sorting() {
		return new ACP_Sorting_Model_Meta( $this->column() );
	}

	public function filtering() {
		return new ACP_Filtering_Model_Meta( $this->column() );
	}

}
