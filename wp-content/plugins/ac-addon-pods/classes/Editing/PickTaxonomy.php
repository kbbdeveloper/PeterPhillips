<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_PickTaxonomy extends ACA_Pods_Editing {

	public function get_edit_value( $id ) {
		$field = $this->get_field();

		if ( ! $field ) {
			return false;
		}

		$term_ids = $this->column->get_raw_value( $id );

		if ( ! $term_ids ) {
			return false;
		}

		$values = array();
		foreach ( (array) $term_ids as $term_id ) {
			if ( $term = get_term_by( 'id', $term_id, $field->get_taxonomy() ) ) {
				$values[ $term->term_id ] = htmlspecialchars_decode( $term->name );
			}
		}

		return $values;
	}

	public function get_view_settings() {
		$field = $this->get_field();

		if ( ! $field ) {
			return false;
		}

		$settings = array(
			'type'          => 'select2_dropdown',
			'ajax_populate' => true,
			'clear_button'  => ( 0 == $field->get_option( 'required' ) ),
			'multiple'      => ( 'multi' == $field->get_option( 'pick_format_type' ) ),
		);

		return $settings;
	}

	public function get_ajax_options( $request ) {
		$field = $this->get_field();

		if ( ! $field ) {
			return false;
		}

		$args = array(
			'taxonomy'   => $field->get_taxonomy(),
			'hide_empty' => false,
		);

		if ( $request['paged'] ) {
			$args['offset'] = ( $request['paged'] - 1 ) * 40;
			$args['number'] = 40;
		}

		$terms = acp_editing_helper()->get_terms_list( $args );

		return $terms;
	}

	/**
	 * @return ACA_Pods_Field_Pick_Taxonomy|false
	 */
	private function get_field() {
		$field = $this->column->get_field();

		if ( ! $field instanceof ACA_Pods_Field_Pick_Taxonomy ) {
			return false;
		}

		return $field;
	}

}
