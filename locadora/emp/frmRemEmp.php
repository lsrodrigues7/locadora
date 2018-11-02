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
    $id = trim($_REQUEST['id_cliente']);
    $rs = mysql_query("SELECT * FROM emprestimo WHERE id=".$id);
    $exclui = mysql_fetch_array($rs);
   
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
    <div class="container col-md-10">
          <h3>REMOVER EMPRESTIMOS</h3>
          <form id="frmRemEmp" name="frmRemEmp" method="POST" action="remEmp.php">
                <div class="form-group">
                    <label for="lblId">
                        <span class="text-xl font-weight-bold">Cliente: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['id_cliente'] ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $exclui['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblTitulo">
                        <span class="text-xl font-weight-bold">Titulo: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['titulo'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblDtEmp">
                        <span class="text-xl font-weight-bold">Data Emprestimo: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['data_emprestimo'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblDev">
                        <span class="text-xl font-weight-bold">Data Emprestimo: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['data_devolucao'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblValor">
                        <span class="text-xl font-weight-bold">Valor: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['valor'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblMulta">
                        <span class="text-xl font-weight-bold">Multa: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['multa'] ?></span>
                    </label>
                </div>
                <input type="submit" id="btConfirmar" name="btConfirmar"
                    class="btn btn-success bt-lg" value="Confirmar">               
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstEmprestimo.php'"> 
          </form>
      </div>
    </body>
</html>