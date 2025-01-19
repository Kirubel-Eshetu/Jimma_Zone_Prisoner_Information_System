<?php
//Connecting the php code with database

$con = mysqli_connect("localhost","root","","jzpis");

if($con->connect_error){
    die("Failed to connect: ".$con->connect_error);
}

?>