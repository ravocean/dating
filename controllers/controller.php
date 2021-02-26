<?php

class Controller
{
    private $_f3;

    public function __construct($f3)
    {
        global $dataLayer;
        $this->_f3 = $f3;
        $this->_f3->set('stateList', $dataLayer->getState());
        $this->_f3->set('genders', $dataLayer->getGender());
        $this->_f3->set('indoorsList', $dataLayer->getOutdoor());
        $this->_f3->set('outdoorsList', $dataLayer->getIndoor());

    }

    function home()
    {

        $view = new Template();
        echo $view->render('views/home.html');
    }

    function information()
    {

        global $validator;

        //Save POST content to $f3 for sticky forms
        $this->_f3->set('fName', isset($_POST['fName']) ? $_POST['fName'] : "");
        $this->_f3->set('lName', isset($_POST['lName']) ? $_POST['lName'] : "");
        $this->_f3->set('age', isset($_POST['age']) ? $_POST['age'] : "");
        $this->_f3->set('gender', isset($_POST['gender']) ? $_POST['gender'] : "");
        $this->_f3->set('phone', isset($_POST['phone']) ? $_POST['phone'] : "");


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $age = $_POST['age'];


            if ($validator->validName($_POST['fName'])) {
                $_SESSION['fName'] = $_POST['fName'];
            } else {
                $this->_f3->set("errors['fName']", 'Name is not valid');
            }


            if ($validator->validName($_POST['lName'])) {
                $_SESSION['lName'] = $_POST['lName'];
            } else {
                $this->_f3->set("errors['lName']", 'Name is not valid');
            }


            if ($validator->validAge($_POST['age'])) {
                $_SESSION['age'] = $_POST['age'];
            } else {
                $this->_f3->set("errors['age']", 'Age is not valid (between 18 - 118)');
            }


            if ($validator->validGender($_POST['gender'])) {
                $_SESSION['gender'] = $_POST['gender'];
            } else {
                $_SESSION['gender'] = "Unspecified";
            }


            if ($validator->validPhone($_POST['phone'])) {
                $_SESSION['phone'] = $_POST['phone'];
            } else {
                $this->_f3->set("errors['phone']", 'Number is not valid');
            }


            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('profile');
            }
        }


        $view = new Template();
        echo $view->render('views/info.html');
    }


    function profile()
    {
        //Set global variables and page title
        global $validator;

        //Save POST content to $f3 for sticky forms
        $this->_f3->set('email', isset($_POST['email']) ? $_POST['email'] : "");
        $this->_f3->set('userState', $_POST['states']);
        $this->_f3->set('seekingGender', isset($_POST['seekingGender']) ? $_POST['seekingGender'] : "");
        $this->_f3->set('bio', isset($_POST['bio']) ? $_POST['bio'] : "");

        //If POST array is set
        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            if ($validator->validEmail($_POST['email'])) {
                $_SESSION['email'] = $_POST['email'];
            } else {
                $this->_f3->set("errors['email']", 'Email is not valid');
            }


            if ($validator->validState($_POST['state'])) {
                $_SESSION['state'] = $_POST['state'];
            } else {
                $_SESSION['state'] = "Unspecified";
            }

            if ($validator->validGender($_POST['seeking'])) {
                $_SESSION['seeking'] = $_POST['seeking'];
            } else {
                $_SESSION['seeking'] = "Unspecified";
            }

            if (!empty($_POST['bio'])) {
                $_SESSION['bio'] = $_POST['bio'];
            } else {
                $_SESSION['bio'] = "Unspecified";
            }

            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('interests');
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');
    }


    function interests()
    {
        global $validator;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST['indoors']) && $validator->validIndoor($_POST['indoors'])) {
                $_SESSION['indoors'] = $_POST['indoors'];
            } else {
                $_SESSION['indoors'] = array();
            }

            if (isset($_POST['outdoors']) && $validator->validOutdoor($_POST['outdoors'])) {
                $_SESSION['outdoors'] = $_POST['outdoors'];
            } else {
                $_SESSION['outdoors'] = array();
            }

            $_SESSION['allInterests'] =
                implode(", ", array_merge($_SESSION['indoors'], $_SESSION['outdoors']));

            if (empty($_SESSION['allInterests'])) {
                $_SESSION['allInterests'] = "None Specified";
            }

            $this->_f3->reroute('summary');
        }

        $view = new Template();
        echo $view->render('views/interests.html');
    }


    function summary()
    {

        $view = new Template();
        echo $view->render('views/summary.html');
    }
}