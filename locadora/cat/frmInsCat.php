<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Categorias</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\insStyle.css">    
    </head>

    <body  background="fundo.jpg"  >
        <br><br><br>
            <div class="container">
                <div class="box">
                  <h3><span class="badge badge-light">Inserir Categorias</span></h3>
            <form id="frmNovaCat" name="frmNovaCat" method="POST" action="insCat.php">
                
                <div class="form-group">
                    <label for="lblDescricao"><span class="badge badge-light">Descricao: </span></label>
                    <input type="text" class="form-control col-md-12" id="txtDescricao"
                        name="txtDescricao" placeholder="Informe o nome da categoria">               
                </div>
                               
                
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary" value="Gravar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger" value="Cancelar" onclick="javascript:location.href='lstCategoria.php'">
                    </div>
            </form> 
            </div>
        </div>
    </body>
</html>