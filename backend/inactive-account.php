<?php
include 'connection.php';

if (isset($_GET['inactiveid'])) {
    $id = $_GET['inactiveid'];

    // Retrieve user's status
    $sql = "SELECT status FROM users WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        if ($status == 1) {
            // Update user's status to inactive
            $update = "UPDATE users SET status = 0 WHERE id='$id'";
            $afterInactive = mysqli_query($con, $update);

            if ($afterInactive) {
                // Account was made inactive successfully
                echo "<script type='text/javascript'>
                alert('Account was made inactive successfully!');
                window.location.href = 'manageuser.php';
                </script>";
                exit; // Terminate script execution after redirection
            } else {
                // Error occurred while updating the account status
                echo "<script type='text/javascript'>
                alert('An error occurred while making the account inactive!');
                window.location.href = 'manageuser.php';
                </script>";
                exit; // Terminate script execution after redirection
            }
        } elseif ($status != 1) {
            // Account is already inactive
            echo "<script type='text/javascript'>
            alert('Account is already inactive!');
            window.location.href = 'manageuser.php';
            </script>";
            exit; // Terminate script execution after redirection
        }
    } else {
        // Error occurred while retrieving user's status
        echo "<script type='text/javascript'>
        alert('An error occurred while retrieving user information!');
        window.location.href = 'manageuser.php';
        </script>";
        exit; // Terminate script execution after redirection
    }
}
?>
