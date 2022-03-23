<?php
session_start();
require("php/dbConn.php");
  $querystat=mysql_query("SELECT * FROM stat WHERE id='".$_SESSION["id"]."'");
	$stat = mysql_fetch_array($querystat);
	$_SESSION["games"]=$stat["games"];
	$_SESSION["timetot"]=$stat["timetot"];
	$_SESSION["best"]=$stat["best"];
	$_SESSION["bombkill"]=$stat["bombkill"];
  $_SESSION["gunkill"]=$stat["gunkill"];
	$_SESSION["bomb"]=$stat["bomb"];
	$_SESSION["gun"]=$stat["gun"];
	$_SESSION["jump"]=$stat["jump"];
	$_SESSION["sit"]=$stat["sit"];
  //calcolo del tempo di gioco
  $t=$_SESSION["timetot"];
  $s=$t%60;
  $m=floor($t/60)%60;
  $h=floor($t/3600);

?>
<!DOCTYPE html>
<html lang="it"> <!--questa pagina usa il single-page-jupped-->
	<head>
		<meta charset="utf-8">
    <meta name = "author" content = "Carlo Alberto Carrucciu">
		<meta name="matricola" content="533967">
  	<meta name = "keywords" content = "game">
		<script  src="js/home.js" ></script>
    <script  src="js/launch.js" ></script>
				<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/home.css" type="text/css" media="screen">

		<title>Dotard VS Rocket-man</title>
	</head>
	<?php if(!isset($_SESSION['homepage'])) echo "<body link='blue' alink='blue' vlink='blue' onload='loadpage()'>";
  else echo "<body ink='blue' alink='blue' vlink='blue' onload='open()'>";?>
    <?php $_SESSION['homepage']='open';?>
		<!-- inizio contenuto di benvenuto dinamico all' apertura della pagina -->
		<div id="facetoface">
      <h1 style="color:black;  font-size:100px;text-align:center">
        <b><span>R</span><span>O</span><span>C</span><span>K</span><span>E</span><span>T</span><span>-</span><span>M</span><span>A</span><span>N</span></b></h1>
			<audio src="materiale/rulloTamburi.mp3" autoplay></audio>
</div>
<!-- fine contenuto di benvenuto dinamico all' apertura della pagina -->

<!-- barra di navigazione fissa-->
<nav>

 <table id="navigationBar">
	 <tr><th onmouseover="this.style.color='yellow';this.style.fontSize='20px'" onmouseout="this.style.color='white';this.style.fontSize='15px'" class="link" onclick="home()">Home</th>
		 <th onmouseover="this.style.color='yellow';this.style.fontSize='20px'" onmouseout="this.style.color='white';this.style.fontSize='15px'" class="link" onclick="classifica()">Classifica</th>
		 <th onmouseover="this.style.color='yellow';this.style.fontSize='20px';onTrump();" onmouseout="this.style.color='white';this.style.fontSize='15px';outTrump();" class="link" onclick="trump()">Trump</th>
		 <th onmouseover="this.style.color='yellow';this.style.fontSize='20px';onKim();" onmouseout="this.style.color='white';this.style.fontSize='15px';outKim();" class="link" onclick="kim()">Kim Jong Un</th>
		 <th onmouseover="this.style.color='yellow';this.style.fontSize='20px';" onmouseout="this.style.color='white';this.style.fontSize='15px';" onclick="player()" class="link"><?php echo $_SESSION["username"];?></th>
     <td style="float:right" id='logout'><a href="php/logout.php">Log out</a></td>
   </tr>
 </table>
</nav>
<div id="corpoUSA">


