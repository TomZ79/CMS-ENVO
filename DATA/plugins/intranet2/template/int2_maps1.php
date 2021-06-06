<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

<style>
	.content-wrapper .content {
		padding: 0;
		position: relative;
	}

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
		width: 100%;
		/* min-height: 500px; */
		height: 100vh;
	}

	.map-layout {
		position: relative;
		height: 100vh;
	}

	.map-layout #map {
		width: 100%;
	}

	.map-layout #map-ui {
		display: none;
		width: 250px;
		flex: 0 0 250px;
		height: 100vh;
		background: rgba(255, 255, 255, .95);
		overflow-y: auto;
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

	#search_form {
		position: absolute;
		z-index: 9;
		height: auto;
		overflow: hidden;
		padding: 10px;
		background: rgba(0, 0, 0, .3);
		left: 50px;
		min-width: 400px;
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

	#search_form input[type="submit"]:hover.float {
		background: #0a44ff;
		text-decoration: none;
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
		max-height: 300px;
		overflow-y: auto;
		padding: 16px;
		background-color: #FFF;
		top: 50px;
		left: 50px;
		min-width: 550px;
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

	.control-layers {
		position: absolute;
		z-index: 9;
		top: 50px !important;
		right: 0;
		display: block;
	}

	.control-layers.active {
		right: 250px;
	}

	.control-layers .control-button {
		display: block;
		height: 40px;
		width: 40px;
		background-color: rgba(0, 0, 0, 0.6);
		outline: none;
		position: relative;
		border-radius: 0;
	}

	.control-button:hover {
		background-color: #000;
	}

	.control-button.active {
		background-color: #9ed485;
	}

	.control-layers .control-button span {
		display: block;
		vertical-align: top;
		color: #FFF;
		font-size: 1.5em;
		text-align: center;
		padding: 10px;
	}

	.control-layers .control-button.singel {
		border-radius: 4px 0 0 4px;
	}

	.control-layers .control-button.first {
		border-radius: 4px 0 0 0;
	}

	.control-layers .control-button.last {
		border-radius: 0 0 0 4px;
	}

	.layers-ui {
		display: block;
	}

	.search-ui, .noname-ui, .legend-ui {
		display: none;
	}

	.mapkey-table td {
		padding: 0 5px 5px 5px;
	}

	/* Extra small devices (portrait phones, less than 576px) */
	@media (max-width: 575.98px) {
		#search_form {
			display: none;
		}

		.map-layout #map-ui {
			z-index: 1020;
			width: 100%;
			flex: 0 0 100%;
			background: #FFF;
		}

		.ol-zoom, .ol-zoomslider, .ol-zoomslider:hover, .ol-full-screen {
			background-color: rgba(255, 255, 255, 0.8);
		}

		.ol-zoomslider {
			margin-top: 20px;
		}

		.ol-zoomslider button {
			width: 1.5em;
		}

	}

</style>

