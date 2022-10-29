<?php 
    include_once('conexao.php');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <title>Bem-Vindo</title>
</head>
<body>
<section class="content">
<div class="form-login">
    <h3>Seja bem-vindo</h3>
    <form class="form" method="post" action="login-logica.php">
        <input class="field" type="text" name="email" placeholder="Email"  maxlength="30">
        <input class="field" type="password" name="senha" placeholder="senha"  maxlength="15">
        <input type="submit" name="submit" value="Entrar">
        <div class="alerta">
            <?php
            session_start();
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <a href="cadastrar.php">Ainda não tem login, Cadastre-se. </a>
        <a href="index.php">Voltar</a>
    </form>
</div>
</section>
</body>
</html>