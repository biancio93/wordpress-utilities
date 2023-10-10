function custom_login_redirect($redirect_to, $request, $user) {
    // Change 'your-homepage-url' to your actual homepage URL
    return home_url('/homepage');
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);