<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Column_Taxonomy extends ACA_Pods_Column {

	protected function get_pod_name() {
		if ( ! method_exists( $this->list_screen, 'get_taxonomy' ) ) {
			return false;
		}

		return $this->list_screen->get_taxonomy();
	}

}
