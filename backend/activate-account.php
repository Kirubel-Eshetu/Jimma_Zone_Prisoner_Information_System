<?php
include 'connection.php';

if (isset($_GET['activateid'])) {
    $id = $_GET['activateid'];

    // Retrieve user's status
    $sql = "SELECT status FROM users WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        if ($status == 0) {
            // Update user's status to activate
            $update = "UPDATE users SET status = 1 WHERE id='$id'";
            $activation = mysqli_query($con, $update);

            if ($activation) {
                // Account was activated successfully
                echo "<script type='text/javascript'>
                alert('Account was activated successfully!');
                window.location.href = 'manageuser.php';
                </script>";
                exit; // Terminate script execution after redirection
            } else {
                // Error occurred while updating the account status
                echo "<script type='text/javascript'>
                alert('An error occurred while activating the account!');
                window.location.href = 'manageuser.php';
                </script>";
                exit; // Terminate script execution after redirection
            }
        } elseif ($status == 1) {
            // Account is already active
            echo "<script type='text/javascript'>
            alert('Account is already active!');
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
