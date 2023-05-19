<?php
session_start();
$doc_body ="
<img id= 'logo1' src='img/Iniziale Logo 650.jpg'/>
 ";

$idStud= $_SESSION['idStud'];
?>

<head>
<link rel="stylesheet" href="style.css" />
<link href="css/file.css" rel="stylesheet" type="text/css"/>

    <style>
        .annoSc{
            border-color: black;
        }
        .input-button{
            margin-top: 10px;
            font-weight: 700;
            color: rgb(250,250,250);
            cursor: pointer;
            border-radius: 5em;
            background-color: black;
            border: 2px solid black;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
            box-shadow: 0px 0px 0px 2px rgb(0 0 0 / 4%);
            width: 300px;
            text-align:center;
            margin-bottom: 20px;
        }
        .input-button:hover{
            background-color: rgb(250,250,250);
            color: black;
        }

    </style>
</head>
<center>
<form name="proposal_form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"">
<input type="submit" name="submit_docs" value="Export as MS Word" class="input-button" />
</form>

<?php

$db = mysqli_connect('localhost', 'root', '', 'pdpdatabase');
$query1 = "SELECT nome, cognome, luogoNascita, dataNascita, linguaMadre, nazionalita, matricola FROM studenti WHERE idStud = '$idStud' ";
$ris = mysqli_query($db, $query1);

$nome = "";
$cognome = "";
$luogoNascita = "";
$dataNascita = "";
$linguaMadre = "";
$nazionalita = "";
$matricola = "";


while($row = $ris->fetch_assoc()){
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $luogoNascita = $row['luogoNascita'];
    $dataNascita = $row['dataNascita'];
    $linguaMadre = $row['linguaMadre'];
    $nazionalita = $row['nazionalita'];
    $matricola = $row['matricola'];
}

$sigla = "";
$query = "SELECT c.sigla FROM classi c, pdp p , studenti s WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idCls = c.idCls";
$ris = mysqli_query($db, $query);
while($row = $ris->fetch_assoc()){ $sigla = $row['sigla'];}


$annoSc = "";
$query = "SELECT a.desc FROM anniscolastici a, classi c, pdp p , studenti s WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idCls = c.idCls AND c.idASc = a.idASc";
$ris = mysqli_query($db, $query);
while($row = $ris->fetch_assoc()){ $annoSc = $row['desc'];}

$coordN = "";
$coordC = "";
$query = "SELECT d.nome, d.cognome FROM docenti d, classi c, pdp p , studenti s WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idCls = c.idCls AND c.idCoord = d.idDoc";
$ris = mysqli_query($db, $query);
while($row = $ris->fetch_assoc()){
    $coordN = $row['nome'];
    $coordC = $row['cognome'];
}

$aggD = "";
$altreR = "";
$intervR = "";
$query = "SELECT DISTINCT d.descr, d.altreRel, d.intervRiab FROM diagnosi d, pdp p , studenti s WHERE s.idStud = '$idStud' AND s.idStud = p.idStud AND p.idPdp = d.idPdp";
$ris = mysqli_query($db, $query);
while($row = $ris->fetch_assoc()){
    $aggD = $row['descr'];
    $altreR = $row['altreRel'];
    $intervR = $row['intervRiab'];
}

if(isset($_POST['submit_docs'])){
    header("Content-Type: application/vnd.msword");
    header("Expires: 0");//no-cache
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
    header("content-disposition: attachment;filename=pdp_matricolaN.$matricola.doc");
}

$prese = "";
$pForza = "";
$pDebole = "";
$chiedo = "";
$clima = "";
$extra = "";
$query = "SELECT DISTINCT inf.presento, inf.forzaP, inf.fragilitaP, inf.bisogni, inf.clima, inf.extrascuola FROM informazionipers inf, pdp p , studenti s WHERE inf.idPdP = p.idPdp AND p.idStud = s.idStud AND s.idStud = '$idStud' ";
$ris = mysqli_query($db, $query);
while($row = $ris->fetch_assoc()){
    $prese = $row['presento'];
    $pForza = $row['forzaP'];
    $pDebole = $row['fragilitaP'];
    $chiedo = $row['bisogni'];
    $clima = $row['clima'];
    $extra = $row['extrascuola'];
}

