<?php
/**
 * Template Name: Frontpage 1
 *
 * @package WordPress - Themonic Framework
 * @since Publisho 1.0
 */


/*
$GLOBALS['FP_VERSION'] = 1;
$GLOBALS['FP_SHOW_HERO'] = 1;
$GLOBALS['FP_COL_ORDER_R'] = 1;
$GLOBALS['FP_NO_SHADOW'] = 0;


if( isset( $_GET['FP_SHOW_HERO'] ) ) {
	$GLOBALS['FP_SHOW_HERO'] = $_GET['FP_SHOW_HERO'];
}
if( isset( $_GET['FP_COL_ORDER_R'] ) ) {
	$GLOBALS['FP_COL_ORDER_R'] = $_GET['FP_COL_ORDER_R'];
}
if( isset( $_GET['FP_NO_SHADOW'] ) ) {
	$GLOBALS['FP_NO_SHADOW'] = $_GET['FP_NO_SHADOW'];
}


if( isset( $_GET['FP_VERSION'] ) ) {
	$GLOBALS['FP_VERSION'] = $_GET['FP_VERSION'];
}


switch( $GLOBALS['FP_VERSION'] ) {
	case 2:
		$GLOBALS['FP_SHOW_HERO'] = 0;
		$GLOBALS['FP_COL_ORDER_R'] = 0;
}
*/

$GLOBALS['IS_FRONTPAGE'] = 1;

get_header(); ?>

<div id="primary" class="site-content full-width frontpage frontpage-1">
	<div id="content" role="main" -class="<?php if($GLOBALS['FP_NO_SHADOW']) echo 'fp-no-shadow'; ?>">


<?php get_template_part( 'partials/frontpage/fp-1', 'hero' ); ?>
<?php get_template_part( 'partials/frontpage/fp-1', 'news' ); ?>
<?php get_template_part( 'partials/frontpage/fp-1', 'conferences' ); ?>
<?php get_template_part( 'partials/frontpage/fp-1', 'journal' ); ?>


<?php /* ?>

	<div id="home-main-content" style="-display: flex; -border: thin dotted blue;">

		<div class="fp-entry-content fp-widgets-container" style="<?php if( ! $GLOBALS['FP_COL_ORDER_R'] ) echo 'order: inherit;'; ?>">
			<h2 class="entry-title fp-first-title">Деятельность</h2>
			<div class="-fp-news-container fp-widgets-content -fp-news-content" -style="border: thin solid red;">
				<?php for( $i = 0; $i<6; $i++ ) { ?>
					<?php if ( is_active_sidebar( 'anud_fp_'.$i ) ) : ?>
					    <?php dynamic_sidebar( 'anud_fp_'.$i ); ?>
					<?php endif; ?>
				<?php } ?>
			</div>
		</div>

		<div class="fp-entry-content fp-news-container" -style="border: thin dotted green;">
			<h2 class="entry-title">Главные новости</h2>
			<div class="-fp-news-container fp-news-content" -style="border: thin solid green;">
				<?php
					//$catname = esc_attr( get_theme_mod( 'publisho_top_posts' ));
					$catname = "gazeta,common";

					//$query = new WP_Query("category_name=$catname&showposts=4");
					//$query = new WP_Query("showposts=9&posts_per_page=-1&ignore_stickie_posts=1");
//					$query = new WP_Query("category_name=$catname&showposts=9&posts_per_page=-1&ignore_stickie_posts=1");
					$query = new WP_Query("category_name=$catname&showposts=6&posts_per_page=-1&ignore_stickie_posts=1");

					while ($query->have_posts()) : $query->the_post();
						$do_not_duplicate[] = get_the_ID();
				?>
					<div class="fp-news-item fp-news-item-2" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>);">
						<a style="display: block; position: absolute; top: 0; bottom: 0; left: 0; right: 0; -border: thin solid red;" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
							<h3 class="entry-title" style="-height: 30%; text-align: center; position: absolute; bottom: 0; left: 0; right: 0; -width: 100%; -border: thin solid green; padding: 3%; background-color: rgba(220,220,220,0.9);">
								<?php the_title(); ?>
							</h3>
						</a>
					</div>
				<?php
					endwhile;
				?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

		<div class="clear"></div>

	</div><!-- end home-main-content -->

<?php */ ?>

	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>