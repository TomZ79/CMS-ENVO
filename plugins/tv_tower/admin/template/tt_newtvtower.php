<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page3 == "e") { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?=$tl["general_error"]["generror1"]?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

<?php
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
if ($errors) { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton hidden-xs">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ('data-loading-text' => $tl["button"]["btn41"]));
		// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
		echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower', $tl["button"]["btn19"], '', 'btn btn-info button');
		?>

	</div>

	<!-- Form Content -->
	<div class="row tab-content-singel">
		<div class="col-sm-6">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', 'Obecná nastavení', 'box-title');
					?>

				</div>
				<div class="box-body">
					<div class="block">
						<div class="block-content">
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Název Vysílače');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_tvtowername', (isset($_REQUEST["envo_tvtowername"]) ? $_REQUEST["envo_tvtowername"] : ''), '', 'form-control');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Stanoviště');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_tvtowerstation', (isset($_REQUEST["envo_tvtowerstation"]) ? $_REQUEST["envo_tvtowerstation"] : ''), '', 'form-control');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Okres');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_tvtowerdistrict', (isset($_REQUEST["envo_tvtowerdistrict"]) ? $_REQUEST["envo_tvtowerdistrict"] : ''), '', 'form-control');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Výška nad mořem (m)');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_tvtowerhsea', (isset($_REQUEST["envo_tvtowerhsea"]) ? $_REQUEST["envo_tvtowerhsea"] : ''), '', 'form-control');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Východní délka');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_tvtowerlongitude', (isset($_REQUEST["envo_tvtowerlongitude"]) ? $_REQUEST["envo_tvtowerlongitude"] : ''), '', 'form-control');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Severní šířka');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_tvtowerlatitude', (isset($_REQUEST["envo_tvtowerlatitude"]) ? $_REQUEST["envo_tvtowerlatitude"] : ''), '', 'form-control');
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">

					<?php
					// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
					echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
					?>

				</div>
			</div>
		</div>
		<div class="col-sm-6" style="height: 500px;">

		</div>
	</div>
</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
