<?php

class install{


    public function __construct(){


$link = mysqli_connect("localhost", "root", "");



// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}



// Attempt create database query execution
        $sql = "CREATE DATABASE myDBone DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

if(mysqli_query($link, $sql)){

    echo "Database created successfully";

} else{
    echo '<pre>';
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}


mysqli_close($link);






}



}

new install();