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
    $rs = mysqli_query($conexao,"SELECT filme.id,filme.titulo,filme.ano,filme.categoria,categoria.descricao as catNome,  
    filme.valor FROM filme inner join categoria on filme.categoria=categoria.id WHERE filme.id=".$id);
    $edita = mysqli_fetch_array($rs);
  
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar Filmes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\edtStyle.css">    
    </head>
    <body  background="fundo.jpg"  >
    <br><br>
    <div class="container">
        <div class="box">
          <h3><span class="badge badge-light">Editar Filme</span></h3>
            <form id="frmEdtFilme" name="frmEdtFilme" method="POST" action="edtFilme.php">
            <div class="form-group">
                    <label for="lblId"><span class="badge badge-light">ID: </span> <?php echo $edita['id'] ?> </label>
                    <input type="hidden" id="txtId" name="txtId" class="form-control" value="<?php echo $edita['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblTitulo"><span class="badge badge-light">Titulo: </span> </label>
                    <input type="text" id="txtTitulo" name="txtTitulo" class="form-control " value="<?php echo utf8_encode($edita['titulo']) ?>">
                </div>
                <div class="form-group">
                    <label for="lblAno"><span class="badge badge-light">Ano: </span> </label>
                    <input type="text" id="txtAno" name="txtAno" class="form-control " value="<?php echo $edita['ano'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblCliente"><span class="badge badge-light ">Categoria: </span> </label>
                    <select class="form-control" name="selCat" id="selCat">
                    <?php
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
                            
                                //Consulta com a tabela
                        //Selecione tudo de nomedatabela em ordem crescente pelo nome 
                    $consulta=mysqli_query($conexao,"SELECT *FROM categoria order by descricao ASC"); 
                    //Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
                    while ($dados = mysqli_fetch_array($consulta)) {
                    echo utf8_encode("<option value='".$dados['id']."'>".$dados['descricao']."</option>");
                        } 
                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="lblValor"><span class="badge badge-light">Valor: </span> </label>
                    <input type="text" id="txtValor" name="txtValor" class="form-control " value="<?php echo $edita['valor'] ?>">
                </div>
              
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary bt-lg" value="Atualizar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning bt-lg" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger bt-lg" value="Cancelar" onclick="javascript:location.href='lstFilme.php'">
            </form>        
        </div>
    </body>
</html>