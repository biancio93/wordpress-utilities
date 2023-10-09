function display_read_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $count_words = str_word_count( strip_tags( $content ) );
	
    $read_time = ceil($count_words / 250);
	
	$prefix = "Tempo di lettura: ";
    $suffix = " min.";
	
    $read_time_output = $prefix . $read_time . $suffix;

    return $read_time_output;
}
add_shortcode( 'read_time_shortcode', 'display_read_time' );