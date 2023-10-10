function my_et_pb_gallery_image_size( $size ) {
return 1200;
}
add_filter( 'et_pb_gallery_image_width', 'my_et_pb_gallery_image_size' );

function my_et_pb_gallery_image_size_height( $size ) {
return 1200;
}
add_filter( 'et_pb_gallery_image_height', 'my_et_pb_gallery_image_size_height' );


function my_et_theme_image_sizes( $sizes ) {
$sizes['1200x1200'] = 'my-et-pb-post-main-image';
return $sizes;
}
add_filter( 'et_theme_image_sizes', 'my_et_theme_image_sizes' );