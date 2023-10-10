add_action('woocommerce_checkout_shipping', 'checkout_custom_field');

function checkout_custom_field() {
	$product_cat_target = 23;
	$product_cart_qt = WC()->cart->get_cart_contents_count();
	$product_categories = array();
	if( $product_cart_qt == 1) {
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$product_id = $cart_item['product_id'];
		$terms = get_the_terms( $product_id, 'product_cat' );
		foreach ($terms as $term) {
    		$product_cat_id = $term->term_id;
			array_push($product_categories, $product_cat_id);
		}
		if(in_array($product_cat_target, $product_categories)){
			echo("<h2 class='bg-banner-check'><img src='[image url]' alt='...' >Regala l'abbonamento!</h2>");
		}
	}
}
}