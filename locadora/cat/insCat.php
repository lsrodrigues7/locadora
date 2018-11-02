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
    
    $id = trim($_POST['txtId']);
    $descricao = utf8_decode(trim($_POST['txtDescricao']));


    if(!empty($descricao)){
        $sql = "INSERT INTO categoria (descricao) VALUES ('$descricao');";
        $ins = mysql_query($sql);
        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    header("location: lstCategoria.php");

?>