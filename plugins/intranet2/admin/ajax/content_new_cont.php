<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/content_new_cont.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

?>

<div class="col-sm-12 p-t-10 full-height item-description">
	<div class="p-b-10"><h4 class="bold">Nový Kontakt</h4></div>
	<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;padding-right: 20px;">
		<div class="block-content" id="addent">
			<div id="contact_notify_add" class="notify_add"></div>
			<!-- START CONTENT -->
			<div class="clearfix">
				<div class="row-form">
					<div class="col-sm-1">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Titul');
						?>

					</div>
					<div class="col-sm-2">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contdegree', '', '', 'form-control');
						?>

					</div>
					<div class="col-sm-1">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Jméno', 'p-l-10');
						?>

					</div>
					<div class="col-sm-3">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contname', '', '', 'form-control');
						?>

					</div>
					<div class="col-sm-1">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Příjmení', 'p-l-10');
						?>

					</div>
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contsurname', '', '', 'form-control');
						?>

					</div>
				</div>
			</div>
			<div class="clearfix">
				<hr>
			</div>
			<div class="clearfix">
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Adresa bydliště');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contaddress', '', '', 'form-control');
						?>

					</div>
				</div>
			</div>
			<div class="clearfix">
				<hr>
			</div>
			<div class="clearfix">
				<div class="row-form p-t-10 p-b-10">
					<div class="col-sm-3">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Telefon');
						?>

					</div>
					<div class="col-sm-3">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contphone', '', '', 'form-control', array ('placeholder' => 'Formát: +420123456789'));
						?>

					</div>
					<div class="col-sm-2">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Email', 'p-l-50');
						?>

					</div>
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contemail', '', '', 'form-control', array ('placeholder' => 'Formát: email@email.com'));
						?>

					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-3">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Funkce');
						?>

					</div>
					<div class="col-sm-3">
						<div class="form-group m-0">
							<select name="envo_contstatus" class="form-control selectpicker" data-placeholder="Výběr funkce">

								<?php
								// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
								echo $Html -> addOption('', '');
								echo $Html -> addOption('0', 'Bez funkce');
								echo $Html -> addOption('1', 'Předseda');
								echo $Html -> addOption('2', 'Místopředseda');
								echo $Html -> addOption('3', 'Člen výboru');
								?>

							</select>
						</div>
					</div>
					<div class="col-sm-2">

					</div>
					<div class="col-sm-4">

					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-3">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Datum Narození');
						?>

					</div>
					<div class="col-sm-3">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_birthdate', '', '', 'form-control');
						?>

					</div>
					<div class="col-sm-2">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Pohlaví', 'p-l-50');
						?>

					</div>
					<div class="col-sm-4">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html -> addRadio('envo_gender', '1', FALSE, 'envo_gender1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('envo_gender1', 'Muž');

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html -> addRadio('envo_gender', '2', FALSE, 'envo_gender2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('envo_gender2', 'Žena');
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
				<hr>
			</div>
			<div class="clearfix">
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Facebook');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_contfcb', '', '', 'form-control');
						?>

					</div>
				</div>
			</div>
			<div class="clearfix">
				<hr>
			</div>
			<div class="clearfix">
				<div class="row-form p-b-10">
					<div class="col-sm-12">

						<?php
						// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
						echo $Html -> addLabel('', '<strong>Popis</strong>', array ('class' => 'm-t-10 m-b-10'));
						// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
						echo $Html -> addTextarea('envo_contdescription', '', '10', '', array ('id' => 'envoEditorSmall', 'class' => 'form-control envoEditorSmall'));
						?>

					</div>
				</div>
			</div>
			<!-- END CONTENT -->
		</div>
	</div>
</div>
