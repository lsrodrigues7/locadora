<?php
    
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
    $rs = mysql_query("SELECT * FROM categoria;");
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="titulo.css" />
    <title>Listagem de Categorias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body  background = "fundo.jpg" >
<div class="container col-md-10">
<h3>Listagem de Categorias</h3>
    <input type="button" class="btn btn-danger" value="Inserir" onclick="javascript:location.href='frmInsCat.html'">
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
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['id'] ?></td>
                <td><?php  echo utf8_encode($linha ["descricao"]) ?></td>
               
                <td><input type="button" class="btn btn-outline-warning bt-sm" onclick="javascript: location.href='frmEdtCat.php?id=' + <?php echo $linha['id'] ?>" value='Editar'"></td>
                <td><input type="button" class="btn btn-outline-primary bt-sm" onclick="javascript: location.href='frmRemCat.php?id=' + <?php echo $linha['id'] ?>" value='Excluir'"></td>
            </tr>
        <?php }?>
    </table>
</div>
</body>
</html>

