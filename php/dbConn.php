<?php


	$conn=@mysql_connect("localhost","root");  // ip locale, login e password
if(!$conn){
die ('Non riesco a connettermi: errore '.mysql_error()); // questo apparirà solo se ci sarà un errore
}

$db_selected=mysql_select_db("rocketman",$conn); // dove io ho scritto "prova" andrà inserito il nome del db
if(!$db_selected){
die ('Errore nella selezione del database: errore '.mysql_error()); // se la connessione non andrà a buon fine apparirà questo messaggio
}
$_SESSION["today"]=date("Y/m/d");

?>
