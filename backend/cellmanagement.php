<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cell-management</title>
    <link rel="stylesheet" href="css/cellmanagement.css">
</head>
<body>

    <h1 style="text-align:center;">Prison Cell Management</h1>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search Cell..." onkeyup="searchFunction()">
        <button id="searchButton" style="margin: 10px 0 0 130px; border-radius: 20px;">Search</button>
        <div id="searchResults"></div>
    </div>
    <div class="addbtn">
    <button id="addcell">Add Cell</button>
    </div>
        <script>
            document.getElementById("addcell").onclick=function(){
                location.href = 'addcell.php';
            }
        </script>
    <table id="cellTable">
        <tr>
    <th>#</th>
    <th>Cell Number</th>
    <th>Intake Capacity</th>
    <th>Number of Allocated Prisoners</th>
    <th>Free Space</th>
    <th>Operation</th>
    </tr>
<?php
include'connection.php';

$high = "SELECT * from cell_management";
$storing = mysqli_query($con, $high);
if($storing){
    while($contain = mysqli_fetch_assoc($storing)){
        $no = $contain['#'];
        $cellnumber = $contain['cell_number'];
        $intake = $contain['intake_capacity'];
        $number = $contain['allocated_prisoners'];
        $free = $contain['free_space'];
        echo'
<tr>
<th>'.$no.'</th>
<td>'.$cellnumber.'</td>
<td>'.$intake.'</td>
<td>'.$number.'</td>
<td>'.$free.'</td>
<td><button type="submit" name="update" id="upup"><a href="updatecell.php? updateno='.$cellnumber.'" class="up">Update</a></button></td>
</tr>

';
    }
}



?>
</table>
<script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('cellTable');
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