<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>

<html>
<head>
<meta charset= "UTF-8">
	<link rel="stylesheet" href="css/style.css" />
<title>Locadora ACTION</title>
</head>
<body>
<div class="menu-bar">
	<img src="img/logo2.png" align="left" alt="some text" width="400" height="70">
		<header>
		<ul> 
				
				<li><i class="fas fa-home"></i><a href="direita.php"target="iframe"> Home</a></li> 
				</li>
				<li><i class="fas fa-user-plus"></i><a> Cadastros</a>
						<div class="sub-menu-1">
							<ul>
								<li><a href="filme/lstFilme.php" target="iframe">Filmes</a></li>
								<li><a href="emp/lstEmprestimo.php"target="iframe">Emprestimos</a></li>
								<li><a href="cat/lstCategoria.php"target="iframe">Categorias</a></li>
								<li><a href="cliente/lstCliente.php"target="iframe">Clientes</a></li> 
                			</ul> 
                		</div>     
				</li>
				<li><a href="logout.php" target="_parent">Sair</a></li>
				
		</ul>
		</header>
	</div>
	<div  class="homeCentral">
		<iframe width="100%" height="650px" frameborder="0px" name="iframe"></iframe>
	</div>
	
</body>
</html>
