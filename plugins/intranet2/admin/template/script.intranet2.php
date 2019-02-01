<?php
/*
 * PLUGIN INTRANET2 - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/intranet2/admin/js/script.int2.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/intranet2/admin/js/script.int2.js'
 *
 */

if ($page == 'intranet2' && $page1 != 'maps' && $page2 != 'maps2') {

	echo PHP_EOL . '<!-- Start JS INTRANET2 Plugin -->';

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Load 'ace.js'  - only for selected pages
	if ($setting["adv_editor"] && !empty($page2)) {
		// Plugin ACE Editor
		echo $Html -> addScript('assets/plugins/ace/ace.js');
	}
	// TinyMCE Plugin
	if (!empty($page2)) {
		echo $Html -> addScript('/assets/plugins/tinymce/tinymce.min.js?=v4.3.12');
	}

	// Plugin DataTable
	echo $Html -> addScript('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js');
	// Plugin Fancybox
	echo $Html -> addScript('/assets/plugins/fancybox/3.2.5/js/jquery.fancybox.min.js');
	// Plugin DialogFX
	echo $Html -> addScript('assets/plugins/classie/classie.js');
	echo $Html -> addScript('assets/plugins/codrops-dialogFx/dialogFx.min.js');
	// Plugin Isotope
	echo $Html -> addScript('assets/plugins/jquery-isotope/isotope.pkgd.min.js');
	// JTSK_Converter
	echo $Html -> addScript('/plugins/intranet2/admin/js/converter.js');
	// Plugin Javascript
	echo $Html -> addScript('/plugins/intranet2/admin/js/script.intranet2.js');

	echo PHP_EOL . '<!-- End JS INTRANET2 Plugin -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>


<?php if ($page == 'intranet2' && $page1 == 'maps' && $page2 == 'maps1') { ?>

	<!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
	<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
	<script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
	<script>

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
    // Scale line control
    var scaleLineControl = new ol.control.ScaleLine({
      units: 'metric'
    });

    /**
     * @description Initialize OSM map
     */
    function initialize_map () {
      // Create the new map
      map = new ol.Map({
        // Target -> div 'id'
        target: 'map',
        // Setup layers
        layers: [
          // Set up the OSM layer
          new ol.layer.Tile({
            source: new ol.source.OSM({
              url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
            }),
          })
        ],
        // Setup controls and extend controls
        controls: ol.control.defaults({
          zoom: true,
          attribution: true,
          rotate: false
        }).extend([
          new ol.control.FullScreen({
            source: 'fullscreen'
          }),
          scaleLineControl
        ]),
        view: new ol.View({
          center: ol.proj.fromLonLat([mapLng, mapLat]),
          zoom: mapDefaultZoom
        })
      });

      // Bootstrap tooltip for controls
      $('.ol-zoom-in, .ol-zoom-out').tooltip({
        placement: 'right'
      });
      $('.ol-full-screen-false, .ol-full-screen-true').tooltip({
        placement: 'left'
      });
    }

    /**
     * @description Add redpoint to the OSM map
     * @param lat
     * @param lng
     */
    function add_map_redpoint (lat, lng) {
      var vectorRedLayer = new ol.layer.Vector({
        visible: true,
        title: 'RedPoint',
        source: new ol.source.Vector({
          features: [new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
          })]
        }),
        // Style for all elements on a layer
        style: new ol.style.Style({
          image: new ol.style.Icon({
            anchor: [0.5, 0.5],
            anchorXUnits: "fraction",
            anchorYUnits: "fraction",
            src: "https://upload.wikimedia.org/wikipedia/commons/f/fa/Circle_fc615c.svg"
          })
        })
      });

      $('#layer1').change(function () {
        $(this).prop('checked', vectorRedLayer.setVisible(this.checked));
      });
      map.addLayer(vectorRedLayer);
    }

    /**
     * @description Add bluepoint to the OSM map
     * @param lat
     * @param lng
     */
    function add_map_bluepoint (lat, lng) {
      var vectorBlueLayer = new ol.layer.Vector({
        visible: true,
        title: 'BluePoint',
        source: new ol.source.Vector({
          features: [new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
          })]
        }),
        // Style for all elements on a layer
        style: new ol.style.Style({
          image: new ol.style.Icon({
            anchor: [0.5, 0.5],
            anchorXUnits: "fraction",
            anchorYUnits: "fraction",
            src: "https://upload.wikimedia.org/wikipedia/commons/e/e7/Blue_00A4E9_9x9.svg"
          })
        })
      });
      $('#layer2').change(function () {
        $(this).prop('checked', vectorBlueLayer.setVisible(this.checked));
      });
      map.addLayer(vectorBlueLayer);
    }

    $(window).on("load", function () {
      initialize_map();

			<?php
			// $result = $envodb -> query('SELECT gpslat, gpslng FROM ' . DB_PREFIX  . 'int2_houseent');
			$result = $envodb -> query('SELECT
																				 e.gpslat,
																				 e.gpslng,
																				 h.administration
																			FROM
																			 		' . DB_PREFIX . 'int2_houseent e
																			LEFT JOIN ' . DB_PREFIX . 'int2_house h ON e.houseid = h.id;
		
		');
			while ($row = $result -> fetch_assoc()) {
				if ($row["administration"] == '1') {
					echo 'add_map_bluepoint(' . $row["gpslat"] . ', ' . $row["gpslng"] . ');';
				} else {
					echo 'add_map_redpoint(' . $row["gpslat"] . ', ' . $row["gpslng"] . ');';
				}

			}

			?>

    });

	</script>

<?php } ?>

