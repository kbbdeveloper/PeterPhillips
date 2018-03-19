<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Filtering_PickPosts extends ACA_Pods_Filtering {

	public function get_filtering_data() {
		return array(
			'options'      => acp_filtering()->helper()->get_post_titles( $this->get_meta_values() ),
			'empty_option' => true,
		);
	}

}
