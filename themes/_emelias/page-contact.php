<?php get_header(); ?>
<div class="full">
	<div class="content">
		<div class="section-contact-page-wrapper border">
			<div class="section-contact-left">
				<h1 class="page-title"><?php the_title();?></h1>
				<p> Take a moment to fill out or form and we'll get back to you in a jiffy.</p>
				<p>
					727.281.4497
				</p>
				<p>
					info@emeliasapothecary.com
				</p>
				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post();?>
						<?php the_content();?>
					<?php endwhile;?>
				<?php endif;?>
			</div> <!-- section-contact-left -->
			<div class="section-contact-right">
				<?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
			</div> 	<!-- section-contact-right -->
		</div> <!-- section-contact-page-wrapper -->
		<div class="section-contact-page-wrapper border">
			<div class="section-hours-location-item">
				<h4>Hours</h4>	
				<p>
					<?php if ( have_rows( 'hours', 'option' ) ) : ?>
						<?php while ( have_rows( 'hours', 'option' ) ) : the_row(); ?>
							<?php the_sub_field( 'day_and_time' ); ?><br>
						<?php endwhile; ?>
					<?php endif; ?>
				</p>
				<a href="/shop" class="btn">Shop Online 24/7</a>
			</div> <!-- section-hours-location-item -->
			<div class="section-hours-location-item">
				<h4>Location</h4>
				<p>
					Emelia's Apothecary<br>
					350 Main St Suite A <br>
					Dunedin, FL 34698<br>
					(727) 281-4497<br>
				</p>
				<a href="http://share.here.com/r/mylocation/e-eyJuYW1lIjoiRW1lbGlhJ3MgQXBvdGhlY2FyeSBvZiBEdW5lZGluIiwiYWRkcmVzcyI6IjM1MCBNYWluIFN0cmVldCBTdWl0ZSBBLCBEdW5lZGluLCBGbG9yaWRhIiwibGF0aXR1ZGUiOjI4LjAxMjA0NzYsImxvbmdpdHVkZSI6LTgyLjc4OTAwNDgsInByb3ZpZGVyTmFtZSI6ImZhY2Vib29rIiwicHJvdmlkZXJJZCI6NDM1MTg0NzMwMzE5MTQyfQ==?link=addresses&fb_locale=en_US&ref=facebook&fbclid=IwAR1H2WFul0uk7Tu-K7sFiFH_uq6XyxEhT6Agk_NYqZFaNlHePcsX46I6iaU" class="btn" target="_blank">Directions</a>
			</div> <!-- section-hours-location-item -->
			<div class="section-hours-location-item">
				<h4>FAQ's</h4>
				<p>You've Got Questions<br>
				We've got Awnsers</p>
				<a href="/faqs/" class="btn">Read FAQs</a>
			</div> <!-- section-hours-location-item -->
		</div> <!-- section-contact-page-wrapper -->
	</div><!--content-->
</div> <!--full-->
<?php get_footer();?>