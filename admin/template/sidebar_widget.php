<?php

// We run the queries for the widgets only if we need to
$hookadminws = $jakhooks->jakGethook("php_admin_widgets_sql");
if ($hookadminws)
  foreach ($hookadminws as $hasq) {
    eval($hasq['phpcode']);
  }

$hid = array();

?>

<!-- Moving stuff -->
<ul class="jak_widget_move">
  <?php if (isset($JAK_PAGE_GRID) && is_array($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pgh) { ?>

    <?php if (isset($JAK_HOOKS) && is_array($JAK_HOOKS)) foreach ($JAK_HOOKS as $v) {
      if ($pgh["hookid"] == $v["id"]) { ?>

        <li id="widget-<?php echo $pgh["id"]; ?>" class="jakwidget">
          <div class="sidebar-widget">
            <div class="checkbox check-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addCheckbox('jak_hookshow[]', $pgh["id"], TRUE, 'jak_hookshow' . $pgh["id"]);
              // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
              echo $Html->startTag('label', array('for' => 'jak_hookshow' . $pgh["id"]));
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=' . $v["id"], $v["name"]);
              // Add Html Element -> endTag (Arguments: tag)
              echo $Html->endTag('label');
              ?>

            </div>
          </div>
          <div class="actions">

            <?php if (!empty($v["widgetcode"])) include_once APP_PATH . $v["widgetcode"];
            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
            echo $Html->addInput('hidden', 'horder[]', $pgh["orderid"], '', 'sorder');
            echo $Html->addInput('hidden', 'real_hook_id[]', $pgh["id"]);
            ?>

          </div>
        </li>

        <?php $hid[] = $pgh["hookid"];
      }
    }
  }
  if (isset($JAK_HOOKS) && is_array($JAK_HOOKS)) foreach ($JAK_HOOKS as $v) {
    if ((is_array($hid) && !in_array($v["id"], $hid)) || !isset($hid)) { ?>

      <li id="widget-<?php echo $v["id"]; ?>" class="jakwidget">
        <div class="sidebar-widget">
          <div class="checkbox check-success">

            <?php
            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
            echo $Html->addCheckbox('jak_hookshow_new[]', $v["id"], FALSE, 'jak_hookshow_new' . $v["id"]);
            // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
            echo $Html->startTag('label', array('for' => 'jak_hookshow_new' . $v["id"]));
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=' . $v["id"], $v["name"]);
            // Add Html Element -> endTag (Arguments: tag)
            echo $Html->endTag('label');
            ?>

          </div>
        </div>
        <div class="actions">

          <?php if (!empty($v["widgetcode"])) include_once APP_PATH . $v["widgetcode"];
          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
          echo $Html->addInput('hidden', 'horder_new[]', $v["exorder"], '', 'sorder');
          echo $Html->addInput('hidden', 'real_hook_id_new[]', $v["id"]);
          echo $Html->addInput('hidden', 'sreal_plugin_id_new[]', $v["pluginid"]);
          ?>

        </div>
      </li>

    <?php }
  } ?>

</ul>