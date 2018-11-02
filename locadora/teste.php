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
    
    $sel= $_POST['selEmp'];

    $val = mysql_query("SELECT * FROM filme WHERE titulo='$titulo';");

    echo $val;
  
 ?>