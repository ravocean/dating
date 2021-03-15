<?php
/** Create a food order form */
//test2
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');
/*require('model/validate.php');
require('model/data-layer.php');*/

//Start a session
session_start();

require('config.php');

//Create an instance of the Base Class
$f3 = Base::instance();

$dataLayer = new DataLayer();
$validator = new Validate($dataLayer);
$controller = new Controller($f3);
$database = new Database($dbh);

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default root
$f3->route('GET /', function ($f3) {

    global $controller;
    $controller->home();
});

//Define a personal info route
$f3->route('GET|POST /information', function ($f3) {
    global $controller;
    $controller->information();
});

//Define the profile page route
$f3->route('GET|POST /profile', function ($f3) {
    global $controller;
    $controller->profile();
});

//Define the interests page route

$f3->route('GET|POST /interests', function ($f3) {
    global $controller;
    $controller->interests();
});

//Define the summary page route
$f3->route('GET /summary', function ($f3) {
    global $controller;
    $controller->summary();
});

// Define the admin page route
$f3->route('GET|POST /admin', function ($f3)
{
    global $controller;
    $controller->admin();
});

//Run Fat-Free
$f3->run();




























