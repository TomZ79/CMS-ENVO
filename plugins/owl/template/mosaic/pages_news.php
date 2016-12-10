<?php

// Connect to the external database or pull the data from the same database with a prefix.
include_once APP_PATH.'plugins/owl/db_connect.php';

?>

<hr>
<h3 class="text-color"><?php echo $jkv["owltitle"];?></h3>

<p>Average Vote: <?php echo $average_vote_owl;?> / 5</p>

<div class="row">
	<?php if (isset($FEEDBACKS_ALL) && is_array($FEEDBACKS_ALL)) foreach($FEEDBACKS_ALL as $v) { ?>
	<div class="col-md-4">
		<div class="service-wrapper">
			<h2><?php echo $v["name"];?></a></h2>
			<p><?php
				for($i = 0; $i < $v["vote"]; $i++) {
	  				echo '<i class="fa fa-star fa-2x"></i>';
				}
				for($i = 0; $i < (5 - $v["vote"]); $i++) {
				  echo '<i class="fa fa-star-o fa-2x"></i>';
				}
			?></p>
			<p><?php echo $v["msg"];?></p>
			<p><i class="fa fa-globe"></i> <?php echo $v["website"];?></p>
			<p><i class="fa fa-clock-o"></i> <?php echo JAK_base::jakTimesince($v["time"], $jkv["dateformat"], $jkv["timeformat"], $tl['general']['g56']);?></p>
		</div>
	</div>
	<?php } ?>
</div>