<?php

include 'connection.php';

if(isset($_POST('messageadmin'))){
    $admess = $_POST['messageadmin'];


}

if(isset($_POST('messagerecord'))){
    $remess = $_POST['messagerecord'];
}

if(isset($_POST('messagedes'))){
    $demess = $_POST['messagedescipline'];
}

if(isset($_POST('messagesec'))){
    $secmess = $_POST['messagesecurity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('Images/Blurred.jpg');
            background-size: cover;
        }

        .messageadmin,
        .messagerecord,
        .messagedescipline,
        .messagesecurity {
            text-align: center;
        }

        #messageadmin {
            background-color: beige;
        }

        #messagerecord {
            background-color: beige;
        }

        #messagedescipline {
            background-color: beige;
        }

        #messagesecurtiy {
            background-color: beige;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Forward messages from Prisoner</h1>
    <h2 style="text-align: center;">You may forward the message you have recieved from prisoner to other staffs.</h2>
    <div class="messageadmin">
        <form action="adminmessage.php" method="POST">
            <textarea name="messageadmin" id="messageadmin" rows="20" cols="100"></textarea><br><br>
            <input type="submit" value="Send to System Admin" name="messageadmin"><br><br><br><br>
        </form>
    </div>

    <div class="messagerecord">
        <form action="messagerecord.php" method="post">
            <textarea name="messagerecord" id="messagerecord" rows="20" cols="100"></textarea><br><br>
            <input type="submit" value="Send to Record Officer" name="messagerecord"><br><br><br><br>
        </form>
    </div>


    <div class="messagedescipline">
        <form action="messagedecipline.php" method="POST">
            <textarea name="messagedescipline" id="messagedescipline" rows="20" cols="100"></textarea><br><br>
            <input name="messagedes" type="submit" value="Send to Descipline Officer"><br><br><br><br>
        </form>
    </div>

    <div class="messagesecurity">
        <form action="messagesecurity.php" method="POST">
            <textarea name="messagesecurtiy" id="messagesecurtiy" rows="20" cols="100"></textarea><br><br>
            <input name="messagesec" type="submit" value="Send to Security Manager"><br><br><br><br>
        </form>
    </div>

</body>

</html>