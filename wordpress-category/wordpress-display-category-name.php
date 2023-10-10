function category_name_shortcode($atts) {
    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts );
    
    if ( isset( $atts['id'] ) ) {
        $category = get_category( $atts['id'] );
    } else {
        $category = get_queried_object();
    }

    return $category->name;
}
add_shortcode('category_name', 'category_name_shortcode');