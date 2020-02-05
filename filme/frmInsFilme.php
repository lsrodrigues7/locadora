<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Filmes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\insStyle.css">    
    </head>

    <body  background="fundo.jpg"  >
        <br><br><br>
            <div class="container">
                <div class="box">
                    <br>
                  <h3><span class="badge badge-light">Inserir Categorias</span></h3>
            <form id="frmNovoFilme" name="frmNovoFilme" method="POST" action="insFilme.php">
                <div class="form-group">
                    <label for="lblTitulo"><span class="badge badge-light">Titulo: </span></label>
                    <input type="text" class="form-control" id="txtTitulo"
                        name="txtTitulo" placeholder="Informe o titulo do filme">               
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
                    <label for="lblAno"><span class="badge badge-light">Ano: </span> </label>
                    <input type="text" class="form-control" id="txtAno"
                        name="txtAno" placeholder="Informe o ano do filme">               
                </div>
                <div class="form-group">
                    <label for="lblValor"><span class="badge badge-light">Valor: </span>  </label>
                    <input type="text" class="form-control" id="txtValor"
                        name="txtValor" placeholder="Informe o valor do filme">               
                </div>
               
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary" value="Gravar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger" value="Cancelar" onclick="javascript:location.href='lstFilme.php'">
            </form> 
        </div>
    </body>
</html>