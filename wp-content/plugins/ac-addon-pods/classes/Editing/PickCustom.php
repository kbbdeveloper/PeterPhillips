<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_PickCustom extends ACA_Pods_Editing {

	public function get_view_settings() {
		$field = $this->column->get_field();

		$_field = PodsForm::field_loader( $field->get( 'type' ) );

		$settings = array();

		if ( method_exists( $_field, 'get_field_data' ) ) {
			$settings = array(
				'type'         => 'select2_dropdown',
				'options'      => $_field->get_field_data( $this->column->get_pod_field() ),
				'clear_button' => ( $field->get_option( 'required' ) == 0 ),
				'multiple'     => ( 'multi' == $field->get_option( 'pick_format_type' ) ),
			);
		}

		return $settings;
	}

}
