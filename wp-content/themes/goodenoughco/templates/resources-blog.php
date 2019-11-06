<?php

/*
 * Template Name: Engineering Blog
 */
get_header();

?>

<?php the_content(); ?>
<link rel="stylesheet" type="text/css" href="../wp-content/themes/rokt-redesign/css/plyr.css">
<style type="text/css">
  .flex-video {
    display: grid;
    grid-template-columns: repeat(2, auto);
    justify-content: space-between;
  }
  .flex-video .row-video {
    width: 300px;
    height: 210px;
  }
  .flex-video .row-video .video-background {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 300px;
    height: 210px;
    background-size: cover !important;
  }
  .flex-video .row-video .video-background img {
    width: 54px;
    height: auto;
  }
  .flex-video .row {
      display: flex;
      align-items: center;
  }
  li.blog-item.with-video {
      padding-top: 35px;
  }
  .blog-item.with-video p.title {
      line-height: 40px;
  }
  @media screen and (max-width: 500px) {
    .flex-video .row {
      width: 100%;
      padding-right: 30px;
      padding-left: 30px;
    }
    .flex-video {
      display: block;
      margin-left: -30px;
      margin-right: -30px;
    }
    .flex-video .row-video {
        width: 100%;
    }
    .flex-video .row-video .video-background {
      width: 100%;
    }
    li.blog-item.with-video {
        padding-top: 0px;
    }
    .flex-video .row {
        padding-bottom: 10px;
    }
  }
</style>

<div class="mobile-view">
  <div class="hiring-section">
    <a href="<?php echo get_field('url_link') ?>"><?php echo get_field('url_name') ?></a><i class="fa fa-plus"></i>
  </div>
</div>
<div class="resources-blog-page">
  <div class="container-blog">
    <div class="main-row">
      <ul id="myList" class="left-side-listing">
        <?php
          $args = array( 'post_type' => 'engineering_blog', 'posts_per_page' => -1, 'paged' => 1,);
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <li class="blog-item">
          <p class="tag">
            <?php
            echo get_the_term_list( $post->ID, 'engineering_blog_tags');
            ?>
          </p>
          <div class="flex-video">
          	<div class="row">
          		<p class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
          	</div>
          </div>
          <?php if ( (get_field('show_author_image') == false) && (get_field('show_posting_date') == false) && (get_field('show_author_name') == false) ): ?>
          <?php else: ?>
          <div class="author-section">
            <?php if ( get_field('show_author_image') == true): ?>
              <img class="author-image" src="<?php echo get_field('author_image') ?>" alt="">
            <?php endif; ?>
            <p class="author">
              <?php if ( get_field('show_posting_date') == true): ?>
                <?php echo get_field('posting_date') ?>
              <?php endif; ?>
              <?php if ( get_field('show_author_name') == true): ?>
                <?php echo get_field('author_name') ?>
              <?php endif; ?>
            </p>
          </div>
          <?php endif; ?>
          <p class="excerpt">
            <?php echo get_field('resources_blog_excerpt') ?>
          </p>
          <a class="readmore" href="<?php the_permalink() ?>">Read more</a>
        </li>
        <?php endwhile;
            wp_reset_postdata();
        ?>
        <div id="seeMoreBlog" class="see-more">
          <i class="fa fa-plus"></i><p>See more</p>
        </div>
        <li class="blog-item with-video">
          <div class="flex-video">
            <div class="row">
              <p class="title">
                <?php echo get_field('label_text') ?>
              </p>
            </div>
            <div class="plyr__video-embed row-video" id="player">
              <a href="<?php echo get_field('video_url') ?>" data-lity="">
                <div class="video-background" style="background: url(<?php echo get_field('background_video') ?>) no-repeat;">
                  <img src="<?php echo get_field('play_button') ?>">
                </div>
              </a>
            </div>
          </div>
        </li>
      </ul>
      <div class="right-side-listing">
        <div class="hiring-section">
          <h1><?php echo get_field('text_title') ?></h1>
          <a href="<?php echo get_field('url_link') ?>"><?php echo get_field('url_name') ?></a>
        </div>
        <div class="popular-post">
          <div class="post-title">
            <h1><?php echo get_field('post_title') ?></h1>
          </div>
          <ul id="older-post">
          <?php
            $args = array( 'post_type' => 'engineering_blog', 'posts_per_page' => -1, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
          ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
          <?php endwhile;
              wp_reset_postdata();
          ?>
          </ul>
          <div class="see-older-post">
            <i class="fa fa-plus"></i><p>SEE MORE</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../wp-content/themes/rokt-redesign/js/plyr.js"></script>
<script type="text/javascript">
// plyr player
const player = new Plyr('#player', {
    enabled: true,
    fallback: true,
    iosNative: true
});
player.on('playing', event => {
    player.fullscreen.enter();
});

$(document).ready(function () {
  engineeringBlogSeeMore();
});
var node = $('.with-video');
    $('.with-video').remove();
    $(node).insertBefore('.blog-item:nth-child(2)');

function engineeringBlogSeeMore() {
  blog_list = $("#myList li").size();
  x=10;
  $('#myList li:nth-child(n+11)').hide();
  $('#seeMoreBlog').click(function () {
      x= (x+10 <= blog_list) ? x+10 : blog_list;
      $('#myList li:lt('+x+')').show();
      if(x == blog_list){
          $('#seeMoreBlog').hide();
      }
  });
  if(10 >= blog_list){
      $('#seeMoreBlog').hide();
  }

  old_post_size = $("#older-post li").size();
  y=10;
  $('#older-post li:nth-child(n+11)').hide();
  $('.see-older-post').click(function () {
    y= (y+10 <= old_post_size) ? y+10 : old_post_size;
    $('#older-post li:lt('+y+')').show();
    if(y == old_post_size){
        $('.see-older-post').hide();
    }
  });
  if(10 >= old_post_size){
      $('.see-older-post').hide();
  }
}
</script>


<?php get_footer(); ?>
