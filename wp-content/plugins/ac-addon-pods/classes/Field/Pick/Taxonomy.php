<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_Taxonomy extends ACA_Pods_Field_Pick {

	public function get_raw_value( $id ) {
		return $this->get_ids_from_array( parent::get_raw_value( $id ), 'term_id' );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_PickTaxonomy( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_PickTaxonomy( $this->column() );
	}

	// Taxonomy

	public function get_taxonomy() {
		return $this->column->get_field()->get( 'pick_val' );
	}

}
