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

if ($page == 'intranet2') {

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
	// Plugin Javascript
	echo $Html -> addScript('/plugins/intranet2/admin/js/script.intranet2.js');

	echo PHP_EOL . '<!-- End JS INTRANET2 Plugin -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>


<?php if ($page == 'intranet2' && $page1 == 'maps') { ?>

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

      $('#layer1').change(function() {
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
      $('#layer2').change(function() {
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
																			 		' . DB_PREFIX  . 'int2_houseent e
																			LEFT JOIN ' . DB_PREFIX  . 'int2_house h ON e.houseid = h.id;
		
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