<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page2 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($page3 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?=$tl["notification"]["n2"]?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
if ($page2 == "e" || $page2 == "epc" || $page2 == "ech" || $page2 == "ene") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if ($page2 == "e") {
          $tl["general_error"]["generror1"];
        } elseif ($page2 == "epc") {
          echo $tlblog["blog_error"]["blogerror1"];
        } elseif ($page2 == "ene") {
          echo $tl["general_error"]["generror2"];
        } else {
          echo $tlblog["blog_error"]["blogerror"];
        } ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

<!-- Fixed Button for save form -->
<div class="savebutton-medium hidden-xs">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=blog&sp=newcategory', $tl["button"]["btn29"], '', 'btn btn-info button');
  ?>

</div>

<?php if (isset($ENVO_BLOG_CAT_EXIST)) { ?>

  <div class="box box-success">
    <div class="box-header with-border">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('i', '', 'fa fa-bars');
      echo $Html->addTag('h3', $tlblog["blog_box_table"]["blogtb5"], 'box-title');
      ?>

    </div>
    <div class="box-body">

      <?php

      // Build menu for categories header and header/footer
      $lang   = $tlblog["blog_notification"]["catdel"];
      $title1 = $tl["icons"]["i5"];
      $title2 = $tl["icons"]["i6"];
      $title3 = $tl["icons"]["i21"];  // Add Article
      $title4 = $tl["icons"]["i31"];  // Edit Category
      $title5 = $tl["icons"]["i1"];   // Trash

      echo envo_build_menu_blog(0, $mheader, $lang, $title1, $title2, $title3, $title4, $title5, ' class="sortable envo_cat_move"', ' id="mheader"');

      ?>

    </div>
    <div class="box-footer">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', $tl["button"]["btn1"], '', 'btn btn-success pull-right save-menu-plugin', array('data-menu' => 'mheader', 'data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>
  </div>

  <div class="col-sm-12">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-sticky-note-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i21"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php } else { ?>

  <div class="col-sm-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
