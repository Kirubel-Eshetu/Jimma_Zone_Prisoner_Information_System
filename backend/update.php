<?php
include 'connection.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
}

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row  = mysqli_fetch_assoc($result);
$uid = $row['id'];
$fullname = $row['fullname'];
$usernamereg = $row['username'];
$passwordreg = $row['password'];
$phonenumber = $row['phonenumber'];
$role = $row['role'];


if (isset($_POST['update'])) {

    $fullname = $_POST['fullname'];
    $usernamereg = $_POST['username'];
    $passwordreg = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $role = $_POST['role'];
    $update = "UPDATE users SET fullname='$fullname', username='$usernamereg', password='$passwordreg'
        , phonenumber='$phonenumber', role='$role' WHERE id='$id'";

    $finalupdate = mysqli_query($con, $update);

    if ($finalupdate) {
        echo "<script type='text/javascript'>
            alert('Information was updated successfully!');
            window.location.href = 'manageuser.php';
            </script>";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User account</title>
    <style>
        body{
            background-image: url(Images/lightregister.jpg);
            background-size: cover;
        }

        div {
            display: flex;
            justify-content: center;
        }

        form {
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
        <form method="post">

            <label for="fullname">Full name</label>
            <input type="text" id="fullname" name="fullname" required autocomplete="off" value="<?php echo $fullname ?>" style="margin-left: 35px;"><br><br>

            <label for="username">User name</label>
            <input type="text" id="username" name="username" required autocomplete="off" value="<?php echo $usernamereg ?>" style="margin-left: 30px;"><br><br>

            <label for="password">Password</label>
            <input type="text" id="password" name="password" required value="<?php echo $passwordreg ?>" style="margin-left: 40px;"><br><br>

            <label for="phonenumber">Phone number</label>
            <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?>" required autocomplete="off"><br><br>

            <label for="role">Role</label>
            <input type="text" id="role" name="role" value="<?php echo $role ?>" style="margin-left: 79px;"><br><br>
            <input type="submit" value="Update" name="update" class="registerbtn">

        </form>
    </div>
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