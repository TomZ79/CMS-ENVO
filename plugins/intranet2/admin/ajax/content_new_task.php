<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/content_new_task.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

?>

<div class="col-sm-12 p-t-10 full-height item-description">
	<div class="p-b-10"><h4 class="bold">Nový Úkol</h4></div>
	<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;padding-right: 20px;">
		<div class="block-content">
			<div id="task_notify_add" class="notify_add"></div>
			<div class="row-form">
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('strong', 'Titulek');
					?>

				</div>
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html -> addInput('text', 'envo_addtasktitle', '', '', 'form-control');
					?>

				</div>
			</div>
			<div class="row-form">
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('strong', 'Priorita');
					?>

				</div>
				<div class="col-sm-6">
					<div class="form-group m-0">
						<select name="envo_addtaskpriority" class="form-control selectpicker">

							<?php
							// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
							echo $Html -> addOption('0', 'Nedůležitá');
							echo $Html -> addOption('1', 'Nízká priorita');
							echo $Html -> addOption('2', 'Střední priorita');
							echo $Html -> addOption('3', 'Vysoká priorita');
							echo $Html -> addOption('4', 'Nejvyšší priorita');
							?>

						</select>
					</div>
				</div>
			</div>
			<div class="row-form">
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('strong', 'Status');
					?>

				</div>
				<div class="col-sm-6">
					<div class="form-group m-0">
						<select name="envo_addtaskstatus" class="form-control selectpicker">

							<?php
							// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
							echo $Html -> addOption('0', 'Žádný status');
							echo $Html -> addOption('1', 'Zápis');
							echo $Html -> addOption('2', 'V řešení');
							echo $Html -> addOption('3', 'Vyřešeno - Uzavřeno');
							echo $Html -> addOption('4', 'Stornováno');
							?>

						</select>
					</div>
				</div>
			</div>
			<div class="row-form">
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('strong', 'Datum Úkolu');
					?>

				</div>
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html -> addInput('text', 'envo_addtasktime', '', '', 'form-control', array ('readonly' => 'readonly'));
					?>

				</div>
			</div>
			<div class="row-form">
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('strong', 'Datum Připomenutí');
					?>

				</div>
				<div class="col-sm-6">

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html -> addInput('text', 'envo_addtaskreminder', '', '', 'form-control', array ('readonly' => 'readonly'));
					?>

				</div>
			</div>
			<div class="row-form">
				<div class="col-sm-12">

					<?php
					// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
					echo $Html -> addLabel('', '<strong>Popis</strong>', array ('class' => 'm-t-10 m-b-10'));
					// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
					echo $Html -> addTextarea('envo_addtaskdescription', '', '10', '', array ('id' => 'envoEditorSmall', 'class' => 'form-control envoEditorSmall'));
					?>

				</div>
			</div>
		</div>
	</div>
</div>