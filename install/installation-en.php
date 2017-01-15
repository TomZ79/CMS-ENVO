<!DOCTYPE html>
<html lang="en">

<head>
  <title>Installation Guide - CMS</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="../assets/css/stylesheet.css" type="text/css" media="screen"/>

  <!-- Basic CSS and Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/plugins/bootstrapv3/css/bootstrap.min.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="include/style.css" type="text/css" media="screen"/>

  <!-- Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

</head>
<body class="light-gray-bg">

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <div class="logo pull-left"><img src="include/logo_light_blue.png" alt=""></div>
      <?php include 'include/install-version.php'; ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="jumbotron">
        <h3>Installation Guide - Manual</h3>
        Welcome to the installation guide for CMS - Bluesat.
      </div>

      <strong>Please follow all the steps carefully.</strong><br/><br/>

      <div class="well">First the include/db.php.new file</div>
      <ul>
        <li>Please rename this file to <strong>db.php</strong></li>
        <li>Open the file in a text editor.</li>
        <li>The db.php file is commented throughout, so you should be able to work out what values to enter for
          the variables yourself.
        </li>
        <li>When you have finished, save the file.</li>
      </ul>

      <div class="well">Upload</div>
      <ul>
        <li>Upload all files and folders in the <strong>upload</strong> directory with your preferred FTP
          program.
        </li>
        <li>Set Folder and Subfolder permissions (<strong>CHMOD 775</strong>): <strong>_files</strong></li>
      </ul>

      <div class="well">Install the database</div>
      <ul>
        <li>Point your browser at <strong>http://www.yourdomain.com/install/install.php</strong> (where
          www.yourdomain.com is the URL of your Site).
        </li>
      </ul>

      <div class="well">Configuration and finishing</div>
      <ul>
        <li>Please delete or rename the <strong>install</strong> folder!</li>
        <li>Point your browser at: <strong>http://www.yourdomain.com/admin/</strong></li>
        <li>Sign in with your login information.</li>
        <li>Configure your website.</li>
      </ul>

      <div class="well">Help for FTP, MySQL and PHP.</div>
      <ul>
        <li>Go to our <a href="http://www.jakweb.ch">support website</a>.</li>
      </ul>

    </div>
    <div class="col-md-6">
      <div class="jumbotron">
        <h3>Installation Guide - Video</h3>
        Watch the video how to install CMS - Bluesat.
      </div>

      <h4>Installation Video</h4>

      <div class="well well-small">
        coming soon...
      </div>

    </div>
  </div>

</div>
</body>
</html>