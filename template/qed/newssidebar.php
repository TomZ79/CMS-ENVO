<?php if (defined ("JAK_PLUGIN_NAME_NEWS") && $JAK_GET_NEWS_SORTED) { ?>
	<aside class="nav-sidebar hidden-xs">
		<h4 class="brand"><?php echo JAK_PLUGIN_NAME_NEWS; ?></h4>

		<div class="sidebar-list">
			<ul class="sidebar-content">
				<?php if (isset($JAK_GET_NEWS_SORTED) && is_array ($JAK_GET_NEWS_SORTED)) foreach ($JAK_GET_NEWS_SORTED as $n) { ?>
					<li>
						<a href="<?php echo $n["parseurl"]; ?>" title="<?php echo $n["contentshort"]; ?>">
							<?php echo envo_cut_text ($n["title"], 30, "..."); ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>

		<hr>
	</aside>
<?php } ?>

