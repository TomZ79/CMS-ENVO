<?php include_once APP_PATH.'admin/template/header.php';?>

<?php if ($page1 == "s") { ?>
<div class="alert alert-success fade in">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <?php echo $tl["general"]["g7"];?>
</div>
<?php } if ($page1 == "e" || $page1 == "ene") { ?>
<div class="alert alert-danger fade in">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4><?php echo ($page1 == "e" ? $tl["errorpage"]["sql"] : $tl["errorpage"]["not"]);?></h4>
</div>
<?php } ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<div class="box">
<div class="box-body no-padding">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>#</th>
<th><input type="checkbox" id="jak_delete_all" /></th>
<th><?php echo $tlt["st"]["d8"];?> <a class="btn btn-warning btn-xs" href="index.php?p=ticketing&amp;sp=sort&amp;ssp=title&amp;sssp=DESC"><i class="fa fa-arrow-up"></i></a> <a class="btn btn-success btn-xs" href="index.php?p=ticketing&amp;sp=sort&amp;ssp=title&amp;sssp=ASC"><i class="fa fa-arrow-down"></i></a></th>
<th><?php echo $tl["page"]["p1"];?></th>
<th><?php echo $tl["user"]["u2"];?></th>
<th><?php echo $tl["page"]["p2"];?></th>
<th><?php echo $tl["general"]["g56"];?> <a class="btn btn-warning btn-xs" href="index.php?p=ticketing&amp;sp=sort&amp;ssp=hits&amp;sssp=DESC"><i class="fa fa-arrow-up"></i></a> <a class="btn btn-success btn-xs" href="index.php?p=ticketing&amp;sp=sort&amp;ssp=hits&amp;sssp=ASC"><i class="fa fa-arrow-down"></i></a></th>
<th><?php echo $tlt["st"]["d9"];?></th>
<th></th>
<th><button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs"><i class="fa fa-lock"></i></button></th>
<th></th>
<th><button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" onclick="if(!confirm('<?php echo $tlt["st"]["al"];?>'))return false;"><i class="fa fa-trash-o"></i></button></th>
</tr>
</thead>
<?php if (isset($JAK_TICKET_ALL) && is_array($JAK_TICKET_ALL)) foreach($JAK_TICKET_ALL as $v) { ?>
<tr>
<td><?php echo $v["id"];?></td>
<td><input type="checkbox" name="jak_delete_st[]" class="highlight" value="<?php echo $v["id"];?>" /></td>
<td><a href="index.php?p=ticketing&amp;sp=edit&amp;ssp=<?php echo $v["id"];?>"><?php echo $v["title"];?></a><?php if ($v["stprivate"]) { ?> <i class="fa fa-key"></i><?php } ?></td>
<td><?php if ($v["catid"] != '0') { if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach($JAK_CAT as $z) { if ($v["catid"] == $z["id"]) { ?><a href="index.php?p=ticketing&amp;sp=showcat&amp;ssp=<?php echo $z["id"];?>"><?php echo $z["name"];?></a><?php } } } else { ?><?php echo $tl["general"]["g24"];?><?php } ?></td>
<td><a href="index.php?p=ticketing&amp;sp=useronly&amp;ssp=<?php echo $v["userid"];?>"><?php echo $v["username"]; ?></a></td>
<td><?php echo $v["time"]; ?></td>
<td><?php echo $v["hits"];?></td>
<td><?php if ($v["status"] == 0) { ?><?php echo $tlt["st"]["d19"];?><?php } else { ?><?php echo $tlt["st"]["d20"];?><?php } ?></td>
<td><a href="index.php?p=ticketing&amp;sp=email&amp;ssp=<?php echo $v["id"];?>&amp;sssp=<?php echo $v["userid"];?>" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tlt["st"]["ste"];?>'))return false;"><i class="fa fa-envelope-o"></i></a></td>
<td><a href="index.php?p=ticketing&amp;sp=lock&amp;ssp=<?php echo $v["id"];?>" class="btn btn-default btn-xs"><i class="fa fa-<?php if ($v["active"] == '0') { ?>lock<?php } else { ?>check<?php } ?>"></i></a></td>
<td><a href="index.php?p=ticketing&amp;sp=edit&amp;ssp=<?php echo $v["id"];?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a></td>
<td><a href="index.php?p=ticketing&amp;sp=delete&amp;ssp=<?php echo $v["id"];?>" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tlt["st"]["al"];?>'))return false;"><i class="fa fa-trash-o"></i></a></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</div>
</form>

<div class="icon_legend">
<h3><?php echo $tl["icons"]["i"];?></h3>
<i title="<?php echo $tl["icons"]["i4"];?>" class="fa fa-sort"></i>
<i title="<?php echo $tlt["st"]["d34"];?>" class="fa fa-key"></i>
<i title="<?php echo $tlt["st"]["d41"];?>" class="fa fa-envelope-o"></i>
<i title="<?php echo $tl["icons"]["i6"];?>" class="fa fa-check"></i>
<i title="<?php echo $tl["icons"]["i5"];?>" class="fa fa-lock"></i>
<i title="<?php echo $tl["icons"]["i2"];?>" class="fa fa-edit"></i>
<i title="<?php echo $tl["icons"]["i1"];?>" class="fa fa-trash-o"></i>
</div>

<?php if ($JAK_PAGINATE) { echo $JAK_PAGINATE; } ?>

<!-- JavaScript for select all -->

<script type="text/javascript">
		$(document).ready(function()
		{
			$("#jak_delete_all").click(function() {
				var checked_status = this.checked;
				$(".highlight").each(function()
				{
					this.checked = checked_status;
				});
			});					
		});
</script>

		
<?php include_once APP_PATH.'admin/template/footer.php';?>