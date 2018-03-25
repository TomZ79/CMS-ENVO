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
echo $Html->addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html->addScript('/assets/plugins/bootstrapv3/js/bootstrap.min.js');
echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-scrollbar/jquery.scrollbar.min.js');
echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-numberAnimate/jquery.animateNumbers.min.js');
?>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script>
  // Global options
  var envoWebIntranet = {
    envo_lang: '<?=$site_language?>'
  };
</script>
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/webarch.min.js');
?>

<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
// Script only for pages which contains 'table'
if (($page1 == 'house' && empty($page2)) || ($page1 == 'house' && $page2 == 'searchdvbt2')) echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-datatable/js/jquery.dataTables.min.js?=v1.10.15');
?>

<!-- END PAGE LEVEL PLUGINS   -->
<!-- PAGE JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
// Script only for Dashboard
if (empty($page1)) echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/dashboard.min.js');
// Script only for pages which contains 'table'
if (($page1 == 'house' && empty($page2)) || ($page1 == 'house' && $page2 == 'searchdvbt2')) echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/datatables.min.js');
?>

<?php if ($page1 == 'house' && !empty($page2)) {

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Google maps
  echo $Html->addScript('https://maps.google.com/maps/api/js?key=AIzaSyC0YxpRvj4Sv6j1JJFaDuX4cO6OGYD3EpM');
  // Plugin DialogFX
  echo $Html->addScript('/admin/assets/plugins/classie/classie.js');
  echo $Html->addScript('/admin/assets/plugins/codrops-dialogFx/dialogFx.js');
  // Isotope
  echo $Html->addScript('https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
  // Fancybox
  echo $Html->addScript('/assets/plugins/fancybox/3.1.25/js/jquery.fancybox.min.js');
  // Photo gallery
  echo $Html->addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/gallery.min.js');

  echo PHP_EOL;

  $str = <<<EOT
<script>
$(document).ready(function() {
  var map, mapOptions, marker, position;

  position = new google.maps.LatLng({$envo_house_latitude}, {$envo_house_longitude});

  mapOptions = {
    zoom: 17,
    center: position,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
  map = new google.maps.Map(document.getElementById("google-container-map"), mapOptions);

  marker = new google.maps.Marker({
    position: position,
    map: map
  });
});
</script>
EOT;

  if (!empty($envo_house_latitude) || !empty($envo_house_longitude)) echo $str;

  echo PHP_EOL;

} ?>

</body>
</html>