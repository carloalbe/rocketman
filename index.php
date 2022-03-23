<?php
session_start();
require ("php/dbConn.php");
?>
<!DOCTYPE html>
<html lang="it"> <!--questa pagina usa il single-page-jupped-->
	<head>
		<meta charset="utf-8">
    <meta name = "author" content = "Carlo Alberto Carrucciu">
		<meta name="matricola" content="533967">
  	<meta name = "keywords" content = "game">
    <script  src="js/index.js" ></script>
		<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/index.css" type="text/css" media="screen">

		<title>Rocket-man</title>
	</head>
  <body>
    <div id="corpoUSA">
    <header>
      <h1><b>ROCKET-MAN</b></h1>
      </header>
      <article style="padding:1%;background-color:rgba(0,0,0,0.7);display:none">
				<form action="php/registration.php" method="post" name="registration">
					<fieldset name="registration" >
						<legend>Registration</legend>
						<label>
      				Nome:
		  			<input name="name" size="15" type="text" placeholder="Es: Mario"
		  						pattern="[a-zA-Z\s]+" required>
    			</label>
    			<label>
      				Cognome:
		  			<input name="surname" size="15" type="text" placeholder="Es: Rossi"
		  						pattern="[a-zA-Z\s]+" required><br>
    			</label>
					<label>
						Username:
						<input name="username" size="15" type="text" placeholder="M_rossi84" required><br>
					</label>
				<label>
		  			Password:
		  			<input name="password" size="15" type="password" required>
	  			</label>
					<label>
			  			Conferma password:
			  			<input name="passwordR" size="15" type="password" required><br>
		  			</label>

					<label>
						Nazione:
						<select name="nation"><!--select di opzioni scaricate da internet-->
