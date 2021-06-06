<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8">
	<title>WIKI Plugin Dokumentace</title>

	<!-- ======= FONTS ======= -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

	<!-- ======= CSS STYLE ======= -->
	<!-- Main style -->
	<link rel="stylesheet" href="/admin/assets/doc/css/doc.css">
	<!-- FancyTree -->
	<link rel="stylesheet" href="/admin/assets/plugins/fancytree/skin-lion/ui.fancytree.css">

</head>
<body>

<header>
	<h1>Nápověda - Plugin WIKI</h1>
	<div class="clear"></div>
</header>

<nav id="subnav">
	<h3>Obsah</h3>
	<h3>Aktuální kapitola: <span id="curnav" class="light"> O Pluginu </span></h3>
</nav>

<aside>
	<nav>
		<ul id="sidebar">
			<li class="active">
				<span>O Pluginu</span>
				<ul>
					<li data-deeplink="about-plugin" class="active">O Pluginu</li>
					<li data-deeplink="folders-files">Složky - Soubory</li>
					<li data-deeplink="changelog">Changelog</li>
				</ul>
			</li>
			<li>
				<span>Plugin Backend</span>
				<ul>
					<li data-deeplink="wiki-article">Wiki Články</li>
					<li data-deeplink="wiki-article-new">Nový Wiki článek</li>
					<li data-deeplink="wiki-article-edit">Editace Wiki článku</li>
					<li data-deeplink="wiki-category">Kategorie</li>
					<li data-deeplink="wiki-category-new">Nová Kategorie</li>
					<li data-deeplink="wiki-category-edit">Editace Kategorie</li>
					<li data-deeplink="wiki-setting">Nastavení</li>
				</ul>
			</li>
			<li>
				<span>Plugin Frontend</span>
				<ul>
					<li data-deeplink="wiki-frontend">Frontend</li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>

<div id="content">
	<div>

		<!-- About Plugin -->
		<section class="active">

			<!-- About Plugin -->
			<article class="active">
				<h4>O Pluginu</h4>
				<p>Plugin <strong>Wiki</strong> umožnuje vytvořit vlastní encyklopedii informací.</p>

				<h5>Instalace Pluginu</h5>

				<h5>Odinstalace Pluginu</h5>

			</article>

			<!-- Folders and Files -->
			<article>
				<h4>Soubory a Složky</h4>

				<div id="tree">
					<ul id="treeData" style="display: none;">
						<li id="id1" class="folder expanded">admin
							<em>(<span style="font-weight: 700;color: #2abbad;">backend</span>)</em>
						</li>
						<li id="id2" class="folder expanded">
							assets <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span> - css, img, js)</em>
							<ul>
								<li id="id2.1" class="folder expanded">
									css <em>(frontend - css styly)</em>
									<ul>
										<li id="id2.1.1">css.wiki.php</li>
										<li id="id2.1.2">style.css</li>
										<li id="id2.1.3">style.min.css</li>
									</ul>
								</li>
								<li id="id2.2" class="folder expanded">css <em>(frontend - obrázky - základní)</em></li>
								<li id="id2.3" class="folder expanded">js <em>(frontend - javascript)</em></li>
							</ul>
						</li>
						<li id="id3" class="folder expanded">
							help <em>(<span style="font-weight: 700;color: #2abbad;">backend</span> - složka se soubory pro nápovědu)</em>
							<ul>
								<li id="id3.1">help_cs.php <em>(nápověda - český jazyk)</em></li>
								<li id="id3.2">help_en.php <em>(nápověda - anglický jazyk)</em></li>
							</ul>
						</li>
						<li id="id4" class="folder expanded">
							lang <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span> - složka s nastavením jazyků)</em>
							<ul>
								<li id="id4.1">cs.ini <em>(český jazyk)</em></li>
								<li id="id4.2">en.ini <em>(anglický jazyk)</em></li>
							</ul>
						</li>
						<li id="id5" class="folder expanded">
							template <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span> - složka s šablonou)</em>
							<ul>
								<li id="id5.1">footer_widget.php</li>
								<li id="id5.2">pages_news.php</li>
								<li id="id5.3">search.php</li>
								<li id="id5.4">sitemap.php</li>
								<li id="id5.5">tag.php</li>
								<li id="id5.6">wiki.php</li>
								<li id="id5.7">wikiart.php</li>
								<li id="id5.8">wikisidebar.php</li>
							</ul>
						</li>
						<li id="id6">
							ajaxsearch.php <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span>)</em>
						</li>
						<li id="id7">
							functions.php <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span>)</em>
						</li>
						<li id="id8">
							install.php <em>(<span style="font-weight: 700;color: #2abbad;">backend</span> - soubor pro instalaci)</em>
						</li>
						<li id="id9">
							tpl_between_head.php <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span>)</em>
						</li>
						<li id="id10">
							tpl_footer_end.php <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span>)</em>
						</li>
						<li id="id11">
							uninstall.php <em>(<span style="font-weight: 700;color: #2abbad;">backend</span> - soubor pro odinstalaci)</em>
						</li>
						<li id="id12">
							update.php <em>(<span style="font-weight: 700;color: #2abbad;">backend</span> - soubor pro update)</em>
						</li>
						<li id="id13">
							wiki.php <em>(<span style="font-weight: 700;color: #1e2a75;">frontend</span>)</em>
						</li>
					</ul>
				</div>


			</article>

			<!-- Changelog -->
			<article>
				<h4>Changelog</h4>
				<h5>v 1.0</h5>
				<p>Základní inicializace pluginu</p>

			</article>

		</section>

		<!-- Plugin Backend -->
		<section>

			<!-- Wiki Články -->
			<article>
				<h4>Wiki Články</h4>

			</article>

			<!-- Nový Wiki článek -->
			<article>
				<h4>Nový Wiki článek</h4>

			</article>

			<!-- Editace Wiki článku -->
			<article>
				<h4>Editace Wiki článku</h4>

			</article>

			<!-- Kategorie -->
			<article>
				<h4>Kategorie</h4>

			</article>

			<!-- Nová Kategorie -->
			<article>
				<h4>Nová Kategorie</h4>

			</article>

			<!-- Editace Kategorie -->
			<article>
				<h4>Editace Kategorie</h4>

			</article>

			<!-- Nastavení -->
			<article>
				<h4>Nastavení</h4>

			</article>

		</section>

		<!-- Plugin Frontend -->
		<section>

			<!-- Frontend -->
			<article>
				<h4>Frontend</h4>

			</article>

		</section>

	</div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
<script src="/admin/assets/doc/js/doc.js"></script>

<!-- FancyTree -->
<script src="/admin/assets/plugins/fancytree/jquery-ui-dependencies/jquery.fancytree.ui-deps.js"></script>
<script src="/admin/assets/plugins/fancytree/jquery.fancytree.js"></script>

<script type="text/javascript">
  $(function () {
    // using default options
    $("#tree").fancytree();
  });
</script>


</body>
</html>