<?php
switch ($page1) {
	case 'intranet-2':
		// MAIN
		switch ($page2) {
			case 'house':
				// HOUSE
				switch ($page3) {
					case 'house':
						// DASHBOARD

						break;
					default:
						// HOUSE SELECT
				}
				break;
			default:
				// DASHBOARD
		}
		break;
	default:
}
if ($page == 'intranet2') {
	$classint2section = 'open active';
	$classint2iconbg  = 'bg-success';
}
if ($page1 == 'house') {
	$classint2subsection1 = 'open active';
	$styleint_1           = 'style="display: block;"';
}

if ($page1 == 'maps') {
	$classint2subsection2 = 'open active';
	$styleint_2           = 'style="display: block;"';
}

if ($page1 == 'search_db') {
	$classint2subsection3 = 'open active';
	$styleint_3           = 'style="display: block;"';
}

?>

<ul class="nav nav-sidebar" data-nav-type="accordion">
  <!-- Dashboard -->
	<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
	<li class="nav-item">
    <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2) ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == '') ? 'active' : '') ?>">
			<i class="icon-database-menu"></i>
      <span>Dashboard</span>
    </a>
  </li>
	<!-- House -->
	<li class="nav-item nav-item-submenu <?= (($page == 'intranet-2' && $page1 == 'house') ? 'nav-item-open' : '') ?>">
		<a href="#" class="nav-link "><i class="icon-office"></i> <span>Bytové domy</span></a>

		<ul class="nav nav-group-sub " data-submenu-title="Bytové domy" <?= (($page == 'intranet-2' && $page1 == 'house') ? 'style="display: block;"' : '') ?>>
			<li class="nav-item">
				<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house') ?>" class="nav-link">
					Seznam bytových domů
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'statistics') ?>" class="nav-link">
					Statistika
				</a>
			</li>
			<li class="nav-item nav-item-submenu">
				<a href="#" class="nav-link">Mapové podklady</a>
				<ul class="nav nav-group-sub">
					<li class="nav-item">
						<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'maps', 'maps1') ?>" class="nav-link">
							Přehledová mapa
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</li>
</ul>