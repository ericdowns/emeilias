<?php /*Template Name: Appointments */ ?>
<?php get_header(); ?>

<div class="full text-center">
	<div class="content">
		<div class="section-general-content-wrapper ">
			<h3>Appointment Request Form</h3>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!--column75-->
	</div><!--content-->
</div> <!--full-->


<?php get_footer();?>