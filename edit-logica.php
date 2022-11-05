<?php
session_start();
// Verifica se existe um login ativo 
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['login']);
    header('location: index.php');
}
include_once('conexao.php');
if(isset($_POST['Update'])){ //Verifica se o botão de eviar foi apertado

    $id= $_POST['id']; //Recebe os campos do formulario, no caso o id
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];

    $sqlupdate = "UPDATE usuario SET nome='$nome',email='$email',telefone='$telefone' WHERE id_usuario= '$id'";
    $result = $conexao->query($sqlupdate);
}
header('location: listar.php');