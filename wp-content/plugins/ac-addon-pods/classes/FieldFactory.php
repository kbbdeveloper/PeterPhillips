<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_FieldFactory extends ACA_Pods_FieldFactoryAbstract {

	/**
	 * @param ACA_Pods_Column $column
	 *
	 * @return ACA_Pods_Field
	 */
	public function create( ACA_Pods_Column $column ) {

		$class = $this->remove_factory_suffix( $this );
		$field_class = $class . '_' . ucfirst( $column->get_field_type() );
		$factory = $field_class . self::SUFFIX;

		if ( class_exists( $factory ) ) {

			/* @var ACA_Pods_FieldFactory $instance */
			$instance = new $factory;

			return $instance->create( $column );
		}

		if ( class_exists( $field_class ) ) {
			return new $field_class( $column );
		}

		/* @var ACA_Pods_Field $class */
		return new $class( $column );
	}

}
