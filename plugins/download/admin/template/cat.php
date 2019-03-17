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
					echo $tld["downl_error"]["downlerror1"];
				} elseif ($page2 == "ene") {
					echo $tl["general_error"]["generror2"];
				} else {
					echo $tld["downl_error"]["downlerror"];
				} ?>'
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
		echo $Html -> addAnchor('index.php?p=download&sp=newcategory', $tl["button"]["btn29"], '', 'btn btn-info button');
		?>

	</div>

<?php if (isset($ENVO_DL_CAT_EXIST)) { ?>

	<div class="box box-success">
		<div class="box-header with-border">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('i', '', 'fa fa-bars');
			echo $Html -> addTag('h3', $tld["downl_box_table"]["downltb5"], 'box-title');
			?>

		</div>
		<div class="box-body">

			<?php

			// Build menu for categories header and header/footer
			$lang   = $tld["downl_notification"]["catdel"];
			$title1 = $tl["icons"]["i5"];
			$title2 = $tl["icons"]["i6"];
			$title3 = $tl["icons"]["i24"];
			$title4 = $tl["icons"]["i2"];
			$title5 = $tl["icons"]["i1"];

			echo envo_build_menu_download(0, $mheader, $lang, $title1, $title2, $title3, $title4, $title5, ' class="sortable envo_cat_move"', ' id="mheader"');

			?>

		</div>
		<div class="box-footer">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html -> addButtonSubmit('btnSave', $tl["button"]["btn1"], '', 'btn btn-success float-right save-menu-plugin', array ('data-menu' => 'mheader'));
			?>

		</div>
	</div>

	<div class="col-sm-12">
		<div class="icon_legend">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('h3', $tl["icons"]["i"]);
			echo $Html -> addTag('i', '', 'fa fa-plus', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i7"]));
			echo $Html -> addTag('i', '', 'fa fa-check', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
			echo $Html -> addTag('i', '', 'fa fa-lock', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
			echo $Html -> addTag('i', '', 'fa fa-sticky-note-o', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i24"]));
			echo $Html -> addTag('i', '', 'fa fa-edit', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
			echo $Html -> addTag('i', '', 'fa fa-trash-o', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

<?php } else { ?>

	<div class="col-sm-12">

		<?php
		// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
		echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
		?>

	</div>
<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>