<?php /*Template Name: Home Template */?><?php get_header(); ?><div class="full">	<div class="content">		<div class="section-home-hero-wrapper border">			<h3>Welcome Home Ya'll</h3>		</div>	</div> <!-- content --></div><!--fulll--><div class="full">	<div class="content">		<div class="section-product-type-wrapper">			<div class="section-product-type_item">				<p>section-product-type_item</p>			</div>			<div class="section-product-type_item">				<p>section-product-type_item</p>			</div>			<div class="section-product-type_item">				<p>section-product-type_item</p>			</div>			<div class="section-product-type_item">				<p>section-product-type_item</p>			</div>			<div class="section-product-type_item">				<p>section-product-type_item</p>			</div>			<div class="section-product-type_item">				<p>section-product-type_item</p>			</div>		</div> <!-- section-product-type-wrapper -->	</div><!--content--></div> <!--full--><div class="full">	<div class="content">				<?php 		$args = array(			'post_type' => 'events',			'post_status' => 'publish',			'posts_per_page' => 3,			'meta_key' => 'start_date',			'orderby' => 'meta_value',			'order' => 'ASC',		);?>		<?php  $query = new WP_Query($args);?>		<?php if ($query->have_posts()) :?>			<div class="section-home-events-wrapper">				<div class="section-title">					<h2>Upcoming Events</h2>				</div> <!-- section-title -->								<?php while ($query->have_posts()) : $query->the_post();  ?>					<?php get_template_part('inc/loop-events');?>				<?php endwhile; ?>			</div> <!-- section-home-events-wrapper -->		<?php endif; ?>		<?php wp_reset_postdata(); ?>	</div></div><div class="full">	<div class="content">		<?php echo do_shortcode( '[products limit="3" columns="3" orderby="popularity" class="quick-sale"]' );?>	</div><!--content--></div> <!--full--><?php get_footer(); ?>