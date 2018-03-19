<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @property ACA_Pods_Field_Date $column
 */
class ACA_Pods_Setting_Date extends AC_Settings_Column_Date
	implements AC_Settings_FormatValueInterface {

	public function __construct( ACA_Pods_Column $column ) {
		parent::__construct( $column );

		/* @var PodsField_Date $pods_field */
		$pods_field = PodsForm::field_loader( $column->get_field()->get( 'type' ) );

		$date_format_js = $column->get_field()->get_option( 'date_format' );
		$date_format_php = $pods_field->format( $date_format_js );

		$this->set_default( $date_format_php );
	}

}
