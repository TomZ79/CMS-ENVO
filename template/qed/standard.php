<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

<?php if ($PAGE_ACTIVE) { ?>
	<div class="alert bg-danger">
		<?php echo $tl["general_error"]["generror2"]; ?>
	</div>

<?php }
echo $PAGE_CONTENT; ?>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>