<!--article contiene i riferimenti Donald Trump e KimJongUn-->
<article><!--/viene riempito cliccando dui riferimenti nel navbar-->

	<div id="contenute">
    <div id="classific">

      <?php echo "<table id='classifica'>
      <tr><th colspan='10'>CLASSIFICA</th></tr>
      <tr><th>pos.</th><th>username</th><th>miglior tempo</th><th>tempo totale di gioco</th><th>partite disputate</th><th>morti da bomba</th><th>morti da proiettile</th><th>iscrizione</th><th>classe</th><th>sesso</th></tr>";
        $n=10;
        for($i=0;$i<$n;$i++){
          $statrow =mysql_fetch_array(mysql_query("SELECT * FROM stat ORDER BY best DESC  LIMIT 1 OFFSET ".$i.""));
          $usersrow =mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='".$statrow["username"]."'"));
         if($statrow["username"]==$_SESSION["username"])  echo "<tr style='color:yellow'>" ;
         else echo "<tr>";
          echo"<td>".(1+$i)."</td><td>".$statrow["username"]."</td><td>".$statrow["best"]."</td><td>".$statrow["timetot"]."</td><td>".$statrow["games"]."</td><td>".$statrow["bombkill"]."</td><td>".$statrow["gunkill"]."</td><td>".$usersrow["first"]."</td><td>"
          .explode('-',strval($usersrow["birth"]))[0]."</td><td>".$usersrow["genre"]."</td></tr>";
        }
        echo "</table>";?>
   </div >

		<div id="history"> <!--contiene la struttura per inserire le storie di  Donald Trump e di Kim Jong Un dal documento byography.js-->
      <div id="playerStory">
        <h2>Chi è <?php echo $_SESSION["name"]." ". $_SESSION["surname"] ?>?</h2>
        Proveniente dalla nazione <?php echo $_SESSION["nation"].", si è unito al nostro grande gruppo il ".$_SESSION["first"]?>.
        <h3>Vita Pubblica</h3>
        Ha passato ben <?php if($h!=0)echo $h." ore, ";if($m!=0)echo $m." minuti e "; echo $s?> secondi della sua vita a giocare al nostro gioco
        L'ultima volta ci ha fatto visita il <?php echo $_SESSION["last"];?>
        Per il resto del tempo non si sa cosa faccia ma si dubita abbia una vita pubblica.
        <h3>Giocatore</h3>
      <?php  if($_SESSION["games"]>0){echo"Si considera un ottimo giocatore , grazie alla sua miglior partita durata addirittura ". $_SESSION["best"]." secondi.
        Ha una durata media di ".$_SESSION["timetot"]/$_SESSION["games"]." secondi per partita, avendo infatti giocato ".$_SESSION["games"]." partite.
        <h3>Curiosità</h3>
        Nella sua carriera ha dovuto scappare da ".$_SESSION["bomb"]." bombe ed evitare ".$_SESSION["gun"]." proiettili.
        Gli piace saltare ....ha fatto ".$_SESSION["jump"]." salti per l' esattezza. E si è chinato per ben ".$_SESSION["sit"]." volte.  ";
        if($_SESSION["bombkill"]>$_SESSION["gunkill"])echo "Il suo peggior nemico sono le bombe, dalle quali è stato ucciso ".$_SESSION["bombkill"]."volte.";
        else echo "Il suo peggior nemico sono i proiettili, che lo hanno colpito ".$_SESSION["gunkill"]." volte.";
      }else{echo "Non ha ancora giocato nessuna partita";};
        ?>

      </div>
			<div id="trumpStory">
				<h2>Chi é Donald Trump?</h2>
			'Una domanda che tutti ci siamo posti e che in vista dell’insediamento del Presidente torna a essere un quesito per molti. Soprattutto dopo le ultime dichiarazioni sul patrimonio del presidente e sulla sua vita privata.Nessuno poteva credere che Donald Trump sarebbe riuscito in questa impresa e i sondaggi lo davano piuttosto in svantaggio sulla sua avversaria. Trump ha però trionfato nei grandi stati americani, diventando così il nuovo presidente degli Stati Uniti.

<h3>Vita pubblica</h3>
Donald Trump non può dirsi di certo un uomo che è venuto dal nulla, dal momento che già il padre è stato un ricco imprenditore americano. Padre e figlio hanno però puntato su due punti differenti dello stesso settore: Donald ha costruito immobili di lusso, il padre ha invece sempre puntano sulla costruzione di abitazioni in zone più popolari.Donald Trump si laurea in Economia e Finanza presso una delle università più prestigiose, alla Wharton School of Business.  Dopo aver concluso gli studi inizia a investire nel mondo immobiliare con l’azienda di famiglia: la Elizabeth Trump and Son.  L’azienda di famiglia si occupava di affittare case e appartamenti a Brooklyn, Queens e Staten Island. Un ambito ben diverso da quello che invece sarà il punto di forza dell’azienda di Donald Trump. Mentre Donald Trump era ancora impegnato con gli studi il padre decise di coinvolgerlo in uno dei suoi progetti: Swifton Village a Cincinnati. Un complesso residenziale in Ohio, dove gli appartamenti sfitti erano oltre 1200 e il progetto sembrava essere in un momento di forte perdita.  Il programma ideato dal giovane Trump riuscì a dare grandi risultati, tanto che il complesso venne poi rivenduto per ben 6,7 miliardi di dollari. I primi successi Trump li ottiene nell’azienda di famiglia, che però ben presto comincia a stargli stretta, i suoi progetti sono di più ampio respiro.  Nel 1971 decide quindi di staccarsi dal padre e di cominciare ad investire nella zona più ricca di New York: Manhattan.  Il suo fu un vero e proprio successo, dal momento che riuscì ad essere coinvolto nei più grandi progetti della zona. Un esempio valga per tutti: la trasformazione dell’ormai fallito Commodore Hotel nel Grand Hyatt Hotel.  Un progetto grazie al quale riuscì ad avere ben 40 anni di detrazioni fiscali dal fisco di New York, per aver riportato in auge un edificio ormai sull’orlo della demolizione.

