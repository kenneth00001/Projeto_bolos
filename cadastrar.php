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

<div class="cadastro">
    <h3>Cadastrar</h3>
    <form class="form" method="post" action="cadastrar-logica.php"><!-- Action tem a função de eviar dados -->
        <input class="field" type="text" name="nome" placeholder="Nome completo" maxlength="50">
        <input class="field" type="email" name="email" placeholder="email" maxlength="40">
        <input class="field" type="tel" name="telefone" placeholder="Telefone" maxlength="30">
        <input class="field" type="password" name="senha" placeholder="senha" maxlength="15">
        <input class="field" type="password" name="senhac" placeholder="Confirmar senha">
        <input type="submit" value="cadastrar" name="submit">
        <div class="alerta">
            <?php
            session_start();
            if(isset($_SESSION['msgf'])){
                echo $_SESSION['msgf'];
                unset($_SESSION['msgf']);
            }
            ?>
        </div>
        <a href="login.php">Já é cliente, faça login.  </a>
        <a href="index.php">Voltar</a>
    </form>
</div>
</section>
</body>
</html>