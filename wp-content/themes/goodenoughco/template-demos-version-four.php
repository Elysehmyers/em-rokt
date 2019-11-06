<?php

/*
Template Name: Demo Page with Search Template v4

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
    <?php
    wp_head();
    ?>
    <style>
@media screen and (max-width: 767px){
     .case-study .results .container p.title{
       margin-bottom: 50px ;

}
#sidepanel .btn-pink:hover{color: #fff}
}
.pum-theme-8808 .pum-title, .pum-theme-default-theme .pum-title{
    font-weight: 600;
}
</style>

<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>

  <style type="text/css">
    body {
      font-family: proxima-nova, sans-serif !important;
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(2, 50%);
    }
    .grid-container > div {
        margin-bottom: 10px;
        line-height: 1.5;
    }
    .MPP-item-b .title {
        font-weight: 700;
        display: block;
    }
    .commentary {
        line-height: 1.5;
    }
    .grid-container div > div:last-child {
        margin-bottom: 0;
    }
    .grid-container .grid-item > div {
        padding-bottom: 14px;
    }
    #RD-Filter .F-items div.F-item {
        margin-right: 40px;
        margin-left: 0;
    }
    .RD #MPP .MPP-items div.MPP-item {
        min-width: 400px;
    }
    .RD #MPP .MPP-items .MPP-item {
        margin: 0 10px;
        position: relative;
    }
    #RD-Filter .MPP-items .MPP-body .MPP-item-t div.MPP-item-t-l p {
        margin-bottom: 10px;
    }
    .product-type {
        font-size: 16px;
    }
    .RD #MPP .MPP-items .see-more-demo {
      position: absolute;
      top: 40%;
      right: -70px;
      text-align: right;
    }
    .RD #MPP .MPP-items .see-more-demo h1 {
      font-size: 14px;
      font-weight: 600;
      margin: 0;
    }
    .search-input.F-items input {
        margin-bottom: 10px;
        margin-top: 18px;
        line-height: normal;
        height: 30px;
    }
     #RD-Filter .F-items.search-input .F-item .tgl-items {
        left: 50%;
        top: 66px;
    }
    .pin-card-arrow-right.slick-arrow {
        position: absolute;
        top: 45%;
        right: 101%;
    }
    .pin-card-arrow-left.slick-arrow {
        position: absolute;
        top: 45%;
        left: 101%;
    }
    .RD #MPP .MPP-items .MPP-item .MPP-body .MPP-item-t {
        min-height: 150px;
    }
    .RD #MPP .MPP-items .MPP-item .MPP-body .MPP-item-t div.MPP-item-t-l p {
        margin: 0;
        margin-bottom: 10px;
    }
    .RD #MPP .MPP-items .MPP-item .MPP-body .MPP-item-t div.MPP-item-t-l {
        display: unset;
    }
    @media screen and (max-width: 1100px) {
      #RD-Filter .F-items>:first-child {
          margin-left: 25px;
      }
      #RD-Filter .F-items {
          display: block;
      }
      #RD-Filter .F-items .F-item .tgl-title p {
          white-space: nowrap;
      }
      #RD-Filter .F-items.search-input {
        display: block;
        flex: 0 100%;
    }

    }
    @media screen and (max-width: 768px) and (min-width: 765px) {
      #RD-Filter .MPP-items .MPP-body {
          min-width: 350px !important;
      }
    }
    @media screen and (max-width: 768px) {
      #RD-Filter .F-items>:first-child {
          margin-left: 0px;
      }
      .RD div#MPP {
          padding: 30px 30px 40px 30px;
      }
      .RD #MPP .MPP-items div.MPP-item:first-child {
          margin-left: 0;
      }

      .RD #MPP .MPP-items div.MPP-item {
          min-width: 347px;
      }
      .RD #MPP .MPP-items div.MPP-item .MPP-body {
          min-width: 347px;
      }
    }
    @media screen and (max-width: 767px) {
      #RD-Filter .F-items {
          flex: 0 100%;
          display: grid;
          grid-template-columns: 50% 50%;
      }
    }
    @media screen and (max-width: 730px) {
      #RD-Filter .F-items {
          display: grid;
          grid-template-columns: repeat(2, auto);
      }
      #RD-Filter .F-items .F-item .tgl-items {
          left: 100%;
      }
      #RD-Filter .F-items .F-item .tgl-items:after {
          left: 40%;
      }
    }
    #RD-Filter .F-items .F-item {

    margin-right: .75em;
    }
    #RD-Filter {

        padding: 50px 2%;
    }

    .search-input.F-items {
        margin-right: 30px;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/css/demos.css' ?>">
</head>
<script>

var cookies1= window.getCookie('geo_redirected');
$("body").attr("data-ajax-url","https://rokt.com/wp-admin/admin-ajax.php");
$("body").addClass('cookies-not-set');
document.cookie = 'geo_redirected=yes;';
console.log(cookies1);


</script>

<body data-ajax-url= "https://rokt.com/wp-admin/admin-ajax.php">
<!-- Trigger/Open The Modal -->
<div class="demo-top-bar">
  <?php echo get_field( "head_text" ); ?>
</div>
<!-- The Modal -->
<div id="demoModal" class="demo-modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="header-section">
      <h2><?php echo get_field( "modal_head_text" ); ?></h2>
      <span class="closeDemoModal">&times;</span>
    </div>
    <div class="content-section">
      <?php
    	// New Demo Data
    	$new_demos = get_field('new_demos');
    	if( $new_demos ): ?>
    		<div class="new-demos">
    			<div class="sub-head-text">
    				<h2><?php echo $new_demos['sub_head_text']; ?></h2>
    			</div>
    			<div class="content-text">
    				<p><?php echo $new_demos['content_text']; ?></p>
    			</div>
    		</div>
    	<?php endif; ?>

    	<?php
    	// Rokt Demo Page Update Data
    	$rokt_demo_page_updates = get_field('rokt_demo_page_updates');
    	if( $rokt_demo_page_updates ): ?>
    		<div class="new-demos demo-update">
    			<div class="sub-head-text">
    				<h2><?php echo $rokt_demo_page_updates['sub_head_text']; ?></h2>
    			</div>
    			<div class="content-text">
    				<p><?php echo $rokt_demo_page_updates['content_text']; ?></p>
    			</div>
    		</div>
    	<?php endif; ?>
    </div>
  </div>

</div>
<header id="" class="page-header">
    <div class="page-header-inner">
      <a href="<?php echo site_url(); ?>" class="demo-logo-wrap"> <img src="<?php echo bloginfo('template_directory'); ?>/images/logo_white.svg" alt=""></a>
      <h1>Demo Library</h1>
    </div>
    <div class="search-wrapper">
      <?php echo facetwp_display( 'facet', 'search' ); ?><button class="demo-search" onclick="FWP.refresh()">GO</button>
    </div>
</header>
<div class="mobile-header open">
  <div class="hamburger-menu-section">
    <img src="https://rokt.com/wp-content/uploads/2019/05/hamburger-menu.png" alt="">
  </div>
  <div class="pin-section mobile">
    <!-- Hide Pinned Area -->
    <div id="hide-pinned-area">
      <span class"hide-pinned-area-text">+ HIDE PINNED DEMOS</span>
    </div>
    <!-- Show Pinned Area -->
    <div id="show-pinned-area">
      <span class"show-pinned-area-text">- VIEW PINNED DEMOS</span>
    </div>
  </div>
</div>
<section id="primary" class="content-area demo-page">
    <div id="sidebar-demos">
      <div class="slide-sidebar">
        <img src="/wp-content/themes/rokt-redesign/images/demo-redesign/chevron-circle-left-solid.png" alt="slide-close" class="slide-close">
        <img src="/wp-content/themes/rokt-redesign/images/demo-redesign/chevron-circle-right-solid.png" alt="slide-open" class="slide-open">
      </div>
      <div class="demo-top-bar">
        <?php echo get_field( "head_text" ); ?>
      </div>
      <header id="" class="page-header">
          <div class="page-header-inner">
            <a href="<?php echo site_url(); ?>" class="demo-logo-wrap"> <img src="<?php echo bloginfo('template_directory'); ?>/images/logo_white.svg" alt=""></a>
            <h1>Demo Library</h1>
          </div>
      </header>
      <div class="mobile-header close">
        <div class="hamburger-menu-section">
          <img src="https://rokt.com/wp-content/uploads/2019/05/close-out.png" alt="">
        </div>
        <div class="search-wrapper">
          <?php echo facetwp_display( 'facet', 'search' ); ?>
        </div>
        <div class="mobile-go-search">
          <button class="demo-search" onclick="FWP.refresh()">GO</button>
        </div>
      </div>
      <div class="sidebar-demos-inner">
        <h2>Filters</h2>
        <div class="demo-sort-wrapper" style="display:none;">
          <?php echo do_shortcode('[facetwp sort="true"]'); ?>
        </div>
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">PARTNER</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'partner' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('partner')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Products -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">PRODUCTS</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'products' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('products')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Demo Type -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">DEMO TYPE</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'demo_type' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('demo_type')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- UX -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">UX</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'ux' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('demo_type')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Integration -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">INTEGRATION</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'integration' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('integration')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Status -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">STATUS</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'status' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('status')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Campaign Type -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">CAMPAIGN TYPE</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'campaign_type' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('campaign_type')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Vertical -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">VERTICAL</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'vertical' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('vertical')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Campaign -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">CAMPAIGN</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'campaign' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('campaign')">CLEAR</button>
            </div>
          </div>
        </div>
        <!-- Market -->
        <div class="single-filter-wrapper">
          <div class="filter-heading-wrapper">
            <h5 class="filter-title">MARKET</h5>
            <img class="filter-minimize" src="<?php echo bloginfo('template_directory'); ?>/images/Minimize.svg" alt="">
            <img class="filter-expand" src="<?php echo bloginfo('template_directory'); ?>/images/Expand.svg" alt="">
            <img class="filter-down-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-up-solid.svg" alt="">
            <img class="filter-up-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/demo-redesign/chevron-down-solid.svg" alt="">
          </div>
          <div class="single-filter-checkboxes">
            <?php echo facetwp_display( 'facet', 'market' ); ?>
            <div class="button-wrapper">
              <button class="demo-apply" onclick="FWP.refresh()">Apply</button><button class="demo-reset" onclick="FWP.reset('market')">CLEAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <main class="desktop" id="main" role="main">
      <div class="RD">
        <div id="MPP">
          <!-- Hide Pinned Area -->
          <div id="hide-pinned-area">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="eye-slash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-eye-slash fa-w-20 fa-fw fa-lg"><path fill="currentColor" d="M637 485.25L23 1.75A8 8 0 0 0 11.76 3l-10 12.51A8 8 0 0 0 3 26.75l614 483.5a8 8 0 0 0 11.25-1.25l10-12.51a8 8 0 0 0-1.25-11.24zM320 96a128.14 128.14 0 0 1 128 128c0 21.62-5.9 41.69-15.4 59.57l25.45 20C471.65 280.09 480 253.14 480 224c0-36.83-12.91-70.31-33.78-97.33A294.88 294.88 0 0 1 576.05 256a299.73 299.73 0 0 1-67.77 87.16l25.32 19.94c28.47-26.28 52.87-57.26 70.93-92.51a32.35 32.35 0 0 0 0-29.19C550.3 135.59 442.94 64 320 64a311.23 311.23 0 0 0-130.12 28.43l45.77 36C258.24 108.52 287.56 96 320 96zm60.86 146.83A63.15 63.15 0 0 0 320 160c-1 0-1.89.24-2.85.29a45.11 45.11 0 0 1-.24 32.19zm-217.62-49.16A154.29 154.29 0 0 0 160 224a159.39 159.39 0 0 0 226.27 145.29L356.69 346c-11.7 3.53-23.85 6-36.68 6A128.15 128.15 0 0 1 192 224c0-2.44.59-4.72.72-7.12zM320 416c-107.36 0-205.47-61.31-256-160 17.43-34 41.09-62.72 68.31-86.72l-25.86-20.37c-28.48 26.28-52.87 57.25-70.93 92.5a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448a311.25 311.25 0 0 0 130.12-28.43l-29.25-23C389.06 408.84 355.15 416 320 416z" class=""></path></svg>
            <span class"hide-pinned-area-text">HIDE PINNED DEMOS</span>
          </div>
          <!-- Show Pinned Area -->
          <div id="show-pinned-area">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-eye fa-w-18 fa-lg"><path fill="currentColor" d="M288 288a64 64 0 0 0 0-128c-1 0-1.88.24-2.85.29a47.5 47.5 0 0 1-60.86 60.86c0 1-.29 1.88-.29 2.85a64 64 0 0 0 64 64zm284.52-46.6C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 96a128 128 0 1 1-128 128A128.14 128.14 0 0 1 288 96zm0 320c-107.36 0-205.46-61.31-256-160a294.78 294.78 0 0 1 129.78-129.33C140.91 153.69 128 187.17 128 224a160 160 0 0 0 320 0c0-36.83-12.91-70.31-33.78-97.33A294.78 294.78 0 0 1 544 256c-50.53 98.69-148.64 160-256 160z" class=""></path></svg>
            <span class"show-pinned-area-text">VIEW PINNED DEMOS</span>
          </div>
            <div class="MPP-items demo">
                <!--start item-->
                <?php
                    $featured_query = array(
                      'post_type'  => 'demos',
                      // 'posts_per_page' => 1,
                      'meta_query' => array(
                        array(
                          'key'   => 'featured',
                          'value' => true,
                          'type' => 'BOOLEAN',
                        )
                      ),
                    );
                    $click_query = array(
                      'post_type'  => 'demos',
                      'posts_per_page' => 1,
                      'meta_key'   => 'link_click_counter',
                      'post_status' => 'publish',
                      'orderby'    => 'meta_value_num',
                      'order'      => 'DESC',
                      'tax_query'  => array(
                        array(
                            'taxonomy' => 'demos',
                            'field' =>  'id',
                            'terms' => array($id)
                        )
                      )
                    );

                    $loop = new WP_Query( $featured_query );

                    if ( $loop->have_posts() ) :
                      while ( $loop->have_posts() ) : $loop->the_post();
                        $logo_content = get_field('logo_content');
                        $right_content = get_field('right_content');
                        // $widget_pathText = get_field('widget_pathText');
                        // $hoverCon = get_field('contents');
                        // $left_column = $hoverCon['left_column'];
                        // $right_column = $hoverCon['right_column'];
                        $demo_banner = get_field('demo_banner');
                        $term = get_the_term_list( $post->ID, 'demos');
                        $status = get_field('demo_status');
                        ?>

                        <div class="MPP-item">
                          <a class="demo_click" id="<?php echo $post->ID; ?>" data-nonce="<?php echo wp_create_nonce('link_click_counter_' . $post->ID); ?>" href="<?php echo get_field('url'); ?>" target="_blank">
                            <div class="MPP-body">
                              <div class="MPP-item-t <?php echo $status; ?>">
                                <div class="MPP-item-t-left">
                                  <div class="demo-type">
                                    <?php
                                      if ($status === 'Narrated Demo') {
                                        echo "<img src='/wp-content/themes/rokt-redesign/images/Demo-Icon.svg' alt='Narrated Demo'><span>Narrated Demo</span>";
                                      } else {
                                        echo "<img src='/wp-content/themes/rokt-redesign/images/Live-Icon.svg' alt='Rokt Widget'><span>Rokt Widget</span>";
                                      }
                                    ?>
                                  </div>
                                  <div class="featured-demo-partner-name">
                                    <p><?php echo $logo_content['partner_name']; ?></p>
                                  </div>
                                  <div class="featured-demo-integration">
                                    INTEGRATION<br>
                                    <span><?php echo $right_content['advertiser_name'] ?></span>
                                  </div>
                                  <div class="featured-latest-edit">
                                    LATEST EDIT:
                                    <span> <?php echo the_modified_date('Y-m-d');?></span>
                                  </div>
                                </div>
                                <?php if( $right_content ): ?>
                                  <div class="MPP-item-t-right">
                                    <p class="featured-demo-product"><?php echo strip_tags($term) ?></p>
                                    <div class="featured-demo-device">
                                      DEVICE<br>
                                      <span><?php echo $right_content['device_type'] ?></span>
                                    </div>
                                    <div class="featured-demo-ux">
                                      UX<br>
                                      <span><?php echo $right_content['integration_type'] ?></span>
                                    </div>
                                  </div>
                                <?php endif; ?>
                              </div>
                              <!-- Hover -->
                            </div>
                          </a>
                        </div>
                      <?php endwhile;

                    else:
                        $click_arg = new WP_Query( $click_query );
                        while ( $click_arg->have_posts() ) : $click_arg->the_post();
                            ?>
                            <?php $logo_content = get_field('logo_content');
                            $right_content = get_field('right_content');
                            // $widget_pathText = get_field('widget_pathText');
                            // $hoverCon = get_field('contents');
                            // $left_column = $hoverCon['left_column'];
                            // $right_column = $hoverCon['right_column'];
                            $demo_banner = get_field('demo_banner');
                            $term = get_the_term_list( $post->ID, 'demos');
                            ?>
                            <div class="MPP-item">
                                <!-- <div class="MPP-item-h"><h3><?php //echo $test; ?></h3> </div> -->
                                <a class="demo_click" id="<?php echo $post->ID; ?>" data-nonce="<?php echo wp_create_nonce('link_click_counter_' . $post->ID); ?>" href="<?php echo get_field('url'); ?>" target="_blank">
                                    <div class="MPP-body">
                                        <?php if($demo_banner['demo_banner']): ?>
                                            <div class="banner-notif            ">
                                                <p><?php echo $demo_banner['demo_banner_text'] ?></p>
                                            </div>
                                        <?php endif; ?>
                                    <div class="MPP-item-t">
                                        <?php if( $logo_content ): ?>
                                            <div class="MPP-item-t-img-h">
                                                <div class="MPP-item-t-img">
                                                    <img src="<?php echo $logo_content['logo'] ?>" widht="59" height="57"/>
                                                </div>
                                                <div class="MPP-item-t-img-l"><p><?php echo $logo_content['partner_name'] ?></p></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( $right_content ): ?>
                                            <div class="MPP-item-t-l">
                                                <p class="product-type"><?php echo strip_tags($term) ?></p>
                                                <p>Integration: <span><?php echo $right_content['advertiser_name'] ?></span></p>
                                                <p>Device: <span><?php echo $right_content['device_type'] ?></span></p>
                                                <p>Demo Type: <span><?php echo $right_content['integration_type'] ?></span></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="MPP-body-hover" style="display: none;" >
                                        <a class="demo_click" id="<?php echo $post->ID; ?>" data-nonce="<?php echo wp_create_nonce('link_click_counter_' . $post->ID); ?>" href="<?php echo get_field('url'); ?>" target="_blank">
                                            <div class="hover-header"><h3><?php the_field('header') ?></h3></div>
                                            <div class="hover-content">
                                                <!-- Hover  -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                              </a>
                            </div>
                        <?php endwhile;
                      endif;
                    wp_reset_postdata();
                // }
                ?>
            </div>
        </div>
      </div>


        <div id="RD-Filters">
          <div class="demo-clear-wrapper">
            <a href="#" onclick="FWP.reset(); event.preventDefault();"><span>X</span> CLEAR ALL FILTERS</a>
            <br>
            <div class="demo-selected-filters"></div>
          </div>
          <div class="MPP-items n-items">
            <?php echo facetwp_display( 'template', 'demos' ); ?>
          </div>
          <div class="demo-load-more">
            <button class="fwp-load-more">Load more</button>
          </div>
        </div>




    </main> <!-- .site-main -->

</section><!-- .content-area -->

<script>

    jQuery(document).ready(function($){

        // side bar section: slide open and slide close sidebar
        function slideSidebar() {
          $('.slide-open').click(function(){
            $('#sidebar-demos').removeClass('open-sidebar');
            // $('section#primary').removeClass('open-primary');
            $('.slide-open').hide();
            $('.slide-close').show();
            $('section #RD-Filters .MPP-items .facetwp-template').removeClass('card-flex');
          });
          $('.slide-close').click(function(){
            $('#sidebar-demos').addClass('open-sidebar');
            $('section #RD-Filters .MPP-items .facetwp-template').addClass('card-flex');
            // $('section#primary').addClass('open-primary');
            $('.slide-close').hide();
            $('.slide-open').show();
          });
        }
        slideSidebar();

        $(".mobile-header.close .hamburger-menu-section img").click(function() {
          $('#sidebar-demos').fadeOut();
          $('body').css('overflow', 'auto');
          FWP.refresh();
        });
        $(".mobile-header.open .hamburger-menu-section img").click(function() {
          $('#sidebar-demos').fadeIn();
          $('body').css('overflow', 'hidden');
        });
        function demoModal() {
          var modal = document.getElementById('demoModal');
          var btn = document.getElementById("btnDemoModal");
          var span = document.getElementsByClassName("closeDemoModal")[0];

          btn.onclick = function() {
            $('.demo-modal').fadeIn();
            $('body').css('overflow', 'hidden');
          }
          span.onclick = function() {
            $('.demo-modal').fadeOut();
            $('body').css('overflow', 'auto');
          }
          window.onclick = function(event) {
            if (event.target == modal) {
              $('.demo-modal').fadeOut();
              $('body').css('overflow', 'auto');
            }
          }
        }

        demoModal();

        loginResult = $('.login-result');

        const user = "rokt",
              password = "Rokt";

        if (!(sessionStorage.getItem('p') == null)){
            $('#password').val(sessionStorage.getItem('p'));
            setTimeout(function(){
                $('#login-demos').submit();
            }, 300)
        }
        let user_result = false,
            pass_result = false;

        function validate_user( user) {

            let element = $('#user');

            const regex = new RegExp(user, 'gi');

            userL = user.length;
            //console.log(userL)

            let result  = element.val();
            //console.log(result.substring(0, userL));

            if ((result.match(regex)) && (result.length === userL)){
                user_result = true;
            } else {
                user_result = false;

                //loginResult.append('<p class="form-error">Incorrect UserName</p>')
            }

        }


      var loadMoreCount = 12;

    $('.load-more a').on('click', function(e) {

        e.preventDefault();
        $('#resultCon .MPP-body:hidden').slice(0, loadMoreCount).show();

        if ($('#resultCon .MPP-body:hidden').length == 0) {
            $('.load-more a').fadeOut();
        }

    });

    // setTimeout(()=>{},)
    function loadMore_func(){
 $('#resultCon .n-item').hide();
 $('.load-more a').click();
}
loadMore_func()


    // $('.load-more a').click();
        function validate_pass( password ) {

            let element = $('#password');

            passL = password.length;

            const regex = new RegExp(password, 'g');
            let result  = element.val();


            if ((result.match(regex)) && (result.length === passL)){
                pass_result = true
            } else { pass_result = false;
                console.log(pass_result);
                //loginResult.append('<p class="form-error">Incorrect Password</p>')
            }

        }


        function form_success(){
            $('.form-container').hide();
            $('#MPP').show();
            $('#RD-Filter').show();
        }

    form_success();
    sessionStorage.setItem('p', 'Rokt');

        var  resultCon = $('#resultCon'),
            textSearch = $('#text-search');

        $('#text-search').on('click', '.x', function(e){
            var resultText = $(this).data('clk');
            //console.log(resultText);
            search_tags = $('#' + resultText );
            search_tags.click();
        })




        function get_filter(data){

            var all_filter;
            console.log(jQuery.isEmptyObject(data['']))

            if (!jQuery.isEmptyObject(data[''])){
                 all_filter = '.' + data[''].map((i)=>{return i}).join('.');

            } else {
                all_filter = '';
            }
            // console.log(all_filter)

        if (all_filter != ''){
            $('.load-more a').slideUp();
                mixer.filter(all_filter).then(function(state){
                if( state.totalShow == 0){
                 //show something if no result

                }else{
                    //show something if n result

                }

        });
        } else {
            $('.load-more a').slideDown();
                mixer.filter('all');

                loadMore_func()
        }
    }


    function show_filtered_cards(data){
        var all_filter;
            console.log(jQuery.isEmptyObject(data['']))

            if (!jQuery.isEmptyObject(data[''])){
                 all_filter = '.' + data[''].map((i)=>{return i}).join('.');

            } else {
                all_filter = '';
            }



            if (all_filter != ''){
                $(all_filter).show();
                $('.load-more a').slideUp();

            } else {
            $('.load-more a').slideDown();
                loadMore_func()
        }
    }



        $('#RD-Filter').on('click', 'input[type=checkbox]', function(){
            // declaring an array
            var $this  = $(this);
            var id = $(this).attr('id');
            var name = $(this).parent().text();
            var is_true = $this.parents('.search-suggestion').hasClass('search-suggestion');
            var node = ` <li class="show `;
            node += `"><span class="x " data-clk="${id}" >X</span><span>${name}</span></li>`;

            var  choices = {};

            $('.contents').remove();

               // $('.n-item').show();
//                    textSearch.empty();



            $('input[type=checkbox]:checked').each(function() {

                if (!choices.hasOwnProperty(this.name)) {
                    choices[this.name] = [this.id];
                }else {
                    choices[this.name].push(this.id);
                }

            });


            if (($(this).is(':checked'))){
               textSearch.append(node);



            }else {

                $('span[data-clk= "' + id + '"]').parent().remove();

            }

            if ( jQuery.isEmptyObject(choices)){
              $('.load-more a').show();
                // $('.n-item').show();
               show_filtered_cards(choices)



            }else{
               // console.log(choices);
               // $('#resultCon .MPP-body:hidden').slice(0, -1).show();
                $('#resultCon .n-item').hide()
               // get_filter(choices);
                show_filtered_cards(choices)
            }

        });





        // $('#RD-Filter').on('DOMNodeInserted','#resultCon', function(e){

        //     if(e.target.id == 'resultCon'){
        //         if (this.childElementCount < search_result_count ){
        //             //$('.load-more a').hide();
        //         }
        //         search_result_count =+ 12;
        //     }
        // })


    });




    // Rokt Hero Slider Section
    function heroshotSliderInit(showSlide, slideScroll, dots, nexArrow, prevArrow, centerMode){
      console.log('init');
        $('.RD .MPP-items').slick({
          infinite: false,
          slidesToShow: showSlide,
          slidesToScroll: slideScroll,
          arrows: true,
          nextArrow: nexArrow,
          prevArrow: prevArrow,
          dots: dots,
          centerMode: centerMode,
          variableWidth: true,
        });
    }

    function heroshotSlider() {
      var $window = $(window).width();
      if  ($window > 1401){
          var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
          var prevArrow = `<div></div>`;
          heroshotSliderInit(2, 2, true, nexArrow, prevArrow, false);
      } else if (($window < 1400) && ($window > 1001)) {
          var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
          var prevArrow = `<div></div>`;
          heroshotSliderInit(2, 2, true, nexArrow, prevArrow, false);
      } else if (($window < 1001) && ($window > 767)) {
          var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
          var prevArrow = `<div></div>`;
          heroshotSliderInit(1, 1, false, nexArrow, prevArrow, false);
      } else if (($window < 767)) {
          var nexArrow = `<div></div>`;
          var prevArrow = `<div></div>`;
          heroshotSliderInit(1, 1, false, nexArrow, prevArrow, false);
      } else {
        ($('.RD .MPP-items').hasClass('slick-initialized'))? $('.RD .MPP-items').slick('destroy') : '';
      }
    }



    function heroshotSliderOnResize() {

      var $window = $(window).width();

      if(  $('.RD .MPP-items').hasClass('slick-initialized')  ){
        $('.RD .MPP-items').slick('destroy');

        if  ($window > 1401){
            var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
            var prevArrow = `<div></div>`;
            heroshotSliderInit(3, 3, true, nexArrow, prevArrow, false);
          } else if (($window < 1400) && ($window > 1001)) {
              var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
              var prevArrow = `<div></div>`;
              heroshotSliderInit(2, 2, true, nexArrow, prevArrow, false);
          } else if (($window < 1001) && ($window > 767)) {
              var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
              var prevArrow = `<div></div>`;
              heroshotSliderInit(1, 1, false, nexArrow, prevArrow, false);
          } else if (($window < 767)) {
              var nexArrow = `<div></div>`;
              var prevArrow = `<div></div>`;
              heroshotSliderInit(1, 1, false, nexArrow, prevArrow, false);
          } else {
          ($('.RD .MPP-items').hasClass('slick-initialized'))? $('.RD .MPP-items').slick('destroy') : '';
        }

      } else {
        if  ($window > 1401){
            var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"><h1 class="see-more">See More</h1></div>`;
            var prevArrow = `<div></div>`;
            heroshotSliderInit(3, 3, true, nexArrow, prevArrow, false);
          } else if (($window < 1400) && ($window > 1001)) {
              var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
              var prevArrow = `<div></div>`;
              heroshotSliderInit(2, 2, true, nexArrow, prevArrow, false);
          } else if (($window < 1001) && ($window > 767)) {
              var nexArrow = `<div class="see-more-demo"><img src="/wp-content/themes/rokt-redesign/images/SliderArrow.svg"></div>`;
              var prevArrow = `<div></div>`;
              heroshotSliderInit(1, 1, false, nexArrow, prevArrow, false);
          } else if (($window < 767)) {
              var nexArrow = `<div></div>`;
              var prevArrow = `<div></div>`;
              heroshotSliderInit(1, 1, false, nexArrow, prevArrow, false);
          } else {
          ($('.RD .MPP-items').hasClass('slick-initialized'))? $('.RD .MPP-items').slick('destroy') : '';
        }

      }
    }

    function demo_item_go_back() {
      $('.RD .MPP-items').on('afterChange', function(event, slick, currentSlide){
        if (currentSlide == 0) {
          $('.see-more-demo h1').text('See More');
          $(".see-more-demo img").attr("src","/wp-content/themes/rokt-redesign/images/SliderArrow.svg");
        } else {
          $('.slick-disabled h1').text('Go Back');
          $(".see-more-demo.slick-disabled img").attr("src","/wp-content/themes/rokt-redesign/images/SliderArrowLeft.svg");
          $('.see-more-demo.slick-disabled').click(function() {
            $('.RD .MPP-items').slick('slickGoTo', 0);
          })
        }
      })
    }

    $('body').on('init', '.RD .MPP-items', function(){
        slick_status = true;
    });

    function searchDesktopMobile(){
      var $window = $(window).width();
      if ($window > 767){
        // desktop
        $('.page-header .facetwp-search-wrap').remove();
        $('.page-header .facetwp-type-search').append("<span class='facetwp-search-wrap'><i class='facetwp-btn'></i><input type='text' class='facetwp-search' value='' placeholder='Search'></span>");
        // mobile
        $('.mobile-header .facetwp-type-search').remove();
      } else {
        // desktop
        $('.mobile-header .facetwp-type-search').remove();
        $('.mobile-header .search-wrapper').append("<div class='facetwp-facet facetwp-facet-search facetwp-type-search' data-name='search' data-type='search'><span class='facetwp-search-wrap'><i class='facetwp-btn'></i><input type='text' class='facetwp-search' value='' placeholder='Search'></span></div>");
        // mobile
        $('.page-header .facetwp-search-wrap').remove();
      }
    }

    function filterToggle(){
      var $window = $(window).width();
      jQuery('.filter-heading-wrapper').on('click', function(e){
        /*$(this).addClass("down");
        if( $('.filter-heading-wrapper').hasClass("down") ) {
          $('.filter-heading-wrapper').next().slideToggle();
          $('.filter-heading-wrapper').removeClass("down");
        }
        $(this).next().slideToggle();*/
        var container = $(this).next();
        var displayStatus = container.css('display');

        if (displayStatus == 'none') {
          //display filters
          resetFilterDisplay();

          $(this).next().slideDown();

          if ($window > 767){
              jQuery(this).find('.filter-minimize').show();
              jQuery(this).find('.filter-expand').hide();
          } else {
            jQuery(this).find('.filter-down-mobile').show();
            jQuery(this).find('.filter-up-mobile').hide();
            $(this).addClass('filter-check');
            $(this).next().addClass('filter-check');
            $(this).parent().addClass("clik-check");
          }
        } else {
          //hide filters
          resetFilterDisplay();
        }
      });
    }

    function resetFilterDisplay() {
      $('.filter-heading-wrapper').each(function(){
        var desktopWidth = $(window).width();
        var filterContainer = $(this).next();
        filterContainer.slideUp();

        if (desktopWidth > 767){
            jQuery(this).find('.filter-minimize').hide();
            jQuery(this).find('.filter-expand').show();
        } else {
          jQuery(this).find('.filter-down-mobile').hide();
          jQuery(this).find('.filter-up-mobile').show();
          if ($(this).next().find('.facetwp-checkbox').hasClass('checked')){
             // console.log('checked');
          }else {
             $(this).removeClass('filter-check');
             $(this).next().removeClass('filter-check');
             $(this).parent().removeClass("clik-check");
          }
        }
      });
    }

    $(document).ready(function () {
      heroshotSlider();
      cards_hover_mobile();
      card_hover_desktop();
      filter_text_hover();
      demo_item_go_back();
      searchDesktopMobile();
      filterToggle();
    });

    $(window).resize(function(){
      heroshotSliderOnResize();
      card_hover_desktop();
      cards_hover_mobile();
      filter_text_hover();
      // searchDesktopMobile();
    });

    //slider end
    function cards_hover_mobile(){
        if ($(window).width() <= 768) {
            $('body').off('hover', '.MPP-body');
        };
    }

    function card_hover_desktop() {
        if ($(window).width() > 768) {
            $("body").on('mouseenter', '#RD-Filter .MPP-body', function () {
                $(this).find('.MPP-body-hover').css('display', 'flex');
            });
            $("body").on('mouseleave', '#RD-Filter .MPP-body', function () {
                $(this).find('.MPP-body-hover').css('display', 'none');
            });
        };
    }

    function filter_text_hover(){
        $("#RD-Filter").on('mouseenter', '.tgl-title', function() {
            $(this).find('.tgl-items').addClass('is-active');
        });
        $("#RD-Filter").on('mouseleave', '.tgl-title', function() {
            $(this).find('.tgl-items').removeClass('is-active');
        });

        $('body').click(function(evt){
            let hover =$(this).find('.tgl-items');
            if(!$(evt.target).is('.tgl-title')) {

                if(!hover.hasClass('is-active')) {
                    hover.removeClass('is-active');

                }
            }
        });
    }

    function filter_mobile_active(){
        if ($(window).width() <= 768) {
            $('input[value="mobile"]').trigger('click');
        }

    }

    $('document').ready(function () {
        filter_mobile_active();
    })


    $('input[type=checkbox]').click(
        function(){
            $(this).parent().css('color', 'inherit');
            $('input[type=checkbox]:checked').parent().css('color', '#d41870');
        }
    );

    $('document').ready(function () {
      jQuery('.desktop #hide-pinned-area').click(function(e) {
        jQuery('.RD .MPP-items').slideToggle();
        jQuery('.desktop #hide-pinned-area').hide();
        jQuery('.desktop #show-pinned-area').show();
      });
      jQuery('.desktop #show-pinned-area').click(function(e) {
        jQuery('.RD .MPP-items').slideToggle();
        jQuery('.desktop #hide-pinned-area').show();
        jQuery('.desktop #show-pinned-area').hide();
      });
      jQuery('.mobile #hide-pinned-area').click(function(e) {
        jQuery('.RD .MPP-items').slideToggle();
        jQuery('.mobile #hide-pinned-area').hide();
        jQuery('.mobile #show-pinned-area').show();
      });
      jQuery('.mobile #show-pinned-area').click(function(e) {
        jQuery('.RD .MPP-items').slideToggle();
        jQuery('.mobile #hide-pinned-area').show();
        jQuery('.mobile #show-pinned-area').hide();
      });

      // FacetWP Selected Filters
      function setFilterClears() {
        $( ".demo-selected-filters" ).empty();
        var selectedFilters = FWP.facets;
        // console.log(selectedFilters);
        var selectedFiltersArray = [];
        $.each( selectedFilters, function( key, value ) {
          if (key === 'search' && value != "") {
            $( ".demo-selected-filters" ).append( "<span data-filter='" + value + "' class='single-search-clear'><span>X</span> " + value + "</span>" );
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
            $( ".demo-selected-filters" ).append( "<span data-filter='" + selectedFiltersArray[i] + "' class='single-filter-clear'><span>X</span> " + name.html() + "</span>" );
          }
        }
      }

      function searchEnterKey() {
        setTimeout(function(){
          // desktop search
          $('.page-header input.facetwp-search').keypress(function(event) {
            if (event.key === "Enter") {
               FWP.refresh();
               $(this).val('');
            }
          });
          // mobile search
          $('.mobile-header input.facetwp-search').keypress(function(event) {
              if (event.key === "Enter") {
                 $('#sidebar-demos').fadeOut();
                 $('body').css('overflow', 'auto');
                 FWP.refresh();
                 $(this).val('');
              }
          });
        }, 1000);
      }

      function mobileGoSearch() {
        $('.mobile-go-search button').click(function(){
          $('#sidebar-demos').fadeOut();
          $('body').css('overflow', 'auto');
        });
      }

      $(document).on('facetwp-loaded', function() {
        setFilterClears();
        clearFilterWrapperMagic();
        searchEnterKey();
        mobileGoSearch();
      });
      $(document).on('facetwp-refresh', function() {
        setFilterClears();
        clearFilterWrapperMagic();
      });

      // Sorting
      $('body').on('change', '.facetwp-sort-select', function() {
        FWP.refresh();
      });
      // On search mobile
      // setTimeout(function () {
      //   $("input.facetwp-search").blur(function(){
      //      FWP.refresh();
      //   });
      // }, 500);
      // Single Filter CLEAR
      $('body').on('click', '.single-filter-clear', function() {
        var filter = $(this).attr('data-filter');
        console.log($(this).attr('data-filter'));
        $('.facetwp-checkbox').filter("[data-value='" + filter + "']").removeClass('checked');
        FWP.refresh();
      });

      // Search Filter CLEAR
      $('body').on('click', '.single-search-clear', function() {
        var sBox = $('.facetwp-search').attr('value', "");
        // console.log($(this).attr('data-filter'));
        FWP.refresh();
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
    });
</script>

<?php  echo do_shortcode('[link_click_head]');?>
<?php wp_footer(); ?>
<footer class="demos-footer">
    <p>© 2019. All Rights Reserved </p>
    <p>rokt.com</p>
</footer>
<!-- PassWord-->

</body>
</html>
