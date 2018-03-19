<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_PickPosts extends ACA_Pods_Editing {

	public function get_edit_value( $id ) {
		return $this->get_titles( parent::get_edit_value( $id ) );
	}

	public function get_view_settings() {
		$field = $this->column->get_field();

		$settings = array(
			'type'            => 'select2_dropdown',
			'formatted_value' => 'post',
			'ajax_populate'   => true,
			'clear_button'    => ( $field->get_option( 'required' ) == 0 ),
			'multiple'        => ( 'multi' == $field->get_option( 'pick_format_type' ) ),
		);

		return $settings;
	}

	/**
	 * @param WP_Post[] | int[] $ids
	 *
	 * @return array
	 */
	protected function get_titles( $post_ids ) {
		$titles = array();

		foreach ( (array) $post_ids as $k => $post_id ) {
			if ( $title = ac_helper()->post->get_raw_post_title( $post_id ) ) {
				$titles[ $post_id ] = $title;
			}
		}

		return $titles;
	}

	/**
	 * @param $searchterm
	 * @param $page
	 *
	 * @return mixed
	 */
	public function get_ajax_options( $request ) {
		$field = $this->column->get_field();

		$args = array(
			's'         => $request['search'],
			'post_type' => $field->get( 'pick_val' ),
			'paged'     => $request['paged'],
		);

		if ( $field->get_option( 'pick_post_status' ) ) {
			$args['post_status'] = $field->get_option( 'pick_post_status' );
		}

		return acp_editing_helper()->get_posts_list( $args );
	}

}
