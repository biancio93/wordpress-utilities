// Show all users in 'author' drop down on editor
add_filter( 'wp_dropdown_users_args', function( $query_args, $r ) {
global $post;
if ( is_object( $post ) &&  $post->post_type == 'note_studente'){
$query_args['who'] = '';
}
return $query_args; // return needs to sit outside the conditional
}, 10, 2 );