<div class="section-home-events-item">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<h6 class="event-date"> <?php the_field( 'start_date' ); ?> - <?php the_field( 'end_date' ); ?> </h6>
	<?php if (has_excerpt() ) { ?>
		<p><?php the_excerpt();?></p>			
	<?php } else { ?>
		<?php the_content(); ?>
	<?php } ?>
</div>