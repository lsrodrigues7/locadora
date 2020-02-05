<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>
<html>
<head>
	<meta charset= "UTF-8">
	<link href="css/direita.css" rel="stylesheet">  <!--faz referencia do css certo     -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body background="img\fundo.jpg" width="1200"
		height="800"> 
		
<br><br><br><br>
<h1> <span class="badge badge-light" >Seja Bem Vindo!</span></h1>
<p> <span class="badge badge-light" ></span></p>
<p> <span class="badge badge-light" >Site de gerenciamento da Locadora de Filmes ACTION.<br><br>Acima temos um Menu com as opções de Cadastro, Consulta de Lista, 
	<br>Edição e Remoção dos mesmos.</span></p>
	</td>
</body>
</html>
