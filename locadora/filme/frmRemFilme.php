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
    $rs = mysql_query("SELECT * FROM filme WHERE id=".$id);
    $exclui = mysql_fetch_array($rs);
    
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
          <h3><span class="badge badge-light">Remover Filme</span></h3>
          <form id="frmRemFilme" name="frmRemFilme" method="POST" action="remFilme.php">
                <div class="form-group">
                    <label for="lblId">
                        <span class="badge badge-light">ID: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['id'] ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $exclui['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblTitulo">
                        <span class="badge badge-light">Titulo: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode( $exclui['titulo']) ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblAno">
                        <span class="badge badge-light">Ano: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['ano'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblCategoria">
                        <span class="badge badge-light">Categoria: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode ($exclui['categoria']) ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblValor">
                        <span class="badge badge-light">Valor: </span>
                        <span class="text-xl font-weight-normal">R$: <?php echo number_format($exclui ['valor'],2,',','.') ?></span>
                    
                    </label>
                </div>
                
                <input type="submit" id="btConfirmar" name="btConfirmar"
                    class="btn btn-primary bt-lg" value="Confirmar">               
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstFilme.php'"> 
          </form>
      </div>
    </body>
</html>