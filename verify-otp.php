<?php
session_start();

include 'backend/connection.php';

if (isset($_POST['submit'])) {
    $storedOTP  = $_SESSION['otp'] ?? '';
    $enteredOTP = $_POST['otp'] ?? '';
    $usern      = $_SESSION['email'] ?? '';

    // Validate OTP
    if ($enteredOTP == $storedOTP) {
        // Use prepared statement to prevent SQL injection
        $sql = "SELECT role FROM users WHERE username = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $usern);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $role = $row['role'];

            // Redirect based on user's role
            switch ($role) {
                case "System Administrator":
                    header('location:backend/admin-dashboard.html');
                    exit();
                case "Prison Inspector":
                    header('location:backend/prison-inspector.html');
                    exit();
                case "Security Manager":
                    header('location:backend/security-manager.html');
                    exit();
                case "Discipline Officer":
                    header('location:backend/discipline-officer.html');
                    exit();
                case "Record Officer":
                    header('location:backend/record-officer.html');
                    exit();
                default:
                    $error = "Invalid role";
            }
        } else {
            $error = "User not found.";
        }
    } else {
        $error = "Incorrect OTP. Please try again.";
    }
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>

    <style>
        /* Styles for the popup container */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .popup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .otp-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .otp-form h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        .otp-form p {
            color: red;
            margin-bottom: 15px;
        }

        .otp-form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .otp-form input[type="text"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .otp-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .otp-form button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Styles for the cancel button */
        .otp-form .cancel-btn {
            width: 100%;
            padding: 10px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .otp-form .cancel-btn:hover {
            background-color: #aaa;
        }
    </style>
</head>

<body>

    <div class="popup-container">
        <div class="otp-form">
            <h2>Verify OTP</h2>
            <?php if (isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>

            <form method="post">
                <label for="otp">Enter OTP:</label>
                <input type="text" name="otp" id="otp" required>
                <button type="submit" name="submit">Verify OTP</button>
                <button class="cancel-btn" onclick="window.location.href='login.php';" type="button">Cancel</button>
            </form>
        </div>
    </div>

</body>

</html>