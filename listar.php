<?php
session_start();
include_once('conexao.php');
// Verifica se existe um login ativo 
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['login']);
    header('location: index.php');
}
$sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
          font-family: Arial, Helvetica, sans-serif;
          background-color: #d9b4a74f;
        }

        .table-bg{
          background-color: rgba(0,0,0,0.1);
          border-radius: 15px 15px 0 0;
        }
        nav{
          background-color: #9b6b59;
          color: white;
          text-align: center;
          height: 110px;
          margin-bottom:3vh;
        }
        nav>h3{
          padding-top: 30px; 
        } 
        .link{
           padding-top: 10px;
        }
        a{
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 2rem;
            padding: 5px;
        }

        a:hover{
          background-color: #d9b4a74f;
          color: white;
        }

        .box-search{
          display: flex;
          justify-content: center;
          gap: .1%;
        }
    </style>
</head>
<body>
  <nav>
<h3>Bolo é carinho em forma de Comida</h3>
<div class="link">    
    <a href="home.php">Home</a>
    <a href="listar.php">Lista de Usuarios</a>
    <a href="doces.php">Doces</a>
    <a href="fale-conosco.php">Fale conosco</a>
</div>
</nav>
<table class="table table-bg">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
    <?php
        while($user_data = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$user_data['id_usuario']."</td>";
            echo "<td>".$user_data['nome']."</td>";
            echo "<td>".$user_data['telefone']."</td>";
            echo "<td>".$user_data['email']."</td>";
            echo "<td>
            <a class='btn btn-primary btn-sm' href='edita.php?id=$user_data[id_usuario]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
            <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>
            </svg>
             </a>
            <a class='btn btn-danger btn-sm' href='delete.php?id=$user_data[id_usuario]'> 
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
          </svg>
            </a>
            </td>";
            echo "</tr>";
        }
        
    ?>
  </tbody>
</table>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>