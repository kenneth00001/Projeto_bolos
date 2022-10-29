<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['login']);
    header('location: index.php');
}
$logado = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>
<nav>
<h3>Bolo é carinho em forma de Comida</h3>
<div class="link">    
    <a href="home.php">Home</a>
    <a href="">Bolos</a>
    <a href="doces.php">Doces</a>
    <a href="fale-conosco.php">Fale conosco</a>
</div>
<span class="span-links">
<a href="sair.php">Sair</a>
<a href="home.php">Voltar</a>
</body>
</html>