$spazio= "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";
$spazio2 = "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";
$spazio3 = "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";

echo "<html>";
echo "$doc_body";
//PAG. 1
echo "<div style='width: 450px; justify-content: center; border: solid; border-color: black; margin-left:30px;display: flex;
    flex-direction: column;
    align-items: center;
    height: fit-content;'>
     <h1 style='text-align: center'><b>P.D.P.</b></h1>
     <br>
     <h1 style='text-align: center; font-size: 20px;'><b>PIANO DIDATTICO PERSONALIZZATO</b></h1>
     <h1 style='text-align: center; font-size: 15px;'><b>Per allievi con Disturbi Specifici di Apprendimento (DSA-Legge 170/2010)</b></h1>
     <img id= 'logo1' src='img/gears.PNG'/>
     <h1 style='text-align: center; font-size: 20px;'><b>Istituto ITALO CALVINO</b></h1>
     <h1 style='text-align: center; font-size: 20px;'><b>A.S. $annoSc</b></h1> \t \t \n <br>
     </div>
     <br>
     <br>
     <b style='font-size: 25px;'>Alunno/a: $nome  $cognome</b> \t \t \n <br>
     <br>
     <br>
     <h1 style='font-size: 23px'><b>Classe: $sigla</b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>Coordinatore di classe/Team: $coordN $coordC</b></h1> \t \t \n 
     <h1 style='font-size: 18px'><b>Referente/i DSA/BES CORNOLTI MARIA GRAZIA - FILIPPI FRANCESCA</b></h1> \t \t \n
     <h1 style='font-size: 18px'><b>Coordinatore GLI: </b></h1> \t \t \n <br>
     <br>
     <!-- //PAG. 2 -->
     <h1 style='font-size: 20px'><b>Sommario</b></h1> \t \t \n
     <h1 style='font-size: 13px'><b>SEZIONE A $spazio $spazio3 $spazio3 &emsp;&emsp; 3</b></h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE A1: IL CONTESTO$spazio $spazio2 &emsp;4</h1> \t \t \n 
     <h1 style='font-size: 13px'>SEZIONE B $spazio $spazio3 $spazio3 &emsp;&emsp;6</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;Descrizione delle abilita' e dei comportamenti$spazio $spazio3 6</h1> \t \t \n 
     <h1 style='font-size: 13px'>SEZIONE C $spazio $spazio3 $spazio3 &emsp;&emsp;9</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;C.1 Osservazione di Ulteriori Aspetti Significativi $spazio3 $spazio3 &emsp;&emsp;&emsp;&emsp;9</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;C. 2 PATTO EDUCATIVO $spazio $spazio3&emsp; &emsp; &emsp;&emsp;&emsp;&emsp; 10</h1> \t \t \n 
     <h1 style='font-size: 13px'>SEZIONE D - INTERVENTI EDUCATIVI E DIDATTICI $spazio&emsp; &emsp; &emsp;&emsp; 11</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE D1 - Strategie didattiche ed organizzative inclusive $spazio &emsp; &emsp; &ensp; &emsp;11</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE D2 - Strumenti compensativi e misure dispensative $spazio &emsp; &emsp; &ensp; &emsp;12</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE D3 - Indicazioni per la verifica e la valutazione $spazio &emsp; &emsp; &emsp; &ensp; &ensp; &ensp;14</h1> \t \t \n 
     <h1 style='font-size: 13px; font-weight: normal'>&ensp;AZIONI SUL CONTESTO CLASSE (Verso una didattica inclusiva) $spazio &emsp;&ensp;16</h1> \t \t \n 
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <!-- //PAG. 3 -->
     <h1 style='font-size: 25px'><b>SEZIONE A</b></h1> \t \t \n 
     <h1 style='font-size: 25px'>Dati Anagrafici e Informazioni Essenziali di Presentazione dell' Allievo/a</h1> \t \t \n <br>
     <br>
     <br>
     <b style='font-size: 25px;'>Cognome e nome allievo/a: $cognome  $nome</b> \t \t \n <br>
     <h1 style='font-size: 23px'><b>luogo di nascita: $luogoNascita &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Data: $dataNascita</b></h1> \t \t \n 
     <h1 style='font-size: 18px'><b>Lingua madre: $linguaMadre</b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>1)<u> INDIVIDUAZIONE DELLA SITUAZIONE DI BISOGNO EDUCATIVO SPECIALE DA PARTE DI:</u></b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>CODICE ICD10: </b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>Aggiornamenti diagnostici: $aggD </b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>Altre relazioni cliniche: $altreR  </b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>Interventi riabilitativi: $intervR </b></h1> \t \t \n <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <h1 style='font-size: 18px'><b>2)<u> INFORMAZIONI GENERALI FORNITE DALLA FAMIGLIA / ENTI AFFIDATARI</u></b></h1> \t \t \n <br>
     <h1 style='font-size: 18px'><b>(ad esempio percorso scolastico pregresso, ripetenze,...)</b></h1> \t \t \n <br>
     <div style='width: 600px; justify-content: center; border: solid ; border-color: black; margin-left:30px;display: flex; flex-direction: column; align-items: center; height: fit-content;'>    
     <!-- //PAG. 4 -->
     <h1 style='text-align: left; font-size: 20px;'><b>SEZIONE A1: IL CONTESTO</b></h1>
     <h1 style='text-align: center; font-size: 15px;'><b>CONTESTO 1: L'ALLIEVO/L'ALLIEVA - <u>CENNI AUTOBIOGRAFICI</u></b></h1>
     <h1 style='text-align: center; font-size: 20px;'><b><u>INFORMAZIONI FORNITE DALL'ALUNNO/STUDENTE: MI PRESENTO</u></b></h1>
     <h1 style='text-align: center; font-size: 20px;'><b>(Da compilare insieme agli allievi)</b></h1> \t \t \n <br>
     <h1 style='text-align: left; font-size: 15px;'><b>Chi sono; quali Interessi, difficolta', attivita' preferite;<br>
      Quando sono soddisfatto; quando sto bene<br>
      Che cosa non mi piace; che cosa mi e' di aiuto; che cosa mi e' difficile<br>
      Che cosa vorrei che succedesse; che cosa mi aspetto dalla scuola, dagli insegnanti, dai compagni<br>
      Altro... :</b></h1>
      <h1 style='font-size: 18px; font-weight: normal'> $prese </h1> \t \t \n 
     <hr>
     <h1 style='font-size: 18px'>PER CONOSCERMI UN PO' MEGLIO: </h1> \t \t \n
     <h1 style='font-size: 18px'>I MIEI PUNTI DI FORZA</h1> 
     <h1 style='font-size: 18px; font-weight: normal'> $pForza </h1> \t \t \n 
     <h1 style='font-size: 18px'>I MIEI ASPETTI DI FRAGILITA'</h1> 
     <h1 style='font-size: 18px; font-weight: normal'> $pDebole </h1> \t \t \n 
     <h1 style='font-size: 18px'>BISOGNI/CHE COSA CHIEDO AI MIEI INSEGNANTI?</h1>
     <h1 style='font-size: 18px; font-weight: normal'> $chiedo </h1> \t \t \n 
     <hr>
     <h1 style='font-size: 18px'>IL CONTESTO 2: <u style='font-size: 13px'>CLIMA DI CLASSE</u></h1> \t \t \n 
     <h1 style='font-size: 18px'>I docenti possono descrivere alcuni aspetti caratterizzanti il clima di classe: relazioni e collaborazione tra pari, 
     modalita' comunicative e di gestione della classe; livello di coinvolgimento di tutti gli insegnanti e dei genitori</h1>
     <hr> <br>
     <h1 style='font-size: 18px; font-weight: normal'> $clima </h1> \t \t \n 
     <h1 style='font-size: 18px'>IL CONTESTO 3: <u style='font-size: 13px'>EXTRASCUOLA</u></h1> \t \t \n 
     <h1 style='font-size: 18px'>I docenti possono raccogliere informazioni significative, condivise con la famiglia e con altri soggetti coinvolti
     (sanitari, allenatori, educatori,.) su interessi, difficolta', punti di forza, aspettative, bisogni e modalita' di
     funzionamento dello studente in relazione ai contesti extrascolastici (famiglia, contesti sportivi, ludici,
     associazionismo ecc..)</h1>
     <hr> <br>
     <h1 style='font-size: 18px; font-weight: normal'> $extra </h1> \t \t \n 
     </div>";
