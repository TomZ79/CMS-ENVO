<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>


	<div class="row mt-4 mb-2">

		<?php if ($ENVO_ACCESS_ANALYTICS) { ?>
			<div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
				<div class="tiles purple">
					<div class="tiles-body">
						<div class="tiles-title"> BYTOVÉ DOMY - ANALÝZA</div>
						<div class="heading">
							<span class="animate-number" data-value="<?= $ENVO_COUNTS_ALL ?>" data-animation-duration="3000" data-toggle="tooltipEnvo" data-placemen="bottom" title="<strong>Celkový počet domů</strong>">0</span>
							<span>/</span>
							<span class="animate-number" data-value="<?= $ENVO_COUNTS_ANALYTICS1 ?>" data-animation-duration="3000" data-toggle="tooltipEnvo" data-placemen="bottom" title="<strong>Počet SVJ</strong><br>Dům MÁ IČ">0</span>
							<span>/</span>
							<span class="animate-number" data-value="<?= $ENVO_COUNTS_ANALYTICS2 ?>" data-animation-duration="3000" data-toggle="tooltipEnvo" data-placemen="bottom" title="<strong>Počet bytových domů</strong><br>Dům NEMÁ IČ">0</span>
						</div>
						<div class="progress transparent progress-small no-radius">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?= $ENVO_PERCENT_ALL ?>"></div>
						</div>
						<div class="description">
							<span class="text-white mini-description ">Počet domů <span class="blend">uložených v databázi</span><br><br></span>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="<?= ($ENVO_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'col-md-4 col-sm-6') ?> spacing-bottom-sm spacing-bottom">
			<div class="tiles blue">
				<div class="tiles-body">
					<div class="tiles-title">BYTOVÉ DOMY V DATABÁZI</div>
					<div class="heading">
						<span class="animate-number" data-value="<?= $ENVO_COUNTS_ALL ?>" data-animation-duration="3000">0</span>
					</div>
					<div class="progress transparent progress-small no-radius">
						<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?= $ENVO_PERCENT_ALL ?>"></div>
					</div>
					<div class="description">
						<span class="text-white mini-description ">Počet domů <span class="blend">v databázi</span><br><br></span>
					</div>
				</div>
			</div>
		</div>
		<div class="<?= ($ENVO_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'col-md-4 col-sm-6') ?> spacing-bottom-sm spacing-bottom">
			<div class="tiles green">
				<div class="tiles-body">
					<div class="tiles-title">AKTIVNÍ ÚKOLY</div>
					<div class="heading">
						<span class="animate-number" data-value="<?= $ENVO_TASK_COUNTS ?>" data-animation-duration="3000">0</span>
					</div>
					<div class="progress transparent progress-small no-radius">
						<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?= $ENVO_TASK_PERCENT ?>"></div>
					</div>
					<div class="description">
						<span class="text-white mini-description ">Počet aktivních <span class="blend">úkolů</span> <br>Úkoly v termínu</span>
					</div>
				</div>
			</div>
		</div>
		<div class="<?= ($ENVO_ACCESS_ANALYTICS ? 'col-md-3 col-sm-6' : 'col-md-4 col-sm-6') ?> spacing-bottom">
			<div class="tiles red">
				<div class="tiles-body">
					<div class="tiles-title">OPOŽDĚNÉ ÚKOLY</div>
					<div class="heading">
						<span class="animate-number" data-value="<?= $ENVO_TASK_DELAY_COUNTS ?>" data-animation-duration="3000">0</span>
					</div>
					<div class="progress transparent progress-small no-radius">
						<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?= $ENVO_TASK_DELAY_PERCENT ?>"></div>
					</div>
					<div class="description">
						<span class="text-white mini-description ">Počet opožděných <span class="blend">úkolů</span> <br>Úkoly po termínu</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col col-sm-12">
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Seznam <strong>OPOŽDĚNÝCH</strong> úkolů</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">

					<?php if (!empty($ENVO_HOUSE_TASK_DELAY) && is_array($ENVO_HOUSE_TASK_DELAY) && $ENVO_HOUSE_TASK_DELAY["count_of_task"] > 0) { ?>

						<div id="tasklist_delayd">

							<?php
							// Loop Array at second item
								foreach (array_slice($ENVO_HOUSE_TASK_DELAY, 1) as $htaskdelay) { ?>

								<div class="task_<?= $htaskdelay["id"] ?>">
									<div class="taskheader bg-slate">
										<span>Task ID <?= $htaskdelay["id"] ?></span>
										<span class="float-right collapsetask">+</span>
									</div>
									<div class="taskinfo">
										<div class="row m-b-10">
											<div class="col-sm-2">
												<strong>Bytový dům: </strong>
											</div>
											<div class="col-sm-10">
												<a href="<?= $htaskdelay["houseparseurl"] ?>" class="font-weight-semibold all-caps"><?= $htaskdelay["housename"] ?></a>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-xs table-task">
												<thead>
												<tr>
													<th>Titulek</th>
													<th>Priorita</th>
													<th>Status</th>
													<th>Datum Úkolu</th>
													<th>Datum Připomenutí</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td><?= $htaskdelay["title"] ?></td>
													<td><?= $htaskdelay["priority"] ?></td>
													<td><?= $htaskdelay["status"] ?></td>
													<td><?= $htaskdelay["time"] ?></td>
													<td><?= $htaskdelay["reminder"] ?></td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="taskcontent alpha-slate">
										<p><strong>Popis Úkolu:</strong></p>
										<div class="taskdescription">
											<?= $htaskdelay["description"] ?>
										</div>
									</div>
								</div>

							<?php } ?>

						</div>

					<?php } else { ?>

						<?php
						// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
						echo $Html -> addDiv('Nejsou dostupné <strong>žádné</strong> opožděné úkoly.', '', array ('class' => 'alert border-0 text-orange-800 alpha-orange'));
						?>

					<?php } ?>

				</div>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col col-sm-12">
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Seznam <strong>AKTIVNÍCH</strong> úkolů</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">

					<?php if (!empty($ENVO_HOUSE_TASK) && is_array($ENVO_HOUSE_TASK) && $ENVO_HOUSE_TASK["count_of_task"] > 0) { ?>

						<div id="tasklist_active">

							<?php
							// Loop Array at second item
							foreach (array_slice($ENVO_HOUSE_TASK, 1) as $htask) { ?>

								<div class="task_<?= $htask["id"] ?>">
									<div class="taskheader bg-slate">
										<span>Task ID <?= $htask["id"] ?></span>
										<span class="float-right collapsetask">+</span>
									</div>
									<div class="taskinfo">
										<div class="container-fluid">
											<div class="row m-b-10">
												<div class="col-sm-2">
													<strong>Bytový dům: </strong>
												</div>
												<div class="col-sm-10">
													<a href="<?= $htask["houseparseurl"] ?>" class="font-weight-semibold all-caps"><?= $htask["housename"] ?></a>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-xs table-task">
													<thead>
													<tr>
														<th>Titulek</th>
														<th>Priorita</th>
														<th>Status</th>
														<th>Datum Úkolu</th>
														<th>Datum Připomenutí</th>
													</tr>
													</thead>
													<tbody>
													<tr>
														<td><?= $htask["title"] ?></td>
														<td><?= $htask["priority"] ?></td>
														<td><?= $htask["status"] ?></td>
														<td><?= $htask["time"] ?></td>
														<td><?= $htask["reminder"] ?></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="taskcontent alpha-slate">
										<p><strong>Popis Úkolu:</strong></p>
										<div class="taskdescription">
											<?= $htask["description"] ?>
										</div>
									</div>
								</div>

							<?php } ?>

						</div>

					<?php } else { ?>

						<?php
						// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
						echo $Html -> addDiv('Nejsou dostupné <strong>žádné</strong> opožděné úkoly.', '', array ('class' => 'alert border-0 text-orange-800 alpha-orange'));
						?>

					<?php } ?>

				</div>
			</div>

		</div>
	</div>

<?php if ($ENVO_MODULES_ACCESS) { ?>


<?php } ?>


<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>