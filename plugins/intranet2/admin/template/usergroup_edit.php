<div class="box box-success">
	<div class="box-header with-border">

		<?php
		// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
		echo $Html -> addTag('h3', $tlint2["int2_connect"]["int2c"], 'box-title');
		?>

	</div>
	<div class="box-body">
		<div class="block">
			<div class="block-content">
				<div class="row-form">
					<div class="col-sm-5">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', $tlint2["int2_connect"]["int2c1"]);
						?>

					</div>
					<div class="col-sm-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html -> addRadio('envo_int2', '1', ($ENVO_FORM_DATA["intranet2"] == '1') ? TRUE : FALSE, 'envo_int21');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('envo_int21', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html -> addRadio('envo_int2', '0', ($ENVO_FORM_DATA["intranet2"] == '0') ? TRUE : FALSE, 'envo_int22');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('envo_int22', $tl["checkbox"]["chk1"]);
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
		echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
		?>

	</div>
</div>