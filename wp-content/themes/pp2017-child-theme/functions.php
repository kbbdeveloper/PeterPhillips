<?php
//add divi builder to work-gallery post type
function my_et_builder_post_types( $post_types ) {
    $post_types[] = 'work-gallery';
  
    return $post_types;
}
add_filter( 'et_builder_post_types', 'my_et_builder_post_types' );

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );