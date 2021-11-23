<?php
echo $Html->addDoctype('html5');
?>
<html lang="<?= $site_language ?>">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
  <meta charset="utf-8"/>

  <!-- BEGIN Vendor CSS-->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Bootstrap
  echo $Html->addStylesheet('../assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css', 'screen');
  // Font Awesomemin
  echo $Html->addStylesheet('../assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css');
  ?>

  <!-- BEGIN General Stylesheet with custom modifications -->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html->addStylesheet('assets/css/style.min.css');
  ?>

  <!-- CUSTOM CSS -->
  <style type="text/css">
    /* Style for iframe */
    body {
      background-color: transparent;
    }
  </style>

  <!-- Import all hooks for in between head -->
  <?php if (isset($ENVO_HOOK_HEAD_ADMIN) && is_array($ENVO_HOOK_HEAD_ADMIN)) foreach ($ENVO_HOOK_HEAD_ADMIN as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>

</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <section class="content-header">
