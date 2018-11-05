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
    $rs = mysql_query("SELECT filme.id,filme.titulo,filme.ano,filme.categoria,categoria.descricao as catNome,  
    filme.valor FROM filme inner join categoria on filme.categoria=categoria.id;");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Filmes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

</head>
<body  background="fundo.jpg"  >
<div class="container col-md-10">
<br>
<h1> <span class="badge badge-light" >Listagem de Filme</span></h1>
    <input type="button" class="btn btn-danger" value="Inserir" onclick="javascript:location.href='frmInsFilme.php'">
    <br><br>
    <table class="table table-striped table-dark">

    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Ano</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['id'] ?></td>
                <td><?php echo utf8_encode($linha ['titulo']) ?></td>
                <td><?php echo $linha ['ano'] ?></td>
                <td><?php  echo utf8_encode ($linha ['catNome']);?></td>
                <td>R$: <?php echo number_format($linha ['valor'],2,',','.') ?></td>
                    <td>
                      <button  class="btn btn btn-outline-primary bt-sm"
                       onclick="javascript: location.href='frmEdtFilme.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                    </td>
                    <td>
                      <button  class="btn btn-outline-danger bt-sm"
                       onclick="javascript: location.href='frmRemFilme.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-trash"></i></button>
                    </td>
            </tr>
        <?php }?>
    </table>
</body>
</html>

