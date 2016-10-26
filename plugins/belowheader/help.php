<!DOCTYPE html>
<html lang="en">
<head>
	<title>Help - BelowHeader Plugin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/css/stylesheet.css" type="text/css" media="screen"/>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
	<!-- jQuery -->
	<script src="/js/jquery.js"></script>
	<!-- General function -->
	<script type="text/javascript" src="/js/functions.js?=<?php echo $jkv["updatetime"]; ?>"></script>
	<style type="text/css">
		h4 {
			color: #00796B;
			text-decoration: underline;
		}
		.tab-pane {
			margin-top: 20px;
		}
		.m-bt-lg {
			margin-bottom: 20px;
		}
		pre.prettyprint {
			border: 1px solid #ccc;
			margin-bottom: 0;
			padding: 9.5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well">
					<h3 class="english">Help - BelowHeader Plugin</h3>
					<h3 class="czech">Nápověda - zásuvný modul <strong>BelowHeader</strong></h3>
				</div>
				<hr>
			</div>
			<div class="col-md-12 clearfix">
				<div class="form-group language pull-right" style="margin: 0;">
					<select id="select" class="form-control">
						<option id="english" value="english" selected>English</option>
						<option id="czech" value="czech">Czech</option>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="cmsTab">
					<li class="active">
						<a href="#cmsPage1">
							<span class="english">About plugin</span>
							<span class="czech">O zásuvném modulu</span>
						</a>
					</li>
					<li>
						<a href="#cmsPage2">
							<span class="english">Changelog</span>
							<span class="czech">Changelog</span>
						</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="cmsPage1">
						<div class="col-md-12">
							<!-- 	ENGLISH -->
							<div class="english">
								<p>Create content that should be displayed right below the header.</p>
							</div>

							<!-- CZECH -->
							<div class="czech">
								<h4>O zásuvném modulu</h4>
								<p>BelowHeader plugin umožňuje vytvořit obsah, který bude zobrazen pod záhlavím.</p>
								<p>Nejvhodnější využití je zejména pro vytvoření úvodního slideru na titulní stránce webové sítě.</p>

								<h4>Detailní popis</h4>
								<div class="row m-bt-lg">
									<div class="col-md-4">
										<p><strong>Název pro BelowHeader</strong></p>
										<p></p>
									</div>
									<div class="col-md-8">
										<img class="img-responsive" src="/admin/img/plugin/belowheader/belowheader-01.jpg" alt="">
									</div>
								</div>
								<div class="row m-bt-lg">
									<div class="col-md-4">
										<p><strong>Výběr stránek pro BelowHeader</strong></p>
										<p>Výběr požadované stránky, ve kterých se má zobrazit patřičný Belowheader. Výběr umožňuje vybrat více stránek použitím klávesnice <strong>Ctrl</strong> nebo <strong>Shift</strong> .</p>
									</div>
									<div class="col-md-8">
										<img class="img-responsive" src="/admin/img/plugin/belowheader/belowheader-02.jpg" alt="">
									</div>
								</div>
								<div class="row m-bt-lg">
									<div class="col-md-4">
										<p><strong>Přístup uživatelské skupiny</strong></p>
										<p>Výběr přístupu uživatelské skupiny k BelowHeader. Výběr umožňuje vybrat více stránek použitím klávesnice <strong>Ctrl</strong> nebo <strong>Shift</strong> .</p>
									</div>
									<div class="col-md-8">
										<img class="img-responsive" src="/admin/img/plugin/belowheader/belowheader-03.jpg" alt="">
									</div>
								</div>
								<div class="row m-bt-lg">
									<div class="col-md-4">
										<p><strong>Zadání obsahu</strong></p>
										<p>Oblast pro vložení zdrojového kódu.</p>
									</div>
									<div class="col-md-8">
										<img class="img-responsive" src="/admin/img/plugin/belowheader/belowheader-04.jpg" alt="">
									</div>
								</div>
								<div class="row m-bt-lg">
									<div class="col-md-12">
										<p><strong>Ukázka zdrojového kódu pro BelowHeader</strong></p>
										<pre class="prettyprint">
&lt;div id=&quot;myCarousel&quot; class=&quot;carousel slide&quot; data-ride=&quot;carousel&quot;&gt;
  &lt;!-- Indicators --&gt;
  &lt;ol class=&quot;carousel-indicators&quot;&gt;
    &lt;li data-target=&quot;#myCarousel&quot; data-slide-to=&quot;0&quot; class=&quot;active&quot;&gt;&lt;/li&gt;
    &lt;li data-target=&quot;#myCarousel&quot; data-slide-to=&quot;1&quot;&gt;&lt;/li&gt;
    &lt;li data-target=&quot;#myCarousel&quot; data-slide-to=&quot;2&quot;&gt;&lt;/li&gt;
    &lt;li data-target=&quot;#myCarousel&quot; data-slide-to=&quot;3&quot;&gt;&lt;/li&gt;
  &lt;/ol&gt;

  &lt;!-- Wrapper for slides --&gt;
  &lt;div class=&quot;carousel-inner&quot; role=&quot;listbox&quot;&gt;
    &lt;div class=&quot;item active&quot;&gt;
      &lt;img src=&quot;img_chania.jpg&quot; alt=&quot;Chania&quot;&gt;
    &lt;/div&gt;

    &lt;div class=&quot;item&quot;&gt;
      &lt;img src=&quot;img_chania2.jpg&quot; alt=&quot;Chania&quot;&gt;
    &lt;/div&gt;

    &lt;div class=&quot;item&quot;&gt;
      &lt;img src=&quot;img_flower.jpg&quot; alt=&quot;Flower&quot;&gt;
    &lt;/div&gt;

    &lt;div class=&quot;item&quot;&gt;
      &lt;img src=&quot;img_flower2.jpg&quot; alt=&quot;Flower&quot;&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Left and right controls --&gt;
  &lt;a class=&quot;left carousel-control&quot; href=&quot;#myCarousel&quot; role=&quot;button&quot; data-slide=&quot;prev&quot;&gt;
    &lt;span class=&quot;glyphicon glyphicon-chevron-left&quot; aria-hidden=&quot;true&quot;&gt;&lt;/span&gt;
    &lt;span class=&quot;sr-only&quot;&gt;Previous&lt;/span&gt;
  &lt;/a&gt;
  &lt;a class=&quot;right carousel-control&quot; href=&quot;#myCarousel&quot; role=&quot;button&quot; data-slide=&quot;next&quot;&gt;
    &lt;span class=&quot;glyphicon glyphicon-chevron-right&quot; aria-hidden=&quot;true&quot;&gt;&lt;/span&gt;
    &lt;span class=&quot;sr-only&quot;&gt;Next&lt;/span&gt;
  &lt;/a&gt;
&lt;/div&gt;
  									</pre>
									</div>
								</div>
							</div>


						</div>
					</div>

					<div class="tab-pane" id="cmsPage2">
						<div class="col-md-12">
							<!-- 	ENGLISH -->
							<div class="english">
								<p><strong>Version 1.0</strong></p>
								<p>Basic version of BelowHeader</p>
							</div>

							<!-- CZECH -->
							<div class="czech">
								<p><strong>Version 1.0</strong></p>
								<p>Základní verze BelowHeader</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div><!-- #row -->
	</div><!-- #container -->

	<script>
		$(document).ready(function () {
			$(".czech").hide();

			$(".language select").change(function(){
				var select=  $(this).val();
				if(select=='english'){
					//some code
					$(".english").show();
					$(".czech").hide();
				} else {
					$(".english").hide();
					$(".czech").show();
				}
			});

			/* Bootstrap Tab Activation */
			$('#cmsTab a').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});
		});
	</script>
</body>
</html>
