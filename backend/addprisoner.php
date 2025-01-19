<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Prisoner</title>
    <style>
        body{
            background-image: url('Images/for_record.jpg');
            background-size: cover;
        }
        div {
            display: flex;
            justify-content: center;
        }

        .registerbtn {
            font-size: 22px;
            margin-left: 50px;
            background-color: green;
            color: white;
        }
        form{
            font-size: 19px;
        }
        #google_translate_element{
            display: none;
        }
        
    </style>
</head>

<body>
    <h1 style="text-align: center;">Register Prisoner</h1>
    <p style="text-align: center; color: green; font-size: 20px;">Please insert the following informations about the prisoner</p>

    <div>
        <form action="addprisoner.php" method="post" enctype="multipart/form-data">
            <label for="id">Prisoner Id</label>
            <input type="text" id="id" name="id" required autocomplete="off" style="margin-left: 38px;"><br><br>

            <label for="fullname">Full name</label>
            <input type="text" id="fullname" name="fullname" required autocomplete="off" style="margin-left: 45px;"><br><br>

            <label for="stat">Status</label>
            <select name="stat" id="stat" style="margin-left: 75px; font-size: 19px;">
                <option value="In prison">In prison</option>
                <option value="Released">Released</option>
                <option value="Escaped">Escaped</option>
            </select><br><br>

            <label for="sex">Gender</label>
            <select name="sex" id="sex" name="sex" style="margin-left: 65px; font-size: 19px;">
                <option value="Male">M</option>
                <option value="Female">F</option>
            </select><br><br>

            <label for="region">Region</label>
            <input type="text" id="region" name="region" required style="margin-left: 62px;"><br><br>

            <label for="zone">Zone</label>
            <input type="text" id="zone" name="zone" required autocomplete="off" style="margin-left: 76px;"><br><br>

            <label for="wereda">Wereda</label>
            <input type="text" id="wereda" name="wereda" required autocomplete="off" style="margin-left: 60px;"><br><br>

            <div style="display: flex; align-items: center; margin-left: -55px;">
                <label for="medical">Medical Status</label>
                <textarea cols="28" rows="7" type="text" id="medical" name="medical-status" style="margin-left: 25px;"></textarea>
            </div><br><br>

            <label for="blood">Blood Type</label>
            <select name="blood-type" id="blood" name="blooc" style="margin-left: 35px; font-size: 19px;">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select><br><br>

            <div style="display: flex; align-items: center; margin-left: -55px;">
                <label for="medical">Reason of Arrest</label>
                <textarea cols="28" rows="7" type="text" id="reason" name="reason" style="margin-left: 25px;"></textarea>
            </div><br><br>

            <div style="display: flex; justify-content: space-between;  align-items: center; margin-left: -3px">
                <label for="record">Criminal Record</label>
                <textarea name="record" type="text" id="record" style="margin-left: 0px; display: inline-block; " cols="30" rows="10"></textarea><br><br>
            </div><br><br>

            <div style="display: flex; align-items: center; margin-left: -50px;">
                <label for="phone" style="margin-left: -11px;">Phone of CP</label>
                <textarea name="phone-of-cp" cols="23" rows="6" type="text" id="phone" style="margin-left: 32px;"></textarea>
            </div> <br><br>

            <label for="image">Prisoner Image</label>
            <input type="file" id="image" name="prisoner-image" accept=".jpg, .jpeg, .png" style="margin-left: 10px;"><br><br>

            <label for="entry">Entry Date</label>
            <input type="date" id="entry" name="entry-date" style="margin-left: 37px;"><br><br>

            <label for="exit">Exit Date</label>
            <input type="date" id="exit" name="exit-date" style="margin-left: 46px;"><br><br>

            <label for="cell">Cell Number</label>
            <input type="text" id="cell" name="cell-number" style="margin-left: 25px; width: 50px;"><br><br>

            <label for="cell">Medical Appointment</label>
            <input type="date" id="medical" name="medical" style="margin-left: 25px; width: 100px;"><br><br>

            <label for="cell">Court Appointment</label>
            <input type="date" id="court" name="court" style="margin-left: 25px; width: 100px;"><br><br>

            <label for="material">Material Id</label>
            <input type="text" id="material" name="mat" style="width: 85px; margin-left: 35px;"><br><br>

            <input type="submit" value="+ Register Prisoner" name="add" class="registerbtn" style="margin-bottom: 20px;"><br><br>

        </form>
    </div>

    <?php
    include 'connection.php';

    if (isset($_POST['add'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $stat = $_POST['stat'];
        $sex = $_POST['sex'];
        $region = $_POST['region'];
        $zone = $_POST['zone'];
        $wereda = $_POST['wereda'];
        $medical = $_POST['medical-status'];
        $blood = $_POST['blood-type'];
        $reason = $_POST['reason'];
        $crime = $_POST['record'];
        $phone = $_POST['phone-of-cp'];
        $image = $_FILES['prisoner-image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_destination = "prisoner-images/" . $image_name;
        $entry = $_POST['entry-date'];
        $exit = $_POST['exit-date'];
        $cell = $_POST['cell-number'];
        $medical = $_POST['medical'];
        $court = $_POST['court'];
        $material = $_POST['mat'];

        $select = "SELECT * from prisoners WHERE prisoner_id='$id'";
        $result = mysqli_query($con, $select);

        if ($result->num_rows > 0) {
            echo "<script type='text/javascript'>
            alert('Prisoner Id is already on the list. Try using a different prisoner Id');
            window.location.href = 'prisoner-operations.php';
            </script>";
        } else {
            if(move_uploaded_file($image_tmp_name, $image_destination)) {
            $registerinput = "INSERT INTO prisoners (prisoner_id, status, fullname, Sex, Region, Zone, Wereda, Medical_status, blood_type,Reason_of_arrest, Criminal_record, phone_of_contacting_people, prisoner_image, Entry_Date, Exit_Date, Cell_number, Medical_appointment, Court_appointment ,Material_Id) VALUES ('$id','$stat','$fullname','$sex','$region','$zone','$wereda','$medical','$reason','$crime','$blood','$phone','$image_name','$entry','$exit', '$cell','$medical','$court','$material')";
            $afterregistration = mysqli_query($con, $registerinput);

            if ($afterregistration) {
                echo "<script type='text/javascript'>
                    alert('Prisoner was registered successfully!');
                    window.location.href = 'prisoner-operations.php';
                    </script>";
            } else {
                die(mysqli_error($con));
            }
            } 
            else {
                echo "<script type='text/javascript'>
                alert('Error uploading image.');
                </script>";
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