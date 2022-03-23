<?php
session_start();
require("php/dbConn.php");
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
    <meta name = "author" content = "Carlo Alberto Carrucciu">
		<meta name="matricola" content="533967">
  	<meta name = "keywords" content = "game">

		<link rel="stylesheet" href="css/game.css" type="text/css" media="screen">
    <script  src="js/game.js" ></script>
		  <script  src="js/gameoption.js" ></script>
		<title>Dotard</title>
	</head>
  <body onload="begin()">

    <div class="side" style="left:0%">
			<table id="stat">
				<thead><tr style=" color:blue; padding-bottom:3%"><th><?php echo $_SESSION["username"]?></th></tr></thead>

				<tbody>

				<tr><th>tempo</th></tr>
				<tr><td id="tempo">0:0:0</td></tr>
				<tr><th>Bombe</th></tr>
				<tr><td id="bombe">0</td></tr>
				<tr><th>Proiettili</th></tr>
				<tr><td id="proiettili">0</td></tr>
				<tr><th>Salti</th></tr>
				<tr><td id="salti">0</td></tr>
				<tr><th>Seduto</th></tr>
				<tr><td id="seduto">0</td></tr>
			</tbody>
			</table>

    </div>
			<div id="playground" >
				<audio src="materiale/rocketSound.mp3" id="rocketSound" loop></audio>

			</div>
			<div class="overplay" id="play">
				<h2>Sei pronto ? Premi PLAY!</h2>
					<button id="PLAY" class="button" onclick="start()">PLAY</button>
				</div>
	    <div class="side" style="right:0%" >
				<img src='materiale/whitehouse.png' id="whitehouse" onmouseover="this.style.cursor='pointer'" alt="home" onclick="home()">
				<img src="materiale/unmute.png" id="audio" onclick="mute()" onmouseover="this.style.cursor='pointer'" alt="mute">
				<img src="materiale/pause.png" id="pause" onclick="window.alert('Il gioco è in pausa, conferma per continuare');mute()" onmouseover="this.style.cursor='pointer'" alt="pause">
				<img src="materiale/question.png"  id="instruction" onclick="window.open('html/instructions.html');window.alert('Il gioco è in pausa, conferma per continuare')" onmouseover="this.style.cursor='pointer'" alt="istruzioni">
    </div>
		<div id="gameover">
			<audio id="failSound" src="materiale/failSound.mp3"></audio>
			<div id=replay class="overplay" style="display:none">
				<form id="statform" method="post" action="php/stat.php">
					<input type="hidden" name="bombIn" id="bombIn">
					<input type="hidden" name="gunIn" id="gunIn">
					<input type="hidden" name="secondiIn" id="secondiIn">
					<input type="hidden" name="jumpIn" id="jumpIn">
					<input type="hidden" name="sitIn" id="sitIn">
					<input type="hidden" name="bombkillIn" id="bombkillIn">
					<input type="submit" name="replay" value="RIGIOCA" class="button" id="sedutoIn">
				</form>

			</div>
		</div>

<!--inserisco tutti i suoni-->



  </body>
  </html>
