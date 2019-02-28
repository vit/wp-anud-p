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


<!--
         <div class="fp-news-item box-collapsable">

					<div style="-z-index: 1; -height: 30%; -text-align: center; -position: absolute; position: relative; top: 0; -border: thin solid green; padding: 3%; -background-color: rgba(220,220,220,0.9);">
						<h3 class="entry-title">
							<a href="calendar">Календарь мероприятий</a>
						</h3>
						<ul style="margin: 5px 0px 5px 10px;">
							<?php
$events = tribe_get_events( array( 
   'posts_per_page' => 5, 
   'start_date'     => date( 'Y-m-d H:i:s' )
) );
foreach ( $events as $event ) {
?>
							<li style="list-style: disc; margin: 10px;"><b><?php
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
<?
}
							?>
						</ul>
					</div>
	    </div>


        <div class="fp-news-item box-collapsable" sstyle="flex-grow: 2;">
					<div style="position: relative; top: 0; padding: 3%; -background-color: rgba(220,220,220,0.9);">
						<h3 class="entry-title">
							Журнал "Гироскопия и навигация"
						</h3>
						<ul style="margin: 5px 0px 5px 10px;">
							<li style="list-style: disc; margin: 10px;">
								<a href="journal">О журнале</a> | <a target="_blank" href="http://www.elektropribor.spb.ru/nauchnaya-deyatelnost/zhurnal/obshchaya-informatsiya/">главный сайт</a>
							</li>
							<li style="list-style: disc; margin: 10px;">
								Читать на
								<a target="_blank" href="http://www.elektropribor.spb.ru/nauchnaya-deyatelnost/zhurnal/elektronnaya-versiya/">русском</a> |
								<a target="_blank" href="https://link.springer.com/journal/13140">английском</a>
							</li>
							<li style="list-style: disc; margin: 10px;">
								<a target="_blank" href="https://gn.comsep.ru">Подать | рецензировать</a>
							</li>
						</ul>
					</div>
	    </div>
-->





		<?php
			//$query = new WP_Query("category_name=$catname&showposts=4");
//			$query = new WP_Query("showposts=14");
//			$query = new WP_Query("showposts=15&posts_per_page=15&ignore_stickie_posts=1");
//			$query = new WP_Query("showposts=15&posts_per_page=-1&ignore_stickie_posts=1");
			$query = new WP_Query("showposts=10&posts_per_page=-1&ignore_stickie_posts=1");

			while ($query->have_posts()) : $query->the_post();
			$do_not_duplicate[] = get_the_ID();
		?>
         <li class="fp-news-item" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>);">
		<a style="display: block; position: absolute; top: 0; bottom: 0; left: 0; right: 0; -border: thin solid red;" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

			<!--div  class=gazeta-img-box style="position: relative; -top:0; -bottom:0; background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?>);"-->
					<h3 class="entry-title" style="-height: 30%; text-align: center; position: absolute; bottom: 0; left: 0; right: 0; -width: 100%; -border: thin solid green; padding: 3%; background-color: rgba(220,220,220,0.9);">
						<?php the_title(); ?>
					</h3>
			<!--/div-->

		</a>
	    </li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>
	<!--/div-->
	<div class="clear"></div>
<?php endif; ?>





			<?php // while ( have_posts() ) : the_post(); ?>
				<?php // get_template_part( 'content', 'page' ); ?>
				<?php // // comments_template( '', true ); ?>
			<?php // endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>