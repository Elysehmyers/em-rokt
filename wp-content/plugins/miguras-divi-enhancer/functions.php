<?php

function divienhancer_scripts_and_styles(){

  // Animated Links
  if(null !== get_option('divienhancer-enable-animatedlinks')) {
    if(get_option('divienhancer-enable-animatedlinks') != 'no'){

      wp_enqueue_script( 'divienhancer-modernizr', plugin_dir_url( __FILE__ ) . 'scripts/modernizr.custom.js' );

    }
  }

  // Carousels
  if(null !== get_option('divienhancer-enable-carousel') || null !== get_option('divienhancer-enable-shop')) {
    if(get_option('divienhancer-enable-carousel') != 'no' || get_option('divienhancer-enable-shop') != 'no' ){

      wp_enqueue_style( 'divienhancer-slick-css',  plugin_dir_url( __FILE__ ) . 'styles/slick.css' );
    	wp_enqueue_style( 'divienhancer-slick-theme',  plugin_dir_url( __FILE__ ) . 'styles/slick-theme.css' );
      wp_enqueue_script( 'divienhancer-slick-js', plugin_dir_url( __FILE__ ) . 'scripts/slick.min.js' );
    }
  }

  //  Image Comparison
  if(null !== get_option('divienhancer-enable-imagecomparison')) {
    if(get_option('divienhancer-enable-imagecomparison') != 'no'){

      wp_enqueue_style( 'divienhancer-twenty',  plugin_dir_url( __FILE__ ) . 'includes/modules/imageComparison/twentytwenty.css', rand(1, 100) );
      wp_enqueue_script( 'divienhancer-twentytwenty', plugin_dir_url( __FILE__ ) . 'scripts/jquery.twentytwenty.js' );
    }
  }


  //  Hover Effects
  if(null !== get_option('divienhancer-enable-hovereffects')) {
    if(get_option('divienhancer-enable-hovereffects') != 'no'){
      wp_enqueue_style( 'divienhancer-hovereffects',  plugin_dir_url( __FILE__ ) . 'styles/hover-effects.css' );
    }
  }



  //Sticky Modules
  if(null !== get_option('divienhancer-enable-sticky')) {
    if(get_option('divienhancer-enable-sticky') != 'no'){
      wp_enqueue_script( 'divienhancer-sticky',  plugin_dir_url( __FILE__ ) . 'scripts/jquery.sticky.js' );
    }
  }


  //Modal Pop Up
  if(null !== get_option('divienhancer-enable-modal')) {
    if(get_option('divienhancer-enable-modal') != 'no'){
      wp_enqueue_style( 'divienhancer-nifty',  plugin_dir_url( __FILE__ ) . 'styles/nifty.css', rand(1, 100) );
      wp_enqueue_script( 'divienhancer-nifty', plugin_dir_url( __FILE__ ) . 'scripts/nifty.js' );
    }
  }


  //Interactive background image
  if(null !== get_option('divienhancer-enable-interactivebg')) {
    if(get_option('divienhancer-enable-interactivebg') != 'no'){
      wp_enqueue_script( 'divienhancer-interactive_bg', plugin_dir_url( __FILE__ ) . 'scripts/jquery.interactive_bg.min.js' );
    }
  }


  //general scripts
	wp_enqueue_style( 'divienhancer-custom',  plugin_dir_url( __FILE__ ) . 'styles/custom.css', rand(1, 100) );
  wp_enqueue_script( 'divienhancer-event-move', plugin_dir_url( __FILE__ ) . 'scripts/jquery.event.move.js' );









}
add_action('wp_enqueue_scripts', 'divienhancer_scripts_and_styles', 999);


?>
