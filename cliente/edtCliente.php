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
    $nome = utf8_decode(trim($_POST['txtNome']));
    $telefone = trim($_POST['txtTel']);
    $celular = trim($_POST['txtCelular']);
    $email = utf8_decode(trim($_POST['txtEmail']));
    $endereco = utf8_decode(trim($_POST['txtEndereco']));



    if(!empty($nome) && !empty($celular) && !empty($email) && !empty($endereco )){
        $sql = "UPDATE cliente SET nome='$nome', telefone='$telefone', celular='$celular', email='$email', endereco='$endereco' WHERE id='$id';";
        $ins = mysqli_query($conexao,$sql);
        
        if(!$ins){
            echo "Erro ao atualizar...";
        }
    }else{
        echo "Campos em branco...";
    }
    header('location: lstCliente.php');    
?>