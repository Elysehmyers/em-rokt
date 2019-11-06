<?php

/*
Template Name: Experiences Page

*/
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
    <title><?php wp_title();?></title>
    <link rel="stylesheet" href="https://use.typekit.net/hem1foy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <?php
    wp_head();
    ?>

    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>

    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/css/demos.css' ?>">
</head>

<body data-ajax-url= "/wp-admin/admin-ajax.php">
  <div class="exp-overlay"></div>

  <div id="exp-overlay-content" class="modal exp-overlay-content-modal" data-backdrop="true">
    <div class="exp-overlay-content-wrapper">
      <div class="exp-overlay-btn-bar">
        <a href="#" class="exp-overlay-btn" id="exp-overlay-desktop-btn">DESKTOP</a>
        <a href="#" class="exp-overlay-btn" id="exp-overlay-mobile-btn">MOBILE</a>
        <a href="#" class="exp-overlay-btn" id="exp-overlay-tablet-btn">TABLET</a>
      </div>
      <div class="exp-overlay-screens">
        <img class="exp-overlay-screen" id="exp-overlay-screen-desktop" src="" alt="Desktop">
        <img class="exp-overlay-screen" id="exp-overlay-screen-tablet" src="" alt="Tablet">
        <img class="exp-overlay-screen" id="exp-overlay-screen-mobile" src="" alt="Mobile">
        <!-- Close button -->
        <img data-dismiss="modal" class="overlay-close close" src="/wp-content/themes/rokt-redesign/images/OverlayClose.svg" alt="Close">
      </div>
      <div class="exp-overlay-meta">
        <div class="exp-overlay-meta-left">
          <div class="">
            <h3>PAGE: <span class="page"></span></h3>
          </div>
          <div class="">
            <h3>CAMPAIGN: <span class="campaign"></span></h3>
          </div>
        </div>
        <div class="exp-overlay-meta-right">
          <div class="">
            <h3>PLACEMENT: <span class="placement"></span></h3>
          </div>
          <div class="">
            <h3>CAMPAIGN OBJECTIVE: <span class="objective"></span></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

<header id="" class="page-header experiences">
    <div class="page-header-inner">
      <a href="<?php echo site_url(); ?>" class="demo-logo-wrap"> <img src="/wp-content/themes/rokt-redesign/images/logo-black.png" alt=""></a>
    </div>
</header>

