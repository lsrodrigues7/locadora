<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Cliente</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\insStyle.css">    
    </head>

    <body  background="fundo.jpg"  >
        <br><br><br>
            <div class="container">
                <div class="box">
                  <h3><span class="badge badge-light">Inserir Clientes</span></h3>
            <form id="frmNovoCliente" name="frmNovoCliente" method="POST" action="insCliente.php">
                
                <div class="form-group">
                    <label for="lblNome"><span class="badge badge-light">Nome:</span></label>
                    <input type="text" class="form-control col-md-12" id="txtNome"
                        name="txtNome" placeholder="Informe o nome ">               
                </div>
                  <div class="form-group">
                    <label for="lblTelefone"><span class="badge badge-light">Telefone:</span></label>
                    <input type="text" class="form-control col-md-12" id="txtTel"
                        name="txtTel" placeholder="Informe o telefone">               
                </div>
                  <div class="form-group">
                    <label for="lblCelular"><span class="badge badge-light">Celular:</span></label>
                    <input type="text" class="form-control col-md-12" id="txtCelular"
                        name="txtCelular" placeholder="Informe o celular">               
                </div>
                <div class="form-group">
                    <label for="lblEmail"><span class="badge badge-light">Email:</span></label>
                    <input type="text" class="form-control col-md-12" id="txtEmail"
                        name="txtEmail" placeholder="Informe o email">               
                </div>
                <div class="form-group">
                    <label for="lblEndereco"><span class="badge badge-light">Endereço:</span></label>
                    <input type="text" class="form-control col-md-12" id="txtEndereco"
                        name="txtEndereco" placeholder="Informe o endereço">               
                </div>
                        
                               
                
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary" value="Gravar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger" value="Cancelar" onclick="javascript:location.href='lstCliente.php'">
                    </div>
            </form> 
        </div>
    </body>
</html>