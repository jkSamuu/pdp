<?php session_start()?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'pdpdatabase');
$idStud = "";

if(isset($_POST['creaP'])){
    $cognome= mysqli_real_escape_string($db, $_POST['cognome']);
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    $classe = mysqli_real_escape_string($db, $_POST['classe']);
    $aS = mysqli_real_escape_string($db, $_POST['aS']);
    $lNasc = mysqli_real_escape_string($db, $_POST['lNasc']);
    $data = $_POST['data'];
    $lingua1 = mysqli_real_escape_string($db, $_POST['lingua1']);
    $lingua2 = mysqli_real_escape_string($db, $_POST['lingua2']);

    $query = "INSERT INTO studenti (nome, cognome, matricola, luogoNascita, dataNascita, linguaMadre, secondaLingua, nazionalita) VALUES ('$nome', '$cognome', '1234', '$lNasc', '$data', '$lingua1', '$lingua2', '$lingua1');";
    mysqli_query($db, $query);

    $query = "SELECT c.idCls FROM classi c WHERE c.sigla = '$classe'";
    $ris = mysqli_query($db, $query);

    while($row = $ris->fetch_assoc()){
        $classe = $row['idCls'];
    }

    $query = "SELECT s.idStud FROM studenti s WHERE s.cognome = '$cognome' AND s.nome = '$nome' AND s.dataNascita = '$data'";
    $ris = mysqli_query($db, $query);

    while($row = $ris->fetch_assoc()){
        $idStud = $row['idStud'];
    }

    $query = "INSERT INTO pdp (idStud, idCls, numProg, stato) VALUES ('$idStud', '$classe', '1', '1');";
    mysqli_query($db, $query);

    $query = "UPDATE studenti s SET s.matricola = '$idStud' WHERE s.idStud = '$idStud'";
    mysqli_query($db, $query);

    header('location: index.php');
}
?>
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
<nav class="navbar">
    <!-- LOGO -->
    <div class="logo">PDP</div>
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <!-- NAVIGATION MENUS -->
        <div class="menu">
            <li><a href="index.php">Home</a></li>
            <li class="nav-item"><?php if(!isset($_SESSION['nome'])): ?><a href='login.php'>login</a></li><?php endif ?>
            <p><?php if(isset($_SESSION['nome'])): ?><a href="server.php?logout" class="logout">Logout (<?php echo $_SESSION['nome']." ". $_SESSION['cognome'];?>)</a><?php endif ?></p>
        </div>
    </ul>
</nav>

<p class='regi' align='center'>Creazione PDP</p>
<div class="mainL" style = "height: fit-content;">
    <form action="" method="post" class="form1">

        <input id='cognome' type='text' name='cognome' class='n' align='center' placeholder='Cognome' required> <br>

        <input id='nome' type='text' name='nome' class='n' align='center' placeholder='Nome' required> <br>

        <input id='classe' type='text' name='classe' class='n' align='center' placeholder='Classe' required> <br>

        <input id='aS' type='text' name='aS' class='n' align='center' placeholder='Anno Scolastico' required> <br>

        <input id='lNasc' type='text' name='lNasc' class='n' align='center' placeholder='Luogo di Nascita' required> <br>

        <input id='data' type='date' name='data' class='n' align='center' placeholder='Date' required> <br>

        <input id='lingua1' type='text' name='lingua1' class='n' align='center' placeholder='Lingua Madre' required> <br>

        <input id='lingua2' type='text' name='lingua2' class='n' align='center' placeholder='Eventuale bilinguismo'> <br>

        <input type='submit' name="creaP" value='Crea PDP' class='verifi'> <br><br>

    </form>
</div>
</body>
</html>