<h3>Imprenditore, wrestler e attore</h3>
La vita di Donald Trump non si esaurisce con le sole esperienze imprenditoriali, ma quella del candidato repubblicano è una vita a tutto tondo. Trump è un grande appassionato di wrestling e la sua amicizia con il proprietario della World Wrestling Entertainment ha portato ad ospitare alcune edizioni del WrestleMania nel suo Trump Plaza. Trump stesso ha inoltre partecipato, in veste di ospite, ad alcuni show organizzati negli anni. Nel 2013 il nome di Donald Trump è stato inoltre inserito nella WWE Hall of Fame. Un riconoscimento per l’amore che negli anni ha dimostrato a questo sport.<br>Donald Trump è conosciuto anche per le sue numerose apparizioni in show e film prodotti in America. Molti sono infatti i film in cui negli anni è comparso e gli show televisivi che lo hanno reso celebre non solo come imprenditore.
Nel 1998 appare nel ruolo di se stesso per il film di Woody Allen, Celebrity, ma il pubblico americano lo conosce per il suo programma del 2004. In quest’anno infatti Trump appare sul piccolo con lo show The Apprentice, un programma in cui i vari aspiranti devono riuscire a colpire il ricco imprenditore per diventarne gli stagisti."+"Il programma, dopo le dichiarazioni contro gli immigrati effettuate da Trump, andò però in onda senza l’imprenditore, di cui il grande pubblico ricorda la frase: “You’re fired!” (sei licenziato).Anche in questa occasione Trump non è di certo passato inosservato e ha deciso di mettere bene in chiaro le sue idee.


<h3>Curiosità</h3>
Abbiamo fino a questo momento visto la vita di Trump e le sue passioni, adesso scopriamo qualcosa che non tutti sanno. Le curiosità su Donald Trump sono infatti molto interessanti, dal momento che ci dicono molto sul candidato alla Casa Bianca.Non tutti sanno che Trump è uno dei maggiori sostenitori dell’innocenza di Amanda Knox. Di certo le idee estreme del candidato repubblicano anche in questo caso non potevano essere pacate.Su Twitter ha anche affermato di aver aiutato la giovane e la famiglia nel ricongiungimento.Altra curiosità è il suo amore per le cravatte Marinella, una passione condivisa con molti personaggi importanti (come ad esempio Silvio Berlusconi). La passione di Trump è stata però così forte da provare anche ad avere un punto vendita nella sua Trump Tower.	L’investimento di Trump è però sfumato, dal momento che il proprietario del brand Marinella ha rifiutato l’offerta. Trump è inoltre conosciuto per le sue storie d'amore e soprattutto per le sue frasi di apprezzamento delle donne. Melania Trump, la sua attuale moglie, non è però l’unica con cui Donald aveva deciso di condividere il resto della sua vita.

			</div>
			<div id="kimStory">
				<h2>Chi è Kim Jong Un?</h2>
				In molti lo definiscono un pazzo imprevedibile, un giovane lunatico con un Paese intero a disposizione con cui 'giocare' e un arsenale atomico per spaventare il mondo. Per anni si è sottovalutato Kim Jong-un, leader che oggi con i suoi esperimenti atomici sfida gli Stati Uniti di Donald Trump, preoccupa i Paesi della regione e irrita anche l'alleato cinese.
				<h3>Al potere a 27 anni</h3>
				A tratteggiare un lungo profilo è il New York Times, che ripercorre le tappe salienti della vita del dittatore di Pyongyang. Il padre, Kim Jong-il, ha avuto tre mogli e almeno sei figli: fin da giovanissimo Jong-un è il prediletto, scavalca i fratelli e a 27 anni, alla morte del padre, conquista il potere, senza avere nessuna esperienza, come sottolineano alcuni analisti che ne predicono presto la fine. Invece lui resiste, e dopo sei anni è ancora alla guida del Paese.
				<h3>Ha studiato (forse) in Svizzera</h3>
				Si ritiene che abbia studiato in scuole pubbliche svizzere, facendosi passare per il figlio di un diplomatico nord-coreano, e che questo periodo in Europa abbia lasciato un segno. Una volta rientrato in patria, ha frequentato l'università militare, avviandosi a prendere la leadership delle gerarchia militare. Non è mai uscito dalla Corea del Nord per visite di Stato, pochissimi stranieri hanno potuto varcare i confini del Paese e l'hanno incontrato, tra questi Dennis Rodman, famoso giocatore di basket americano, e uno chef di sushi giapponese, insieme ai vice presidenti di Cina e Cuba.

				<h3>Ha fatto uccidere 140 funzionari</h3>
			Si ritiene che tra le molte esecuzioni che abbia ordinato – è stato calcolato circa 140 alti funzionari da quando è salito al potere - c’è anche quella dello zio, Jang Song-thaek, per anni suo mentore e si riteneva reggente nell’ombra, accusato di tramare per detronizzarlo, e del fratellastro Kim Jong-nam, avvelenato all'aeroporto di Kuala Lumpur nel febbraio scorso. “Si è mosso velocemente e spietatamente. Penso che la maggior parte della gente non si aspettasse che un uomo cosi giovane fosse così efficiente nel gestire una dittatura”, ha commentato Daniel A. Pinkston, professore di relazioni internazionali alla Troy University.
				<h3>Un leader popolare</h3>
				D'altra parte, sembra che abbia riconquistato una certa popolarità, dopo il regime del padre contraddistinto da una grave carestia, e abbia allentato il controllo dello stato sull'economia, dando una spinta per una certa crescita, promuovendo un forte sviluppo edilizio nella capitale e un maggiore accesso a cibo e beni. Ma fuori da Pyongyang la situazione è ben diversa e il peso delle sanzioni internazionali si fa sentire.
			</div>
		</div>
	</div>
