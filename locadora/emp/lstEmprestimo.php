<?php
     
    session_start();
    if (!isset($_SESSION['user'])) 
       Header("Location: ./login.html");
    
    $conexao = mysql_connect("localhost","root","");
    if(!$conexao){
        echo "erro ao se conectar com o mysql";
        exit;
    }
    $banco = mysql_select_db("locadora");
    if(!$banco){
        echo "erro ao se conectar com o banco locadora";
        exit;
    }
    //$rs = mysql_query("SELECT * FROM emprestimo;");
    $rs = mysql_query("SELECT emprestimo.id_emp as id, emprestimo.id_cliente as cliId, cliente.nome as 
    cliNome, emprestimo.titulo as filmeid, emprestimo.data_emprestimo, emprestimo.data_devolucao,emprestimo.valor,filme.titulo,filme.valor 
    FROM emprestimo INNER join cliente on emprestimo.id_cliente=cliente.id  
    inner join filme on emprestimo.titulo = filme.id;");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Emprestimo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

</head>
<body  background="\locadora\img\fundo.jpg"  >
<div class="container col-md-10">
<br>
<h1> <span class="badge badge-light" >Listagem de Emprestimo</span></h1>
    <input type="button" class="btn btn-danger" value="Inserir" onclick="javascript:location.href='frmInsEmp.php'">
    <br><br>
    <table class="table table-striped table-dark">

    <thead class="thead-dark">
        <tr>
            <th>ID Emprestimo</th>
            <th>ID Cliente</th>
            <th>Titulo</th>
            <th>Data Emprestimo</th>
            <th>Devolução</th>
            <th>Valor</th>
            <th></th>
        </tr>
        </thead>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['id'] ?></td>
                <td><?php echo utf8_encode($linha ["cliNome"]) ?></td>
                <td><?php  echo utf8_encode($linha ["titulo"]) ?></td>
                <td><?php  echo $linha ["data_emprestimo"] ?></td>
                <td><?php  echo $linha ["data_devolucao"] ?></td>
                <td><?php  echo $linha ["valor"] ?></td>
                
                    <td>
                      <button  class="btn btn-outline-danger bt-sm"
                       onclick="javascript: location.href='frmRemEmp.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-trash"></i></button>
                    </td>
               
            </tr>
        <?php }?>

    </table>
</body>
</html>

