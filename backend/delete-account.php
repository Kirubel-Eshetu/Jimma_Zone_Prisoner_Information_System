<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
    $id =$_GET['deleteid'];


    $delete = "DELETE from users where id='$id'";
    $afterdelete = mysqli_query ($con, $delete);

    if($afterdelete)
    {
        echo "<script type='text/javascript'>
        alert('User account was delted successfully');
        window.location.href = 'admin-dashboard.html';
        </script";
    }
    else {
        die(mysqli_error($con));
    }
}
?>