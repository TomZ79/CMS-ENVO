<div class="box box-success">
	<div class="box-header with-border">

		<?php
		// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
		echo $Html->addTag('h3', $tld["downl_connect"]["downlc"], 'box-title');
		?>

	</div>
	<div class="box-body">
		<div class="block">
			<div class="block-content">
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc1"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_download', '1', ((isset($_REQUEST["jak_download"]) && $_REQUEST["jak_download"] == '1')) ? TRUE : FALSE, 'jak_download1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_download1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_download', '0', ((isset($_REQUEST["jak_download"]) && $_REQUEST["jak_download"] == '0') || !isset($_REQUEST["jak_download"])) ? TRUE : FALSE, 'jak_download2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_download2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc2"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_candownload', '1', ((isset($_REQUEST["jak_candownload"]) && $_REQUEST["jak_candownload"] == '1')) ? TRUE : FALSE, 'jak_candownload1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_candownload1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_candownload', '0', ((isset($_REQUEST["jak_candownload"]) && $_REQUEST["jak_candownload"] == '0') || !isset($_REQUEST["jak_candownload"])) ? TRUE : FALSE, 'jak_candownload2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_candownload2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc3"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadpost', '1', ((isset($_REQUEST["jak_downloadpost"]) && $_REQUEST["jak_downloadpost"] == '1')) ? TRUE : FALSE, 'jak_downloadpost1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadpost1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadpost', '0', ((isset($_REQUEST["jak_downloadpost"]) && $_REQUEST["jak_downloadpost"] == '0') || !isset($_REQUEST["jak_downloadpost"])) ? TRUE : FALSE, 'jak_downloadpost2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadpost2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc4"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadpostapprove', '0', ((isset($_REQUEST["jak_downloadpostapprove"]) && $_REQUEST["jak_downloadpostapprove"] == '0') || !isset($_REQUEST["jak_downloadpostapprove"])) ? TRUE : FALSE, 'jak_downloadpostapprove1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadpostapprove1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadpostapprove', '1', ((isset($_REQUEST["jak_downloadpostapprove"]) && $_REQUEST["jak_downloadpostapprove"] == '1')) ? TRUE : FALSE, 'jak_downloadpostapprove2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadpostapprove2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc5"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadpostdelete', '1', ((isset($_REQUEST["jak_downloadpostdelete"]) && $_REQUEST["jak_downloadpostdelete"] == '1')) ? TRUE : FALSE, 'jak_downloadpostdelete1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadpostdelete1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadpostdelete', '0', ((isset($_REQUEST["jak_downloadpostdelete"]) && $_REQUEST["jak_downloadpostdelete"] == '0') || !isset($_REQUEST["jak_downloadpostdelete"])) ? TRUE : FALSE, 'jak_downloadpostdelete2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadpostdelete2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc6"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadrate', '1', ((isset($_REQUEST["jak_downloadrate"]) && $_REQUEST["jak_downloadpostdelete"] == '1')) ? TRUE : FALSE, 'jak_downloadrate1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadrate1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadrate', '0', ((isset($_REQUEST["jak_downloadrate"]) && $_REQUEST["jak_downloadrate"] == '0') || !isset($_REQUEST["jak_downloadrate"])) ? TRUE : FALSE, 'jak_downloadrate2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadrate2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('strong', $tld["downl_connect"]["downlc7"]);
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadmoderate', '1', ((isset($_REQUEST["jak_downloadmoderate"]) && $_REQUEST["jak_downloadmoderate"] == '1')) ? TRUE : FALSE, 'jak_downloadmoderate1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadmoderate1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html->addRadio('jak_downloadmoderate', '0', ((isset($_REQUEST["jak_downloadmoderate"]) && $_REQUEST["jak_downloadmoderate"] == '0') || !isset($_REQUEST["jak_downloadmoderate"])) ? TRUE : FALSE, 'jak_downloadmoderate2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html->addLabel('jak_downloadmoderate2', $tl["checkbox"]["chk1"]);
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
		echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
		?>

	</div>
</div>