<?php get_header(); ?>
<div class="full">
	<div class="content">
		<div class="section-general-content-wrapper faq-page">	

			<div class="page-sidebar-wrapper">
				<div class="page-sidebar">
					<h4>Don’t see what your looking for?</h4>
					<p>We’re happy to help shoot us a message and we’ll get back to you in a jiffy.</p>
				</div>
			</div> <!-- page-sidebar -->

			<div class="content-wrapper has-sidebar ">
				<h1 class="page-title"><?php the_title();?></h1>
				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post();?>
						<?php the_content();?>
					<?php endwhile;?>
				<?php endif;?>
			</div> <!-- content-wrapper -->

		</div> <!-- section-general-content-wrapper -->
	</div><!--content-->
</div> <!--full-->

<?php get_footer();?>