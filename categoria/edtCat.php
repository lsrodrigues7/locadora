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
    $descricao = utf8_decode(trim($_POST['txtDescricao']));


    if(!empty($descricao) ){
        $sql = "UPDATE categoria SET descricao='$descricao' WHERE id='$id';";
        $ins = mysqli_query($conexao,$sql);
        
        if(!$ins){
            echo "Erro ao atualizar...";
        }
    }else{
        echo "Campos em branco...";
    }

    header('location: lstCategoria.php');    
?>