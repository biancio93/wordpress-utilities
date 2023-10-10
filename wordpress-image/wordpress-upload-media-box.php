function custom_image_size() {
    // Set default values for the upload media box
    update_option('image_default_align', 'center' );
    update_option('image_default_size', 'large' );

}
add_action('after_setup_theme', 'custom_image_size');