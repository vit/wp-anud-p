<?php
/**
 * Template Name: Full-width For Frontpage
 *
 * @package WordPress - Themonic Framework
 * @since Publisho 1.0
 */

get_header(); ?>




<!--div class="top-block" style="height: 50vh; position: relative; background-image: url(https://images.unsplash.com/photo-1445813792994-1d804a9453c9); background-size: cover; bbackground-attachment: fixed; background-position-y: center; z-index: 201; border: thick red solid;">


    <div class="top-block-content" style="width: 100%; position: absolute; bottom: 0; height: 100%; display: flex; flex-direction: column; justify-content: flex-end; z-index: 1; bborder: thin red solid;" ss="display: flex; flex-direction: column; justify-content: flex-end; background-image: url(https://next.elektropribor.spb.ru/wp-content/uploads/2018/02/bob-burkhard-41360-unsplash-1024x629.jpg); background-size: cover; background-position-y: center; z-index: 201;">

        <div style="bborder: thick green solid; pposition: absolute; bbottom: 0; width: 100%;">
        <div class="container" style="display: flex; align-items: flex-end; bborder: thin red solid; pposition: absolute; bbottom: 0;">
            <h1 style="color: white; text-shadow: 1px 1px 2px black;">Главная</h1>
		</div>
        </div>

    </div>
</div-->





	<div id="primary" class="site-content full-width frontpage">
		<div id="content" role="main">


<?php //$catname = esc_attr( get_theme_mod( 'publisho_top_posts' )); ?>
<?php $catname = "latest"; ?>
<?php if ( is_front_page() ) : ?>
	<!--div class="fp-cat-gazeta"-->
		<div class="fp-news-container">


<?php for( $i = 0; $i<6; $i++ ) { ?>
	<?php if ( is_active_sidebar( 'anud_fp_'.$i ) ) : ?>
	    <?php dynamic_sidebar( 'anud_fp_'.$i ); ?>
	<?php endif; ?>
<?php } ?>


		</div>

<div class="-entry-content fp-entry-content">
		<h2 class="entry-title">Новости</h2>

		<div class="fp-news-container">

		<?php
			//$query = new WP_Query("category_name=$catname&showposts=4");
//			$query = new WP_Query("showposts=14");
//			$query = new WP_Query("showposts=15&posts_per_page=15&ignore_stickie_posts=1");
//			$query = new WP_Query("showposts=15&posts_per_page=-1&ignore_stickie_posts=1");
			$query = new WP_Query("showposts=9&posts_per_page=-1&ignore_stickie_posts=1");

			while ($query->have_posts()) : $query->the_post();
			$do_not_duplicate[] = get_the_ID();
		?>
         <div class="fp-news-item fp-news-item-2" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>);">
		<a style="display: block; position: absolute; top: 0; bottom: 0; left: 0; right: 0; -border: thin solid red;" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

			<!--div  class=gazeta-img-box style="position: relative; -top:0; -bottom:0; background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?>);"-->
					<h3 class="entry-title" style="-height: 30%; text-align: center; position: absolute; bottom: 0; left: 0; right: 0; -width: 100%; -border: thin solid green; padding: 3%; background-color: rgba(220,220,220,0.9);">
						<?php the_title(); ?>
					</h3>
			<!--/div-->

		</a>
	    </div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>
</div>

	<!--/div-->
	<div class="clear"></div>
<?php endif; ?>



<div>
<?php /*
$args = array(
//    'name' => 'genre'
);
$output = 'objects'; // or names
$taxonomies= get_taxonomies( $args, $output ); 
if ( $taxonomies ) {
    foreach ( $taxonomies as $taxonomy ) {
//        echo '<div>' . $taxonomy->labels->name . '</div>';
        echo '<br />';
        echo '<div>';
	        echo "name: ".$taxonomy->name;
			echo '<br />';
	        //echo 'labels:';
			//print_r( $taxonomy->labels );
			//echo '<br />';
	        echo "object_type: ";
			print_r( $taxonomy->object_type );
			echo '<br />';
	        echo "cap: ";
			print_r( $taxonomy->cap );
			echo '<br />';
	        echo "rewrite: ";
			print_r( $taxonomy->rewrite );
			echo '<br />';

			echo '<br />';
			print_r( $taxonomy );
        echo '</div>';
        echo '<br />';
    }
}  
*/ ?>
</div>

<div>
<?php
/*
	global $wp_filter;
	print_r($wp_filter['the_content']);
*/
?>
</div>



			<?php // while ( have_posts() ) : the_post(); ?>
				<?php // get_template_part( 'content', 'page' ); ?>
				<?php // // comments_template( '', true ); ?>
			<?php // endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>