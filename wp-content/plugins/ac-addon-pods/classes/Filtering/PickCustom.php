<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Filtering_PickCustom extends ACA_Pods_Filtering {

	public function get_filtering_data() {
		$meta_values = $this->get_meta_values();

		$_field = PodsForm::field_loader( $this->column->get_field()->get( 'type' ) );
		$options = array();

		if ( method_exists( $_field, 'get_field_data' ) ) {
			$choices = $_field->get_field_data( $this->column->get_pod_field() );

			foreach ( $meta_values as $option ) {
				if ( isset( $choices[ $option ] ) ) {
					$options[ $option ] = $choices[ $option ];
				}

			}
		}

		return array( 'options' => $options );
	}

}
