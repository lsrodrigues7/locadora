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
    
    if(!empty($id)){
        $sql = "DELETE FROM cliente WHERE id='$id';";
        $del = mysqli_query($conexao,$sql);
        
        if(!$del){
            echo "Erro ao remover...";
        }
    }else{
        echo "Campos em Branco...";
    }
    header('location: lstCliente.php');    
?>