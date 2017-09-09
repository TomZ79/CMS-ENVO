<!-- END PAGE -->
</div>
</div>
<!-- END CONTAINER -->
</div>

<!-- JS and PLUGIN
  ================================================== -->
<!-- BEGIN JS DEPENDECENCIES-->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4');
echo $Html->addScript('/assets/plugins/bootstrapv3/js/bootstrap.min.js');
echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-scrollbar/jquery.scrollbar.min.js');
echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-numberAnimate/jquery.animateNumbers.js');
?>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/webarch.js');
?>

<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
// Script only for pages which contains 'table'
if ($page1 == 'house' && empty($page2)) echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-datatable/js/jquery.dataTables.min.js?=v1.10.15');
?>

<!-- END PAGE LEVEL PLUGINS   -->
<!-- PAGE JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
// Script only for Dashboard
if (empty($page1)) echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/dashboard.js');
// Script only for pages which contains 'table'
if ($page1 == 'house' && empty($page2)) echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/datatables.js');
?>

<?php if ($page1 == 'house' && !empty($page2)) { ?>

  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Google maps
  echo $Html->addScript('https://maps.google.com/maps/api/js?sensor=true.');
  // Isotope
  echo $Html->addScript('https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
  // Fancybox
  echo $Html->addScript('/assets/plugins/fancybox/3.0/js/jquery.fancybox.min.js');
  // Photo gallery
  echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/gallery.js');
  ?>

  <script>

    (function() {
      var map, mapOptions, marker, position;

      position = new google.maps.LatLng(<?php echo $envo_house_latitude . ',' . $envo_house_longitude; ?>);

      mapOptions = {
        zoom: 17,
        center: position,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map($('#google-container')[0], mapOptions);

      marker = new google.maps.Marker({
        position: position,
        map: map
      });

      marker.setMap(map);

    }).call(this);


  </script>

<?php } ?>
</body>
</html>