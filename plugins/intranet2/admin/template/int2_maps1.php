<?php include_once APP_PATH . 'admin/template/header.php'; ?>

	<link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
	<style>
		.fullscreen:-moz-full-screen {
			height: 100%;
		}

		.fullscreen:-webkit-full-screen {
			height: 100%;
		}

		.fullscreen:-ms-fullscreen {
			height: 100%;
		}

		.fullscreen:fullscreen {
			height: 100%;
		}

		.fullscreen {
			margin-bottom: 10px;
			width: 100%;
			height: 500px;
		}
		.map-layout {
			position: relative;
			height: 100%;
		}

		.map-layout #map {
			height: 100%;
			width: 100%;
		}

		#search_form {
			position: absolute;
			z-index: 9;
			height: auto;
			overflow: hidden;
			padding: 10px;
			background: rgba(0, 0, 0, .3);
			left: 50px;
		}

		#search_form input[type="submit"].float {
			float: right;
			width: auto;
			cursor: pointer;
			border: 0;
			display: inline-block;
			padding: 5px 10px;
			min-height: 30px;
			min-width: 75px;
			margin: 0;
			color: white;
			background: #7092FF;
			text-align: center;
			border-radius: 2px;
		}

		#search_form .query_wrapper {
			position: relative;
			overflow: hidden;
			border-radius: 2px 0 0 2px;
		}

		#search_form input[type="text"].overflow {
			min-width: 100%;
			height: 30px;
			color: #222;
			background-color: #fff;
			border: 1px solid #ccc;
			border-right: none;
			padding: 2px 5px;
			margin: 0;
		}

		#search_result {
			position: absolute;
			z-index: 9;
			height: auto;
			overflow: hidden;
			padding: 16px;
			background-color: #FFF;
			top: 50px;
			left: 50px;
			min-width: 345px;
			display: none;
		}

		.ol-zoom {
			position: absolute;
			top: 10px;
		}

		.ol-zoom .ol-zoom-in,
		.ol-zoom .ol-zoom-out,
		.ol-full-screen button {
			background-color: rgba(0, 0, 0, 0.5);
			height: 1.5em;
			width: 1.5em;
			font-weight: bold;
			font-size: 1.3em;
			cursor: pointer;
		}

		.ol-zoomslider {
			position: absolute;
			top: 80px;
		}

		.ol-zoomslider button {
			width: 1.7110em;
			background-color: rgba(0, 0, 0, 0.5);
			cursor: pointer;
		}

		.ol-full-screen {
			position: absolute;
			right: 260px;
			-webkit-transition: all .5s ease;
			-moz-transition: all .5s ease;
			-o-transition: all .5s ease;
			-ms-transition: all .5s ease;
			transition: all .5s ease;
		}
		.ol-full-screen.notactive {
			right: 10px;
		}

		.ol-scale-line {
			background: rgba(0, 0, 0, .3);
			font-weight: bold;
		}

		.ol-scale-line .ol-scale-line-inner {
			font-size: .9em;
		}

		.ol-zoom .ol-zoom-in:hover,
		.ol-zoom .ol-zoom-in:focus,
		.ol-zoom .ol-zoom-out:hover,
		.ol-zoom .ol-zoom-out:focus,
		.ol-zoomslider button:hover,
		.ol-zoomslider button:focus,
		.ol-full-screen button:hover,
		.ol-full-screen button:focus {
			background-color: #000;
		}

		.result_list {
			margin: 0;
		}

		.result_list li {
			padding-bottom: 5px;
			border-bottom: 2px solid;
			margin-bottom: 5px;
		}

		.result_list li:last-child {
			padding-bottom: 5px;
			border-bottom: 2px solid;
			margin-bottom: 5px;
		}

		.result_list li span {
			display: block;
		}

		.result_list li span:first-child {
			font-weight: 700;
		}

		.map-layout #map-ui {
			display: block;
			float: right;
			width: 250px;
			height: 100%;
			background: rgba(255, 255, 255, .95);
			overflow: auto;
			position: absolute;
			z-index: 9;
			right: 0;
		}

		#map-ui .sidebar_heading {
			position: relative;
			padding: 10px 20px;
		}

		#map-ui .sidebar_heading > .close {
			float: right;
			margin-top: 10px;
			font-size: 1.5em;
			cursor: pointer;
		}

		.map-layout #map-ui .section {
			border-bottom: 1px solid #DDD;
			padding: 10px 20px;
		}
		#searchic_result {
			position: absolute;
			z-index: 9;
			overflow: hidden;
			padding: 10px;
			background: rgba(0, 0, 0, .3);
			right: 250px;
			bottom: 0;
			height: 250px;
			width: 60%;
			display: none;
		}
		#searchic_wrapper {
			width: 100%;
			overflow-y: auto;
			position: relative;
			height: 88%;
		}
		.table_search {
			width: 100%;
			background: #FFF;
		}
		.table_search th {
			padding: 5px 5px 5px 10px;
			border-bottom: 2px solid #ccc;
		}
		.table_search td {
			padding: 5px 5px 5px 10px;
			vertical-align: middle;
			border-bottom: 1px dotted #ccc;
		}
		.btncontrol {
			position: absolute;
			z-index: 9;
			top: 50px !important;
			right: 0;
			-webkit-transition: all .5s ease;
			-moz-transition: all .5s ease;
			-o-transition: all .5s ease;
			-ms-transition: all .5s ease;
			transition: all .5s ease;
		}
		.btncontrol.active {
			right: 250px;
		}
		.btnnavigation {
			display: block;
			height: 40px;
			width: 40px;
			background-color: rgba(0,0,0,0.6);
			border-radius: 4px 0 0 4px;
			outline: none;
			position: relative;
			z-index: 800;
		}
		.btnnavigation .control-button {
			display: block;
			height: 40px;
			width: 40px;
		}
		.btnnavigation .control-button span{
			display: block;
			vertical-align: top;
			color: #FFF;
			font-size: 1.5em;
			text-align: center;
			padding: 10px;
		}

	</style>

	<div id="fullscreen" class="fullscreen">
		<div class="map-layout">
			<div id="search_form">
				<form method="GET" id="search_location">
					<input type="submit" name="commit" value="Hledat" class="float">
					<div class="query_wrapper">
						<input type="text" name="search_input" id="search_input" placeholder="Hledat" autofocus="autofocus" class="overflow">
					</div>
				</form>
			</div>
			<div id="search_result"></div>

			<div class="btncontrol active">
				<div class="btnnavigation">
					<a id="tlayer" class="control-button" href="#">
						<span class="pg-layouts4"></span>
					</a>
				</div>
			</div>

			<div id="map-ui">
				<div class="layers-ui" style="">
					<div class="sidebar_heading">
						<span id="closemapui" class="fa fa-times close"></span>
						<h5 style="line-height: 22px;font-weight: 700;">Mapové vrstvy</h5></div>
					<div class="section base-layers">

						<div id="layertree" class="sidepanel-section">
							<p style="text-align: center;text-transform: uppercase;font-size: .9em;">Vrstvy - body</p>
							<ul class="list-unstyled">
								<li style="padding-left: 20px;">
									<div class="checkbox ">
										<input type="checkbox" value="1" id="layer1" checked="checked">
										<label for="layer1">Vrstva Redpoint</label>
									</div>
								</li>
								<li style="padding-left: 20px;">
									<div class="checkbox ">
										<input type="checkbox" value="1" id="layer2" checked="checked">
										<label for="layer2">Vrstva Bluepoint</label>
									</div>
								</li>
							</ul>
							<hr>
						</div>

						<div class="sidepanel-section">
							<p style="text-align: center;text-transform: uppercase;font-size: .9em;">Vrstvy - mapové podklady</p>
							<div class="radio radio-success">
								<div class="d-block p-1">
									<input type="radio" value="1" name="tileLayer" id="tileLayer1" class="layerlist" checked="checked">
									<label for="tileLayer1">OSM</label>
								</div>
								<div class="d-block p-1">
									<input type="radio" value="2" name="tileLayer" id="tileLayer2" class="layerlist">
									<label for="tileLayer2">Google Road Map</label>
								</div>
								<div class="d-block p-1">
									<input type="radio" value="tileLayer3" name="tileLayer" id="tileLayer3" class="layerlist">
									<label for="tileLayer3">Google Satellite</label>
								</div>
								<div class="d-block p-1">
									<input type="radio" value="4" name="tileLayer" id="tileLayer4" class="layerlist">
									<label for="tileLayer4">Mapy.cz - Základní</label>
								</div>
								<div class="d-block p-1">
									<input type="radio" value="5" name="tileLayer" id="tileLayer5" class="layerlist">
									<label for="tileLayer5">Mapy.cz - Letecká</label>
								</div>
								<div class="d-block p-1">
									<input type="radio" value="6" name="tileLayer" id="tileLayer6" class="layerlist">
									<label for="tileLayer6">ČÚZK - Geografická</label>
								</div>
							</div>
							<hr>
						</div>

						<div class="m-l-20 m-r-20">
							<div class="form-group">

								<?php
								// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
								echo $Html -> addLabel('', 'GPS Latitude', array ('class' => 'bold'));
								// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
								echo $Html -> addInput('text', '', '', 'lat', 'form-control');
								?>

							</div>
							<div class="form-group">

								<?php
								// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
								echo $Html -> addLabel('', 'GPS Longitude', array ('class' => 'bold'));
								// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
								echo $Html -> addInput('text', '', '', 'lon', 'form-control');
								?>

							</div>
							<div class="form-group">

								<?php
								// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
								echo $Html -> addLabel('', 'Adresa', array ('class' => 'bold'));
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('span', '', '', array ('id' => 'address', 'style' => 'display: block;width: 100%;height: 120px;'));
								?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div id="map"></div>

			<div id="searchic_result">
				<span id="closeares" class="fa fa-times" style="margin-bottom: 4px;color: #FFF;font-size: 1.5em;cursor: pointer;"></span>
				<span class="float-right text-white">Počet nalezených záznamů: <span id="searchic_count" class="bold">10</span></span>
				<div id="searchic_wrapper"></div>
			</div>

		</div>
	</div>


<?php include_once APP_PATH . 'admin/template/footer.php'; ?>