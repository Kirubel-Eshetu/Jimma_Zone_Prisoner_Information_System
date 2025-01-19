<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the report on prisoner from the textarea
    $fullname = $_POST['fullname'];
    $reportOnPrisoner = $_POST['reportonprisoner'];
    $pid = $_POST['pid'];

    // Include TCPDF library
    require_once('tcpdf/tcpdf.php');

    // Create new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Jimma Zone Prisoner Information System');
    $pdf->SetAuthor('Jimma Zone Prison Administration');
    $pdf->SetTitle('Report on Prisoner' . $fullname);
    $pdf->SetSubject('Report on Prisoner' . $fullname);

    // Set header data
    $pdf->SetHeaderData('', 0, 'Jimma Zone Prison Administration');

    $pdf->Cell(0, 10, 'Jimma Zone Prisoner Information System', 0, 1, 'C');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', 'B', 12); // Set font to bold
    $pdf->Cell(0, 10, 'This report reperesents: ' . $fullname, 0, 1); // Add text before full name

    $pdf->SetFont('helvetica', 'B', 12); // Set font to bold
    $pdf->Cell(0, 10, 'Prisoner Id: ' . $pid, 0, 1); // Add text before full name

    $pdf->SetFont('helvetica', '', 12); // Reset font style
    $pdf->Ln();
    $pdf->MultiCell(0, 15, $reportOnPrisoner);

    // Close and output PDF
    $pdf->Output('report_on_prisoner.pdf', 'D');
    
    // Insert data into database
    $stmt = $con->prepare("INSERT INTO report (prisonerid, fullname, report ) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$pid, $fullname, $reportOnPrisoner, );
    $stmt->execute();
    $stmt->close();
    
    // Close database connection
    $con->close();
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Preparation Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('Images/backgroundcool.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;

        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 0;
        }

        .fullname {
            display: flex;
            flex-direction: row;
        }
        .pid {
            display: flex;
            flex-direction: row;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            height: 300px;
            padding: 10px;
            margin-left: -10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        #google_translate_element {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Report Preparation</h1>
        <h2>Write the report here.</h2>
        <form action="" method="POST">

            <div class="fullname">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" style="margin-left: 28px; width: 200px;">
            </div><br>
            <div class="pid">
                <label for="pid">Prisoner Id:</label>
                <input type="text" id="pid" name="pid" style="margin-left: 20px; width: 200px;">
            </div><br><br>
            <label for="reportonprisoner">Report on Prisoner:</label>
            <textarea name="reportonprisoner" id="reportonprisoner" autocomplete="off" required></textarea>
            <button type="submit" name="prepare">Save Report as PDF</button>
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