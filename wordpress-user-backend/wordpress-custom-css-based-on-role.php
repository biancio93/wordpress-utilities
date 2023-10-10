add_action('admin_head', 'custom_CSS_Role');

function custom_CSS_Role() {
$user = wp_get_current_user();
if ( in_array( 'editor', (array) $user->roles ) ){
  echo '<style>
    /* Insert your custom style */
    #menu-posts, #menu-comments, #menu-posts-project, #menu-tools, #menu-settings, #menu-tools, #toplevel_page_wpcf7, #toplevel_page_rank-math, #rank_math_metabox{
    display: none;
}
#et_pb_layout{
display: none!important;
}
.cfs_loop.ui-sortable{
display:flex;
flex-direction:column-reverse;
}
  </style>';
}
}