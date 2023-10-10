function profile_image(){
	$user_id = get_current_user_id();
	um_fetch_user( $user_id );
	$profile_img_url = esc_url( um_get_avatar_uri( um_profile( 'profile_photo' ), 500 ) );
	$profile_pic = $profile_img_url;
	return $profile_pic;
}

add_shortcode('profile_pic_shortcode','profile_image');

