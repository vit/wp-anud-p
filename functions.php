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







add_filter('tribe_events_category_slug', 'fix_tribe_events_category_slug_func');
function fix_tribe_events_category_slug_func($slug){
    return 'category';
}


//add_rewrite_rule( 'conference/?$', 'index.php?messagetypes=tribe_events', 'top' );


add_action('init', 'custom_permastruct_rewrite');
function custom_permastruct_rewrite() {
    global $wp_rewrite;

    $wp_rewrite->add_rewrite_tag("%slug%", '([^/]+)', "post_type=tribe_events&name=");
    $wp_rewrite->add_rewrite_tag("%slug%", '([^/]+)', "post_type=tribe_events&name=");
    $wp_rewrite->add_permastruct('my_conference_rule', '/conf/%slug%', false);
    $wp_rewrite->add_permastruct('my_meeting_rule', '/meeting/%slug%', false);
}


function anud_post_type_link_func( $url, $post ) {
    if ( 'tribe_events' == get_post_type( $post ) ) {
//        return add_query_arg( $_GET, $url );
//        return add_query_arg( array('a' => 'aa'), $url );

        $prefix = "conf/";

        $terms = get_the_terms( $post, 'tribe_events_cat' );

        $cat_slug = null;
        if( $terms[0] )
            $cat_slug = $terms[0]->slug;
        if( $cat_slug == "meetings" )
            $prefix = "meeting/";

        $url = home_url($prefix . $post->post_name);
//        $url = add_query_arg( array('a' => 'aa'), $url );


//        wp_die( json_encode( $terms ) );
//        wp_die( json_encode( $terms[0]->parent ) );
//        wp_die( json_encode( $terms[0]->slug ) );
        return $url;
    }
    return $url;
}
add_filter( 'post_type_link', 'anud_post_type_link_func', 10, 2 );


function anud_the_post_action_func( $post_object ) {
    if ( 'tribe_events' == get_post_type( $post_object ) ) {
        //wp_die( json_encode( $post_object->post_parent ) );
//        $post_object->post_parent = 13;
    }
    
}
add_action( 'the_post', 'anud_the_post_action_func' );

function anud_bcn_after_fill_action_func( $bco ) {

//    $parent = get_page_by_path('conferences', OBJECT, 'page');
//    $parent = get_page_by_path('membership/meetings', OBJECT, 'page');
//wp_die( json_encode( $parent ) );

    $cat_map = array(
        'meetings' => 'membership/meetings',
        'conferences' => 'conferences',
        'icins' => 'conferences'
    );

    if ( 'tribe_events' == get_post_type( $post_object ) ) {
        $bc0 = $bco->breadcrumbs[0];
        $bc0_id = $bc0->ID;
        $terms = get_the_terms( get_post($bc0_id), 'tribe_events_cat' );

        $cat_slug = null;
        if( $terms && $terms[0] )
            $cat_slug = $terms[0]->slug;
        $path = $cat_map[$cat_slug];


        $bc = $bco->breadcrumbs[1];
        if( $bc ) {
            $id = $bc->get_id();

            if( $path ) {
                $parent = get_page_by_path($path, OBJECT, 'page');
                $id = $parent->ID;
            }

//            if( $cat_slug == "meetings" ) {
//                //$prefix = "meeting/";
//                $parent = get_page_by_path('membership/meetings', OBJECT, 'page');
//                $id = $parent->ID;
//            }

            $bco->breadcrumbs[1] = new bcn_breadcrumb(
                get_the_title( $id ),
                //get_post_shorter_title( $id ),
                $bco->opt['Hpost_tribe_events_template'],
                $bc->get_types(),
                get_permalink( $id ),
                $id
            );
        }
    }
}
//add_action( 'bcn_before_fill', 'anud_bcn_before_fill_action_func' );
add_action( 'bcn_after_fill', 'anud_bcn_after_fill_action_func' );
//bcn_breadcrumb_trail_object




