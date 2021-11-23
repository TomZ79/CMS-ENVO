<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/generated_js.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// GENERATED JAVASCRIPT FILE
//---------------------------

// Set content type header
header('Content-Type: application/x-javascript;charset=utf-8');

echo <<<EOT

/*
 * CMS ENVO - FRONTEND CARZONE TEMPLATE
 * PHP Generated javascript file with variable for external js files  - FRONTEND
 * Copyright (c) 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * =======================================================================
 */
 
// Carzone of options
carzoneJs.logo1 = '{$setting["HeLogo1Carzone_tpl"]}';
carzoneJs.logo2 = '{$setting["HeLogo2Carzone_tpl"]}';


EOT;

?>