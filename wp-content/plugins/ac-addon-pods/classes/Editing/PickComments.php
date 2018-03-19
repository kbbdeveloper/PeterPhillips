<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Editing_PickComments extends ACA_Pods_Editing {

	public function get_view_settings() {
		$field = $this->column->get_field();

		$settings = array(
			'type'            => 'select2_dropdown',
			'formatted_value' => 'comment',
			'ajax_populate'   => true,
			'clear_button'    => ( 0 == $field->get_option( 'required' ) ),
			'multiple'        => ( 'multi' == $field->get_option( 'pick_format_type' ) ),
		);

		return $settings;
	}

	public function get_ajax_options( $request ) {
		return acp_editing_helper()->get_comments_list( array( 'search' => $request['search'], 'paged' => $request['paged'] ) );
	}

	public function get_edit_value( $id ) {
		return $this->get_titles( $this->column->get_field()->get_raw_value( $id ) );
	}

	protected function get_titles( $comment_ids ) {
		$titles = array();
		foreach ( (array) $comment_ids as $k => $comment_id ) {
			if ( $comment = get_comment( $comment_id ) ) {
				$titles[] = $comment->comment_date;
			};
		}

		return $titles;
	}

}
