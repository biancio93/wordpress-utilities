// create your function
 
function custom_um_profile_query_make_posts( $args = array() ) 
{
    $args['post_type'] = ['[post type name]'];
 
    return $args;
}
 
// call your function using the UM hook
 
add_filter( 'um_profile_query_make_posts', 'custom_um_profile_query_make_posts', 12, 1 );