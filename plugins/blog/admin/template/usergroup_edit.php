<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $tlblog["blog_connect"]["blogc3"]; ?></h3>
	</div>
	<div class="box-body">
		<div class="block">
			<div class="block-content">
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						// Add Html Element -> endTag (Arguments: tag)
						echo $htmlE->startTag('strong') . $tlblog["blog_connect"]["blogc4"] . $htmlE->endTag('strong');
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blog"] == '1') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blog', 'jak_blog1', '', '1', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blog1', $tl["checkbox"]["chk"]);

							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blog"] == '0') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blog', 'jak_blog2', '', '0', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blog2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						// Add Html Element -> endTag (Arguments: tag)
						echo $htmlE->startTag('strong') . $tlblog["blog_connect"]["blogc5"] . $htmlE->endTag('strong');
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogpost"] == '1') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogpost', 'jak_blogpost1', '', '1', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogpost1', $tl["checkbox"]["chk"]);

							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogpost"] == '0') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogpost', 'jak_blogpost2', '', '0', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogpost2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						// Add Html Element -> endTag (Arguments: tag)
						echo $htmlE->startTag('strong') . $tlblog["blog_connect"]["blogc6"] . $htmlE->endTag('strong');
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogpostapprove"] == '0') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogpostapprove', 'jak_blogpostapprove1', '', '1', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogpostapprove1', $tl["checkbox"]["chk"]);

							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogpostapprove"] == '1') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogpostapprove', 'jak_blogpostapprove2', '', '0', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogpostapprove2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						// Add Html Element -> endTag (Arguments: tag)
						echo $htmlE->startTag('strong') . $tlblog["blog_connect"]["blogc7"] . $htmlE->endTag('strong');
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogpostdelete"] == '1') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogpostdelete', 'jak_blogpostdelete1', '', '1', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogpostdelete1', $tl["checkbox"]["chk"]);

							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogpostdelete"] == '0') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogpostdelete', 'jak_blogpostdelete2', '', '0', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogpostdelete2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						// Add Html Element -> endTag (Arguments: tag)
						echo $htmlE->startTag('strong') . $tlblog["blog_connect"]["blogc8"] . $htmlE->endTag('strong');
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blograte"] == '1') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blograte', 'jak_blograte1', '', '1', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blograte1', $tl["checkbox"]["chk"]);

							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blograte"] == '0') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blograte', 'jak_blograte2', '', '0', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blograte2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-md-5">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						// Add Html Element -> endTag (Arguments: tag)
						echo $htmlE->startTag('strong') . $tlblog["blog_connect"]["blogc9"] . $htmlE->endTag('strong');
						?>

					</div>
					<div class="col-md-7">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogmoderate"] == '1') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogmoderate', 'jak_blogmoderate1', '', '1', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogmoderate1', $tl["checkbox"]["chk"]);

							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							($JAK_FORM_DATA["blogmoderate"] == '0') ? $checked = 'yes' : $checked = 'no';
							echo $htmlE->addInput ('radio', 'jak_blogmoderate', 'jak_blogmoderate2', '', '0', $checked);
							// Arguments: for (id of associated form element), text
							echo $htmlE->addLabelFor ('jak_blogmoderate2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="box-footer">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
		echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
		?>

	</div>
</div>