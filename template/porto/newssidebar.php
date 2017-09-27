<?php if (defined ("ENVO_PLUGIN_NAME_NEWS") && $ENVO_GET_NEWS_SORTED) { ?>

	<aside class="nav-side-menu nav-sidebar hidden-xs">

		<div class="right-sidebar">

			<div class="sidebar-inner">
				<h2 class="brand"><?php echo ENVO_PLUGIN_NAME_NEWS; ?></h2>

				<?php if (isset($ENVO_GET_NEWS_SORTED) && is_array ($ENVO_GET_NEWS_SORTED)) foreach ($ENVO_GET_NEWS_SORTED as $n) { ?>
					<div class="recent-post">
						<p><span><?php echo $n["created"]; ?></span></p>
						<h3>
							<a href="<?php echo $n["parseurl"]; ?>" title="<?php echo $n["contentshort"]; ?>">
								<?php echo envo_cut_text ($n["title"], 30, "..."); ?>
							</a>
						</h3>

					</div>
				<?php } ?>

			</div>

		</div>

		<hr>
	</aside>

<?php } ?>

