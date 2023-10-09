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
	$category_image = '<img class="cat-img-thumb" src="' . get_field('immagine_categoria', $category) . '" />';
	$category_element = '<div class="contianer-category-card">' . '<div class="col-left">' . $category_image . '<p class="article-count">' . $category_count . ' <span>Articoli presenti</span></p>' . '</div>' . '<div class="col-right"><a class="category-list-title" href="' . $category_link . '">' . '<h3>' . $category_name . '</h3>' . '</a>' . $category_description . '<a class="more-link" href="' . $category_link . '">Vai alla categoria</a></div></div>';
	$category_Archive = $category_Archive . $category_element;
}
	 return '<div class="col-md-4">' . $category_Archive . '</div>';
}
add_shortcode('shortcode_categories_list', 'create_shortcode_categories_list');