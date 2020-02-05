<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Emprestimo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css\insStyle.css">    
    </head>

    <body  background="fundo.jpg"  >
        <br><br><br>
            <div class="container">
                <div class="box">
                    <br>
                  <h3><span class="badge badge-light">Inserir Emprestimo</span></h3>
            <form id="frmNovoEmp" name="frmNovoEmp" method="POST" action="insEmp.php">
                
                <div class="form-group">
                    <label for="lblCliente"><span class="badge badge-light ">Cliente: </span> </label>
                    <select class="form-control" name="selEmp" id="selEmp">
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
                    $consulta=mysqli_query($conexao,"SELECT *FROM cliente order by nome ASC"); 
                    //Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
                    while ($dados = mysqli_fetch_array($consulta)) {
                    echo utf8_encode("<option value='".$dados['id']."'>".$dados['nome']."</option>");
                        } 
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lblFilme"><span class="badge badge-light">Filme: </span></label>
                    <select class="form-control"name="filme" id="filme">
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
                    $con=mysqli_query($conexao,"SELECT *FROM filme order by titulo ASC"); 
                    //Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
                    while ($dado = mysqli_fetch_array($con)) {
                    echo utf8_encode("<option value='".$dado['id']."'>".$dado['titulo']."</option>");
                        } 
                        
                        ?>
                    </select>
                </div>
                
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-primary" value="Gravar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger" value="Cancelar" onclick="javascript:location.href='lstEmprestimo.php'">
                    </div>
            </form> 
            </div>
        </div>
    </body>
</html>