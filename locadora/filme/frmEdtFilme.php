<?php
    //echo "meu php esta funcionando...";
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
    $id = trim($_REQUEST['id']);
    $rs = mysql_query("SELECT * FROM filme WHERE id=".$id);
    $edita = mysql_fetch_array($rs);
  
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar Filmes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container col-md-10">
            <h3>EDITAR FILMES</h3>
            <form id="frmEdtFilme" name="frmEdtFilme" method="POST" action="edtFilme.php">
            <div class="form-group">
                    <label for="lblId">ID: <?php echo $edita['id'] ?> </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $edita['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblTitulo">Titulo: </label>
                    <input type="text" id="txtTitulo" name="txtTitulo" class="form-control col-md-3" value="<?php echo $edita['titulo'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblAno">Ano: </label>
                    <input type="text" id="txtAno" name="txtAno" class="form-control col-md-3" value="<?php echo $edita['ano'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblCategoria">Categoria: </label>
                    <?php 
                    $linha = $edita;
                    if ($linha ['categoria']==1) {
                        $cat = "Ação";
                } else if ($linha ['categoria']==2) {
                        $cat = "Comédia";
                    }else if ($linha ['categoria']==3){
                        $cat = "Aventura";
                    }else if ($linha ['categoria']==4){
                        $cat = "Terror";
                    }else if ($linha ['categoria']==5){
                        $cat = "Romance";
                    }else if ($linha ['categoria']==6){
                        $cat = "Ficção Científica";
                    }else{
                        $cat= "Categoria não cadastrada!";
                    }

                    ?>
                    <input type="text" id="txtCategoria" name="txtCategoria" class="form-control col-md-3" value="<?php echo $cat ?>">
                </div>
                <div class="form-group">
                    <label for="lblValor">Valor: </label>
                    <input type="text" id="txtValor" name="txtValor" class="form-control col-md-3" value="<?php echo $edita['valor'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblLimite_dias">Limite de dias: </label>
                    <input type="text" id="txtLimite_dias" name="txtLimite_dias" class="form-control col-md-3" value="<?php echo $edita['limite_dias'] ?>">
                </div>
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-success bt-lg" value="Atualizar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning bt-lg" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstFilme.php'">
            </form>        
        </div>
    </body>
</html>