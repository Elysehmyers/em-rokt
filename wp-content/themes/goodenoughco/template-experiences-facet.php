<?php
  // Get results from FacetWP
  $results = [];
  while ( have_posts() ): the_post();
    $results[] = $post;
  endwhile;

  // Create unique list of Partners to loop over
  $short_list = [];
  foreach ($results as $result) {
    $partners = get_field('partner', $result->ID);
    // print_r($partners);

    foreach( $partners as $partner ) {
      $partnerOrder = get_field('display_order', $partner->ID);
      if (!array_key_exists($partnerOrder, $short_list)) {

        $short_list[$partnerOrder] = $partner->ID;
      }
    }
  }
  // Sort list by key (display_order)
  ksort($short_list);
  // print_r($short_list);
?>

<!-- Partner buckets -->
<ul class="partner-wrapper">
  <?php
  foreach ($short_list as $key => $value) {
    // echo $key . " " . $value;
    $p = get_post( $value );
    $current_partner =  $p->post_title;

  ?>

  <li class="partner-element">
    <div class="experience_element_list">
      <!-- Set background image -->
      <div class="experience_element" style="background:url('<?php the_field('background_image', $p->ID); ?>');background-size: cover;">
        <!-- Set logo -->
        <div class="experience_element-logo container-blog">
          <img src="<?php the_field('logo', $p->ID); ?>">
        </div>
        <!-- Carousel -->
        <div class="carousel-container container-blog">
          <section class="experiences-slider owl-carousel owl-theme">
            <!-- Slides -->
            <?php while ( have_posts() ): the_post();
              // Check to see if Experience partner matches current partner in Loop
              // If matches - create carousel
              $exps = get_field('partner');
              if( $exps ): ?>
                <?php foreach( $exps as $exp ): // variable must NOT be called $post (IMPORTANT) ?>
                  <?php if (get_the_title( $exp->ID ) == $current_partner): ?>
                    <?php
                      // Grab taxonomies and ACF
                      $exp_page_overlay = get_field('exp_overlay_page_copy');
                      $exp_page = wp_get_post_terms(get_the_ID(), 'exp_pages', array("fields" => "names"));
                      $exp_campaign = wp_get_post_terms(get_the_ID(), 'exp_campaign', array("fields" => "names"));
                      $exp_placement = wp_get_post_terms(get_the_ID(), 'exp_placement', array("fields" => "names"));
                      $exp_copy = get_field('exp_description');
                      $exp_objective = get_field('exp_overlay_objective_copy');
                      $exp_overlay_placement = get_field('exp_overlay_placement_copy');
                      $exp_overlay_campaign = get_field('exp_overlay_campaign_copy');
                      $exp_overlay_d = get_field('exp_overlay_desktop_image');
                      $exp_overlay_t = get_field('exp_overlay_tablet_image');
                      $exp_overlay_m = get_field('exp_overlay_mobile_image');
                    ?>
                    <div class="experiences-slider-element-wrapper"
                    data-page='<?php echo $exp_page_overlay; ?>'
                    data-campaign='<?php echo $exp_overlay_campaign; ?>'
                    data-objective='<?php echo $exp_objective; ?>'
                    data-placement='<?php echo $exp_overlay_placement; ?>'
                    data-overlayd='<?php echo $exp_overlay_d; ?>'
                    data-overlayt='<?php echo $exp_overlay_t; ?>'
                    data-overlaym='<?php echo $exp_overlay_m; ?>' data-toggle="modal" data-target=".exp-overlay-content-modal">
                      <div class="experiences-slider-img">
                        <img src="<?php the_field('exp_screenshot'); ?>">
                        <div class="experience-rollover">
                          <div class="experience-rollover-btn">
                            VIEW
                          </div>
                        </div>
                      </div>
                      <div class="experiences-slider-meta">
                        <div class="experiences-slider-page">
                          <?php
                          echo '<h5>' . $exp_page[0] . ' Page</h5>';
                          if ($exp_campaign != []) {
                            echo '<h6>' . $exp_campaign[0] . ' Campaign</h6>';
                          } else {
                            echo '<h6>&nbsp;</h6>';
                          }
                          if ($exp_copy != "") {
                            echo '<p>' . $exp_copy . '</p>';
                          } else {
                            echo '<p>&nbsp;</p>';
                          }
                          ?>
                          <div class="experience-mobile-trigger">
                            <span>VIEW</view>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endwhile; ?>
          </section>
        </div>
      </div>
    </div>
  </li>

  <?php } // end short_list loop ?>
</ul>
