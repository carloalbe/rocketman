<?php
session_start();
require("dbConn.php");

$date=strval(date('Y/m/d'));
  $result = mysqli_query($conn,"SELECT * FROM users WHERE username='".$_POST["username"]."'");
    if (mysqli_num_rows($result) == 0){
        if($_POST["password"]==$_POST["passwordR"]){
          $query_stat=mysqli_query($conn,"INSERT INTO stat (username) VALUES('".$_POST["username"]."')");
          $query_registrazione = mysqli_query($conn,"INSERT INTO users (username,password,name,surname,nation,birth,genre,first,last)
          VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["name"]."','".$_POST["surname"]."',
          '".$_POST["nation"]."','".$_POST["birth"]."','".$_POST["genre"]."','".$date."','".$date."')");
          $_SESSION["username"]=$_POST["username"];
          $_SESSION["id"]=$_POST["id"];
          header("location:./../index.php");
           $_SESSION["frase"]="Registrazione avvenuta<br> con successo,<br> ora effettua il login";
        }
        else{
        header("location:./../index.php");
         $_SESSION["frase"]="Le password<br> inserite<br> non corrispondono";
        }
    }
    else{
      header("location:./../index.php");
      $_SESSION["frase"]="Username già in<br> utilizzo";
    }
?>
