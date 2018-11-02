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
    $nome = utf8_decode(trim($_POST['txtNome']));
    $telefone = trim($_POST['txtTel']);
    $celular = trim($_POST['txtCelular']);
    $email = utf8_decode(trim($_POST['txtEmail']));
    $endereco = utf8_decode(trim($_POST['txtEndereco']));



    if(!empty($nome) && !empty($celular) && !empty($email) && !empty($endereco )){
        $sql = "UPDATE cliente SET nome='$nome', telefone='$telefone', celular='$celular', email='$email', endereco='$endereco' WHERE id='$id';";
        $ins = mysql_query($sql);
        
        if(!$ins){
            echo "Erro ao atualizar...";
        }
    }else{
        echo "Campos em branco...";
    }
    header('location: lstCliente.php');    
?>