<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Filtering_PickTaxonomy extends ACA_Pods_Filtering {

	public function get_filtering_data() {
		$field = $this->column->get_field();

		if ( ! $field instanceof ACA_Pods_Field_Pick_Taxonomy ) {
			return false;
		}

		$term_ids = $this->get_meta_values();

		if ( ! $term_ids ) {
			return array();
		}

		$options = array();

		foreach ( (array) $term_ids as $term_id ) {
			if ( $term = get_term_by( 'id', $term_id, $field->get_taxonomy() ) ) {
				$options[ $term->term_id ] = $term->name;
			}
		}

		return array(
			'options'      => $options,
			'empty_option' => true,
		);
	}

}
