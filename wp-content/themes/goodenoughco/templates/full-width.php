<?php 
/*
 * Template Name: Full Width Page
 */
	get_header(); 
?>
  <section class="default-page index">
		<div class="visual-composer-wrapper">
            <div class="container full-width">
                <div class="row">
                    <div class="col-xs-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
		</div>
  </section>
<?php get_footer(); ?>