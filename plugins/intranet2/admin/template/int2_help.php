<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<!-- START SECONDARY SIDEBAR MENU-->
<nav class="secondary-sidebar h-100">
	<div id="navigation" class="list-group padding-20">
		<ul class="nav navbar-nav main-menu" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="#introduction">
					<span class="title bold">Úvod do Intranetu</span>
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
							<span class="title">Seznam domů</span>
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
					<span class="title bold">Programování</span>
				</a>
				<ul class="sub-menu no-padding">
					<li class="nav-item">
						<a class="nav-link" href="#programing_mapycz">
							<span class="title">Mapy.cz</span>
						</a>
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
		<h2 class="text-center">Úvod do Intranetu</h2>
		<hr>

	</section>

	<!-- Začínáme -->
	<section id="introduction1" class="scrollspyoffset">
		<h4 class="m-t-50">Začínáme</h4>
		<hr>

	</section>

	<!-- Bytové domy -->
	<section id="houses" class="scrollspyoffset">
		<h2 class="text-center">Bytové domy</h2>
		<hr>

	</section>

	<!-- Bytové domy - seznam domů -->
	<section id="houselist" class="scrollspyoffset">
		<h4 class="m-t-50">Seznam domů</h4>
		<hr>

	</section>

	<!-- Bytové domy - nový dům -->
	<section id="housenew" class="scrollspyoffset">
		<h4 class="m-t-50">Nový dům</h4>
		<hr>

	</section>

	<!-- Mapové podklady -->
	<section id="maps" class="scrollspyoffset">
		<h2 class="text-center">Mapové podklady</h2>
		<hr>

	</section>

	<!-- Mapa domů v DB -->
	<section id="maps1" class="scrollspyoffset">
		<h4 class="m-t-50">Mapa domů v DB</h4>
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
		<h4 class="m-t-50">Ares</h4>
		<hr>

	</section>

	<!-- Vyhledávání v DB - Justice -->
	<section id="searchindb_justice" class="scrollspyoffset">
		<h4 class="m-t-50">Justice</h4>
		<hr>

	</section>

	<!-- Programování -->
	<section id="programing" class="scrollspyoffset">
		<h2 class="text-center">Programování</h2>
		<hr>

	</section>

	<!-- Mapy.cz -->
	<section id="programing_mapycz" class="scrollspyoffset">
		<h4 class="m-t-50">Mapy.cz</h4>
		<hr>
		<h5 class="semi-bold">Odkazy na mapové podklady</h5>
		<p><strong>1.</strong> Základní odkaz</p>
		<p><code class="font-normal">http://mapy.cz/zakladni?x=15&y=50&z=6&l=0</code></p>
		<p>základní parametry:</p>
		<ul>
			<li><strong>zakladni</strong> – typ mapy (můžete použít také <strong>turisticka, cykloturisticka, dopravni, letni, zimni, fotografie, letecka, letecka-2006, letecka-2003</strong> a <strong>19stoleti</strong>)</li>
			<li><strong>x=15</strong> – zeměpisná délka středu mapy ve stupních a (v anglickém formátu s tečkou namísto desetinné čárky: 15.12345)</li>
			<li><strong>y=50</strong> – zeměpisná šířka středu mapy ve stupních</li>
			<li><strong>z=6</strong> – míra přiblížení (3 až 16/19 podle typu mapy)</li>
			<li><strong>l=0</strong> – nepovinný parametr pro skrytí postranního panelu</li>
		</ul>
	</section>

</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
