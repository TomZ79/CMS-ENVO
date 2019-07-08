<?php
/*
 * PLUGIN DOWNLOAD - ALL VALUE for FRONTEND - download.php
 * ------------------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - download.php
 * ------------------------------------------------------------------
 *
 * $ENVO_DOWNLOAD_ALL = pole s daty
 * foreach ($ENVO_DOWNLOAD_ALL as $v) = získání jednotlivých dat z pole
 *
 * $v["id"]               number		|	- ID souboru
 * $v["catid"] 		  			number		|	- ID categorie(í)
 * $v["title"]						string		|	- Titulek souboru
 * $v["content"]					string		|	- Celý popis souboru
 * $v["contentshort"]		  string		|	- Zkrácený popis souboru
 * $v["file"]		          string		|	- Url cesta k souboru
 * $v["extfile"]	    	  string		|	- Url cesta k souboru
 * $v["countdl"]	    	  number		|	- Počet stažení
 * $v["showtitle"]				number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["showdate"]				  number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["created"]					date			| - Datum vytvoření
 * $v["hits"]						  number		|	- Počet zobrazení
 * $v["previmg"]          string		| - Náhledový obrázek
 * $v["parseurl"]         string		| - Parsovaná url adresa
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=setting';

?>

<?php if ($setting["downloadlivesearch"]) { ?>
	<div class="row mb-4">
		<div class="col">
			<div class="searchbox-title">
				<h4 class="text-right mb-0">Live Search</h4>
				<h6 class="text-right text-muted">(rychlé vyhledávání)</h6>
			</div>
			<div class="searchbox" style="position: relative;">
				<div class="input-group">
					<input type="text" class="form-control" id="ajaxlivesearch" autocomplete="off" placeholder="Zadejte hledaný název ..." data-articleid="" data-articlevarname="" style="border-radius: 0">
					<div class="input-group-append">
						<button type="button" id="ajaxliveshow" class="btn btn-light text-1 text-uppercase" style="border-radius: 0">Zobrazit</button>
					</div>
				</div>
				<div id="searchresult" style="display: none;border: 3px solid rgba(0, 0, 0, 0.09);z-index: 1000;position: absolute;background: white;width: 100%;border-radius: 0;border-top: none;background-color: #F5F5F5;"></div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) { ?>

	<div class="col-sm-12">
		<table class="table table-sm">
			<thead>
			<tr>
				<th class="col-sm-9">Název</th>
				<th class="col-sm-3 text-center">Datum vložení</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($ENVO_DOWNLOAD_ALL as $v) { ?>
				<tr>
					<td><?= envo_extension_icon($v["extfile"]) ?>
						<a href="<?= $v["parseurl"] ?>"><?= envo_cut_text($v["title"], 40, "") ?></a></td>
					<td class="text-center">
						<?php if ($v["showdate"]) echo $v["created"]; ?>
					</td>
				</tr>
			<?php } ?>

			</tbody>
		</table>
	</div>

<?php } else { ?>

	<div class="col-sm-12">
		<div class="alert bg-info text-white"><i class="fas fa-exclamation-circle mr-2"></i> <?= $tld["downl_frontend"]["downl17"] ?>
		</div>
	</div>

<?php } ?>

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>