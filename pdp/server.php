<?php
session_start();

$_SESSION['nome'] = "";
$_SESSION['cognome'] = "";
$_SESSION['error'] = "";
$_SESSION['numRuo'] = "";

$db = mysqli_connect('localhost', 'root', '', 'pdpdatabase');

if(isset($_POST['log'])){
    $email = mysqli_real_escape_string($db, $_POST['userE']);
    $password = mysqli_real_escape_string($db, $_POST['pass']);
    $idDoc = 0;
    //$password = md5($password);

    $query = "SELECT * FROM docenti WHERE email = '$email' AND password = '$password'";
    $ris = mysqli_query($db, $query);
    if(mysqli_num_rows($ris) == 1){

        $query = "SELECT nome, cognome, idDoc FROM docenti WHERE email = '$email' AND password = '$password'";
        $ris = mysqli_query($db, $query);


        while($row = $ris->fetch_assoc()){
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['cognome']  = $row['cognome'];
            $idDoc = $row['idDoc'];
        }

        $cognome = $_SESSION['cognome'];
        //ewrtfgiopioèiuytreyuiu
        $query = "SELECT r.idRuo FROM ruoli r, funzioni f, docenti d WHERE d.idDoc= '$idDoc' AND d.idDoc = f.idDoc and f.idRuo = r.idRuo";
        $ris = mysqli_query($db, $query);
        while($row = $ris->fetch_assoc()){
            $_SESSION['numRuo'] = $row['idRuo'];
        }

        header('location: index.php');
        //if($numRuo == 1)

        //else ;
    }
    else{
        $_SESSION['error'] = "Username o password errati";
    }

}
if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['nome']);
        unset($_SESSION['cognome']);
        unset($_SESSION['error']);
        unset($_SESSION['numRuo']);
        header('location: login.php');
}





