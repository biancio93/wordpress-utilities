function display_random_tags_shortcode() {
  $tags = get_tags();
  shuffle($tags);
  $tag_count = count($tags);
  $limit = min($tag_count, 4);
  $output = '<ul>';
  for ($i = 0; $i < $limit; $i++) {
    $tag = $tags[$i];
    $output .= '<li><a href="' . get_tag_link($tag->term_id) . '"><p>' . $tag->name . '</p><p>go to tag archive page</p></a></li>';
  }
  $output .= '</ul>';
  return $output;
}
add_shortcode('display_random_tags', 'display_random_tags_shortcode');