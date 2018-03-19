<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_PickUsers extends ACA_Pods_Editing {

	public function get_edit_value( $id ) {
		$field = $this->column->get_field();
		if ( ! $field instanceof ACA_Pods_Field_Pick_User ) {
			return null;
		}

		return $field->get_users( parent::get_edit_value( $id ) );
	}

	public function get_view_settings() {

		return array(
			'type'            => 'select2_dropdown',
			'formatted_value' => 'user',
			'ajax_populate'   => true,
			'clear_button'    => ( $this->column->get_field()->get_option( 'required' ) == 0 ),
			'multiple'        => ( 'multi' == $this->column->get_field()->get_option( 'pick_format_type' ) ),
		);
	}

	public function get_ajax_options( $request ) {
		return acp_editing_helper()->get_users_list( array(
			'search'   => $request['search'],
			'paged'    => $request['paged'],
			'role__in' => $this->column->get_field()->get_option( 'pick_user_role' ),
		) );
	}

}
