<?php /*Template Name: About */ ?>
<?php get_header(); ?>
<div class="full">
	<div class="content">
		<div class="section-general-content-wrapper ">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!--section-general-page-wrapper-->
	</div><!--content-->
</div> <!--full-->
<?php get_footer();?>