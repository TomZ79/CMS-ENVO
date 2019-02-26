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

echo PHP_EOL . "\t";
echo '<!-- Start JS INTRANET2 Plugin -->';

if ($page == 'intranet2' && $page1 == 'house' && $page2 == 'houselist') {

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin DataTable
	echo $Html -> addScript('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js');
	echo $Html -> addScript('https://cdn.jsdelivr.net/mark.js/8.6.0/jquery.mark.min.js');
	echo $Html -> addScript('https://cdn.jsdelivr.net/datatables.mark.js/2.0.0/datatables.mark.min.js');

}

if ($page == 'intranet2' && $page1 == 'house' && ($page2 == 'edithouse' || $page2 == 'newhouse')) {

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
	// Plugin Fancybox
	echo $Html -> addScript('/assets/plugins/fancybox/3.2.5/js/jquery.fancybox.min.js');
	// Plugin Isotope
	echo $Html -> addScript('assets/plugins/jquery-isotope/isotope.pkgd.min.js');

}

if ($page == 'intranet2' && $page1 != 'maps') {

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin DialogFX
	echo $Html -> addScript('assets/plugins/classie/classie.js');
	echo $Html -> addScript('assets/plugins/codrops-dialogFx/dialogFx.min.js');
	// Plugin Javascript
	echo $Html -> addScript('/plugins/intranet2/admin/js/script.intranet2.js');

}

if ($page == 'intranet2' && $page1 == 'maps' && $page2 == 'maps1') {

	// OSM Css style
	// The line below is only needed for old environments like Internet Explorer and Android 4.x
	echo $Html -> addScript('https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js');
	// The line below is only needed for old environments like Internet Explorer and Android 4.x
	echo $Html -> addScript('https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL');
	echo $Html -> addScript('https://unpkg.com/ol-contextmenu');

}

if ($page == 'intranet2' && ($page1 == 'maps' || $page2 == 'edithouse' || $page2 == 'newhouse')) {
	// JTSK_Converter
	echo $Html -> addScript('/plugins/intranet2/admin/js/converter.js');
}

echo PHP_EOL . "\t";
echo '<!-- End JS INTRANET2 Plugin -->';
// New line in source code
echo PHP_EOL;

?>

