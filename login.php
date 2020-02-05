<?php
    $conexao = mysqli_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    
    $banco  = mysqli_select_db($conexao,"locadora");

	if (!$banco){
		echo "Erro ao se conectar ao banco locadora...";
		exit;
    }

    $user = trim($_POST['user']);
    $pwd = trim($_POST['password']);
    $pwd = md5($pwd); 

    $rs = mysqli_query($conexao,"SELECT * FROM  usuario where user like '$user'");
       
    $linha = mysqli_fetch_array($rs); 
     
    
    

    if ($pwd==$linha['password']){
        session_start(); 

        $_SESSION['user'] = $user; 
        
        header('location:home.php'); 
    }
    elseif ($pwd!=$linha['password']){ 
        echo "<script language='javascript' type='text/javascript'>alert('Senha ou Login incorretos!');
        window.location.href='login.html';</script>";
        die();
         }

?>