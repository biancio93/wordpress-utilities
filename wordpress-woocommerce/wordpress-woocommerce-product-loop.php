function product_category_list_STD(){
	$page_ID = get_queried_object_id();
	add_filter( 'get_the_archive_title_prefix', '__return_false' );
	$page_Name = get_the_archive_title();
    $query = new WC_Product_Query( array(
		'category' => $page_Name,
    	'orderby' => 'date',
    	'order' => 'DESC',
    	'return' => 'ids',
		'status' => 'publish',
		'limit' => 20
	) );
	$products = $query->get_products();
	foreach ($products as $product){
		$product_type_title_red = get_the_title($product);
		$product_type_description_red = get_the_excerpt($product);
		$product_url = get_permalink($product);
		$featured_img_url = get_the_post_thumbnail_url($product);
		$featured_img = '<img src="' . $featured_img_url . '">';
		$product_type_title = '<h3>' . $product_type_title_red . '</h3>';
		$product_type_description = "<p>" . $product_type_description_red . "</p>";
		$product_card = '<div><a href="' . $product_url . '">' . $featured_img . $product_type_title . $product_type_description . '</a></div>';
		$img_grid = $img_grid . $product_card;
	}
    return '<div>' . $img_grid . '</div>';
}
add_shortcode('shortcode_product_category_list_STD', 'product_category_list_STD');