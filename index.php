<?php
/** Create a food order form */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {

    //Display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a personal info route
$f3->route('GET /information', function() {

    //var_dump($_SESSION);


    $view = new Template();
    echo $view->render('views/info.html');
});

//Define the profile page route
$f3->route('POST /profile', function() {

    //var_dump($_SESSION);
   // var_dump($_POST);

    if(isset($_POST['fName'])){
        $_SESSION['fName'] = $_POST['fName'];
    }

    if(isset($_POST['lName'])){
        $_SESSION['lName'] = $_POST['lName'];
    }

    if(isset($_POST['age'])){
        $_SESSION['age'] = $_POST['age'];
    }

    if(isset($_POST['gender'])){
        $_SESSION['gender'] = $_POST['gender'];
    }

    if(isset($_POST['phone'])){
        $_SESSION['phone'] = $_POST['phone'];
    }

    $view = new Template();
    echo $view->render('views/profile.html');
});

//Define the interests page route
$f3->route('POST /interests', function() {

    //var_dump($_SESSION);

    if(isset($_POST['email'])){
        $_SESSION['email'] = $_POST['email'];
    }

    if(isset($_POST['state'])){
        $_SESSION['state'] = $_POST['state'];
    }

    if(isset($_POST['seeking'])){
        $_SESSION['seeking'] = $_POST['seeking'];
    }

    if(isset($_POST['bio'])){
        $_SESSION['bio'] = $_POST['bio'];
    }


    $view = new Template();
    echo $view->render('views/interests.html');
});

//Define the summary page route
$f3->route('POST /summary', function() {

    //var_dump($_SESSION);

    if(isset($_POST['interests'])){
        $_SESSION['interests'] = $_POST['interests'];
    }

    $view = new Template();
    echo $view->render('views/summary.html');

    //Clear the SESSION array
    session_destroy();
});

//Run Fat-Free
$f3->run();




























