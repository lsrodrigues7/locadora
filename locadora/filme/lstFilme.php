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
    $rs = mysql_query("SELECT * FROM filme;");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Filmes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<h3>LISTA DE FILMES</h3>
    <input type="button" class="btn btn-danger" value="Inserir" onclick="javascript:location.href='frmInsFilme.html'">
    <br><br>
    <table class="table table-striped ">

    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Ano</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Limite de dias</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
            <tr>
                <td><?php echo $linha ['id'] ?></td>
                <td><?php echo $linha ['titulo'] ?></td>
                <td><?php echo $linha ['ano'] ?></td>
                <td><?php  //echo $linha ['categoria'];
                if ($linha ['categoria']==1) {
                    echo " Ação";
                } else if ($linha ['categoria']==2) {
                        echo " Comédia";
                    }else if ($linha ['categoria']==3){
                        echo " Aventura";
                    }else if ($linha ['categoria']==4){
                        echo " Terror";
                    }else if ($linha ['categoria']==5){
                        echo " Romance";
                    }else if ($linha ['categoria']==6){
                        echo " Ficção Científica";
                    }else{
                        echo " Categoria não cadastrada!";
                    } ?></td>
                <td>R$: <?php echo number_format($linha ['valor'],2,',','.') ?></td>
                <td><?php echo $linha ['limite_dias'];
                    if ($linha ['limite_dias']!=1) {
                        echo " Dias";
                    } else {
                            echo " Dia";
                        } ?></td>
                <td><input type="button" class="btn btn-outline-warning bt-sm" onclick="javascript: location.href='frmEdtFilme.php?id=' + <?php echo $linha['id'] ?>" value='Editar'"></td>
                <td><input type="button" class="btn btn-outline-primary bt-sm" onclick="javascript: location.href='frmRemFilme.php?id=' + <?php echo $linha['id'] ?>" value='Excluir'"></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>

