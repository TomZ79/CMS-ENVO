<ul>
  <!-- Dashboard -->
  <li>
    <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '', '', '', '') ?>">
      <i class="material-icons">dashboard</i>
      <span class="title">Dashboard</span>
    </a>
  </li>
  <!-- House -->
  <li>
    <a href="javascript:;" class="auto">
      <i class="material-icons">home</i>
      <span class="title">Bytové domy</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
			<li>
				<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', '', '', '') ?>">
					<span>Seznam bytových domů</span>
				</a>
			</li>

			<li>
				<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'statistics', '', '') ?>">
					<span>Statistika</span>
				</a>
			</li>

			<li>
				<a href="javascript:;"><span class="title">Mapové podklady</span><span class=" arrow"></span> </a>
				<ul class="sub-menu">
					<li>
						<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'maps', 'maps1', '', '') ?>">
							<span>Přehledová mapa</span>
						</a>
					</li>
				</ul>
			</li>

    </ul>
  </li>
</ul>