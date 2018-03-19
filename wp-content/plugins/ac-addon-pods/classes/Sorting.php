<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @property ACA_Pods_Column $column
 */
class ACA_Pods_Sorting extends ACP_Sorting_Model_Meta {

	public function __construct( ACA_Pods_Column $column ) {
		parent::__construct( $column );
	}

}
