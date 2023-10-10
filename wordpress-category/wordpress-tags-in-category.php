function display_random_tags_with_categories_shortcode() {
  $tags = get_tags();
  shuffle($tags);
  $tag_count = count($tags);
  $limit = min($tag_count, 10);
  $output = '<ul>';
  for ($i = 0; $i < $limit; $i++) {
    $tag = $tags[$i];
    $output .= '<li>' . '<h4>' . $tag->name . '</h4><p>categories in which at least one article uses the selected tag</p><div>';
    $tag_posts = get_posts(array('tag' => $tag->slug));
    $categories = array();
    foreach ($tag_posts as $post) {
      $post_categories = get_the_category($post->ID);
      foreach ($post_categories as $category) {
        if (!in_array($category->term_id, $categories)) {
          $categories[] = $category->term_id;
        }
      }
    }
    if ($categories) {
      foreach ($categories as $category_id) {
        $category = get_category($category_id);
        $output .= '<a href="' . get_category_link($category_id) . '">' . $category->name . '</a> ';
      }
    } else {
      $output .= 'Not used in any categories.';
    }
    $output .= '</div><a href="' . get_tag_link($tag->term_id) . '">go to tag page</a></li>';
  }
  $output .= '</ul>';
  return $output;
}
add_shortcode('display_random_tags_with_categories', 'display_random_tags_with_categories_shortcode');