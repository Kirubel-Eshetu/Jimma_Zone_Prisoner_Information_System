<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .searchresult {
            text-align: center;
            margin-top: 15px;
            border: 3px solid black;
            margin: 0 auto;
            width: 350px;
            position: relative; /* Make the container position relative */
        }
        .close-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: red; /* Change background color to white */
    cursor: pointer;
    width: 24px;
    height: 24px;
    border: none;
    padding: 0;
}

        
        .close-btn::before,
        .close-btn::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 16px;
            background-color: #000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
        }
        .close-btn::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }
        .noresult{
            margin-left: 200px;
            font-size: 25px;
            color: red;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
include 'connection.php';

if (isset($_POST['query'])) {
    $query = $_POST['query'];


    $results = $con->query("SELECT * FROM prisoners WHERE CONCAT_WS(' ', prisoner_id, firstname, middlename, lastname) LIKE '%$query%'");

    if ($results && $results->num_rows > 0) {
        echo "<div class='searchresult'>";
        echo "<button class='close-btn' onclick='closeSearchResult()'>&times;</button>"; // Close button
        while ($row = $results->fetch_assoc()) {
            echo "<p style='padding-left: 15px;'>Prisoner Id: {$row['prisoner_id']}</p>";  // Output search results
            echo "<p style='padding-left: 15px;'>Firstname: {$row['firstname']}</p>";
            echo "<p style='padding-left: 15px;'>Middlename: {$row['middlename']}</p>";
            echo "<p style='padding-left: 15px;'>Lastname: {$row['lastname']}</p>";
            echo "<br>";
        }
        echo "</div>";
    } else {
        echo "<p class='noresult'>No results found</p>";
    }
}
?>

<script>
    // Function to close the search result div
    function closeSearchResult() {
        var searchResultDiv = document.querySelector('.searchresult');
        if (searchResultDiv) {
            searchResultDiv.style.display = 'none';
        }
    }
</script>
