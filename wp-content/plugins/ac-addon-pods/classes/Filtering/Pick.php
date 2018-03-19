<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Pods_Filtering_Pick extends ACA_Pods_Filtering {

	public function get_filtering_data() {
		$data = array(
			'empty_option' => true,
		);

		$field = $this->column->get_field();

		if ( $field instanceof ACA_Pods_Field_Pick ) {
			$options = $this->get_meta_values();

			$data['options'] = $this->format_options_by_dataset( $options, $field->get_options() );
		}

		return $data;
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

	protected function format_options_by_dataset( $values, $dataset ) {
		$options = array();
		foreach ( $values as $key ) {
			if ( isset( $dataset[ $key ] ) ) {
				$options[ $key ] = $dataset[ $key ];
			}
		}

		return $options;
	}

}
