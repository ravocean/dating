<?php

class Database{

    private $_dbh;

    /**
     * Database constructor.
     * @param $dbh
     */
    function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

    /**
     * This function inserts an argument Member or PremiumMember object data into the member table
     * @param $member Object Member or PremiumMember to be inserted into database table
     */
    function insertMember($member){
        //Build query
        $sql = "INSERT INTO member (fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)
            VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Set $premium to use as boolean for if member is premium or not
        $premium = $member instanceof PremiumMember;

        //If user is premium, prepare interests for the sql query
        $interests = $premium ? implode(", ", array_merge($member->getInDoorInterests(),
            $member->getOutDoorInterests())) : "";

        //Images not implemented yet, set to "None"
        $noImage = "None";

        //Bind the parameters
        $statement->bindParam(':fname', $member->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $member->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':age', $member->getAge(), PDO::PARAM_INT);
        $statement->bindParam(':gender', $member->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $member->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $member->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $member->getState(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $member->getSeeking(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $member->getBio(), PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_INT);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);
        $statement->bindParam(':image',  $noImage, PDO::PARAM_STR);

        //Process results
        $statement->execute();
    }

    /**
     * This function returns all member table information.
     * @return array of arrays containing member information
     */
    function getMembers(){
        //Build query
        $sql = "SELECT * FROM member ORDER BY lname";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Process results
        $statement->execute();

        //Return results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Not implemented
    function getMember($member_id){

    }

    //Not implemented
    function getInterests($member_id){

    }
}