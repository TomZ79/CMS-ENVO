<?php

// Found on http://maxmorgandesign.com/simple_php_auto_update_system/ modified for CMS
// If not super admin...
if (!ENVO_SUPERADMINACCESS) die();

if (isset($_GET['check']) && $_GET['check'] == true) {

ini_set('max_execution_time',60);

$updated = $found = false;

function Request_Curl($url) {
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($c);
	curl_close($c);
	return $data;
}

function remoteFileExists($url) {
	$curl = curl_init($url);
	//don't fetch the actual page, you only want to check the connection is ok
	curl_setopt($curl, CURLOPT_NOBODY, true);
	//do request
	$result = curl_exec($curl);
	$ret = false;
	//if request did not fail
	if ($result !== false) {
		//if request was ok, check response code
		$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ($statusCode == 200) {
			$ret = true;
		}
	}
	curl_close($curl);
	return $ret;
}

// Check For An Update
$getVersions = Request_Curl('http://www.bluesat.cz/download/current-release-versions.php');

if ($getVersions != '') {
	echo '<p>Reading Current Releases List</p>';
	$versionList = explode(" ", $getVersions);

	foreach ($versionList as $aV) {

		if ($aV > $jkv["version"]) {
			echo '<p>Found new update: '.$aV.'</p>';
			$found = true;

			$dlpackage = str_replace(".", "_", $aV);

			echo '<p><strong>CONTROL of PATHS</strong></p>';
			echo '<p>Basic path: '.APP_PATH.'</p>';
			echo '<p>Updated folder + file : '.ENVO_FILES_DIRECTORY.'/updates/part_cms_'.$dlpackage.'.zip</p>';
			$foundfilename = APP_PATH.ENVO_FILES_DIRECTORY.'/updates/part_cms_'.$dlpackage.'.zip';
			echo '<p>Full path: '.$foundfilename.'</p>';

			// Download the file if we have to
			if (!is_file($foundfilename)) {
				echo '<p><strong>TEST of FILES</strong></p>';
				echo '<p>Test if file exist on site www.bluesat.cz</p>';

				/* You can test a URL like this (sample) */
				$exists = remoteFileExists('http://www.bluesat.cz/download/part_cms_'.$dlpackage.'.zip');
				if ($exists) {
					// Remote file exist
					echo '<p>File exist on site www.bluesat.cz</p>';
					echo '<p><strong>DOWNLOADING FILES</strong></p>';
					echo '<p>Downloading New Update ......</p>';
					$newUpdate = Request_Curl('http://www.bluesat.cz/download/part_cms_'.$dlpackage.'.zip');
					if (!is_dir(APP_PATH.ENVO_FILES_DIRECTORY.'/updates/')) mkdir(APP_PATH.ENVO_FILES_DIRECTORY.'/updates/');
					$dlHandler = fopen(APP_PATH.ENVO_FILES_DIRECTORY.'/updates/part_cms_'.$dlpackage.'.zip', 'w');
					if (!fwrite($dlHandler, $newUpdate)) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); }
					fclose($dlHandler);
					echo '<p>Update downloaded and saved</p>';
				} else {
					echo '<div class="alert alert-danger">Remote <strong> FILE NOT EXIST</strong> on site www.bluesat.cz</div>';
					break;
				}

			} else {
				echo '<p style="color: red;">Update already downloaded and exist in site '.$_SERVER['SERVER_NAME'].'</p>';
			}

			if ($_GET['run'] == true) {
				echo '<p><strong>UPDATING of CMS</strong></p>';
				// Open The File And Do Stuff
				$zipHandle = zip_open(APP_PATH.ENVO_FILES_DIRECTORY.'/updates/part_cms_'.$dlpackage.'.zip');
				echo '<ul>';
				while ($aF = zip_read($zipHandle)) {

					$thisFileName = zip_entry_name($aF);
					$thisFileDir = dirname($thisFileName);

					// Continue if its not a file
					if (substr($thisFileName,-1,1) == '/') continue;

					// Make the directory if we need to...
					if (!is_dir(APP_PATH.$thisFileDir)) {
						 mkdir(APP_PATH.$thisFileDir);
						 echo '<li>Created Directory '.$thisFileDir.'</li>';
					}

					// Overwrite the file
					if (!is_dir(APP_PATH.$thisFileName)) {
						echo '<li>'.$thisFileName.'...........';
						$contents = zip_entry_read($aF, zip_entry_filesize($aF));
						$contents = str_replace("\r\n", "\n", $contents);
						$updateThis = '';

						// If we need to run commands, then do it.
						if ($thisFileName == 'update.php') {
							$upgradeExec = fopen('update.php','w');
							fwrite($upgradeExec, $contents);
							fclose($upgradeExec);
							include('update.php');
							unlink('update.php');
							echo ' Database updated</li>';
						} else {
							$updateThis = fopen(APP_PATH.$thisFileName, 'w');
							fwrite($updateThis, $contents);
							fclose($updateThis);
							unset($contents);
							echo ' Updated</li>';
						}
					}
				}
				echo '</ul>';
				$updated = true;
				unlink(APP_PATH.ENVO_FILES_DIRECTORY.'/updates/part_cms_'.$dlpackage.'.zip');
			} else {
				echo '<p>Update ready. <a href="index.php?p=maintenance&amp;check=true&amp;run=true">&raquo; Install Now?</a></p>';
			}
			break;
		}
	}

	if ($updated == true) {
		echo '<p class="success">&raquo; CMS updated to '.$aV.' <i class="fa fa-smile-o" aria-hidden="true"></i></p>';
	} elseif ($found != true) {
		echo '<p>&raquo; There is no update available at this moment.</p>';
	}

} else {
	echo '<p>Could not find latest realeases.</p>';
}

} else {
	echo '<a href="index.php?p=maintenance&amp;check=true" class="btn btn-default">'.$tl["button"]["btn18"].'</a>';
}
?>