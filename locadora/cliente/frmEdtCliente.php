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
    $id = trim($_REQUEST['id']);
    $rs = mysql_query("SELECT * FROM cliente WHERE id=".$id);
    $edita = mysql_fetch_array($rs);
   
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar lista de Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\edtStyle.css">    
    </head>
    <body  background="fundo.jpg"  >
    <br><br>
    <div class="container">
        <div class="box">
          <h3><span class="badge badge-light">Editar Clientes</span></h3>
                <form id="frmEdtCliente" name="frmEdtCliente" method="POST" action="edtCliente.php">
                <div class="form-group">
                    <label for="lblId"><span class="badge badge-light">ID: </span> <?php echo $edita['id'] ?> </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $edita['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblNome"><span class="badge badge-light">Nome: </span></label>
                    <input type="text" id="txtNome" name="txtNome" class="form-control col-md-16" value="<?php echo utf8_encode( $edita['nome']) ?>">
                </div>
                <div class="form-group">
                    <label for="lblTelefone"><span class="badge badge-light">Telefone: </span></label>
                    <input type="text" id="txtTel" name="txtTel" class="form-control col-md-13" value="<?php echo $edita['telefone'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblCelular"><span class="badge badge-light">Celular: </span> </label>
                    <input type="text" id="txtCelular" name="txtCelular" class="form-control col-md-13" value="<?php echo $edita['celular'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblEmail"><span class="badge badge-light">Email: </span></label>
                    <input type="text" id="txtEmail" name="txtEmail" class="form-control col-md-16" value="<?php echo utf8_encode($edita['email']) ?>">
                </div>
                <div class="form-group">
                    <label for="lblEndereco"><span class="badge badge-light">Endereço: </span></label>
                    <input type="text" id="txtEndereco" name="txtEndereco" class="form-control" value="<?php echo utf8_encode($edita['endereco']) ?>">
                </div>
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary bt-lg" value="Atualizar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning bt-lg" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstCliente.php'">
                </form>  
            </div>      
        </div>
    </body>
</html>