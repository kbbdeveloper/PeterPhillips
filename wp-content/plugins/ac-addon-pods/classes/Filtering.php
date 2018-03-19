<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @property ACA_Pods_Column $column
 */
class ACA_Pods_Filtering extends ACP_Filtering_Model_Meta {

	public function __construct( ACA_Pods_Column $column ) {
		parent::__construct( $column );
	}

}
