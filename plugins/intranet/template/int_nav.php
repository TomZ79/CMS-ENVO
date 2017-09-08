<ul class="nav">
  <!-- dashboard -->
  <li>
    <a href="<?php echo JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '', '', '', '')?>">
      <i class="icon-screen-desktop"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- /dashboard -->
  <!-- house -->
  <li>
    <a href="javascript:;">
      <i class="icon-home"></i>
      <span>Bytové domy</span>
    </a>
    <ul class="sub-menu">
      <li>
        <a href="<?php echo JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, 'house', '', '', '')?>">
          <span>Seznam domů</span>
        </a>
      </li>
    </ul>
  </li>
  <!-- /house -->
</ul>