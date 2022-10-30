<?php
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar</title>
</head>
<body>
    <h1>Listar usuarios</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        $result_usuarios = "SELECT * FROM usuario";
        $resultado_usuarios =mysqli_query($conexao, $result_usuarios);
        while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
            echo $row_usuario['id_usuario'];
        }
    ?>
</body>
</html>