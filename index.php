<?php
/**
 * 
 * Created by Aman Chauhan
 * Date: 18/08/2023
 * Project: Adultwire
 * Description: This script initializes error reporting for development mode, assigns a base URL to check,
 * defines the root path, requires the boot class, and starts the boot class instance.
 */

// Initialize error reporting for development mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Current host and URI
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];

// Assign the base URL to check
$baseUrl = "https://localhost:8002";

// Define the root path
define("ROOT", __dir__);

// Require the boot class
//nclude_once("crawl.php");
require_once ROOT.'/system/boot.php';

// Getting an instance of the boot class
boot::Intance()->run();


?>
 