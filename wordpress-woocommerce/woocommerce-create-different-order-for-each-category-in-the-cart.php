add_action( 'woocommerce_thankyou', 'split_order_by_category', 10, 1 );

function split_order_by_category( $order_id ) {
    $order = wc_get_order($order_id);

    // Loop through the order items and group them by product category
    $items_by_category = array();
    foreach ($order->get_items() as $item) {
        $product_id = $item->get_product_id();
        $product = wc_get_product($product_id);
        $categories = wp_get_post_terms($product_id, 'product_cat');
        $category = !empty($categories) ? $categories[0]->name : 'Uncategorized';
        if (!isset($items_by_category[$category])) {
            $items_by_category[$category] = array();
        }
        $items_by_category[$category][] = $item;
    }

    // Create a new order for each product category
    foreach ($items_by_category as $category => $items) {
        $new_order = wc_create_order(array(
            'customer_id' => $order->get_customer_id()
        ));
        foreach ($items as $item) {
            $new_order->add_item($item);
        }
        $new_order->calculate_totals();
        $new_order->save();
    }
}
