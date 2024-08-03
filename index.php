<?php
//se inicia la session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" contrent="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/project/public/css/styles.css">
</head>
<body>
    
    <form class="form" method="post" action="./index.php">
        <?php 
        //verifica que la variable este en la session
            if(isset($_SESSION['error'])){?>
        <div class="error">
            
            <?php 
                //si esta, imprime el mensaje de error
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
        <?php }?>
        <div class="header-form">
            <img src="/project/public/img/logo.jpg" class="logo" alt="logo">
            <h1>Inicio de Sesion</h1>

        </div>
        <label for="usuario">Usuario</label>
        <input class="input usuario" id="usuario" placeholder="ingrese usuario" type="text" name="usuario" required>
        <label for="password">Contraseña</label>
        <input class="input password" id="password" placeholder="ingrese contraseña" type="password" name="password" required>
        <div class="session-btn">

            <button type="submit" class="btn-form">Entrar</button>
            <a class="recuperar" href="#">¿Olvidaste la contraseña?</a>
        </div>
        
    </form>
    
    </body>
    </html>
    
    <?php require './app/login.php' ?>
