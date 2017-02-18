<script type="text/javascript">
  $(document).ready(function() {
    /*
     |--------------------------------------------------------------------------
     | Royal SLider
     |--------------------------------------------------------------------------
     */

    if($('.royalSlider').length){
      $('.royalSlider').animate({ opacity: 1}, 300, 'easeInOutQuad');
    }

    if($('.animated-fullwidth').length){
      jQuery.rsCSS3Easing.easeOutBack = 'cubic-bezier(0.175, 0.885, 0.320, 1.275)';
      $('.animated-fullwidth').each(function(index, el) {
        $(this).royalSlider({
          // Arrows navigation
          arrowsNav: <?php echo $jkv["arrowsNav_qed_tpl"]; ?>,
          arrowsNavAutoHide: <?php echo $jkv["arrowsNavAutoHide_qed_tpl"]; ?>,
          arrowsNavHideOnTouch: <?php echo $jkv["arrowsNavHideOnTouch_qed_tpl"]; ?>,
          controlNavigation: '<?php echo $jkv["controlNavigation_qed_tpl"]; ?>',
          // Slider scale and image
          autoScaleSlider: <?php echo $jkv["autoScaleSlider_qed_tpl"]; ?>,
          autoScaleSliderWidth: <?php echo $jkv["autoScaleSliderWidth_qed_tpl"]; ?>,
          autoScaleSliderHeight: <?php echo $jkv["autoScaleSliderHeight_qed_tpl"]; ?>,
          autoHeight:false,
          imageScaleMode: 'fill',
          imageAlignCenter: <?php echo $jkv["imageAlignCenter_qed_tpl"]; ?>,
          imgWidth: <?php echo $jkv["imgWidth_qed_tpl"]; ?>,
          imgHeight: <?php echo $jkv["imgHeight_qed_tpl"]; ?>,
          numImagesToPreload: <?php echo $jkv["numImagesToPreload_qed_tpl"]; ?>,
          // Load, Fade and Loop
          fadeinLoadedSlide: <?php echo $jkv["fadeinLoadedSlide_qed_tpl"]; ?>,
          loop: true,
          transitionType: '<?php echo $jkv["transitionType_qed_tpl"]; ?>',
          transitionSpeed: <?php echo $jkv["transitionSpeed_qed_tpl"]; ?>,
          keyboardNavEnabled: true,
          block: {
            delay: 300
          },
          //
          usePreloader: true,
          // Autoplay options
          autoPlay: {
            enabled: <?php echo $jkv["enabledAU_qed_tpl"]; ?>,
            pauseOnHover: <?php echo $jkv["pauseOnHoverAU_qed_tpl"]; ?>,
            delay: <?php echo $jkv["delayAU_qed_tpl"]; ?>,
          },
          // Custom Settings
          // ... other custom options here
        });
      });
    }
  });
</script>
