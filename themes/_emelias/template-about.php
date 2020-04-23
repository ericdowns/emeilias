<?php /*Template Name: About */ ?>
<?php get_header(); ?>

<div class="full">
	<div class="content-full">
		<div class="section-hero-image-wrapper">
			<!--<img src="https://dummyimage.com/1600x900/fff/ddd">-->			 				
			<img src="<?php bloginfo('template_url'); ?>/imgs/emelia-about.jpg">
		</div> <!-- section-hero-image-wrapper -->
	</div> <!-- content -->
</div> <!-- full -->

<div class="full">
	<div class="content">
		<div class="section-general-content-wrapper narrow">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!--section-general-page-wrapper-->
	</div><!--content-->
</div> <!--full-->
<?php get_footer();?>