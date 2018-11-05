<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");
?>

<html>
<head>
<meta charset= "UTF-8">

<title>Locadora ACTION</title>
</head>

<frameset frameborder="0" rows="15%,100%">
<!--   divide a tela no caso direita e topo o frameborder some com a linha   -->
	
	
	<frame src="topo2.php" name="topo"> 

    <frame src="direita.php" name="framed" /> 


</frameset>









</html>
