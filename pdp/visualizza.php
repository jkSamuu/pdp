<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/file.css" type="text/css"/>
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
<?php
    $idStud = $_REQUEST['id'];

    $db = mysqli_connect('localhost', 'root', '', 'pdpdatabase');

    $query = "SELECT s.nome, s.cognome, s.luogoNascita, s.dataNascita, s.linguaMadre, s.secondaLingua, c.sigla FROM studenti s, classi c, pdp p WHERE s.idStud = '$idStud' AND p.idStud = s.idStud AND p.idCls = c.idCls";
    $ris = mysqli_query($db, $query);

    while($row = $ris->fetch_assoc()){
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        $luogoNascita = $row['luogoNascita'];
        $dataNascita = $row['dataNascita'];
        $linguaMadre = $row['linguaMadre'];
        $secondaLingua = $row['secondaLingua'];
        $classe = $row['sigla'];
    }

    $descr = "";
    $altreRelazioni = "";
    $interventiRiabilitativi = "";

    $query = "SELECT d.descr, d.altreRel, d.intervRiab FROM studenti s, diagnosi d, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = d.idPdp";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) != 0) {
        while ($row = $ris->fetch_assoc()) {
            $descr = $row['descr'];
            $altreRelazioni = $row['altreRel'];
            $interventiRiabilitativi = $row['intervRiab'];
        }
    }

    $pres = "";
    $forzaP = "";
    $fragP = "";
    $bisogni = "";
    $clima = "";
    $extra = "";

    $query = "SELECT i.presento, i.forzaP, i.fragilitaP, i.bisogni, i.clima, i.extrascuola FROM studenti s, informazionipers i, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = i.idPdp";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) != 0) {
        while ($row = $ris->fetch_assoc()) {
            $pres = $row['presento'];
            $forzaP = $row['forzaP'];
            $fragP = $row['fragilitaP'];
            $bisogni = $row['bisogni'];
            $clima = $row['clima'];
            $extra = $row['extrascuola'];
        }
    }

    $box = "";

    $box.="<p class='regi' align='center'>Modifica PDP</p>";
    $box.="<div class = 'mainLL'>";
    $box.="<div class='spata' style = 'height: fit-content;'>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";

    $box.="<form action='' method='post' class='form1'>";

    $box.="<input id='cognome' value='$cognome' type='text' name='cognome' class='n' align='center' placeholder='Cognome' readonly> <br>";
    $box.="<input id='nome' value='$nome' type='text' name='nome' class='n' align='center' placeholder='Nome' readonly> <br>";
    $box.="<input id='classe' value='$classe' type='text' name='classe' class='n' align='center' placeholder='Classe' readonly> <br>";
    $box.="<input id='lNasc' value='$luogoNascita' type='text' name='lNasc' class='n' align='center' placeholder='Luogo di Nascita' readonly> <br>";
    $box.="<input id='data' value='$dataNascita' type='date' name='data' class='n' align='center' placeholder='Date' readonly> <br>";
    $box.="<input id='lingua1' value='$linguaMadre' type='text' name='lingua1' class='n' align='center' placeholder='Lingua Madre' readonly> <br>";
    $box.="<input id='lingua2' value='$secondaLingua' type='text' name='lingua2' class='n' align='center' placeholder='Eventuale bilinguismo' readonly> <br>";

    $box.="</form>";
    $box.="</div>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Aggiornamenti diagnostici</p>";
    $box.="<textarea class='diag' id='aggD' name='diagn' class='n' align='center' readonly>$descr</textarea> <br>";
    $box.="<p align='center'>Altre relazioni cliniche</p>";
    $box.="<textarea class='diag' id='relCl' type='textarea' name='altreRel' class='n' align='center' readonly>$altreRelazioni</textarea> <br>";
    $box.="<p align='center'>Interventi riabilitativi</p>";
    $box.="<textarea class='diag' id='interv' type='textare' name='intervRiab' class='n' align='center' readonly>$interventiRiabilitativi</textarea> <br>";

    $box.="</form>";
    $box.="</div>";
    $box.="</div>";

    $box.="<div class='spata' style = 'height: fit-content;'>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Mi presento</p>";
    $box.="<textarea class='diag' id='aggD' name='pres' class='n' align='center' readonly>$pres</textarea> <br>";
    $box.="<p align='center'>Punti di forza</p>";
    $box.="<textarea class='diag' id='relCl' type='textarea' name='forzaP' class='n' align='center' readonly>$forzaP</textarea> <br>";
    $box.="<p align='center'>Punti di fragilita</p>";
    $box.="<textarea class='diag' id='interv' type='textarea' name='fragP' class='n' align='center' readonly>$fragP</textarea> <br>";
    $box.="<p align='center'>Bisogni (cosa chiedo ai miei insegnanti)</p>";
    $box.="<textarea class='diag' id='interv' type='textarea' name='bisogni' class='n' align='center' readonly>$bisogni</textarea> <br>";

    $box.="</form>";
    $box.="</div>";

    $box.="<div class='spata2' style = 'height: fit-content;'>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Clima di classe</p>";
    $box.="<textarea class='diag2' id='interv' type='textarea' name='fragP' class='n' align='center' readonly>$clima</textarea> <br>";

    $box.="</form>";
    $box.="</div>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Extrascuola</p>";
    $box.="<textarea class='diag2' id='interv' type='textarea' name='fragP' class='n' align='center' readonly>$extra</textarea> <br>";

    $box.="</form>";
    $box.="</div>";

    $box.="</div>";

    $box.="</div>";

    $box.="</div>";

    $box.="<div class = 'inp'>";

    if($_SESSION['numRuo'] == 1 || $_SESSION['numRuo'] == 2)  $box.="<a href = 'modifica.php?id=$idStud' class='verifi'>Modifica</a>";
    $box.="<a href='exportWord.php?id=$idStud'><input type='submit' name='modP' value='Scarica File' class='modifi'></a>";

    $box.="</div>";

    echo $box;
    ?>
</body>
</html>
