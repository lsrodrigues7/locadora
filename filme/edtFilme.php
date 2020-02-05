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
    
    $id = trim($_POST['txtId']);
    $titulo = trim($_POST['txtTitulo']);
    $categoria = trim($_POST['selCat']);
    $ano = trim($_POST['txtAno']);
    $valor = trim($_POST['txtValor']);
   

    if(!empty($titulo) && !empty($categoria) && !empty($ano) && !empty($valor)){
        $sql = "UPDATE filme SET titulo='$titulo', categoria='$categoria', ano='$ano', valor='$valor' WHERE filme.id='$id';";
        $ins = mysqli_query($conexao,$sql);
        
        if(!$ins){
            echo "Erro ao atualizar...";
        }
    }else{
        echo "Campos em branco...";
    }
    header('location: lstFilme.php');    
?>