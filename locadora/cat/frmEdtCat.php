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
    $rs = mysql_query("SELECT * FROM categoria WHERE id=".$id);
    $edita = mysql_fetch_array($rs);
  
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar Categorias</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\edtStyle.css">    
    </head>
    <body  background="fundo.jpg"  >
    <br><br><br>
    <div class="container">
        <div class="box">
          <h3><span class="badge badge-light">Editar Categorias</span></h3>
            
            <form id="frmEdtCat" name="frmEdtCat" method="POST" action="edtCat.php">
                <div class="form-group">
                    <label for="lblId"><span class="badge badge-light">ID: </span> <?php echo $edita['id'] ?> </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $edita['id'] ?>">
                </div>      
                <div class="form-group">
                    <label for="lblCat"><span class="badge badge-light">Categoria: </span></label>
                    <input type="text" id="txtDescricao" name="txtDescricao" class="form-control col-md-12" value="<?php echo utf8_encode($edita['descricao']) ?>">
                </div>
            
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary bt-lg" value="Atualizar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning bt-lg" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstCategoria.php'">
            </form>        
        </div>
    </body>
</html>