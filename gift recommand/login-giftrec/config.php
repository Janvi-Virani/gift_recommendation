<?php

//connect to the database
$servername="localhost";
$username="root";
$password="";
$database="giftrec_signup";

$con= mysqli_connect($servername,$username,$password,$database);

// if(!$con){
//   die("connection failed:" . mysqli_connect_error());
// }

if($con){
    echo "database connection successfully!";
}
else{

    echo "connection is not successfully!";
}

//create database if not there then 
// $sql="CREATE DATABASE IF NOT EXISTS $database";

$sql="CREATE TABLE `giftrec_signup`.`user_signup` ( `userno` int NOT NULL PRIMARY KEY AUTO_INCREMENT ,`username` VARCHAR(150) NOT NULL , `email` VARCHAR(80) NOT NULL , `password` VARCHAR(40) NOT NULL , `configpassword` VARCHAR(40) NOT NULL )";
$result=mysqli_query($con,$sql);

if($result){
    echo "table created successfully";
}
else{
    echo "table created already!!";
}




?>