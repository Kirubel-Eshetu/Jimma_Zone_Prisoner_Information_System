<?php

include'connection.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$comment = $_POST['comment'];

$store = "INSERT INTO comments (email_address,comments) VALUES ('$email','$comment')";
$afterstore = mysqli_query($con,$store);

if($afterstore) {
    echo"<script type='text/javascript'>
            alert('Your comments has been successfully sent')
            location.href = '../contact-us.html';
            </script>";
}
else{
    echo"<script type='text/javascript'>
            alert('An error occured while sending you comment.')
            location.href = '../contact-us.html';
            </script>";
}
}



?>