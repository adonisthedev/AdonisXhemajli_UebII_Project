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
        </ul>
    </div>
    <div class="parent">
        <div class="form-wrapper">
            <?php
                if(isset($_POST['kycu'])){
                    login($_POST['emaili'], $_POST['fjalekalimi']);
                    
                    if(isset($_POST['rememberme'])){
                        $emaili = $_POST['emaili'];
                        $fjalekalimi = $_POST['fjalekalimi'];
                        
                        $expiration = time() + 3600;
                        setcookie("remembered_credentials", $emaili . '|' . $fjalekalimi, $expiration);
                    }

                } elseif (isset($_COOKIE['remembered_credentials'])) {
                    $credentials = explode('|', $_COOKIE['remembered_credentials']);
                    $emaili = $credentials[0];
                    $fjalekalimi = $credentials[1];
            
                    login($emaili, $fjalekalimi);
                }
            ?>
            <form id="totalforma" class="forma" method="post">
            <h1>Login</h1>

            <label for="email">Emaili:</label>
            <input type="email" id="emaili" name="emaili" >

            <label for="password">Fjalekalimi:</label>
            <input type="password" id="fjalekalimi" name="fjalekalimi" >

            <label for="rememberme"><input type="checkbox" name="rememberme"> Remember me</label>
    
            <input type="submit" name="kycu" id="kycu" value="Kyçu">
            </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>