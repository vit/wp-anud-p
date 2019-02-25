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
	<div class="iofeaturepost-two">
		<ul>
		<?php
			$query = new WP_Query("category_name=$catname&showposts=4");
			while ($query->have_posts()) : $query->the_post();
			$do_not_duplicate[] = get_the_ID();
		?>
         <li>
			<div class="iofeaturedblock">
				<div class="catpostimage"><?php the_post_thumbnail('publisho-large', 'class=alignleft'); ?></div>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'publisho' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
			</div>
	    </li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</ul>
	</div><div class="clear"></div>
<?php endif; ?>



					<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php // comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>