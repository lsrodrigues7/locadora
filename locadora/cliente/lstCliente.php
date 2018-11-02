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
    $rs = mysql_query("SELECT * FROM cliente;");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<h3>Listagem de Clientes</h3>
    <input type="button" class="btn btn-danger" value="Inserir" onclick="javascript:location.href='frmInsCliente.html'">
    <br><br>
    <table class="table table-striped ">

    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Endereco</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['id'] ?></td>
                <td><?php  echo utf8_encode($linha ["nome"]) ?></td>
                <td><?php  echo $linha ["telefone"] ?></td>
                <td><?php  echo $linha ["celular"] ?></td>
                <td><?php  echo utf8_encode($linha ["email"]) ?></td>
                <td><?php  echo utf8_encode($linha ["endereco"]) ?></td>
               
                <td><input type="button" class="btn btn-outline-warning bt-sm" onclick="javascript: location.href='frmEdtCliente.php?id=' + <?php echo $linha['id'] ?>" value='Editar'"></td>
                <td><input type="button" class="btn btn-outline-primary bt-sm" onclick="javascript: location.href='frmRemCliente.php?id=' + <?php echo $linha['id'] ?>" value='Excluir'"></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>

