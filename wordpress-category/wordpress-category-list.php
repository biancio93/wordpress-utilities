function create_shortcode_categories_list(){
    $categories = get_categories( array(
	'orderby' => 'rand',
    'order' => 'ASC'
) );
    foreach($categories as $category) {
	$category_link = get_category_link($category->term_id);
	$category_name = $category->name;
	$category_description = category_description($category);
	$category_articles = get_category($category);
	$category_count = $category_articles->count;
	$category_image = '<img src="' . get_field('cat_image', $category) . '" />';
	$category_element = '<div>' . '<div>' . $category_image . '<p>' . $category_count . ' <span>Post in this category</span></p>' . '</div>' . '<div><a href="' . $category_link . '">' . '<h3>' . $category_name . '</h3>' . '</a>' . $category_description . '<a href="' . $category_link . '">Go to the category archive page</a></div></div>';
	$category_Archive = $category_Archive . $category_element;
}
	 return '<div>' . $category_Archive . '</div>';
}
add_shortcode('shortcode_categories_list', 'create_shortcode_categories_list');