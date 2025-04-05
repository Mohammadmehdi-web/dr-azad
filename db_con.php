<?php

	$servername="localhost";
	$username="root";
	$password="";
    $database = "dr-azad_db";

    $con = new mysqli($servername, $username, $password, $database);

    if($con->connect_error){
        die("connection failed : " .$con->connect_error);
    }
?>