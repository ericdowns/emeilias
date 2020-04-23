<?php get_header(); ?>
<div class="full">
	<div class="content">
		<div class="section-events-content-wrapper">	
			<h1 class="page-title"><?php the_title();?></h1>
			<?php if (have_posts()): ?>
				<?php while (have_posts()): the_post();?>
					<?php the_content();?>
				<?php endwhile;?>
			<?php endif;?>


			<?php if ( have_rows( 'event_link' ) ) : ?>
				<?php while ( have_rows( 'event_link' ) ) : the_row(); ?>
					<a class="btn left" href="<?php the_sub_field( 'button_link' ); ?>"><?php the_sub_field( 'button_name' ); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>

		</div> <!-- content-wrapper -->

	</div><!--content-->
</div> <!--full-->

<?php get_footer();?>