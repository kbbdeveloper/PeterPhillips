<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick extends ACA_Pods_Field {

	public function get_options() {
		return array();
	}

	protected function get_pick_field() {
		return new PodsField_Pick();
	}

	// Pro

	public function sorting() {
		return new ACP_Sorting_Model_Value( $this->column );
	}

	// Utility

	protected function get_ids_from_array( $array, $id_name = 'ID' ) {
		$ids = array();

		if ( ! is_array( $array ) ) {
			return false;
		}

		if ( isset( $array[0] ) ) {
			$ids = wp_list_pluck( $array, $id_name );
		}

		if ( array_key_exists( $id_name, $array ) ) {
			$ids = array( $array[ $id_name ] );
		}

		return $ids;
	}

}
