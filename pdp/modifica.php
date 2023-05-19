<?php
    session_start();
    $idStud = $_REQUEST['id'];
    $_SESSION['idStud'] = $idStud;
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'pdpdatabase');
$idPdp = "";

$query = "SELECT p.idPdp FROM studenti s, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud";
$ris = mysqli_query($db, $query);

while($row = $ris->fetch_assoc()) $idPdp = $row['idPdp'];

if(isset($_POST['modP'])) {
    $cognome = mysqli_real_escape_string($db, $_POST['cognome']);
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    $classe = mysqli_real_escape_string($db, $_POST['classe']);
    $lNasc = mysqli_real_escape_string($db, $_POST['lNasc']);
    $data = $_POST['data'];
    $lingua1 = mysqli_real_escape_string($db, $_POST['lingua1']);
    $lingua2 = mysqli_real_escape_string($db, $_POST['lingua2']);

    $query = "UPDATE studenti s, classi cl,  pdp p SET s.nome = '$nome', s.cognome = '$cognome', p.idCls = '$classe', s.luogoNascita = '$lNasc', s.dataNascita = '$data', s.linguaMadre = '$lingua1', s.secondaLingua = '$lingua2' WHERE s.idStud = '$idStud' AND p.idStud = s.idStud AND p.idCls = cl.idCls";
    mysqli_query($db, $query);
}
if(isset($_POST['modP2'])) {
    $diagn = mysqli_real_escape_string($db, $_POST['diagn']);
    $altreRel = mysqli_real_escape_string($db, $_POST['altreRel']);
    $intervRiab = mysqli_real_escape_string($db, $_POST['intervRiab']);

    $query = "SELECT d.descr, d.altreRel, d.intervRiab FROM studenti s, diagnosi d, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = d.idPdp";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) == 0){
        $query = "INSERT INTO diagnosi (idPdp, descr, altreRel, intervRiab) VALUES ('$idPdp', '$diagn', '$altreRel', '$intervRiab')";
        mysqli_query($db, $query);
    }
    else{
        $query = "UPDATE diagnosi d SET d.descr = '$diagn', d.altreRel = '$altreRel', d.intervRiab = '$intervRiab' WHERE d.idPdp = '$idPdp'";
        mysqli_query($db, $query);
    }
}

if(isset($_POST['modP3'])) {
    $pres = mysqli_real_escape_string($db, $_POST['pres']);
    $forzaP = mysqli_real_escape_string($db, $_POST['forzaP']);
    $fragP = mysqli_real_escape_string($db, $_POST['fragP']);
    $bisogni = mysqli_real_escape_string($db, $_POST['bisogni']);

    $query = "SELECT * FROM studenti s, informazionipers i, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = i.idPdp";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) == 0){
        $query = "INSERT INTO informazionipers (presento, forzaP, fragilitaP, idPdp, bisogni, clima, extrascuola) VALUES ('$pres', '$forzaP', '$fragP', '$idPdp', '$bisogni', '', '')";
        mysqli_query($db, $query);
    }
    else{
        $query = "UPDATE informazionipers i SET i.presento = '$pres', i.forzaP = '$forzaP', i.fragilitaP = '$fragP', i.bisogni = '$bisogni' WHERE i.idPdp = '$idPdp'";
        mysqli_query($db, $query);
    }
}

