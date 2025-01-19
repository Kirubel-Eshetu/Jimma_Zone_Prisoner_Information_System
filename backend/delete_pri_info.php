<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
    $pid =$_GET['deleteid'];
    
    $delete = "DELETE from prisoners where prisoner_id='$pid'";
    $afterdelete = mysqli_query($con, $delete);

    if($afterdelete)
    {
        echo"<script type='text/javascript'>
        alert('Prisoner information was deleted successfully');
        window.location.href = 'record-officer.html';
        </script";
    }
    else {
        die(mysqli_error($con));
    }
}
?>