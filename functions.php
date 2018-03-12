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

?>