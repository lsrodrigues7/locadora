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
    
    //$id = trim($_POST['txtId']);
    $descricao = utf8_decode(trim($_POST['txtDescricao']));


    if(!empty($descricao)){
        $sql = "INSERT INTO categoria (descricao) VALUES ('$descricao');";
        $ins = mysqli_query($conexao,$sql);
        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    header("location: lstCategoria.php");

?>