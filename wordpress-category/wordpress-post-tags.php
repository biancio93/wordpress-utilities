function sc_taglist(){
    // Retrieves the tags for a post formatted as a string.
	$tags_list = get_the_tag_list();
	return '<p>Autore : ' . $tags_list . '</p>';
}
add_shortcode('tags', 'sc_taglist');