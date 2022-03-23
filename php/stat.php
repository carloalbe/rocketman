<?php
  session_start();
  require("dbConn.php");

  $_SESSION["games"]++;
  if($_POST["bombkillIn"]===true)$_SESSION["bombkill"]++;
  else $_SESSION["gunkill"]++;
  $_SESSION["timetot"]=$_SESSION["timetot"]+$_POST["secondiIn"];
  $_SESSION["bomb"]=$_SESSION["bomb"]+$_POST["bombIn"];
  $_SESSION["gun"]=$_SESSION["gun"]+$_POST["gunIn"];
  $_SESSION["jump"]=$_SESSION["jump"]+$_POST["jumpIn"];
  $_SESSION["sit"]=$_SESSION["sit"]+$_POST["sitIn"];
  if($_POST["secondiIn"]>$_SESSION["best"])$_SESSION["best"]=$_POST["secondiIn"];
  $querystatup=mysql_query("UPDATE stat SET timetot='".$_SESSION["timetot"]."',games='".$_SESSION["games"]."',
   best='".$_SESSION["best"]."',bomb='".$_SESSION["bomb"]."',gun='".$_SESSION["gun"]."',jump='".$_SESSION["jump"]."',sit='".$_SESSION["sit"]."',
  bombkill='".$_SESSION["bombkill"]."',gunkill='".$_SESSION["gunkill"]."' WHERE id='".$_SESSION["id"]."'")
  or die ("aggiornamento non riuscito".mysql_error());
  header("location:./../game.php");
 ?>
