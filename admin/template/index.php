<?php include "header.php"; ?>

	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-12">
			<!-- small box -->
			<div class="dashboard-box bg-success">
				<div class="inner">
					<h3><?php echo $totalhits; ?></h3>
					<p><?php echo $tl["dashb_box_stats"]["dbbs1"]; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-bar-chart"></i>
				</div>
				<a href="index.php?p=page" class="dashboard-box-footer">
					<?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-12">
			<!-- small box -->
			<div class="dashboard-box bg-complete-dark">
				<div class="inner">
					<h3><?php echo $JAK_COUNTS["searchClog"]; ?></h3>
					<p><?php echo $tl["dashb_box_stats"]["dbbs2"]; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-search"></i>
				</div>
				<a href="index.php?p=searchlog" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
					<i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-12">
			<!-- small box -->
			<div class="dashboard-box bg-warning">
				<div class="inner">
					<h3><?php echo $JAK_COUNTS["pluginCtotal"]; ?></h3>
					<p><?php echo $tl["dashb_box_stats"]["dbbs3"]; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-plug"></i>
				</div>
				<a href="index.php?p=plugins" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
					<i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-12">
			<!-- small box -->
			<?php if (JAK_TAGS) { ?>
				<div class="dashboard-box bg-danger">
					<div class="inner">
						<h3><?php echo $JAK_COUNTS["tagsCtotal"]; ?></h3>
						<p><?php echo $tl["dashb_box_stats"]["dbbs4"]; ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-tags"></i>
					</div>
					<a href="index.php?p=tags" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
						<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			<?php } else { ?>
				<div class="dashboard-box bg-info">
					<div class="inner">
						<h3><?php echo $JAK_COUNTS["hookCtotal"]; ?></h3>
						<p><?php echo $tl["dashb_box_stats"]["s7"]; ?></p>
					</div>
					<div class="icon">
						<i class="fa fa-flash"></i>
					</div>
					<a href="index.php?p=plugins&sp=hooks" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
						<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			<?php } ?>
		</div>
	</div>

	<div class="row padding-15">
		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header">
					<i class="fa fa-paperclip"></i>
					<h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt1"]; ?></h3>
				</div>
				<div class="box-body">
					<ul class="todoList">
						<?php if (isset($todos) && is_array ($todos)) foreach ($todos as $item) {
							echo $item;
						} ?>
					</ul>
				</div>
				<div class="box-footer clearfix no-border">
					<a id="addButton" class="btn btn-default btodo pull-right" href="#"><?php echo $tl["button"]["btn"]; ?></a>
				</div>
			</div>
			<div class="box box-success">
				<div class="box-header">
					<i class="fa fa-pie-chart"></i>
					<h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt2"]; ?></h3>
				</div>
				<div class="box-body no-padding table-responsive">
					<div id="chart_total" class="charts"></div>
				</div>
			</div>
			<?php if (isset($JAK_HOOK_ADMIN_INDEX) && is_array ($JAK_HOOK_ADMIN_INDEX)) foreach ($JAK_HOOK_ADMIN_INDEX as $hspi) {
				include_once APP_PATH . $hspi['phpcode'];
			} ?>
		</div>
		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header">
					<i class="fa fa-info-circle"></i>
					<h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt4"]; ?></h3>
				</div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped first-column">
							<tr>
								<td><?php echo $tl["dashb_box_content"]["dbbc6"]; ?></td>
								<td><?php echo $jkv["version"]; ?></td>
							</tr>
							<tr>
								<td><?php echo $tl["dashb_box_content"]["dbbc7"]; ?></td>
								<td><a href="http://www.bluesat.cz" target="_blank">BLUESAT</a></td>
							</tr>
							<tr>
								<td><?php echo $tl["dashb_box_content"]["dbbc8"]; ?></td>
								<td>Tomas Zukal</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row padding-15 m-t-30">
		<div class="container-fluid">
			<div class="text-center">
				<p>
					<span><strong><?php echo $tl["dashb_box_content"]["dbbc"]; ?> : </strong><?php echo $WEBS; ?> | </span>
					<span><strong><?php echo $tl["dashb_box_content"]["dbbc1"]; ?> : </strong><?php echo $PHPV; ?> | </span>
					<span><strong><?php echo $tl["dashb_box_content"]["dbbc2"]; ?> : </strong><?php echo $POSTM; ?> | </span>
					<span><strong><?php echo $tl["dashb_box_content"]["dbbc3"]; ?> : </strong><?php echo $MEML; ?> | </span>
					<span><strong><?php echo $tl["dashb_box_content"]["dbbc4"]; ?> : </strong><?php echo $MYV; ?> | </span>
					<span><strong><?php echo $tl["dashb_box_content"]["dbbc5"]; ?> : </strong><?php echo $SRVIP; ?></span>

				</p>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

<?php include "footer.php"; ?>