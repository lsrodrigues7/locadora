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
    
    $id = trim($_POST['txtId']);
    
    if(!empty($id)){
        $sql = "DELETE FROM filme WHERE id='$id';";
        $ins = mysql_query($sql);
        
        if(!$ins){
            echo "Erro ao remover...";
        }
    }else{
        echo "Campos em Branco...";
    }
    header('location: lstFilme.php');    
?>