var tMinBomb=2000;
var tMaxBomb=5000;
var tMinSoldier=3000;
var tMaxSoldier=9000;
//vari tempi per gli intervalli di funzionamento
var flyV=0.03;//spostamento percemtuale di kim ogni millesimo di secondo   ...aumentare per più velocità
var bombV=0.04;//spostamento percemtuale delle bombe ogni millesimo di secondo   ...aumentare per più velocità
var proiettileV=0.05;

var bombKill=true;//true se vieni uciso da una bomba e false se da un proiettile
var discesa=false;//true se >Trump si trova durante il slato ed è in discesa
var soldierDx;//true se il soldato spara verso destra, false a sx ..la direzione viene definita co sorteggio da soldierdx
var boom=false//true se cè una bomba esplosa che non va toccata
var w=false;//true se trump cammina
var jumping=false;//true trump salta
var right=true;//true trump va verso destra
var up;//gestisce il salto di trump
var Kr=false;//false se kim va verso sinistra ; true se kim va verso destra


var nSit=0; //conta quante volte trump si china
var nJump=0; //conta quanti salti vengono effettuati
var proiettili=0;//numero di proiettili sparati dai soldati nordcoreani
var schivati=0;//numero proiettili schivati
var bombe=0;//numero bombe lancite
var schivate=0;//numero bombe schivate
var schivata=false;
var sit=false;//true se trump si trova in posizione china

pgW=70;//dimensioni dello schermo di gioco
pgH=100;
pgL=15;
pgR=15;



function start(){
  playing=true;
  document.getElementById('play').setAttribute('style','display:none');
  document.onkeydown = keydown;
  document.onkeypress=keydown;
  document.onkeyup =fermo;
  window.setTimeout('kim()',2000);
  trump();
  window.setTimeout('ncsoldier()',5000);
  window.setInterval('proiettileGo()',1);
  window.setInterval('time()',1000);
}

function trump(){
  window.setInterval('jumpUp()',33);
  var trump= document.createElement('img');    //creo il personaggio di trump
  document.getElementById('playground').appendChild(trump);
  trump.src='materiale/tuglife.png'
  trump.setAttribute('id','trump');
  trump.style.right='77%';
  trump.style.height='15%';
  trump.style.width='3%';
  trump.style.left='20%';
  trump.style.bottom='0%';
  return trump;
}

//MOVIMENTO TRUMP

function keydown(e) {
  e = (!e) ? window.event : e;
  var key = (e.which != null) ? e.which : e.keyCode;
  switch (key){
    case 37:right=false;
    move(-1);
    break;     //left
    case 90:jump();
    break;  // up
    case 39: right=true;
    move(1);
    break;         // right
    case 40: sit=true;
    move(0);
    break;         // down
    }
}


function fermo(){

if(sit==true){
  nSit++;
  sit=false;
}
if(jumping==false){
  trump.style.width='3%';
  trump.style.height='15%';
  trump.src='materiale/tuglife.png';
  }
}




function move(dx) {
    if(jumping==false&&sit==false)walk();
    trump=document.getElementById('trump');
    if(parseInt(trump.style.left)+dx>=11&&parseInt(trump.style.left)+dx<=86&&sit==false){
    trump.style.left = parseInt(trump.style.left) + dx + "%";
    }
    if(sit==true&&jumping==false){
      trump.src='materiale/trumpSit.png';
      trump.style.height='10%';
      trump.style.width='4%';
    }

}

function jump(){
  trump=document.getElementById('trump');
  if(jumping==false){
    trump.src='materiale/trumpJump.png';
    trump.style.width='5%';
    trump.style.left=parseFloat(trump.style.left)-1+'%';
    jumping=true;
  }
}
function jumpUp(){
  trump=document.getElementById('trump');
  if(jumping==true){
    if(parseFloat(trump.style.bottom)<30&&discesa==false){
    trump.style.bottom=parseFloat(trump.style.bottom)+1+'%';
    }
    else{
      discesa=true;
    }
    if(discesa==true&&parseFloat(trump.style.bottom)>0){
      trump.style.bottom=parseFloat(trump.style.bottom)-1+'%';
    }
    if(discesa==true&&parseFloat(trump.style.bottom)==0){
      jumping=false;
      discesa=false;
      nJump++;
      trump.src='materiale/tuglife.png';
      trump.style.width='3%';
      trump.style.left=parseFloat(trump.style.left)+1+'%';
    }
  }
}




