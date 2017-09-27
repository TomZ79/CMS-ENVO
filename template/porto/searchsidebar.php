<?php if (ENVO_SEARCH && ENVO_USER_SEARCH && $page != 'search') { ?>
	<aside class="nav-sidebar hidden-xs">
		<h4 class="brand"><?php echo $tl["title_sidebar"]["tsid"]; ?></h4>

		<form id="ajaxsearchForm" action="<?php echo $P_SEAERCH_LINK; ?>" method="post">
			<div class="input-group">
				<input type="text" name="envoSH" id="Jajaxs" class="form-control" placeholder="<?php echo $tl["placeholder"]["plc"];
				if ($jkv["fulltextsearch"]) echo $tl["placeholder"]["plc1"]; ?>">
			      <span class="input-group-btn">
			        <button type="submit" class="btn btn-color" name="search" id="JajaxSubmitSearch"><?php echo $tl["button"]["btn4"]; ?></button>
			      </span>
			</div><!-- /input-group -->
			<?php if ($jkv["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
				<input type="hidden" name="SearchWhere[]" value="<?php echo $AJAX_SEARCH_PLUGIN_WHERE; ?>"/>
			<?php } ?>
		</form>

		<?php if ($jkv["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
			<div class="row">
				<div class="col-xs-5">
					<div class="hideAdvSearchResult"><a class="btn btn-default btn-xs" href="<?php echo $P_SEAERCH_LINK; ?>"><i
								class="fa fa-search"></i> <?php echo $tl["searching"]["stxt10"]; ?></a></div>
				</div>
				<div class="col-xs-5">
					<div class="hideSearchResult"><a class="btn btn-warning btn-xs" href="javascript:void(0)"><i
								class="fa fa-remove"></i> <?php echo $tl["searching"]["stxt11"]; ?></a></div>
				</div>
				<div class="col-xs-2">
					<div class="loadSearchResult"><i class="fa fa-spinner fa-pulse"></i></div>
				</div>
			</div>
		<?php }
		if (isset($ENVO_HOOK_SEARCH_SIDEBAR) && is_array ($ENVO_HOOK_SEARCH_SIDEBAR)) foreach ($ENVO_HOOK_SEARCH_SIDEBAR as $hss) {
			include_once $hss;
		} ?>

		<!-- AJAX Search Result -->
		<div id="ajaxsearchR"></div>

		<hr>

	</aside>

<?php } ?>