<option selected="" value="">seleziona</option>
<option value="afghanistan">afghanistan</option>
<option value="albania">albania</option>
<option value="algeria">algeria</option>
<option value="andorra">andorra</option>
<option value="angola">angola</option>
<option value="antarctica">antartico</option>
<option value="antigua and barbuda">antigua e barbuda</option>
<option value="saudi arabia">arabia saudita</option>
<option value="argentina">argentina</option>
<option value="armenia">armenia</option>
<option value="australia">australia</option>
<option value="austria">austria</option>
<option value="azerbaijan">azerbaijan</option>
<option value="bahamas">bahamas</option>
<option value="bahrain">bahrain</option>
<option value="bangladesh">bangladesh</option>
<option value="barbados">barbados</option>
<option value="belgium">belgio</option>
<option value="belize">belize</option>
<option value="benin">benin</option>
<option value="bhutan">bhutan</option>
<option value="belarus">bielorussia</option>
<option value="bolivia">bolivia</option>
<option value="bosnia herzegovina">bosnia erzegovina</option>
<option value="botswana">botswana</option>
<option value="brazil">brasile</option>
<option value="brunei">brunei</option>
<option value="bulgaria">bulgaria</option>
<option value="burkina faso">burkina faso</option>
<option value="burundi">burundi</option>
<option value="cambodia">cambogia</option>
<option value="cameroon">camerun</option>
<option value="canada">canada</option>
<option value="cape verde">capo verde</option>
<option value="chad">ciad</option>
<option value="chile">cile</option>
<option value="china">cina</option>
<option value="china hong kong">cina - hong kong</option>
<option value="china macau">cina - macao</option>
<option value="cyprus">cipro</option>
<option value="holy see">citta' del vaticano</option>
<option value="colombia">colombia</option>
<option value="comoros">comore</option>
<option value="north korea">corea del nord</option>
<option value="south korea">corea del sud</option>
<option value="cote divoire">costa d'avorio</option>
<option value="costa rica">costa rica</option>
<option value="croatia">croazia</option>
<option value="cuba">cuba</option>
<option value="denmark">danimarca</option>
<option value="denmark faroe islands">danimarca - isole faroe</option>
<option value="dominica">dominica</option>
<option value="ecuador">ecuador</option>
<option value="egypt">egitto</option>
<option value="el salvador">el salvador</option>
<option value="united arab emirates">emirati arabi uniti</option>
<option value="eritrea">eritrea</option>
<option value="estonia">estonia</option>
<option value="ethiopia">etiopia</option>
<option value="fiji">figi</option>
<option value="philippines">filippine</option>
<option value="finland">finlandia</option>
<option value="france">francia</option>
<option value="gabon">gabon</option>
<option value="gambia">gambia</option>
<option value="georgia">georgia</option>
<option value="germany">germania</option>
<option value="ghana">ghana</option>
<option value="jamaica">giamaica</option>
<option value="japan">giappone</option>
<option value="djibouti">gibuti</option>
<option value="jordan">giordania</option>
<option value="greece">grecia</option>
<option value="grenada">grenada</option>
<option value="greenland">groenlandia</option>
<option value="guatemala">guatemala</option>
<option value="guinea">guinea</option>
<option value="equatorial guinea">guinea equatoriale</option>
<option value="guinea bissau">guinea-bissau</option>
<option value="guyana">guyana</option>
<option value="haiti">haiti</option>
<option value="honduras">honduras</option>
<option value="india">india</option>
<option value="indonesia">indonesia</option>
<option value="iran">iran</option>
<option value="iraq">iraq</option>
<option value="ireland">irlanda</option>
<option value="iceland">islanda</option>
<option value="marshall islands">isole marshall</option>
<option value="solomon islands">isole salomone</option>
<option value="israel">israele</option>
<option value="italy" selected="selected">italia</option>
<option value="kazakhstan">kazakistan</option>
<option value="kenya">kenya</option>
<option value="kyrgyzstan">kirghizistan</option>
<option value="kiribati">kiribati</option>
<option value="kuwait">kuwait</option>
<option value="laos">laos</option>
<option value="lesotho">lesotho</option>
<option value="latvia">lettonia</option>
<option value="lebanon">libano</option>
<option value="liberia">liberia</option>
<option value="libya">libia</option>
<option value="liechtenstein">liechtenstein</option>
<option value="lithuania">lituania</option>
<option value="luxembourg">lussemburgo</option>
<option value="macedonia">macedonia</option>
<option value="madagascar">madagascar</option>
<option value="malawi">malawi</option>
<option value="maldives">maldive</option>
<option value="malaysia">malesia</option>
<option value="mali">mali</option>
<option value="malta">malta</option>
<option value="morocco">marocco</option>
<option value="mauritania">mauritania</option>
<option value="mauritius">mauritius</option>
<option value="mexico">messico</option>
<option value="micronesia">micronesia</option>
<option value="moldova">moldavia</option>
<option value="mongolia">mongolia</option>
<option value="montenegro">montenegro</option>
<option value="mozambique">mozambico</option>
<option value="myanmar">myanmar</option>
<option value="namibia">namibia</option>
<option value="nauru">nauru</option>
<option value="nepal">nepal</option>
<option value="nicaragua">nicaragua</option>
<option value="niger">niger</option>
<option value="nigeria">nigeria</option>
<option value="norway">norvegia</option>
<option value="new zealand">nuova zelanda</option>
<option value="holland">olanda</option>
<option value="oman">oman</option>
<option value="netherlands">paesi bassi</option>
<option value="netherlands netherlands antilles">paesi bassi - antille olandesi</option>
<option value="netherlands aruba">paesi bassi - aruba</option>
<option value="pakistan">pakistan</option>
<option value="palau">palau</option>
<option value="palestine">palestina</option>
<option value="panama">panama</option>
<option value="papua new guinea">papua nuova guinea</option>
<option value="paraguay">paraguay</option>
<option value="peru">peru'</option>
<option value="poland">polonia</option>
<option value="puerto rico">porto rico</option>
<option value="portugal">portogallo</option>
<option value="principality of monaco">principato di monaco</option>
<option value="qatar">qatar</option>
<option value="united kingdom">regno unito</option>
<option value="czech republic">repubblica ceca</option>
<option value="central african republic">repubblica centrafricana</option>
<option value="republic of the congo">repubblica del congo</option>
<option value="democratic republic of the congo">repubblica democratica del congo (ex zaire)</option>
<option value="republic of san marino">repubblica di san marino</option>
<option value="dominican republic">repubblica dominicana</option>
<option value="romania">romania</option>
<option value="rwanda">ruanda</option>
<option value="russia">russia</option>
<option value="western sahara">sahara occidentale</option>
<option value="saint vincent and the grenadines">saint vincent e grenadines</option>
<option value="samoa">samoa</option>
<option value="saint kitts and nevis">san kitts e nevis</option>
<option value="saint lucia">santa lucia</option>
<option value="sao tome and principe">sao tome e principe</option>
<option value="senegal">senegal</option>
<option value="serbia">serbia</option>
<option value="seyschelles">seychelles</option>
<option value="sierra leone">sierra leone</option>
<option value="singapore">singapore</option>
<option value="syria">siria</option>
<option value="slovakia">slovacchia</option>
<option value="slovenia">slovenia</option>
<option value="somalia">somalia</option>
<option value="spain">spagna</option>
<option value="sri lanka">sri lanka</option>
<option value="united states of america">stati uniti d'america</option>
<option value="south africa">sud africa</option>
<option value="sudan">sudan</option>
<option value="suriname">suriname</option>
<option value="sweden">svezia</option>
<option value="switzerland">svizzera</option>
<option value="swaziland">swaziland</option>
<option value="tajikistan">tagikistan</option>
<option value="thailand">tailandia</option>
<option value="taiwan">taiwan</option>
<option value="tanzania">tanzania</option>
<option value="east timor">timor dell'est</option>
<option value="togo">togo</option>
<option value="tonga">tonga</option>
<option value="trinidad and tobago">trinidad e tobago</option>
<option value="tunisia">tunisia</option>
<option value="turkey">turchia</option>
<option value="turkmenistan">turkmenistan</option>
<option value="tuvalu">tuvalu</option>
<option value="ukraine">ucraina</option>
<option value="uganda">uganda</option>
<option value="hungary">ungheria</option>
<option value="uruguay">uruguay</option>
<option value="uzbekistan">uzbekistan</option>
<option value="vanuatu">vanuatu</option>
<option value="venezuela">venezuela</option>
<option value="vietnam">vietnam</option>
<option value="yemen">yemen</option>
<option value="zambia">zambia</option>
<option value="zimbabwe">zimbabwe</option>
</select>
					</label><br>
	  			<label>
	  				Data di Nascita:
	  				<input name="birth" type="date" required><br>
					</label>
					<label>
						Sesso:
						<input name="genre" value="M" type="radio" >Male
					</label>
					<span>      </span>
						<label>
						<input name="genre" value="F" type="radio" >Female
					</label>
					<br>
					<input type="submit" value="Registrati">

				</fieldset>
				</form>
      </article>
			<aside  style="min-height:20%;padding:1%;background-color:rgba(0,0,0,0.7)">
				<form name="login" method="post" action="php/login.php">
					<fieldset name="login">
						<legend>Log in</legend>

					<label>Username</label>
					<input type="text" placeholder="Username" name="username" required autofocus>
					<br>
					<label>Password</label>
					<input type="password" placeholder="Password" name="password" required>
					<br>
				<input type="submit" value="Log in">
			</fieldset>
			</form>
				</aside>
				<div id="corea" class="aside" style="display:none" onmouseover="this.style.cursor='pointer'" onclick="logform()"><!--contiene la bandiera della corea e la figura di kim jong un-->
					 <img src="materiale/KimLaught.png"  alt="Kim" id="Kim">
					<img id="NC" alt="north corea flag" src="materiale/Flag_of_NC.png">
					<div id="kimSpeak">
					<p class="tell" id="kimTell">
						<b>Sei già registrato??<br>Accedi!</b></p><!--link per la finestra di gioco-->
				</div>
			</div>
				<div id="Trump" onmouseover="this.style.cursor='pointer'"  onclick="regform()"><!--contiene una figura di trump fissata alla base della pagina con un fumetto dove parla ed il link per la finestra di gioco-->
					<audio src="materiale/presidentTrump.mp3" id="presidentTalk" ></audio>
				  <img src="materiale/trump.png" alt="trump" id="trumpficture">
					<div id="trumpSpeak">
					<p class="tell" id="trumpTell">
						<b><?php if(isset($_SESSION["frase"]))echo $_SESSION["frase"];
						else echo "Non sei ancora<br> registrato??<br>Registrati subito!!";?></b></p>
				</div>
				</div>
      <footer><!--rimane sempre alla base della pagina-->
      	<p><b>Rocket-man.srl ®</b><br>
      		contact us <br>
					 <i onmouseover="this.style.cursor='pointer'" onclick="window.open('html/instructions.html')">click for informations</i></p>
      </footer>
    </div>
  </body>
  </html>
