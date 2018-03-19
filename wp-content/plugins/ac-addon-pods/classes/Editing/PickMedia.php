<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_PickMedia extends ACA_Pods_Editing {

	public function get_view_settings() {
		$field = $this->column->get_field();

		$data = array(
			'type'         => 'media',
			'clear_button' => ( $field->get_option( 'required' ) == 0 ),
			'multiple'     => ( 'multi' == $field->get_option( 'pick_format_type' ) ),
		);

		return $data;
	}

}
