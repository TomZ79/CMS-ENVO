<ul>
  <!-- dashboard -->
  <li>
    <a href="<?php echo ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '', '', '', '')?>">
      <i class="material-icons">dashboard</i>
      <span class="title">Dashboard</span>
    </a>
  </li>
  <!-- /dashboard -->
  <!-- house -->
  <li>
    <a href="javascript:;" class="auto">
      <i class="material-icons">home</i>
      <span class="title">Bytové domy</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li>
        <a href="<?php echo ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'house', '', '', '')?>">
          <span>Seznam domů</span>
        </a>
      </li>
    </ul>
  </li>
  <!-- /house -->
</ul>