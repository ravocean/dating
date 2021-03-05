<?php
class Member {

    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    /**
     * @param $_fname String first name
     * @param $_lname String second name
     * @param $_age Number age
     * @param $_gender String gender
     * @param $_phone Number phone number
     */
    public function __construct($_fname, $_lname, $_age, $_gender, $_phone)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_age = $_age;
        $this->_gender = $_gender;
        $this->_phone = $_phone;
    }

    /**
     * Returns first name
     * @return String first name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * Sets first name
     * @param String $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * Returns last name
     * @return String last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * Sets last name
     * @param String $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * Returns age
     * @return Number age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * Sets age
     * @param Number $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * Returns gender
     * @return String gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * Sets gender
     * @param String $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * Returns phone number
     * @return Number phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Sets phone number
     * @param Number $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * Returns email
     * @return mixed email address
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Sets email
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * Returns state
     * @return mixed state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Sets state
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * Returns seeking gender
     * @return mixed seeking gender
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * Sets seeking gender
     * @param mixed $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * Returns bio
     * @return mixed bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * Sets bio
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}