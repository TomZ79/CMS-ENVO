<?php

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$hookadminws = $envohooks->EnvoGethook("php_admin_widgets_sql");
if ($hookadminws) {
  foreach ($hookadminws as $hasq) {
    eval($hasq['phpcode']);
  }
}

// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
if (isset($ENVO_ACTIVE_GRID) && is_array($ENVO_ACTIVE_GRID)) {
  foreach ($ENVO_ACTIVE_GRID as $ag) {
    $grid_array[] = $ag["hookid"];
  }
}
?>

<!-- Moving stuff -->
<ul class="envo_widget_move">
  <?php if (isset($ENVO_HOOKS) && is_array($ENVO_HOOKS)) foreach ($ENVO_HOOKS as $v) { ?>

    <li id="widget-<?= $v["id"] ?>" class="envowidget">
      <div class="sidebar-widget">
        <div class="checkbox check-success">

          <?php

          if (isset($grid_array) && is_array($grid_array) && in_array($v["id"], $grid_array)) {
            echo $Html->addCheckbox('envo_hookshow[]', $v["id"], TRUE, 'envo_hookshow' . $v["id"]);
          } else {
            echo $Html->addCheckbox('envo_hookshow[]', $v["id"], FALSE, 'envo_hookshow' . $v["id"]);
          }

          // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
          echo $Html->startTag('label', array('for' => 'envo_hookshow' . $v["id"]));
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edithook&amp;id=' . $v["id"], $v["name"]);
          // Add Html Element -> endTag (Arguments: tag)
          echo $Html->endTag('label');
          ?>

        </div>
      </div>
      <div class="actions">

        <?php if (!empty($v["widgetcode"])) include_once APP_PATH . $v["widgetcode"];
        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
        echo $Html->addInput('hidden', 'horder[]', $v["exorder"], '', 'sorder');
        echo $Html->addInput('hidden', 'real_hook_id[]', $v["id"]);
        echo $Html->addInput('hidden', 'sreal_plugin_id[]', $v["pluginid"]);
        ?>

      </div>
    </li>

  <?php } ?>
</ul>