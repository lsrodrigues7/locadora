<?php
    //echo "meu php esta funcionando...";
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
    
    $titulo = trim($_POST['txtTitulo']);
    $categoria = trim($_POST['txtCategoria']);
    $ano = trim($_POST['txtAno']);
    $valor = trim($_POST['txtValor']);
    $limite_dias = trim($_POST['txtLimite_dias']);

    if(!empty($titulo) && !empty($categoria) && !empty($ano) && !empty($valor) && !empty($limite_dias)){
        $sql = "INSERT INTO filme (titulo, categoria, ano, valor, limite_dias) VALUES ('$titulo', '$categoria', '$ano', '$valor', '$limite_dias');";
        $ins = mysql_query($sql);
        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    
    header('location: lstFilme.php');  

?>