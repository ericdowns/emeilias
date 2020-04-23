<?php get_header();?>
<div class="wrapper">
	<div class="full">
		<div class="content">

			<div class="section-general-content-wrapper section-search-page narrow">	

				<!--https://github.com/cftp/relevanssi-acf-subfields-->
				<!--// title, credentials, key_projects,key_projects_%_project_title //-->

				<div class="section-search-page_result_title">
					<h2>Search Results for: <?php echo get_search_query(); ?></h2>
				</div><!--section-search-page_result_title-->


				<div class="content-wrapper">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="section-search-page_results_single">

							<?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $title); ?>
							<h4><?php $post_type = get_post_type_object( get_post_type($post) ); echo $post_type->label ; ?></h4>
							<h2><a href="<?php the_permalink() ?>"><?php echo $title; ?></a></h2>

							<p>
								<?php $excerpt = get_the_excerpt();
$keys = explode(" ",$s); //$s holds the search terms
$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<span style="color:#404086;">\0</span>',$excerpt); echo $excerpt;  ?> 
</p>
</div> <!-- section-search-page_results_single -->


<?php endwhile; ?>
<?php previous_posts_link('&laquo; Previous Results') ?>
<?php next_posts_link('More Results &raquo;') ?>
<?php else : ?>
	<p>Sorry, there are no results for "<?php echo get_search_query(); ?>"</p>
	<?php get_search_form( ); ?>
<?php endif; ?>

</div> <!--section-search-page_results-->
</div> <!-- secion-search-page -->


</div><!--content-->
</div> <!--full-->
</div> <!-- wrapper -->
<?php get_footer();?>