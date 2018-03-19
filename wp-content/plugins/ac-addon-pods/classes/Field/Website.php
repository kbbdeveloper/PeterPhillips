<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Website extends ACA_Pods_Field {

	public function get_value( $id ) {
		$url = parent::get_value( $id );

		return ac_helper()->html->link( $url, str_replace( array( 'http://', 'https://' ), '', $url ) );
	}

	// Pro

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
