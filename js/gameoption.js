var end=false;//true quando la partita è terminata
var muted=false;//true se senza suono
var secondi =0;
var minuti=0;
var ore=0;
var playing=false;

//valori di controllo
function time(){
  if(playing==true){
    secondi++;
    flyV+=0.0002;
    proiettileV+=0.0003;
    bombV+=0.0004;
    if(parseInt(secondi)%5==0){
      tMinSoldier--;
      tMaxSoldier--;
      tMinBomb-=0.0002;
      tMaxBomb-=0.0002;
    }
    if(secondi==60){
      minuti++;
      secondi=0;
    }
    if(minuti==60){
      minuti=0;
      ore++;
    }
  }
document.getElementById('tempo').innerHTML=ore+':'+minuti+':'+secondi;
document.getElementById('bombe').innerHTML=bombe;
document.getElementById('proiettili').innerHTML=proiettili;
document.getElementById('salti').innerHTML=nJump;
document.getElementById('seduto').innerHTML=nSit;


}

function mute(){
  audioTag=document.getElementsByTagName('audio');

  if(muted==false){
    document.getElementById('audio').style.left='89%';
    document.getElementById('audio').src='materiale/mute.png';
    muted=true;
    document.getElementById('rocketSound').muted=true;
  }
  else{
      document.getElementById('audio').style.left='90%';
    document.getElementById('audio').src='materiale/unmute.png';
    muted=false
    document.getElementById('rocketSound').muted=false;
  }
}

function gameover(){
  playing=false;
  document.getElementById('rocketSound').muted=true;
  muted=true;
  document.body.removeChild(document.getElementById('soldier'));
  document.body.removeChild(document.getElementsByClassName('proiettili')[0]);
  document.getElementById('playground').removeChild(document.getElementById('trump'));
  document.getElementById('playground').removeChild(document.getElementById('kim'));
  window.clearInterval(window.setInterval('proiettileGo()',1));
  window.clearInterval(window.setInterval('time()',1000));
  window.clearInterval(window.setInterval('fly()',1));
    document.getElementById('whitehouse').setAttribute('style','display:none');
  document.getElementById('playground').setAttribute('style','display:none');
  document.getElementById('pause').setAttribute('style','display:none');
  document.getElementById('gameover').setAttribute('style','display:flex');
  document.getElementById('playground').removeChild(document.getElementById('rocketSound'));
  document.getElementById('failSound').play();
  window.setTimeout('finish()',2000);
}

function finish(){
  secondi=secondi+ore*3600+minuti*60;
  document.getElementById('replay').setAttribute('style','display:flex');
  document.getElementById('secondiIn').value=secondi;
  document.getElementById('bombIn').value=bombe;
  document.getElementById('gunIn').value=proiettili;
  document.getElementById('jumpIn').value=nJump;
  document.getElementById('sitIn').value=nSit;
  document.getElementById('bombkillIn').value=bombKill;



}

function home(){
gotohome=window.confirm('Sei sicuro di voler tornare all Home ..perderai i progressi.');

    if(gotohome==true)location.replace("home.php");
}
