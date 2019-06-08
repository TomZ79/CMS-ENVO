</div>
<!-- /CONTENT AREA -->

<!-- FOOTER -->
<div class="navbar navbar-expand-lg navbar-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
			<i class="icon-unfold mr-2"></i>
			Footer
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2018 - 2019. <strong>Bluesat Web App Kit</strong> -> <span>Intranet verze <?= get_pluginversion('Intranet2') ?></span>
					</span>

	</div>
</div>
<!-- /FOOTER -->

</div>
<!-- /MAIN CONTENT -->

</div>
<!-- /PAGE CONTENT -->

<!-- JS and PLUGIN
  ================================================== -->
<!-- BEGIN JS DEPENDECENCIES-->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript('/assets/plugins/jquery/3.3.1/jquery-3.3.1.min.js');
echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/bootstrap.bundle.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/loaders/blockui.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/ui/ripple.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-numberAnimate/jquery.animateNumbers.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/uniform/uniform.js');
echo $Html -> addScript('/assets/plugins/bootstrap-select2/4.0.5/js/select2.full.min.js');
echo $Html -> addScript('/assets/plugins/bootstrap-select2/4.0.5/js/i18n/cs.js');
if ($page1 == 'house' && $page2 == 'houselist') {
	// DataTables (Script only for pages which contains 'table')
	echo $Html -> addScript('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js');
	echo $Html -> addScript('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js');
	// Buttons
	echo $Html -> addScript('https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js');
	echo $Html -> addScript('https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js');
	// Buttons - Excel Export
	echo $Html -> addScript('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js');
	// Buttons - PDF Export
	echo $Html -> addScript('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');
	echo $Html -> addScript('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');
	// Buttons - Print Export
	echo $Html -> addScript('https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js');
	// Init DataTable
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/datatables.min.js');
}
if ($page1 == 'house' && $page2 == 'h' && !empty($page3)) {
	// Plugin DialogFX
	echo $Html -> addScript('/admin/assets/plugins/classie/classie.js');
	echo $Html -> addScript('/admin/assets/plugins/codrops-dialogFx/dialogFx.js');
	// Plugin Fancybox
	echo $Html -> addScript('/assets/plugins/fancybox/3.5.7/js/jquery.fancybox.min.js');
	// Isotope
	echo $Html -> addScript('https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
	// Photo gallery
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/gallery.js');
}
?>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script>
  // Global options
  var envoWebIntranet2 = {
    envo_lang: '<?=$site_language?>'
  };
</script>

<?php
if ($page == 'intranet' && $page1 == 'maps' && $page2 == 'maps1') {

	// OSM Css style
	// The line below is only needed for old environments like Internet Explorer and Android 4.x
	echo $Html -> addScript('https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js');
	// The line below is only needed for old environments like Internet Explorer and Android 4.x
	echo $Html -> addScript('https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL');
	echo $Html -> addScript('https://cdn.jsdelivr.net/npm/ol-contextmenu@3.3.0/dist/ol-contextmenu.min.js');
	// JTSK_Converter
	echo $Html -> addScript('/plugins/intranet2/admin/js/converter.js');

}
?>

<?php if ($page == 'intranet' && $page1 == 'maps' && $page2 == 'maps1') { ?>

	<script>
    $(document).ready(function () {

      /**
       * @description Detect mobile device
       */

      // Initiate as false
      var isMobile = false;
      // Device detection
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        isMobile = true;
      }

      /**
       * @description  Convert miliseconds to time
       */
      function msToTime (s) {

        // Pad to 2 or 3 digits, default is 2
        function pad (n, z) {
          z = z || 2;
          return ('00' + n).slice(-z);
        }

        var ms = s % 1000;
        s = (s - ms) / 1000;
        var secs = s % 60;
        s = (s - secs) / 60;
        var mins = s % 60;
        var hrs = (s - mins) / 60;

        // return pad(hrs) + ':' + pad(mins) + ':' + pad(secs) + '.' + pad(ms, 3);
        return pad(mins) + ':' + pad(secs) + '.' + pad(ms, 3);
      }

      /**
       * @description Close
       */
      function close (element) {
        $('#' + element).hide();
        map.updateSize();
        console.log('Element ID: ' + element);
      }

      $('.close-map').on("click", function () {
        close('map-ui');
        $('.control-layers').css('right', '0');
        $('.control-button').removeClass('active');
      });

      $('.close-search').on("click", function () {
        close('search_result');
        $('#search_location input[name="search_input"]').val('');
      });

      /**
       * @description Show
       */
      $('#layers-ui').on('click', function () {
        if (isMobile == false) {
          $('.control-layers').css('right', '250px');
        }
        $('#map-ui [class$="-ui"]').hide();
        $('#map-ui, .layers-ui').show();
        $('.control-button').removeClass('active');
        $(this).addClass('active');
        map.updateSize();
      });

      $('#search-ui').on('click', function () {
        if (isMobile == false) {
          $('.control-layers').css('right', '250px');
        }
        $('#map-ui [class$="-ui"]').hide();
        $('#map-ui, .search-ui').show();
        $('.control-button').removeClass('active');
        $(this).addClass('active');
        map.updateSize();
      });

      $('#noname-ui').on('click', function () {
        if (isMobile == false) {
          $('.control-layers').css('right', '250px');
        }
        $('#map-ui [class$="-ui"]').hide();
        $('#map-ui, .noname-ui').show();
        $('.control-button').removeClass('active');
        $(this).addClass('active');
        map.updateSize();
      });

      $('#legend-ui').on('click', function () {
        if (isMobile == false) {
          $('.control-layers').css('right', '250px');
        }
        $('#map-ui [class$="-ui"]').hide();
        $('#map-ui, .legend-ui').show();
        $('.control-button').removeClass('active');
        $(this).addClass('active');
        map.updateSize();
      });

      /**
       * @description
       */
      function centerMap (lat, lng) {
        console.log("Long: " + lng + " Lat: " + lat);
        map.getView().setCenter(ol.proj.transform([lng, lat], 'EPSG:4326', 'EPSG:3857'));
        map.getView().setZoom(18);
      }

      /**
       * @description Remove and Add Vector Layer (Search by Address)
       */
      var vectorLayer;

      function remove_map_point() {
        if (vectorLayer) {
          map.removeLayer(vectorLayer);
        }
      }

      function add_map_point (lat, lng) {
        vectorLayer = new ol.layer.Vector({
          source: new ol.source.Vector({
            features: [new ol.Feature({
              geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857'))
            })]
          }),
          style: new ol.style.Style({
            image: new ol.style.Icon({
              // Anchor. Default value is [0.5, 0.5] (icon center).
              anchor: [0.5, 0.5],
              // The real size of your icon in pixel
              size: [60, 100],
              offset: [0, 0],
              offsetOrigin: 'top-left',
              opacity: 0.8,
              // The scale factor
              scale: 0.8,
              anchorXUnits: "fraction",
              anchorYUnits: "fraction",
              // Image source URI
              src: "/plugins/intranet2/template/img/maps/marker/imagefiles_location_map_pin_red5.png"
            })
          })
        });

        map.addLayer(vectorLayer);
      }

      /* OSM & OL example code provided by https://mediarealm.com.au/ */
      /* https://mediarealm.com.au/articles/openstreetmap-openlayers-map-markers/ */

      /**
       * @description Settings for new map
       */
      var map;
      // GPS Position - Latitude
      var mapLat = 50.2331;
      // GPS Position - Longitude
      var mapLng = 12.8710;
      // Default map zoom
      var mapDefaultZoom = 14;
      // Maximum map zoom
      var mapMaximumZoom = 19;
      // Minimum map zoom
      var mapMinimumZoom = 9;
      // Scale line control
      var scaleLineControl = new ol.control.ScaleLine({
        units: 'metric'
      });
      // Basic Tile Layers
      var tileLayer1 = new ol.layer.Tile({
        source: new ol.source.OSM({
          url: 'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png'
        }),
        name: 'tileLayer1',
        title: 'OSM',
        visible: false
      });
      var tileLayer2 = new ol.layer.Tile({
        source: new ol.source.TileImage({
          url: 'https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}&key=AIzaSyAhaIJ8WMWQScbDq50ylDbVxsb1i3IhRaU'
        }),
        name: 'tileLayer2',
        title: 'Google Road Map',
        visible: false
      });
      var tileLayer3 = new ol.layer.Tile({
        source: new ol.source.TileImage({
          url: 'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}&key=AIzaSyAhaIJ8WMWQScbDq50ylDbVxsb1i3IhRaU'
        }),
        name: 'tileLayer3',
        title: 'Google Satellite & Roads',
        visible: false
      });
      var tileLayer4 = new ol.layer.Tile({
        source: new ol.source.TileImage({
          url: 'https://mapserver.mapy.cz/base-m/{z}-{x}-{y}'
        }),
        name: 'tileLayer4',
        title: 'Mapy.cz - Základní',
        visible: true
      });
      var tileLayer5 = new ol.layer.Tile({
        source: new ol.source.TileImage({
          url: 'https://mapserver.mapy.cz/ophoto-m/{z}-{x}-{y}'
        }),
        name: 'tileLayer5',
        title: 'Mapy.cz - Letecká',
        visible: false
      });
      var tileLayer6 = new ol.layer.Tile({
        source: new ol.source.TileImage({
          url: 'https://geoportal.cuzk.cz/WMTS_ZM_900913/WMTService.aspx?service=WMTS&request=GetTile&version=1.0.0&layer=zm&style=default&format=image/jpeg&TileMatrixSet=googlemapscompatibleext2:epsg:3857&TileMatrix={z}&TileRow={y}&TileCol={x}'
        }),
        name: 'tileLayer6',
        title: 'ČÚZK - Geografická',
        visible: false
      });
      // Vector Layers
      var vectorLayer = new ol.layer.Vector({source: new ol.source.Vector()});
      // Settings for map vies
      var view = new ol.View({
        center: ol.proj.fromLonLat([mapLng, mapLat]),
        zoom: mapDefaultZoom,
        minZoom: mapMinimumZoom,
        maxZoom: mapMaximumZoom
      });

      /**
       * @description Initialize OSM map
       */
      // Create the new map
      map = new ol.Map({
        // Target -> div 'id'
        target: 'map',
        // Setup layers
        layers: [tileLayer1, tileLayer2, tileLayer3, tileLayer4, tileLayer5, tileLayer6, vectorLayer],
        // Setup controls and extend controls
        controls: ol.control.defaults({
          zoom: true,
          attribution: true,
          rotate: false
        }).extend([
          new ol.control.FullScreen({
            source: 'fullscreen'
          }),
          new ol.control.ZoomSlider(),
          scaleLineControl
        ]),
        view: view
      });

      /**
       * @description
       */
      $('.layerlist').change(function () {
        var lid = $(this).attr('id');
        map.getLayers().forEach(function (layer) {
          if (layer.get('name') == lid) {
            var visibility = layer.getVisible();
            if (visibility == false) {
              layer.setVisible(true);
            }
            if (visibility == true) {
              layer.setVisible(false);
            }
          } else {
            layer.setVisible(false);
          }
        });
        map.updateSize();


      });

      /**
       * @description
       */
      $('#search_location').on('submit', function (e) {
        // Stop, the default action of the event will not be triggered
        e.preventDefault();

        // ------------ Basic variable
        // Storing in a variable
        var form = $(this);
        // Get value
        var query = $('input[name="search_input"]');
        var queryval = query.val();
        // Ajax time
        var ajaxTime = new Date().getTime();

        // ------------ Jquery code

        console.log('Gps_mapy Click fn | Query: ' + queryval);

        // Ajax
        $.ajax({
          url: '/plugins/intranet2/template/ajax/gpscoordinates_mapy.php',
          type: form.attr('method'),
          dataType: 'json',
          data: {
            query: queryval
          },
          cache: false,
          // Timeout 20s
          timeout: 20000,
          beforeSend: function () {

          },
          success: function (data) {

            if (data.status == 'success') {
              // IF DATA SUCCESS

              var wgslat, wgslon, divdata = '';

              // Data variable for output DIV
              $.each(data.data, function (item) {

                console.log(data.data[item]);

                wgslat = data.data[item].y;
                wgslon = data.data[item].x;

                // Data variable for output DIV
                divdata += '<div class="row"><div class="col-sm-12"><p><a href="#" class="bold centermap" data-gps-lat="' + wgslat + '" data-gps-lon="' + wgslon + '">' + data.data[item].title + '</a></p></div></div>';

              });

              // Data variable for output DIV
              divdata += '</div>';

              // Output Data
              $('#result').html('').prepend(divdata).show();
              $('#search_result').show();

              //
              $('.centermap').click(function () {
                var wgslat = $(this).data('gps-lat');
                var wgslon = $(this).data('gps-lon');
                centerMap(wgslat, wgslon);
                remove_map_point();
                add_map_point(wgslat, wgslon);
              });

              // Ajax time
              var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
              console.log('Ajax => Success Time: ' + totalTime);

            } else {
              // IF DATA ERROR

            }

          },
          error: function (jqXHR, textStatus, errorThrown) {

            // Console Error
            var errorel = '';
            var errorlog = $('#outputajaxdata_gps .errorlog');
            if (jqXHR.status === 0) {
              var errorel = 'Ajax => Not connect, Verify Network';
              errorlog.html(errorel);
              console.log(errorel);
            } else if (jqXHR.status == 404) {
              var errorel = 'Ajax => Requested page not found [404] | ' + jqXHR.responseText;
              errorlog.html(errorel);
              console.log(errorel);
            } else if (jqXHR.status == 500) {
              var errorel = 'Ajax => Internal Server Error [500] | ' + jqXHR.responseText;
              errorlog.html(errorel);
              console.log(errorel);
            } else if (textStatus === 'parsererror') {
              var errorel = 'Ajax => Requested JSON parse failed';
              errorlog.html(errorel);
              console.log(errorel);
            } else if (textStatus === 'timeout') {
              var errorel = 'Ajax => Time out error | ' + textStatus + ': ' + errorThrown;
              errorlog.html(errorel);
              console.log(errorel);
            } else if (textStatus === 'abort') {
              var errorel = 'Ajax => Ajax request aborted';
              errorlog.html(errorel);
              console.log(errorel);
            } else {
              var errorel = 'Ajax => Unexpected Error | ' + jqXHR.responseText;
              errorlog.html(errorel);
              console.log(errorel);
            }


            // Ajax time
            var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
            console.log('Ajax => Error Time: ' + totalTime);

          },
          complete: function () {

          }
        });


      });

      /**
       * @description Remove and Add Vector Layer
       */
      var vectorDataLayer;

      function log_data_point() {
        if (vectorDataLayer) {
          console.log(vectorDataLayer);
        }
      }

      function remove_data_point() {
        if (vectorDataLayer) {
          // map.removeLayer(vectorDataLayer);
          vectorDataLayer.getSource().clear();
        }
      }

      function add_data_point (lat, lng, img) {
        vectorDataLayer = new ol.layer.Vector({
          source: new ol.source.Vector({
            features: [new ol.Feature({
              geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857'))
            })]
          }),
          style: new ol.style.Style({
            image: new ol.style.Icon({
              // Anchor. Default value is [0.5, 0.5] (icon center).
              anchor: [0.5, 0.5],
              // The real size of your icon in pixel
              size: [60, 60],
              offset: [0, 0],
              offsetOrigin: 'top-left',
              opacity: 0.9,
              // The scale factor
              scale: 0.5,
              anchorXUnits: "fraction",
              anchorYUnits: "fraction",
              // Image source URI
              src: img
            })
          })
        });

        map.addLayer(vectorDataLayer);
      }

      /**
       * @description   Search data by selects
       */
      $('#searchData').on('submit', function (e) {
        // Stop, the default action of the event will not be triggered
        e.preventDefault();

				console.log('----------- fn #searchData submit -----------');

        // ------------ Basic variable

        // Get value
        var form = $(this);
        var city = $('select[name="city"]').find(':selected');
        var cityval = $.trim(city.val());
        var estatemanagement = $('select[name="estatemanagement"]').find(':selected');
        var estatemanagementval = $.trim(estatemanagement.val());
        var management = $('input[name="management"]');
        var managementval = management.is(':checked') ? true : false;
        // Ajax time
        var ajaxTime = new Date().getTime();

        // ------------ Jquery code

				console.log('Form Data -> Management : ' + managementval);
        // Ajax
        $.ajax({
          url: '/plugins/intranet2/template/ajax/search_data.php',
          type: form.attr('method'),
          dataType: 'json',
          data: {
            city: cityval,
            estatemanagement: estatemanagementval,
            management: managementval
          },
          cache: false,
          // Timeout 20s
          timeout: 20000,
          beforeSend: function () {

          },
          success: function (data) {

            // Parse JSON data
            var str = JSON.stringify(data);
            var result = JSON.parse(str);

            if (data.status == 'data_success') {
              // IF DATA SUCCESS

              //
              var imgarray0 = [
                '/plugins/intranet2/template/img/maps/marker/square_red.png',
                '/plugins/intranet2/template/img/maps/marker/square_navyblue.png',
                '/plugins/intranet2/template/img/maps/marker/imagefiles_location_map_pin_blue6.png'
              ];
              var imgarray1 = [
                '/plugins/intranet2/template/img/maps/marker/square_green.png',
                '/plugins/intranet2/template/img/maps/marker/square_gray.png',
                '/plugins/intranet2/template/img/maps/marker/square_yellow.png',
                '/plugins/intranet2/template/img/maps/marker/square_brown.png'
              ];
              var img = imgarray1[Math.floor(Math.random() * imgarray1.length)];
              var m = data['search_string']['management'];

              // Data variable for output
              $.each(data, function (key, value) {

                if (key === 'data') {

                  $.each(value, function (key1, value1) {

                    if (m == true) {
                      add_data_point(value1.gpslat, value1.gpslng, imgarray0[2]);
										} else {
                      if (value1.estatemanagement_id == 1) {
                        // FIMA KV
                        add_data_point(value1.gpslat, value1.gpslng, imgarray0[0]);
                      } else if (value1.estatemanagement_id == 5) {
                        // ORBYT KV
                        add_data_point(value1.gpslat, value1.gpslng, imgarray0[1]);
                      } else {
                        add_data_point(value1.gpslat, value1.gpslng, img);
                      }
										}


                    // console.log(value1.obj_name + ' | ' + value1.estatemanagement_id);
                  });

                }

              });



            } else {
              // IF DATA ERROR


            }

            // Output Data

            // Ajax time
            var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
            $('#ajaxTime').html(totalTime);
						console.log('Ajax => Error Time: ' + totalTime);

          },
          error: function (jqXHR, textStatus, errorThrown) {

            // Console Error
            var errorel = '';
            var errorlog = $('#outputaresdata .errorlog');
            if (jqXHR.status === 0) {
              var errorel = 'Ajax => Not connect, Verify Network';
              errorlog.html(errorel);
              console.log(errorel);
            } else if (jqXHR.status == 404) {
              var errorel = 'Ajax => Requested page not found [404] | ' + jqXHR.responseText;
              errorlog.html(errorel);
              console.log(errorel);
            } else if (jqXHR.status == 500) {
              var errorel = 'Ajax => Internal Server Error [500] | ' + jqXHR.responseText;
              errorlog.html(errorel);
              console.log(errorel);
            } else if (textStatus === 'parsererror') {
              var errorel = 'Ajax => Requested JSON parse failed';
              errorlog.html(errorel);
              console.log(errorel);
            } else if (textStatus === 'timeout') {
              var errorel = 'Ajax => Time out error | ' + textStatus + ': ' + errorThrown;
              errorlog.html(errorel);
              console.log(errorel);
            } else if (textStatus === 'abort') {
              var errorel = 'Ajax => Ajax request aborted';
              errorlog.html(errorel);
              console.log(errorel);
            } else {
              var errorel = 'Ajax => Unexpected Error | ' + jqXHR.responseText;
              errorlog.html(errorel);
              console.log(errorel);
            }

            // Ajax time
            var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
            console.log('Ajax => Error Time: ' + totalTime);

          },
          complete: function () {

          }
        });

      });

    })
    ;
	</script>

<?php } ?>

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/app.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/custom.js');
?>

<!-- END CORE TEMPLATE JS -->

<?php
if ($page1 == '404') {

	echo PHP_EOL;

	$str = <<<EOT
<script>
$(document).ready(function() {
  
$('div.content-wrapper .content.pt-0').addClass('d-flex justify-content-center align-items-center');

});
</script>
EOT;

	echo $str;

	echo PHP_EOL;

} ?>

</body>
<!-- END BODY -->
</html>