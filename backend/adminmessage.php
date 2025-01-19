<?php
include 'connection.php';
if(isset($_POST('messageadmin'))){

    $admess = $_POST['messageadmin'];
    $insert = "INSERT INTO messageadmin (message) values (";

}

?>