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
    $nome = utf8_decode(trim($_POST['txtNome']));
    $telefone = trim($_POST['txtTel']);
    $celular = trim($_POST['txtCelular']);
    $email = utf8_decode(trim($_POST['txtEmail']));
    $endereco = utf8_decode(trim($_POST['txtEndereco']));



    if(!empty($nome) && !empty($celular) && !empty($email) && !empty($endereco)){
        $sql = "INSERT INTO cliente (nome, telefone, celular, email, endereco) VALUES ('$nome', '$telefone', '$celular', '$email', '$endereco');";
        $ins = mysql_query($sql);
        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    
    header('location: lstCliente.php');  

?>