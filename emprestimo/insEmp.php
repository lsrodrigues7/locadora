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
  
    
    //cliente
    $sel= $_POST['selEmp'];
    //dvd emprestado
    $filme = $_POST['filme'];
   	//data emprestimo
    $emprestimo=date('Y-m-d');
   	//devolução
    $devolucao=date('Y/m/d', strtotime('+7 days', strtotime($emprestimo)));  	

    $valor= "SELECT emprestimo.valor as empval, filme.id FROM filme INNER JOIN emprestimo ON filme.id = emprestimo.id";
    var_dump($valor);

   	if(!empty($sel)){
        $sql = "INSERT INTO emprestimo (id_cliente, filme, data_emprestimo, data_devolucao,valor) VALUES ('$sel', '$filme','$emprestimo', '$devolucao', '$valor');";
                
        $ins = mysqli_query($conexao,$sql);
                

        if(!$ins){
            echo "Erro ao inserir...";
        }
    }else{
        echo "Campos em branco...";
    }    
    
  header('location: lstEmprestimo.php'); 

 ?>