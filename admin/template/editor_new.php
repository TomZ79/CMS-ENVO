<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $tl["global_text"]["globaltxt1"]; ?></h3>
	</div>
	<div class="box-body">
		<table class="table table-striped">
			<tr>
				<td>
					<?php if ($jkv["adv_editor"]) { ?>
						<div id="cover">
							<div class="cover-header">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?ty e=0&editor=mce_0&lang=eng&fldr=&field_id=htmleditor" class="btn btn-primary btn-xs ifManager" title="Show Filemanager">
									<i class="fa fa-files-o"></i>
								</a>
								<a href="#" id="resizeContainer" class="btn btn-primary btn-xs" title="<?php echo $tl["global_text"]["globaltxt4"]; ?>"><?php echo $tl["global_text"]["globaltxt4"]; ?></a>
								<a href="#" id="resizeContainerAndEditor" class="btn btn-primary btn-xs" title="<?php echo $tl["global_text"]["globaltxt5"]; ?>"><?php echo $tl["global_text"]["globaltxt5"]; ?></a>
							</div>
							<div id="editorContainer">
								<div id="htmleditor"></div>
							</div>
						</div>

						<?php
						// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
						echo $htmlE->addTextArea ('jak_content', '', '', $_REQUEST["jak_content"], array ('id' => 'jak_editor', 'class' => 'form-control hidden'));
						?>

					<?php } else {

						// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
						echo $htmlE->addTextArea ('jak_content', '40', '', $_REQUEST["jak_content"], array ('id' => 'jak_editor', 'class' => 'form-control jakEditor'));

					 } ?>
				</td>
			</tr>
		</table>
	</div>
	<div class="box-footer">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
		echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
		?>

	</div>
</div>
<style type="text/css">
	#editorContainer {
		height: 500px;
		position: relative;
	}

	#htmleditor {
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
	}

	#cover.active {
		position: fixed;
		top: 0;
		left: 0;
		background: #f4f4f4;
		z-index: 1050;
		width: 100%;
		height: 100%;
		padding: 40px;
	}

	.cover-header {
		background: #ddd;
		padding: 10px;
		margin-bottom: 10px;
	}
</style>
<script type="text/javascript">
	var clicked = false;
	var resizeFirstEditor = function (resizeEditor) {
		var MeContainer = document.getElementById('cover');
		var feContainer = document.getElementById('editorContainer');

		MeContainer.classList.toggle("active");
		clicked = !clicked;
		if (resizeEditor) {
			editor.resize();
		}
	};

	var btn = document.getElementById('resizeContainer');
	btn.addEventListener('click', function () {
		resizeFirstEditor();
	});
	var btn = document.getElementById('resizeContainerAndEditor');
	btn.addEventListener('click', function () {
		resizeFirstEditor(true);
	});
</script>