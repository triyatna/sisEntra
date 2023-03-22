<?php
// Start Session
session_start();
// Autoload Core
require 'database.php';
require 'function.php';
require 'core.api_server.php';
require 'core.ControllerDB.php';

$sentra = new ServersEntra(API_SERVER);
$database = new ControllerDB($conn);
$querynotif = generateRandomString(20);
