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
                            </a>
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
    return <<<END
<div style="-display: flex; -flex-wrap: wrap; margin: 15px 0 15px 0;">
    <h2 style="margin-top: 20px; margin-bottom: 10px; padding: 0;">
        <img src="{$a['photo_url']}" style="width: 150px; max-width: 30%; float: left; margin: 0px 15px 15px 0px;">
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







?>