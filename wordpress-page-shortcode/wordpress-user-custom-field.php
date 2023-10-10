// function that runs when shortcode is called
function user_custom_field() { 
 
$author_id = get_current_user_id();
$custom_field = get_field('[replace with your custom field]', 'user_'. $author_id );
return $custom_field;	
} 

// register shortcode
add_shortcode('shortcode_custom_field', 'user_custom_field');