function display_woocommerce_categories() {
    $args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'name',
        'show_count'   => 0,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 0
    );
    
    ob_start();
    wp_list_categories( $args );
    $categories = ob_get_clean();
    
    return $categories;
}
add_shortcode( 'woocommerce_categories', 'display_woocommerce_categories' );