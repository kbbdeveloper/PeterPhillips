<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_PostFormat extends ACA_Pods_Field_Pick {

	public function get_raw_value( $id ) {
		return $this->get_ids_from_array( parent::get_raw_value( $id ), 'term_id' );
	}

	// Pro

	public function editing() {
		return new ACA_Pods_Editing_Pick( $this->column() );
	}

	public function filtering() {
		return new ACA_Pods_Filtering_Pick( $this->column() );
	}

	// Pick

	public function get_options() {
		$formats = get_terms( 'post_format' );

		if ( ! $formats || is_wp_error( $formats ) ) {
			return array();
		}

		$options = array();

		foreach ( $formats as $format ) {
			$options[ $format->term_id ] = $format->slug;
		}

		return $options;
	}

}
