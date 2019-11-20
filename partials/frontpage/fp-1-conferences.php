<section class="fp1-row fp1-conferences">


<?php if( get_locale()=='ru_RU' ) { ?>
<?php } else { ?>
<?php } ?>


<?php if( get_locale()=='ru_RU' ) { ?>
    <h1>Предстоящие конференции</h1>
<?php } else { ?>
    <h1>Upcoming Conferences</h1>
<?php } ?>

	<div class="events-container">
<?php ///* ?>
		<?php
            $events = tribe_get_events( array( 
                'eventDisplay'=>'upcoming',
                'posts_per_page' => 5,
                //'posts_per_page' => 3,
                //'start_date'     => date( 'Y-m-d H:i:s' )

                'tax_query'=> array(
                    array(
                        'taxonomy' => 'tribe_events_cat',
                        'field' => 'slug',
                        'terms' => 'conferences'
                    )
                )

            ) );
///*
            $events_list = array();
            foreach ( $events as $event ) {
        		$event->submission_open = !!get_post_meta($event->ID, 'submission_open', true);
        		$event->registration_open = !!get_post_meta($event->ID, 'registration_open', true);
        		$events_list[] = $event;
            }

            while( count($events_list) > 3) {
                if( !end($events_list)->submission_open && !end($events_list)->registration_open ) {
                    array_pop( $events_list );
                }
            }

            foreach ( $events_list as $event ) {
        		//$submission_open = get_post_meta($event->ID, 'submission_open', true);
        		//$registration_open = get_post_meta($event->ID, 'registration_open', true);
            ?>
			    <div class="events-item entry-content" -style="position: relative;">
			        <div class="date" style="font-size: 120%;"><?php
        					$event_start_date = tribe_get_start_date( $event );
        					$event_end_date = tribe_get_end_date( $event );
        					echo $event_start_date==$event_end_date ?
        						$event_start_date :
        						$event_start_date."&mdash;".$event_end_date

                    ?></div>
                    <h3>
                        <a href="<?php echo get_permalink($event) ?>">
                        <?php //echo get_post_shorter_title($event->ID); ?>
                        <?php echo wpautop( $event->post_title ); ?>
                        </a>
                    </h3>
                    <div class="event-content">
                        <?php //echo the_content($event->ID); ?>
                        <?php //echo wpautop( $event->post_content ); ?>
                        <?php echo wpautop( $event->post_excerpt ); ?>
                    </div>
                    <div -style="position: absolute; bottom: 0; padding: 10px;" style="text-align: right;">
                        <?php if( $event->submission_open ) { ?>
                        <a class="event-button" -style="color: #d02030;" href="<?php echo get_permalink($event).'#submit_paper' ?>">
                            Подать доклад
                        </a><?php } ?><?php if( $event->registration_open ) { ?>
                        <a class="event-button" -style="color: #d02030;" href="<?php echo get_permalink($event).'#register' ?>">
                            Регистрация
                        </a><?php } ?>
                    </div>
                </div>
            <?php
            }
//*/
        ?>

			    <!--div class="events-item entry-content" -style="position: relative;">
                    <div style="text-align: right;">
                        <?php
                            $category = get_term_by('slug', 'conferences', 'tribe_events_cat');
                        ?>
                        <a class="event-button" -style="color: #d02030;" href="<?php echo get_term_link($category); ?>">
                            Все конференции
                        </a>
                    </div>
                </div-->

<?php //*/ ?>
    </div>

    <!--div class="events-all-link">
        <a class="event-button" href="<?php echo get_term_link( 'conferences', 'tribe_events_cat' ); ?>">
            Все конференции
        </a>
    </div-->

</section>