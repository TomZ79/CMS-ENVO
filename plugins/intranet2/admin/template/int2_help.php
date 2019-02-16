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

	<!-- Vydledávání v DB -->
	<section id="searchindb" class="scrollspyoffset">
		<h2 class="text-center">Vydledávání v DB</h2>
		<hr>

	</section>

	<!-- Vydledávání v DB - Ares -->
	<section id="searchindb_ares" class="scrollspyoffset">
		<h4 class="m-t-50">Ares</h4>
		<hr>

	</section>

	<!-- Vydledávání v DB - Justice -->
	<section id="searchindb_justice" class="scrollspyoffset">
		<h4 class="m-t-50">Justice</h4>
		<hr>

	</section>

</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
