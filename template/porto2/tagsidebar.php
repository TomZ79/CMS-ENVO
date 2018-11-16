<?php if (ENVO_TAGS && ENVO_USER_TAGS && $ENVO_GET_TAG_CLOUD) { ?>

  <aside class="nav-side-menu nav-sidebar-inline hidden-xs">

		<div class="right-sidebar">

			<div class="sidebar-inner">
				<h2 class="brand"><?=ENVO_PLUGIN_NAME_TAGS?></h2>

				<ul class="tag-cloud">
          <?=$ENVO_GET_TAG_CLOUD?>
				</ul>

			</div>

		</div>

		<hr>
	</aside>

<?php } ?>