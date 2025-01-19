<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Parole Points</title>
</head>
<style>
    body{
        background-image: url(Images/forparole.jpg);
        background-size: cover;
    }
    table{
        width: 60%;
        margin: 0 auto;
        height: 300px;
        font-size: 18.5px;
    }
    td{
        text-align: center;
    }
    h1{
        text-align: center;
    }
    .widthextra{
        width: 150px;
    }
    .update-btn{
        background-color: blue;
        color: white;
        border-radius: 30px;
        padding: 5px;
        font-size: 15px;
    }
    .search-container {
            position: relative;
            margin: 20px auto;
            width: 500px;
        }

        #searchInput {
            width: calc(100% - 100px);
            padding: 10px;
            font-size: 16px;
            border: 1.5px solid #ccc;
            border-radius: 8px 0 0 8;
        }

        #searchButton {
            width: 100px;
            padding: 10px;
            background-color: #007acc;
            color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        #searchButton:hover {
            background-color: #005b82;
        }

        #searchResults {
            position: absolute;
            top: 100%;
            left: 0;
            width: calc(100% - 2px);
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            display: none;
        }

        .result-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        .result-item:hover {
            background-color: #f0f0f0;
        }
        #google_translate_element{
            display: none;
        }
    #google_translate_element{
        display: none;
    }
</style>
<body>
    <h1>Prisoners with their Parole Points</h1>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search prisoner..." onkeyup="searchFunction()">
        <button id="searchButton" style="margin: 10px 0 0 150px; border-radius: 20px;">Search</button>
        <div id="searchResults"></div>
    </div>
    <table id="paroleTable">
        <tr>
            <th>PID</th>
            <th>Full Name</th>
            <th>Parole Point</th>
            <th class="widthextra">Update</th>
        </tr>
        <?php
        include 'connection.php';

        if(isset($_POST['update'])) {
            $pid = $_POST['prisoner_id'];
            $parole = $_POST['parole_points'];

            // Update parole points in the database
            $update_query = "UPDATE prisoners SET parole_points = '$parole' WHERE prisoner_id = '$pid'";
            $result = mysqli_query($con, $update_query);

            if($result) {
                echo "<script>alert('Parole points updated successfully');</script>";
                // You may redirect the user or perform other actions after updating the parole points
            } else {
                echo "<script>alert('Failed to update parole points');</script>";
            }
        }

        $sel = "SELECT * FROM prisoners";
        $contain = mysqli_query($con, $sel);
        while($now = mysqli_fetch_assoc($contain)) {
            $pid = $now['prisoner_id'];
            $fullname = $now['fullname'];
            $parole = $now['parole_points'];

            echo '<tr>
                    <td>'.$pid.'</td>
                    <td>'.$fullname.'</td>
                    <td>'.$parole.'</td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="prisoner_id" value="'.$pid.'">
                            <input type="number" style="width: 75px;" name="parole_points" value="'.$parole.'" required>
                            <button type="submit" name="update" class="update-btn">Update</button>
                        </form>
                    </td>
                  </tr>';
        }
        ?>
    </table>
    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('paroleTable');
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
