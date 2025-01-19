<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inmate Information</title>
    <link rel="stylesheet" href="css/prisoner-operations.css">
</head>

<body>
    <div class="container">
        <h1>Manage Inmate Information</h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search Prisoner..." onkeyup="searchFunction()">
            <button id="searchButton" style="margin: 10px 0 0 150px; border-radius: 20px;">Search</button>
            <div id="searchResults"></div>
        </div>

        <div class="add-button">
            <a href="addprisoner.php">Add Prisoner</a>
        </div>
        <div class="table-container" id="prisonerTable">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Prisoner Id</th>
                        <th>Full Name</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Region</th>
                        <th>Zone</th>
                        <th>Wereda</th>
                        <th>Medical Status</th>
                        <th>Blood Type</th>
                        <th>Reason of arrest</th>
                        <th>Criminal_record</th>
                        <th>Phone of contacting people</th>
                        <th>Prisoner Image</th>
                        <th>Entry Date</th>
                        <th>Exit Date</th>
                        <th>Cell Number</th>
                        <th>Medical appointment</th>
                        <th>Court appointment</th>
                        <th>Parole Point</th>
                        <th>Material Id</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';

                    $info = "SELECT * from prisoners";
                    $store = mysqli_query($con, $info);



                    while ($out = mysqli_fetch_assoc($store)) {

                        $no = $out['#'];
                        $pid = $out['prisoner_id'];
                        $fullname = $out['fullname'];
                        $stat = $out['Status'];
                        $sex = $out['Sex'];
                        $dob = $out['dob'];
                        $region = $out['Region'];
                        $zone = $out['Zone'];
                        $wereda = $out['Wereda'];
                        $Medical_status = $out['Medical_status'];
                        $Blood_type = $out['blood_type'];
                        $reason = $out['Reason_of_arrest'];
                        $record = $out['Criminal_record'];
                        $phone = $out['phone_of_contacting_people'];
                        $pri_image = $out['prisoner_image'];
                        $entry = $out['Entry_Date'];
                        $exit = $out['Exit_Date'];
                        $cell = $out['Cell_number'];
                        $medical = $out['Medical_appointment'];
                        $court = $out['Court_appointment'];
                        $materialid = $out['Material_Id'];
                        $parolepoint = $out['parole_points'];


                        echo '
        <tr>
        <th>' . $no . '</td>
        <td class="widthadd">' . $pid . '</td>
        <td>' . $fullname . '</td>
        <td>' . $stat . '</td>
        <td>' . $sex . '</td>
        <td class="dob">' . $dob . '</td>
        <td>' . $region . '</td>
        <td>' . $zone . '</td>
        <td>' . $wereda . '</td>
        <td>' . $Medical_status . '</td>
        <td>' . $Blood_type . '</td>
        <td>' . $reason . '</td>
        <td class="record">' . $record . '</td>
        <td>' . $phone . '</td>
        <td><img src="prisoner-images/' . $pri_image . '" alt="Prisoner Image" style="width: 200px; height: 200px;"></td>
        <td>' . $entry . '</td>
        <td>' . $exit . '</td>
        <td>' . $cell . '</td>
        <td>' .$medical.'</td>
        <td>' .$court .'</td>
        <td>' . $parolepoint . '</td>
        <td>' . $materialid . '</td>
        
        <td><div class="update-delete">
        <button type="submit" name="update" style="background-color: rgb(75, 75, 255); font-size: 30px; border: 2px solid black; padding: 15px; border-radius: 50%;"><a href="update-pri-info.php? updateid=' . $pid . '"style="text-decoration:none; color: white;">Update</a></button>
        
        </div></td>
        </tr>';
                    }



                    ?>
                </tbody>
            </table><br><br>
        </div>
    </div>
    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('prisonerTable');
            tr = table.getElementsByTagName('tr');

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td');
                for (var j = 0; j < td.length; j++) {
                    var cell = td[j];
                    if (cell) {
                        txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = '';
                            break; // Break out of inner loop since the row should be visible
                        } else {
                            tr[i].style.display = 'none';
                        }
                    }
                }
            }
        }

        document.getElementById('searchButton').addEventListener('click', function() {
            var input = document.getElementById('searchInput').value;
            // Perform search based on input value
            // For example, you can make an AJAX call to a PHP script to fetch search results
            alert('Searching for: ' + input);
        });
    </script>

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