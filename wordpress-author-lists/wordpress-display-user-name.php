// create [userdata] shortcode
function get_current_userdata_cb( $atts ){
    if ( is_user_logged_in() ) { 
        // get the current user
        $cu = wp_get_current_user();

        switch ( $atts[0] ) {
            case 'user_login':
                return $cu->user_login;
                break;
            case 'user_email':
                return $cu->user_email;
                break;
            case 'user_firstname':
                return $cu->user_firstname;
                break;
            case 'user_lastname':
                return $cu->user_lastname;
                break;
            case 'display_name':
                return $cu->display_name;
                break;
            case 'ID':
                return $cu->ID;
                break;
            default:
                return $cu->user_login;
                break;
        }

    }else{
        return '';
    }
}
add_shortcode( 'userdata', 'get_current_userdata_cb' );