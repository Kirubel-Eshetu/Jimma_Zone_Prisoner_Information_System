<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Visitor Information</title>
    <link rel="stylesheet" href="css/managevisitor.css">
</head>

<body>
<div class="search-container">
        <input type="text" id="searchInput" placeholder="Search visitor..." onkeyup="searchFunction()">
        <button id="searchButton" style="margin: 10px 0 0 150px; border-radius: 20px;">Search</button>
        <div id="searchResults"></div>
    </div>
    <button id="addvisitor" type="submit" style="background-color: green; color: white; font-size: 25px;">Add visitor</button>
    <script>
        document.getElementById('addvisitor').onclick = function() {
            location.href = 'addvisitor.php';
        }
    </script>
    <div class="tablecontainer">
        <table id="visitorTable">
            <tr>
                <th>#</th>
                <th>Visitor Id</th>
                <th>Full Name</th>
                <th>Visiting</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Photo of Id Card</th>
                <th>Material Id</th>
                <th>Operation</th>
            </tr>

            <?php
            include 'connection.php';

            $selection = "SELECT * from visitors";
            $output = mysqli_query($con, $selection);


                while ($store = mysqli_fetch_assoc($output)) {

                    $no = $store['#'];
                    $vid = $store['visitor_id'];
                    $fullname = $store['fullname'];
                    $visiting = $store['visiting'];
                    $pno = $store['phonenumber'];
                    $email = $store['email'];
                    $idphoto = $store['photo_of_idcard'];
                    $matid = $store['material_id'];

                    echo '<tr>
        <th class="visitor">'.$no.'</th>
        <td >' . $vid . '</td>
        <td>' . $fullname . '</td>
        <td>'.$visiting.'</td>
        <td>' . $pno . '</td>
        <td><a href="mailto:' . $email . '">' . $email . '</td>
        <td><img src="visitor-idcard/' . $idphoto . '" alt="Visitor id-card" style="width: 200px; height: 100px;"></td>
        <td>'.$matid.'</td>
        <td> <button id="updatebtn" name="update" type="submit"><a href= "updatevisitorinfo.php? updateid=' . $vid . '" class="updatebtn">Update</a></button>
    
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
            table = document.getElementById('visitorTable');
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