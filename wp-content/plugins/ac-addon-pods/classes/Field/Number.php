<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Number extends ACA_Pods_Field {

	public function editing() {
		return new ACA_Pods_Editing_Number( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_Number( $this->column() );
	}

	public function sorting() {
		$model = new ACP_Sorting_Model_Meta( $this->column() );

		return $model->set_data_type( 'numeric' );
	}

}
