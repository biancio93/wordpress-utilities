function product_image_ing() { 
$product_image_url_std = get_field('image_custom_field');
$product_image_url = '<img src="' . $product_image_url_std . '">';
return $product_image_url;
} 
add_shortcode('short_product_image_ing', 'product_image_ing'); 