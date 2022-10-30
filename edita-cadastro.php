<?php
    session_start();
    include_once('conexao.php');
    $email= $_SESSION['email'];
    $result_usuario = " SELECT * FROM usuario WHERE email = '$email'"; // busca os dados no banco
    $resultado = mysqli_query($conexao, $result_usuario); // retorna os dados do banco de dados 
    $linha_usuario = mysqli_fetch_assoc($resultado); // Le o resultado
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cadastro</title>
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>
<section class="content">
<div class="form_edit">
    <h3>Editar</h3>
    <form class="form" method="post" action="logica_editar_usuario.php"><!-- Action tem a função de eviar dados -->
        <input class="field" type="text" name="nome" placeholder="<?php echo $linha_usuario['nome']; ?>" maxlength="50">
        <input class="field" type="email" name="email" placeholder="<?php echo $linha_usuario['email']; ?>" maxlength="40">
        <input class="field" type="tel" name="telefone" placeholder="<?php echo $linha_usuario['telefone']; ?>" maxlength="30">
        <input class="field" type="password" name="senha" placeholder="Senha" maxlength="15">
        <input class="field" type="password" name="senhac" placeholder="Confirmar senha">
        <input type="submit" value="Editar" name="submit">
        <div class="alerta">
            <?php
            if(isset($_SESSION['msgf'])){
                echo $_SESSION['msgf'];
                unset($_SESSION['msgf']);
            }
            ?>
        </div>
        <a href="home.php">Voltar</a>

    </form>
</div>
</section>
</body>
</html>