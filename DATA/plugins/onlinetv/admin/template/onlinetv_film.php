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
	echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film&amp;ssp=newfilm', 'Nový Film', '', 'btn btn-info button');
	?>

</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Live <strong>vyhledávání</strong>
					<br class="d-block d-sm-none"/> (podle názvu filmu, herce, režiséra)</h5>
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
								<label class="col-form-label col-lg-2"></label>
								<div class="col-lg-10">
									<div class="input-group">
										<input name="searchtext" type="text" class="form-control" placeholder="Zadejte název filmu, herce, režiséra">
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
						echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film&amp;ssp=filmlist', 'Zobrazit vše', '', 'btn btn-block btn btn-success');
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
