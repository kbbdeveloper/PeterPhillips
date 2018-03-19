<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Field_Pick_NavMenu extends ACA_Pods_Field_Pick {

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
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

		if ( ! $menus || is_wp_error( $menus ) ) {
			return array();
		}

		$options = array();

		foreach ( $menus as $menu ) {
			$options[ $menu->term_id ] = $menu->name;
		}

		return $options;
	}

}
