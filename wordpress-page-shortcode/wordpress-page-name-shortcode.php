function page_title_sc( ){
   return get_the_title();
}
add_shortcode( 'page_title', 'page_title_sc' );