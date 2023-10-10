function display_last_four_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'slug' => 'categoria-di-test-1',
    ), $atts, 'last_four_products');

    $category = get_term_by('slug', $atts['slug'], 'product_cat');

    if (!$category) {
        return 'Invalid category slug';
    }

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $category->term_id,
            ),
        ),
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $output .= '<li>';
            $output .= '<a href="' . get_permalink() . '">';
			$output .= '<div >';
            $output .= get_the_post_thumbnail($product->get_id(), 'thumbnail');
			$output .= '</div>';
            $output .= '<p >';
            $output .= get_the_title();
			$output .= '</p>';
            $output .= '</a>';
            $output .= '</li>';
        }
        $output .= '</ul>';
    } else {
        $output = 'No products found';
    }

    wp_reset_postdata();

    return $output;
}
add_shortcode('last_four_products', 'display_last_four_products_shortcode');