<?php if ($page == 'intranet2' && $page1 == 'maps' && $page2 == 'maps1') { ?>

	<script>
    $(document).ready(function () {

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
      // Marker Icon for Add Marker in Context Menu
      var markerIcon = '/plugins/intranet2/admin/img/icon_circlegraystroke_16px.png';
      // Basic Tile Layers
      var tileLayer1 = new ol.layer.Tile({
        source: new ol.source.OSM({
          url: 'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png'
        }),
        name: 'tileLayer1',
        title: 'OSM',
        visible: true
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
        visible: false
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
       * @description Getting GPS Coordinates by Click function
       */
      function simpleReverseGeocoding (lon, lat) {
        fetch('https://nominatim.openstreetmap.org/reverse?format=json&lon=' + lon + '&lat=' + lat).then(function (response) {
          return response.json();
        }).then(function (json) {
          document.getElementById('address').innerHTML = json.display_name;
        })
      }

      /**
       * @description Initialize OSM map
       */
      function initialize_map () {
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

        // from https://github.com/DmitryBaranovskiy/raphael
        function elastic (t) {
          return Math.pow(2, -10 * t) * Math.sin((t - 0.075) * (2 * Math.PI) / 0.3) + 1;
        }

        function center (obj) {
          view.animate({
            duration: 700,
            easing: elastic,
            center: obj.coordinate
          });
        }

        function marker (obj) {
          var coord4326 = ol.proj.transform(obj.coordinate, 'EPSG:3857', 'EPSG:4326');
          var template = '';
          var iconStyle = new ol.style.Style({
            image: new ol.style.Icon({scale: 1, src: markerIcon}),
            text: new ol.style.Text({
              offsetY: 25,
              text: ol.coordinate.format(coord4326, template, 2),
              font: '15px Open Sans,sans-serif',
              fill: new ol.style.Fill({color: '#111'}),
              stroke: new ol.style.Stroke({color: '#eee', width: 2})
            })
          });
          var feature = new ol.Feature({
            type: 'removable',
            geometry: new ol.geom.Point(obj.coordinate)
          });

          feature.setStyle(iconStyle);
          vectorLayer.getSource().addFeature(feature);
        }

        function searchares (obj) {
          var coordinate = ol.proj.toLonLat(obj.coordinate).map(function (val) {
            return val.toFixed(6);
          });
          var lon = coordinate[0];
          $('#lon').val(lon);
          var lat = coordinate[1];
          $('#lat').val(lat);

          fetch('https://nominatim.openstreetmap.org/reverse?format=json&lon=' + lon + '&lat=' + lat).then(function (response) {
            return response.json();
          }).then(function (json) {
            $('#address').html(json.display_name);

            var house_number = '';
            var corientacni = '';
            var cpopisne = '';
            var road = '';
            var city = '';
            $.each(json.address, function (key, value) {

              house_number = json.address['house_number'];
              // Split a string into an array of substrings
              corientacni = house_number.split('/')[0];
              cpopisne = house_number.split('/')[1];
              road = json.address['road'];
              city = json.address['city'];

            });

            console.log('corientacni -> ' + corientacni);
            console.log('cpopisne -> ' + cpopisne);
            console.log('road -> ' + road);

            // Ajax
            $.ajax({
              url: '/plugins/intranet2/admin/ajax/searchares_other.php',
              type: 'POST',
              dataType: 'json',
              data: {
                ares_maxcount: '200',
                ares_sort: 'ZADNE',
                ares_filtr: '1',
                ares_obec: '554961',
                ares_ulice: road,
                ares_corientacni: corientacni,
                ares_cpopisne: cpopisne,
                ares_record: '1'
              },
              cache: false,
              // Timeout 20s
              timeout: 20000,
              beforeSend: function () {

                $('#searchic_count').html('');
                // Show progress circle
                $('#searchic_wrapper').html('<div style="color: #FFF;position: absolute;top: 0;bottom: 0;left: 0;right: 0;width: 100%;height: 70%;margin: auto;"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>');

                $('#searchic_result').show(500);


              },
              success: function (data) {

                // Parse JSON data
                var str = JSON.stringify(data);
                var result = JSON.parse(str);

                if (data.status == 'upload_success') {
                  // IF DATA SUCCESS

                  // Data variable for output
                  var divdata = '';
                  var countdata = '';
                  divdata += '<table class="table_search">';
                  divdata += '<thead><tr><th>IČ</th><th>Sídlo</th></tr></thead>';
                  divdata += '<tbody>';

                  $.each(data, function (key, value) {
                    countdata = data.count_data;
                    if (key === 'data') {

                      $.each(value, function (key1, value1) {
                        divdata += '<tr><td>' + value1.ico + '</td><td>' + value1.ojm + '</td></tr>';
                      });

                    }

                  });

                  divdata += '</tbody></table>';

                } else {
                  // IF DATA ERROR

                  // Data variable for output
                  var divdata = '';
                  divdata += '<p style="color: #C10000;"><i class="fa fa-exclamation"></i> <strong>' + data.status_msg + '</strong></p>' +
                    '<p>' + data.status_info + '</p><hr>';

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

                // Output Data
                $('#searchic_wrapper').html('').prepend(divdata);
                $('#searchic_count').html(countdata);
                $('#searchic_result').show();

              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {

              },
              complete: function () {

              }
            });
          });

        }

        function searchjustice (obj) {
          var coordinate = ol.proj.toLonLat(obj.coordinate).map(function (val) {
            return val.toFixed(6);
          });
          var lon = coordinate[0];
          $('#lon').val(lon);
          var lat = coordinate[1];
          $('#lat').val(lat);

          fetch('https://nominatim.openstreetmap.org/reverse?format=json&lon=' + lon + '&lat=' + lat).then(function (response) {
            return response.json();
          }).then(function (json) {
            $('#address').html(json.display_name);

            var house_number = '';
            var corientacni = '';
            var cpopisne = '';
            var road = '';
            var city = '';
            $.each(json.address, function (key, value) {

              house_number = json.address['house_number'];
              // Split a string into an array of substrings
              corientacni = house_number.split('/')[0];
              cpopisne = house_number.split('/')[1];
              road = json.address['road'];
              city = json.address['city'];

            });

            console.log('corientacni -> ' + corientacni);
            console.log('cpopisne -> ' + cpopisne);
            console.log('road -> ' + road);

            // Ajax
            $.ajax({
              url: '/plugins/intranet2/admin/ajax/searchjustice.php',
              type: 'POST',
              dataType: 'json',
              data: {
                justice_maxcount: '500',
                justice_filtr: 'PLATNE',
                justice_obec: city,
                justice_ulice: road,
                justice_corientacni: corientacni,
                justice_cpopisne: cpopisne
              },
              cache: false,
              // Timeout 20s
              timeout: 20000,
              beforeSend: function () {

                $('#searchic_count').html('');
                // Show progress circle
                $('#searchic_wrapper').html('<div style="color: #FFF;position: absolute;top: 0;bottom: 0;left: 0;right: 0;width: 100%;height: 70%;margin: auto;"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">JUSTICE</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>');

                $('#searchic_result').show(500);


              },
              success: function (data) {

                // Parse JSON data
                var str = JSON.stringify(data);
                var result = JSON.parse(str);

                if (data.status == 'upload_success') {
                  // IF DATA SUCCESS

                  // Data variable for output
                  var divdata = '';
                  var countdata = '';
                  divdata += '<table class="table_search">';
                  divdata += '<thead><tr><th>IČ</th><th>Sídlo</th></tr></thead>';
                  divdata += '<tbody>';

                  $.each(data, function (key, value) {
                    countdata = data.count_data;
                    if (key === 'data') {

                      $.each(value, function (key1, value1) {
                        divdata += '<tr><td>' + value1.ico + '</td><td>' + value1.ojm + '</td></tr>';
                      });

                    }

                  });

                  divdata += '</tbody></table>';

                } else {
                  // IF DATA ERROR

                  // Data variable for output
                  var divdata = '';
                  divdata += '<p style="color: #C10000;"><i class="fa fa-exclamation"></i> <strong>' + data.status_msg + '</strong></p>' +
                    '<p>' + data.status_info + '</p><hr>';

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

                // Output Data
                $('#searchic_wrapper').html('').prepend(divdata);
                $('#searchic_count').html(countdata);
                $('#searchic_result').show();

              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {

              },
              complete: function () {

              }
            });
          });

        }

        var contextmenu = new ContextMenu({
          width: 170,
          // defaultItems are (for now) Zoom In/Zoom Out
          defaultItems: true,
          items: [
            {
              text: 'Center map here',
              classname: 'some-style-class',
              callback: center
            },
            {
              text: 'Add a Marker',
              icon: markerIcon,
              callback: marker
            },
            {
              text: 'Search ARES',
              callback: searchares
            },
            {
              text: 'Search JUSTICE',
              callback: searchjustice
            },
            // Separator
            '-'
          ]
        });
        map.addControl(contextmenu);

        //
        $(".layerlist").click(function () {
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

        // Bootstrap tooltip for controls
        $('.ol-zoom-in, .ol-zoom-out').tooltip({
          placement: 'right'
        });
        $('.ol-full-screen-false, .ol-full-screen-true').tooltip({
          placement: 'left'
        });

        $('#search_location').submit(function (e) {
          // Stop, the default action of the event will not be triggered
          e.preventDefault();

          console.log('----------- fn #search_location submit -----------');

          // Get value
          var form = $(this);

          var searchtext = $('input[name=search_input]').val();

          //
          var viewcenter = map.getView().getCenter();
          var lonlat = ol.proj.transform(viewcenter, 'EPSG:3857', 'EPSG:4326');
          var lon = lonlat[0];
          var lat = lonlat[1];

          // Ajax
          $.ajax({
            url: 'https://api.mapy.cz/suggest/?count=5&phrase=' + searchtext + '&lon=' + lon + '&lat=' + lat + '&zoom=20&enableCategories=0&lang=cs',
            type: form.attr('method'),
            dataType: 'json',
            success: function (data) {
              // IF DATA SUCCESS

              // Parse JSON data
              var str = JSON.stringify(data);
              var result = JSON.parse(str);

              // Data variable for output
              var divdata = '';
              var suggestFirstRow = '';
              var suggestSecondRow = '';

              console.log(' Data in json -------- ');

              divdata += '<ul class="list-unstyled result_list">';

              $.each(result.result, function (key, value) {
                console.log('Key -> ' + key + ' -> ' + value);
                $.each(value, function (key1, value1) {
                  console.log('Key 1 -> ' + key1 + ' -> ' + value1);
                  if (key1 === 'userData') {
                    suggestFirstRow = value.userData["suggestFirstRow"];
                    suggestSecondRow = value.userData["suggestSecondRow"];
                    divdata += '<li><span>' + suggestFirstRow + '</span><span>' + suggestSecondRow + '</span></li>';
                  }
                });
              });

              divdata += '</ul>';


              // Output Data
              $('#search_result').html('').prepend(divdata).show();

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            },
            complete: function () {

            }
          });


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
              geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857'))
            })]
          }),
          // Style for all elements on a layer
          style: new ol.style.Style({
            image: new ol.style.Icon({
              anchor: [0.5, 0.5],
              anchorXUnits: "fraction",
              anchorYUnits: "fraction",
              scale: .9,
              src: "/plugins/intranet2/admin/img/icon_circlered_16px.png"
            })
          })
        });

        $('#layer1').change(function () {
          $(this).prop('checked', vectorRedLayer.setVisible(this.checked));
        });
        map.addLayer(vectorRedLayer);
        vectorRedLayer.setZIndex(10);
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
              scale: .5,
              src: "/plugins/intranet2/admin/img/icon_squareblue_24px.png"
            })
          })
        });
        $('#layer2').change(function () {
          $(this).prop('checked', vectorBlueLayer.setVisible(this.checked));
        });
        map.addLayer(vectorBlueLayer);
        vectorBlueLayer.setZIndex(20);
      }

      $(window).on("load", function () {
        initialize_map();

        /**
         *
         */

				<?php
				// $result = $envodb -> query('SELECT gpslat, gpslng FROM ' . DB_PREFIX  . 'int2_houseent');
				$result = $envodb -> query('SELECT
																					e.gpslat,
																					e.gpslng,
																					h.administration
																				FROM
																				' . DB_PREFIX . 'int2_houseent e
																				LEFT JOIN ' . DB_PREFIX . 'int2_house h ON e.houseid = h.id
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

      /**
       * @description Close Ares searching result
       */
      $('#closeares').click(function () {
        var parent = $(this).parents(':eq(0)').attr('id');
        $('#' + parent).hide(500);
        console.log('Parent ID: ' + parent);
      });

      /**
       * @description Close map navigation
       */
      $('#closemapui').click(function () {
        var parent = $(this).parents(':eq(2)').attr('id');
        $('#' + parent).hide('slide', {direction: 'right'}, 500);
        console.log('Parent ID: ' + parent);
        $('.btncontrol').removeClass('active');
        $('.ol-full-screen').addClass('notactive');
      });

      /**
       * @description Close map navigation
       */
      $('#tlayer').click(function () {
        $('#map-ui').toggle('slide', {direction: 'right'}, 500);
        console.log('Parent ID: ' + parent);
        $('.btncontrol').toggleClass('active');
        $('.ol-full-screen').toggleClass('notactive');
      });


    });
	</script>

<?php } ?>

