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

    $rs = mysql_query("SELECT emprestimo.id_emp as id, emprestimo.id_cliente as cliId, cliente.nome as 
    cliNome, emprestimo.titulo as filmeid, emprestimo.data_emprestimo, emprestimo.data_devolucao,emprestimo.valor,filme.titulo,filme.valor 
    FROM emprestimo INNER join cliente on emprestimo.id_cliente=cliente.id  
    inner join filme on emprestimo.titulo = filme.id WHERE emprestimo.id_emp=".$id);
    
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
          <h3><span class="badge badge-light">Remover Emprestimo</span></h3>
          <form id="frmRemEmp" name="frmRemEmp" method="POST" action="remEmp.php">
                <div class="form-group"> 
                    <label for="lblId">
                        <span class="badge badge-light">ID: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['id'] ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $exclui['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblCli">
                        <span class="badge badge-light">Cliente: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode($exclui['cliNome']) ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblTitulo">
                        <span class="badge badge-light">Titulo: </span>
                        <span class="text-xl font-weight-normal"><?php echo utf8_encode($exclui['titulo']) ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblDtEmp">
                        <span class="badge badge-light">Emprestimo: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['data_emprestimo'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblDev">
                        <span class="badge badge-light">Devolução: </span>
                        <span class="text-xl font-weight-normal"><?php echo $exclui['data_devolucao'] ?></span>
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
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstEmprestimo.php'"> 
          </form>
      </div>
    </body>
</html>