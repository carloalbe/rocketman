<?php


	$conn=@mysqli_connect("localhost","id19901505_root","+DYyYe2HmTwKq&H(");  // ip locale, login e password
if(!$conn){
die ('Non riesco a connettermi: errore '.mysqli_connect_error()); // questo apparirà solo se ci sarà un errore
}

$db_selected=mysqli_select_db($conn,"id19901505_rocketman"); // dove io ho scritto "prova" andrà inserito il nome del db
if(!$db_selected){
die ('Errore nella selezione del database: errore '.mysqli_connect_error()); // se la connessione non andrà a buon fine apparirà questo messaggio
}
$_SESSION["today"]=date("Y/m/d");

?>