<section id="" class="content-area">
  <!-- Hero from admin -->
  <div class="experiences-hero">
    <div class="visual-composer-wrapper">
      <?php the_content(); ?>
    </div>
  </div>
  <!-- Filter section -->
  <div class="experience-filter-section container-blog">
    <div class="exp-filter-header">
      <div class="exp-liner"></div>
      <h2>FILTERS</h2>
    </div>
    <div id="RD-Filters">
      <div class="demo-clear-wrapper">
        <div class="demo-selected-filters"></div>
      </div>
    </div>
    <div id="exp-filter-bar">
      <div class="exp-filter-wrapper">
        <div class="exp-filter-title" data-facettrigger="partner">
          <h5>CLIENTS</h5>
          <div class="exp-filter-facet" data-facetopen="partner">
            <?php echo facetwp_display( 'facet', 'experience_partners' ); ?>
          </div>
        </div>
      </div>
      <div class="exp-filter-wrapper">
        <div class="exp-filter-title" data-facettrigger="vertical">
          <h5>Vertical</h5>
          <div class="exp-filter-facet" data-facetopen="vertical">
            <?php echo facetwp_display( 'facet', 'experience_vertical' ); ?>
          </div>
        </div>
      </div>
      <div class="exp-filter-wrapper">
        <div class="exp-filter-title" data-facettrigger="pages">
          <h5>Pages</h5>
          <div class="exp-filter-facet" data-facetopen="pages">
            <?php echo facetwp_display( 'facet', 'experience_pages' ); ?>
          </div>
        </div>
      </div>
      <div class="exp-filter-wrapper">
        <div class="exp-filter-title" data-facettrigger="placement">
          <h5>Placement</h5>
          <div class="exp-filter-facet" data-facetopen="placement">
            <?php echo facetwp_display( 'facet', 'experience_placement' ); ?>
          </div>
        </div>
      </div>
      <div class="exp-filter-wrapper">
        <div class="exp-filter-title" data-facettrigger="campaign">
          <h5>Campaign</h5>
          <div class="exp-filter-facet" data-facetopen="campaign">
            <?php echo facetwp_display( 'facet', 'experience_campaign' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- RESULTS -->
  <div class="rokt-experiences" id="main-content" role="main">
    <?php echo facetwp_display( 'template', 'experience_partners' ); ?>
  </div> <!-- .site-main -->

</section><!-- .content-area -->
<script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>

    jQuery(document).ready(function($){

      FWP.auto_refresh = true;
      // FacetWP Selected Filters
      function setFilterClears() {
        $( ".demo-selected-filters" ).empty();
        var selectedFilters = FWP.facets;
        // console.log(selectedFilters);
        var selectedFiltersArray = [];
        $.each( selectedFilters, function( key, value ) {
          if (key === 'search' && value != "") {
            $( ".demo-selected-filters" ).append( "<span data-filter='" + value + "' class='single-search-clear'>" + value + " <span>&nbsp;&nbsp;X</span></span>" );
            // selectedFiltersArray.push(value);
          } else {
            if (value != "") {
              var tempSelectedFiltersArray = [];
              var v = value;
              for ( var i = 0, l = value.length; i < l; i++ ) {
                // console.log(value[i]);
                selectedFiltersArray.push(value[i]);
              }
            }
          }
        });
        // console.log(selectedFiltersArray);
        for ( var i = 0, l = selectedFiltersArray.length; i < l; i++ ) {
          // console.log(selectedFiltersArray[i]);
          var name = $('.facetwp-checkbox').filter("[data-value='" + selectedFiltersArray[i] + "']");
          // console.log(name.text());
          if(typeof name.html() != "undefined"){
            $( ".demo-selected-filters" ).append( "<span data-filter='" + selectedFiltersArray[i] + "' class='single-filter-clear'>" + name.html() + " <span>&nbsp;&nbsp;X</span></span>" );
          }
        }
      }

      // Single Filter CLEAR
      $('body').on('click', '.single-filter-clear', function() {
        var filter = $(this).attr('data-filter');
        console.log($(this).attr('data-filter'));
        $('.facetwp-checkbox').filter("[data-value='" + filter + "']").removeClass('checked');
        FWP.refresh();
      });

      // var parterHtml = `
      //   <div class="exp-filter-description">
      //     <h3>What is a client?</h3>
      //     <p>A client refers to the partners we work with who have Rokt’s products integrated on their own site.</p>
      //   </div>
      //   `;
      // var pagesHtml = `
      //   <div class="exp-filter-description">
      //     <h3>What is a page?</h3>
      //     <p>A page refers to the webpage on a site where the Rokt’s placements appear.</p>
      //   </div>
      // `;
      // var placementHtml = `
      //   <div class="exp-filter-description">
      //     <h3>What is a placement?</h3>
      //     <p>A placement refers to the container that houses a campaign, offer, and creative.</p>
      //     <img style="margin-top:20px; width:100%;" src="https://rokt.com/wp-content/uploads/2019/09/Placement.svg" alt="Placement"/>
      //   </div>
      // `;
      // var campaignHtml = `
      //   <div class="exp-filter-description">
      //     <h3>What is a campaign?</h3>
      //     <p>A campaign refers to the different types of advertising campaigns partners or brands have with Rokt. Run across either the Rokt partner network or across their own site, targeted at specific audiences.</p>
      //   </div>
      // `;
      // var verticalHtml = `
      //   <div class="exp-filter-description">
      //     <h3>What is a vertical?</h3>
      //     <p>A vertical refers to the relevant industry or category type of the partner.</p>
      //   </div>
      // `;
      $(document).on('facetwp-loaded', function() {
        setFilterClears();
        clearFilterWrapperMagic();
        // $('.facetwp-facet-experience_partners').prepend(parterHtml);
        // $('.facetwp-facet-experience_pages').prepend(pagesHtml);
        // $('.facetwp-facet-experience_placement').prepend(placementHtml);
        // $('.facetwp-facet-experience_campaign').prepend(campaignHtml);
        // $('.facetwp-facet-experience_vertical').prepend(verticalHtml);
      });
      $(document).on('facetwp-refresh', function() {
        setFilterClears();
        clearFilterWrapperMagic();
      });

      // Show/Hide Clear Wrapper Based on Content
      function clearFilterWrapperMagic() {
        if ($('.demo-selected-filters').is(':empty') ) {
          $('.demo-clear-wrapper').hide();
        } else {
          $('.demo-clear-wrapper').show();
        }
      }
      clearFilterWrapperMagic();

      var $owl = $(".experiences-slider").owlCarousel({
        margin:10,
        responsiveClass:true,
        responsive:{
          0:{
            items:1,
            nav:true
          },
          600:{
            items:2,
            nav:false
          },
          800:{
            items:3,
            nav:false
          },
          1025:{
            items:4,
            nav:true,
            loop:false
          }
        }
      });


      $(document).on('facetwp-refresh', function() {
        if (FWP.loaded) { // after the initial pageload
            FWP.parse_facets(); // load the values
            FWP.set_hash(); // set the new URL
            location.reload();
            return false;
        }
     });

      // Show overlay on click - slider element
      // $('.experience-rollover').on('click', function(){
      var desktopImg = "";
      var tabletImg = "";
      var mobileImg = "";
      var page = "";
      var campaign = "";
      var placement = "";
      var objective = "";
      $('#exp-overlay-content').on('show.bs.modal', function (e) {
        // Reset data points
        desktopImg = "";
        tabletImg = "";
        mobileImg = "";
        page = "";
        campaign = "";
        placement = "";
        objective = "";
        $('#exp-overlay-screen-desktop').attr('src', "");
        $('#exp-overlay-screen-tablet').attr('src', "");
        $('#exp-overlay-screen-mobile').attr('src', "");
      });


      $('#exp-overlay-content').on('shown.bs.modal', function (e) {
        // console.log(e.relatedTarget);

        $('.exp-overlay').toggle();
        $('#exp-overlay-screen-mobile').hide();
        $('#exp-overlay-screen-tablet').hide();
        desktopImg = $(e.relatedTarget).data('overlayd');
        tabletImg = $(e.relatedTarget).data('overlayt');
        mobileImg = $(e.relatedTarget).data('overlaym');

        var smallScreen = false;
        if ($( window ).width() <= 768) {
          smallScreen = true;
        }
        // Desktop
        if (desktopImg != "") {
          $('#exp-overlay-screen-desktop').attr('src', desktopImg);
          if (smallScreen && mobileImg != "") {
             $('#exp-overlay-screen-desktop').hide();
          }
          $('#exp-overlay-desktop-btn').show();
        } else {
          $('#exp-overlay-screen-desktop').hide();
          $('#exp-overlay-desktop-btn').hide();
        }
        // Tablet
        if (tabletImg != "") {
          $('#exp-overlay-screen-tablet').attr('src', tabletImg);
          $('#exp-overlay-tablet-btn').show();
        } else {
          $('#exp-overlay-screen-tablet').hide();
          $('#exp-overlay-tablet-btn').hide();
        }
        // // Mobile
        if (mobileImg != "") {
          $('#exp-overlay-screen-mobile').attr('src', mobileImg);
          if (smallScreen) {
            $('#exp-overlay-screen-mobile').show();
          }
          $('#exp-overlay-mobile-btn').show();
        } else {
          $('#exp-overlay-screen-mobile').hide();
          $('#exp-overlay-mobile-btn').hide();
        }
        page = $(e.relatedTarget).data('page');
        campaign = $(e.relatedTarget).data('campaign');
        placement = $(e.relatedTarget).data('placement');
        objective = $(e.relatedTarget).data('objective');
        $('.exp-overlay-meta .page').text(page);
        $('.exp-overlay-meta .campaign').text(campaign);
        $('.exp-overlay-meta .placement').text(placement);
        $('.exp-overlay-meta .objective').text(objective);

      });

      $('#exp-overlay-content').on('hidden.bs.modal', function (e) {
        $('.exp-overlay').hide();
        $owl.trigger('refresh.owl.carousel');
      })
      $('.overlay-close').on('click', function() {
        $('.exp-overlay').hide();
      });

      // Overlay buttons
      $('#exp-overlay-desktop-btn').on('click', function(e) {
        e.preventDefault();
        $('#exp-overlay-screen-desktop').show();
        $('#exp-overlay-screen-tablet').hide();
        $('#exp-overlay-screen-mobile').hide();
      });

      $('#exp-overlay-tablet-btn').on('click', function(e) {
        e.preventDefault();
        $('#exp-overlay-screen-desktop').hide();
        $('#exp-overlay-screen-tablet').show();
        $('#exp-overlay-screen-mobile').hide();
      });

      $('#exp-overlay-mobile-btn').on('click', function(e) {
        e.preventDefault();
        $('#exp-overlay-screen-desktop').hide();
        $('#exp-overlay-screen-tablet').hide();
        $('#exp-overlay-screen-mobile').show();
      });

      // Show rollover state when hovering over slider element
      if ($(window).width() > 1024) {
        $('.experiences-slider-element-wrapper').hover(
          function() {
            $(this).find('.experience-rollover').toggleClass('e-active');
          }, function() {
            $(this).find('.experience-rollover').toggleClass('e-active');
          }
        );
      }

      // Filter rollover - opens menu
      if ($(window).width() < 1025) {
        $( ".exp-filter-title" ).on('click', function(){
          var facetTrigger = $(this).data('facettrigger')
          var openFacet = $('*[data-facetopen="' + facetTrigger + '"]');
          openFacet.toggle();
          $(this).toggleClass('active');
        });
      } else {
        $( ".exp-filter-title" ).hover(
          function() {
            var facetTrigger = $(this).data('facettrigger')
            var openFacet = $('*[data-facetopen="' + facetTrigger + '"]');
            openFacet.toggle();
            $(this).toggleClass('active');
          }, function() {
            var facetTrigger = $(this).data('facettrigger')
            var openFacet = $('*[data-facetopen="' + facetTrigger + '"]');
            openFacet.toggle();
            $(this).toggleClass('active');
          }
        );
      }

    });
</script>

<?php  echo do_shortcode('[link_click_head]');?>
<?php wp_footer(); ?>
<footer class="demos-footer">
    <p>© 2019. All Rights Reserved </p>
    <p>rokt.com</p>
</footer>

</body>
</html>
