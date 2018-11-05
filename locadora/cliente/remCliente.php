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
    
    if(!empty($id)){
        $sql = "DELETE FROM cliente WHERE id='$id';";
        $del = mysql_query($sql);
        
        if(!$del){
            echo "Erro ao remover...";
        }
    }else{
        echo "Campos em Branco...";
    }
    header('location: lstCliente.php');    
?>