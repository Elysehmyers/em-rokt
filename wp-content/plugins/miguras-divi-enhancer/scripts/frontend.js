// This script is loaded both on the frontend page and in the Visual Builder.
/*================================== TEAM MEMBERS ============================*/
/*============================================================================*/

function divienhancer_scripts(){

    /*================================== FLIPBOX ============================*/
    /*============================================================================*/
    function divienhancer_flipbox(){
      jQuery('.divienhancer-flipper').each(function(){
      var $firstBox = jQuery(this).find('.divienhancer_flipBoxChild:nth-child(1)');
      var $secondBox = jQuery(this).find('.divienhancer_flipBoxChild:nth-child(2)');
      var $axis = jQuery(this).attr('data-axis');
      var $speed = jQuery(this).attr('data-speed');
      var $firstwidth = $firstBox.find('.divienhancer_flipbox_box').outerWidth();
      var $firstheight = $firstBox.find('.divienhancer_flipbox_box').outerHeight();
      var $secondwidth = $secondBox.find('.divienhancer_flipbox_box').outerWidth();
      var $secondheight = $secondBox.find('.divienhancer_flipbox_box').outerHeight();
      var $finalwidth = '';
      var $finalheight = '';

      if($firstwidth < $secondwidth) {
        $secondBox.find('.divienhancer_flipbox_box').css({width: $firstwidth, margin:' 0 auto' })
      }
      else {
        $firstBox.find('.divienhancer_flipbox_box').css({width: $secondwidth, margin:' 0 auto'  })
      }

      $firstBox.addClass('front');
      $secondBox.addClass('back');

      jQuery(this).flip({
        axis: $axis,
        trigger: 'hover',
        speed: $speed,

      });

      }) // end of each

    }



    /*================================== TIMELINE ============================*/
    /*============================================================================*/
    function divienhancer_timeline(){
      jQuery('.et_pb_module.divienhancer_timeLine').each(function(){


        jQuery('.divienhancer_timeLineChild').each(function(){
          var $contentHeight = jQuery(this).find('.divienhancer_timeline_child_inner').outerHeight();
          var $iconHeight = jQuery(this).find('.divienhancer_timeline_icon').outerHeight();
          var $dateHeight = jQuery(this).find('.divienhancer_timeline_date').outerHeight();

          jQuery(this).find('.divienhancer_timeline_icon').css({top: $contentHeight/2, marginTop:-$iconHeight/2})
          jQuery(this).find('.divienhancer_timeline_date').css({top: $contentHeight/2, marginTop:-$dateHeight/2})

        });

      }) // end of timeLine each

    }



    /*================================== MODAL POPUP ============================*/
    /*============================================================================*/
    function divienhancer_modal_popup(){
      jQuery('.divienhancer-modalpopup').each(function(){
        var $this = jQuery(this);
        var $effect = jQuery(this).attr('data-effect');
        var $overlay = jQuery(this).attr('data-overlay');
        var $buttontext = jQuery(this).attr('data-button-text');
        var $buttonalignment = jQuery(this).attr('data-button-alignment');
        var $buttoncss = jQuery(this).attr('data-button-css');
        var $trigger = jQuery(this).attr('data-trigger');
        var $autotime = jQuery(this).attr('data-autotime');
        var $css = jQuery(this).attr('data-css');
        var $windowheight = jQuery(window).outerHeight();

        jQuery(this).after('<span class="de-modal-marker"></span>');
        var $position = jQuery(this).next('.de-modal-marker').offset();
        var $positionTop = $position.top;

        jQuery(this).attr('data-pos', $positionTop);


        jQuery(this).css({display: 'block'});
        if($trigger == 'button'){
          jQuery(this).before('<button class="de-modal-launch de-modal-'+$buttonalignment+'" data-overlay-color="'+$overlay+'">'+$buttontext+'</button>');
          jQuery(this).prev('.de-modal-launch').attr('style', $buttoncss);
        }
        jQuery(this).after('<div class="md-overlay"><span style="font-family: ETmodules!important;" class="divienhancer-modal-close md-close">Q</span></div>');
        jQuery(this).wrap('<div style="'+$css+'" class="nifty-modal '+$effect+'"><div class="md-content"></div></div>');


        if($trigger == 'auto'){
          setTimeout(function(){
            $this.parents('.nifty-modal').nifty('show');
            jQuery('.md-overlay').css({backgroundColor: $overlay})
          }, parseInt($autotime));

        }

        if($trigger == 'position'){

          jQuery(window).scroll(function(){
            $scroll = jQuery(window).scrollTop();

            if($scroll + $windowheight > $positionTop){
              if(!$this.hasClass('de-modal-launched')){
                $this.addClass('de-modal-launched');
                $this.parents('.nifty-modal').nifty('show');
                jQuery('.md-overlay').css({backgroundColor: $overlay})
              }
            }

          });

        }

        jQuery('.de-modal-launch').on('click', function(){

          var $overlayback = jQuery(this).attr('data-overlay-color');
          jQuery(this).next('.nifty-modal').nifty('show');
          jQuery('.md-overlay').css({backgroundColor: $overlayback})
        })



        jQuery('.nifty-modal').on('show.nifty.modal', function(){
          jQuery('.et_pb_column').css({zIndex: -1});
          jQuery(this).parents('.et_pb_section').css({zIndex: 999999});
          jQuery(this).parents('.et_pb_column').css({zIndex: 9});

        })

        jQuery('.nifty-modal').on('hide.nifty.modal', function(){
          jQuery('.et_pb_column').css({zIndex: 9});
          jQuery(this).parents('.et_pb_section').css('z-index', '');
        })

      })

    }



    /*== STICKY FUNCTION ==*/
    function free_divienhancer_sticky(){
        var x = 0;
      jQuery('.divienhancer-sticky').each(function(){
        var $this = jQuery(this);
        var $headerheight = jQuery('#main-header').outerHeight();
        var $adminbarheight = jQuery('#wpadminbar').outerHeight();
        var $topdistance = jQuery(this).attr('data-destickytop');
        var $bottomdistance = jQuery(this).attr('data-destickybottom');
        var $zindex = jQuery(this).parents('.et_pb_section').css('z-index');
        if($zindex = 'auto') {
          $zindex = '';
        }
        x=x+1

        jQuery(this).parents('.et_pb_row').css({zIndex: 999-x});
        jQuery(this).parents('.et_pb_column').css({zIndex: 999-x});

        if(jQuery('body').hasClass('admin-bar')){
          $headerheight = $headerheight + $adminbarheight;
        }

        if (jQuery(window).width() <= 980 ) {
          $headerfinalheight = 0;
        }
        if(jQuery('body').hasClass('et_fixed_nav') && jQuery(window).width() > 980 ){
          $headerfinalheight = $headerheight;
        }
        else {
          $headerfinalheight = 0;
          if(jQuery('body').hasClass('admin-bar')){
            $headerfinalheight = $adminbarheight;
          }
        }

        jQuery(this).sticky({
          topSpacing:$headerfinalheight + parseInt($topdistance),
          bottomSpacing: parseInt($bottomdistance)
        });

        jQuery(window).scroll(function(){
          if(jQuery('.sticky-wrapper').hasClass('is-sticky')){
            $this.parents('.et_pb_section').css({zIndex: 9999})
          }
          else {
            $this.parents('.et_pb_section').css({zIndex: $zindex})
          }
        });


      })

    }







    /*=========================== DIVIENHANCER TWENTYTWENTY IMAGE COMPARISON ===============================*/
    function divienhancer_image_comparison(){
      jQuery('.divienhancer_image_comparison_container').each(function(){
        var $visiblepercent = jQuery(this).attr('data-visible');
        var $beforelabel = jQuery(this).attr('data-before');
        var $afterlabel = jQuery(this).attr('data-after');
        var $orientation = jQuery(this).attr('data-orientation');
        var $overlay = jQuery(this).attr('data-overlay'); if($overlay == 'false'){$overlay = false;}else {$overlay = true;}
        var $slideronhover = jQuery(this).attr('data-slideronhover'); if($slideronhover == 'false'){$slideronhover = false;}else {$slideronhover = true;}
        var $withhandle = jQuery(this).attr('data-withhandle'); if($withhandle == 'false'){$withhandle = false;}else {$withhandle = true;}
        var $clicktomove = jQuery(this).attr('data-clicktomove'); if($clicktomove == 'false'){$clicktomove = false;}else {$clicktomove = true;}

        jQuery(this).twentytwenty({
          default_offset_pct: $visiblepercent,
          orientation: $orientation,
          before_label: $beforelabel,
          after_label: $afterlabel,
          no_overlay: $overlay,
          move_slider_on_hover: $slideronhover,
          move_with_handle_only: $withhandle,
          click_to_move: $clicktomove
        });
      })
    }




    function divienhancer_ihover_function(){

      jQuery(function($){

        $('.et_pb_module.divienhancer_ihover').css({opacity: '1'});

      });

    }


    /*=================== DIVIENHANCER INTERACTIVE BACKGROUND IMAGE =============*/
    function divienhancer_interactive_background(){
      jQuery(function($){

        $('.divienhancer-interactive_bg').each(function(){
          var $background = $(this).css('background-image')
          var $interactivebgstrength = $(this).attr('data-interactivebgstrength');
          $interactivebgstrength = $interactivebgstrength.replace('px', ' ');

          var $interactivebgscale = $(this).attr('data-interactivebgscale');
          $interactivebgscale = $interactivebgscale.replace('px', ' ');
          $interactivebgscale = '1.'+$interactivebgscale;

          var $interactivebganimationspeed = $(this).attr('data-interactivebganimationspeed');
          $interactivebganimationspeed = $interactivebganimationspeed.replace('px', ' ');
          $interactivebganimationspeed = $interactivebganimationspeed+'ms';

          $background = $background.replace('url(','').replace(')','').replace(/\"/gi, "");
          $(this).attr('data-ibg-bg', $background);
          $(this).css('background-image', 'none');

          $(this).interactive_bg({
           strength: parseInt($interactivebgstrength),              // Movement Strength when the cursor is moved. The higher, the faster it will reacts to your cursor. The default value is 25.
           scale: parseInt($interactivebgscale),               // The scale in which the background will be zoomed when hovering. Change this to 1 to stop scaling. The default value is 1.05.
           animationSpeed: $interactivebganimationspeed,   // The time it takes for the scale to animate. This accepts CSS3 time function such as "100ms", "2.5s", etc. The default value is "100ms".
           contain: true,             // This option will prevent the scaled object/background from spilling out of its container. Keep this true for interactive background. Set it to false if you want to make an interactive object instead of a background. The default value is true.
           wrapContent: false         // This option let you choose whether you want everything inside to reacts to your cursor, or just the background. Toggle it to true to have every elements inside reacts the same way. The default value is false
         });

        });


      })
    }



    /*================================= DIVIENHANCER BING MAP =====================================*/



    function divienhancer_bing_map_script(){
      jQuery(window).load(function (){

        jQuery('.divienhancer_bing_map').each(function(){
          var $key = jQuery('body').attr('data-debingkey');
          var $mapid = jQuery(this).attr('id');
          var $latitude = jQuery(this).attr('data-latitude');
          var $longitude = jQuery(this).attr('data-longitude');
          var $zoom = jQuery(this).attr('data-zoom');
          var $maptypedata = jQuery(this).attr('data-type');
          var $maptype = 'Microsoft.Maps.MapTypeId.'+$maptypedata;


          var map = new Microsoft.Maps.Map('#'+$mapid, {
            credentials: $key,
            center: new Microsoft.Maps.Location($latitude, $longitude),
            mapTypeId: eval($maptype),
            zoom: parseInt($zoom)
           });
        });

      });
    }



    /**
    ** Change Divienhancer Option Name*
    */
    function set_divienhancer_option_name(){
      if(jQuery('.et-fb-tabs__panel--DE').hasClass('divienhancer_name_setted')){

      }
      else {

      jQuery('.et-fb-tabs__panel--DE').find('.et-fb-form__toggle-title').find('h3').text('Divi Enhancer Options');
      jQuery('.et-fb-tabs__panel--DE').addClass('divienhancer_name_setted');
      }
    }




    return {
      divienhancer_image_comparison: divienhancer_image_comparison,
      divienhancer_modal_popup: divienhancer_modal_popup,
      free_divienhancer_sticky: free_divienhancer_sticky,
      divienhancer_timeline: divienhancer_timeline,
      divienhancer_flipbox: divienhancer_flipbox,
      divienhancer_ihover_function: divienhancer_ihover_function,
      divienhancer_interactive_background: divienhancer_interactive_background,
      divienhancer_bing_map_script: divienhancer_bing_map_script,
      set_divienhancer_option_name: set_divienhancer_option_name,
    }


} // eND OF DIVIENHANCER_SCRIPTS FUNCTION




//BUILDER
jQuery(function($) {


});

//FRONT
jQuery(document).ready(function(){


  if(jQuery("#et-fb-app").length == 0) {
    divienhancer_scripts().divienhancer_image_comparison();
    divienhancer_scripts().divienhancer_modal_popup();
    divienhancer_scripts().free_divienhancer_sticky();
    divienhancer_scripts().divienhancer_timeline();
    divienhancer_scripts().divienhancer_flipbox();
    divienhancer_scripts().divienhancer_ihover_function();
    divienhancer_scripts().divienhancer_interactive_background();
    divienhancer_scripts().divienhancer_bing_map_script();
  }

})
