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
    $id = trim($_REQUEST['id']);
    $rs = mysql_query("SELECT * FROM cliente WHERE id=".$id);
    $edita = mysql_fetch_array($rs);
   
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar lista de Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container col-md-10">
            <h3>Editar lista de Clientes</h3>
            <form id="frmEdtCliente" name="frmEdtCliente" method="POST" action="edtCliente.php">
            <div class="form-group">
                    <label for="lblId">ID: <?php echo $edita['id'] ?> </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $edita['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblNome">Nome: </label>
                    <input type="text" id="txtNome" name="txtNome" class="form-control col-md-3" value="<?php echo $edita['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblTelefone">Telefone: </label>
                    <input type="text" id="txtTel" name="txtTel" class="form-control col-md-3" value="<?php echo $edita['telefone'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblCelular">Celular: </label>
                    <input type="text" id="txtCelular" name="txtCelular" class="form-control col-md-3" value="<?php echo $edita['celular'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblEmail">Email: </label>
                    <input type="text" id="txtEmail" name="txtEmail" class="form-control col-md-3" value="<?php echo $edita['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblEndereco">Endereco: </label>
                    <input type="text" id="txtEndereco" name="txtEndereco" class="form-control col-md-3" value="<?php echo $edita['endereco'] ?>">
                </div>
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-success bt-lg" value="Atualizar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning bt-lg" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstCliente.php'">
            </form>        
        </div>
    </body>
</html>