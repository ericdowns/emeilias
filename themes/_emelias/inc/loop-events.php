<div class="section-home-events-item">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<h6 class="event-date"> <?php the_field( 'start_date' ); ?> - <?php the_field( 'end_date' ); ?> </h6>
	<?php if (has_excerpt() ) { ?>
		<p><?php the_excerpt();?></p>			
	<?php } else { ?>
		<p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
	<?php } ?>


	<?php if ( have_rows( 'event_link' ) ) : ?>
		<?php while ( have_rows( 'event_link' ) ) : the_row(); ?>
			<a class="btn" href="<?php the_sub_field( 'button_link' ); ?>"><?php the_sub_field( 'button_name' ); ?></a>
		<?php endwhile; ?>
	<?php endif; ?>


</div>