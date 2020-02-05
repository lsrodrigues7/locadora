<?php 
session_start();
 if (!isset($_SESSION['user'])) 
 	Header("Location: ./login.html");

  echo "leo: " . md5("leo");
  echo "<br/><br/>"; 

 
?>
