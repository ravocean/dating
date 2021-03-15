<?php
/**
 * Husrav Homidov
 * 2/24/2021
 * validate.php
 * This file contains validation functions for the Dating project for SDEV328
 */

class Validate
{
    private $_dataLayer;

    // Constructor
    function __construct()
    {
        $this->_dataLayer = new DataLayer();
    }

    function validName($name)
    {
        // Checks if name is empty
        return !empty($name) && ctype_alpha($name);
    }

    function validAge($age)
    {
        // Check age is between 18 and 118
        return is_numeric($age) && $age >= 18 && $age <= 118;
    }

    function validPhone($phone)
    {
        // Checks if number is 10 digits
        return is_numeric($phone) && strlen((string)$phone) == 10;
    }

    function validState($state)
    {
        //Verify state matches the available states in data-layer.php
        return in_array($state, $this->_dataLayer->getState());
    }

    function validGender($gender)
    {
        //Verify gender matches the available gender options in data-layer.php
        return in_array($gender, $this->_dataLayer->getGender());
    }

    function validEmail($email)
    {
        // Checks email
        $emailRegx = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        return preg_match($emailRegx, $email);
    }

    function validIndoor($indoorInt)
    {
        foreach ($indoorInt as $interest) {
            if (!in_array($interest, $this->_dataLayer->getIndoor())) {
                return false;
            }
        }
        return true;
    }

    function validOutdoor($outdoorInt)
    {
        foreach ($outdoorInt as $interest) {
            if (!in_array($interest, $this->_dataLayer->getOutdoor())) {
                return false;
            }
        }
        return true;
    }
} // end of Validate class