/*
function anud_get_ancestors_func( $ancestors, $object_id, $object_type, $resource_type ) {
//    if ( 'tribe_events' == get_post_type( $post ) ) {

//    if ( 'tribe_events' == $object_type ) {
//        return add_query_arg( $_GET, $url );
//        return add_query_arg( array('a' => 'aa'), $url );

//wp_die( json_encode( $ancestors ) );
//wp_die( json_encode( $object_type ) );
//wp_die( json_encode( $resource_type ) );

        $ancestors = [];

//    }
    return $ancestors;
}
add_filter( 'get_ancestors', 'anud_get_ancestors_func', 10, 4 );
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


function get_post_shorter_title( $this_id ) {
    $title = get_post_meta($this_id, '_yoast_wpseo_bctitle', true);
    if(!$title)
        $title = get_the_title($this_id);
    return $title;
}; 



function filter_bcn_breadcrumb_title( $title, $this_type, $this_id ) { 
    if ( in_array( 'post-tribe_events-archive', $this_type ) ) {
		$title = __( 'Calendar', 'the-events-calendar' );
	}
    $t = get_post_meta($this_id, '_yoast_wpseo_bctitle', true);
    if($t)
        $title = $t;
    return $title;
}; 
add_filter( 'bcn_breadcrumb_title', 'filter_bcn_breadcrumb_title', 10, 3 ); 



function my_custom_sidebars() {
    for( $i = 0; $i<6; $i++ ) {
        register_sidebar(
            array (
                'name' => __( 'anud_fp_'.$i, 'anud' ),
                'id' => 'anud_fp_'.$i,
                'description' => __( 'Custom Sidebar', 'anud' ),
//                'before_widget' => '<div class="fp-news-item box-collapsable"><div class="gazeta-img-box box-collapsable" style="height: 100%; background-color: #f0f0f0; position: relative;">',
//                'after_widget' => "</div></div>",
                'before_widget' => '<div class="fp-news-item box-collapsable box-item-'.$i.'">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        );
    }
        register_sidebar(
            array (
                'name' => __( 'anud_footer_copyright', 'anud' ),
                'id' => 'anud_footer_copyright',
                'description' => __( 'Footer Copyright Custom Sidebar', 'anud' ),
//                'before_widget' => '<div class="fp-news-item box-collapsable"><div class="gazeta-img-box box-collapsable" style="height: 100%; background-color: #f0f0f0; position: relative;">',
//                'after_widget' => "</div></div>",
                'before_widget' => '<div class="footer-copyright">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        );
}
add_action( 'widgets_init', 'my_custom_sidebars' );






class anud_fp_events_Widget extends WP_Widget {

    public function __construct() {
        $widget_options = array( 
          'classname' => 'anud_fp_events_widget',
          'description' => 'Anud FP events widget',
        );
        parent::__construct( 'anud_fp_events_widget', 'Anud FP Events', $widget_options );
    }

    public function widget( $args, $instance ) {
        /*
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
        $blog_title = get_bloginfo( 'name' );
        $tagline = get_bloginfo( 'description' );
        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
        ?>
            <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>
            <p><strong>Tagline:</strong> <?php echo $tagline ?></p>
        <?php
            echo $args['after_widget'];
        */
        ?>
            <?php // print_r( $args ); ?>
            <?php echo $args['before_widget'] ?>
            <!--div class="fp-news-item box-collapsable"-->
			<div class="box-container">
				<h3 class="entry-title">
					<a href="calendar">Календарь мероприятий</a>
				</h3>
				<ul>
    			<?php
                    $events = tribe_get_events( array( 
                       'posts_per_page' => 5, 
                       'start_date'     => date( 'Y-m-d H:i:s' )
                    ) );
                    foreach ( $events as $event ) {
                    ?>
    				    <li>
    				        <b><?php
                					$event_start_date = tribe_get_start_date( $event );
                					$event_end_date = tribe_get_end_date( $event );
                					echo $event_start_date==$event_end_date ?
                						$event_start_date :
                						$event_start_date."&mdash;".$event_end_date
                                
                            ?></b>:
                            <a href="<?php echo get_permalink($event) ?>">
                                <?php echo get_post_shorter_title($event->ID); ?>
                            </a> |
                            <a style="color: #d02030;" href="<?php echo get_permalink($event) ?>">
                                Подать
                            </a> |
                            <a href="<?php echo get_permalink($event) ?>">
                                Участвовать
                            </a><!-- [<?php echo $event->post_parent ?>] -->
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!--/div-->
            <?php echo $args['after_widget'] ?>
        <?php

    }

/*
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
            </p>
        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }
*/
}

function anud_register_fp_events_Widget() { 
  register_widget( 'anud_fp_events_Widget' );
}
add_action( 'widgets_init', 'anud_register_fp_events_Widget' );









function anud_person_info_shortcode_func( $atts, $content=null ) {
    $a = shortcode_atts( array(
        'name' => null,
        'title' => null,
        'photo_url' => null,
    ), $atts );

    $content = do_shortcode($content);
    
    $title = $a['title'] ? "<b>${a['title']}</b><br/>" : "";
    $img = null;
    if($a['photo_url'])
        $img = <<<END
<img src="{$a['photo_url']}" style="width: 150px; max-width: 30%; float: left; margin: 0px 15px 15px 0px;">
END;
    return <<<END
<div style="-display: flex; -flex-wrap: wrap; margin: 15px 0 15px 0;">
    <h2 style="margin-top: 20px; margin-bottom: 10px; padding: 0;">
        $img
        {$a['name']}
    </h2>
    <p>
        $title
        $content
    </p>
    <div class="clear"></div>
</div>
END;
/*
    return <<<END
<div style="display: flex; flex-wrap: wrap; padding: 10px;">
    <div style="width: 180px; padding: 2px;">
        <img src="{$a['photo_url']}" style="width: 180px;">
    </div>
    <div style="padding: 2px;">
        <h2 style="margin-top: 5px; margin-bottom: 5px;">{$a['name']}</h2>
        <b>{$a['title']}</b>
        <div>
        $content
        </div>
    </div>
</div>
END;
*/
}
add_shortcode( 'anud_person_info', 'anud_person_info_shortcode_func' );



function anud_attraction_info_shortcode_func( $atts, $content=null ) {
    $a = shortcode_atts( array(
        'name' => null,
//        'title' => null,
        'photo_url' => null,
        'site_url' => null,
    ), $atts );

    $content = do_shortcode($content);
    
//    $title = $a['title'] ? "<b>${a['title']}</b><br/>" : "";
    $img = null;
    if($a['photo_url'])
        $img = <<<END
<img src="{$a['photo_url']}" style="width: 150px; max-width: 30%; float: left; margin: 0px 15px 15px 0px;">
END;
    return <<<END
<div style="margin: 15px 0 15px 0;">
    <h2 style="margin-top: 20px; margin-bottom: 10px; padding: 0;">
        <a href="{$a['site_url']}" target=_blank>
        $img
        {$a['name']}
        </a>
    </h2>
    <p>
        $content
    </p>
    <div class="clear"></div>
</div>
END;
}
add_shortcode( 'anud_attraction_info', 'anud_attraction_info_shortcode_func' );








?>