<?php if ($page == 'intranet2' && $page1 == 'maps' && $page2 == 'maps2') { ?>

	<script>
    $(document).ready(function () {

      /**
			 * @description Init Pages Cards
       */
      $('.card').card();

      /**
			 * @description
       */
      $('#searchAres').click(function (e) {
        // Stop, the default action of the event will not be triggered
        e.preventDefault();

        console.log('----------- fn #searchAres click -----------');

        // Get value
        var ares_ico = $.trim($('input[name="ares_ico"]').val()).replace(/\s/g, '');
        var ajaxTime = new Date().getTime();

				// Ajax
        $.ajax({
          url: '/plugins/intranet2/admin/ajax/searchares.php',
          type: 'POST',
          dataType: 'json',
          data: {
            ares_ico: ares_ico
          },
          cache: false,
          beforeSend: function () {

            // Show progress circle
            $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


          },
          success: function (data) {

            // Ajax time
            var totalTime = Math.floor(new Date().getTime() - ajaxTime);
            var totalTime = msToTime(totalTime);
						console.log('ajaxAresTime | Success Time: ' + totalTime)

            if (data.status == 'upload_success') {
              // IF DATA SUCCESS

              // Loading data progress
              $('#loadingdata').hide().html('');



            } else {
              // IF DATA ERROR

              // Hide Ares loading progress
              $('#loadingdata').hide().html('');

              // Notification
              setTimeout(function () {
                $.notify({
                  // options
                  icon: 'fa fa-exclamation',
                  message: '<strong>Error:</strong> ' + data.status_msg
                }, {
                  // settings
                  type: 'danger',
                  delay: 2000
                });
              }, 1000);

            }

          },
          error: function () {

          },
          complete: function () {

          }
        });


      });
    });
	</script>


<?php } ?>