function walk(){
  w=true;
  if(right==true){
    trump.src='materiale/passoADx.png';
  }
  else {
     trump.src='materiale/passoASx.png';
  }

}






//MOVIMETO KIM e BOMBE
function kim(){
 kim = document.createElement('img');
 document.getElementById('playground').appendChild(kim);//creazione del personaggio di Kim
 kim.setAttribute('id','kim');
 kim.src='materiale/RocketSx.png';
 kim.style.right='3%';
 kim.style.left='87%';
 kim.style.width='7%';
 kim.style.top='3%';
 document.getElementById('rocketSound').play();
 window.setInterval('fly()',1); //ogni millesimo di secondo si ripete la funzione fly reponsabile del movimento di Kim
 window.setTimeout('bomb()',3000);
 window.setInterval('bombing()',1);


}

function fly(){
  kim =document.getElementById('kim');
  kL=parseInt(kim.style.left);
  kR=parseInt(kim.style.right);

  if(kL-flyV<=0){
    Kr=true;
    kim.src='materiale/RocketDx.png';
  }
  if(kL+flyV>=93){
    Kr=false;
      kim.src='materiale/RocketSx.png';
  }
  if(Kr==false)kim.style.left=parseFloat(kim.style.left)-flyV+'%';
  else kim.style.left=parseFloat(kim.style.left)+flyV+'%';

}

function bomb(){
  tBomb=Math.floor(Math.random() * (tMaxBomb - tMinBomb)) + tMinBomb;
    window.setTimeout('bomb()',tBomb);
  b=document.createElement('img');
  b.setAttribute('class','bomb');
  document.getElementById('playground').appendChild(b);
  b.src='materiale/bomb.png';
  b.style.bottom='82%';
  b.style.height='8%';
  b.style.width='4%';
  b.style.left=parseFloat(document.getElementById('kim').style.left)+2+'%';

  bombe++;
}

function bombing(){
  schivata=true;
  trump=document.getElementById('trump');
  for(i=0;i<bombe-schivate;i++){//controlla se qualcuna bomba ha colpito Trump
    bi=document.getElementsByClassName('bomb')[i];

    if(parseFloat(bi.style.bottom)<=parseFloat(trump.style.bottom)+parseFloat(trump.style.height)&&
    parseFloat(bi.style.bottom)+7>=parseFloat(trump.style.bottom)){//non si tiene conte della possibilità che trump salti, da modificare in caso si inserisca la finzione jump()
      if(parseFloat(bi.style.left)<=parseFloat(trump.style.left)+2.7&&
      parseFloat(trump.style.left)<=parseFloat(bi.style.left)+2.7){//trum si trova nella traiettoria della bomba ..è stato colpito
        gameover();
      }
    }
  }
  for(i=0;i<bombe-schivate;i++){  //caduta delle bombe
    bi=document.getElementsByClassName('bomb')[i];
    if(parseFloat(bi.style.bottom)-bombV>0){
    bi.style.bottom=parseFloat(bi.style.bottom)-bombV+'%';

    }
    else{
      boom=true;
      explosion=document.createElement('img');

      document.getElementById('playground').appendChild(explosion);
      explosion.src='materiale/explosion.png';
      explosion.style.bottom=parseInt( bi.style.bottom)+'%';
      explosion.style.left=parseInt(  bi.style.left)+'%';
      explosion.style.height='10%';
      explosion.style.width='4%';
      if(parseFloat(explosion.style.left)+parseFloat(explosion.style.width)>10&&parseFloat(explosion.style.left)<90&&muted==false){
        bombSound=document.createElement('audio');
        bombSound.setAttribute('src','materiale/bomb.mp3');
        bombSound.setAttribute('autoplay','true');
        bombSound.setAttribute('id','bombSound');
        document.getElementById('playground').appendChild(bombSound);
      }
      explosion.setAttribute('id','boom');
      document.getElementById('playground').removeChild(document.getElementsByClassName('bomb')[i]);
      schivate++;
      setTimeout('removeExplosion()',2000);
      window.setTimeout('removeSoundBomb()',8000);
    }
  }

  if(boom==true&&parseFloat(trump.style.bottom)<parseFloat(explosion.style.height)&&
  parseFloat(trump.style.left)+parseFloat(trump.style.width)>parseFloat(explosion.style.left)&&parseFloat(explosion.style.left)+parseFloat(explosion.style.width)>parseFloat(trump.style.left)){
    window.alert('Sei stato colpito, hai perso.');
    bombKill=true;
    gameover();
  }
}

