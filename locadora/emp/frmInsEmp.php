
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Emprestimo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <h3>Cadastrar novo Emprestimo</h3>
            <form id="frmNovoEmp" name="frmNovoEmp" method="POST" action="insEmp.php">
                
                <div class="form-group">
                    <label for="lblCliente">Cliente: </label>
                    <select name="selEmp" id="selEmp">
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
                                //Consulta com a tabela
                        //Selecione tudo de nomedatabela em ordem crescente pelo nome 
                    $consulta=mysql_query("SELECT *FROM cliente order by nome ASC"); 
                    //Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
                    while ($dados = mysql_fetch_array($consulta)) {
                    echo("<option value='".$dados['id']."'>".$dados['nome']."</option>");
                        } 
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lblFilme">Filme: </label>
                    <select name="filme" id="filme">
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
                                //Consulta com a tabela
                        //Selecione tudo de nomedatabela em ordem crescente pelo nome 
                    $con=mysql_query("SELECT *FROM filme order by titulo ASC"); 
                    //Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
                    while ($dado = mysql_fetch_array($con)) {
                    echo("<option value='".$dado['id']."'>".$dado['titulo']."</option>");
                        } 
                        
                        ?>
                    </select>
                </div>
                
                <input type="submit" id="btEnviar" name="btEnviar"
                    class="btn btn-success" value="Gravar">
                <input type="reset" id="btLimpar" name="btLimpar"
                    class="btn btn-warning" value="Limpar">
                <input type="button" id="btCancelar" name="btCancelar"
                    class="btn btn-danger" value="Cancelar" onclick="javascript:location.href='lstEmprestimo.php'">
                    </div>
            </form> 
        </div>
    </body>
</html>