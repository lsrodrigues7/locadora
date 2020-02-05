<?php
    
    session_start();
    if (!isset($_SESSION['user'])) 
       Header("Location: ./login.html");
    
    $conexao = mysqli_connect("localhost","root","");
    if(!$conexao){
        echo "erro ao se conectar com o mysql";
        exit;
    }
    $banco = mysqli_select_db($conexao,"locadora");
    if(!$banco){
        echo "erro ao se conectar com o banco locadora";
        exit;
    }
    $rs = mysqli_query($conexao,"SELECT * FROM categoria;");
?>
<html>
<head>
    <meta charset="utf-8">
   
    <title>Listagem de Categorias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body  background="fundo.jpg"  >
<div class="container col-md-10">
<br>
<h1> <span class="badge badge-light" >Listagem de Categorias</span></h1>
    <input type="button" class="btn btn-danger btn-lg" value="Inserir" onclick="javascript:location.href='frmInsCat.php'">
    <br><br>
    <table class="table table-striped table-dark ">

    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Descricão</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php while ($linha = mysqli_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['id'] ?></td>
                <td><?php  echo utf8_encode($linha ["descricao"]) ?></td>
               
                <td>
                      <button  class="btn btn btn-outline-primary bt-sm"
                       onclick="javascript: location.href='frmEdtCat.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                    </td>
                    <td>
                      <button  class="btn btn-outline-danger bt-sm"
                       onclick="javascript: location.href='frmRemCat.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-trash"></i></button>
                    </td>
            </tr>
        <?php }?>
    </table>
</div>
</body>
</html>