<div id="fullscreen" class="fullscreen">
	<div class="map-layout d-flex flex-row flex-fill">

		<div id="search_form">
			<form method="POST" id="search_location">
				<input type="submit" value="Hledat" class="float">
				<div class="query_wrapper">
					<input type="text" name="search_input" id="search_input" placeholder="Hledat" autofocus="autofocus" class="overflow">
				</div>
			</form>
		</div>

		<div id="search_result">
			<div>
				<h4>Výsledky hledání <span class="close icon-cross close-search"></span></h4>
			</div>
			<div id="result"></div>
		</div>

		<div id="map"></div>

		<div class="control-layers">
			<a id="layers-ui" class="control-button singel" href="#" title="Mapové vrstvy">
				<span class="icon-stack3"></span>
			</a>

			<a id="search-ui" class="control-button first mt-1" href="#" title="Vyhledání objektu(ů)">
				<span class="icon-map"></span>
			</a>
			<a id="noname-ui" class="control-button" href="#" title="Noname">
				<span class="icon-flip-horizontal2"></span>
			</a>
			<a id="legend-ui" class="control-button last" href="#" title="Legenda">
				<span class="icon-info3"></span>
			</a>
		</div>

		<div id="map-ui" class="pt-0 pb-0">
			<div class="layers-ui" style="">
				<div class="sidebar_heading">
					<span class="close icon-cross close-map"></span>
					<h5 style="line-height: 40px;font-weight: 700;margin: 0;">Mapové vrstvy</h5>
				</div>
				<div class="section base-layers">
					<div class="sidepanel-section">
						<div class="radio radio-success">
							<div class="form-check form-check-inline d-block p-1">
								<label for="tileLayer1" class="form-check-label">
									<input type="radio" value="1" name="tileLayer" id="tileLayer1" class="layerlist form-check-radio-styled">
									OSM
								</label>
							</div>
							<div class="form-check form-check-inline d-block p-1">
								<label for="tileLayer2" class="form-check-label">
									<input type="radio" value="2" name="tileLayer" id="tileLayer2" class="layerlist form-check-radio-styled">
									Google Road Map
								</label>
							</div>
							<div class="form-check form-check-inline d-block p-1">
								<label for="tileLayer3" class="form-check-label">
									<input type="radio" value="3" name="tileLayer" id="tileLayer3" class="layerlist form-check-radio-styled">
									Google Satellite
								</label>
							</div>
							<div class="form-check form-check-inline d-block p-1">
								<label for="tileLayer4" class="form-check-label">
									<input type="radio" value="4" name="tileLayer" id="tileLayer4" class="layerlist form-check-radio-styled" checked="checked">
									Mapy.cz - Základní
								</label>
							</div>
							<div class="form-check form-check-inline d-block p-1">
								<label for="tileLayer5" class="form-check-label">
									<input type="radio" value="5" name="tileLayer" id="tileLayer5" class="layerlist form-check-radio-styled">
									Mapy.cz - Letecká
								</label>
							</div>
							<div class="form-check form-check-inline d-block p-1">
								<label for="tileLayer6" class="form-check-label">
									<input type="radio" value="6" name="tileLayer" id="tileLayer6" class="layerlist form-check-radio-styled">
									ČÚZK - Geografická
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="search-ui" style="">
				<div class="sidebar_heading">
					<span class="close icon-cross close-map"></span>
					<h5 style="line-height: 40px;font-weight: 700;margin: 0;">Vyhledání objektu(ů)</h5>
				</div>
				<div class="section base-layers">
					<div class="sidepanel-section">
						<form method="POST" action="#" id="searchData">
							<h6 class="font-weight-bold">Výběr města <small class="font-weight-light ml-1">(pouze okres KV)</small></h6>
							<div class="form-group form-group-lg">
								<select name="city" class="form-control select2" data-placeholder="Výběr města" data-search-select2="true" data-fouc>
									<option value=""></option>
									<option value="1">Abertamy</option>
									<option value="3">Bečov nad Teplou</option>
									<option value="4">Bochov</option>
									<option value="6">Božičany</option>
									<option value="5">Boží Dar</option>
									<option value="8">Březová u KV</option>
									<option value="10">Chyše</option>
									<option value="11">Čichalov</option>
									<option value="13">Dalovice</option>
									<option value="14">Děpoltovice</option>
									<option value="16">Hájek</option>
									<option value="20">Hroznětín</option>
									<option value="18">Hory</option>
									<option value="21">Jáchymov</option>
									<option value="22">Jenišov</option>
									<option value="23">Karlovy Vary</option>
									<option value="25">Krásné Údolí</option>
									<option value="27">Kyselka</option>
									<option value="28">Merklín</option>
									<option value="30">Nejdek</option>
									<option value="31">Nová Role</option>
									<option value="83">Nové Sedlo</option>
									<option value="33">Ostrov</option>
									<option value="34">Otovice</option>
									<option value="36">Pernink</option>
									<option value="38">Pšov</option>
									<option value="40">Sadov</option>
									<option value="88">Sokolov</option>
									<option value="42">Stanovice</option>
									<option value="44">Stružná</option>
									<option value="43">Stráž nad Ohří</option>
									<option value="46">Štědrá</option>
									<option value="48">Toužim</option>
									<option value="49">Útvina</option>
									<option value="50">Valeč</option>
									<option value="51">Velichov</option>
									<option value="52">Verušičky</option>
									<option value="54">Vrbice</option>
									<option value="56">Žlutice</option>
								</select>
							</div>

							<h6 class="font-weight-bold">Výběr Správy</h6>
							<div class="form-group form-group-lg">
								<select name="estatemanagement" class="form-control select2" data-placeholder="Výběr správce" data-search-select2="true" data-fouc>

									<?php
									// First blank option
									// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
									echo $Html -> addOption();

									if (isset($ENVO_MANAGEMENT) && is_array($ENVO_MANAGEMENT)) foreach ($ENVO_MANAGEMENT as $m) {

										if ($ENVO_ACCESS_ANALYTICS) {

											echo $Html -> addOption($m["id"], $m["name"]);

										} else {
											if (ENVO_USERGROUPID == '7' && $m["id"] == '1') {
												echo $Html -> addOption($m["id"], $m["name"]);
											}

											if (ENVO_USERGROUPID == '6' && $m["id"] == '5') {
												echo $Html -> addOption($m["id"], $m["name"]);
											}
										}

									}
									?>

								</select>
							</div>

							<h6 class="font-weight-bold">Správa STA</h6>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" name="management" class="form-check-input-styled" data-fouc>
									Zobrazit objekty ve správě
								</label>
							</div>

							<button class="btn btn-light d-block w-100 legitRipple mt-3" type="submit">Vyhledat</button>
						</form>
					</div>
				</div>
			</div>

			<div class="noname-ui" style="">
				<div class="sidebar_heading">
					<span class="close icon-cross close-map"></span>
					<h5 style="line-height: 40px;font-weight: 700;margin: 0;">Noname</h5>
				</div>
				<div class="section base-layers">
					<div class="sidepanel-section">

					</div>
				</div>
			</div>

			<div class="legend-ui" style="">
				<div class="sidebar_heading">
					<span class="close icon-cross close-map"></span>
					<h5 style="line-height: 40px;font-weight: 700;margin: 0;">Legenda</h5>
				</div>
				<div class="section base-layers">
					<div class="sidepanel-section">
						<table class="mapkey-table">
								<tbody>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="0" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/motorway-fa17672a6376046d7ed97c432ab7d50373db182557b8b1b05636699680e9f7b6.png">
									</td>
									<td class="mapkey-table-value">
										Dálnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="0" data-zoom-max="6" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/mainroad-b2f19ce774ab8b5bd3630154f54fa97cb280c5357d742f952a7a8bb118e81f1a.png">
									</td>
									<td class="mapkey-table-value">
										Hlavní silnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="7" data-zoom-max="8" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/mainroad7-f4e051ec7d91fe6d07fa42ac86d1eb21fd87822f1f20aec708fc5ff21f7b72f6.png">
									</td>
									<td class="mapkey-table-value">
										Hlavní silnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="9" data-zoom-max="11" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/mainroad9-21ec5b974322d5e8c223c8112ce5b4d3b923e2673cebc9270a8ddf8912e168b3.png">
									</td>
									<td class="mapkey-table-value">
										Hlavní silnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/mainroad12-0e6b28a213c76e9c0cf4dfc2611f89ce2b7b5ee6095dcf69c127f2e0bb02a692.png">
									</td>
									<td class="mapkey-table-value">
										Hlavní silnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/track-7db9e7eb9f7e631c49cced45d120e2cb4d2b70f11263a992abee67dee11d01fb.png">
									</td>
									<td class="mapkey-table-value">
										Lesní a polní cesta
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/bridleway-fd6622e4f5a6cf3e00faf8b870069f32ff8a5906c730b3fa3f6afa8aa237e4f8.png">
									</td>
									<td class="mapkey-table-value">
										Koňská stezka
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/cycleway-37343ed25a3c49e68e97f0d46e553070e9a14a8d9fb6031de712ae50b3408e7e.png">
									</td>
									<td class="mapkey-table-value">
										Cyklostezka
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/footway-569bf9dc322c26d3893657a8d265764fc2bd6f0fe14b7da69fe14e7f12989a89.png">
									</td>
									<td class="mapkey-table-value">
										Pěší cesta
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="8" data-zoom-max="12" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/rail-962a0543bb98337bdf468d3e0313ee372ded2b6681085eb5feb05bafe1265518.png">
									</td>
									<td class="mapkey-table-value">
										Železnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/rail13-b0a0becf089855a13c7688c6238d6c2a0bf443e3456d9efb8b8b93bfbcbd34a2.png">
									</td>
									<td class="mapkey-table-value">
										Železnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/subway-d5a7218f52fc1f7789c811328ce1f55253bb42642f08cc764ba4615ca70e26b2.png">
									</td>
									<td class="mapkey-table-value">
										Metro
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/tram-411a124bc1cde9c1f47fabc9cc5f79d96c88d1020856e07943e67a4d51072356.png">
									</td>
									<td class="mapkey-table-value">
										Rychlodráha a tramvaj
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/cable-4facd98a750bc2090675fae3cea0936124a694570370340f348f5cd96cc6a564.png">
									</td>
									<td class="mapkey-table-value">
										Lanovka a sedačková lanovka
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/runway-5932592ff3adecc230feb45e1286fea0dc6ab0434f99f4aa80ca172cf04e26a8.png">
									</td>
									<td class="mapkey-table-value">
										Vzletová a přistávací dráha a pojezdová dráha
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/apron-51267acbd2071b79f04ec624f3259367c211a6a77d9fe05b0ce44cb16ceb1247.png">
									</td>
									<td class="mapkey-table-value">
										Letištní odbavovací plocha a terminál
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="0" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/admin-fcd748b324e5678c672d41b4af3baa9de115a6f8ee57855f5634091e59178a29.png">
									</td>
									<td class="mapkey-table-value">
										Administrativní hranice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="9" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/forest-c33c4d8a216a942b9a4aeff91eda5f089d4fa842c19edb9a45e490367ac40c07.png">
									</td>
									<td class="mapkey-table-value">
										Les
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/wood-e2fe5460f3138420b48ea5e1d933bf7ce5914ee23bd267d2e6d6313efa14364f.png">
									</td>
									<td class="mapkey-table-value">
										Les
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/golf-6e692ae161714ee040fbb6d5732a53f5d21b91f061754dde003ff80b53f5080b.png">
									</td>
									<td class="mapkey-table-value">
										Golfové hřiště
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/park-4841ace6fa6932a96d42343743ea3407e0087f1dfb553134f4f9c16c4229636b.png">
									</td>
									<td class="mapkey-table-value">
										Park
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="8" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/resident-1e8f15ce52e195bb9521cc002272232bcbfa09d24e03e7d039d1b52d406127b4.png">
									</td>
									<td class="mapkey-table-value">
										Obytná oblast
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/common-28cb400153a5e91bf842ae9bc40ad81c16afb75442507e8e40ab0a633a437372.png">
									</td>
									<td class="mapkey-table-value">
										Pastvina a louka
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/retail-dc9a53c2a94643d7c5cbccee8537fe933022429aa65b1df0028cb6fcfbce160a.png">
									</td>
									<td class="mapkey-table-value">
										Nákupní oblast
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/industrial-17a66e94474e40487a1efc0c13b255100ca463c57af11b3f9fc939500686bef3.png">
									</td>
									<td class="mapkey-table-value">
										Průmyslová oblast
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/commercial-597a3d6d709f49b1fa6e82597b1554b66f39b93290e4f8f434c81e23f7235c06.png">
									</td>
									<td class="mapkey-table-value">
										Kancelářská oblast
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/heathland-5d73d2d064f0916c8a34f4e25154ad74b945955f7e38b671a9d2417ddee1d1c5.png">
									</td>
									<td class="mapkey-table-value">
										Vřesoviště
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="7" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/lake-5efdf5786d855ade38f1e81ac93ec9096f1a0490cdca96f1f3d82dc7c7d155bb.png">
									</td>
									<td class="mapkey-table-value">
										Jezero a nádrž
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/farm-22ea3116ba39019eb7d263fddc9f23f623e2f906502831dc364a585acd11039e.png">
									</td>
									<td class="mapkey-table-value">
										Farma
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="10" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/brownfield-63ba90b7e6c281346d0b703e840897b8fb89dbb217daac519588d8510c9f7cb9.png">
									</td>
									<td class="mapkey-table-value">
										Zbořeniště
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/cemetery-05adef81a115910838a0aa9395c3a1c01450910ae7e65a1f4553f062e872ffa7.png">
									</td>
									<td class="mapkey-table-value">
										Hřbitov
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/allotments-e668a89cefbb9e37f8657037500ba56e649218499ac4448638398d37f0b63cb9.png">
									</td>
									<td class="mapkey-table-value">
										Zahrádkářská kolonie
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/pitch-ce98535fac868c0413eac761012584cbb2b3f0817767e99693340fe8655dc049.png">
									</td>
									<td class="mapkey-table-value">
										Sportovní hřiště
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/centre-e4d415d7df81df030d2b96564a452ab3d0e382d07c1d2017ba4d4e8f5e5f2816.png">
									</td>
									<td class="mapkey-table-value">
										Sportovní centrum
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/reserve-6dfee00b6c91215be6a74e78d5f9356643123205601e5c3166fcbac546746c07.png">
									</td>
									<td class="mapkey-table-value">
										Přírodní rezervace
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="11" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/military-e1f0548bdf3c998a8edac8fc578ea5a34a28f1d4c83d54122ea36842ff5c7ed1.png">
									</td>
									<td class="mapkey-table-value">
										Vojenský prostor
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/school-16cb3d3817b086505eb53bc6985dbccb348b89134e757064b6ab9a5748c91709.png">
									</td>
									<td class="mapkey-table-value">
										Škola a univerzita
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/building-85a4a5a48b8308d5783dc6030efb620b0bd5bb1f1b1c6feb735bf7f98ffdff75.png">
									</td>
									<td class="mapkey-table-value">
										Významná budova
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/station-07bfe38c97ae095efc62e4d59764ca907d85b8b7ee9532e820f2100455998161.png">
									</td>
									<td class="mapkey-table-value">
										Nádraží
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/summit-61d46ce5baf7af2448590f7e20d05ee47c8f1cd0758db86d21f48936bd9332ef.png">
									</td>
									<td class="mapkey-table-value">
										Vrchol a hora
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/tunnel-2bf522d75985e79488909f7c651213eaa060eed19b434939041537f1be8c4092.png">
									</td>
									<td class="mapkey-table-value">
										Čárkované obrysy = tunel
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="13" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/bridge-57a6be166d20a91ce186a8676d1e1edbdd1e43173cf95477b6b080a77b509f74.png">
									</td>
									<td class="mapkey-table-value">
										Černé obrysy = most
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="15" data-zoom-max="19" style="">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/private-3107e07dfce512796ea5cef123b534f91920de31e9d99eef537801b96044e534.png">
									</td>
									<td class="mapkey-table-value">
										Soukromý pozemek
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="15" data-zoom-max="19" style="">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/destination-6f0cf4e96380ea8d742e83c02a7356b310e39e3b35445aafe52e4bc995f16996.png">
									</td>
									<td class="mapkey-table-value">
										Průjezd zakázán
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="mapnik" data-zoom-min="12" data-zoom-max="19">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/mapnik/construction-eb874f02bb864d5792cf82a4ee6534c6a04f3aaf6e26dba2e88c324813bb545c.png">
									</td>
									<td class="mapkey-table-value">
										Cesta ve výstavbě
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="0" data-zoom-max="11" style="display: none;">
									<td class="mapkey-table-key">
										<img src="/assets/key/cyclemap/motorway-5601e21e3dfc785f8db92850f138a109a667e81652a6d4775f8a6901345fceb3.png">
									</td>
									<td class="mapkey-table-value">
										Dálnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="12" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="/assets/key/cyclemap/motorway12-b4309b97818e5a3710d1d579403cfd4e02314dedb53fb6be99cd1341dd628562.png">
									</td>
									<td class="mapkey-table-value">
										Dálnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="0" data-zoom-max="11" style="display: none;">
									<td class="mapkey-table-key">
										<img src="/assets/key/cyclemap/trunk-2c9ad215814b44e1212b47c391109c844449974f4c6e2e247e0d47b113bef2f4.png">
									</td>
									<td class="mapkey-table-value">
										Významná silnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="12" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="/assets/key/cyclemap/trunk12-0ca46e88f4709c5f658878862b04ee17bd4c27455c85257594d98226b716a2d9.png">
									</td>
									<td class="mapkey-table-value">
										Významná silnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="7" data-zoom-max="11" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/primary-2e412f7be034ecf3660996626d9cc00f37546e943a351ed469284cd36ad340be.png">
									</td>
									<td class="mapkey-table-value">
										Silnice první třídy
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="12" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/primary12-b4a9f96bb0591d18f22a793ae5cbe9c98c592ce2515034d069670f30bffbcbf4.png">
									</td>
									<td class="mapkey-table-value">
										Silnice první třídy
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="9" data-zoom-max="11" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/secondary-7915207785d343a9e9cc0baa4898b42316318bc11805bc51eee75baca0cdcd7e.png">
									</td>
									<td class="mapkey-table-value">
										Silnice druhé třídy
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="12" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/secondary12-c6e429bc2812905508e619b74986bdf27277367fa3a9877dbf0f1429cdf1df3c.png">
									</td>
									<td class="mapkey-table-value">
										Silnice druhé třídy
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="13" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/track-7db9e7eb9f7e631c49cced45d120e2cb4d2b70f11263a992abee67dee11d01fb.png">
									</td>
									<td class="mapkey-table-value">
										Lesní a polní cesta
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="8" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway-2d6b0264dcf7bc698d0d548504cd90394c073b734507ed6ca7aaaea61bc9213a.png">
									</td>
									<td class="mapkey-table-value">
										Cyklostezka
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="5" data-zoom-max="12" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway_national-23315e667da99a04df43d744defadc05eb09b3bdec72fe6726c726abc62eb4a6.png">
									</td>
									<td class="mapkey-table-value">
										Národní cyklotrasa
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="13" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway_national13-6214b9f2e5ba5c7facdbd4b36c7369f958b07e1a8481e8d8e8385eab8dd6a946.png">
									</td>
									<td class="mapkey-table-value">
										Národní cyklotrasa
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="5" data-zoom-max="12" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway_regional-87fdc80eb3294791cbf7715e9a477b5c70eff17f1512897a553ce65896fdfc97.png">
									</td>
									<td class="mapkey-table-value">
										Regionální cyklotrasa
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="13" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway_regional13-d394a7bd45e133917c49fb01a22ffcb9cd62f161c837d1d09963a17ce50af0f4.png">
									</td>
									<td class="mapkey-table-value">
										Regionální cyklotrasa
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="8" data-zoom-max="12" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway_local-ee154a90d5fe6d7d20cf05348fdd34ef880a9d47e6ccebe1a4e8f7904ccea11e.png">
									</td>
									<td class="mapkey-table-value">
										Místní cyklotrasa
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="13" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/cycleway_local13-e04ec47e3f5dfe9ad99699db3cf9eef7bede3777bd1aaf72fc05ad1246819569.png">
									</td>
									<td class="mapkey-table-value">
										Místní cyklotrasa
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="13" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/footway-61fbc493c7241f8bec8cc5d9ecbe89e283f704818524b4f2f592fd6f598f06c1.png">
									</td>
									<td class="mapkey-table-value">
										Pěší cesta
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="7" data-zoom-max="13" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/rail-962a0543bb98337bdf468d3e0313ee372ded2b6681085eb5feb05bafe1265518.png">
									</td>
									<td class="mapkey-table-value">
										Železnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="14" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/rail14-b0a0becf089855a13c7688c6238d6c2a0bf443e3456d9efb8b8b93bfbcbd34a2.png">
									</td>
									<td class="mapkey-table-value">
										Železnice
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="9" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/forest-f1b2b28f23a455f93af80a0d023c3c8d4643e3971c05410843067c470cc7d10d.png">
									</td>
									<td class="mapkey-table-value">
										Les
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="10" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/common-896b473710b6162feee4b1d1992ea6a2ebe5b1d6c41009c42fa22ce54dcb1f91.png">
									</td>
									<td class="mapkey-table-value">
										Pastvina a louka
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="7" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/lake-37915c1414cebcda95a2046fd4854fd60ddb9f3e02a177d9492553e95ec3d737.png">
									</td>
									<td class="mapkey-table-value">
										Jezero a nádrž
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="14" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/bicycle_shop-cfeb96304fb19964369b41200b55b370a0899efbbdf79d2421d45cccb7a5cb55.png">
									</td>
									<td class="mapkey-table-value">
										Cykloobchod
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="14" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/bicycle_parking-1509a96b4608d24e4bf6c4a7f5211e431a3cc96b814b8ec33790f4af726bff2c.png">
									</td>
									<td class="mapkey-table-value">
										Parkoviště pro kola
									</td>
								</tr>
								<tr class="mapkey-table-entry" data-layer="cyclemap" data-zoom-min="16" data-zoom-max="19" style="display: none;">
									<td class="mapkey-table-key">
										<img src="https://www.openstreetmap.org/assets/key/cyclemap/toilets-5cbf7e97dae4d5015f0bca0d58502e045224fcff54d7e1bddd45805d4653a570.png">
									</td>
									<td class="mapkey-table-value">
										Záchody
									</td>
								</tr>
								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>


