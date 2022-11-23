<?php
session_start();
  require("dbConn.php");
  $_SESSION["frase"]="Non sei ancora<br> registraro??<br>Registrati subito!!";
  $_SESSION["username"]=$_POST["username"];
  $_SESSION["password"]=$_POST["password"];
  $_SESSION["today"]=date('Y/m/d');
  $query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$_POST["username"]."' AND password ='".$_POST["password"]."'");  //per selezionare nel db l'utente e pw che abbiamo appena scritto nel log
  #or DIE('query non riuscita'.mysqli_connect_error());

  if(mysqli_num_rows($query)==1){        //se c'è una persona con quel nome nel db allora loggati
   // metto i risultati dentro una variabile di nome $row
  $row = mysqli_fetch_array($query);
// Nella variabile SESSION associo TRUE al valore logge
  $_SESSION["id"]=$row["id"];
  $_SESSION["name"]=$row["name"];
  $_SESSION["surname"]=$row["surname"];
  $_SESSION["nation"]=$row["nation"];
  $_SESSION["last"]=$_SESSION["today"];
  $_SESSION["first"]=$row["first"];
  $_SESSION["genre"]=$row["genre"];
  $_SESSION["birth"]=$row["birth"];
  $querylast=mysqli_query($conn,"UPDATE users SET last='".$_SESSION["today"]."'");
  $birth=explode("-",strval($_SESSION["birth"]));
  $today=explode("-",strval($_SESSION["today"]));
  $age=intval($today[0])-intval($birth[0]);
  $_SESSION["age"]=$age;

  header("location:./../home.php"); // e mando per esempio ad una pagina esempio.php// in questo caso rimanderò ad una pagina prova.php
  }else{
    $_SESSION["frase"]="Nome utente e password<br> non riconosciuti";
  header("location:./../index.php");// altrimenti esce scritta a video questa stringa di errore
  }
  ?>
