<?php 
session_start();
if (!isset($_SESSION['user'])) 
   Header("Location: ./login.html");

  echo "54321: " . md5("54321");
  echo "<br/><br/>"; 
  echo "luteciaboi: " . md5("luteciaboi");
  echo "<br/><br/>"; 
  
 
?>
