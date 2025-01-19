<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new user</title>
    <style>
        body{
            background-image: url(Images/lightregister.jpg);
            background-size: cover;
        }
        div {
            display: flex;
            justify-content: center;
        }
        form{
            font-size: 20px;
        }

        .registerbtn {
            font-size: 22px;
            margin-left: 50px;
            background-color: green;
            color: white;
        }
        #google_translate_element{
            display: none;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Register User</h1>
    <p style="text-align: center; color: green; font-size: 20px;">Please insert the following informations.</p>

    <div>
        <form action="register.php" method="post">
            <label for="id">Id</label>
            <input type="text" id="id" name="id" required autocomplete="off" style="margin-left: 102px;"><br><br>

            <label for="fullname">Full name</label>
            <input type="text" id="fullname" name="fullname" required autocomplete="off" style="margin-left: 35px;"><br><br>

            <label for="username">User name</label>
            <input type="email" id="username" name="username" required autocomplete="off" style="margin-left: 30px;"><br><br>

            <label for="password">Password</label>
            <input type="text" id="password" name="password" required style="margin-left: 40px;"><br><br>

            <label for="phonenumber">Phone number</label>
            <input type="text" id="phonenumber" name="phonenumber" required autocomplete="off"><br><br>

            <label for="role">Role</label>
            <input type="text" id="role" name="role" style="margin-left: 79px;"><br><br>
            <input type="submit" value="+ Register user" name="register" class="registerbtn">

        </form>
    </div>

    <?php
    include 'connection.php';

    if (isset($_POST['register'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $usernamereg = $_POST['username'];
        $passwordreg = $_POST['password'];
        $phonenumber = $_POST['phonenumber'];
        $role = $_POST['role'];

        $select = "SELECT * from users WHERE id='$id' OR username='$usernamereg' OR password='$passwordreg' OR phonenumber='$phonenumber'";
        $result = mysqli_query($con, $select);

        if ($result->num_rows > 0) {
            echo "<script type='text/javascript'>
            alert('One or more credentials entered are already on the list');
            window.location.href = 'register.php';
            </script>";
        } else {
            $registerinput = "INSERT INTO users (id, fullname, username, password, phonenumber, role, status) VALUES ('$id','$fullname','$usernamereg','$passwordreg','$phonenumber','$role','1')";
            $afterregistration = mysqli_query($con, $registerinput);

            if ($afterregistration) {
                echo "<script type='text/javascript'>
            alert('User Account was registered successfully!');
            window.location.href = 'manageuser.php';
            </script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }

    ?>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {
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
                google.translate.TranslateElement(
                    { pageLanguage: "en" },
                    "english_paragraph"
                );
            }
        }
    </script>
    <script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>