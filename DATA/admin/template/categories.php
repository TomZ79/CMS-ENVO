<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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

<?php if ($page2 == "s1") { ?>
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

<?php if ($page1 == "e" || $page1 == "epc" || $page1 == "ech" || $page1 == "ene0") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php
          if ($page1 == "e") {
            $tl["general_error"]["generror1"];
          } elseif ($page1 == "epc") {
            echo $tl["cat_error"]["caterror1"];
          } elseif ($page1 == "ene0") {
            echo 'Odstranění záznamu z DB je blokováno';
          } else {
            echo $tl["cat_error"]["caterror"];
          }
          ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <!-- Action button block -->
  <div class="actionbtn-block d-none d-sm-block">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=categories&amp;sp=newcat', $tl["button"]["btn29"], '', 'btn btn-info button');
    ?>

  </div>


<?php if (isset($ENVO_CAT1_EXIST) || isset($ENVO_CAT2_EXIST) || isset($ENVO_CAT3_EXIST)) { ?>

  <div class="row">
    <div class="col-sm-6">
      <!-- Header or Header/Footer -->
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('i', '', 'fa fa-bars');
          echo $Html->addTag('h3', $tl["cat_box_title"]["catbt"], 'box-title');
          ?>

        </div>
        <div class="box-body">

          <?php if ($ENVO_CAT1_EXIST) {

            // Build menu for categories header and header/footer
            $lang   = $tl["cat_notification"]["del"]; // Notification
            $title1 = $tl["icons"]["i11"];  // Add page
            $title2 = $tl["icons"]["i10"];  // Edit Page
            $title3 = $tl["icons"]["i8"];   //
            $title4 = $tl["icons"]["i31"];  // Edit Category
            $title5 = $tl["icons"]["i1"];   // Trash

            echo envo_build_menu_admin(0, $mheader, $lang, $title1, $title2, $title3, $title4, $title5, ' class="sortable envo_cat_move"', ' id="mheader"');

          } else {

            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
            echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));

          } ?>

        </div>
        <div class="box-footer">

          <?php
          // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
          echo $Html->addButtonSubmit('btnSave', $tl["button"]["btn1"], '', 'btn btn-success float-right save-menu', array('data-menu' => 'mheader'));
          ?>

        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <!-- Footer Only -->
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('i', '', 'fa fa-clone');
          echo $Html->addTag('h3', $tl["cat_box_title"]["catbt1"], 'box-title');
          ?>

        </div>
        <div class="box-body">

          <?php if ($ENVO_CAT2_EXIST) {

            // Build menu for categories
            $lang   = $tl["cat_notification"]["del"]; // Notification
            $title1 = $tl["icons"]["i11"];  // Add page
            $title2 = $tl["icons"]["i10"];  // Edit Page
            $title3 = $tl["icons"]["i8"];   //
            $title4 = $tl["icons"]["i31"];  // Edit Category
            $title5 = $tl["icons"]["i1"];   // Trash

            echo envo_build_menu_admin(0, $mfooter, $lang, $title1, $title2, $title3, $title4, $title5, ' class="sortable envo_cat_move"', ' id="mfooter"');

          } else {

            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
            echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));

          } ?>

        </div>
        <div class="box-footer">

          <?php
          // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
          echo $Html->addButtonSubmit('btnSave', $tl["button"]["btn1"], '', 'btn btn-success float-right save-menu', array('data-menu' => 'mfooter'));
          ?>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <!-- Not Visible -->
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('i', '', 'fa fa-clone');
          echo $Html->addTag('h3', $tl["cat_box_title"]["catbt2"], 'box-title');
          ?>

        </div>
        <div class="box-body">

          <?php if ($ENVO_CAT3_EXIST) {

            echo '<ul class="list-group">' . $ucatblank . '</ul>';

          } else {

            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
            echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));

          } ?>

        </div>
      </div>
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

  <div class="col-sm-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-link', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i9"]));
      echo $Html->addTag('i', '', 'fa fa-eyedropper', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i8"]));
      echo $Html->addTag('i', '', 'fa fa-pencil', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i10"]));
      echo $Html->addTag('i', '', 'fa fa-sticky-note-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i11"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i31"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php include "footer.php"; ?>