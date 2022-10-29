<?php
    include_once('conexao.php');
    session_start();
    
    if(isset($_POST['submit'])  && !empty($_POST['nome'])  && !empty($_POST['email'])  && !empty($_POST['telefone'])  && !empty($_POST['senha'])  && !empty($_POST['senhac'])){

        $nome= $_POST['nome'];
        $email= $_POST['email'];
        $telefone= $_POST['telefone'];
        $senha= MD5($_POST['senha']);
        $senhac= $_POST['senhac'];


        //verifica se existe cadastro 
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $user_result = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($user_result) == 1) //se existir cadastro manda para o login
        {
           header('location: cadastrar.php');
           $_SESSION['msgf'] = "Email já cadastrado, Faça login  . ";
        }else // se não existir cadastra e redireciona para o login
        {
           $insert_user_query = "INSERT INTO usuario SET nome='$nome', telefone='$telefone', email='$email', senha='$senha'";

           $insert_user_result = mysqli_query($conexao, $insert_user_query);
            header('location: login.php');
        }
    } else{
      header('location: cadastrar.php');
    }
?>

    
