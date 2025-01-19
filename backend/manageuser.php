<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage user accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(Images/lightregister.jpg);
            background-size: cover;
            top: 40px;
        }

        .logout {
            text-decoration: none;
            color: white;
            background-color: red;
            border-radius: 50%;
            padding: 20px;
            font-size: 35px;
        }

        .contain {
            text-align: center;
        }

        #userTable {
            margin-bottom: 20px;
        }



        th,
        td {
            text-align: center;
            border: 2px solid black;
        }

        .update {
            text-align: center;
            margin-bottom: 8px;
        }

        .inactive-activate {
            display: flex;
            justify-content: space-between;
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

        #google_translate_element {
            display: none;
        }
    </style>
</head>

<body>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search user..." onkeyup="searchFunction()">
        <button id="searchButton" style="margin: 10px 0 0 130px; border-radius: 20px;">Search</button>
        <div id="searchResults"></div>
    </div>

    <div class="container">
        <button class="btn btn-primary my-3 ml-50 btn-lg"><a href="register.php" class="text-light" style="text-decoration: none; border-radius: 20px;">Add user</a></button>
    </div>

    <table id="userTable" class="table" style="width: 1270px; margin: 0 auto auto auto;">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Full name</th>
                <th>User name (Email)</th>
                <th>Password</th>
                <th>Phonenumber</th>
                <th>Role</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>

        <?php
        include 'connection.php';

        $sql = "Select * from users";
        $result = mysqli_query($con, $sql);
        if ($result) {

            while ($row = mysqli_fetch_assoc($result)) {

                $no = $row['#'];
                $id = $row['id'];
                $fullname = $row['fullname'];
                $username = $row['username'];
                $password = $row['password'];
                $phonenumber = $row['phonenumber'];
                $role = $row['role'];
                $status = $row['status'];

                echo ' <tr class="userRow">
                <th>' . $no . '</th>
        <td scope="row">' . $id . '</td>
        <td>' . $fullname . '</td>
        <td><a href="mailto:' . $username . '">' . $username . '</td>
        <td>' . $password . '</td>
        <td>' . $phonenumber . '</td>
        <td>' . $role . '</td>
        <td>' . $status . '</td>
        <td>
                <div class="update">
    <button class="btn btn-primary" type="submit" name="update"><a href="update.php? updateid=' . $id . '" class="text-light" style="text-decoration:none;">Update</a></button>
    
     </div>

       <div class="inactive-activate">
       <button class="btn btn-dark" type="submit" name="inactive"><a href="inactive-account.php? inactiveid=' . $id . '" class="text-light" style="text-decoration:none;">Inactive</a></button>
       <button class="btn btn-success" type="submit" name="activate"><a href="activate-account.php? activateid=' . $id . '" class="text-light" style="text-decoration:none;">Activate</a></button>
       </div>
       </td>
        </tr>';
            }
        }
        ?>
    </table>

    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('userTable');
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