?>

</center>
</html>














<!--
echo "<div style='width: 450px; justify-content: center; border: solid; border-color: black; margin-left:30px;display: flex;
    flex-direction: column;
    align-items: center;
    height: fit-content;'>";
echo "<h1 style='text-align: center'><b>P.D.P.</b></h1>";
echo "<br>";
echo "<h1 style='text-align: center; font-size: 20px;'><b>PIANO DIDATTICO PERSONALIZZATO</b></h1>";
echo "<h1 style='text-align: center; font-size: 15px;'><b>Per allievi con Disturbi Specifici di Apprendimento (DSA-Legge 170/2010)</b></h1>";
echo "<img id= 'logo1' src='img/gears.PNG'/>";
echo "<h1 style='text-align: center; font-size: 20px;'><b>Istituto ITALO CALVINO</b></h1>";
echo "<h1 style='text-align: center; font-size: 20px;'><b>A.S. $annoSc</b></h1> \t \t \n <br>";
echo "</div>";
echo "<br>";
echo "<br>";
echo "<b style='font-size: 25px;'>Alunno/a: $nome  $cognome</b> \t \t \n <br>";
echo "<br>";
echo "<br>";
echo "<h1 style='font-size: 23px'><b>Classe: $sigla</b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>Coordinatore di classe/Team: $coordN $coordC</b></h1> \t \t \n ";
echo "<h1 style='font-size: 18px'><b>Referente/i DSA/BES CORNOLTI MARIA GRAZIA - FILIPPI FRANCESCA</b></h1> \t \t \n ";
echo "<h1 style='font-size: 18px'><b>Coordinatore GLI: </b></h1> \t \t \n <br>";
echo "<br>";
//PAG. 2
echo "<h1 style='font-size: 20px'><b>Sommario</b></h1> \t \t \n ";
echo "<h1 style='font-size: 13px'><b>SEZIONE A $spazio $spazio3 $spazio3 &emsp;&emsp; 3</b></h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE A1: IL CONTESTO$spazio $spazio2 &emsp;4</h1> \t \t \n ";
echo "<h1 style='font-size: 13px'>SEZIONE B $spazio $spazio3 $spazio3 &emsp;&emsp;6</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;Descrizione delle abilita' e dei comportamenti$spazio $spazio3 6</h1> \t \t \n ";
echo "<h1 style='font-size: 13px'>SEZIONE C $spazio $spazio3 $spazio3 &emsp;&emsp;9</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;C.1 Osservazione di Ulteriori Aspetti Significativi $spazio3 $spazio3 &emsp;&emsp;&emsp;&emsp;9</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;C. 2 PATTO EDUCATIVO $spazio $spazio3&emsp; &emsp; &emsp;&emsp;&emsp;&emsp; 10</h1> \t \t \n ";
echo "<h1 style='font-size: 13px'>SEZIONE D - INTERVENTI EDUCATIVI E DIDATTICI $spazio&emsp; &emsp; &emsp;&emsp; 11</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE D1 - Strategie didattiche ed organizzative inclusive $spazio &emsp; &emsp; &ensp; &emsp;11</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE D2 - Strumenti compensativi e misure dispensative $spazio &emsp; &emsp; &ensp; &emsp;12</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;SEZIONE D3 - Indicazioni per la verifica e la valutazione $spazio &emsp; &emsp; &emsp; &ensp; &ensp; &ensp;14</h1> \t \t \n ";
echo "<h1 style='font-size: 13px; font-weight: normal'>&ensp;AZIONI SUL CONTESTO CLASSE (Verso una didattica inclusiva) $spazio &emsp;&ensp;16</h1> \t \t \n ";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
//PAG. 3
echo "<h1 style='font-size: 25px'><b>SEZIONE A</b></h1> \t \t \n ";
echo "<h1 style='font-size: 25px'>Dati Anagrafici e Informazioni Essenziali di Presentazione dell' Allievo/a</h1> \t \t \n <br>";
echo "<br>";
echo "<br>";
echo "<b style='font-size: 25px;'>Cognome e nome allievo/a: $cognome  $nome</b> \t \t \n <br>";
echo "<h1 style='font-size: 23px'><b>luogo di nascita: $luogoNascita &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Data: $dataNascita</b></h1> \t \t \n ";
echo "<h1 style='font-size: 18px'><b>Lingua madre: $linguaMadre</b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>1)<u> INDIVIDUAZIONE DELLA SITUAZIONE DI BISOGNO EDUCATIVO SPECIALE DA PARTE DI:</u></b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>CODICE ICD10: </b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>Aggiornamenti diagnostici: $aggD </b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>Altre relazioni cliniche: $altreR  </b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>Interventi riabilitativi: $intervR </b></h1> \t \t \n <br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1 style='font-size: 18px'><b>2)<u> INFORMAZIONI GENERALI FORNITE DALLA FAMIGLIA / ENTI AFFIDATARI</u></b></h1> \t \t \n <br>";
echo "<h1 style='font-size: 18px'><b>(ad esempio percorso scolastico pregresso, ripetenze,...)</b></h1> \t \t \n <br>";
echo "<div style='width: 600px; justify-content: center; border: solid ; border-color: black; margin-left:30px;display: flex;
           flex-direction: column;
             align-items: center;
             height: fit-content;'>";
         //PAG.4
