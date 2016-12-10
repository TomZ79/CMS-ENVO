<?php

// MySQLi connection only if we need to
if (!empty($jkv["owldbuser"]) && $jkv["owldbpass"]) {
	$jakdb1 = new jak_mysql($jkv["owldbhost"], $jkv["owldbuser"], $jkv["owldbpass"], $jkv["owldbname"], $jkv["owldbport"]);
	$jakdb1->set_charset("utf8");

	// Get the feedback statistic
	$rowst1 = $jakdb1->queryRow('SELECT COUNT(id) AS total_id, SUM(vote) AS total_vote, DATE(time) AS time FROM '.$jkv["owldbprefix"].'feedbacks');
	$average_vote_owl = round(($rowst1['total_vote'] / $rowst1['total_id']), 2);

	// The last X votes
	$result = $jakdb1->query('SELECT t1.id, t1.name, t1.vote, t1.msg, t1.time, t2.name AS website FROM '.$jkv["owldbprefix"].'feedbacks AS t1 LEFT JOIN '.$jkv["owldbprefix"].'websites AS t2 ON (t1.websiteid = t2.id) ORDER BY t1.id DESC LIMIT '.$jkv["owldblimit"]);
	while ($row = $result->fetch_assoc()) {
		// collect each record into $_data
		$FEEDBACKS_ALL[] = $row;
	}

	// Finally close all db connections
	$jakdb1->jak_close();

} else {

	// Feedback - Owl has been installed on the same domain with a prefix.

	// Get the feedback statistic
	$rowst1 = $jakdb->queryRow('SELECT COUNT(id) AS total_id, SUM(vote) AS total_vote, DATE(time) AS time FROM '.$jkv["owldbprefix"].'feedbacks');
	$average_vote_owl = round(($rowst1['total_vote'] / $rowst1['total_id']), 2);

	// The last X votes
	$result = $jakdb->query('SELECT t1.id, t1.name, t1.vote, t1.msg, t1.time, t2.name AS website FROM '.$jkv["owldbprefix"].'feedbacks AS t1 LEFT JOIN '.$jkv["owldbprefix"].'websites AS t2 ON (t1.websiteid = t2.id) ORDER BY t1.id DESC LIMIT '.$jkv["owldblimit"]);
	while ($row = $result->fetch_assoc()) {
		// collect each record into $_data
		$FEEDBACKS_ALL[] = $row;
	}

}
?>