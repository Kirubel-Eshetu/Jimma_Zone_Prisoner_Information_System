<?php
include 'connection.php';

if (isset($_GET['updateid'])) {
    $pid = $_GET['updateid'];
}

$sql = "SELECT * FROM prisoners WHERE prisoner_id='$pid'";
$result = mysqli_query($con, $sql);
$row  = mysqli_fetch_assoc($result);
$fullname = $row['fullname'];
$sex = $row['Sex'];
$dob = $row['dob'];
$region = $row['Region'];
$zone = $row['Zone'];
$wereda = $row['Wereda'];
$Medical_status = $row['Medical_status'];
$Blood_type = $row['blood_type'];
$record = $row['Criminal_record'];
$phone = $row['phone_of_contacting_people'];
$pri_image = $row['prisoner_image'];
$entry = $row['Entry_Date'];
$exit = $row['Exit_Date'];
$cell = $row['Cell_number'];
$medicald = $row['Medical_appointment'];
$courtd = $row['Court_appointment'];
$materialid = $row['Material_Id'];

if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    $region = $_POST['region'];
    $zone = $_POST['zone'];
    $wereda = $_POST['wereda'];
    $Medical_status = $_POST['medical-status'];
    $blood = $_POST['blood-type'];
    $crime = $_POST['record'];
    $phone = $_POST['phone-of-cp'];
    $entry = $_POST['entry-date'];
    $exit = $_POST['exit-date'];
    $cell = $_POST['cell-number'];
    $medical = $_POST['medical'];
    $court = $_POST['court'];
    $materialid = $_POST['materialid'];

    // Check if a new image file is uploaded
    if ($_FILES['prisoner-image']['name'] !== '') {
        $image = $_FILES['prisoner-image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_destination = "prisoner-images/" . $image_name;

        // Move the new image file
        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            // Update with the new image
            $update = "UPDATE prisoners SET fullname='$fullname', 
            Sex='$sex', dob='$dob', Region='$region', Zone='$zone', Wereda='$wereda', Medical_status='$Medical_status', 
            blood_type='$blood', Criminal_record='$crime', phone_of_contacting_people='$phone', 
            prisoner_image='$image_name', Entry_Date='$entry', Exit_Date='$exit', Cell_number='$cell', Medical_appointment='$medical',
            Court_appointment = '$court', 
            Material_Id='$materialid' WHERE prisoner_id='$pid'";
        } else {
            // Failed to upload the new image
            echo "<script type='text/javascript'>
                alert('Failed to upload the image!');
                window.location.href = 'prisoner-operations.php';
                </script>";
            exit;
        }
    } else {
        // No new image uploaded, keep the previous image
        $update = "UPDATE prisoners SET fullname='$fullname', 
            Sex='$sex', dob='$dob', Region='$region', Zone='$zone', Wereda='$wereda', Medical_status='$Medical_status', 
            blood_type='$blood', Criminal_record='$crime', phone_of_contacting_people='$phone', 
            Entry_Date='$entry', Exit_Date='$exit', Cell_number='$cell', Medical_appointment='$medical',
            Court_appointment = '$court', Material_Id='$materialid' WHERE prisoner_id='$pid'";
    }

    // Perform the update
    $updatefinal = mysqli_query($con, $update);

    if ($updatefinal) {
        echo "<script type='text/javascript'>
            alert('Inmate information was updated successfully!');
            window.location.href = 'prisoner-operations.php';
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
    <title>Update Prisoner Information</title>
    <style>
        body {
            background-image: url('Images/for_record.jpg');
            background-size: cover;
        }

        div {
            display: flex;
            justify-content: center;
        }

        .registerbtn {
            font-size: 20px;
            margin-left: 50px;
            background-color: green;
            color: white;
        }

        .updatebtn {
            background-color: blue;
            color: white;
            font-size: 21px;
            border-radius: 20px;
            padding: 10px;
        }

        form label{
            font-size: 19px;
        }
        #google_translate_element{
            display: none;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Update Prisoner Information</h1>
    <p style="text-align: center; color: green; font-size: 20px;">Please insert the informations to be updated.</p>

    <div>
        <form method="post" enctype="multipart/form-data">

            <label for="fullname">Full name</label>
            <input type="text" id="fullname" name="fullname" required autocomplete="off" value="<?php echo $fullname ?>" style="margin-left: 35px;"><br><br>

            <label for="stat">Status</label>
            <select name="stat" id="stat" style="margin-left: 75px; font-size: 19px;">
                <option value="In prison">In prison</option>
                <option value="Released">Released</option>
                <option value="Escaped">Escaped</option>
            </select><br><br>
            
            <label for="username">Sex</label>
            <select name="sex" id="username" style="margin-left: 85px;">
                <option value="Male" <?php if ($sex === 'Male') echo ' selected'; ?>>M</option>
                <option value="Female" <?php if ($sex === 'Female') echo ' selected'; ?>>F</option>
            </select><br><br>


            <label for="dob">Date of birth</label>
            <input type="date" id="dob" name="dob" required value="<?php echo $dob ?>" style="margin-left: 26px;"><br><br>

            <label for="region">Region</label>
            <input type="text" id="region" name="region" value="<?php echo $region ?>" required style="margin-left: 62px;"><br><br>

            <label for="zone">Zone</label>
            <input type="text" id="zone" name="zone" required autocomplete="off" value="<?php echo $zone ?>" style="margin-left: 76px;"><br><br>

            <label for="wereda">Wereda</label>
            <input type="text" id="wereda" name="wereda" value="<?php echo $wereda ?>" required autocomplete="off" style="margin-left: 60px;"><br><br>

            <div style="display: flex; align-items: center; margin-left: -55px;">
                <label for="medical">Medical Status</label>
                <textarea cols="25" rows="7" type="text" id="medical" name="medical-status" style="margin-left: 25px;"><?php echo "$Medical_status" ?></textarea>
            </div><br><br>

            <label for="blood">Blood Type</label>
            <select name="blood-type" id="blood" style="margin-left: 35px;">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select><br><br>


            <div style="display: flex; justify-content: space-between;  align-items: center; margin-left: -3px">
                <label for="record">Criminal Record</label>
                <textarea name="record" type="text" id="record" style="margin-left: 0px; display: inline-block; " cols="30" rows="10"><?php echo "$record" ?></textarea><br><br>
            </div><br><br>

            <div style="display: flex; align-items: center; margin-left: -50px;">
                <label for="phone" style="margin-left: -11px;">Phone of CP</label>
                <textarea name="phone-of-cp" cols="23" rows="6" type="text" id="phone" style="margin-left: 32px;"><?php echo "$phone" ?></textarea>
            </div> <br><br>

            <label for="image">Prisoner Image</label>
            <input type="file" id="image" name="prisoner-image" value="<?php echo "$image_name" ?>" style="margin-left: 10px;"><br><br>


            <label for="entry">Entry Date</label>
            <input type="date" id="entry" name="entry-date" value="<?php echo $entry ?>" style="margin-left: 37px;"><br><br>

            <label for="exit">Exit Date</label>
            <input type="date" id="exit" name="exit-date" value="<?php echo $exit ?>" style="margin-left: 46px;"><br><br>

            <label for="cell">Cell Number</label>
            <input type="text" id="cell" name="cell-number" value="<?php echo $cell ?>" style="margin-left: 25px; width: 50px;"><br><br>

            <label for="medical">Medical Appointment</label>
            <input type="date" id="medical" name="medical" style="margin-left: 25px; width: 100px;" value="<?php echo $medicald ?>"><br><br>

            <label for="court">Court Appointment</label>
            <input type="date" id="court" name="court" style="margin-left: 25px; width: 100px;" value="<?php echo $courtd ?>"><br><br>

            <label for="matid">Material Id</label>
            <input type="text" id="matid" name='materialid' value="<?php echo $materialid ?>" style="margin-left: 40px; width: 50px;"><br><br>

            <input type="submit" value="Update Prsioner Information" name="update" class="updatebtn"><br><br><br>
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