</article>

<div class="aside" id="ID"> <!--contiene le schede identificative di Donald Trump , Kim Jong Un e del giocatore che ha effettuato l 'accesso'-->

	<img alt="IDphoto" id="IDphoto" src="materiale/noProfile.jpg">

	<div id="info">
		<table id="infoPlayer" style="display:none">
			<tr><th>Nickname:</th><td><?php echo $_SESSION["username"] ?></td></tr>
      <tr><th>Nascità:</th><td><?php echo $_SESSION["birth"]?></td></tr>
			<tr><th>Età:</th><td><?php echo strval($_SESSION["age"]) ?></td></tr>
			<tr><th>Nazione:</th><td><?php echo $_SESSION["nation"] ?></td></tr>
			<tr><th>Sesso:</th><td><?php echo $_SESSION["genre"]?></td></tr>
      <tr><th>Funzione:</th><td>Nessuna</td></tr>
		</table>
	<table id="infoTrump">
		<tr><th>Nickname:</th><td>Dotard</td></tr>
		<tr><th>Nascità:</th><td>New York</td></tr>
		<tr><th>Età:</th><td>71anni (14 giugno 1946)</td></tr>
		<tr><th>Nazione:</th><td>Stati Uniti d'America</td></tr>
    <tr><th>Sesso:</th><td>male</td></tr>
		<tr><th>Altezza:</th><td>1,91 m</td></tr>
		<tr><th>Peso:</th><td>94 Kg</td></tr>
		<tr><th>Moglie:</th><td> Melania Trump</td></tr>
		<tr><th>Funzione:</th><td>Presidente</td></tr>
	</table>
	<table id="infoKim" >
		<tr><th>Nickname:</th><td>Little Rocket Man</td></tr>
		<tr><th>Nascità:</th><td>Pyongyang</td></tr>
		<tr><th>Età:</th><td>più o meno 35anni</td></tr>
		<tr><th>Nazione:</th><td>Nord Corea</td></tr>
    <tr><th>Sesso:</th><td>male</td></tr>
		<tr><th>Altezza:</th><td>1,70 m</td></tr>
		<tr><th>Peso:</th><td>73 Kg</td></tr>
		<tr><th>Moglie:</th><td>Ri Sol-ju</td></tr>
		<tr><th>Funzione:</th><td>Leader supremo</td></tr>
	</table>
</div>
</div>
<!--contenuto home-->
  <div id="corea" class="aside"><!--contiene la bandiera della corea e la figura di kim jong un-->
		 <img src="materiale/KimLaught.png"  alt="Kim" id="Kim">
		<img id="NC" alt="north corea flag" src="materiale/Flag_of_NC.png">
</div>
<div id="Trump"><!--contiene una figura di trump fissata alla base della pagina con un fumetto dove parla ed il link per la finestra di gioco-->
	<audio src="materiale/presidentTrump.mp3" id="presidentTalk" ></audio>
  <img src="materiale/trump.png" alt="trump" id="trumpficture" onmouseout="outTrump();"  onmouseover="onTrump();">
	<div id="trumpSpeak">
	<p class="tell" id="trumpTell">
		<b>Sfuggiremo al nemico!!<br> <i><a href="game.php" >Gioca ora!!</a></i></b></p><!--link per la finestra di gioco-->
</div>
</div>
<!--fine contenuto-->
<img id="soldiers" src="materiale/soldiers.png" alt="soldati nordcoreani">
<footer><!--rimane sempre alla base della pagina-->
  <p><b>Rocket-man.srl ®</b><br>
    contact us </p>
</footer>
</div>


</body>
</html>
