<?php
    
    session_start();
    if (!isset($_SESSION['user'])) 
       Header("Location: ./login.html");
    
    $conexao = mysqli_connect("localhost","root","");
    if(!$conexao){
        echo "erro ao se conectar com o mysql";
        exit;
    }
    $banco = mysqli_select_db($conexao,"locadora");
    if(!$banco){
        echo "erro ao se conectar com o banco locadora";
        exit;
    }
    $id = trim($_REQUEST['id']);
    $rs = mysqli_query($conexao,"SELECT * FROM cliente WHERE id=".$id);
    $exclui = mysqli_fetch_array($rs);
   
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="css\remStyle.css">    
    </head>
    <body  background="fundo.jpg"  >
    <br><br><br>
    <div class="container">
        <div class="box">
          <h3><span class="badge badge-light">Remover Clientes</span></h3>
          <form id="frmRemCliente" name="frmRemCliente" method="POST" action="remCliente.php">
                <div class="form-group">
                    <label for="lblId">
                        <span class="badge badge-light">ID: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['id'] ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $exclui['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblNome">
                        <span class="badge badge-light">Nome: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode($exclui['nome']) ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblTel">
                        <span class="badge badge-light">Telefone: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['telefone'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblCelular">
                        <span class="badge badge-light">Celular: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['celular'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblEmail">
                        <span class="badge badge-light">Email: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode($exclui['email']) ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblEndereco">
                        <span class="badge badge-light">Endereco: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode($exclui['endereco']) ?></span>
                    </label>
                </div>
                <input type="submit" id="btConfirmar" name="btConfirmar"
                    class="btn btn-primary bt-lg" value="Confirmar">               
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstCliente.php'"> 
          </form>
      </div>
    </body>
</html>