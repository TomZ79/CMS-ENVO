<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<!-- START SECONDARY SIDEBAR MENU-->
<nav class="secondary-sidebar h-100">
	<div id="navigation" class="list-group padding-20">
		<ul class="nav navbar-nav main-menu" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="#introduction">
					<span class="title bold">Úvod do Intranetu 2</span>
				</a>
				<ul class="sub-menu no-padding">
					<li class="nav-item">
						<a class="nav-link" href="#introduction1">
							<span class="title">Začínáme</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#houses">
					<span class="title bold">Bytové domy</span>
				</a>
				<ul class="sub-menu no-padding">
					<li class="nav-item">
						<a class="nav-link" href="#houselist">
							<span class="title">Vyhledávání domů</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#housenew">
							<span class="title">Nový dům</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#maps">
					<span class="title bold">Mapové podklady</span>
				</a>
				<ul class="sub-menu no-padding">
					<li class="nav-item">
						<a class="nav-link" href="#maps1">
							<span class="title">Mapa domů v DB</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#katastr">
					<span class="title bold">Katastr</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#searchindb">
					<span class="title bold">Vyhledávání v DB</span>
				</a>
				<ul class="sub-menu no-padding">
					<li class="nav-item">
						<a class="nav-link" href="#searchindb_ares">
							<span class="title">Ares</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#searchindb_justice">
							<span class="title">Justice</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#programing">
					<span class="title bold">PHP, JS Nápověda</span>
				</a>
				<ul class="sub-menu no-padding">
					<li class="nav-item">
						<a class="nav-link" href="#programing_maps">
							<span class="title bold">Mapy</span>
						</a>
						<ul class="sub-menu-child no-padding">
							<li class="nav-item"><a class="nav-link" href="#programing_mapycz">Mapy.cz</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<!-- END SECONDARY SIDEBAR MENU -->

