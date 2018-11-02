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
    $titulo = trim($_POST['txtTitulo']);
    $categoria = trim($_POST['txtCategoria']);
    $ano = trim($_POST['txtAno']);
    $valor = trim($_POST['txtValor']);
    $limite_dias = trim($_POST['txtLimite_dias']);
    //echo $id;
    //echo $titulo;
    //echo $categoria;
    //echo $ano;
    //echo $valor;
    //echo $limite_dias;

    if(!empty($titulo) && !empty($categoria) && !empty($ano) && !empty($valor) && !empty($limite_dias)){
        $sql = "UPDATE filme SET titulo='$titulo', categoria='$categoria', ano='$ano', valor='$valor', limite_dias='$limite_dias' WHERE id='$id';";
        $ins = mysql_query($sql);
        
        if(!$ins){
            echo "Erro ao atualizar...";
        }
    }else{
        echo "Campos em branco...";
    }
    header('location: lstFilme.php');    
?>