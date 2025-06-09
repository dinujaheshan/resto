<?php

require "connection.php";

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["mn"];
    $email = $_POST["ea"];
    $person = $_POST["p"];
    $date = $_POST["d"];

    if(empty($fname)){
        echo ("Please enter your First Name.");
    }else if(strlen($fname) > 45){
        echo ("First Name must have less than 45 characters.");
    }else if(empty($lname)){
        echo ("Please enter your Last Name.");
    }else if(strlen($lname) > 45){
        echo ("Last Name must have less than 45 characters.");
    }else if(empty($mobile)){
        echo ("Please enter your Mobie Number.");
    }else if(strlen($mobile) != 10){
        echo ("Mobile number must contain 10 characters.");
    }else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
        echo ("Invalid Mobile Number.");    
    }else if(empty($email)){
        echo ("Please enter your Email Address.");
    }else if(strlen($email) > 100){
        echo ("Email must have less than 100 characters.");
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo ("Invalid Email Address");
    }else if(empty($person)){
        echo ("Please enter the required number of persons in the table.");
    }else if(empty ($date)){
        echo("Please select a date for reservation.");
    }else{
        
    $book_rs = Database::search("SELECT * FROM `book` WHERE 
    `users_email`='" . $email . "'");

$book_num = $book_rs->num_rows;


if ($book_num > 0) {

    //echo ("User with the same Mobile Number or Email already exists.");

    }else{
    Database::iud("INSERT INTO `book`(`fname`,`lname`,`mobile`,`users_email`,`person`,`date`) 
    VALUES ('" .  $fname . "','" . $lname . "','" .  $mobile . "','" . $email . "','" .  $person . "','" .  $date . "')");
    
    echo ("Success");

}
       
    

    }
