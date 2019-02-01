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

		.map {
			width: 80%;
			height: 100%;
			float: left;
		}

		.sidepanel {
			background-color: #2b303b;
			width: 20%;
			height: 100%;
			float: left;
		}

		.sidepanel-title {
			width: 100%;
			font-size: 3em;
			color: #FFF;
			display: block;
			text-align: center;
			line-height: 1.5em;
		}
	</style>

	<div id="fullscreen" class="fullscreen">
		<div id="map" class="map"></div>
		<div class="sidepanel">
			<span class="sidepanel-title">Navigace</span>
			<hr>
			<div id="layertree" class="sidepanel-section">
				<p style="text-align: center;color: #FFF;text-transform: uppercase;font-size: .9em;">Zapnout vrstvy pro ladění mapy</p>
				<ul class="list-unstyled">
					<li style="padding-left: 20px;">
						<div class="checkbox ">
							<input type="checkbox" value="1" id="layer1" checked="checked">
							<label for="layer1" style="color: #FFF;">Vrstva Redpoint</label>
						</div>
					</li>
					<li style="padding-left: 20px;">
						<div class="checkbox ">
							<input type="checkbox" value="1" id="layer2" checked="checked">
							<label for="layer2" style="color: #FFF;">Vrstva Bluepoint</label>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>