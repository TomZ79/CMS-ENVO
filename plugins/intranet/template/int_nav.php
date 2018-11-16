<ul>
  <!-- Dashboard -->
  <li>
    <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '', '', '', '') ?>">
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
        <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'house', '', '', '') ?>">
          <span>Domy ve správě</span>
        </a>
      </li>

      <?php if ($ENVO_GROUP_ACCESS_ANALYTICS) { ?>
        <li>
          <a href="javascript:;"><span class="title">Analýza domů</span><span class=" arrow"></span> </a>
          <ul class="sub-menu">
            <li>
              <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'houseanalytics', 'stats-kv', '', '') ?>">
                <span>Statistiky - Okres KV</span>
              </a>
            </li>
            <li>
              <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'houseanalytics', 'stats-so', '', '') ?>">
                <span>Statistiky - Okres SO</span>
              </a>
            </li>
            <li>
              <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'houseanalytics', 'stats-ch', '', '') ?>">
                <span>Statistiky - Okres CH</span>
              </a>
            </li>
            <li>
              <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'houseanalytics', '', '', '') ?>">
                <span>Přehled domů</span>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>

    </ul>
  </li>
</ul>