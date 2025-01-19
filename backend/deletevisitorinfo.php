<?php
include'connection.php';
$vid = $_GET['deleteid'];

if(isset($vid)){
$deletion = "DELETE * from visitors where visitor_id = '$vid'";
$after = mysqli_query($con,$deletion);
if($after){
    echo"
    <script>
    alert('Visitor Information was deleted successfully!');
    </script>";
}

else{
    die(mysqli_error($con));
}
}
?>