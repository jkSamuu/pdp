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
<section class="pdp container">
    <!-- Contenuto -->
    <div class="pdp-content">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'pdpdatabase');

        $numClasse = $_REQUEST['id'];

        $query = "SELECT s.idStud, s.nome, s.cognome FROM classi c, studenti s, pdp p WHERE c.idCls = p.idCls AND p.idStud = s.idStud AND c.idCls = '$numClasse'";
        $ris = mysqli_query($db, $query);

        while($row = $ris->fetch_assoc()){
            $idStud = $row['idStud'];
            $nome = $row['nome'];
            $cognome = $row['cognome'];

            $main = "";
            $main .= "<div class='icon-box'>";
            $main .= "<a href = 'visualizza.php?id=$idStud'>";
            $main .= "<img src='img/icon-eye.svg' alt='' class='icon-img'>";
            $main .= "<h2 class='icon-title'>$nome $cognome</h2>";
            $main .= "</a>";
            $main .= "</div>";

            echo $main;
        }
        ?>
    </div>
</section>
</div>
</body>
</html>