function removeExplosion(){
    document.getElementById('playground').removeChild(document.getElementById('boom'));
    boom=false;
}

function removeSoundBomb(){
    document.getElementById('playground').removeChild(document.getElementById('bombSound'));
}

//soldato nord coreano
function ncsoldier(){
  soldierdx=Math.random();
  if(soldierdx<0.5)soldierDx=true;
  else soldierDx=false;
  tSoldier=Math.floor(Math.random() * (tMaxSoldier - tMinSoldier)) + tMinSoldier;
  window.setTimeout('ncsoldier()',tSoldier);
  if(playing==true){
    soldier=document.createElement('img');
    document.body.appendChild(soldier);
    soldier.setAttribute('id','soldier');
    proiettile=document.createElement('img');
    proiettili++;
    document.body.appendChild(proiettile);
    proiettile.setAttribute('class','proiettili');
    soldier.style.bottom='0%';
    proiettile.style.bottom='12%';
    proiettile.style.width='1%';
    proiettile.style.height='1%';
    if(soldierDx==true){
      soldier.src='materiale/ncSoldierDx.png';
      soldier.style.left='0%';
      proiettile.src='materiale/proiettileDx.png';
      proiettile.style.left='5%';
      proiettile.style.right='94%';
    }
    else{
      soldier.src='materiale/ncSoldierSx.png';
      soldier.style.right='0%';
      proiettile.src='materiale/proiettileSx.png';
      proiettile.style.right='5%';
      proiettile.style.left='94%';
    }
  }
    window.setTimeout('removeSoldier()',tSoldier-1);

}

function removeSoldier(){
  document.body.removeChild(document.getElementById('soldier'));
}

function proiettileGo(){
  trump=document.getElementById('trump');
  for(i=0;i<proiettili-schivati;i++){
    proiettilei=document.getElementsByClassName('proiettili')[i];
    if(proiettilei.getAttribute('src')=='materiale/proiettileDx.png'){
       proiettilei.style.left=parseFloat(proiettilei.style.left)+proiettileV+'%';
      if(sit==false&&parseFloat(trump.style.bottom)<parseFloat(proiettilei.style.bottom)&&parseFloat(trump.style.left)+parseFloat(trump.style.width)>parseFloat(proiettilei.style.left)&&parseFloat(proiettilei.style.left)+parseFloat(proiettilei.style.width)>parseFloat(trump.style.left)){
        bombKill=false;
        lose = window.alert('Sei stato colpito, hai perso!');
        gameover();
      }
      if(parseFloat(proiettilei.style.left)>90){
        document.body.removeChild(proiettilei);
        schivati++;
      }
    }
    if(proiettilei.getAttribute('src')=='materiale/proiettileSx.png') {
      proiettilei.style.left=parseFloat(proiettilei.style.left)-proiettileV+'%';
      if(sit==false&&parseFloat(trump.style.bottom)<parseFloat(proiettilei.style.bottom)&&parseFloat(trump.style.left)+parseFloat(trump.style.width)>parseFloat(proiettilei.style.left)&&parseFloat(proiettilei.style.left)+parseFloat(proiettilei.style.width)>parseFloat(trump.style.left)){
        bombKill=false;
        window.alert('Sei stato colpito, hai perso!');
        gameover();
      }
      if(parseFloat(proiettilei.style.left)<10){
        document.body.removeChild(proiettilei);
        schivati++;
      }
    }
  }
}
