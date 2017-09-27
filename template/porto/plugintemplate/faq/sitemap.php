<?php if (ENVO_PLUGIN_ACCESS_FAQ && $ENVO_FAQ_ALL) { ?>
  <h3><?php echo ENVO_PLUGIN_NAME_FAQ; ?></h3>
  <?php if (isset($ENVO_FAQ_ALL) && is_array($ENVO_FAQ_ALL)) { ?>
    <ul>
      <?php foreach ($ENVO_FAQ_ALL as $dla) { ?>
        <li><a href="<?php echo $dla["parseurl"]; ?>"><?php echo $dla["title"]; ?></a></li>
      <?php } ?>
    </ul>
  <?php }
} ?>