<?php if (ENVO_SEARCH && ENVO_USER_SEARCH) { ?>

	<h3><?php echo $tl["title_sidebar"]["tsid"]; ?></h3>

	<form class="form-search" action="<?php echo $P_SEAERCH_LINK; ?>" method="post">
		<div class="input-group">
			<input type="text" name="envoSH" id="Jajaxs" class="form-control search-query"
				placeholder="<?php echo $tl["placeholder"]["plc"];
				if ($setting["fulltextsearch"]) echo $tl["placeholder"]["plc1"]; ?>">
		    <span class="input-group-btn">
		    	<button type="submit" class="btn btn-default" name="search"><?php echo $tl["general"]["g83"]; ?></button>
		    </span>
		</div>

	</form>

	<?php if (isset($ENVO_HOOK_SEARCH_SIDEBAR) && is_array ($ENVO_HOOK_SEARCH_SIDEBAR)) foreach ($ENVO_HOOK_SEARCH_SIDEBAR as $hss) {
		include_once $hss;
	}
} ?>