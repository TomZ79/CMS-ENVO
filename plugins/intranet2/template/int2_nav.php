<ul class="nav nav-sidebar" data-nav-type="accordion">
	<!-- Dashboard -->
	<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div>
		<i class="icon-menu" title="Main"></i></li>
	<li class="nav-item">
		<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2) ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == '') ? 'active' : '') ?>">
			<i class="icon-database-menu"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- House -->
	<li class="nav-item nav-item-submenu <?= (($page == 'intranet-2' && ($page1 == 'house' || $page1 == 'maps')) ? 'nav-item-open' : '') ?>">
		<a href="#" class="nav-link "><i class="icon-office"></i> <span>Bytové domy</span></a>

		<ul class="nav nav-group-sub " data-submenu-title="Bytové domy" <?= (($page == 'intranet-2' && ($page1 == 'house' || $page1 == 'maps')) ? 'style="display: block;"' : '') ?>>
			<li class="nav-item">
				<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'house' && $page2 == '') ? 'active' : '') ?>">
					Seznam bytových domů
				</a>
			</li>
			<?php if ($ENVO_ACCESS_ANALYTICS) { ?>
				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'statistics') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'house' && $page2 == 'statistics') ? 'active' : '') ?>">
						Statistika
					</a>
				</li>
			<?php } ?>
			<li class="nav-item nav-item-submenu <?= (($page == 'intranet-2' && $page1 == 'maps') ? 'nav-item-open' : '') ?>">
				<a href="#" class="nav-link">Mapové podklady</a>
				<ul class="nav nav-group-sub" <?= (($page == 'intranet-2' && $page1 == 'maps') ? 'style="display: block;"' : '') ?>>
					<li class="nav-item">
						<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'maps', 'maps1') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'maps' && $page2 == 'maps1') ? 'active' : '') ?>">
							Přehledová mapa
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<!-- Open Data -->
		<li class="nav-item nav-item-submenu <?= (($page == 'intranet-2' && ($page1 == 'opendata')) ? 'nav-item-open' : '') ?>">
			<a href="#" class="nav-link "><i class="icon-stats-bars"></i> <span>Otevřená data</span></a>

			<ul class="nav nav-group-sub " data-submenu-title="Otevřená data" <?= (($page == 'intranet-2' && ($page1 == 'opendata')) ? 'style="display: block;"' : '') ?>>
				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'ares') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'ares') ? 'active' : '') ?>">
						Ares
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'justice') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'justice') ? 'active' : '') ?>">
						Justice
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'csu') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'csu') ? 'active' : '') ?>">
						ČSÚ
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'kn') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'kn') ? 'active' : '') ?>">
						Katastr
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'databox') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'databox') ? 'active' : '') ?>">
						Datová schránka
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'dph') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'dph') ? 'active' : '') ?>">
						Plátci DPH
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'opendata', 'drazby') ?>" class="nav-link <?= (($page == 'intranet-2' && $page1 == 'opendata' && $page2 == 'drazby') ? 'active' : '') ?>">
						Portál dražeb
					</a>
				</li>

			</ul>
		</li>
</ul>