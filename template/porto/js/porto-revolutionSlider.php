<script>
  /*
   |--------------------------------------------------------------------------
   | Revolution SLider 5.0 - Initialization
   |--------------------------------------------------------------------------
   */
  jQuery(document).ready(function() {
    jQuery("#slider1").revolution({
      // Slider Types
      sliderType:"standard",
      // Slider Layouts
      sliderLayout:"fullwidth",
      // Progressing
      delay:9000,
      disableProgressBar: "off",
      //Responsive level [DESKTOP, LAPTOP, TABLET, SMARTPHONE]
      responsiveLevels: [1240, 1024, 768, 360],
      // Grid Size
      gridwidth:[1800, 1024, 778, 480],
      gridheight:[800, 768, 960, 720],
      // Respect Aspect Ratio
      autoHeight:"off",
      // Responsive Levels
      gridheight:[830,670,860,800],
      // Navigation Syntax
      mouseScrollNavigation:"off",
      onHoverStop:"on",
      // Navigation
      navigation: {
        touch:{
          touchenabled:"off",
          swipe_treshold : 75,
          swipe_min_touches : 1,
          drag_block_vertical:false,
          swipe_direction:"horizontal"
        },
        arrows: {
          style:"hebe",
          enable:true,
          rtl:false,
          hide_onmobile:true,
          hide_onleave:false,
          hide_delay:200,
          hide_delay_mobile:1200,
          hide_under:500,
          hide_over:9999,
          tmp: '<div class="tp-title-wrap"><span class="tp-arr-titleholder">{{title}}</span>',
          left : {
            container:"slider",
            h_align:"left",
            v_align:"center",
            h_offset:0,
            v_offset:0
          },
          right : {
            container:"slider",
            h_align:"right",
            v_align:"center",
            h_offset:0,
            v_offset:0
          }
        },
        bullets:{
          style:"hebe",
          enable:true,
          container:"slider",
          rtl:false,
          hide_onmobile:false,
          hide_onleave:false,
          hide_delay:200,
          hide_delay_mobile:1200,
          hide_under:500,
          hide_over:9999,
          tmp:"",
          direction:"horizontal",
          space:8,
          h_align:"center",
          v_align:"bottom",
          h_offset:0,
          v_offset:20
        }

      },
      // Appearance and Visibility
      shadow:0,
      spinner:"spinner4",
      hideCaptionAtLimit:0,
      hideAllCaptionAtLilmit:0,
      hideSliderAtLimit:0,
      // Mobile Visibility
      hideThumbsOnMobile:"off",
      // Auto-rotate
      stopLoop:"off",
      stopAfterLoops:-1,
      stopAtSlide:-1,
      // General Settings
      debugMode:false,
      fallbacks: {
        simplifyAll:"off",
        nextSlideOnWindowFocus:"off",
        disableFocusListener:false
      }
    });
  });
</script>

