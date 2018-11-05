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
    
    $id = trim($_POST['txtId']);
    $titulo = trim($_POST['txtTitulo']);
    $categoria = trim($_POST['selCat']);
    $ano = trim($_POST['txtAno']);
    $valor = trim($_POST['txtValor']);
    $limite_dias = trim($_POST['txtLimite_dias']);
    

    if(!empty($titulo) && !empty($categoria) && !empty($ano) && !empty($valor) && !empty($limite_dias)){
        $sql = "UPDATE filme SET titulo='$titulo', categoria='$categoria', ano='$ano', valor='$valor', limite_dias='$limite_dias' WHERE filme.id='$id';";
        $ins = mysql_query($sql);
        
        if(!$ins){
            echo "Erro ao atualizar...";
        }
    }else{
        echo "Campos em branco...";
    }
    header('location: lstFilme.php');    
?>