<script>
  $(document).ready(function () {

    /**
		 *
     */
    $('#loadObjCode').click(function (e) {
      // Stop, the default action of the event will not be triggered
      e.preventDefault();

      console.log('----------- fn #loadObjCode click -----------');

      // Get value
      var street = $.trim($('input[name="envo_housestreet"]').val()).replace(/\s/g, '+');
      var city = $.trim($('select[name="envo_housecity"] option:selected').text()).replace(/\s/g, '+');
      var datagps = street + ',' + city;
      var ajaxTime = new Date().getTime();

      // Ajax
      $.ajax({
        url: 'https://nominatim.openstreetmap.org/search?q=' + datagps + '&format=json&addressdetails=1',
        dataType: 'json',
        timeout: 30000,
        success: function (data) {

          var str = JSON.stringify(data);
          var result = JSON.parse(str);
          var wgslat = data[0].lat;
          var wgslon = data[0].lon;

          console.log('OpenStreetMaps | GPS data - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);

          $.ajax({
            url: 'https://services.cuzk.cz/wfs/inspire-bu-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=' + wgslat + ',' + wgslon + '&FEATURE_TYPE=Building',
            dataType: 'xml',
            success: function (data) {

              // Ajax time
              var totalTime = Math.floor(new Date().getTime() - ajaxTime);
              var totalTime = msToTime(totalTime);
              if (debug) {
                console.log('ajaxKatastrTime | Success Time: ' + totalTime)
              }

              // Extract relevant data from XML
              var buId = data.getElementsByTagName("base:localId")[0];
              var name = data.getElementsByTagName("bu-base:name")[0];
              name && (name = (name = name.getElementsByTagName("gn:text")) ? name[0].textContent : null);
              var buVdpId = data.getElementsByTagName("bu-base:reference")[0].textContent;

              console.log('buId: ' + buId.innerHTML);
              console.log('buTag: ' + name);
              console.log('buVdpId: ' + buVdpId);

              // Data variable for output DIV
              var divdata = '';
              divdata += '<div  class="col-sm-12">' +
                '<h5>Získaná data z databáze ČÚZK</h5><hr>' +
                '<p><strong>ČÚZK: GPS data byla nalezena a data byla stažena</strong></p>' +
                '<p>Doba zpracování požadavku: <span id="ajaxKatastrTime2">' + totalTime + '</span></p><hr>' +
                '<p><strong>buId: </strong> ' + buId.innerHTML + '</p>' +
                '<p><strong>Kód objektu (buVdpId): </strong> ' + buVdpId + '</p>' +
                '<p><strong>Stavba na pozemku (buTag): </strong> ' + name + '</p>' +
                '<p><strong>Detail stavebního objektu: </strong><a href="http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/' + buVdpId + '" target="WindowCUZK">Zobrazit detail objektu na CÚZK</a></p><hr>' +
                '</div>';

              // Output Data
              $('#katastroutput').html('').prepend(divdata).show();
              $('input[name="envo_houseobjcode"]').val(buVdpId).css('background-color', '#FFF5CC');

              // Remove background color from 'input'
              setTimeout(function () {
                $('input[name="envo_houseobjcode"]').css('background-color', '#FFF');
              }, 8000);

            },
            error: function (data) {
              console.log('Error loading XML data');
            }
          });

        },
        error: function () {

        },
        complete: function () {

        }
      });

    });

    /**
		 *
     */
    $('#loadIkatastr').click(function (e) {
      // Stop, the default action of the event will not be triggered
      e.preventDefault();

      console.log('----------- fn #loadIkatastr click -----------');

      // Get value
      var street = $.trim($('input[name="envo_housestreet"]').val()).replace(/\s/g, '+');
      var city = $.trim($('select[name="envo_housecity"] option:selected').text()).replace(/\s/g, '+');
      var datagps = street + ',' + city;

      // Ajax
      $.ajax({
        url: 'https://nominatim.openstreetmap.org/search?q=' + datagps + '&format=json&addressdetails=1',
        dataType: 'json',
        timeout: 30000,
        success: function (data) {

          var str = JSON.stringify(data);
          var result = JSON.parse(str);
          var wgslat = data[0].lat;
          var wgslon = data[0].lon;

          console.log('OpenStreetMaps | GPS data - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);

          // Set ikatastr text for input
          var ikatastr = 'https://www.ikatastr.cz/#kde=' + wgslat + ',' + wgslon + ',19&mapa=osm&vrstvy=parcelybudovy&info=' + wgslat + ',' + wgslon;

          // Data variable for output DIV
          var divdata = '';
          divdata += '<div  class="col-sm-12">' +
            '<h5>iKatastr - Link</h5><hr>' +
            '<p><a href="' + ikatastr + '" target="WindowKATASTR">Zobrazit informace z Katastru</a></p><hr>' +
            '</div>';

          // Output Data
          $('#katastroutput').html('').prepend(divdata).show();

        },
        error: function () {

        },
        complete: function () {

        }
      });

    });

  });
</script>
