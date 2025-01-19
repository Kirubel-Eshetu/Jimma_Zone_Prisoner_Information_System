<?php
include 'connection.php';

if (isset($_GET['updateid'])) {
    $upid = $_GET['updateid'];
}

$search = "SELECT * from visitors where visitor_id='$upid'";
$store = mysqli_query($con, $search);
$sea = mysqli_fetch_assoc($store);

$vid = $sea['visitor_id'];
$fullname = $sea['fullname'];
$vs = $sea['visiting'];
$pn = $sea['phonenumber'];
$em = $sea['email'];
$phot = $sea['photo_of_idcard'];
$mat = $sea['material_id'];


if (isset($_POST['update'])) {

    $fullname = $_POST['fullname'];
    $vs1 = $_POST['vs'];
    $pn1 = $_POST['pn'];
    $em1 = $_POST['em'];
    $po = $_FILES['po'];
    $po_name = $po['name'];
    $po_tmp_name = $po['tmp_name'];
    $po_destination = "visitor-idcard/" . $po_name;
    $matid = $_POST['matid'];

    if ($po_name !== '') {
        // If a new file is selected
        if (move_uploaded_file($po_tmp_name, $po_destination)) {
            $change = "UPDATE visitors set fullname='$fullname',visiting='$vs1', phonenumber='$pn1', email='$em1',
            photo_of_idcard='$po_name', material_id='$matid' where visitor_id='$upid'";
            $afterchange = mysqli_query($con, $change);

            if ($afterchange) {
                echo "<script type='text/javascript'>
                alert('Visitor information was updated successfully!');
                window.location.href = 'managevisitor.php';
                </script>";
            } else {
                die(mysqli_error($con));
            }
        } else {
            echo "<script type='text/javascript'>
            alert('Failed to upload the image!');
            window.location.href = 'managevisitor.php';
            </script>";
        }
    } else {
        // If no new file is selected
        $change = "UPDATE visitors set fullname='$fullname',visiting='$vs1', phonenumber='$pn1', email='$em1', material_id='$matid' 
            where visitor_id='$upid'";
        $afterchange = mysqli_query($con, $change);

        if ($afterchange) {
            echo "<script type='text/javascript'>
            alert('Visitor information was updated successfully!');
            window.location.href = 'managevisitor.php';
            </script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Visitor Infromation</title>
    <link rel="stylesheet" href="css/updatevisitorinfo.css">
</head>

<body>
    <h1 style="text-align: center;">Update visitor information</h1>
    <div class="formcontainer">
        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Insert the information to be updated</legend>
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required value="<?php echo $fullname ?>"><br><br>
                <label for="visiting">Visiting </label>
                <input type="text" id="visiting" name="vs" value="<?php echo $vs?>"><br><br>
                <label for="phone">Phonenumber</label>
                <input type="text" id="phone" name="pn" value="<?php echo $pn ?>"><br><br>
                <label for="email">Email</label>
                <input type="email" id="email" name="em" value="<?php echo $em ?>"><br><br>
                <label for="photoid">Photo of Id-card</label>
<input type="file" id="photoid" name="po">
<?php if (!empty($phot)): ?>
    <span><?php echo $phot ?></span>
<?php endif; ?>
<br><br>
<label for="MaterialId" style="margin-right: 5px;">Material Id</label>
                <input type="text" name="matid" id="MaterialId" value="<?php echo $mat ?>"><br><br>

                <input type="submit" value="Update Visitor Info" name="update" class="updatevisit">
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