<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

	<div class = "col-md-12"
			 style = "margin: 10px 0 50px 0;">

		<div class = "row 2col">
			<div class = "<?= ($ENVO_GROUP_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'hidden') ?> spacing-bottom-sm spacing-bottom">
				<div class = "tiles purple added-margin">
					<div class = "tiles-body">
						<div class = "tiles-title"> BYTOVÉ DOMY - ANALÝZA</div>
						<div class = "heading">
							<span class = "animate-number"
										data-value = "<?= $ENVO_COUNTS_ANALYTICS ?>"
										data-animation-duration = "1200"
										data-toggle = "tooltipEnvo"
										data-placemen = "bottom"
										title = "Celkový počet domů">0</span>
							<span>/</span>
							<span class = "animate-number"
										data-value = "<?= $ENVO_COUNTS_ANALYTICS1 ?>"
										data-animation-duration = "1200"
										data-toggle = "tooltipEnvo"
										data-placemen = "bottom"
										title = "Počet SVJ">0</span>
							<span>/</span>
							<span class = "animate-number"
										data-value = "<?= $ENVO_COUNTS_ANALYTICS2 ?>"
										data-animation-duration = "1200"
										data-toggle = "tooltipEnvo"
										data-placemen = "bottom"
										title = "Počet bytových domů (Není SVJ)">0</span>
						</div>
						<div class = "progress transparent progress-small no-radius">
							<div class = "progress-bar progress-bar-white animate-progress-bar"
									 data-percentage = "<?= $ENVO_PERCENT_ANALYTICS ?>"></div>
						</div>
						<div class = "description">
							<span class = "text-white mini-description ">Počet domů <span class = "blend">uložených v databázi</span> <br>NEJSOU ve správě</span>
						</div>
					</div>
				</div>
			</div>
			<div class = "<?= ($ENVO_GROUP_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'col-md-4 col-sm-6') ?> spacing-bottom-sm spacing-bottom">
				<div class = "tiles blue added-margin">
					<div class = "tiles-body">
						<div class = "tiles-title"> BYTOVÉ DOMY VE SPRÁVĚ</div>
						<div class = "heading">
							<span class = "animate-number"
										data-value = "<?= $ENVO_COUNTS ?>"
										data-animation-duration = "1200">0</span>
						</div>
						<div class = "progress transparent progress-small no-radius">
							<div class = "progress-bar progress-bar-white animate-progress-bar"
									 data-percentage = "<?= $ENVO_PERCENT ?>"></div>
						</div>
						<div class = "description">
							<span class = "text-white mini-description ">Počet domů <span class = "blend">ve správě</span> <br>JSOU ve správě</span>
						</div>
					</div>
				</div>
			</div>
			<div class = "<?= ($ENVO_GROUP_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'col-md-4 col-sm-6') ?> spacing-bottom-sm spacing-bottom">
				<div class = "tiles green added-margin">
					<div class = "tiles-body">
						<div class = "tiles-title">AKTIVNÍ ÚKOLY</div>
						<div class = "heading">
							<span class = "animate-number"
										data-value = "<?= $ENVO_TASK_COUNTS ?>"
										data-animation-duration = "1200">0</span>
						</div>
						<div class = "progress transparent progress-small no-radius">
							<div class = "progress-bar progress-bar-white animate-progress-bar"
									 data-percentage = "<?= $ENVO_TASK_PERCENT ?>"></div>
						</div>
						<div class = "description">
							<span class = "text-white mini-description ">Počet aktivních <span class = "blend">úkolů</span> <br>Úkoly v termínu</span>
						</div>
					</div>
				</div>
			</div>
			<div class = "<?= ($ENVO_GROUP_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'col-md-4 col-sm-6') ?> spacing-bottom">
				<div class = "tiles red added-margin">
					<div class = "tiles-body">
						<div class = "tiles-title">OPOŽDĚNÉ ÚKOLY</div>
						<div class = "heading">
							<span class = "animate-number"
										data-value = "<?= $ENVO_TASK_DELAY_COUNTS ?>"
										data-animation-duration = "1200">0</span>
						</div>
						<div class = "progress transparent progress-small no-radius">
							<div class = "progress-bar progress-bar-white animate-progress-bar"
									 data-percentage = "<?= $ENVO_TASK_DELAY_PERCENT ?>"></div>
						</div>
						<div class = "description">
							<span class = "text-white mini-description ">Počet opožděných <span class = "blend">úkolů</span> <br>Úkoly po termínu</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class = "row">
			<div class = "col-sm-12">
				<div class = "grid simple transparent-color"
						 style = "position: static; zoom: 1;">
					<div class = "grid-title">
						<h4><i class = "fas fa-tasks"></i> Seznam <strong>OPOŽDĚNÝCH</strong> úkolů</h4>
						<div class = "tools">
							<a href = "javascript:;"
								 class = "collapse"></a>
							<a href = "javascript:;"
								 class = "remove"></a>
						</div>
					</div>
					<div class = "grid-body no-border"
							 style = "display: block;">
						<div class = "row-fluid ">

							<?php if (!empty($ENVO_HOUSE_TASK_DELAY) && is_array($ENVO_HOUSE_TASK_DELAY) && $ENVO_HOUSE_TASK_DELAY["count_of_task"] > 0) { ?>
								<div id = "tasklist_delayd">

									<?php
									// Loop Array at second item
									foreach (array_slice($ENVO_HOUSE_TASK_DELAY, 1) as $htaskdelay) { ?>

										<div class = "task_<?= $htaskdelay["id"] ?>">
											<div class = "taskheader">
												<span>Task ID <?= $htaskdelay["id"] ?></span>
												<span class = "pull-right collapsetask">+</span>
											</div>
											<div class = "taskinfo">
												<div class = "row m-b-10">
													<div class = "col-sm-2">
														<strong>Bytový dům: </strong>
													</div>
													<div class = "col-sm-10">
														<a href = "<?= $htaskdelay["houseparseurl"] ?>"
															 class = "all-caps"><?= $htaskdelay["housename"] ?></a>
													</div>
												</div>
												<div class = "row">
													<div class = "col-sm-12">
														<div class = "table-responsive">
															<table class = "table table-task">
																<tr>
																	<td class = "col-sm-4"><strong>Titulek: </strong></td>
																	<td class = "col-sm-2"><strong>Priorita: </strong></td>
																	<td class = "col-sm-2"><strong>Status: </strong></td>
																	<td class = "col-sm-2"><strong>Datum Úkolu: </strong></td>
																	<td class = "col-sm-2"><strong>Datum Připomenutí: </strong></td>
																</tr>
																<tr>
																	<td><?= $htaskdelay["title"] ?></td>
																	<td><?= $htaskdelay["priority"] ?></td>
																	<td><?= $htaskdelay["status"] ?></td>
																	<td><?= $htaskdelay["time"] ?></td>
																	<td><?= $htaskdelay["reminder"] ?></td>
																</tr>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div class = "taskcontent">
												<p><strong>Popis Úkolu:</strong></p>
												<div class = "taskdescription">
													<?= $htaskdelay["description"] ?>
												</div>
											</div>
										</div>

									<?php } ?>

								</div>
							<?php } else { ?>

								<div class = "col-md-12">

									<?php
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html -> addDiv('Nejsou dostupné žádné opožděné úkoly.', '', array ('class' => 'alert'));
									?>

								</div>

							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class = "row">
			<div class = "col-sm-12">
				<div class = "grid simple transparent-color"
						 style = "position: static; zoom: 1;">
					<div class = "grid-title">
						<h4><i class = "fas fa-tasks"></i> Seznam <strong>AKTIVNÍCH</strong> úkolů</h4>
						<div class = "tools">
							<a href = "javascript:;"
								 class = "collapse"></a>
							<a href = "javascript:;"
								 class = "remove"></a>
						</div>
					</div>
					<div class = "grid-body no-border"
							 style = "display: block;">
						<div class = "row-fluid ">

							<?php if (!empty($ENVO_HOUSE_TASK) && is_array($ENVO_HOUSE_TASK) && $ENVO_HOUSE_TASK["count_of_task"] > 0) { ?>
								<div id = "tasklist_active">

									<?php
									// Loop Array at second item
									foreach (array_slice($ENVO_HOUSE_TASK, 1) as $htask) { ?>

										<div class = "task_<?= $htask["id"] ?>">
											<div class = "taskheader">
												<span>Task ID <?= $htask["id"] ?></span>
												<span class = "pull-right collapsetask">+</span>
											</div>
											<div class = "taskinfo">
												<div class = "container-fluid">
													<div class = "row m-b-10">
														<div class = "col-sm-2">
															<strong>Bytový dům: </strong>
														</div>
														<div class = "col-sm-10">
															<a href = "<?= $htask["houseparseurl"] ?>"
																 class = "all-caps"><?= $htask["housename"] ?></a>
														</div>
													</div>
													<div class = "row">
														<div class = "col-sm-12">
															<div class = "table-responsive">
																<table class = "table table-task">
																	<tr>
																		<td class = "col-sm-4"><strong>Titulek: </strong></td>
																		<td class = "col-sm-2"><strong>Priorita: </strong></td>
																		<td class = "col-sm-2"><strong>Status: </strong></td>
																		<td class = "col-sm-2"><strong>Datum Úkolu: </strong></td>
																		<td class = "col-sm-2"><strong>Datum Připomenutí: </strong></td>
																	</tr>
																	<tr>
																		<td><?= $htask["title"] ?></td>
																		<td><?= $htask["priority"] ?></td>
																		<td><?= $htask["status"] ?></td>
																		<td><?= $htask["time"] ?></td>
																		<td><?= $htask["reminder"] ?></td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class = "taskcontent">
												<p><strong>Popis Úkolu:</strong></p>
												<div class = "taskdescription">
													<?= $htask["description"] ?>
												</div>
											</div>
										</div>

									<?php } ?>

								</div>
							<?php } else { ?>

								<div class = "col-md-12">

									<?php
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html -> addDiv('Nejsou dostupné žádné aktivní úkoly.', '', array ('class' => 'alert'));
									?>

								</div>

							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if ($ENVO_MODULES_ACCESS) { ?>


		<?php } ?>

	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>