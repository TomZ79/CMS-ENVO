<?php include_once APP_PATH.'admin/template/header.php';?>

<?php if ($page1 == "s") { ?>
<div class="alert alert-success fade in">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <?php echo $tl["general"]["g7"];?>
</div>
<?php } if ($page1 == "e") { ?>
<div class="alert alert-danger fade in">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <?php echo $tl["errorpage"]["sql"];?>
</div>
<?php } ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title"><?php echo $tl["title"]["t4"];?></h3>
  	</div><!-- /.box-header -->
  	<div class="box-body">
		<table class="table table-striped">
		<tr>
			<td><?php echo $tl["page"]["p"];?></td>
			<td><?php include_once APP_PATH."admin/template/title_edit.php";?></td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="text" name="jak_host" value="<?php echo $jkv["owldbhost"];?>" placeholder="localhost">
			</div>
			</td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s1"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="text" name="jak_port" value="<?php echo $jkv["owldbport"];?>" placeholder="3306">
			</div>
			</td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s2"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="text" name="jak_user" value="<?php echo $jkv["owldbuser"];?>">
			</div>
			</td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s3"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="password" name="jak_pass" value="<?php echo $jkv["owldbpass"];?>">
			</div>
			</td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s4"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="text" name="jak_dbname" value="<?php echo $jkv["owldbname"];?>">
			</div>
			</td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s5"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="text" name="jak_prefix" value="<?php echo $jkv["owldbprefix"];?>">
			</div>
			</td>
		</tr>
		<tr>
			<td><?php echo $tlowl["owl"]["s6"];?></td>
			<td>
			<div class="form-group">
				<input class="form-control" type="number" name="jak_limit" value="<?php echo $jkv["owldblimit"];?>">
			</div>
			</td>
		</tr>

		</table>
	</div>
	<div class="box-footer">
	  	<button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"];?></button>
	</div>
</div>
	
</form>
		
<?php include_once APP_PATH.'admin/template/footer.php';?>