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