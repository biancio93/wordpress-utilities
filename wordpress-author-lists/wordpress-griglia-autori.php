function author_grid() {
	$roles = array('editor', 'administrator', 'author');
	$users = array();
	foreach($roles as $role){
	$args = array(
    'blog_id' => 1,
    'orderby' => 'nicename',
    'role' => $role
);
	$current_role_users = get_users($args);
    $users = array_merge($current_role_users, $users);	
	}
$users_Count = count($users);
for($x=0; $x<$users_Count; $x++){
	$display_Cat = '';
	$cat_Name_Group = array();
	$user_Single = $users[$x];
	$user_Name = "<h4 class='author-title'>" . $user_Single->display_name . "</h4>";
	$user_ID = $user_Single->ID;
	$user_Avatar_Url = get_avatar_url($user_ID, ['size' => '300']);
	$user_PostNumber = count_user_posts($user_ID);
	if($user_PostNumber >= 1){
		$user_Args = array(
    		'author' => $user_ID,
			'fields' => 'ids'
    	);
		$user_Post_Array = get_posts($user_Args);
		$user_Post_Qt = count($user_Post_Array);
		foreach ($user_Post_Array as $post) {
			$cat_title = wp_get_post_categories($post);
			foreach ( $cat_title as $categories ){
				$cat_Name = get_cat_name( $categories );
				array_push($cat_Name_Group, $cat_Name);
			}
        }
		$result = array_unique($cat_Name_Group);
		foreach($result as $cat_Name){
		$display_Cat = $display_Cat . "<span class='highlight-category'>" . $cat_Name . "</span>";
		}
		$user_Archive = $user_Archive . "<a class='author-card' href='" . get_author_posts_url($user_ID) . "'>" . "<div class='container-profile-image'>" . "<img src='" . $user_Avatar_Url . "' /></div>" . "<div class='container-author-meta'>" . $user_Name . "<p class='author-container-cat'> Le categorie per cui scrivo:<br>" . $display_Cat . "</p>" . "<p class='more-link'>Altri articoli dell'autore</p></div></a>";
	}else{}
	$user_List = "<div class='container-authors'>" . $user_Archive . "</div>";
}
	
	return $user_List;
}
add_shortcode('author_grid_shortcode', 'author_grid');