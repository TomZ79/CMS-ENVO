<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
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

<?php if ($page3 == "s1") { ?>
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
if ($page2 == "e" || $page2 == "ene") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?= ($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
	</script>
<?php } ?>

	<!-- Action button block -->
	<div class="actionbtn-block d-none d-sm-block">

		<?php
		// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
		echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=newcontract', 'Nová Zakázka', '', 'btn btn-info button');
		?>

	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Vyhledávání <strong>podle kritérií</strong></h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">
					<div class="row">
						<div class="col-sm-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Základní zobrazení</h6>

							<?php
							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=contractlist', 'Zobrazit vše', '', 'btn btn-block btn btn-success');
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>