<div class="inner-content h-100 w-100 padding-20" id="inner-content" style="overflow-y: auto; position:relative;margin-left: 0">

	<!-- Introduction -->
	<section id="introduction" class="scrollspyoffset">
		<h2 class="text-center">Úvod do Intranetu 2</h2>
		<hr>

	</section>

	<!-- Začínáme -->
	<section id="introduction1" class="scrollspyoffset">
		<h2 class="text-center">Začínáme</h2>
		<hr>

	</section>

	<!-- Bytové domy -->
	<section id="houses" class="scrollspyoffset">
		<h2 class="text-center">Bytové domy</h2>
		<hr>

	</section>

	<!-- Bytové domy - Vyhledávání domů -->
	<section id="houselist" class="scrollspyoffset">
		<h2 class="text-center">Vyhledávání domů</h2>
		<hr>

	</section>

	<!-- Bytové domy - nový dům -->
	<section id="housenew" class="scrollspyoffset">
		<h2 class="text-center">Nový dům</h2>
		<hr>
		<h4>Zadání základních dat z ARESu podle IČ</h4>
		<hr>
		<p></p>

	</section>

	<!-- Mapové podklady -->
	<section id="maps" class="scrollspyoffset">
		<h2 class="text-center">Mapové podklady</h2>
		<hr>

	</section>

	<!-- Mapa domů v DB -->
	<section id="maps1" class="scrollspyoffset">
		<h2 class="text-center">Mapa domů v DB</h2>
		<hr>

	</section>

	<!-- Katastr -->
	<section id="katastr" class="scrollspyoffset">
		<h2 class="text-center">Katastr</h2>
		<hr>

	</section>

	<!-- Vyhledávání v DB -->
	<section id="searchindb" class="scrollspyoffset">
		<h2 class="text-center">Vyhledávání v DB</h2>
		<hr>

	</section>

	<!-- Vyhledávání v DB - Ares -->
	<section id="searchindb_ares" class="scrollspyoffset">
		<h2 class="text-center">Ares</h2>
		<hr>

	</section>

	<!-- Vyhledávání v DB - Justice -->
	<section id="searchindb_justice" class="scrollspyoffset">
		<h2 class="text-center">Justice</h2>
		<hr>

	</section>

	<!-- PHP, JS Nápověda -->
	<section id="programing" class="scrollspyoffset">
		<h2 class="text-center">PHP, JS Nápověda</h2>
		<hr>

	</section>

	<!-- PHP, JS Nápověda - Mapy -->
	<section id="programing_maps" class="scrollspyoffset">
		<h2 class="text-center">Mapy</h2>
		<hr>

	</section>

	<!-- PHP, JS Nápověda - Mapy.cz -->
	<section id="programing_mapycz" class="scrollspyoffset">
		<h2 class="text-center">Mapy.cz</h2>
		<hr>
		<h5 class="semi-bold">Odkazy na mapové podklady</h5>
		<p><strong>1.</strong> Základní odkaz</p>
		<p><code class="font-normal">http://mapy.cz/zakladni?x=15&y=50&z=6&l=0</code></p>
		<p><u>Základní parametry:</u></p>
		<ul>
			<li><strong>zakladni</strong> – typ mapy (můžete použít také <strong>turisticka, cykloturisticka, dopravni, letni, zimni, fotografie, letecka, letecka-2006, letecka-2003</strong> a <strong>19stoleti</strong>)</li>
			<li><strong>x=15</strong> – zeměpisná délka středu mapy ve stupních a (v anglickém formátu s tečkou namísto desetinné čárky: 15.12345)</li>
			<li><strong>y=50</strong> – zeměpisná šířka středu mapy ve stupních</li>
			<li><strong>z=6</strong> – míra přiblížení (3 až 16/19 podle typu mapy)</li>
			<li><strong>l=0</strong> – nepovinný parametr pro skrytí postranního panelu</li>
		</ul>
		<p><u>Typy mapy</u></p>
		<dl>
			<dt>Základní mapový podklad</dt>
			<dd>Klasický kreslený mapový podklad se nejvíce podobá mapám použitým v autoatlasech. <a href="https://napoveda.seznam.cz/cz/zakladni-mapovy-podklad/" target="">Zobrazit více informací</a></dd>
			<dt>Letecký mapový podklad</dt>
			<dd>Letecký mapový podklad je tvořen kombinací satelitního snímkování a leteckého snímkování. <a href="https://napoveda.seznam.cz/cz/mapy/mapove-podklady/letecky-mapovy-podklad/" target="_blank">Zobrazit více informací</a></dd>
			<dt>Turistický a cyklistický mapový podklad</dt>
			<dd>Obdoba klasické papírové turistické a cyklistické mapy s jedinečnou podrobností do úrovně 1 : 5 000.
				<a href="https://napoveda.seznam.cz/cz/mapy/mapove-podklady/turisticky-cyklisticky-mapovy-podklad/" target="_blank">Zobrazit více informací</a></dd>
			<dt>Dopravní mapa</dt>
			<dd>Dopravní mapa je určená zejména pro motoristy. <a href="https://napoveda.seznam.cz/cz/mapy/mapove-podklady/dopravni-mapovy-podklad/" target="_blank">Zobrazit více informací</a></dd>
			<dt>Zimní mapový podklad</dt>
			<dd>Zimní mapový podklad nabízí podrobné informace a popisy sjezdovek, běžeckých tras, zimního tyčového značení a dalším doplňkovým obsahem. <a href="https://napoveda.seznam.cz/cz/mapy/mapove-podklady/zimni-mapovy-podklad/" target="_blank">Zobrazit více informací</a></dd>
			<dt>Zeměpisná mapa</dt>
			<dd>Zeměpisný mapový podklad přináší obecně zeměpisnou mapu se stínováním a barevnou hipsometrií, která nejlépe vystihuje reliéf zemského povrchu. <a href="https://napoveda.seznam.cz/cz/mapy/mapove-podklady/zemepisna-mapa/" target="_blank">Zobrazit více informací</a></dd>
			<dt>Archivní mapový podklad z 19. století</dt>
			<dd>Archivní mapový podklad tvoří mapy z let 1836-1852. Historická mapa tedy zobrazuje dnešní území České republiky před více jak 150 lety. <a href="https://napoveda.seznam.cz/cz/mapy/mapove-podklady/archivni-mapovy-podklad/" target="_blank">Zobrazit více informací</a></dd>
		</dl>
	</section>

</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
