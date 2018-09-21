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
echo $Html -> addScript('/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4');
echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html -> addScript('/assets/plugins/bootstrap/bootstrapv3/js/bootstrap.min.js?=v3.3.7');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-scrollbar/jquery.scrollbar.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-numberAnimate/jquery.animateNumbers.min.js');
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
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/webarch.min.js');
?>

<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
// Script only for pages which contains 'table'
if (($page1 == 'house' && empty($page2)) || ($page1 == 'house' && $page2 == 'searchdvbt2') || ($page1 == 'houselist' && empty($page2))) echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-datatable/js/jquery.dataTables.min.js?=v1.10.15');
?>

<!-- END PAGE LEVEL PLUGINS   -->
<!-- PAGE JS -->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
// Script only for Dashboard
if (empty($page1)) echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/dashboard.min.js');
// Script only for pages which contains 'table'
if (($page1 == 'house' && empty($page2)) || ($page1 == 'house' && $page2 == 'searchdvbt2') || ($page1 == 'houselist' && empty($page2))) echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/datatables.min.js');
?>

<?php if (($page1 == 'house' && !empty($page2)) || ($page1 == 'houselist' && !empty($page2))) {

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Mapy.cz maps
  echo $Html -> addScript('https://api.mapy.cz/loader.js');
  echo "<script type=\"text/javascript\">Loader.load();</script>";
  // Plugin DialogFX
  echo $Html -> addScript('/admin/assets/plugins/classie/classie.js');
  echo $Html -> addScript('/admin/assets/plugins/codrops-dialogFx/dialogFx.js');
  // Isotope
  echo $Html -> addScript('https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
  // Fancybox
  echo $Html -> addScript('/assets/plugins/fancybox/3.4.1/js/jquery.fancybox.min.js');
  // Photo gallery
  echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/gallery.min.js');

  if ($page1 == 'house' && !empty($page2)) {
    // Plugin Fileuploader
    echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/fileuploader/1.4/jquery.fileuploader.min.js');
  }

  echo PHP_EOL;

  $str = <<<EOT
<script>
$(document).ready(function() {
  
var center = SMap.Coords.fromWGS84({$envo_house_longitude}, {$envo_house_latitude});
var m = new SMap(JAK.gel("maps-container"), center, 17);
m.addDefaultLayer(SMap.DEF_BASE).enable();
m.addDefaultControls();

var layer = new SMap.Layer.Marker();
m.addLayer(layer);
layer.enable();

var options = {};
var marker = new SMap.Marker(center, "myMarker", options);
layer.addMarker(marker);

});
</script>
EOT;

  if (!empty($envo_house_latitude) || !empty($envo_house_longitude)) echo $str;

  echo PHP_EOL;

} ?>

</body>
</html>