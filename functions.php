<?php

// Disable nl to p
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style';
    $t = time();
    wp_enqueue_style( $parent_style, get_template_directory_uri() . "/style.css" );
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . "/style.css?$t",
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}

/*
function wmpudev_enqueue_icon_stylesheet() {
    wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );
*/

/*
add_filter('pre_get_posts', 'per_category_basis_gazeta');
function per_category_basis_gazeta($query){
    if ($query->is_category) {
        if (is_category('gazeta')){
            $query->set('posts_per_page', 2);
        }
        // category With ID = 32 show only 5 posts
        //if (is_category('32'){
        //    $query->set('posts_per_page', 5);
        //}
    }
    return $query;
}
*/




/*
function filter_events_title( $title ) {
//	if ( tribe_is_upcoming() && ! is_tax() ) {
		$title = 'List view: upcoming events page';
//	}
	return $title;
}
add_filter( 'tribe_events_title_tag', 'filter_events_title' );
*/


function filter_bcn_breadcrumb_title( $title, $this_type, $this_id ) { 
    // post-tribe_events-archive

    if ( in_array( 'post-tribe_events-archive', $this_type ) ) {
//		$title = 'Календарь';
		$title = __( 'Calendar', 'the-events-calendar' );
	}
    $t = get_post_meta($this_id, '_yoast_wpseo_bctitle', true);
    if($t)
        $title = $t;
    return $title;
}; 
add_filter( 'bcn_breadcrumb_title', 'filter_bcn_breadcrumb_title', 10, 3 ); 


?>