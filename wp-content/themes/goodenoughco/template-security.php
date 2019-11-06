<?php

/*
Template Name: Security Page
Template Post Type: page

*/
?>

<?php get_header(); ?>

<section class="custom-section security">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <article class="content">
            <?php the_content(); ?>
        </article>
        <section class="security-bg">
          <div class="container-1">
            <div class="security-content-wrapper">
              <div class="security-sidebar">
                <aside class="sec-nav">
                  <h2>Table of Contents</h2>
                  <div class="sec-nav-inner">
                    <?php
                      if( have_rows('security_item') ):
                        while ( have_rows('security_item') ) : the_row(); ?>

                          <div class="sec-nav-item">
                            <a href="#<?php the_sub_field('sec_class'); ?>" data-link="<?php the_sub_field('sec_class'); ?>">
                              <div class="sec-nav-item-inner">
                                <h4><?php the_sub_field('sec_title'); ?></h4>
                              </div>
                            </a>
                          </div>

                      <?php
                      endwhile;
                      endif;
                      ?>
                  </div>
                </aside>
              </div>
              <div class="security-content">
                <?php
                  if( have_rows('security_item') ):
                    while ( have_rows('security_item') ) : the_row(); ?>

                      <div class="sec-content-item" id="<?php the_sub_field('sec_class'); ?>">
                        <h2><?php the_sub_field('sec_title'); ?></h2>
                        <p><?php the_sub_field('sec_content'); ?></p>
                      </div>

                  <?php
                  endwhile;
                  endif;
                  ?>
              </div>
            </div>
          </div>
        </section>
    <?php endwhile; endif; ?>
</section>
<script type="text/javascript">
  jQuery(function() {

    // Setup observers on each section and add active class to nav item when in view
    const sections = document.querySelectorAll('.sec-content-item');

    const ACTIVE_CLASS = 'active';

    const options = {
      threshold: 0,
      rootMargin: "-160px 0px -75% 0px"
    };

    const observer = new IntersectionObserver(function(entries, observer) {
      entries.forEach(entry => {
        // console.log("element: " + entry.target.id);
        var listEl = [];
        if (!entry.isIntersecting) {
          jQuery("a[data-link='" + entry.target.id + "']").removeClass(ACTIVE_CLASS);
          return;
        } else {
          jQuery("a[data-link='" + entry.target.id + "']").addClass(ACTIVE_CLASS);
          jQuery('.sec-nav-item:first a').removeClass('init-active');
        }
      })
    }, options);

    sections.forEach(section => {
      observer.observe(section);
    });

    // Scroll to anchor nicely
    function scroll_to_anchor(anchor_id){
      var tag = $("#"+anchor_id+"");
      $('html,body').animate({scrollTop: tag.offset().top - 155},'slow');
    }

    jQuery('.sec-nav-item a').on('click', function(e){
      e.preventDefault();
      var anchor_id = jQuery(this).data('link');
      scroll_to_anchor(anchor_id);
    });

    jQuery('.sec-nav-item:first a').addClass('init-active');

  });
</script>
<?php get_footer(); ?>
