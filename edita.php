    <?php 
    session_start();
    // Verifica se existe um login ativo 
    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['login']);
        header('location: index.php');
    }
    if(!empty($_GET['id'])){
        include_once('conexao.php');

        $id = $_GET['id'];

        $sqlselect = "SELECT * FROM usuario  WHERE id_usuario=$id";
        $result = $conexao->query($sqlselect);
        
        if($result->num_rows > 0){
            while($user_data= mysqli_fetch_assoc($result)){
                $nome= $user_data['nome'];
                $email= $user_data['email'];
                $telefone= $user_data['telefone'];
            }
        } 
        else{
            header('location: listar.php');
        }   
    }
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

<div class="editar">
    <h3>Editar Dados</h3>
    <form class="form" method="post" action="edit-logica.php"><!-- Action tem a função de eviar dados -->
        <input class="field" type="text" name="nome" placeholder="Nome completo" value="<?php echo $nome?>">
        <input class="field" type="email" name="email" placeholder="email" value="<?php echo $email?>" maxlength="40">
        <input class="field" type="tel" name="telefone" placeholder="Telefone" value="<?php echo $telefone?>" maxlength="30">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" id="Update" name="Update" value="Editar">
        <a href="login.php">Já é cliente, faça login.  </a>
        <a href="listar.php" class="bedita">Voltar</a>
    </form>
</div>
</section>
</body>
</html>