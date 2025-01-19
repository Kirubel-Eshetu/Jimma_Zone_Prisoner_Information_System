<?php
include 'connection.php';
if (isset ($_POST['hitit'])) {
    $cellno = $_POST['cellno'];
    $intake = $_POST['intake'];
    $allocate = $_POST['allocated'];
    $freespace = $_POST['freespace'];

    $catch = "SELECT * from cell_management where cell_number='$cellno'";
    $recatch = mysqli_query($con, $catch);

    if($recatch->num_rows > 0){
        echo "<script type='text/javascript'>
        alert('Cell number is already assigned to a cell');
        window.location.href = 'addcell.php'
        </script>";
    }
    else{

    $put = "INSERT INTO cell_management  (cell_number, intake_capacity, allocated_prisoners, free_space) VALUES ('$cellno','$intake', '$allocate','$freespace')";
    $result = mysqli_query($con, $put);
    if($result){
        echo "<script type='text/javascript'>
        alert('Cell was registered successfully');
        window.location.href = 'cellmanagement.php'
        </script>";
    }
    else{
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
    <title>Add Prison Cell</title>
    <style>
        body{
            margin:0;
            padding: 0;
            background-image: url('Images/forcell.jpg');
            background-size:cover;
        }
        .form{
            margin: 0 auto;
            width: fit-content;
            font-size: 21.5px;
            margin-top: 30px;
            background-color: rgb(207, 232, 255);
        }
        #hititson{
            margin: 5px 0 0 150px;
            font-size: 23px;
            background-color: green;
            color: white;
            border: 1px solid black;
            border-radius: 50px;
            padding: 5px;
        }
        #google_translate_element{
            display: none;
        }
    </style>
</head>

<body>
        <h1 style="text-align: center;">New Prison cell registration</h1>
    <div class="form">
        <fieldset>
        <legend style="text-align: center; margin-bottom: 15px;">Fill the informations found below</legend>
    <form method="post">
        
        <label for="cellno">Cell Number</label>
        <input type="text" id="cellno" name="cellno" required style="margin-left: 105px;"><br><br>

        <label for="intake">Intake Capacity</label>
<input type="number" id="intake" name="intake" required style="margin-left: 82px;"><br><br>

<label for="allocated">No of allocated prisoners</label>
<input type="number" id="allocated" name="allocated" required><br><br>

<input type="hidden" id="freespace" name="freespace">

<input type="submit" name="hitit" value="Add Cell" id="hititson">
<script>
    // Function to calculate and update free space
    function updateFreeSpace() {
        var intake = parseInt(document.getElementById("intake").value);
        var allocated = parseInt(document.getElementById("allocated").value);
        var freespace = intake - allocated;

        
document.getElementById("freespace").value = freespace;

    }

    // Call the function initially to set the initial value
    updateFreeSpace();

    // Attach an event listener to both intake and allocated fields to update freespace
    document.getElementById("intake").addEventListener("input", updateFreeSpace);
    document.getElementById("allocated").addEventListener("input", updateFreeSpace);
</script>

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