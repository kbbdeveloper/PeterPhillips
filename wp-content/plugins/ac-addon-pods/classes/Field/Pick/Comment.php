<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_Comment extends ACA_Pods_Field_Pick {

	public function get_raw_value( $id ) {
		return $this->get_ids_from_array( parent::get_raw_value( $id ), 'comment_ID' );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_PickComments( $this->column() );
	}

}
