<?php if (JAK_TAGS && JAK_USER_TAGS && $JAK_GET_TAG_CLOUD) { ?>
	<aside class="nav-side-menu nav-sidebar-inline hidden-xs">

		<div class="right-sidebar">

			<div class="sidebar-inner">
				<h2 class="brand"><?php echo JAK_PLUGIN_NAME_TAGS; ?></h2>

				<ul class="tag-cloud">
					<?php echo $JAK_GET_TAG_CLOUD; ?>
				</ul>

			</div>

		</div>

		<hr>
	</aside>
<?php } ?>