function create_shortcode_categories_list_simple(){
    $categories = get_categories( array(
	'orderby' => 'rand',
    'order' => 'ASC'
) );
    foreach($categories as $category) {
	$category_link = get_category_link($category->term_id);
	$category_name = $category->name;
	$category_element = '<a href=' . $category_link . '">' . $category_name . '</a>';
	$category_Archive = $category_Archive . $category_element;
}
	 return '<div>' . $category_Archive . '</div>';
}
add_shortcode('shortcode_categories_list_simple', 'create_shortcode_categories_list_simple');