<section class="fp1-row fp1-news">
    <h1>Новости и сообщения</h1>


    <div class="news-columns">
        <div class="news-column news-column-1">

        	<div class="news-container">

				<?php
					$catname = "news";

					//$query = new WP_Query("category_name=$catname&showposts=4");
					//$query = new WP_Query("showposts=9&posts_per_page=-1&ignore_stickie_posts=1");
//					$query = new WP_Query("category_name=$catname&showposts=9&posts_per_page=-1&ignore_stickie_posts=1");
					$query = new WP_Query("category_name=$catname&showposts=4&posts_per_page=-1&ignore_stickie_posts=1");

					while ($query->have_posts()) : $query->the_post();
						$do_not_duplicate[] = get_the_ID();
				?>
					<div class="news-item-1" -style="border: 3px solid blue;" -style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>);">
	    				<!--div class="" style="width: 100%; height: 66%; background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>);">
    					</div-->
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    					    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>">
						</a>
						<div class="news-item-content">
    						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    							<h3 class="entry-title" sstyle="-height: 30%; text-align: center; position: absolute; bottom: 0; left: 0; right: 0; -width: 100%; -border: thin solid green; padding: 3%; background-color: rgba(220,220,220,0.9);">
    								<?php the_title(); ?>
    							</h3>
    						</a>
    					</div>
					</div>
				<?php
					endwhile;
				?>
				<?php wp_reset_postdata(); ?>

            </div>

            <div class="news-news-bottom-link">
                <a class="anud-button -half-transparent -news-button -button-secondary" href="<?php echo get_term_link( get_category_by_slug( "news" ) ); ?>">
                    Все новости
                </a>
            </div>

        </div>

        <div class="news-column news-column-2">
        	<div class="news-gazeta-container">


				<?php
					$catname = "gazeta";

					$query = new WP_Query("category_name=$catname&showposts=1&posts_per_page=-1&ignore_stickie_posts=1");

					while ($query->have_posts()) : $query->the_post();
						$do_not_duplicate[] = get_the_ID();
				?>
					<div class="news-gazeta-item-1" -style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>);">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    					    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>">
						</a>
						<div class="news-gazeta-item-content">
    						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    							<h3 class="entry-title">
    								<?php the_title(); ?>
    							</h3>
    						</a>
    					</div>

                        <div class="news-gazeta-bottom-link">
                            <a class="anud-button -half-transparent -news-button -button-secondary" href="<?php echo get_term_link( get_category_by_slug( "gazeta" ) ); ?>">
                                Все номера
                            </a>
                        </div>

					</div>
				<?php
					endwhile;
				?>
				<?php wp_reset_postdata(); ?>

            </div>
        	<div class="news-notices-container entry-content">
                <h2 class="entry-title">Сообщения</h3>
        	    <ul -style="list-style-type: none; margin: 0; padding: 0;">

    				<?php
    					$catname = "notices";
                        $query = new WP_Query("category_name=$catname&showposts=5&posts_per_page=-1&ignore_stickie_posts=1");
    
    					while ($query->have_posts()) : $query->the_post();
    						$do_not_duplicate[] = get_the_ID();
    				?>
            	        <li>
    						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    							<?php the_title(); ?>
    						</a>
            	        </li>
    				<?php
    					endwhile;
    				?>
    				<?php wp_reset_postdata(); ?>


        	    </ul>
                        <div class="news-notices-bottom-link"  -style="text-align: center;">
                            <a class="anud-button -half-transparent -news-button -button-secondary" href="<?php echo get_term_link( get_category_by_slug( "notices" ) ); ?>">
                                Все сообщения
                            </a>
                        </div>
            </div>
        </div>

    </div>


</section>