if(isset($_POST['modP4'])) {
    $clima = mysqli_real_escape_string($db, $_POST['clima']);

    $query = "SELECT * FROM studenti s, informazionipers i, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = i.idPdp";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) == 0){
        $query = "INSERT INTO informazionipers (clima) VALUES ('$clima')";
        mysqli_query($db, $query);
    }
    else{
        $query = "UPDATE informazionipers i SET i.clima = '$clima' WHERE i.idPdp = '$idPdp'";
        mysqli_query($db, $query);
    }
}
if(isset($_POST['modP5'])) {
    $extra = mysqli_real_escape_string($db, $_POST['extra']);

    $query = "SELECT * FROM studenti s, informazionipers i, pdp p WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = i.idPdp";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) == 0){
        $query = "INSERT INTO informazionipers (extrascuola) VALUES ('$extra')";
        mysqli_query($db, $query);
    }
    else{
        $query = "UPDATE informazionipers i SET i.extrascuola = '$extra' WHERE i.idPdp = '$idPdp'";
        mysqli_query($db, $query);
    }
}
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

    $box.="<input id='cognome' value='$cognome' type='text' name='cognome' class='n' align='center' placeholder='Cognome'> <br>";
    $box.="<input id='nome' value='$nome' type='text' name='nome' class='n' align='center' placeholder='Nome'> <br>";
    $box.="<input id='classe' value='$classe' type='text' name='classe' class='n' align='center' placeholder='Classe'> <br>";
    $box.="<input id='lNasc' value='$luogoNascita' type='text' name='lNasc' class='n' align='center' placeholder='Luogo di Nascita'> <br>";
    $box.="<input id='data' value='$dataNascita' type='date' name='data' class='n' align='center' placeholder='Date'> <br>";
    $box.="<input id='lingua1' value='$linguaMadre' type='text' name='lingua1' class='n' align='center' placeholder='Lingua Madre'> <br>";
    $box.="<input id='lingua2' value='$secondaLingua' type='text' name='lingua2' class='n' align='center' placeholder='Eventuale bilinguismo'> <br>";

    $box.="<input type='submit' formmethod='post' name='modP' value='Modifica' class='modifi'>";

    $box.="</form>";
    $box.="</div>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Aggiornamenti diagnostici</p>";
    $box.="<textarea class='diag' id='aggD' name='diagn' class='n' align='center'>$descr</textarea> <br>";
    $box.="<p align='center'>Altre relazioni cliniche</p>";
    $box.="<textarea class='diag' id='relCl' type='textarea' name='altreRel' class='n' align='center'>$altreRelazioni</textarea> <br>";
    $box.="<p align='center'>Interventi riabilitativi</p>";
    $box.="<textarea class='diag' id='interv' type='textare' name='intervRiab' class='n' align='center'>$interventiRiabilitativi</textarea> <br>";

    $box.="<input type='submit' formmethod='post' name='modP2' value='Modifica' class='modifi'>";

    $box.="</form>";
    $box.="</div>";
    $box.="</div>";

    $box.="<div class='spata' style = 'height: fit-content;'>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Mi presento</p>";
    $box.="<textarea class='diag' id='aggD' name='pres' class='n' align='center'>$pres</textarea> <br>";
    $box.="<p align='center'>Punti di forza</p>";
    $box.="<textarea class='diag' id='relCl' type='textarea' name='forzaP' class='n' align='center'>$forzaP</textarea> <br>";
    $box.="<p align='center'>Punti di fragilita</p>";
    $box.="<textarea class='diag' id='interv' type='textarea' name='fragP' class='n' align='center'>$fragP</textarea> <br>";
    $box.="<p align='center'>Bisogni (cosa chiedo ai miei insegnanti)</p>";
    $box.="<textarea class='diag' id='interv' type='textarea' name='bisogni' class='n' align='center'>$bisogni</textarea> <br>";

    $box.="<input type='submit' formmethod='post' name='modP3' value='Modifica' class='modifi'>";

    $box.="</form>";
    $box.="</div>";

    $box.="<div class='spata2' style = 'height: fit-content;'>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Clima di classe</p>";
    $box.="<textarea class='diag2' id='interv' type='textarea' name='clima' class='n' align='center'>$clima</textarea> <br>";
    $box.="<input type='submit' formmethod='post' name='modP4' value='Modifica' class='modifi'>";

    $box.="</form>";
    $box.="</div>";

    $box.="<div class='mainL' style = 'height: fit-content;'>";
    $box.="<form action='' method='post' class='form1'>";

    $box.="<p align='center'>Extrascuola</p>";
    $box.="<textarea class='diag2' id='interv' type='textarea' name='extra' class='n' align='center'>$extra</textarea> <br>";
    $box.="<input type='submit' formmethod='post' name='modP5' value='Modifica' class='modifi'>";

    $box.="</form>";
    $box.="</div>";

    $box.="</div>";

    $box.="</div>";

    $box.="</div>";


    $box.="<div class = 'inp'>";
    $box.="<a href='exportWord.php?id=$idStud'><input type='submit' name='modP' value='Scarica File' class='modifi'></a>";
    $box.="</div>";

    echo $box;
?>
</body>
</html>
