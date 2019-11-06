<?php
	// Template Name: Thank You
	get_header();
?>
<section id="generic-template thank-you-template">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php if ( have_posts() ): ?>
					<?php while ( have_posts() ): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<a href="<?php echo site_url(); ?>">Back to Home</a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>