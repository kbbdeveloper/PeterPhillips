<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class ACA_Pods_FieldFactoryAbstract {

	/**
	 * Factory classes should have this as suffix
	 */
	const SUFFIX = 'Factory';

	/**
	 * @param ACA_Pods_Column_PodsAbstract $column
	 *
	 * @return false|ACA_Pods_FieldAbstract
	 */
	abstract public function create( ACA_Pods_Column $column );

	/**
	 * @return string
	 */
	protected function remove_factory_suffix( $object ) {
		return substr( get_class( $object ), 0, -strlen( self::SUFFIX ) );
	}

}
