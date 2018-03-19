<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_PickFactory extends ACA_Pods_FieldFactoryAbstract {

	public function create( ACA_Pods_Column $column ) {
		$class = $this->remove_factory_suffix( $this ) . '_' . $this->get_class( $column->get_pod_field_option( 'pick_object' ) );

		if ( ! class_exists( $class, true ) ) {
			$class = $this->remove_factory_suffix( $this );
		}

		return new $class( $column );
	}

	protected function get_class( $field ) {
		$class = '';

		foreach ( preg_split( '/_|-/', $field ) as $part ) {
			$class .= ucfirst( $part );
		}

		return $class;
	}

}
