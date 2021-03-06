<?php

/*
 * Template Name: Resources Index
 */
get_header();
// $lang = pll_current_language();
?>

<?php the_content(); ?>

<div class="resources">

	<div class="container post-cards">
		<section class="featured-posts">
			<div class="et_pb_row">
				<?php
                $hide_query = get_post_id_by_meta_key_and_value('hide_on_blog_post', '1');

					$args = array(
                        'post_type' => 'resources_post',
                        'posts_per_page' => 4,
                      //  'lang' =>$lang,
                      /*  'meta_query' => array(


                            array(
                                'key' => 'resources_featured',
                                'value' => '1',

                            )

                        ), */
                        //'post__not_in' => $hide_query

                    );

					$loop = new WP_Query( $args );
					print_r($loop);
					while ( $loop->have_posts() ) : $loop->the_post();

					// while($catquery->have_posts()) : $catquery->the_post();

				?>
				<div class="et_pb_column et_pb_column_1_3 post showImage">
					<div class="top">
						<p class="sub-category">
						 	<?php
						 		// the_tags('', ' ', '');
								//echo get_the_term_list( $post->ID, 'resources_tags');
						 		echo get_field('one_text_category');
						 	?>
						</p>
						<div class="social">
							<p><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"><span class="fa fa-facebook"></span></a></p>
							<p><a href="https://twitter.com/share?url=<?php the_permalink() ?>" target="_blank"><span class="fa fa-twitter"></span></a></p>
							<p><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>" target="_blank"><span class="fa fa-linkedin"></span></a></p>
							<p><a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink() ?>"><span class="fa fa-envelope"></span></a></p>
						</div>
					 </div>
					 <div class="featured-image" >
                         <a href="<?php the_permalink() ?>" rel=""> <?php the_post_thumbnail('crop-image') ?></a>
					 </div>
					 <div class="writeup">
					 	<p class="tags">
					 		<?php
						 	// 	$categories = get_the_category();
						 	// 	$spacing = " ";
								// if($categories){
						 	// 		$count = 0;
								//     foreach($categories as $category) {
								// 		if($category->name !== 'Featured' && $count < 1) {
								//         	$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$spacing;
								//         	$count++;
								//         }

								//     }
								// 	echo trim($output, $separator);
								// }
								echo get_the_term_list( $post->ID, 'resources_category');
						 	?>
					 	</p>
						<div class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
						<p class="read-more"><a href="<?php the_permalink() ?>" rel="">Read More</a></p>
					 </div>
				</div>
				<?php endwhile;
				    wp_reset_postdata();
				?>
			</div>
		</section>
		<section class="other-posts">
           <?php $implode_hide_item  =  implode(",", $hide_query); ?>
			<?php echo do_shortcode('[ajax_load_more container_type="div" users="false" users_role="undefined" users_include="undefined" users_exclude="undefined" users_per_page="undefined" users_order="undefined" users_orderby="undefined" post_type="resources_post" posts_per_page="9" "lang" => $lang post__not_in =  '.$implode_hide_item.' meta_key="resources_featured:banner_article" meta_value="1:1" meta_compare="!=:!=" meta_type="UNSIGNED:UNSIGNED" meta_relation="AND" scroll="false" transition_container_classes="row" button_label="Load More" button_loading_label="Loading posts"]'); ?>
		</section>
	</div>
</div>
<script>
    $('document').ready(function(){
                document.body.addEventListener('DOMNodeInserted', function(){
                var all_item = document.querySelectorAll('.alm-reveal.row > .post');
                var feature_posts = document.querySelector('.featured-posts > .row');
                if (all_item.length > 0) {
                all_item.forEach(function(item){
                feature_posts.appendChild(item);
                });
            }
        });
    });

</script>
<style>

@media only screen and (min-width: 1681px)  {
	.resources .splash .post .title a {
    	font-size: 46px !important;
	}
	.resources .splash {
   		padding: 135px 0;
	}
	.writeup p {
    font-size: 20px;
	}
}
@media only screen and (max-width: 1680px) and (min-width: 1441px)  {
	.resources .splash .post .title a {
    	font-size: 44px !important;
	}
	.resources .splash {
   		padding: 130px 0;
	}
	.writeup p {
    font-size: 19px;
	}
}

@media only screen and (max-width: 1440px) and (min-width: 769px)  {
	.resources .splash .post .title a {
    	font-size: 42px !important;
	}
}

@media only screen and (max-width: 768px) and (min-width: 415px)  {
	.resources .splash .post .title a {
    	font-size: 34px !important;
	}
}

@media only screen and (max-width: 414px) and (min-width: 320px)  {
	.resources .splash .post .title a {
    	font-size: 30px !important;
	}
}

@media only screen and (max-width: 1440px) and (min-width: 320px)  {
	.writeup p {
    font-size: 18px;
	}
}


.writeup p {
    line-height: 1.667;
}

</style>

<?php get_footer(); ?>
