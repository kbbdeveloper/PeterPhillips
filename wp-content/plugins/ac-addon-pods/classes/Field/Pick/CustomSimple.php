<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_CustomSimple extends ACA_Pods_Field_Pick {

	public function editing() {
		return new ACA_Pods_Editing_PickCustom( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_PickCustom( $this->column() );
	}

}
