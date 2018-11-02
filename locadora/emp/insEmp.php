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
  
    
    //cliente
    $sel= $_POST['selEmp'];
    //dvd emprestado
    $titulo = $_POST['filme'];
   	//data emprestimo
    $datahora=date('Y-m-d');
   	//devolução
    $date=date('Y/m/d', strtotime('+7 days', strtotime($datahora)));  	


   	if(!empty($sel)){
        $sql = "INSERT INTO emprestimo (id_cliente, titulo, data_emprestimo	, data_devolucao) VALUES ('$sel', '$titulo','$datahora', '$date');";
        //var_dump($sql);
        $ins = mysql_query($sql);
                

        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    
  header('location: lstEmprestimo.php'); 

 ?>