<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Filtering_PickUsers extends ACA_Pods_Filtering {

	public function get_filtering_data() {
		$field = $this->column->get_field();

		if ( ! $field instanceof ACA_Pods_Field_Pick_User ) {
			return array();
		}

		$options = $this->get_meta_values();

		return array(
			'options'      => $field->get_users( $options ),
			'empty_option' => true,
		);
	}

}
