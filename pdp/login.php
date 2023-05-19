<?php include('server.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link href="css/file.css" rel="stylesheet" type="text/css"/>
    <title>Document</title>

</head>
<body>
    <p class='regi' align='center'>Creazione PDP per studenti</p>
    <p align='center'>(E' necessario effettuare il login prima di procedere)</p>

    <center>
        <br><br>
        <img src="img/fotoLog.jpg" width="492" height="656" style="border-radius: 20px; border: 3px solid black">
    </center>

    <p class='regi' align='center'>Login</p><br><br>
    <div class="mainLog">
            <form action="" method="post" class="form1" style = "height: fit-content">

                <input id='email' type='text' name='userE' class='n' align='center' placeholder='Email' required> <br>

                <input id='pass' type='password' name='pass' class='pass' align='center' placeholder='Password' required> <br>

                <input type='submit' name="log" value='Invia' class='verifi'> <br><br>

                <p class = "error"><?php if($_SESSION['error'] != ""): ?><?php echo $_SESSION["error"]; ?></p><?php endif ?>
            </form>
        </div>
</body>
</html>