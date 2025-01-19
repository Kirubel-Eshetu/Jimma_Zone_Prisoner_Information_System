<?php
session_start();

include 'backend/connection.php';

if (isset($_POST['login_btn'])) {
    $usern    = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    $sql = "SELECT * FROM users WHERE username = '$usern'";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $resultPassword = $row['password'];
            $status = $row['status'];

            if ($resultPassword == $password && $status == 1) {
                // Username and password are correct, proceed to send OTP
                $_SESSION['email'] = $usern;
                $otp = rand(100000, 999999); // Generating a 6-digit OTP
                $_SESSION['otp']   = $otp;
                $_SESSION['pass']  = $password;
                include 'PHPMailer/sendemail.php';
                
                // Redirect to verify-otp.php after sending email
                header('location: verify-otp.php');
                exit(); // Ensure script execution stops after redirection
            } elseif ($status != 1) {
                // Account is inactive
                echo "<script>
                    alert('Your account has been made inactive! Contact the system admin through comments and suggestions section.');
                    location.href = 'login.php';
                    </script>";
            } else {
                // Incorrect username or password
                echo "<script>
                    alert('Incorrect Username or password. Access is denied.');
                    location.href = 'login.php';
                    </script>";
            }
        }
    } else {
        // User not found
        echo "<script>
            alert('User not found.');
            location.href = 'login.php';
            </script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/login-image-2.jpg">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="images/logojpcrop.jpg" alt="Logo" width="100%" height="135px">
            </div>
            <div class="title">
                <h1><br>Jimma Zone Prisoner Information System</h1>
            </div>

            <div class="prisoner_image">
                <img src="images/prisoner-image.jpg" alt="Image of Prisoner" width="100%" height="135px">
            </div>
        </div>
    </header>
    <nav class="linknav">
        <ul>
            <li><a href="index.html" class="not">Home</a></li>
            <li><a href="#languages">Language</a>
                <ul id="languages">
                    <li>
                        <div id="google_translate_element"></div>
                    </li>
                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                    pageLanguage: "en",
                                    includedLanguages: "en,am,om",
                                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                    autoDisplay: false,
                                },
                                "google_translate_element"
                            );

                            // Ensure the specific paragraph always displays in English
                            var englishParagraph = document.getElementById("english_paragraph");
                            if (englishParagraph) {
                                google.translate.TranslateElement({
                                        pageLanguage: "en"
                                    },
                                    "english_paragraph"
                                );
                            }
                        }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </ul>
            </li>

            <li><a target="_self" href="#" id="button">Login</a></li>
            <li><a target="_self" href="about-us.html">About Us</a></li>
            <li><a href="contact-us.html">Contact Us</a></li>
        </ul>
    </nav>
    <div class="loginall">
        <form method="POST">
            <fieldset>
                <legend>Welcome User</legend>
                <p style="font-size: 23px;">Please provide with the required informations.</p>

                <label for="username" style="margin-bottom: 8px; font-size: 22px; text-align: center;">Username (Email) <span style="color: red">*</span> </label>
                <input id="username" type="email" name="username" placeholder="Insert your username (Email)" required style="margin-bottom: 20px; font-size: 22px; border-radius: 15px; width: 400px; margin-left: 15px;" autocomplete="off" />
                <input type="hidden" id="otp" name="generatedotp" readonly>
                <label for="password" style="margin-bottom: 8px; font-size: 22px; text-align: center;">Password <span style="color: red">*</label>
                <input id="password" type="password" name="password" placeholder="Password goes here" required style="margin-bottom: 25px; font-size: 22px; border-radius: 15px; width: 400px; margin-left: 15px;" />
                <div class="showin">
                    <input type="checkbox" id="show">
                    <label for="show">Show Password</label>
                </div>
                <script>
                    document.getElementById("show").addEventListener("change", function() {
                        var passwordField = document.getElementById("password");
                        if (this.checked) {
                            passwordField.type = "text";

                        } else {
                            passwordField.type = "password";
                        }
                    });
                </script>
                <input type="submit" value="Login" id="login-button" class="login_button" name="login_btn" style="font-size: 21px; border-radius: 35px; margin: auto;">
            </fieldset>
        </form>
    </div>
    <script>
        document.getElementById("generateOTP").addEventListener("click", function() {
            var otp = generateOTP();
            document.getElementById("otp").value = otp;
        });

        function generateOTP() {
            var digits = '0123456789';
            var otpLength = 6;
            var otp = '';

            for (var i = 0; i < otpLength; i++) {
                otp += digits[Math.floor(Math.random() * 10)];
            }

            return otp;
        }
    </script>
    <footer>
        <p>Jimma Zone Prisoner Information System
            <br>@Jimma Zone Prison Administration <br>
            All rights recieved
        </p>
    </footer>
</body>

</html>