function display_footer_tags_shortcode() {
  $tags = get_tags();
  shuffle($tags);
  $tag_count = count($tags);
  $limit = min($tag_count, 5);
  $output = '<ul class="container-author-footer">';
  for ($i = 0; $i < $limit; $i++) {
    $tag = $tags[$i];
    $output .= '<li><a class="footer-link" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
  }
  $output .= '<a href="https://identitario.org/autori/" class="footer-link" style="text-decoration:underline;">Vedi tutti</a></ul>';
  return $output;
}
add_shortcode('display_footer_tags', 'display_footer_tags_shortcode');