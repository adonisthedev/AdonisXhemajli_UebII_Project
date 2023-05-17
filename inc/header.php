<?php include 'inc/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>Accura Lab</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php">
            <img src="images/accuranavlogo.PNG" alt="Accura Logo" />
        </a>

        <ul>
            <li><a href="index.php">Ballina</a></li>
            <li><a href="rrethnesh.php">Rreth Nesh</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <?php
                    if(isset($_SESSION['doktori'])){
                        echo "<li><a href='doktoret.php'>Doktoret</a></li>";
                        echo "<li><a href='pacientet.php'>Pacientet</a></li>";
                        if($_SESSION['doktori']['statusi']==1){
                            echo "<li><a href='kontrollat.php'>Kontrollat</a></li>"; 
                        }
                        echo "<li><a href='profilidoktor.php'>Profili</a></li>";
                        echo "<li><a id='dalja' href='#'>Dalja</a></li>";
                    }else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='regjistrohu.php'>Regjistrohu</a></li>";
                    }
                ?>
<!--             
            <li><a href="doktoret.php">Doktoret</a></li>
            <li><a href="pacientet.php">Pacientet</a></li>
            <li><a href="kontrollat.php">Kontrollat</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="regjistrohu.php">Regjistrohu  </a></li> -->
        </ul>
    </div>