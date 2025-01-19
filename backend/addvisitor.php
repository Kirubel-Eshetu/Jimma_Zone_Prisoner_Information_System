<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new visitor</title>
    <link rel="stylesheet" href="css/addvisitor.css">
</head>

<body>
    <h1 style="text-align: center;">Inset new visitor information here</h1>
    <div>
        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Insert visitor's information here</legend>
                <label for="visitorid">Visitor Id</label>
                <input type="text" id="visitorid" name="visitorid"><br><br>
                <label for="fullname">Full Name </label>
                <input type="text" id="fullname" name="fullname"><br><br>
                <label for="visiting">Visiting </label>
                <input type="text" id="visiting" name="vs"><br><br>
                <label for="phone">Phonenumber</label>
                <input type="text" id="phone" name="pn"><br><br>
                <label for="email">Email</label>
                <input type="email" id="email" name="em" style="margin-left: 10px;"><br><br>
                <label for="photoid">Photo of Id-card</label>
                <input type="file" id="photoid" name="photo" accept=".jpg, .png, .jpeg"><br><br>
                <label for="matid" style="margin-right: 10px;">Material Id</label>
                <input type="text" id="matid" name="matid"><br><br>
                <input type="submit" value="Add Visitor" name="addvisitor" style="background-color: green; color: white; font-size: 20px;">
            </fieldset>
        </form>
    </div>
    <div id="google_translate_element"></div>
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
</body>

</html>

<?php
include 'connection.php';

if (isset($_POST['addvisitor'])) {
    $vid = $_POST['visitorid'];
    $fullname = $_POST['fullname'];
    $vs = $_POST['vs'];
    $pn = $_POST['pn'];
    $em = $_POST['em'];
    $po = $_FILES['photo'];
    $po_name = $po['name'];
    $po_tmp_name = $po['tmp_name'];
    $po_destination = "visitor-idcard/" . $po_name;
    $matid = $_POST['matid'];

    $select = "SELECT * from visitors where visitor_id='$vid' OR email='$em'";
    $check = mysqli_query($con, $select);
    if ($check->num_rows > 0) {
        echo "
            <script>
            alert('Duplicate visitor id or email found');
            </script>";
    } else {
        $po_data = mysqli_real_escape_string($con, $po_destination);
        $addvisitor = "INSERT INTO visitors (visitor_id, fullname, visiting, phonenumber, email, photo_of_idcard, material_id) VALUES 
        ('$vid','$fullname','$vs','$pn','$em','$po_name','$matid')";

        $afteradd = mysqli_query($con, $addvisitor);

        if ($afteradd) {
            echo "
            <script>
            alert('Visitor information was registered successfully');
            window.location.href = 'managevisitor.php';
            </script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>