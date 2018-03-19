<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Column_Post extends ACA_Pods_Column {

	protected function get_pod_name() {
		return $this->get_post_type();
	}

}