<?php if ($page == 'intranet2' && $page1 == 'search_db' && $page2 == 'justice') { ?>

	<script>
    $(document).ready(function () {

      /**
       * @description   Search object by address in JUSTICE
       */
      $('#searchJusticeOther').submit(function (e) {
        // Stop, the default action of the event will not be triggered
        e.preventDefault();

        console.log('----------- fn #searchJusticeOther submit -----------');

        // Get value
        var form = $(this);
        var justice_maxcount = $('#justice_maxcount');
        var justice_maxcountval = justice_maxcount.val();
        var justice_subject = $('input[name="justice_subject"]');
        var justice_subjectval = $.trim(justice_subject.val());
        var justice_obec = $('select[name="justice_obec"]');
        var justice_obecval = $.trim(justice_obec.val());
        var justice_ulice = $('select[name="justice_ulice"]');
        var justice_uliceval = $.trim(justice_ulice.val());
        var justice_corientacni = $('input[name="justice_corientacni"]');
        var justice_corientacnival = $.trim(justice_corientacni.val());
        var justice_cpopisne = $('input[name="justice_cpopisne"]');
        var justice_cpopisneval = $.trim(justice_cpopisne.val());
        var justice_record = $('input[name=recordDb]:checked');
        var justice_recordval = justice_record.val();
        // Ajax time
        var ajaxTime = new Date().getTime();
        // Remove all error texts
        $('.has-error-text').remove();
        // Remove error borders for input
        justice_subject.parent().removeClass('has-error');

        if (justice_subjectval.length && (justice_subjectval.length >= 3)) {

          // Ajax
          $.ajax({
            url: '/plugins/intranet2/admin/ajax/searchjustice_other.php',
            type: form.attr('method'),
            dataType: 'json',
            data: {
              justice_maxcount: justice_maxcountval,
              justice_filtr: 'PLATNE',
              justice_stype: 'CONTAINS',
              justice_subject: justice_subjectval,
              justice_obec: justice_obecval,
              justice_ulice: justice_uliceval,
              justice_corientacni: justice_corientacnival,
              justice_cpopisne: justice_cpopisneval,
              justice_record: justice_recordval
            },
            cache: false,
            // Timeout 20s
            timeout: 20000,
            beforeSend: function () {

              // Show progress circle
              $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">JUSTICE</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();

            },
            success: function (data) {

              // Parse JSON data
              var str = JSON.stringify(data);
              var result = JSON.parse(str);

              // Ajax time
              var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
              console.log('ajaxTime | Success Time: ' + totalTime);

              // Loading data progress
              $('#loadingdata').hide().html('');

              if (data.status == 'upload_success') {
                // IF DATA SUCCESS

                // Data variable for output
                var divdata = '';
                divdata += '<p><strong>' + data.status_msg + '</strong></p>' +
                  '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span><span class="float-right">Počet nalezených záznamů: <strong>' + data.count_data + '</strong></span></p><hr>';
                divdata += '<table class="table">';
                divdata += '<thead><tr><th>IČ</th><th>Název subjektu</th><th>Sídlo</th></tr></thead>';
                divdata += '<tbody>';

                $.each(data, function (key, value) {

                  if (key === 'data') {

                    $.each(value, function (key1, value1) {
                      divdata += '<tr><td><a href="https://www.bluesat.cz/admin/index.php?p=intranet2&sp=house&ssp=newhouse&ico=' + value1.ico + '" class="createhouse bold" target="windowNewHouse">' + value1.ico + '</a></td><td>' + value1.ojm + '</td><td>' + value1.jmn + '</td></tr>';

                    });

                  }

                });

                divdata += '</tbody></table>';

              } else {
                // IF DATA ERROR

                // Data variable for output
                var divdata = '';
                divdata += '<p style="color: #C10000;"><i class="fa fa-exclamation"></i> <strong>' + data.status_msg + '</strong></p>' +
                  '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span><span class="float-right">Počet nalezených záznamů: <strong>' + data.count_data + '</strong></p><hr>' +
                  '<p>' + data.status_info + '</p>';

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

              // Output Data
              $('#outputjusticedata').html('').prepend(divdata);
              // Ajax time
              $('#ajaxTime').html(totalTime);
              //
              if ($('.createhouse')[0]){
                $('.createhouse').on('click', function () {
                  $(this).css({
                    'text-decoration': 'line-through',
										'font-weight': '400',
										'color': 'gray'
									});
                });
              }

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

              // Loading data progress
              $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">JUSTICE</span><span style="float: left;width: 100%;margin-bottom: 10px;color: #C10000;font-weight: 700;">Vypršel časový limit pro komunikaci se serverem Justice</span><span style="color: #C10000; font-weight: 700;">Server Justice neodpovídá -> obnovte stránku a zkuste hledání později!</span></div></div>');

              if (debug) {
                console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
              }

              if (textStatus === 'timeout') {
                if (debug) console.log('Timeout: ' + textStatus + ': ' + errorThrown);
              } else {
                if (debug) console.log(textStatus + ': ' + errorThrown);
              }

            },
            complete: function () {

            }
          });

        } else {

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              icon: 'fa fa-exclamation',
              message: '<strong>Error:</strong> Zadejte název subjektu.'
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

          // Add border for input - error
          justice_subject.parent().addClass('has-error');
          // Show error texts
          $('<div/>', {
            class: 'has-error-text',
            css: {
              fontWeight: 'normal',
              color: '#C10000',
              position: ''
            },
            text: 'Vyplňte označenou položku'
          }).appendTo(justice_subject.parents(':eq(1)'));

          console.log('#searchJusticeOther submit fn | Error E01')

        }

      });

    });
	</script>

<?php } ?>


<script>
  $(document).ready(function () {

    /**
     * @description
     */
    $('#first-choice').on('change', function () {
      var datacity = $(this).find(':selected').data('city_cuzk_code');

      console.log(datacity);

      // Ajax
      $.ajax({
        url: '/plugins/intranet2/admin/ajax/getter.php',
        type: 'POST',
        dataType: 'html',
        data: {datacity: datacity},
        cache: false,
        // Timeout 20s
        timeout: 20000,
        beforeSend: function () {

          // Show progress text
          $('.loadingdata_street').html('Načítání ... Prosím počkejte').css('visibility', 'visible');
        },
        success: function (data) {

          $('#second-choice').html(data);
          // Hide progress text
          setTimeout(function () {
            $('.loadingdata_street').html('').css('visibility', 'hidden');
          }, 1000);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // Hide progress text
          setTimeout(function () {
            $('.loadingdata_street').html('').css('visibility', 'hidden');
          }, 1000);

					console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
        },
        complete: function () {

        }
      });
    });

  });
</script>

<?php if ($page == 'intranet2' && $page1 == 'help') { ?>

<script>
  $(document).ready(function () {
    // Add smooth scrolling on all links inside the navbar
    $("#navigation a").on('click', function (event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        console.log(hash);

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('.inner-content').animate({
          scrollTop: $(hash).offset().top
        }, 800, function () {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
        return false;
      }  // End if
    });

    // Add class for content (important for scrollbar)
    $('.page-content-wrapper').addClass('full-height');
    $('.page-content-wrapper .content').addClass('full-height');
    $('.page-content-wrapper .content .jumbotron').remove();
    $('.page-content-wrapper .content .container-fluid.container-fixed-lg').contents().unwrap();
    $('.container-fluid.footer').remove();
    $('.content.full-height').css({
      'display': 'flex',
      'justify-content': 'space-between'
    });

    // Scrollbar initialization
    $('.secondary-sidebar').scrollbar({
      ignoreOverlay: false
    });

    // Add scrollspy to <body>
    $('#inner-content').scrollspy({
			target: "#navigation",
			offset: 50
    });
  });
</script>

<style type="text/css">
	.scrollspyoffset {
		padding-top: 56px;
		margin-top: -56px;
	}
</style>

<style>
	/*  */
	.secondary-sidebar {
		width: 250px !important;
	}

	.secondary-sidebar .main-menu > li a {
		font-size: 13px;
		padding: 5px 0;
		line-height: 16px;
	}

	.secondary-sidebar .main-menu > li a:hover {
		color: #48B0F7;
		background-color: transparent;
	}

	.secondary-sidebar .main-menu > li a:focus {
		background-color: transparent;
	}

	.secondary-sidebar ul li a.active {
		color: #48B0F7;
	}

	/* hide inactive submenu */
	.nav ul.sub-menu,
	.nav ul.sub-menu ul.sub-menu-child {
		display: block;
	}

	/* show active submenu */
	.nav > .active > ul.sub-menu,
	.nav > .active > ul.sub-menu > .active > ul.sub-menu-child {
		display: block;
	}

	/*  */
	.secondary-sidebar .sub-menu-child {
		margin-left: 20px;
	}

	.secondary-sidebar .sub-menu li.active .sub-menu-child li a {
		color: rgba(120, 129, 149, 0.5) !important;
	}

	.secondary-sidebar .sub-menu li.active .sub-menu-child li.active a {
		color: #FFF !important;
	}

	.secondary-sidebar .sub-menu li.active .sub-menu-child li a:hover {
		color: #48B0F7 !important;
		background-color: transparent;
	}

	/* SCROLLBAR */
	.scroll-wrapper > .scroll-element.scroll-y {
		width: 7px;
	}

	.scroll-wrapper > .scroll-element.scroll-y .scroll-bar {
		width: 7px;
	}

</style>

<?php } ?>
