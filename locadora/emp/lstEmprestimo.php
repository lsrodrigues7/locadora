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
    //$rs = mysql_query("SELECT * FROM emprestimo;");
    $rs = mysql_query("SELECT emprestimo.id_cliente as cliId, cliente.nome as 
    cliNome, emprestimo.titulo as filmeid, emprestimo.data_emprestimo, emprestimo.data_devolucao,emprestimo.valor,filme.titulo,filme.valor 
    FROM emprestimo INNER join cliente on emprestimo.id_cliente=cliente.id  
    inner join filme on emprestimo.titulo = filme.id;");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Emprestimo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<h3>Listagem de Emprestimo</h3>
    <input type="button" class="btn btn-danger" value="Inserir" onclick="javascript:location.href='frmInsEmp.php'">
    <br><br>
    <table class="table table-striped ">

    <thead class="thead-dark">
        <tr>
            <th>ID Cliente</th>
            <th>Titulo</th>
            <th>Data Emprestimo</th>
            <th>Devolução</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
        </thead>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['cliNome'] ?></td>
                <td><?php  echo $linha ["titulo"] ?></td>
                <td><?php  echo $linha ["data_emprestimo"] ?></td>
                <td><?php  echo $linha ["data_devolucao"] ?></td>
                <td><?php  echo $linha ["valor"] ?></td>
                
               
                <td><input type="button" class="btn btn-outline-warning bt-sm" onclick="javascript: location.href='frmEdtEmp.php?id=' + <?php echo $linha['id_cliente'] ?>" value='Editar'">
                <input type="button" class="btn btn-outline-primary bt-sm" onclick="javascript: location.href='frmRemEMP.php?id=' + <?php echo $linha['id_cliente'] ?>" value='Excluir'"></td>
               
            </tr>
        <?php }?>

    </table>
</body>
</html>

