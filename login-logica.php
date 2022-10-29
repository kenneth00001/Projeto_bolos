<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        //Vai acessar o site
        require ('conexao.php');
        $email= $_POST['email'];
        $senha= MD5($_POST['senha']);


        
        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
        $user_result = mysqli_query($conexao, $sql);  

        if(mysqli_num_rows($user_result) == 1)
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            
            header('location: home.php');           
        }else
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $_SESSION['msg'] = " Usuario não encontrado ou senha invalida";
           header('location: login.php');
        }
    }else
    {
       header('location: login.php');
    }
    ?>