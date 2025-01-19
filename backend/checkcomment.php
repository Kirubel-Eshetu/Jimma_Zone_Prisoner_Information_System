<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check comments and suggestions</title>
    <style>
        h1 {
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 1200px;

        }

        table,
        th,
        td {
            border: 3px solid rgb(20, 20, 140);
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            font-size: 21px;
            background-color: brown;
            color: white;
        }

        td {
            font-size: 19.5px;
            background-color: beige;
        }
        #google_translate_element{
            display: none;
        }

    </style>
</head>

<body>

    <h1>List of Comments and Suggestions</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Email address</th>
            <th>Comments or suggestions</th>
        </tr>
        <?php
        include 'connection.php';

        $mark = "SELECT * FROM comments";
        $contain = mysqli_query($con, $mark);

        while ($watch = mysqli_fetch_assoc($contain)) {

            $no = $watch['#'];
            $em = $watch['email_address'];
            $com = $watch['comments'];

            echo '
            <tr>
                <td>' . $no . '</td>
                <td><a href="mailto:' . $em . '">' . $em . '</a></td>
                <td>' . $com . '</td>
            </tr>';

        }


        ?>
    </table>
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
