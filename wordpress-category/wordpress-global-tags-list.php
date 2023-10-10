function display_footer_tags_shortcode() {
  $tags = get_tags();
  shuffle($tags);
  $tag_count = count($tags);
  $limit = min($tag_count, 5);
  $output = '<ul>';
  for ($i = 0; $i < $limit; $i++) {
    $tag = $tags[$i];
    $output .= '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
  }
  $output .= '<a href="[tags archive page url]" >see every tags</a></ul>';
  return $output;
}
add_shortcode('display_footer_tags', 'display_footer_tags_shortcode');