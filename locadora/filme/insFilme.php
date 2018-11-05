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
    
    $titulo = utf8_decode($_POST['txtTitulo']);
    $categoria = trim($_POST['selCat']);
    $ano = trim($_POST['txtAno']);
    $valor = trim($_POST['txtValor']);
    

    if(!empty($titulo) && !empty($categoria) && !empty($ano) && !empty($valor)){
        $sql = "INSERT INTO filme (titulo, categoria, ano, valor) VALUES ('$titulo', '$categoria', '$ano', '$valor');";
        
        $ins = mysql_query($sql);
        
        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    
    header('location: lstFilme.php');  

?>