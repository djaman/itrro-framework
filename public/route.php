<?php
// Include necessary files and classes
// Define routes
RouteAdd::add("/", function($param) {
  // Handle the root route
  // Require the index file route
  require_once ROOT . "/public/controller/index.php";
  // Create an instance of the index controller
  $home = new index($param);
  // Call the index method
  $home->index();
});
