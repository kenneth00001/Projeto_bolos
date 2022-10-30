<?php
    
    $servidor="localhost:3306";
    $usuario="root";
    $senha="";
    $dbname="projeto_bolos";

    $conexao=mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(!$conexao)
    {
        die("Houve um erro: ".mysqli_connect_errno());
    }
?>