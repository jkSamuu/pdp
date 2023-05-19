<?php
    session_start();
    if(!isset($_SESSION['numRuo'])) header("location: login.php");
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
   $box = "";
   $box2 = "";

    $box .= "<section class='pdp container'>";
    //<!-- Contenuto -->
    $box .= "<div class='pdp-content'>";

   if($_SESSION['numRuo'] == 1){
        //<!-- box 1 -->
        $box .= "<div class='icon-box'>";
        $box .= "<a href = 'pdpForm.php'>";
        $box .= "<img src='img/icon-text.svg' alt='' class='icon-img'>";
        $box .= "<h2 class='icon-title'>Crea PDP</h2>";
        $box .= "</a>";
        $box .= "</div>";
    }
       // <!-- box 2 -->
   $box .= "<div class='icon-box'>";
   $box .= "<a href = 'pdpTutti.php'>";
   $box .= "<img src='img/icon-eye.svg' alt='' class='icon-img'>";
   $box .= "<h2 class='icon-title'>Visualizza PDP</h2>";
   $box .= "</a>";
   $box .= "</div>";

   $box .= "</div>";
   $box .= "</section>";

   echo $box;
   echo $_SESSION['numRuo'];
?>
</body>
</html>