echo "<h1 style='text-align: left; font-size: 20px;'><b>SEZIONE A1: IL CONTESTO</b></h1>";
echo "<h1 style='text-align: center; font-size: 15px;'><b>CONTESTO 1: L'ALLIEVO/L'ALLIEVA - <u>CENNI AUTOBIOGRAFICI</u></b></h1>";
echo "<h1 style='text-align: center; font-size: 20px;'><b><u>INFORMAZIONI FORNITE DALL'ALUNNO/STUDENTE: MI PRESENTO</u></b></h1>";
echo "<h1 style='text-align: center; font-size: 20px;'><b>(Da compilare insieme agli allievi)</b></h1> \t \t \n <br>";
echo "<h1 style='text-align: left; font-size: 15px;'><b>Chi sono; quali Interessi, difficolta', attivita' preferite;<br>
          Quando sono soddisfatto; quando sto bene;<br>
          Che cosa non mi piace; che cosa mi e' di aiuto; che cosa mi e' difficile;<br>
          Che cosa vorrei che succedesse; che cosa mi aspetto dalla scuola, dagli insegnanti, dai compagni;<br>
          Altro... :</b></h1>";
echo "<hr>";
echo "<h1 style='font-size: 18px'>PER CONOSCERMI UN PO' MEGLIO: </h1> \t \t \n";
echo "<h1 style='font-size: 18px'>I MIEI PUNTI DI FORZA</h1> ";
echo "<h1 style='font-size: 18px'>I MIEI ASPETTI DI FRAGILITA'</h1> ";
echo "<h1 style='font-size: 18px'>BISOGNI/CHE COSA CHIEDO AI MIEI INSEGNANTI?</h1>";
echo "<hr>";
echo "<h1 style='font-size: 18px'>IL CONTESTO 2: <u style='font-size: 13px'>CLIMA DI CLASSE</u></h1> \t \t \n ";
echo "<h1 style='font-size: 18px'>I docenti possono descrivere alcuni aspetti caratterizzanti il clima di classe: relazioni e collaborazione tra pari, //modalità comunicative e di gestione della classe; livello di coinvolgimento di tutti gli insegnanti e dei genitori</h1>";
echo "<hr> <br>";
echo "<h1 style='font-size: 18px'>IL CONTESTO 3: <u style='font-size: 13px'>EXTRASCUOLA</u></h1> \t \t \n ";
echo "<h1 style='font-size: 18px'>I docenti possono raccogliere informazioni significative, condivise con la famiglia e con altri soggetti coinvolti
(sanitari, allenatori, educatori,.) su interessi, difficolta', punti di forza, aspettative, bisogni e modalità di
funzionamento dello studente in relazione ai contesti extrascolastici (famiglia, contesti sportivi, ludici,
associazionismo ecc..)</h1>";
echo "<hr> <br>";
echo "</div>";
?>
-->