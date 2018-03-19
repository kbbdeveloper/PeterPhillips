<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_Pick extends ACA_Pods_Editing {

	public function get_view_settings() {
		$field = $this->column->get_field();

		if ( ! $field instanceof ACA_Pods_Field_Pick ) {
			return array();
		}

		$settings = array(
			'type'         => 'select2_dropdown',
			'options'      => $field->get_options(),
			'clear_button' => ( 0 == $field->get_option( 'required' ) ),
			'multiple'     => ( 'multi' == $field->get_option( 'pick_format_type' ) ),
			'store_values' => true,
		);

		return $settings;
	}

	public function get_edit_value( $id ) {
		return (array) parent::get_edit_value( $id );
	}

}
