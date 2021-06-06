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
		echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=newhouse', 'Nový Dům', '', 'btn btn-info button');
		?>

	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Live <strong>vyhledávání</strong>
						<br class="d-block d-sm-none"/> (podle názvu nebo IČ bytového domu)</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">
					<div class="row">
						<div class="col-12 col-sm-12">
							<form method="post" action="index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=livesearch">
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Bytový dům</label>
									<div class="col-lg-10">
										<div class="input-group">
											<input name="searchtext" type="text" class="form-control" placeholder="Zadejte ulici, č.p., č.o nebo identifikační číslo subjektu (IČ)">
											<span class="input-group-append">
										<button class="btn btn btn-success" type="submit">Vyhledat</button>
									</span>
										</div>
									</div>
								</div>
							</form>
							<p><strong>Nápověda: </strong>Pro vyhledání záznamu lze použít jen část slova např:
								<code>kru</code> vyhledá všechny záznamy obsahující tyto písmena. Dále je možné vyhledat podle záznam podle více slov, které můžeme oddělit
								<code>,</code> <code>, mezera</code> <code>|</code> <code>:</code> <code>+</code> <code>-</code>
								<code> mezera</code> např: <code>kru,20</code> vyhledá všechny záznamy obsahující tyto písmena a číslo.
							</p>
							<p>Pokud je zadáno IČ v kombinaci s dalšími slovy nebo číslicemi, má přednost pro vyhledávání pouze IČ.</p>
						</div>
					</div>
				</div>
			</div>
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
							echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist', 'Zobrazit vše', '', 'btn btn-block btn btn-success');
							?>

						</div>
						<div class="col-sm-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Podle měst</h6>
							<div class="form-group form-group-lg m-0 selectpicker2parent">
								<select class="form-control selectpicker2" data-placeholder="Výběr města" data-search-select2="true" onchange="location = this.value;">

									<?php
									// First blank option
									// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
									echo $Html -> addOption();
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=1', 'Abertamy');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=3', 'Bečov nad Teplou');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=4', 'Bochov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=6', 'Božičany');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=5', 'Boží Dar');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=8', 'Březová u KV');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=10', 'Chyše');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=11', 'Čichalov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=13', 'Dalovice');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=14', 'Děpoltovice');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=16', 'Hájek');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=20', 'Hroznětín');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=18', 'Hory');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=21', 'Jáchymov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=22', 'Jenišov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=23', 'Karlovy Vary');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=25', 'Krásné Údolí');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=27', 'Kyselka');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=28', 'Merklín');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=30', 'Nejdek');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=31', 'Nová Role');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=83', 'Nové Sedlo');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=33', 'Ostrov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=34', 'Otovice');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=36', 'Pernink');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=38', 'Pšov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=40', 'Sadov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=88', 'Sokolov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=42', 'Stanovice');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=44', 'Stružná');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=43', 'Stráž nad Ohří');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=46', 'Štědrá');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=48', 'Toužim');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=49', 'Útvina');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=50', 'Valeč');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=51', 'Velichov');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=52', 'Verušičky');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=54', 'Vrbice');
									echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=city&amp;id=56', 'Žlutice');
									?>

								</select>
							</div>
						</div>
						<div class="col-sm-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Podle Správy</h6>
							<div class="form-group form-group-lg m-0 selectpicker2parent">
								<select class="form-control selectpicker2" data-placeholder="Výběr správce" data-search-select2="true" onchange="location = this.value;">

									<?php
									// First blank option
									// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
									echo $Html -> addOption();

									if (isset($ENVO_MANAGEMENT) && is_array($ENVO_MANAGEMENT)) foreach ($ENVO_MANAGEMENT as $m) {

										echo $Html -> addOption('index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=estatemanagement&amp;id=' . $m["id"], $m["name"]);

									}
									?>

								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Vyhledávání <strong>podle zvoleného filtru</strong></h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">
					<div class="row">
						<div class="col-12 col-sm-12">
							<form method="post" action="index.php?p=intranet2&amp;sp=house&amp;ssp=houselist&amp;sssp=filtersearch">
								<div class="row mb-3">
									<div class="col-sm-3 mb-3 mb-sm-0">
										<h6 class="font-weight-bold">Výběr města</h6>
										<div class="form-group form-group-lg m-0 selectpicker2parent">
											<select name="envo_filtercity" class="form-control selectpicker2" data-placeholder="Výběr města" data-search-select2="true">

												<?php
												// First blank option
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html -> addOption();
												echo $Html -> addOption('1', 'Abertamy');
												echo $Html -> addOption('3', 'Bečov nad Teplou');
												echo $Html -> addOption('4', 'Bochov');
												echo $Html -> addOption('6', 'Božičany');
												echo $Html -> addOption('5', 'Boží Dar');
												echo $Html -> addOption('8', 'Březová u KV');
												echo $Html -> addOption('10', 'Chyše');
												echo $Html -> addOption('11', 'Čichalov');
												echo $Html -> addOption('13', 'Dalovice');
												echo $Html -> addOption('14', 'Děpoltovice');
												echo $Html -> addOption('16', 'Hájek');
												echo $Html -> addOption('20', 'Hroznětín');
												echo $Html -> addOption('18', 'Hory');
												echo $Html -> addOption('21', 'Jáchymov');
												echo $Html -> addOption('22', 'Jenišov');
												echo $Html -> addOption('23', 'Karlovy Vary');
												echo $Html -> addOption('25', 'Krásné Údolí');
												echo $Html -> addOption('27', 'Kyselka');
												echo $Html -> addOption('28', 'Merklín');
												echo $Html -> addOption('30', 'Nejdek');
												echo $Html -> addOption('31', 'Nová Role');
												echo $Html -> addOption('83', 'Nové Sedlo');
												echo $Html -> addOption('33', 'Ostrov');
												echo $Html -> addOption('34', 'Otovice');
												echo $Html -> addOption('36', 'Pernink');
												echo $Html -> addOption('38', 'Pšov');
												echo $Html -> addOption('40', 'Sadov');
												echo $Html -> addOption('88', 'Sokolov');
												echo $Html -> addOption('42', 'Stanovice');
												echo $Html -> addOption('44', 'Stružná');
												echo $Html -> addOption('43', 'Stráž nad Ohří');
												echo $Html -> addOption('46', 'Štědrá');
												echo $Html -> addOption('48', 'Toužim');
												echo $Html -> addOption('49', 'Útvina');
												echo $Html -> addOption('50', 'Valeč');
												echo $Html -> addOption('51', 'Velichov');
												echo $Html -> addOption('52', 'Verušičky');
												echo $Html -> addOption('54', 'Vrbice');
												echo $Html -> addOption('56', 'Žlutice');
												?>

											</select>
										</div>
									</div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<h6 class="font-weight-bold">Zadání vyhledávacích kritérií
											<small>(Mysql kód)</small>
										</h6>
										<div class="row">
											<div class="col col-sm-4">
												<div class="form-group form-group-lg m-0 selectpicker2parent">
													<select name="envo_filtercondition" class="form-control selectpicker2" data-placeholder="Výběr podmínky">

														<?php
														// First blank option
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														echo $Html -> addOption('WHERE', 'WHERE');
														?>

													</select>
												</div>
											</div>
											<div class="col col-sm-4">
												<div class="form-group form-group-lg m-0 selectpicker2parent">
													<select name="envo_filtercolumn" class="form-control selectpicker2" data-placeholder="Výběr sloupce">

														<?php
														// First blank option
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														echo $Html -> addOption('t1.maingpsstreet', 'maingpsstreet');
														echo $Html -> addOption('t1.maingpscity', 'maingpscity');
														echo $Html -> addOption('t1.maingpslat', 'maingpslat');
														echo $Html -> addOption('t1.maingpslng', 'maingpslng');
														echo $Html -> addOption('t1.housedescription', 'housedescription');
														?>

													</select>
												</div>
											</div>
											<div class="col col-sm-4">
												<div class="form-group form-group-lg m-0 selectpicker2parent">
													<select name="envo_filtervalue" class="form-control selectpicker2" data-placeholder="Výběr hodnoty">

														<?php
														// First blank option
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														echo $Html -> addOption('IS NULL', 'IS NULL');
														echo $Html -> addOption('IS NOT NULL', 'IS NOT NULL');
														?>

													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3 mb-3 mb-sm-0">

									</div>
								</div>
								<div class="row">
									<div class="col-12 col-sm-12">

										<?php
										// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
										echo $Html -> addButtonSubmit('', 'Vyhledat', '', 'btn btn-success float-right');
										?>

									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>