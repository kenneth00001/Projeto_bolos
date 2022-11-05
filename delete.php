<?php
    if(!empty($_GET['id'])){
        include_once('conexao.php');

        $id= $_GET['id'];
        
        $sqlselect = "SELECT * FROM usuario  WHERE id_usuario=$id";
        $result = $conexao->query($sqlselect);
        
        if($result->num_rows > 0){
            $sqldelete = " DELETE FROM usuario where id_usuario =$id";
            $resultdelete = $conexao->query($sqldelete);
        }
    }
    header('location: listar.php');